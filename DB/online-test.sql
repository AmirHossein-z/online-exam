-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2023 at 09:53 AM
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
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `option_id`, `exam_id`, `student_id`) VALUES
(49, 64, 67, 26, 24),
(50, 67, 77, 26, 24),
(51, 66, 73, 26, 24),
(52, 64, 67, 26, 24),
(53, 67, 75, 26, 24),
(54, 66, 72, 26, 24),
(55, 64, 67, 26, 24),
(56, 67, 75, 26, 24),
(57, 66, 72, 26, 24),
(58, 64, 67, 26, 24),
(59, 67, 75, 26, 24),
(60, 66, 72, 26, 24),
(61, 64, 67, 26, 24),
(62, 67, 75, 26, 24),
(63, 66, 72, 26, 24),
(64, 64, 67, 26, 24),
(65, 67, 75, 26, 24),
(66, 66, 72, 26, 24),
(67, 64, 67, 26, 24),
(68, 67, 75, 26, 24),
(69, 66, 72, 26, 24),
(70, 64, 67, 26, 24),
(71, 67, 75, 26, 24),
(72, 66, 72, 26, 24),
(73, 64, 67, 26, 24),
(74, 67, 75, 26, 24),
(75, 66, 72, 26, 24),
(76, 64, 67, 26, 24),
(77, 67, 75, 26, 24),
(78, 66, 72, 26, 24),
(79, 64, 67, 26, 24),
(80, 67, 75, 26, 24),
(81, 66, 72, 26, 24),
(82, 64, 67, 26, 24),
(83, 67, 75, 26, 24),
(84, 66, 72, 26, 24),
(85, 64, 67, 26, 24),
(86, 67, 75, 26, 24),
(87, 66, 72, 26, 24),
(88, 64, 67, 26, 24),
(89, 67, 75, 26, 24),
(90, 66, 72, 26, 24),
(91, 64, 67, 26, 24),
(92, 67, 75, 26, 24),
(93, 66, 72, 26, 24),
(94, 64, 67, 26, 24),
(95, 67, 75, 26, 24),
(96, 66, 72, 26, 24),
(97, 64, 67, 26, 24),
(98, 67, 75, 26, 24),
(99, 66, 72, 26, 24),
(100, 64, 67, 26, 24),
(101, 67, 75, 26, 24),
(102, 66, 72, 26, 24),
(103, 64, 67, 26, 24),
(104, 67, 75, 26, 24),
(105, 66, 72, 26, 24),
(106, 64, 67, 26, 24),
(107, 67, 75, 26, 24),
(108, 66, 72, 26, 24),
(109, 64, 67, 26, 24),
(110, 67, 75, 26, 24),
(111, 66, 72, 26, 24),
(112, 64, 67, 26, 24),
(113, 67, 75, 26, 24),
(114, 66, 72, 26, 24),
(115, 64, 67, 26, 24),
(116, 67, 75, 26, 24),
(117, 66, 72, 26, 24),
(118, 64, 67, 26, 24),
(119, 67, 75, 26, 24),
(120, 66, 72, 26, 24),
(121, 64, 67, 26, 24),
(122, 67, 75, 26, 24),
(123, 66, 72, 26, 24),
(124, 64, 67, 26, 24),
(125, 67, 75, 26, 24),
(126, 66, 72, 26, 24),
(127, 64, 67, 26, 24),
(128, 67, 75, 26, 24),
(129, 66, 72, 26, 24),
(130, 64, 67, 26, 24),
(131, 67, 75, 26, 24),
(132, 66, 72, 26, 24),
(133, 64, 67, 26, 24),
(134, 67, 75, 26, 24),
(135, 66, 72, 26, 24),
(136, 64, 67, 26, 24),
(137, 67, 75, 26, 24),
(138, 66, 72, 26, 24),
(139, 64, 67, 26, 24),
(140, 67, 75, 26, 24),
(141, 66, 72, 26, 24),
(142, 64, 67, 26, 24),
(143, 67, 75, 26, 24),
(144, 66, 72, 26, 24),
(145, 64, 67, 26, 24),
(146, 67, 75, 26, 24),
(147, 66, 72, 26, 24),
(148, 64, 67, 26, 24),
(149, 67, 75, 26, 24),
(150, 66, 72, 26, 24),
(151, 64, 67, 26, 24),
(152, 67, 75, 26, 24),
(153, 66, 72, 26, 24),
(154, 64, 67, 26, 24),
(155, 67, 75, 26, 24),
(156, 66, 72, 26, 24),
(157, 64, 67, 26, 24),
(158, 67, 74, 26, 24),
(159, 66, 73, 26, 24),
(160, 64, 67, 26, 24),
(161, 67, 74, 26, 24),
(162, 66, 73, 26, 24),
(163, 64, 67, 26, 24),
(164, 67, 74, 26, 24),
(165, 66, 73, 26, 24),
(166, 64, 67, 26, 24),
(167, 67, 74, 26, 24),
(168, 66, 73, 26, 24),
(169, 64, 67, 26, 24),
(170, 67, 74, 26, 24),
(171, 66, 73, 26, 24),
(172, 64, 67, 26, 24),
(173, 67, 74, 26, 24),
(174, 66, 73, 26, 24),
(175, 64, 67, 26, 24),
(176, 67, 74, 26, 24),
(177, 66, 73, 26, 24),
(178, 64, 67, 26, 24),
(179, 67, 74, 26, 24),
(180, 66, 73, 26, 24),
(181, 64, 67, 26, 24),
(182, 67, 74, 26, 24),
(183, 66, 73, 26, 24),
(184, 64, 67, 26, 24),
(185, 67, 74, 26, 24),
(186, 66, 73, 26, 24),
(187, 64, 67, 26, 24),
(188, 67, 74, 26, 24),
(189, 66, 73, 26, 24),
(190, 64, 67, 26, 24),
(191, 67, 74, 26, 24),
(192, 66, 73, 26, 24),
(193, 64, 67, 26, 24),
(194, 67, 74, 26, 24),
(195, 66, 73, 26, 24),
(196, 64, 67, 26, 24),
(197, 67, 74, 26, 24),
(198, 66, 73, 26, 24),
(199, 64, 67, 26, 24),
(200, 67, 74, 26, 24),
(201, 66, 73, 26, 24),
(202, 64, 67, 26, 24),
(203, 67, 74, 26, 24),
(204, 66, 73, 26, 24),
(205, 64, 67, 26, 24),
(206, 67, 74, 26, 24),
(207, 66, 73, 26, 24),
(208, 64, 67, 26, 24),
(209, 67, 74, 26, 24),
(210, 66, 73, 26, 24),
(211, 64, 67, 26, 24),
(212, 67, 74, 26, 24),
(213, 66, 73, 26, 24),
(214, 64, 67, 26, 24),
(215, 67, 74, 26, 24),
(216, 66, 73, 26, 24),
(217, 64, 67, 26, 24),
(218, 67, 74, 26, 24),
(219, 66, 73, 26, 24),
(220, 64, 67, 26, 24),
(221, 67, 74, 26, 24),
(222, 66, 73, 26, 24),
(223, 64, 67, 26, 24),
(224, 67, 74, 26, 24),
(225, 66, 73, 26, 24),
(226, 64, 67, 26, 24),
(227, 67, 74, 26, 24),
(228, 66, 73, 26, 24),
(229, 64, 67, 26, 24),
(230, 67, 74, 26, 24),
(231, 66, 73, 26, 24),
(232, 64, 67, 26, 24),
(233, 67, 74, 26, 24),
(234, 66, 73, 26, 24),
(235, 64, 67, 26, 24),
(236, 67, 77, 26, 24),
(237, 66, 73, 26, 24),
(238, 64, 67, 26, 24),
(239, 67, 77, 26, 24),
(240, 66, 71, 26, 24),
(241, 64, 67, 26, 24),
(242, 67, 77, 26, 24),
(243, 66, 71, 26, 24),
(244, 64, 67, 26, 24),
(245, 67, 77, 26, 24),
(246, 66, 71, 26, 24),
(247, 64, 67, 26, 24),
(248, 67, 77, 26, 24),
(249, 66, 71, 26, 24),
(250, 64, 67, 26, 24),
(251, 67, 77, 26, 24),
(252, 66, 71, 26, 24),
(253, 64, 67, 26, 24),
(254, 67, 77, 26, 24),
(255, 66, 71, 26, 24),
(256, 64, 66, 26, 24),
(257, 67, 74, 26, 24),
(258, 66, 72, 26, 24),
(259, 64, 66, 26, 24),
(260, 67, 74, 26, 24),
(261, 66, 72, 26, 24),
(262, 64, 66, 26, 24),
(263, 67, 74, 26, 24),
(264, 66, 72, 26, 24),
(265, 64, 66, 26, 24),
(266, 67, 74, 26, 24),
(267, 66, 72, 26, 24),
(268, 64, 66, 26, 24),
(269, 67, 74, 26, 24),
(270, 66, 72, 26, 24),
(271, 64, 66, 26, 24),
(272, 67, 74, 26, 24),
(273, 66, 72, 26, 24),
(274, 64, 66, 26, 24),
(275, 67, 74, 26, 24),
(276, 66, 72, 26, 24),
(277, 64, 66, 26, 24),
(278, 67, 74, 26, 24),
(279, 66, 72, 26, 24),
(280, 64, 66, 26, 24),
(281, 67, 74, 26, 24),
(282, 66, 72, 26, 24),
(283, 64, 66, 26, 24),
(284, 67, 74, 26, 24),
(285, 66, 72, 26, 24),
(286, 64, 67, 26, 24),
(287, 67, 75, 26, 24),
(288, 66, 71, 26, 24),
(289, 64, 66, 26, 24),
(290, 67, 75, 26, 24),
(291, 66, 71, 26, 24),
(292, 64, 66, 26, 24),
(293, 67, 78, 26, 24),
(294, 66, 70, 26, 24),
(295, 64, 66, 26, 24),
(296, 67, 78, 26, 24),
(297, 66, 71, 26, 24),
(298, 64, 66, 26, 24),
(299, 67, 78, 26, 24),
(300, 66, 70, 26, 24);

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
  `date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `title`, `description`, `duration`, `final_grade`, `show_grade`, `date`, `created_at`, `updated_at`) VALUES
(1, 'آزمون زیست', 'توضیحات آزمون زیست', 60, 20.5, 1, '0000-00-00 00:00:00', '2022-12-28 20:36:34', '0000-00-00 00:00:00'),
(2, 'آزمون شیمی', 'توضیحات آزمون شیمی', 80, 20.5, 0, '0000-00-00 00:00:00', '2022-12-28 20:38:55', '0000-00-00 00:00:00'),
(3, 'آزمون ریاضی', 'توضیحات آزمون ریاضی', 85, 20.5, 0, '0000-00-00 00:00:00', '2022-12-28 20:39:31', '0000-00-00 00:00:00'),
(7, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 11:42:21', '0000-00-00 00:00:00'),
(8, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 11:43:10', '0000-00-00 00:00:00'),
(9, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 11:46:25', '0000-00-00 00:00:00'),
(10, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 11:46:33', '0000-00-00 00:00:00'),
(11, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 11:47:26', '0000-00-00 00:00:00'),
(12, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 11:47:29', '0000-00-00 00:00:00'),
(13, 'Veniam ex reiciendi', 'Vero rem ab nostrud ', 31, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 11:48:20', '0000-00-00 00:00:00'),
(14, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '0000-00-00 00:00:00', '2022-12-29 11:50:24', '0000-00-00 00:00:00'),
(15, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '0000-00-00 00:00:00', '2022-12-29 11:51:03', '0000-00-00 00:00:00'),
(16, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '0000-00-00 00:00:00', '2022-12-29 11:52:20', '0000-00-00 00:00:00'),
(17, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '0000-00-00 00:00:00', '2022-12-29 11:52:58', '0000-00-00 00:00:00'),
(18, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '0000-00-00 00:00:00', '2022-12-29 11:53:20', '0000-00-00 00:00:00'),
(19, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '0000-00-00 00:00:00', '2022-12-29 11:55:50', '0000-00-00 00:00:00'),
(20, 'Facilis et blanditii', 'Qui ex qui voluptate', 46, 20.5, 1, '0000-00-00 00:00:00', '2022-12-29 12:00:59', '0000-00-00 00:00:00'),
(21, 'Qui ipsa reprehende', 'Suscipit sequi volup', 2, 20.5, 0, '0000-00-00 00:00:00', '2022-12-29 12:02:40', '0000-00-00 00:00:00'),
(22, 'آزمون تستی', 'توضیحات ', 2, 20.5, 0, '0000-00-00 00:00:00', '2023-01-05 07:20:46', '0000-00-00 00:00:00'),
(23, 'آزمون جدید', 'این یک آزمون جدید است', 22, 20.5, 0, '0000-00-00 00:00:00', '2023-01-05 07:45:55', '0000-00-00 00:00:00'),
(24, 'عنوانی', 'خوبه', 2, 20.5, 0, '0000-00-00 00:00:00', '2023-01-05 07:48:15', '0000-00-00 00:00:00'),
(25, 'عنوان', 'توضیح', 22, 20.5, 0, '0000-00-00 00:00:00', '2023-01-05 15:47:18', '0000-00-00 00:00:00'),
(26, 'ازمون امیرحسین', 'توضیحات', 90, 20.5, 0, '0000-00-00 00:00:00', '2023-01-12 14:40:42', '0000-00-00 00:00:00'),
(27, 'Aspernatur illum la', 'Sint consequatur fu', 37, 20.5, 0, '0000-00-00 00:00:00', '2023-01-23 06:45:15', '0000-00-00 00:00:00'),
(28, 'Voluptas nobis obcae', 'Lorem ipsa anim ut ', 84, 20.5, 0, '1899-12-31 00:00:00', '2023-01-23 06:45:39', '0000-00-00 00:00:00'),
(29, 'Maiores sit ut omnis', 'Architecto veritatis', 83, 20.5, 0, '0000-00-00 00:00:00', '2023-01-23 06:51:44', '0000-00-00 00:00:00'),
(30, 'Maiores sit ut omnis', 'Architecto veritatis', 83, 20.5, 0, '2023-01-04 23:21:45', '2023-01-23 06:55:25', '0000-00-00 00:00:00'),
(31, 'Maiores sit ut omnis', 'Architecto veritatis', 83, 20.5, 0, '0000-00-00 00:00:00', '2023-01-23 06:56:06', '0000-00-00 00:00:00'),
(32, 'Reprehenderit assum', 'Asperiores sint labo', 3, 20.5, 0, '2023-01-12 16:30:00', '2023-01-27 19:35:59', '0000-00-00 00:00:00'),
(33, 'Reprehenderit assum', 'Asperiores sint labo', 3, 20.5, 0, '2023-01-12 16:30:00', '2023-01-27 19:36:49', '0000-00-00 00:00:00'),
(34, 'Vero debitis laudant', 'Sapiente fugit plac', 45, 20.5, 0, '2023-01-27 14:00:00', '2023-01-27 19:44:15', '0000-00-00 00:00:00'),
(35, 'Sequi sunt voluptas ', 'Tempora aut voluptat', 75, 20.5, 0, '2001-07-09 15:00:00', '2023-01-28 08:47:10', '0000-00-00 00:00:00'),
(36, 'Autem nihil enim eni', 'Sint quam in numquam', 66, 20.5, 0, '2012-09-09 02:19:00', '2023-01-28 08:51:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `exam_id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`exam_id`, `master_id`) VALUES
(1, 39),
(2, 39),
(3, 40),
(26, 39),
(30, 40),
(33, 40),
(34, 40),
(35, 40),
(36, 40);

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
(26, 64),
(27, 66),
(27, 67),
(28, 65),
(28, 66),
(28, 67),
(26, 67),
(26, 66);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`master_id`, `name`, `mobile`, `email`, `password`, `identification_token`, `created_at`, `updated_at`) VALUES
(39, 'امیرحسین زارعیان', '09105020429', 'amir@gmail.com', '$2y$10$eDoKVMXr4Xs1GKUYobKegOa2fmF/gAJAzqPteugK.RqnPabxic1um', 'c602f20175421c5a3e8c27e7974ff608ba3aaebb24af0538b4a88c047cb00f9f', '2023-01-12 12:58:07', '0000-00-00 00:00:00'),
(40, 'رضا دهقانی', '09105029431', 'hi@hireza.ir', '$2y$10$2BRxdM/7Xzvl0A/IvVjvG.24MfQ9jQqeSedkjP9wLQrIxEk0H4xJC', 'c602q20175421c5a3e8c27e7974ff608ba3aaebb24af0538b4a88c047sb00f99', '2023-01-12 14:01:44', '0000-00-00 00:00:00');

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
(66, 'ok', 64),
(67, 'ok2', 64),
(68, 'Voluptatem aut imped', 65),
(69, 'Nostrum est nihil q', 65),
(70, '1', 66),
(71, '2', 66),
(72, '3', 66),
(73, '4', 66),
(74, 'dfs', 67),
(75, 'dfsd', 67),
(76, 'sdfsd', 67),
(77, 'sdfsd', 67),
(78, 'fdsd51', 67);

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

