-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 09:33 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Table structure for table `addition`
--

CREATE TABLE `addition` (
  `id_addition` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addition`
--

INSERT INTO `addition` (`id_addition`, `name`, `price`, `picture`) VALUES
(1, 'Сырные бортики', 120, '../сам_введёшь/'),
(2, 'Дополнительная порция мяса', 100, '../сам_введёшь/'),
(3, 'Острый перец халапеньо', 50, '../сам_введёшь/');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `price`, `id_order`, `amount`) VALUES
(1, 520, 2, 3),
(2, 370, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart_addition`
--

CREATE TABLE `cart_addition` (
  `id_cart_addition` int(11) NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `id_addition` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_addition`
--

INSERT INTO `cart_addition` (`id_cart_addition`, `id_cart`, `id_addition`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id_cart_product` int(11) NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id_cart_product`, `id_cart`, `id_product`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `name`, `description`, `picture`) VALUES
(1, 'Лучшая новость за последнюю тисячу лет!!', 'У попа была собака, он её любил, она съела кусок мяса, он её убил', '../сам_введёшь/');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id_order` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `adress` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isPaied` tinyint(1) NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`id_order`, `order_date`, `adress`, `id_user`, `isPaied`, `active`) VALUES
(1, '2022-06-21', 'ул. Победы 142/23', 1, 1, 'Выполнен'),
(2, '2022-06-27', 'ул. Победы 11/1', 2, 0, 'В процессе');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `weight`, `availability`, `picture`, `size`) VALUES
(1, 'Пицца \"Карбонара\"', 190, 300, 1, '../сам_введёшь/', 'small'),
(2, 'Пицца \"Карбонара\"', 250, 450, 1, '../сам_введёшь/', 'medium'),
(3, 'Пицца \"Карбонара\"', 320, 550, 1, '../сам_введёшь/', 'big'),
(4, 'Pepsi 0.5', 80, 500, 1, '../сам_введёшь/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `surname`, `phone`, `email`, `role`, `password`) VALUES
(1, 'Иван', 'Корниенко', '+79511409876', 'ivankor839@gmail.com', 'user', '12345'),
(2, 'Леонид', 'Попов', '+795698675', 'leon_killer@gmail.com', 'admin', 'aboba22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addition`
--
ALTER TABLE `addition`
  ADD PRIMARY KEY (`id_addition`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `R_6` (`id_order`);

--
-- Indexes for table `cart_addition`
--
ALTER TABLE `cart_addition`
  ADD PRIMARY KEY (`id_cart_addition`),
  ADD KEY `R_11` (`id_cart`),
  ADD KEY `R_12` (`id_addition`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id_cart_product`),
  ADD KEY `R_9` (`id_cart`),
  ADD KEY `R_10` (`id_product`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `R_5` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addition`
--
ALTER TABLE `addition`
  MODIFY `id_addition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_addition`
--
ALTER TABLE `cart_addition`
  MODIFY `id_cart_addition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id_cart_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `R_6` FOREIGN KEY (`id_order`) REFERENCES `ordered` (`id_order`);

--
-- Constraints for table `cart_addition`
--
ALTER TABLE `cart_addition`
  ADD CONSTRAINT `R_11` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `R_12` FOREIGN KEY (`id_addition`) REFERENCES `addition` (`id_addition`);

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `R_10` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `R_9` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);

--
-- Constraints for table `ordered`
--
ALTER TABLE `ordered`
  ADD CONSTRAINT `R_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
