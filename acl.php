<?php

class ACL {
  private $userSessionModel;
  private $userModel;

  private $anonWhiteList = ['/', '/login', '/register'];
  private $userWhiteList = ['/', '/logout', '/cart', '/cart/add', '/cart/substract'];

  public function __construct() {
    $this->userSessionModel = new UserSession();
    $this->userModel = new User();
  }

  public function checkAccess($url) {
    if ($this->userSessionModel->isLoggedIn()) {
      if ($this->userModel->isAdmin($this->userSessionModel->getUserId())) {
        return true;
      }

      return in_array($url, $this->userWhiteList);
    }

    return in_array($url, $this->anonWhiteList);
  }
}
