-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Generation time: 26-06-2017 a las 20:14:29
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ComercioIT`
--
CREATE DATABASE IF NOT EXISTS `catalogue` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `catalogue`;
-- --------------------------------------------------------

--
-- Table structure for the table `categories`
--

CREATE TABLE `categories` (
  `idCategory` int(11) NOT NULL,
  `catName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for table `categories`
--

INSERT INTO `categories` (`idCategory`, `catName`) VALUES
(1, 'PC'),
(2, 'Smartphone'),
(3, 'Tablets'),
(4, 'Accessories'),
(5, 'Chargers'),
(6, 'Notebooks'),
(7, 'Covers');

-- --------------------------------------------------------

--
-- Table structure for the table `brands`
--

CREATE TABLE `brands` (
  `idBrand` int(11) NOT NULL,
  `brName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for table `brands`
--

INSERT INTO `brands` (`idBrand`, `brName`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Huawei'),
(4, 'LG'),
(5, 'Motorola'),
(6, 'Google'),
(7, 'Asus'),
(8, 'ZTE'),
(9, 'Nokia'),
(10, 'Lenovo'),
(11, 'PlayStation'),
(12, 'Ninendo'),
(13, 'Microsoft'),
(14, 'TCL');

-- --------------------------------------------------------

--
-- Table structure for the table `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `prdName` varchar(30) NOT NULL,
  `prdPrice` double NOT NULL,
  `idBrand` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `prdDetail` TEXT NOT NULL,
  `prdStock` int(6) NOT NULL,
  `prdImage` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for table `products`
--

INSERT INTO `products` (`idProduct`, `prdName`, `prdPrice`, `idBrand`, `idCategory`, `prdDetail`, `prdStock`, `prdImage`) VALUES
(1, 'iPhone 6', 499.99, 1, 2, '16GB', 500, 'P001.jpg'),
(2, 'iPad Pro', 599.99, 1, 3, '32GB', 300, 'P002.jpg'),
(3, 'Nexus 7', 299.99, 6, 3, '32GB', 300, 'P003.jpg'),
(4, 'Galaxy S7', 459.9, 2, 2, '64GB', 650, 'P004.jpg'),
(5, 'Moto G', 489.99, 5, 2, '8GB', 750, 'P005.jpg'),
(6, 'L40', 199.69, 4, 2, '24GB', 350, 'P006.jpg');

-- --------------------------------------------------------

--
-- Table structure for the table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `userFirstname` varchar(30) NOT NULL,
  `userLastname` varchar(30) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `userPass` varchar(30) NOT NULL,
  `userState` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for table `users`
--

INSERT INTO `users` (`idUser`, `userFirstname`, `userLastname`, `userEmail`, `userPass`, `userState`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', 1),
(2, 'nametest', 'apellidotest', 'test@mail.com', 'clavetest', 1),
(3, 'Cosme', 'Fulanito', 'cfulanito@mail.com', 'cfulanito', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`idBrand`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `Brand` (`idBrand`),
  ADD KEY `Rubro` (`idCategory`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `Email` (`userEmail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `idBrand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idBrand`) REFERENCES `brands` (`idBrand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
