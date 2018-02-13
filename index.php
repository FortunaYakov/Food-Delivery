<?php
session_start();

require_once './models/base_model.php';
require_once './models/category.php';
require_once './models/product.php';
require_once './models/user.php';
require_once './models/order.php';

require_once './models/session_model.php';
require_once './models/user_session.php';
require_once './models/cart.php';

require_once './pages/base_page.php';
require_once './pages/index_page.php';
require_once './pages/register_page.php';
require_once './pages/login_page.php';
require_once './pages/logout_page.php';
require_once './pages/admin_page.php';
require_once './pages/cart_page.php';
require_once './pages/add_to_cart.php';
require_once './pages/substract_from_cart.php';
require_once './pages/order_page.php';
require_once './pages/product_page.php';

require_once './acl.php';
require_once './router.php';

$router = new Router($_SERVER, $_GET, $_POST);

$userSessionModel = new UserSession();

$router->registerACL(new ACL());

$router->addRoute('/', new IndexPage());
$router->addRoute('/register', new RegisterPage());
$router->addRoute('/login', new LoginPage());
$router->addRoute('/logout', new LogoutPage());
$router->addRoute('/cart', new CartPage());
$router->addRoute('/cart/add', new AddToCart());
$router->addRoute('/cart/substract', new SubstractFromCart());
$router->addRoute('/order', new OrderPage());
$router->addRoute('/product', new ProductPage());

$router->addRoute('/admin', new AdminPage());

$router->serve($_SESSION);
