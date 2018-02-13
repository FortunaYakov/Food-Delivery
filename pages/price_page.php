<?php

class PricePage extends BasePage {
  private $orderModel, $userModel;

  public function __construct() {
    $this->orderModel = new Order();
    $this->userModel = new User();
  }

  protected function get() {
    $price = $this->orderModel->getPriceChanges();
    require_once './views/admin/price_changes.php';
  }
}
