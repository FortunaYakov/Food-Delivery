<?php

class LogoutPage extends BasePage {
  public function post() {
    $this->userSessionModel->logOut();
    $this->redirect('/');
  }
}
