<?php

class AddToCart extends BasePage {
  private $cartModel;

  public function __construct() {
    $this->cartModel = new Cart();
  }

  public function post() {
    $this->cartModel->addProduct($this->postData['id']);
    $this->redirect('/');
  }
}