CREATE TABLE `participate` (
  `participate_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participate`
--

INSERT INTO `participate` (`participate_id`, `student_id`, `exam_id`, `grade`) VALUES
(1, 24, 26, 2),
(2, 24, 26, 2),
(3, 24, 26, 2),
(4, 24, 26, 2),
(5, 24, 26, 2),
(6, 24, 26, 2),
(7, 24, 26, 0),
(8, 24, 26, 2),
(9, 24, 26, 8.5),
(10, 24, 26, 5.25),
(11, 24, 26, 8.5);

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
(64, 'سوال جدید', 1, 2.000, '2023-01-12 14:40:11', NULL, 39, 66),
(65, 'Et aspernatur laboru', 1, 1.500, '2023-01-23 06:05:37', NULL, 40, 69),
(66, 'Sit quae saepe archi', 1, 3.250, '2023-01-23 06:05:50', NULL, 40, 70),
(67, 'Accusantium laborum', 1, 3.250, '2023-01-23 06:06:11', NULL, 40, 78);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `mobile`, `email`, `password`, `identification_token`, `created_at`, `updated_at`) VALUES
(22, 'یک دانشجو', '09304568329', 'ali@gmail.com', '$2y$10$YuJDQJQ89V.Wb2o9G6dvF.AkHmndUmzErgo3TBiWgJs7NFG2Lkcky', '1f5b34df59b6acc311c5aac366bd9e7b4c244f79b421f446111db80ff562e9e3', '2023-01-12 13:03:46', '0000-00-00 00:00:00'),
(23, 'Imogene Alexander', '', 'nuzo@mailinator.com', '$2y$10$ljr/gpi89FWEDq7Xg6D8Q.tJUeRhsD5tj60sfi4foLmIxAZ4P.pQy', 'a6e3ae671162c5d46a4d83473997950edee7e1fbf484807bd81e402b5d34087c', '2023-01-22 11:07:54', '0000-00-00 00:00:00'),
(24, 'Reza', '', 'hi@hireza.ir', '$2y$10$2BRxdM/7Xzvl0A/IvVjvG.24MfQ9jQqeSedkjP9wLQrIxEk0H4xJC', 'bc9096bce52ff924629f9af2794be81977744a5792c5646b94f3ffc04574986f', '2023-01-22 11:09:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `student_id` int(11) DEFAULT NULL,
  `master_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`student_id`, `master_id`, `status`) VALUES
(22, 39, 1),
(22, 40, 1),
(24, 39, 0),
(24, 40, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `option_id` (`option_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `answer_exam` (`exam_id`),
  ADD KEY `answer_question` (`question_id`);

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
-- Indexes for table `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`participate_id`),
  ADD KEY `participate_student` (`student_id`),
  ADD KEY `participate_exam` (`exam_id`);

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
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `optionn`
--
ALTER TABLE `optionn`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `participate`
--
ALTER TABLE `participate`
  MODIFY `participate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_exam` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`),
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`option_id`) REFERENCES `optionn` (`option_id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `answer_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

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
-- Constraints for table `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_exam` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`exam_id`),
  ADD CONSTRAINT `participate_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

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
