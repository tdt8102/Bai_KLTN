-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2024 lúc 04:34 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `google-classroom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(120) NOT NULL,
  `class_title` varchar(120) DEFAULT NULL,
  `class_code` varchar(6) NOT NULL,
  `lecturer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_title`, `class_code`, `lecturer`) VALUES
(40, 'Công nghệ thông tin', 'OOP    ', 'C302', 'dt'),
(54, 'Coding22', 'OOP22', '', 'dt'),
(59, 'Tin học lớp 7', 'tin học văn phòng 2 ', '', 'dt'),
(79, 'Cong Nghe Thong tin', 'OOP', '', 'dt'),
(80, 'Tin học lớp 7', 'Tin học văn phòng', '', 'tdttdt'),
(91, 'Lịch Sử', 'Lịch Sử VN', '', 'dt'),
(94, 'Địa Lý   ', '1 2 ', '', 'dt'),
(95, 'Khoa học', 'Tự nhiên', '', 'dt'),
(96, 'Toán lớp 10', 'Đại số', '', 'dt'),
(97, 'Toán lớp 10', 'Hình học', '', 'dt'),
(98, 'Ngữ Văn', 'Văn học', '', 'dt'),
(99, 'Tin học lớp 10', 'C++', '', 'dt'),
(100, 'Tin học 11', 'C#', '', 'dt'),
(101, 'Mỹ thuật', 'Chân dung', '', 'dt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_list`
--

CREATE TABLE `class_list` (
  `class_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lecturer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `class_list`
--

INSERT INTO `class_list` (`class_id`, `user_id`, `lecturer`) VALUES
(40, 15, NULL),
(40, 17, NULL),
(40, 16, NULL),
(59, 13, NULL),
(91, 15, NULL),
(94, 15, NULL),
(95, 15, NULL),
(96, 15, NULL),
(96, 15, NULL),
(98, 15, NULL),
(99, 15, NULL),
(100, 15, NULL),
(101, 15, NULL),
(94, 16, NULL),
(95, 16, NULL),
(96, 16, NULL),
(97, 16, NULL),
(98, 16, NULL),
(99, 16, NULL),
(100, 16, NULL),
(40, 126, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL COMMENT 'id cho từng comment',
  `comment_content` varchar(1000) NOT NULL COMMENT 'Để chứa nội dung comment',
  `post_id` int(11) NOT NULL COMMENT 'id cho post mà cái comment nó thuộc về'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `post_id`) VALUES
(1, 'Chào thầy, em là thành chuối, hôm nay em đau bụng em nghỉ nha dmm bye thầy. ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id_cmt` int(11) NOT NULL,
  `post_content` varchar(1000) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id_cmt`, `post_content`, `class_id`, `user_id`, `file_name`, `file_type`, `file_path`) VALUES
(17, 'rtrtrtrt', 0, 0, NULL, NULL, NULL),
(23, 'hello', 75, 0, NULL, NULL, NULL),
(37, 'hom nay hoi nang qua 22', 40, 15, NULL, NULL, NULL),
(39, 'hay qua', 40, 17, NULL, NULL, NULL),
(40, 'hay nhi 123 456', 40, 15, NULL, NULL, NULL),
(41, 'https://getbootstrap.com/docs/3.3/getting-started/', 40, 15, NULL, NULL, NULL),
(42, '123', 59, 13, NULL, NULL, NULL),
(43, 'hello', 59, 13, NULL, NULL, NULL),
(44, 'tai sao lai khong hien len', 59, 13, NULL, NULL, NULL),
(45, '123', 59, 13, NULL, NULL, NULL),
(46, '', 81, 0, NULL, NULL, NULL),
(47, '', 87, 5, NULL, NULL, NULL),
(48, 'hello', 87, 5, NULL, NULL, NULL),
(49, '', 88, 0, NULL, NULL, NULL),
(50, '', 89, 0, NULL, NULL, NULL),
(54, 'link boostrap https://getbootstrap.com/docs/3.3/getting-started/', 40, 15, NULL, NULL, NULL),
(55, '123', 40, 17, NULL, NULL, NULL),
(66, '', 90, 0, NULL, NULL, NULL),
(67, '', 91, 0, NULL, NULL, NULL),
(68, '', 90, 0, NULL, NULL, NULL),
(69, '', 90, 0, NULL, NULL, NULL),
(70, '', 94, 0, NULL, NULL, NULL),
(71, 'Tìm nghiệm nguyên của phương trình x^2 y^2=xy x y', 40, 15, NULL, NULL, NULL),
(72, 'hello', 40, 15, NULL, NULL, NULL),
(73, '', 95, 0, NULL, NULL, NULL),
(74, '', 96, 0, NULL, NULL, NULL),
(75, '', 96, 0, NULL, NULL, NULL),
(76, '', 98, 0, NULL, NULL, NULL),
(77, '', 99, 0, NULL, NULL, NULL),
(78, '', 100, 0, NULL, NULL, NULL),
(79, '', 101, 0, NULL, NULL, NULL),
(80, '', 102, 0, NULL, NULL, NULL),
(81, '', 102, 0, NULL, NULL, NULL),
(82, '', 104, 0, NULL, NULL, NULL),
(83, '', 105, 0, NULL, NULL, NULL),
(84, '', 106, 0, NULL, NULL, NULL),
(85, '', 106, 0, NULL, NULL, NULL),
(86, '', 108, 0, NULL, NULL, NULL),
(87, '', 105, 0, NULL, NULL, NULL),
(88, '', 110, 0, NULL, NULL, NULL),
(89, '', 106, 0, NULL, NULL, NULL),
(90, '', 105, 0, NULL, NULL, NULL),
(91, '', 110, 0, NULL, NULL, NULL),
(92, '', 114, 0, NULL, NULL, NULL),
(93, '', 115, 0, NULL, NULL, NULL),
(94, 'Hôm nay được nghỉ nhé', 40, 15, NULL, NULL, NULL),
(95, 'hello hp', 40, 15, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `birthdate`, `email`, `phone`, `role`, `status`) VALUES
(1, '122', 'dt', '1  ', '0000-00-00', '2024-04-04', 'tadt51252@gmail.com ', 2, 1),
(2, 'admin1 ', '1 ', '111 ', '2024-05-09', 'admin1 ', '222222', 3, 1),
(5, 'test_username', '123', 'test_name', '2020-06-24', 'testmail@gmail.com ', '343434', 2, 1),
(10, 'dt02', '123', 'thao ta', '0000-00-00', 'tadt515@gmail.com', '09787878787878', 1, 1),
(11, 'dt0222 ', '1 ', 'thao ta ', '2024-04-04', 'tadt5125@gmail.com ', '84976698107', 1, 1),
(13, 'dt02222222222', '1', 'tdttdt', '2024-04-03', 'dt222@gmail.com', '+84976698107', 2, 1),
(15, 'a', '1', 'dt', '2024-06-12', '1', '222222', 2, 1),
(16, '2 ', '1 ', 'dt3333 ', '2024-06-12', '12 ', '222222 ', 1, 1),
(126, 'tdt', '1', 'dt02', '2002-11-21', 'dt02', '098', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_cmt`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id cho từng comment', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID for each user', AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
