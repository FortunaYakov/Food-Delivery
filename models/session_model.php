<?php

class SessionModel {
  protected $session;

  public function __construct() {
    $this->session =& $_SESSION;
  }
}
