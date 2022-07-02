-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 03 2022 г., 00:03
-- Версия сервера: 8.0.29
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizzav2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addition`
--

CREATE TABLE `addition` (
  `id_addition` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `addition`
--

INSERT INTO `addition` (`id_addition`, `name`, `price`, `picture`) VALUES
(1, 'Сырные бортики', 120, '../сам_введёшь/'),
(2, 'Дополнительная порция мяса', 100, '../сам_введёшь/'),
(3, 'Острый перец халапеньо', 50, '../сам_введёшь/');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `id_order` int DEFAULT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_cart`, `id_order`, `amount`) VALUES
(1, 2, 3),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `cart_product`
--

CREATE TABLE `cart_product` (
  `id_cart_product` int NOT NULL,
  `id_cart` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `id_addition` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart_product`
--

INSERT INTO `cart_product` (`id_cart_product`, `id_cart`, `id_product`, `id_addition`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 4, NULL),
(4, 2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `name`, `description`, `picture`) VALUES
(1, 'Лучшая новость за последнюю тисячу лет!!', 'НОВИНКА', 'слайдер1.webp'),
(2, '', '', 'слайдер2.webp'),
(3, '', 'Скоро конец акции', 'слайдер3.webp'),
(4, '', 'По субботам', 'слайдер4.webp');

-- --------------------------------------------------------

--
-- Структура таблицы `ordered`
--

CREATE TABLE `ordered` (
  `id_order` int NOT NULL,
  `order_date` date NOT NULL,
  `adress` varchar(50) NOT NULL,
  `id_user` int DEFAULT NULL,
  `isPaied` tinyint(1) NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ordered`
--

INSERT INTO `ordered` (`id_order`, `order_date`, `adress`, `id_user`, `isPaied`, `active`) VALUES
(1, '2022-06-21', 'ул. Победы 142/23', 1, 1, 'Выполнен'),
(2, '2022-06-27', 'ул. Победы 11/1', 2, 0, 'В процессе');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int NOT NULL,
  `id_type_product` int DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `weight` int DEFAULT NULL,
  `availability` tinyint(1) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `id_type_product`, `name`, `price`, `weight`, `availability`, `picture`, `size`) VALUES
(1, 1, 'Пицца \"Карбонара\"', 190, 300, 1, 'бургер.png', 'small'),
(2, 1, 'Пицца \"Мазарера\"', 250, 450, 1, 'креветки.png', 'medium'),
(3, 1, 'Пицца \"К0лб4ски\"', 320, 550, 0, 'сырная.png', 'big'),
(4, 3, 'Pepsi 0.5', 80, 500, 1, 'cola.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `type_product`
--

CREATE TABLE `type_product` (
  `id_type_product` int NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `type_product`
--

INSERT INTO `type_product` (`id_type_product`, `type`) VALUES
(1, 'pizza'),
(2, 'dessert'),
(3, 'drinks');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `id_role` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `name`, `phone`, `email`, `password`) VALUES
(1, 1, 'Иван', '+79511409876', 'ivankor839@gmail.com', '12345'),
(2, 2, 'Леонид', '+795698675', 'leon_killer@gmail.com', 'aboba22'),
(12, 1, 'Крутой', '', 'test@mail.ru', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addition`
--
ALTER TABLE `addition`
  ADD PRIMARY KEY (`id_addition`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `R_6` (`id_order`);

--
-- Индексы таблицы `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id_cart_product`),
  ADD KEY `R_9` (`id_cart`),
  ADD KEY `R_10` (`id_product`),
  ADD KEY `R_11` (`id_addition`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `R_5` (`id_user`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `R_12` (`id_type_product`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id_type_product`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `R_13` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addition`
--
ALTER TABLE `addition`
  MODIFY `id_addition` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id_cart_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `R_6` FOREIGN KEY (`id_order`) REFERENCES `ordered` (`id_order`);

--
-- Ограничения внешнего ключа таблицы `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `R_10` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `R_11` FOREIGN KEY (`id_addition`) REFERENCES `addition` (`id_addition`),
  ADD CONSTRAINT `R_9` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);

--
-- Ограничения внешнего ключа таблицы `ordered`
--
ALTER TABLE `ordered`
  ADD CONSTRAINT `R_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `R_12` FOREIGN KEY (`id_type_product`) REFERENCES `type_product` (`id_type_product`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `R_13` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
