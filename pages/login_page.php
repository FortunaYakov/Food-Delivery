<?php

class LoginPage extends BasePage {
  private $userModel;

  public function __construct() {
    $this->userModel = new User();
  }

  public function get() {
    require_once './views/login.php';
  }

  public function post() {
    $user = $this->userModel->checkUser($this->postData['username'], $this->postData['password']);
    if ($user) {
      $this->userSessionModel->setUserId($user['id']);
      $this->redirect('/');
      return;
    }

    $this->get();
  }
}
