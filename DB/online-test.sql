-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2023 at 04:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(21, 'Qui ipsa reprehende', 'Suscipit sequi volup', 2, 20.5, 0, '2022-12-29 12:02:40', '0000-00-00 00:00:00'),
(22, 'آزمون تستی', 'توضیحات ', 2, 20.5, 0, '2023-01-05 07:20:46', '0000-00-00 00:00:00'),
(23, 'آزمون جدید', 'این یک آزمون جدید است', 22, 20.5, 0, '2023-01-05 07:45:55', '0000-00-00 00:00:00'),
(24, 'عنوانی', 'خوبه', 2, 20.5, 0, '2023-01-05 07:48:15', '0000-00-00 00:00:00'),
(25, 'عنوان', 'توضیح', 22, 20.5, 0, '2023-01-05 15:47:18', '0000-00-00 00:00:00'),
(26, 'ازمون امیرحسین', 'توضیحات', 90, 20.5, 0, '2023-01-12 14:40:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `exam_id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`exam_id`, `master_id`) VALUES
(1, 39),
(2, 39),
(3, 40),
(26, 39);

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`exam_id`, `question_id`) VALUES
(26, 64);

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
  `identification_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`master_id`, `name`, `mobile`, `email`, `password`, `identification_token`, `created_at`, `updated_at`) VALUES
(39, 'امیرحسین زارعیان', '09105020429', 'amir@gmail.com', '$2y$10$eDoKVMXr4Xs1GKUYobKegOa2fmF/gAJAzqPteugK.RqnPabxic1um', 'c602f20175421c5a3e8c27e7974ff608ba3aaebb24af0538b4a88c047cb00f9f', '2023-01-12 12:58:07', '0000-00-00 00:00:00'),
(40, 'رضا دهقانی', '09105029431', 'reza@gmail.com', '$2y$10$eDoKVMXr4Xs1GKUYobKegOa2fmF/gAJAzqPteugK.RqnPabxic1um', 'c602q20175421c5a3e8c27e7974ff608ba3aaebb24af0538b4a88c047sb00f9f', '2023-01-12 14:01:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `optionn`
--

CREATE TABLE `optionn` (
  `option_id` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `optionn`
--

INSERT INTO `optionn` (`option_id`, `info`, `question_id`) VALUES
(66, 'ok', 64),
(67, 'ok2', 64);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `q_info`, `type`, `grade`, `created_at`, `updated_at`, `master_id`, `option_id`) VALUES
(64, 'سوال جدید', 1, 2.000, '2023-01-12 14:40:11', NULL, 39, 66);

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
  `identification_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `mobile`, `email`, `password`, `identification_token`, `created_at`, `updated_at`) VALUES
(22, 'یک دانشجو', '09304568329', 'ali@gmail.com', '$2y$10$YuJDQJQ89V.Wb2o9G6dvF.AkHmndUmzErgo3TBiWgJs7NFG2Lkcky', '1f5b34df59b6acc311c5aac366bd9e7b4c244f79b421f446111db80ff562e9e3', '2023-01-12 13:03:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `student_id` int(11) DEFAULT NULL,
  `master_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`student_id`, `master_id`, `status`) VALUES
(22, 39, 1),
(22, 40, 1);

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
-- Indexes for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `master_id` (`master_id`);

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
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `optionn`
--
ALTER TABLE `optionn`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Constraints for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD CONSTRAINT `exam_master_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`),
  ADD CONSTRAINT `exam_master_ibfk_2` FOREIGN KEY (`master_id`) REFERENCES `master` (`master_id`);

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
