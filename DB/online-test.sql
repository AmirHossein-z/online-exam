-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2022 at 01:04 PM
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
-- Database: `online-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `final_grade` float NOT NULL,
  `show_grade` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `title`, `description`, `duration`, `final_grade`, `show_grade`, `created_at`, `updated_at`) VALUES
(1, 'آزمون زیست', 'توضیحات آزمون زیست', 60, 20.5, 1, '2022-12-28 20:36:34', '0000-00-00 00:00:00'),
(2, 'آزمون شیمی', 'توضیحات آزمون شیمی', 80, 20.5, 0, '2022-12-28 20:38:55', '0000-00-00 00:00:00'),
(3, 'آزمون ریاضی', 'توضیحات آزمون ریاضی', 85, 20.5, 0, '2022-12-28 20:39:31', '0000-00-00 00:00:00'),
(7, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '2022-12-29 11:42:21', '0000-00-00 00:00:00'),
(8, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '2022-12-29 11:43:10', '0000-00-00 00:00:00'),
(9, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '2022-12-29 11:46:25', '0000-00-00 00:00:00'),
(10, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '2022-12-29 11:46:33', '0000-00-00 00:00:00'),
(11, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '2022-12-29 11:47:26', '0000-00-00 00:00:00'),
(12, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '2022-12-29 11:47:29', '0000-00-00 00:00:00'),
(13, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '2022-12-29 11:48:20', '0000-00-00 00:00:00'),
(14, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '2022-12-29 11:50:24', '0000-00-00 00:00:00'),
(15, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '2022-12-29 11:51:03', '0000-00-00 00:00:00'),
(16, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '2022-12-29 11:52:20', '0000-00-00 00:00:00'),
(17, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '2022-12-29 11:52:58', '0000-00-00 00:00:00'),
(18, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '2022-12-29 11:53:20', '0000-00-00 00:00:00'),
(19, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '2022-12-29 11:55:50', '0000-00-00 00:00:00'),
(20, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '2022-12-29 12:00:59', '0000-00-00 00:00:00'),
(21, 'Qui ipsa reprehende', 'Suscipit sequi volup', 2, 20.5, 0, '2022-12-29 12:02:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`exam_id`, `question_id`) VALUES
(20, 59),
(20, 60),
(21, 60);

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `master_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`master_id`, `name`, `mobile`, `email`, `password`, `access_token`, `created_at`, `updated_at`) VALUES
(3, 'Amirhossein Zareian', '09105020429', 'amir@gmail.com', '$2y$10$ytJhDUyRoKl8AaIKbIY5FeOL0cp3tl8PJcyJM3GR3lX/8B0YiKbMW', '364f1d204129479c8af5c846de23f998', '2022-12-21 13:31:29', '0000-00-00 00:00:00'),
(4, 'رضا دهقانی', '09001234567', 'hi@hireza.ir', '$2y$10$a2qgCdB958kjTpAzJVjewOMQ0ETDWqnmFep6hZTr8vGuaA4AYtVTi', '62aa54099a6bbe8e59a037b9cc11ba4a', '2022-12-28 08:40:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `optionn`
--

CREATE TABLE `optionn` (
  `option_id` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `optionn`
--

INSERT INTO `optionn` (`option_id`, `info`, `question_id`) VALUES
(49, 'انیشتین', 56),
(50, 'استیون هاوکینگ', 56),
(51, 'این یک سوال باز است که بسته به فرد ممکن است پاسخ متفاوتی داشته باشد', 57),
(52, 'ماهی', 59),
(53, 'مارمولک', 59),
(54, 'اژدها', 59),
(55, 'مار', 59),
(56, '۱', 60),
(57, '۲', 60),
(58, '', 60),
(59, '۳', 60);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `q_info` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `grade` float(5,3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `master_id` int(11) NOT NULL,
  `option_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `q_info`, `type`, `grade`, `created_at`, `updated_at`, `master_id`, `option_id`) VALUES
(56, 'کدام دانشمند نظریه نسبیت عام را مطرح کرد؟', 1, 1.500, '2022-12-27 12:44:58', NULL, 3, 49),
(57, 'این سوال تشریحی را پاسخ بدهید:چرا ما افریده شده ایم؟', 0, 0.500, '2022-12-27 12:48:11', NULL, 3, 51),
(59, 'کدام یک از موجودات زیر آبزی است؟', 1, 0.000, '2022-12-28 09:43:39', NULL, 4, 52),
(60, 'تست ۴ گزینه ای', 1, 0.000, '2022-12-28 09:58:42', NULL, 4, 56);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `mobile`, `email`, `password`, `access_token`, `created_at`, `updated_at`) VALUES
(15, 'amir', '09105020429', 'amir@gmail.com', '$2y$10$vjQaWb.d0RfO7V0KvGZSE.nF4CcQF3d8rOjJyu1R6NcJj/D2GhPAW', '70b7119710fdd457a4f7fe8ecaa6ba70', '2022-12-22 11:17:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `student_id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `option_id` (`option_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD KEY `exam_question_exam` (`exam_id`),
  ADD KEY `exam_question_question` (`question_id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `optionn`
--
ALTER TABLE `optionn`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `master_id` (`master_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD KEY `student_id` (`student_id`,`master_id`),
  ADD KEY `master_id` (`master_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `optionn`
--
ALTER TABLE `optionn`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`option_id`) REFERENCES `optionn` (`option_id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD CONSTRAINT `exam_question_exam` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`),
  ADD CONSTRAINT `exam_question_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `optionn`
--
ALTER TABLE `optionn`
  ADD CONSTRAINT `optionn_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `master` (`master_id`);

--
-- Constraints for table `student_master`
--
ALTER TABLE `student_master`
  ADD CONSTRAINT `student_master_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `master` (`master_id`),
  ADD CONSTRAINT `student_master_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
