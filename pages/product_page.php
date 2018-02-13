<?php

class ProductPage extends BasePage {
	private $productModel;

	public function __construct() {
		$this->productModel = new Product();
	}

	public function get() {
		$product = $this->productModel->getProductById($this->getData['id']);
		require_once './views/product.php';
	}
}