<?php

class ProductPage extends BasePage {
	private $productModel;

	public function __construct() {
		$this->productModel = new Product();
		$this->userModel = new User();
	}

	public function get() {
		$product = $this->productModel->getProductById($this->getData['id']);
		require_once './views/product.php';
	}
}
