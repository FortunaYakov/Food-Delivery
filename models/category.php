<?php

class Category extends BaseModel {
  public function getAll() {
    $res = $this->conn->query('SELECT * FROM categories ORDER BY title ASC');
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
}
