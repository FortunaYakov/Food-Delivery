<?php

class RegisterPage extends BasePage {
  private $userModel;

  public function __construct() {
    $this->userModel = new User();
  }

  public function get() {
    require_once './views/register.php';
  }

  public function post() {
    if ($this->postData['password'] != $this->postData['password_confirm']) {
      # $this->redirect('/register');
      $this->get();
      return;
    }

    if ($this->userModel->checkUserByName($username)) {
      $this->get();
      return;
    }

    $this->userModel->createUser($this->postData['username'], $this->postData['password']);
    $this->redirect('/login');
  }
}
