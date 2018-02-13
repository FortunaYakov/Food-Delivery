<?php

class Cart extends SessionModel {
  public function __construct() {
    parent::__construct();

    if (!isset($this->session['cart'])) {
      $this->session['cart'] = [];
    }
  }

  public function getProducts() {
    return $this->session['cart'];
  }

  public function addProduct($id) {
    if (!isset($this->session['cart'][$id])) {
      $this->session['cart'][$id] = 1;
    } else {
      $this->session['cart'][$id]++;
    }
  }

  public function substractProduct($id) {
    if (!isset($this->session['cart'][$id])) {
      return;
    }

    $this->session['cart'][$id]--;
    if ($this->session['cart'][$id] <= 0) {
      unset($this->session['cart'][$id]);
    }
  }

  public function reset() {
    $this->session['cart'] = [];
  }
}
