-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 01:51 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `noti_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL,
  `age` smallint(6) NOT NULL,
  `gendar` enum('male','female') NOT NULL,
  `mobile` char(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `additional_information` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `age`, `gendar`, `mobile`, `location`, `religion`, `bio`, `nationality`, `additional_information`, `user_id`) VALUES
(2, 25, 'male', '01021952160', 'damanhour ', 'muslim', 'لا اله الا الله ', 'Egypt', 'no', 1),
(3, 25, 'female', '01021952160', 'damanhour ', 'muslim', 'no', 'Egyption', 'no', 2),
(4, 26, 'male', '1021952160', 'damanhour ', 'muslim', 'لا اله الا الله ', 'Egypt', 'no', 3),
(5, 20, 'male', '01021952160', 'damanhour ', 'muslim', 'لا اله الا الله ', 'Egypt', 'no', 4);

-- --------------------------------------------------------

--
-- Table structure for table `userimage`
--

CREATE TABLE IF NOT EXISTS `userimage` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `selected` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userimage`
--

INSERT INTO `userimage` (`id`, `image`, `user_id`, `selected`) VALUES
(16, '15470321739811538740_786050681409273_1885196896_n.png', 2, 0),
(17, '1547116553291607087_1432905150278828_462564496_n.jpg', 3, 0),
(18, '15479854702361497774_187274784797848_1000302065_n.jpg', 4, 0),
(19, '15480674154411558463_813123375379837_949555543_n - Copy.jpg', 1, 0),
(20, '15480674155251560602_277669952386970_1258129855_n.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed', 'red.devile2011@gmail.com', '$2y$10$DBYmAa0/5Kx4.gqUHJk3U.//gMBW2U65D32TJWQN5OJc97bqRKXam', 'uPOhtBONvQukWRxHSqJ82cCRLk57MPOd7xiRHk93p3x5V05pYmPW2PjpNc5B', '2019-01-06 09:11:41', '2019-01-21 10:08:54'),
(2, 'aya', 'aya@gmail.com', '$2y$10$e9KetBs7MUbQbO9Chk4zTu5s4aNHYHI66aQqadbBP9XYYl82yQgmS', 'y1SjCWMSDdmFE85I1j15G95PhjT5LBFnW37LLsIplKWYOcbKMv6tr7peNCL6', '2019-01-09 09:08:25', '2019-01-21 09:55:24'),
(3, 'ahmed', 'ahmed@gmail.com', '$2y$10$Psin1/kaXpEWok3gxKND0ugdB1UNUgskim2ok/YkN7DKIJhE8t7/i', 'RrneCrHKeaLtrUfSIWx0V2VqSKWSegN84UmF2upC8Y7sXKeBZiDzDvvYmEEa', '2019-01-10 08:29:21', '2019-01-21 09:18:31'),
(4, 'ali', 'ali@gmail.com', '$2y$10$SDqJxDucgwi6EZyU8.6ZvuqZWDqoF9.dPdB7.MUXGzcx.9o6VU6Re', 'nyqI7YVAuj7jdkmZYz5R2VcEYZ0idgHH9TZattSh06ypuCRpJkdUFIt0Kl8n', '2019-01-20 09:47:39', '2019-01-20 09:58:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userimage`
--
ALTER TABLE `userimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userimage`
--
ALTER TABLE `userimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
