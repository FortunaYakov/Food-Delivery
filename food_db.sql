-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 13 2018 г., 23:41
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `food_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Pizza', 'Pizza is a traditional Italian dish consisting of a yeasted flatbread typically topped with tomato sauce and cheese and baked in an oven. It can also be topped with additional vegetables, meats, and condiments, and can be made without cheese.'),
(2, 'Burger', 'sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, barbecued, or flame broiled.'),
(3, 'sushi', 'a Japanese dish of cold cooked rice shaped in small cakes and topped or wrapped with other ingredients (such as pieces of raw fish)'),
(5, 'noodles', 'A type of pasta made with flour and water and sometimes eggs, cut into thin strips. The strands come in numerous shapes and sizes and can be fresh or dried.'),
(6, 'bbq', 'Barbecuing is done slowly over low, indirect heat and the food is flavored by the smoking process, while grilling, a related process, is generally done quickly over moderate-to-high direct heat that produces little smoke.'),
(7, 'salads', 'A salad is a dish consisting of a mixture of small pieces of food, usually vegetables.[1][2] Salads are typically served at room temperature or chilled, with notable exceptions such as south German potato salad which is served warm. Salads may contain virtually any type of ready-to-eat food.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float(10,2) NOT NULL,
  `address` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `create_date`, `total`, `address`) VALUES
(2, 1, '2018-02-13 20:21:44', 781.00, 'Odessa'),
(3, 1, '2018-02-13 23:10:49', 3632.00, 'Odessa');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` float(10,2) NOT NULL,
  `old_price` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`order_id`),
  KEY `product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `count`, `old_price`) VALUES
(1, 2, 1, 1.00, 118.00),
(2, 2, 11, 1.00, 118.00),
(3, 2, 12, 1.00, 70.00),
(4, 2, 13, 1.00, 40.00),
(5, 2, 17, 1.00, 100.00),
(6, 2, 44, 1.00, 135.00),
(7, 2, 46, 1.00, 200.00),
(8, 3, 1, 8.00, 118.00),
(9, 3, 3, 21.00, 128.00);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `price` float(10,2) NOT NULL,
  `categori_id` int(11) NOT NULL,
  `image` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categori_id` (`categori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `categori_id`, `image`) VALUES
(1, '4 meat', 'Mozzarella • Bavarian sausages • ham • beef • chicken grill • tomato • tomato sauce (base)', 118.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557042/4meat.jpg'),
(2, '4 seasons', 'Mozzarella • bacon • ham • olives • pepper bulgarian • tomato • salami Pepperoni • tomato sauce (base) • champignons', 128.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557042/4seasons.png'),
(3, '4 cheeses', 'Dor blues • Mozzarella • Parmesan • Cheddar • tomato sauce (base)', 128.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557052/4cheses.png'),
(4, 'Hawaiian', '\r\nMozzarella • pineapple • chicken grilled • tomato sauce (base)', 118.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557037/havaii.jpg'),
(5, 'Philadelphia', '\r\nMozzarella • sesame • tomato • Alfredo cream sauce (base) • cream cheese • salmon', 128.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557032/filadelfia.png'),
(6, 'Pork Barbecue', 'BBQ sauce • BBQ sauce (base) • Mozzarella • pineapple • bacon • onion • jalapeno pepper • pork', 118.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557380/porkBBQ.png'),
(7, 'Margarita', 'Mozzarella • Parmesan • tomato • tomato sauce (base)', 106.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557047/margarita.jpg'),
(8, 'Marinara', 'Mozzarella • squid • shrimp • olives • mussels • cream sauce Alfredo (base)', 128.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557047/marinara.jpg'),
(9, 'Pepperoni', 'Mozzarella • salami Pepperoni • tomato sauce (base)', 118.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557029/peperoni.png'),
(10, 'Sicilian', 'Mozzarella • grilled chicken • tomato sauce (base) • champignons', 118.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557026/sicilian.png'),
(11, 'Chickenite', 'Mozzarella • grilled chicken • tomato • cheese sauce (base)\r\n', 118.00, 1, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557026/chikennita.png'),
(12, 'Big Mac', 'Two beef steaks from natural beef, onion, pickled cucumber, Cheddar cheese, fresh salad dressed with a special sauce, in a bunch of sesame seeds.\r\n', 70.00, 2, 'http://res.cloudinary.com/fortunatest/image/upload/c_scale,h_280,w_356/v1518556254/bidmac.jpg'),
(13, 'Dable Cheeseburger', 'Two beef steaks from natural beef, two slices of cheese \"Cheddar\", onion, mustard, ketchup, bun.\r\n', 40.00, 2, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557577/dablchees.png'),
(14, 'Vejee burger\r\n', 'We do not forget about vegetarians and those who observe fasting days. For them, there is a special burger recipe. In Vegi burger we put cutlets from chickpeas - turkey peas, which is very rich in vegetable protein and fiber.\r\n', 85.00, 2, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557638/veggie_burger.png'),
(15, 'Ranch burger\r\n', 'Do you like burgers? We will gladly offer you some branded recipes, and one of them is the \"Ranch Burger\". This delicious and fragrant burger we cook from beef or chicken steak of your choice. The product also includes pickled cucumbers and onions, a fresh iceberg salad.\r\n', 90.00, 2, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557714/ranchburger.jpg'),
(16, 'Grand burger\r\n', 'Grand burger is a double pleasure. In a large bun, sprinkled with sesame, you will find not only steak chicken or beef, but also fragrant bacon.\r\n', 100.00, 2, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557770/grandburger.jpg'),
(17, 'Jack burger\r\n', 'In a large bun with sesame powder, a juicy beefsteak of chicken or beef hides (at your choice and taste preferences). Strips of bacon add juicy flavor meat, and onion rings and onion chips are crunchy and a little keen. Without a sauce, there are no burgers.\r\n', 100.00, 2, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557863/black-jack-burger.png'),
(18, 'Fish burger\r\n', 'For those who are very fond of sandwiches, but do not eat meat, there is a great alternative - Fish burger. In a large sesame bun, we put a juicy bass cooked in breading, and a slice of cheddar cheese.\r\n', 114.00, 2, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557911/fish-burgers.jpg'),
(19, 'Nigiri', 'A topping, usually fish, served on top of sushi rice\r\nNot all nigiri is raw, though this dish is best for people who want to appreciate the flavor of the fish, shellfish, or other toppings\r\n', 110.00, 3, 'http://res.cloudinary.com/fortunatest/image/upload/v1518557970/nigiri-sushi.jpg'),
(20, 'Sashimi', 'Fish or shellfish served alone (no rice)\r\nThis is best for people who really love to taste the fish or shellfish since it comes with nothing else', 100.00, 3, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558034/sushini.jpg'),
(21, 'Maki', 'Rice and filling wrapped in seaweed\r\nThis is what most people think of when they think of sushi rolls', 105.00, 3, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558070/maki-rolli-eto.jpg'),
(22, 'Uramaki', 'Similar to the above, but rice is on the outside and seaweed wraps around the filling\r\nThese rolls often have lots of toppings and sauces — they may either be cooked or raw', 100.00, 3, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558138/Uramaki-1.jpg'),
(23, 'Temaki', 'Sushi that has been hand-rolled into a cone shape\r\nThe cones are not as easy to share as the rolls (though very delicious!)', 107.00, 3, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558171/Temaki-Sushi-II.jpg'),
(24, 'RAMEN', 'Ramen availability and sophistication has finally evolved beyond the 10-cents-a-package version that got some of us through college. Wheat flour gives them their chewy bounce, and egg gives them their rich yellow complexion. Known as a Japanese specialty, ramen, too, was invented in China. These noodles are available fresh, fresh-frozen, or dried. The cellophane-packaged bricks of dried ramen—including the Top Ramen you remember from childhood—are deep fried.', 135.00, 5, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558220/ramen-6.jpg'),
(25, 'UDON', 'Made simply from wheat flour and water, these thick, chewy Japanese noodles are most often sold fresh. The traditional way to serve them is submerged in broth and adorned with a variety of toppings including tempura, fish cakes, vegetables or simply a shower of sliced scallions.\r\n\r\n', 135.00, 5, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558254/Udon.jpg'),
(26, 'SOBA', 'These Japanese noodles get their grey-brown hue and nutty flavor from buckwheat flour (although “soba” can also refer to any thin Japanese noodle). Especially in summer, soba is served chilled, with a simple dipping sauce made from dashi, soy sauce and mirin. In chilly weather, enjoy soba in soup.\r\n\r\n', 130.00, 5, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558301/Soba.jpg'),
(27, 'SOMEN', 'These thin, delicate Japanese noodles are made from wheat flour and a bit of oil. Like soba, somen noodles are most often served chilled, with a bowl of mild sauce for dipping.\r\n\r\n', 125.00, 5, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558341/somen.jpg'),
(28, 'CHINESE EGG NOODLES\r\n', 'Made with wheat flour and egg, these are the noodles you know well from Chinese takeout menus in the form of chow mein and lo mein.\r\n\r\nHelpful hint: In Chinese, “mein” refers to noodles made with wheat flour; “fun” refers to noodles made with rice flour or mung bean starch.', 126.00, 5, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558402/ChineseEggNoodles.jpg'),
(29, 'RICE NOODLES\r\n', 'The wide world of rice noodles involves many names, nationalities, and dishes, but are easiest to categorize simply by their four basic sizes: vermicelli, thin, medium and wide.\r\n\r\nBecause they don’t have gluten to hold them together, noodles made from rice flour are more delicate than those made with wheat flour. Like cellophane noodles, rice noodles usually only need to be soaked in hot water (not boiled) before you add them to your soup, salad or stir-fry.\r\n\r\nNote that the names below are phonetic translations so the spellings may vary slightly across brands. And because each variety goes by so many different names even in the same language, often the easiest way to find what you’re looking for is simply look at the noodles, which usually come in clear packages, and grab the size you need.', 145.00, 5, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558438/Rice-Noodles.jpg'),
(30, 'Spicy Carrot Salad', 'Microwave grated carrots and minced garlic in 1/4 cup water until crisp-tender. Drain; toss with lemon juice, olive oil, salt, red pepper flakes and parsley.', 50.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558483/CarrotSalad.jpg'),
(31, 'Asian Apple Slaw', 'Mix rice vinegar and lime juice with salt, sugar and fish sauce. Toss with julienned jicama and apple, chopped scallions and mint.', 50.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558538/asian-sesame-apple-.jpg'),
(32, 'savannah chopped salad', 'Fresh flavors put together in a fresh way.\r\nTry a bouquet of flavors with grilled chicken, dried cranberries, Gorgonzola, honey roasted almonds, tomatoes and cucumbers, perfectly arranged so that you enjoy every bite.', 75.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558589/Savannah.jpg'),
(33, 'southwest cobb\r\n', 'This isn’t your grandmother’s cobb salad.\r\nWe put grilled chicken, fire-roasted corn and poblano pepper relish, guacamole, cheddar-jack, tomatoes and tortilla chips all over a bed of lettuce for tons of flavor.', 55.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558625/Cobbsalad.jpg'),
(34, 'harvest chicken salad\r\n', 'The whole food pyramid on your plate.\r\nOur chicken salad is made from fresh pulled chicken, cranberries, pecans and paired with our garden salad. It’s a great way to make your salad into more of a meal.', 65.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558738/harvestchiken.jpg'),
(35, 'caesar salad', 'Hail the great Caesar.\r\nThe classics became a classic for a reason. We put together a mean Caesar with Romaine, Parmesan cheese, croutons and our Caesar dressing. Try it with grilled chicken.', 40.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558804/caesarsalad.jpg'),
(36, 'grilled chicken salad\r\n', 'Play chicken with your salad.\r\nOur seasoned grilled chicken goes perfectly with the crisp lettuce, cheddar-jack, tomatoes, cucumbers and croutons on our house salad. It’s a great way to add protein to all those vitamins and minerals.', 66.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558869/healthy-grilled-chicken-salad.jpg'),
(37, 'chef salad', 'Add more meat to your veggies.\r\nPut a little more protein in your diet by adding sliced turkey, ham and bacon, just the way our chef likes it, which is probably why his name is on it.', 81.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558908/Chef-Salad.png'),
(38, 'taco salad\r\n', 'Fiesta like there’s no mañana.\r\nHave fun with your salad by mixing it with chili, tortilla chips, cheddar-jack, jalapeños, red onions, tomatoes, guacamole and sour cream.', 70.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558941/tacosalad.jpg'),
(39, 'tuna salad\r\n', 'A whole ocean of flavor on your salad.\r\nWe take tuna, relish and mayo and turn it into a feast when we place it on our full garden salad. It’s a great way to make your salad as sweet as the sea.', 45.00, 7, 'http://res.cloudinary.com/fortunatest/image/upload/v1518558976/tunasalad.jpg'),
(40, 'Baby Back Ribs\r\n', 'The tenderest, meatiest little pork ribs, slow-cooked with sweet hickory smoke, then grilled and basted with our special BBQ sauce.  \r\n\r\n', 150.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559035/babtbackribs.jpg'),
(41, 'St. Louis Spare Ribs\r\n', 'Select lean, juicy pork ribs, seasoned with Lucille\'s special rub, slowly smoked, then grilled and basted with our homemade BBQ sauce. The way they like \'em in Missouri!  \r\n\r\n', 160.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559072/st-louis-ribs.jpg'),
(42, 'BBQ Tri Tip\r\n', 'Certified Angus Beef tri tip, smoked all day until it melts in your mouth. Served sliced with our savory mop sauce.  \r\n\r\n', 140.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559114/bbqtriptip.jpg'),
(43, 'BBQ Half Chicken & Two Meat Platter\r\n', 'Smoked BBQ half chicken and your choice of any two meats: Signature sausages, pulled pork, rib tips or brisket burnt ends.  \r\n\r\n', 145.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559156/BBQ-Chicken-Combo.jpg'),
(44, 'Back Porch: Ribs, Chicken & Tri Tip Platter\r\n', 'Our lip smackin\' half chicken and BBQ tri tip served with your choice of baby back, St. Louis or beef ribs.  \r\n\r\n', 135.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559203/bbqcombo.jpg'),
(45, 'Front Porch: Chicken, Ribs, & Sausage\r\n', 'Smoked half chicken and two signature sausages served with your choice of baby back, St. Louis or beef ribs.   \r\n\r\n', 185.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559243/frontporch.jpg'),
(46, 'Backyard Family Feast\r\n', 'Like an outdoor picnic! Choice of two racks of baby back, St. Louis or beef ribs and two half BBQ chickens, plus your choice of four sides. Served family-style for four or more.  \r\n\r\n', 200.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559323/beer-bbq-fest-june14.jpg'),
(47, 'Lucille\'s Super Feast\r\n', 'Feed the whole family for less! Choice of three racks of baby back, St. Louis or beef ribs and four half BBQ chickens, with your choice of two pounds of two of the following; sausages, tri tip, pulled pork, rib tips or brisket burnt ends, a large tossed green salad, plus your choice of six sides. Served family-style for ten or more.  \r\n\r\n', 220.00, 6, 'http://res.cloudinary.com/fortunatest/image/upload/v1518559400/superbbqfeast.png');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(256) COLLATE utf8_bin NOT NULL,
  `access_lvl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `rolename`, `access_lvl`) VALUES
(1, 'Admin', 5),
(2, 'user', 3),
(3, 'Unknown user', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) COLLATE utf8_bin NOT NULL,
  `access_lvl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `routes`
--

INSERT INTO `routes` (`id`, `url`, `access_lvl`) VALUES
(1, '/', 0),
(2, '/register', 0),
(3, '/login', 0),
(4, '/logout', 3),
(5, '/search', 0),
(6, '/cart', 3),
(7, '/cart/add', 3),
(8, '/cart/substract', 3),
(9, '/order', 3),
(10, '/admin', 5),
(11, '/admin/orders', 5),
(12, '/admin/details', 5),
(13, '/admin/price_changes', 5),
(14, '/admin/graphic', 5),
(15, '/product', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Robot', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(3, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 2);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categori_product` FOREIGN KEY (`categori_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
