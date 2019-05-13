-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 13 2019 г., 04:07
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `petshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Товары для собак'),
(2, 'Товары для кошек'),
(3, 'Ветеринарная аптека');

-- --------------------------------------------------------

--
-- Структура таблицы `order_header`
--

CREATE TABLE `order_header` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` enum('New','In process','Completed','Cancelled') NOT NULL DEFAULT 'New',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_completed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `order_header`
--

INSERT INTO `order_header` (`id`, `user`, `status`, `date_created`, `date_completed`) VALUES
(2, 1, 'Cancelled', '2019-05-06 00:37:15', NULL),
(3, 1, 'New', '2019-05-06 01:22:18', NULL),
(4, 1, 'Completed', '2019-05-12 02:11:35', '2019-05-12 10:45:00'),
(5, 1, 'In process', '2019-05-13 01:22:01', NULL),
(6, 2, 'New', '2019-05-13 03:04:25', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_header` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`id`, `order_header`, `product`, `quantity`, `price`) VALUES
(2, 2, 1, 2, '5200.00'),
(3, 3, 1, 4, '5200.00'),
(7, 4, 1, 4, '5200.00'),
(8, 4, 2, 5, '180.00'),
(12, 5, 6, 1, '278.00'),
(13, 5, 3, 1, '350.00'),
(14, 5, 5, 1, '69.00'),
(15, 5, 4, 1, '480.00'),
(16, 6, 6, 1, '278.00'),
(17, 6, 3, 1, '350.00'),
(18, 6, 5, 1, '69.00'),
(19, 6, 4, 1, '480.00');

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `date_from` date NOT NULL DEFAULT current_timestamp(),
  `date_to` date NOT NULL DEFAULT '9999-12-31',
  `price` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `product`, `date_from`, `date_to`, `price`) VALUES
(1, 1, '2019-04-22', '9999-12-31', '5200.00'),
(2, 2, '2019-04-22', '9999-12-31', '180.00'),
(3, 3, '2019-04-22', '9999-12-31', '350.00'),
(4, 4, '2019-04-22', '9999-12-31', '480.00'),
(5, 5, '2019-04-22', '9999-12-31', '69.00'),
(6, 6, '2019-04-22', '9999-12-31', '278.00');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `features` text DEFAULT NULL,
  `image_small` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `date_from` date NOT NULL DEFAULT current_timestamp(),
  `date_to` date NOT NULL DEFAULT '9999-12-31',
  `new_flag` tinyint(1) NOT NULL DEFAULT 0,
  `hot_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `features`, `image_small`, `image`, `category`, `date_from`, `date_to`, `new_flag`, `hot_flag`) VALUES
(1, 'BARKING HEADS 12 KG', 'Сухой корм для взрослых собак супер-премиум класса', '12 кг \\n\r\nБеззерновой \\n\r\nПодходит для пожилых собак \\n\r\nОптимальное соотношение белка и жира', '457358_325x400.jpg', '457358_1600x1600.jpg', 1, '2019-05-04', '9999-12-31', 1, 0),
(2, 'DENTASTIX 7PCS MEDIUM', 'Лакомство для собак, способствует очищению зубов', 'Способствует удалению зубного налета \\n\r\nУкрепляет десны \\n\r\nУстраняет неприятный запах изо рта', '172504_325x400.jpg', '172504_1600x1600.jpg', 1, '2019-05-04', '9999-12-31', 0, 0),
(3, 'TUG ROPE FOR DOGS', 'Игрушка-веревка для собак', 'Прочная веревка \\n\r\nИзготовлена из натуральных волокон \\n\r\nНравится собакам', '304490_325x400.jpg', '304490_1600x1600.jpg', 1, '2019-05-04', '9999-12-31', 0, 1),
(4, 'MULTIVITAMINS FOR CATS', 'Мультивитамины для взрослых кошек', 'Содержит все витамины, необходимые для здоровья вашей кошки \r\nДля взрослых кошек (старше 1 года) \r\nМожно давать беременным и кормящим кошкам\r\n\r\n                        ', '463448_325x400.jpg', '463448_1600x1600.jpg', 3, '2019-05-04', '9999-12-31', 0, 1),
(5, 'ALMO NATURE SNACKS', 'Лакомство для кошек', '100% натуральный состав \\n\r\nНравится кошкам \\n\r\nИспользуйте в качестве лакомства или как поощрение', '15257_325x400.jpg', '15257_1600x1600.jpg', 2, '2019-05-04', '9999-12-31', 0, 0),
(6, 'BARKING HEADS 400G', 'Консервы для собак старше 7 лет', 'Только натуральные ингредиенты \\n\r\nЛосось - легко усваиваемый белок \\n\r\nЦыпленок - гипоаллергенный белок \\n\r\nСельдерей \\n\r\nМорские водоросли \\n\r\nХондроитин для здоровья суставов', '325466_325x400.jpg', '325466_1600x1600.jpg', 1, '2019-05-04', '9999-12-31', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `product`, `date_created`, `text`) VALUES
(1, 5, '2019-04-23 13:50:33', 'Кошка их просто обожает!'),
(6, 5, '2019-04-23 14:27:39', 'Натуральное лакомство. Кошке нравится!'),
(9, 6, '2019-04-23 14:36:03', 'Отличный продукт!'),
(10, 2, '2019-04-23 14:39:51', 'Даю своей собаке последние два месяца по 1 штуке в день. Собака ест с удовольствием! А еще у нее пропал неприятный запах из пасти. Рекомендую!'),
(11, 4, '2019-04-23 14:48:27', 'Даю своей кошке для укрепления зубов.'),
(12, 5, '2019-04-29 01:23:14', 'Супер! Рекомендую.'),
(13, 2, '2019-04-29 01:27:00', 'Очень рекомендую!'),
(14, 1, '2019-04-29 02:22:01', 'Экономичная упаковка. Отличный состав.'),
(15, 3, '2019-04-29 02:23:30', 'Отличная игрушка, особенно нравится щенкам.'),
(16, 3, '2019-04-29 02:24:50', 'Это любимая игрушка у моего щенка. Рекомендую.'),
(17, 4, '2019-04-29 02:44:05', 'Подходящая цена.'),
(18, 6, '2019-04-29 02:57:56', 'Собака ест с удовольствием.'),
(19, 1, '2019-05-05 15:44:12', 'Хороший корм, рекомендую.'),
(20, 1, '2019-05-05 15:46:17', 'Покупаю уже пару лет. Питомец доволен.');

-- --------------------------------------------------------

--
-- Структура таблицы `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user`, `product`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `administrator` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `first_name`, `last_name`, `administrator`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@user.com', 'Jonh', 'Doe', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@user.com', 'User Name', 'User Surname', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_header`
--
ALTER TABLE `order_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_header` (`order_header`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_ibfk_1` (`product`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`);

--
-- Индексы таблицы `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `order_header`
--
ALTER TABLE `order_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_header`
--
ALTER TABLE `order_header`
  ADD CONSTRAINT `order_header_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_header`) REFERENCES `order_header` (`id`);

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Ограничения внешнего ключа таблицы `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
