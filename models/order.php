<?php

class Order extends BaseModel {
  private $productModel;

  public function __construct() {
    parent::__construct();
    $this->productModel = new Product();
  }

  public function getOrders() {
    $res = $this->conn->query('SELECT u.username, o.total, o.create_date
                               FROM orders AS o
                               JOIN users AS u ON o.user_id = u.id
                               ORDER BY o.create_date DESC');
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getStatsForGraph() {
    $res = $this->conn->query('SELECT DISTINCT COUNT(id) as y,
                               EXTRACT(MONTH FROM create_date) as x
                               FROM orders GROUP BY x');
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPriceChanges() {
    $res = $this->conn->query('SELECT DISTINCT p.title as product, p.price as actual_price, op.old_price
                               FROM products as p JOIN order_products as op JOIN orders as o
                               ON op.product_id = p.id AND o.id = op.product_id AND o.create_date
                               BETWEEN NOW() - INTERVAL 30 DAY AND NOW() ORDER BY product');
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getSoldProducts() {
    $res = $this->conn->query('SELECT o.create_date as date, p.title as product, op.count as quantity, op.old_price as cost
                               FROM order_products as op JOIN orders as o JOIN products as p
                               ON p.id = op.product_id AND o.id = op.order_id ORDER BY o.create_date');
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getLastMonthsOrdersCount() {
    $avgOrders = $this->conn->query('SELECT COUNT(id) as count FROM orders
                                     WHERE create_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()');
    return $avgOrders->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAvgMonthsCheck() {
    $avgCheck = $this->conn->query('SELECT AVG(total) as avg_price FROM orders
                                    WHERE create_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()');
    return $avgCheck->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create($userId, $address, $lineItems) {
    $products = $this->productModel->getProductsByIds(array_keys($lineItems));

    $orderStmt = $this->conn->prepare('INSERT INTO orders (user_id, address, total)
                                       VALUES (?, ?, ?)');

    $total = 0;
    foreach ($products as $product) {
      $total += $product['price'] * $lineItems[$product['id']];
    }

    $orderStmt->execute([$userId, $address, $total]);
    $orderId = $this->conn->lastInsertId();

    $lineItemStmt = $this->conn->prepare('INSERT INTO order_products
                                          (product_id, order_id, count, old_price)
                                          VALUES (?, ?, ?, ?)');

    foreach ($products as $product) {
      $lineItemStmt->execute([$product['id'], $orderId,
                              $lineItems[$product['id']],
                              $product['price']]);
    }
  }
}
