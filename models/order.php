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
                               JOIN users AS u ON o.user_id = u.id');
    return $res->fetchAll(PDO::FETCH_ASSOC);
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
