-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2021 at 07:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_msg`
--

CREATE TABLE `contact_msg` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_msg`
--

INSERT INTO `contact_msg` (`name`, `email`, `msg`) VALUES
('ataa', 'ataa@gmail.com', 'fa;klshdfnjwhd;lvnalshjfahldhfnwhfadkhfkhabwhhfjkajdjajkwehfakljsdjfnkjawkhdkjlhaljdfalhkdfhalkdf  '),
('adfsdaf', 'ataa@gmail.com', '  sdgasfgawegasgasrgagsadgeqf'),
('asdfaf', 'ataa@gmail.com', '  agdsgwegfDVW'),
('ataa', 'ataa@gmail.com', '  egfwefwaefqwef'),
('ataa shaqour', 'ataa@gmail.com', '  ad;jshfkjaskgnlsak'),
('ataa shaqour', 'ataa@gmail.com', '  asfqe'),
('ataa', 'ataa@gmail.com', 'asfasf'),
('ataa shaqour', 'ataa@gmail.com', '  dgl;alksdgkladklgjlajsldkjgkkllsds'),
('ataa shaqour', 'ataa@gmail.com', '  sad/lkg;alwkelgkjaslkdngklasndglawkglkasnlkgnaslkndg'),
('ataa shaqour', 'ataa@gmail.com', 'asfklja;ldjgajl;kdjgklai;s;hdflkaf');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantites` int(10) NOT NULL,
  `image` varchar(150) NOT NULL,
  `catigories` varchar(50) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`name`, `price`, `size`, `quantites`, `image`, `catigories`, `id`) VALUES
('Polo', 80, 'S-M-L-XL', 27, '../image/BlackTShort.jpeg', 'T-shirts', 8),
('Lacost', 100, 'S-M-L', 29, '../image/LacostBlue.jpg', 'T-shirts', 9),
('Dark J', 100, '33 to 55', 20, '../image/Jeans1.jpeg', 'Trousers', 10),
('Jeans Light', 90, '33 to 55', 46, '../image/Jeans2.jpeg', 'Trousers', 11),
('Adidas', 150, '39 To 43', 13, '../image/adidasBlack.jpg', 'Sport-Shoes', 12),
('Nike', 200, '39 To 44', 39, '../image/NikeShoes.jpg', 'Sport-Shoes', 13),
('Casual', 120, '39 To 44', 46, '../image/casual2.jpeg', 'Casual-Shoes', 14),
('Casual', 150, '40 To 43', 50, '../image/casual3.jpeg', 'Casual-Shoes', 15),
('Casual', 250, '39 To 44', 38, '../image/casual4.jpeg', 'Casual-Shoes', 16),
('Jeans', 90, '33 to 55', 48, '../image/Jeanse3.jpeg', 'Trousers', 17),
('Nike', 200, '39 To 44', 33, '../image/BlackNike.jpg', 'Sport-Shoes', 18),
('Adidas', 100, 'S-M-L-XL', 24, '../image/t-shirt1.jpeg', 'T-shirts', 19),
('Colomnbia', 70, 'S-M-L-XL', 46, '../image/tshirt2.jpeg', 'T-shirts', 21),
('Holo', 150, '48 To 56', 40, '../image/Trau2.jpeg', 'Trousers', 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `pass`, `city`, `gender`, `adress`, `birthdate`) VALUES
('ataa', 'shaqour', 'ataa@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'salfet', 'male', 'kefil hares', '2000-02-09'),
('admin', 'admin', 'fashion_store@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'nablus', 'male', 'Balata', '2000-02-09'),
('Hamza', 'Khaleel', 'hamz@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nablus', 'male', 'Al-Farea', '2000-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(100) NOT NULL,
  `item_id` int(10) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `dates` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `item_id`, `user_email`, `dates`, `quantity`) VALUES
(37, 10, 'ataa@gmail.com', '2021-03-02 20:30:33', 1),
(38, 11, 'ataa@gmail.com', '2021-03-02 20:30:33', 1),
(39, 18, 'ataa@gmail.com', '2021-01-02 20:30:33', 1),
(40, 19, 'ataa@gmail.com', '2021-01-02 20:30:33', 1),
(41, 9, 'ataa@gmail.com', '2021-02-02 20:32:53', 1),
(42, 11, 'ataa@gmail.com', '2021-02-02 20:32:53', 1),
(43, 12, 'ataa@gmail.com', '2021-02-02 20:32:53', 1),
(44, 10, 'hamz@gmail.com', '2021-04-02 23:06:21', 4),
(45, 16, 'hamz@gmail.com', '2021-04-02 23:06:21', 2),
(46, 18, 'hamz@gmail.com', '2021-04-02 23:06:21', 4),
(47, 12, 'hamz@gmail.com', '2021-05-02 23:09:54', 2),
(48, 13, 'hamz@gmail.com', '2021-05-02 23:09:54', 2),
(49, 17, 'hamz@gmail.com', '2021-05-02 23:09:54', 1),
(50, 19, 'hamz@gmail.com', '2021-05-02 23:09:54', 3),
(51, 21, 'hamz@gmail.com', '2021-05-02 23:09:54', 2),
(52, 13, 'ataa@gmail.com', '2021-05-04 14:30:29', 1),
(53, 8, 'ataa@gmail.com', '2021-05-05 16:58:54', 1),
(54, 10, 'ataa@gmail.com', '2021-05-05 17:00:50', 1),
(55, 10, 'ataa@gmail.com', '2021-05-05 17:01:42', 1),
(56, 8, 'ataa@gmail.com', '2021-05-05 18:46:26', 1),
(57, 11, 'ataa@gmail.com', '2021-05-05 18:46:26', 1),
(58, 12, 'ataa@gmail.com', '2021-05-05 18:46:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `email` (`user_email`),
  ADD KEY `id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `user_order_ibfk_2` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
