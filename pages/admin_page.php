<?php

class AdminPage extends BasePage {
  private $orderModel;

  public function __construct() {
    $this->orderModel = new Order();
  }

  protected function get() {
    $orders = $this->orderModel->getOrders();
    require_once './views/admin/admin_page.php';
  }
}
