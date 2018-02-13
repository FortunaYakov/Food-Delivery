<?php

class BasePage {
  protected $getData, $postData, $userSessionModel;

  public function process($method, $getData, $postData) {
    $this->getData = $getData;
    $this->postData = $postData;

    $this->userSessionModel = new UserSession();

    switch ($method) {
      case 'GET':
        $this->get();
        break;
      case 'POST':
        $this->post();
        break;
    }
  }

  protected function redirect($url) {
    header('location: /index.php?r=' . $url);
  }

  protected function get() {
    throw new \Exception("Unexpected get method call", 1);
  }

  protected function post() {
    throw new \Exception("Unexpected post method call", 1);
  }
}
