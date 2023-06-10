-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2023 г., 16:55
-- Версия сервера: 5.7.38
-- Версия PHP: 7.4.29

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
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL COMMENT 'id продукта',
  `user_id` int(11) DEFAULT NULL COMMENT 'id пользователя',
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'имя пользователя',
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'номер телефона пользователя',
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'email покупателя',
  `kolvo` int(11) NOT NULL COMMENT 'кол-во в заказе',
  `ves` double NOT NULL COMMENT 'вес товара',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'дата заказа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_product`, `user_id`, `user_name`, `user_phone`, `user_email`, `kolvo`, `ves`, `data`) VALUES
(1, 5, 3, 'asd', '89123456789', 'asd@asd.ru', 2, 0.5, '2023-06-10 07:50:17'),
(2, 7, 3, 'asd', '89123456789', 'asd@asd.ru', 1, 1.5, '2023-06-10 07:50:17'),
(3, 9, 3, 'asd', '89123456789', 'asd@asd.ru', 1, 1, '2023-06-10 07:50:17'),
(4, 3, 2, 'qwe', '89112233456', 'qwe@qwe.qwe', 3, 0.5, '2023-06-10 07:50:17'),
(5, 4, 2, 'qwe', '89112233456', 'qwe@qwe.qwe', 3, 0.5, '2023-06-10 07:50:17'),
(6, 1, 2, 'qwe', '89112233456', 'qwe@qwe.qwe', 2, 2, '2023-06-10 07:50:17'),
(7, 13, 2, 'qwe', '89112233456', 'qwe@qwe.qwe', 1, 3, '2023-06-10 07:50:17'),
(8, 14, 1, 'admin', '99999999', 'a@a.a', 1, 1, '2023-06-10 07:50:17'),
(9, 5, 1, 'admin', '99999999', 'a@a.a', 1, 1, '2023-06-10 07:50:17'),
(10, 10, NULL, 'zxc', '89776655444', 'zxc@zxc.com', 1, 10, '2023-06-10 07:50:17'),
(11, 2, NULL, 'vbn', '89012345678', 'vbn@vbn.vbn', 1, 1, '2023-06-10 07:50:17'),
(12, 9, NULL, 'vbn', '89012345678', 'vbn@vbn.vbn', 1, 1, '2023-06-10 07:50:17'),
(13, 10, NULL, 'vbn', '89012345678', 'vbn@vbn.vbn', 1, 1, '2023-06-10 07:50:17'),
(14, 5, NULL, 'vbn', '89012345678', 'vbn@vbn.vbn', 1, 0.5, '2023-06-10 07:50:17'),
(15, 14, NULL, 'vbn', '89012345678', 'vbn@vbn.vbn', 1, 0.8, '2023-06-10 07:50:17');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'id категории',
  `srok_godnosti` int(11) NOT NULL DEFAULT '0' COMMENT 'срок годности (месяцев)',
  `price` float NOT NULL COMMENT 'Цена',
  `availability` int(11) NOT NULL COMMENT 'Доступность в шт?',
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Бренд',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img\\st.jpg' COMMENT 'URL картинки',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание',
  `is_new` int(11) NOT NULL DEFAULT '0' COMMENT 'Новый?',
  `is_recommended` int(11) NOT NULL DEFAULT '0' COMMENT 'Рекомендуемый?',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Показывать?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `srok_godnosti`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Luker 65% TUMACO 1906', 4, 24, 1030, 123, '123', 'img\\st.jpg', '123', 0, 0, 1),
