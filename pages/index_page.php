<?php

class IndexPage extends BasePage {
  private $productModel;

  public function __construct() {
    $this->productModel = new Product();
  }

  protected function get() {
    $products = $this->productModel->getAll();
    require_once '/views/index.php';
  }
}
