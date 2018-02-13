<?php

class SubstractFromCart extends BasePage {
  private $cartModel;

  public function __construct() {
    $this->cartModel = new Cart();
  }

  public function post() {
    $this->cartModel->substractProduct($this->postData['id']);
    $this->redirect('/');
  }
}
