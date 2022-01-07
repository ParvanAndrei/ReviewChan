-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 09:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isw`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `stars` int(11) NOT NULL,
  `link` varchar(300) DEFAULT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `title`, `name`, `description`, `stars`, `link`, `category`) VALUES
(1, 1, 'Dezamagit', 'emag.ro', 'Foarte suparat pe masina de spalat beko', 2, 'https://www.emag.ro/', 'Shopping'),
(2, 1, 'Foarte incantat', 'olx.ro', 'Ma incanta tare de tot site-ul dumneavoastra.', 5, 'https://www.olx.ro/', 'Shopping'),
(3, 1, 'Emag, un site de calitate', 'emag.ro', 'Genial site-ul. livrare rapida si produse de calitate!', 5, 'https://www.emag.ro/', 'Shopping'),
(4, 2, 'Se poate si mai bine', 'mediagalaxy.ro', 'Se putea si mai bine, am primit un colet desfacut desi nu am comandat nimic resigilat...', 2, 'https://mediagalaxy.ro', 'Shopping'),
(5, 2, 'Super tare la Altex', 'altex.ro', 'Produse de calitate, in cel mai scurt timp', 3, 'https://altex.ro/', 'Shopping'),
(6, 2, 'Altex cel mai tare site', 'altex.ro', 'Super tare, am primit laptopul in 2 zile lucratoare. Recomand', 5, 'https://altex.ro', 'Shopping'),
(7, 3, 'emag e o nebunie curata', 'emag.ro', 'produsele sunt ok, livrarea e precara... ma rog asta este am mai luat teapa', 4, 'https://www.emag.ro/', 'Shopping'),
(8, 4, 'olx de proasta calitate', 'olx.ro', 'Cel mai prost site, cineva mi-a furat datele bancare aici.', 1, 'https://olx.ro', 'Shopping'),
(9, 5, 'acel cel este cel mai prost site', 'cel.ro', 'Cel mai prost site', 2, 'https://cel.ro', 'Shopping'),
(10, 2, 'google cel mai bun', 'google.ro', 'cel mai bun browser web existent', 5, 'www.google.ro', 'General'),
(11, 3, 'Prost site', 'trello', 'Site de proasta calitate', 3, 'https://trello.com', 'Learning'),
(12, 1, 'Groaznic de teribil', 'publi24.ro', 'Foarte trist ca atatea domnisoare se vand online', 1, 'https://www.publi24.ro/', 'Shopping'),
(13, 2, 'super', 'price.ro', 'Foarte tare ', 5, 'https://www.price.ro/', 'Shopping'),
(14, 3, 'foarte util si interesant', 'netflix.com', 'Iubesc acest site, e super pentru vizionat orice tip de film.', 5, 'https://www.netflix.com/ro-en/', 'Streaming'),
(15, 4, 'Suparat tare of', 'Emag.ro', 'Iar mi-am luat ma teapa nu stiu cum e posibil asa ceva.', 1, 'https://www.emag.ro/', 'Shopping'),
(16, 5, 'Genial ', 'Pull&Bear', 'Super tare ma incanta', 3, 'www.pullbear.com', 'Shopping'),
(17, 3, 'google', 'google', 'sda', 1, 'https://www.google.ro/', 'General'),
(18, 2, 'super', 'google', 'sdsa', 1, 'https://www.google.ro/', 'General'),
(19, 1, 'Motor bun de cautare', 'google', 'Super ok', 1, 'https://www.google.ro/', 'General'),
(20, 4, 'ds', 'google', 'sdas', 1, 'https://www.google.ro/', 'General'),
(21, 5, 'Trist', 'publi24', 'Iar mi-am luat teapa', 2, 'www.publi24.ro', 'Shopping'),
(22, 11, 'Cea mai mare teapa ever', 'google.ro', 'Nu am putut cauta nici macar niste poze cu pisoi', 1, 'https://www.google.ro/', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `pass`) VALUES
(2, 'Cozmescu Daniel', 'cozmescudaniel@gmail.com', 'samsungtab2'),
(3, 'Parvan Andrei Leonard', 'leoParvi@gmail.com', 'leo123'),
(4, 'Andreea Popovici', 'popsi@gmail.com', '1111'),
(5, 'Ovidiu Botsch', 'ovi@gmail.com', '2222'),
(6, 'Cismaru Catalin', 'cata@gmail.com', '5555'),
(7, 'Dinu Ionut', 'dinu@gmail.com', '4444'),
(9, 'Cozmescu Daniel', 'cozmescudaniel2@gmail.com', '4444'),
(10, 'Alexandru Plesa', 'alex@gmail.com', 'alex'),
(11, 'Cotoi Pisoi', 'cotoi@gmail.com', 'cotoi'),
(12, 'Andrei Parvan', 'andrei@gmail.com', 'Andrei123'),
(13, 'guest', 'guest', 'guest'),
(14, 'Ion Dumitru', 'dany231099@gmail.com', 'Samsungtab2'),
(15, 'Ovidiu Ion', 'dany231099@gmail.com', 'Samsungtab2'),
(16, 'Dane2', 'dany231099@gmail.com', 'Samsungtab2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
