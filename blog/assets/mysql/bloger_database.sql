-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 02:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloger_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `entry_id` int(11) NOT NULL,
  `user_foreign_key` int(11) NOT NULL,
  `entry_title` varchar(255) NOT NULL,
  `entry_content` varchar(255) NOT NULL,
  `entry_date` date NOT NULL,
  `entry_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`entry_id`, `user_foreign_key`, `entry_title`, `entry_content`, `entry_date`, `entry_timestamp`) VALUES
(1, 1, '1:20 PM - My first Entry', 'Hi my name is andre and this is my first entry', '2022-12-03', '2022-12-03 05:20:30'),
(2, 1, '1:21 PM - My 2nd Entry', 'THis is my second entry on this site and Im having fun using it', '2022-12-03', '2022-12-03 05:21:49'),
(3, 1, '2:57 PM - 3rd Entry', 'This is my 3rd entry on this blog I hope Im doin good', '2022-12-03', '2022-12-03 06:57:55'),
(4, 2, '3:50 PM - Kenneth first entry', 'Hi Im kenneth and this is my first entry', '2022-12-03', '2022-12-03 07:51:23'),
(5, 2, '3:51 PM - Kenneth 2nd Entry', 'Hi this is kenneth and this is my 2nd entry', '2022-12-03', '2022-12-03 07:52:01'),
(7, 1, '4:02 PM - Andre\'s post with a single quote', 'Hi I\'m andre and this is a post with a single quote!', '2022-12-03', '2022-12-03 08:03:08'),
(8, 2, 'Kenneth\'s 1st Post', 'Hey there everybody! This is my first post', '2022-12-04', '2022-12-03 17:27:51'),
(9, 2, 'Kenneth\'s 2nd Post ', 'Hi this is my second post!', '2022-12-04', '2022-12-03 17:28:13'),
(10, 1, 'December 04 - Andre\'s Blog post on today\'s meeting', 'This is the content of today\'s entry. My name\'s jake', '2022-12-04', '2022-12-04 01:25:41'),
(11, 1, 'Tom & Jerry', 'Tom & Jerry', '2022-12-04', '2022-12-04 01:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_bio` text NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `username`, `user_first_name`, `user_last_name`, `user_password`, `user_bio`, `user_image`) VALUES
(1, '1130marcusa@gmail.com', 'andre.genorga', 'Andre', 'Genorga', '5cdf113ffd8b0f4d005f5ad39d4fb2e1', 'My name is Andre Genorga', '626edf07347113.87151365.png'),
(2, 'kenneth@gmail.com', 'kenneth.seva', 'Kenneth', 'Seva', '5cdf113ffd8b0f4d005f5ad39d4fb2e1', 'hi my name is kenneth seva', '626edf20352172.78415585.jpg'),
(3, 'keneth@gmail.com', 'kenneth.seva', 'Kenneth', 'Seva', '5cdf113ffd8b0f4d005f5ad39d4fb2e1', 'ainfinainining', '6274d423311584.27673567.jpg'),
(4, 'sample@gmail.com', 'joemama1130', 'Joe', 'Momma', '5cdf113ffd8b0f4d005f5ad39d4fb2e1', 'Steve jobs got ligma', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `user_foreign_key` (`user_foreign_key`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
