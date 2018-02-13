<?php

class IndexPage extends BasePage {
  private $productModel, $userModel;

  public function __construct() {
    $this->productModel = new Product();
    $this->userModel = new User();
  }

  protected function get() {
    $products = $this->productModel->getAll();
    require_once './views/index.php';
  }
}
