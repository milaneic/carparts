-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 11:56 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autodelovi`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'Milan', 'Eic', 'milaaneic@gmail.com', '0641234657', 'Cacak', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 'Milan', 'Eic', 'milaaneic@gmail.com', '0641234657', 'Cacak', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(3, 'Elena', 'Jovanovic', 'elena@gmail.com', '0641234879', 'Milana Rakica', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delovi`
--

CREATE TABLE `delovi` (
  `id` int(11) NOT NULL,
  `proizvodjac` varchar(255) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `cenaPDV` decimal(10,0) NOT NULL,
  `idKategorija` int(11) NOT NULL,
  `idMarka` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delovi`
--

INSERT INTO `delovi` (`id`, `proizvodjac`, `naziv`, `opis`, `slika`, `cena`, `cenaPDV`, `idKategorija`, `idMarka`) VALUES
(1, 'Bosch', 'Prednje disk kočnice Mercedes S350', '34180', '/portal/img/products/disk-1.jpeg', '28488', '34185', 102, 1),
(2, 'Bosch', 'Prednje disk kočnice Mercedes E250 ', 'Bosch set prednjih kočnica za Mercedes Benz E250 sa svom pratecom opremom.', '/portal/img/products/disk-1.jpeg', '25488', '30585', 102, 1),
(3, 'Bosch', 'Prednje disk kočnice Mercedes S320', 'Bosch set prednjih kočnica za Mercedes Benz S320 sa svom pratecom opremom.', '/portal/img/products/disk-3.jpeg', '25488', '30585', 102, 1),
(4, 'Bosch', 'Prednje disk kočnice Mercedes E200', 'Bosch set prednjih kočnica za Mercedes Benz E200 sa svom pratecom opremom.', '/portal/img/products/disk-3.jpeg', '28488', '34185', 102, 1),
(5, 'Bosch', 'Prednje disk kočnice Mercedes S350', 'Bosch set prednjih kočnica za Mercedes Benz S350 sa svom pratecom opremom.', '/portal/img/products/disk-1.jpeg', '28488', '34185', 102, 1),
(6, 'Bosch', 'Prednje disk kočnice Mercedes E250', 'Bosch set prednjih kočnica za Mercedes Benz E250 sa svom pratecom opremom.', '/portal/img/products/disk-1.jpeg', '25488', '30585', 102, 1),
(7, 'Bosch', 'Prednje disk kočnice Mercedes S320', 'Bosch set prednjih kočnica za Mercedes Benz S320 sa svom pratecom opremom.', '/portal/img/products/disk-3.jpeg', '25488', '30585', 102, 1),
(8, 'Bosch', 'Prednje disk kočnice Mercedes E200', 'Bosch set prednjih kočnica za Mercedes Benz E200 sa svom pratecom opremom.', '/portal/img/products/disk-3.jpeg', '28488', '34185', 102, 1),
(9, 'Ate', 'Prednje disk kočnice Audi A8', 'Ate set prednjih kocnica za Audi A8 sa svom pratecom opremom.', '/portal/img/products/disk-2.jpeg', '28488', '34185', 102, 2),
(10, 'Ate', 'Prednje disk kočnice Audi A6', 'Ate set prednjih kocnica za Audi A6 sa svom pratecom opremom.', '/portal/img/products/disk-2.jpeg', '28488', '34185', 102, 2),
(11, 'Ate', 'Prednje disk kočnice Audi A4', 'Ate set prednjih kocnica za Audi A4 sa svom pratecom opremom.', '/portal/img/products/disk-2.jpeg', '25488', '30585', 102, 2),
(12, 'Ate', 'Prednje disk kočnice Audi A6', 'Ate set prednjih kocnica za Audi A6 sa svom pratecom opremom.', '/portal/img/products/disk-2.jpeg', '25488', '30585', 102, 2),
(13, 'Bosch', 'Prednje disk kočnice BMW 530', 'Bosch set prednjih kočnica za BMW 530 sa svom pratecom opremom.', '/portal/img/products/disk-1.jpeg', '28488', '34185', 102, 3),
(14, 'SRL', 'Klesta kočnice Skoda Octavia', 'SRL set prednjih klesta za Skoda Octavia sa svom pratecom opremom.', '/portal/img/products/klesta/2.jpeg', '25488', '30585', 102, 4),
(15, 'PolCar', 'Klesta kočnice Skoda Octavia', 'PolCAr set prednjih kocnica za Skoda Octavia sa svom pratecom opremom.', '/portal/img/products/klesta/1.jpeg', '28488', '34185', 102, 4),
(16, 'Bosch', 'Klesta kočnice Opel Astra', 'Klesta prednjih kocnica za Opel Astra sa svom pratecom opremom.', '/portal/img/products/klesta/2.jpeg', '28488', '34185', 102, 5),
(17, 'SRL', 'Klesta kočnice Toyota LandCruiser', 'Bosch set prednjih kocnica za Toyota LandCruiser sa svom pratecom opremom.', '/portal/img/products/klesta/2.jpeg', '25488', '30585', 102, 6),
(18, 'PolCar', 'Klesta kočnice Audi A6', 'Ate set prednjih kocnica za Audi A6 sa svom pratecom opremom.', '/portal/img/products/klesta/3.jpeg', '25488', '30585', 102, 2),
(19, 'Bosch', 'Klesta kočnice BMW 530', 'Bosch set prednjih kočnica za BMW 530 sa svom pratecom opremom.', '/portal/img/products/klesta/4.jpeg', '28488', '34185', 102, 3),
(20, 'Ate', 'Klesta kočnice BMW 520', 'Ate set prednjih kocnica za BMW 520 sa svom pratecom opremom.', '/portal/img/products/klesta/3.jpeg', '25488', '30585', 102, 3),
(21, 'LUK', 'LUK zamajac za Opel Combo C', 'LUK zamajac za Opel Combo C za zamenu', '/portal/img/products/motor/zamajac-1.jpeg', '60000', '72000', 104, 5),
(22, 'LUK', 'LUK zamajac za Mercedes S350', 'LUK zamajac za Mercedes S350 za zamenu', '/portal/img/products/motor/zamajac-2.jpeg', '120000', '144000', 104, 1),
(23, 'LUK', 'LUK zamajac za BMW 330', 'LUK zamajac za BMW 330 za zamenu', '/portal/img/products/motor/zamajac-1.jpeg', '60000', '72000', 104, 3),
(24, 'LUK', 'LUK zamajac za Audi A6', 'LUK zamajac za Audi A6 za zamenu', '/portal/img/products/motor/zamajac-3.jpeg', '60000', '72000', 104, 2),
(25, 'LUK', 'LUK zamajac za Opel Astra', 'LUK zamajac za Opel Astra za zamenu', '/portal/img/products/motor/zamajac-1.jpeg', '50000', '6000', 104, 5),
(26, 'LUK', 'LUK zamajac za Mercedes E350', 'LUK zamajac za Mercedes E350 za zamenu', '/portal/img/products/motor/zamajac-2.jpeg', '120000', '144000', 104, 1),
(27, 'LUK', 'LUK zamajac za Toyota LandCruiser', 'LUK zamajac za Toyota LandCruiser za zamenu', '/portal/img/products/motor/zamajac-1.jpeg', '150000', '180000', 104, 3),
(28, 'LUK', 'LUK zamajac za Skoda Octavia', 'LUK zamajac za Audi A6 za zamenu', '/portal/img/products/motor/zamajac-3.jpeg', '100000', '120000', 104, 4),
(29, 'Castrol', 'Castrol motorno ulje', 'Castrol motorno ulje za 10W-30 za savrsen rad vaseg motora', '/portal/img/products/motor/castrol.png', '3000', '3600', 104, 1),
(30, 'Castrol', 'Castrol motorno ulje', 'Castrol motorno ulje za 10W-40 za savrsen rad vaseg motora', '/portal/img/products/motor/castrol.png', '3000', '3600', 104, 2),
(31, 'Castrol', 'Castrol motorno ulje', 'Castrol motorno ulje za 5W-30 za savrsen rad vaseg motora', '/portal/img/products/motor/castrol.png', '3000', '3600', 104, 3),
(32, 'Castrol', 'Castrol motorno ulje', 'Castrol motorno ulje za 10W-40 za savrsen rad vaseg motora', '/portal/img/products/motor/castrol.png', '3000', '3600', 104, 4),
(33, 'Castrol', 'Castrol motorno ulje', 'Castrol motorno ulje za 5W-30 za savrsen rad vaseg motora', '/portal/img/products/motor/castrol.png', '3000', '3600', 104, 5),
(34, 'Castrol', 'Castrol motorno ulje', 'Castrol motorno ulje za 10W-40 za savrsen rad vaseg motora', '/portal/img/products/motor/castrol.png', '3000', '3600', 104, 6),
(35, 'Motul', 'Motul motorno ulje', 'Motul motorno ulje za 10W-30 za savrsen rad vaseg motora', '/portal/img/products/motor/motul.png', '3000', '3600', 104, 1),
(36, 'Motul', 'Motul motorno ulje', 'Motul motorno ulje za 10W-40 za savrsen rad vaseg motora', '/portal/img/products/motor/motul.png', '3000', '3600', 104, 2),
(37, 'Motul', 'Motul motorno ulje', 'Motul motorno ulje za 5W-30 za savrsen rad vaseg motora', '/portal/img/products/motor/motul.png', '3000', '3600', 104, 4),
(38, 'Motul', 'Motul motorno ulje', 'Motul motorno ulje za 10W-40 za savrsen rad vaseg motora', '/portal/img/products/motor/motul.png', '3000', '3600', 104, 5),
(39, 'Motul', 'Motul motorno ulje', 'Motul motorno ulje za 5W-30 za savrsen rad vaseg motora', '/portal/img/products/motor/motul.png', '3000', '3600', 104, 5),
(40, 'Motul', 'Motul motorno ulje', 'Motul motorno ulje za 10W-40 za savrsen rad vaseg motora', '/portal/img/products/motor/motul.png', '3000', '3600', 104, 6),
(41, 'Michelin', 'Michelin Latitude Sport 3 295/40 R20', 'Michelin Latitude Sport 3 295/40 R20 letnje gume', '/portal/img/products/pneumatici/michelin2.jpeg', '20000', '24000', 106, NULL),
(42, 'Michelin', 'Michelin Alpin A5 225/45 18', 'Michelin Alpin a5 225/45 18 letnj gume', '/portal/img/products/pneumatici/michelin.jpeg', '10000', '12000', 106, NULL),
(43, 'Michelin', 'Michelin Latitude Sport  285/45 R19', 'Michelin Latitude Sport 3 295/40 R20 letnje gume', '/portal/img/products/pneumatici/michelin2.jpeg', '18000', '21600', 106, NULL),
(44, 'Michelin', 'Michelin Alpin A5 195/65 15', 'Michelin Alpin a5 195/65 15 letnj gume', '/portal/img/products/pneumatici/michelin.jpeg', '7500', '9000', 106, NULL),
(45, 'Sava', 'Sava Eskimo HP2 205/55 R16', 'Sava Eskimo HP2 205/55 R16 letjnja guma', '/portal/img/products/pneumatici/sava.jpeg', '5000', '6000', 106, NULL),
(46, 'Pirelli', 'PIRELLI Winter Sottozero 3 235/35R19 91V XL RO1', 'PIRELLI Winter Sottozero 3 235/35R19 91V XL RO1 Zimske gume ', '/portal/img/products/pneumatici/pirelli.jpeg', '10000', '12000', 106, NULL),
(47, 'HANKOOK', 'HANKOOK W452 195/65R15 95T XL', 'HANKOOK W452 195/65R15 95T XL Zimske gume', '/portal/img/products/pneumatici/hankook.jpeg', '7000', '8400', 106, NULL),
(48, 'HANKOOK', 'HANKOOK H740 Allseason 185/65R14 86T', 'HANKOOK H740 Allseason 185/65R14 86T Cjelogodisnje gume', '/portal/img/products/pneumatici/hankook.jpeg', '7000', '8400', 106, NULL),
(49, 'Pirelli', 'Letnje gume PIRELLI Cinturato P7 225/55R17 97Y r-f *MOE', 'Letnje gume PIRELLI Cinturato P7 225/55R17 97Y r-f *MOE', '/portal/img/products/pneumatici/pirelli.jpeg', '20000', '24000', 106, NULL),
(50, 'Sava', 'MICHELIN Agilis Alpin 185/75R16C 104/102R', 'Zimske gume MICHELIN Agilis Alpin 185/75R16C 104/102R', '/portal/img/products/pneumatici/michelin.jpeg', '10000', '12000', 106, NULL),
(51, 'Fiat', 'Filter', 'Filetr goriva Fiat Scudo 2.0 JTD ', '/portal/img/products/v-servis-3.jfif', '10450', '12540', 101, 5),
(52, 'ATE', 'Remen', 'Remen za Opel Combo 1.7', '/portal/img/productsv-servis-3.jfif', '8900', '10680', 100, 5),
(53, 'Delphi', 'Egr ventil', 'EGR VENTIL SKODA OCTAVIA ', '/portal/img/productsegr.jpeg', '12960', '15555', 105, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv`) VALUES
(100, 'Veliki servis'),
(101, 'Mali servis'),
(102, 'Kociona grupa'),
(103, 'Svetlosna gurpa'),
(104, 'Menjacka grupa'),
(105, 'Motorna grupa'),
(106, 'Pneumatici');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('Pending','Completed','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `created`, `status`) VALUES
(1, 1, 151340.00, '2020-07-03 08:55:46', 'Completed'),
(2, 2, 116952.00, '2020-07-03 08:56:23', 'Completed'),
(3, 3, 106976.00, '2020-07-03 08:56:54', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 9, 1),
(2, 1, 5, 1),
(3, 1, 1, 3),
(4, 1, 52, 1),
(5, 2, 9, 2),
(6, 2, 30, 3),
(7, 2, 18, 2),
(8, 3, 25, 1),
(9, 3, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `naziv`) VALUES
(1, 'Admin'),
(2, 'Korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `prezime`, `email`, `username`, `password`, `telefon`, `adresa`, `role`) VALUES
(1, 'Milan', 'Eic', 'milaaneic@gmail.com', 'milan', '$2y$10$GZwW4mgm9kI1foj51fGA0.qJOpwCIKgMhXwvxgm8CNEmFI.tnW5va', '0641234567', 'Cacak 3200 Donja Trepca bb', 1),
(2, 'Elena', 'Jovanovic', 'elena@gmail.com', 'elena', '$2y$10$T1VISikBZX1fif9ZRhMAGOag/oMFhHI6LLoe1X4phjyJ/5cjX093O', '0641234879', 'Milana Rakica', 2),
(3, 'Milan', 'Eic', 'milaaneic@gmail.com', 'milan032', '$2y$10$3NaNnAs.dQenk59xjd0jcOp/xE4GXfs6pigX.3wjafB8OQixvzPNa', '0641234657', 'Cacak', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `id` int(11) NOT NULL,
  `marka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`id`, `marka`) VALUES
(1, 'Mercedes'),
(2, 'Audi'),
(3, 'BMW'),
(4, 'Skoda'),
(5, 'Opel'),
(6, 'Toyota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delovi`
--
ALTER TABLE `delovi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKategorija` (`idKategorija`),
  ADD KEY `idMarka` (`idMarka`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delovi`
--
ALTER TABLE `delovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vozilo`
--
ALTER TABLE `vozilo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delovi`
--
ALTER TABLE `delovi`
  ADD CONSTRAINT `delovi_ibfk_1` FOREIGN KEY (`idMarka`) REFERENCES `vozilo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delovi_ibfk_2` FOREIGN KEY (`idKategorija`) REFERENCES `kategorija` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `delovi` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
