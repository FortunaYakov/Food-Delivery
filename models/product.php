<?php

class Product extends BaseModel {
  private $queryByCategoryId;
  public function __construct() {
    parent::__construct();
    $this->queryByCategoryId = $this->conn->prepare('SELECT *
                                                     FROM products
                                                     WHERE category_id = ?');
  }

  public function getAll() {
    $res = $this->conn->query('SELECT * FROM products ORDER BY title ASC');
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductById($id) {
    $stmt = $this->conn->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getByCategoryId($id) {
    $this->queryByCategoryId->execute([$id]);
    return $this->queryByCategoryId->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductsByIds($ids) {
    $in = str_repeat('?,', count($ids)-1) . '?';
    $q = 'SELECT * FROM products WHERE id IN (' . $in . ')';

    $stmt = $this->conn->prepare($q);
    $stmt->execute($ids);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
