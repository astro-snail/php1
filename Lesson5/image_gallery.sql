-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2019 г., 04:32
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
-- База данных: `image_gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `path_small` varchar(255) NOT NULL,
  `name_small` varchar(30) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `path`, `name`, `path_small`, `name_small`, `views`) VALUES
(1, 'images/big', '464571_1600x1600.jpg', 'images/small', '464571_325x400.jpg', 2),
(2, 'images/big', '464573_1600x1600.jpg', 'images/small', '464573_325x400.jpg', 5),
(3, 'images/big', '464574_1600x1600.jpg', 'images/small', '464574_325x400.jpg', 0),
(4, 'images/big', '464575_1600x1600.jpg', 'images/small', '464575_325x400.jpg', 0),
(5, 'images/big', '464588_1600x1600.jpg', 'images/small', '464588_325x400.jpg', 0),
(6, 'images/big', '464592_1600x1600.jpg', 'images/small', '464592_325x400.jpg', 0),
(7, 'images/big', '464593_1600x1600.jpg', 'images/small', '464593_325x400.jpg', 0),
(8, 'images/big', '464594_1600x1600.jpg', 'images/small', '464594_325x400.jpg', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
