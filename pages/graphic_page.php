<?php

class GraphicPage extends BasePage {
  private $orderModel, $userModel;

  public function __construct() {
    $this->orderModel = new Order();
    $this->userModel = new User();
  }

  protected function get() {
    $graphicData = $this->orderModel->getStatsForGraph();
    require_once './views/admin/graphic.php';
  }
}
