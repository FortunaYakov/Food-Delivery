<?php

class ACL {
  private $userSessionModel;
  private $userModel;
  private $accessModel;

  public function __construct() {
    $this->userSessionModel = new UserSession();
    $this->userModel = new User();
    $this->accessModel = new AccessModel();
  }

  public function checkAccess($url) {
    if ($this->userSessionModel->isLoggedIn()) {
      $access_lvl = $this->userModel->checkAccessLevel($this->userSessionModel->getUserId())['access_lvl'];
      $routes = $this->accessModel->getRoutes($access_lvl);
      return in_array($url, $routes);
    }

    return in_array($url, $this->accessModel->getRoutes(0));
  }
}