(2, 'Callebaut 823 33,6%', 2, 18, 875, 123, '123', 'img\\ct.jpg', '123', 1, 0, 1),
(3, 'Cargill 54%', 3, 18, 590, 3, '3', 'img\\st.jpg', '3', 0, 0, 1),
(4, 'SICAO 28% каллеты', 1, 12, 655, 3, '3', 'img\\sb.jpg', '3', 0, 0, 1),
(5, 'Barry Callebaut дезодорированное', 5, 36, 1050, 3, '3', 'img\\nh.jpg', '3', 0, 0, 1),
(6, 'Carma Dark Bourbon 50%', 3, 3, 710, 3, '3', 'img\\it.jpg', '3', 0, 0, 1),
(7, 'Zephyr 34%', 1, 18, 1480, 20, 'Cacao Barry', 'img\\cb.jpg', '34% какао, 25.8% молоко, 40.4% жиры. Очень мягкий и едва подслащенный белый шоколад с гладкой текстурой и насыщенным вкусом цельного молока', 1, 1, 1),
(8, 'Бельгийский белый шоколад Sicao', 1, 12, 722, 500, 'Sicao', 'img\\sb.jpg', 'Каллеты\r\nОбласть применения: формование и глазирование', 0, 1, 1),
(9, 'Молочный шоколад Callebaut с карамелью', 2, 12, 1437, 40, 'Callebaut', 'img\\cm.jpg', 'Caramel Callets™. Молочный шоколад с настоящей карамелью', 1, 1, 1),
(10, 'Молочный шоколад Milk Seriz 35%', 2, 18, 964, 10, 'Carma', 'img\\sm.jpg', '35% какао, 19% молоко, 39,2% жиры. Отличается более кремовой текстурой, благодаря более высокому содержанию молока и чуть менее сладкому вкусу с нежными нотками какао.', 1, 0, 1),
(11, 'Тёмный шоколад Recipe N°811, 54.5%.', 3, 24, 914, 25, 'Callebaut', 'img\\st.jpg', 'Содержание какао 54,5%. Насыщенный вкус какао и тонкие фруктовые ноты. ', 0, 1, 1),
(12, 'Горький шоколад Recipe N°70-30-42, 70.3%', 4, 24, 1022, 100, 'Callebaut', 'img\\st.jpg', 'Очень горький шоколад, с высоким содержанием какао 70.3%', 0, 1, 1),
(13, 'Горький шоколад Ocoa 70%', 4, 24, 1462, 10, 'Cacao Barry', 'img\\ct.jpg', '70% какао, 38,7% жиры. Особый шоколадный кувертюр с хорошим вкусом какао и легкой кислинкой', 0, 1, 1),
(14, 'Какао масло Mycryo', 5, 12, 2471, 5, 'Callebaut', 'img\\zh.jpg', '100% натуральное какао-масло в виде микропорошка', 1, 1, 1);

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
(7, 'admin', '99999999', 'a@a.a', 'отложить', 1, '2023-06-09 21:29:14', '{\"9\":[1.5,1],\"14\":[1,2],\"11\":[2.5,1]}', 1),
(8, 'qwe', '89112233456', 'qwe@qwe.qwe', '', 2, '2023-06-09 21:29:57', '{\"7\":[0.5,6]}', 1),
(9, 'qwe', '89112233456', 'qwe@qwe.qwe', 'на пробу, добавить к предыдущему заказу', 2, '2023-06-09 21:30:41', '{\"9\":[0.5,1],\"10\":[0.5,1],\"2\":[0.5,1]}', 1),
(10, 'asd', '89123456789', 'asd@asd.ru', 'aaaa', 3, '2023-06-09 21:31:32', '{\"1\":[2,4],\"4\":[2,2],\"5\":[1,1]}', 1),
(11, 'zxc', '89776655444', 'zxc@zxc.com', '', NULL, '2023-06-09 21:32:04', '{\"5\":[0.5,1],\"6\":[0.5,1],\"7\":[0.5,1],\"9\":[0.5,1]}', 1),
(12, 'vbn', '89012345678', 'vbn@vbn.vbn', ')', NULL, '2023-06-09 21:32:40', '{\"4\":[2.5,1],\"7\":[2.5,1],\"8\":[2.5,3]}', 1),
(13, 'admin', '99999999', 'a@a.a', '', 1, '2023-06-10 12:47:36', '{\"1\":[0.5,1]}', 1),
(14, 'шшшшшшш', '89123456789', 'a@a.a', '', NULL, '2023-06-10 13:01:39', '{\"1\":[1,1],\"7\":[0.8,1]}', 1),
(15, 'admin', '99999999', 'a@a.a', '', 1, '2023-06-10 13:49:04', '{\"3\":[0.5,1],\"4\":[0.5,2],\"5\":[1,1]}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0' COMMENT 'Админ?',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Номер телефона без кода страны',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пароль'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `phone`, `email`, `password`) VALUES
(1, 1, 'admin', '99999999', 'a@a.a', 'qweqweqwe'),
(2, 0, 'qwe', '89112233456', 'qwe@qwe.qwe', 'qweqweqwe'),
(3, 0, 'asd', '89123456789', 'asd@asd.ru', 'asdasdasd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_2` (`id_product`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `price` (`price`);

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
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

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
