<?php

class UserSession extends SessionModel {
  public function setUserId($id) {
    $this->session['user_id'] = $id;
  }

  public function getUserId() {
    return $this->session['user_id'];
  }

  public function isLoggedIn() {
    return isset($this->session['user_id']);
  }

  public function logOut() {
    unset($this->session['user_id']);
  }
}
