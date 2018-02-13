<?php

class OrderPage extends BasePage {
  private $cartModel, $orderModel, $userModel;

  public function __construct() {
    $this->cartModel = new Cart();
    $this->orderModel = new Order();
    $this->userModel = new User();
  }

  public function get() {
    require_once './views/order_form.php';
  }

  public function post() {
    $lineItems = $this->cartModel->getProducts();
    if (!empty($lineItems)) {
      $this->orderModel->create($this->userSessionModel->getUserId(),
                                $this->postData['address'],
                                $lineItems);

      $this->cartModel->reset();
      $this->redirect('/');
    } else {
      $this->redirect('/cart');
    }
  }
}
