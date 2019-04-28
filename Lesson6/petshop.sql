-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2019 г., 16:08
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
  `new_flag` tinyint(1) NOT NULL DEFAULT 0,
  `hot_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `features`, `image_small`, `image`, `category`, `new_flag`, `hot_flag`) VALUES
(1, 'BARKING HEADS 12 KG', 'Сухой корм для взрослых собак супер-премиум класса', '12 кг \\n\r\nБеззерновой \\n\r\nПодходит для пожилых собак \\n\r\nОптимальное соотношение белка и жира', '457358_325x400.jpg', '457358_1600x1600.jpg', 1, 1, 0),
(2, 'DENTASTIX 7PCS MEDIUM', 'Лакомство для собак, способствует очищению зубов', 'Способствует удалению зубного налета \\n\r\nУкрепляет десны \\n\r\nУстраняет неприятный запах изо рта', '172504_325x400.jpg', '172504_1600x1600.jpg', 1, 0, 0),
(3, 'TUG ROPE FOR DOGS', 'Игрушка-веревка для собак', 'Прочная веревка \\n\r\nИзготовлена из натуральных волокон \\n\r\nНравится собакам', '304490_325x400.jpg', '304490_1600x1600.jpg', 1, 0, 1),
(4, 'MULTIVITAMINS FOR CATS', 'Мультивитамины для кошек', 'Содержит все витамины, необходимые для здоровья вашей кошки \\n\r\nДля взрослых кошек (старше 1 года) \\n\r\nМожно давать беременным и кормящим кошкам\r\n\r\n', '463448_325x400.jpg', '463448_1600x1600.jpg', 3, 0, 0),
(5, 'ALMO NATURE SNACKS', 'Лакомство для кошек', '100% натуральный состав \\n\r\nНравится кошкам \\n\r\nИспользуйте в качестве лакомства или как поощрение', '15257_325x400.jpg', '15257_1600x1600.jpg', 2, 0, 0),
(6, 'BARKING HEADS 400G', 'Консервы для собак старше 7 лет', 'Только натуральные ингредиенты \\n\r\nЛосось - легко усваиваемый белок \\n\r\nЦыпленок - гипоаллергенный белок \\n\r\nСельдерей \\n\r\nМорские водоросли \\n\r\nХондроитин для здоровья суставов', '325466_325x400.jpg', '325466_1600x1600.jpg', 1, 0, 0);

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
(8, 5, '2019-04-23 14:33:09', 'Натуральное лакомство. Кошке нравится!'),
(9, 6, '2019-04-23 14:36:03', 'Отличный продукт!'),
(10, 2, '2019-04-23 14:39:51', 'Даю своей собаке последние два месяца по 1 штуке в день. Собака ест с удовольствием! А еще у нее пропал неприятный запах из пасти. Рекомендую!'),
(11, 4, '2019-04-23 14:48:27', 'Даю своей кошке для укрепления зубов.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
