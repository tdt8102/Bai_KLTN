-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 04:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `google-classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(120) NOT NULL,
  `class_title` varchar(120) DEFAULT NULL,
  `class_code` varchar(6) NOT NULL,
  `lecturer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_title`, `class_code`, `lecturer`) VALUES
(40, 'Harry Potter và phòng ngủ của Darwin', 'Giáo dục công dân', 'C302', NULL),
(41, 'Harry Potter và Thành ', 'Giáo dục giới tính', 'F98293', NULL),
(44, 'Coding ', 'OOPP', '222', 'test_name'),
(48, 'Coding22', 'OOP22', '', 'tdttdt'),
(49, 'Coding22', 'OOP22', '', 'tdttdt'),
(50, 'Coding22', 'OOP22', '', 'tdttdt'),
(51, 'Coding22', 'OOP22', '', 'tdttdt'),
(52, 'Coding22', 'OOP22', '', 'tdttdt'),
(53, 'Coding22', 'OOP22', '', 'tdttdt');

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `class_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lecturer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`class_id`, `user_id`, `lecturer`) VALUES
(44, 5, NULL),
(44, 10, NULL),
(48, 124, NULL),
(48, 13, NULL),
(48, 13, NULL),
(48, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL COMMENT 'id cho từng comment',
  `comment_content` varchar(1000) NOT NULL COMMENT 'Để chứa nội dung comment',
  `post_id` int(11) NOT NULL COMMENT 'id cho post mà cái comment nó thuộc về'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `post_id`) VALUES
(1, 'Chào thầy, em là thành chuối, hôm nay em đau bụng em nghỉ nha dmm bye thầy. ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_content` varchar(1000) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_content`, `class_id`) VALUES
(17, 'rtrtrtrt', 0),
(18, 'hello', 48);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'ID for each user',
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `birthdate`, `email`, `phone`, `role`, `status`) VALUES
(1, 'admin ', '123 ', 'admin ', '2020-11-17', 'admin@classmail.com ', '9', 3, 1),
(5, 'test_username', '123', 'test_name', '2020-06-24', 'testmail@gmail.com ', '343434', 2, 1),
(10, 'dt02', '123', 'thao ta', '0000-00-00', 'tadt515@gmail.com', '09787878787878', 1, 1),
(11, 'dt0222 ', '1 ', 'thao ta ', '2024-04-04', 'tadt5125@gmail.com ', '84976698107', 1, 1),
(13, 'dt02222222222', '1', 'tdttdt', '2024-04-03', 'dt222@gmail.com', '+84976698107', 2, 1),
(15, 'a', '1', 'dt', '2024-06-12', '1', '222222', 2, 1),
(16, '2', '1', 'dt', '2024-06-12', '12', '222222', 1, 1),
(17, '3', '3', 'dt3', '2024-06-12', '3', '222222', 1, 1),
(122, 'dt02222 ', '1 ', 'thao ta ', '2024-04-04', 'tadt51252@gmail.com ', '84976698107', 1, 1),
(124, '111', '1', '111111', '2024-05-09', '1233', '11', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id cho từng comment', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID for each user', AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
