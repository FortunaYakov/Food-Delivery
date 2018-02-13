<?php

class OrdersPage extends BasePage {
  private $orderModel, $userModel;

  public function __construct() {
    $this->orderModel = new Order();
    $this->userModel = new User();
  }

  protected function get() {
    $orders = $this->orderModel->getOrders();
    require_once './views/admin/all_orders.php';
  }
}
