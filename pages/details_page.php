<?php

class DetailsPage extends BasePage {
  private $orderModel, $userModel;

  public function __construct() {
    $this->orderModel = new Order();
    $this->userModel = new User();
  }

  protected function get() {
    $detailsOfSoldProduct = $this->orderModel->getSoldProducts();
    $ordersCountLastMonth = $this->orderModel->getLastMonthsOrdersCount()[0]['count'];
    $avgPrice = $this->orderModel->getAvgMonthsCheck()[0]['avg_price'];
    require_once './views/admin/details.php';
  }
}
