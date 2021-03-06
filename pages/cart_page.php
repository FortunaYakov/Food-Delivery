<?php

class CartPage extends BasePage {
  private $cartModel, $productModel, $userModel;

  public function __construct() {
    $this->cartModel = new Cart();
    $this->productModel = new Product();
    $this->userModel = new User();
  }

  public function get() {
    $lineItems = $this->cartModel->getProducts();
    if (empty($lineItems)) {
      $products = [];
    } else {
      $products = $this->productModel->getProductsByIds(array_keys($lineItems));
    }

    require_once './views/cart.php';
  }
}
