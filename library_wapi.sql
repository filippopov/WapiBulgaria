-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 06:25 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_wapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `format_id` int(11) DEFAULT NULL,
  `page_count` int(11) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `resume` text,
  `user_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `author`, `publish_date`, `format_id`, `page_count`, `isbn`, `resume`, `user_id`, `image_path`) VALUES
(7, 'erfweffwe', 'wefwefwe', '2017-01-26 09:25:46', 2, 2, 'regregre', 'ergreg', 3, 'content\\images\\book2.jpg'),
(8, 'filip', 'ergre', '2017-01-26 09:25:59', 1, 2, '432432', '2332432', 5, 'content\\images\\book3.jpg'),
(9, 'wtrewetwe', 'werwerwr', '2017-01-26 09:26:31', 3, 2, 'regreg', 'regreger', 3, 'content\\images\\book4.jpg'),
(10, 'wregregeg', 'ergregerger111', '2017-01-26 09:26:46', 2, 2, 'rgregreg', 'regregreg', 3, 'content\\images\\book6.jpg'),
(15, 'last test', '2', '2017-01-26 09:33:51', 2, 2, '2', 'sgregre', 3, 'content\\images\\book4.jpg'),
(16, 'efewfregregre', '2', '2017-01-26 09:38:08', 1, 2, '2', 'wregreg', 3, 'content\\images\\book4.jpg'),
(18, 'werwef', 'wefwef', '2017-01-26 15:51:26', 1, 2, 'qwefefwef', 'wefwefwef', 3, 'content\\images\\book1.jpg'),
(19, 'grerege', 'ergregreg', '2017-01-26 16:54:15', 2, 2, 'retgregeg', 'rgregreg', 3, 'content\\images\\book5.jpg'),
(20, 'dsfsf', 'wgfwfwef', '2017-01-26 16:54:56', 2, 2, '2', '2', 3, 'content\\images\\book1.jpg'),
(21, 'fdhg', 'ewfwfwe', '2017-01-26 17:03:13', 3, 2, 'wewerwer', 'wewerwr', 3, 'content\\images\\book6.jpg'),
(22, 'gfreg', 'regregre', '2017-01-26 17:17:33', 3, 34342, 'sdfdsf', 'tgre', 3, 'content\\images\\book6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `formats`
--

CREATE TABLE `formats` (
  `id` int(11) NOT NULL,
  `name_format` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formats`
--

INSERT INTO `formats` (`id`, `name_format`) VALUES
(1, 'A4'),
(2, 'A3'),
(3, 'A2'),
(4, 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'wrwerwer', '$2y$10$nkC8diesrPnE6D9b/2S/zuOux3agTTH6YpVUsV/Sc.1GPxagVwRVq'),
(2, 'qwewqeqweqw', '$2y$10$ffvRqnisgRN9LbPEidUy1eEKxGxLHfX938blGD.gyIZRxYV0t2B/K'),
(3, 'Filip', '$2y$10$q7XQA0Y0654HJhXPZJddn.qcPfi7qkC29nj4fDguPFfydbWLT8CBa'),
(4, 'Ivan1', '$2y$10$p2h2IxUxDkDMb4c679iPNOJivAEGtHhTI7O.92Z7.tjn47wAJUQI2'),
(5, 'Dragan', '$2y$10$379VNBQVzkNMZ0K3GC78J.J0RGNjXoQb36yKLM02YWOqlVVt7Bp9S'),
(6, 'Petran', '$2y$10$lSBJwZjRkNKpaJypWrUzKeLITwEjpJH7hCi7RDxwRLzxb0TNx2NAa');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 2, 2),
(2, 3, 2),
(3, 4, 2),
(4, 5, 2),
(5, 6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_users_id_fk` (`user_id`),
  ADD KEY `books_formats_id_fk` (`format_id`);

--
-- Indexes for table `formats`
--
ALTER TABLE `formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_users_id_fk` (`user_id`),
  ADD KEY `user_role_roles_id_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `formats`
--
ALTER TABLE `formats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_formats_id_fk` FOREIGN KEY (`format_id`) REFERENCES `formats` (`id`),
  ADD CONSTRAINT `books_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_roles_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_role_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
