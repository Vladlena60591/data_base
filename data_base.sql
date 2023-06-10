-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2023 г., 22:24
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `data_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя категории',
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'Порядок при отображении',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Показать?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(0, 'Выбрать все', 0, 1),
(1, 'Белый шоколад', 1, 1),
(2, 'Молочный шоколад', 2, 1),
(3, 'Темный шоколад', 3, 1),
(4, 'Горький шоколад', 4, 1),
(5, 'Какао-масло', 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'id категории',
  `code` int(11) NOT NULL DEFAULT '0' COMMENT 'код товара',
  `price` float NOT NULL COMMENT 'Цена',
  `availability` int(11) NOT NULL COMMENT 'Доступность в шт?',
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Бренд',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'URL картинки',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание',
  `is_new` int(11) NOT NULL DEFAULT '0' COMMENT 'Новый?',
  `is_recommended` int(11) NOT NULL DEFAULT '0' COMMENT 'Рекомендуемый?',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Показывать?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Luker 65% TUMACO 1906', 4, 0, 1030, 123, '123', '213', '123', 0, 0, 1),
(2, 'Callebaut 823 33,6%', 2, 0, 875, 123, '123', '213', '123', 1, 0, 1),
(3, 'Cargill 54%', 3, 0, 590, 3, '3', '3', '3', 0, 0, 1),
(4, 'SICAO 28% каллеты', 1, 0, 655, 3, '3', '3', '3', 0, 0, 1),
(5, 'Barry Callebaut дезодорированное', 5, 0, 1050, 3, '3', '3', '3', 0, 0, 1),
(6, 'Carma Dark Bourbon 50%', 3, 3, 710, 3, '3', '3', '3', 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'имя пользователя',
  `user_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'номер телефона',
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'E-mail пользователя',
  `user_comment` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'комментарий',
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'дата',
  `products` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'продукт (id товара; вес: кол-во)',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'статус заказа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_email`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(1, 'admin', '99999999', 'a@a.a', '', 1, '2023-06-09 18:48:15', '{\"1\":[2,1]}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0' COMMENT 'Админ?',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя',
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Номер телефона без кода страны',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пароль'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `phone`, `email`, `password`) VALUES
(1, 1, 'admin', '99999999', 'a@a.a', 'qweqweqwe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
