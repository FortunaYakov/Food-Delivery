<?php
  class SearchPage extends BasePage {
    private $productModel;

    public function __construct() {
      $this->productModel = new Product();
      $this->userModel = new User();
    }

    protected function get() {
      require_once './views/index.php';
    }

    protected function post() {
      $products = $this->productModel->getSearchProducts($this->postData['product']);
      require_once './views/index.php';
    }
  }
