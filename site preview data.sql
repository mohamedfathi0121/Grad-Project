-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 02:41 AM
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
-- Database: `faculty_meeting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_data`
--

CREATE TABLE `application_data` (
  `app_id` tinyint(4) NOT NULL,
  `app_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Uni_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Faculty_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Program_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Faculty-Uni_logo` varchar(50) DEFAULT NULL,
  `Program_logo` varchar(50) DEFAULT NULL,
  `Faculty_Dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Post_grad_vice_dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `st_affairs_vice_dean` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Program_coordinator` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_data`
--

INSERT INTO `application_data` (`app_id`, `app_name`, `Uni_name`, `Faculty_name`, `Program_name`, `Faculty-Uni_logo`, `Program_logo`, `Faculty_Dean`, `Post_grad_vice_dean`, `st_affairs_vice_dean`, `Program_coordinator`) VALUES
(1, 'النظام الإلكتروني لإدارة موضوعات مجلس الكلية', 'جامعة حلوان', 'كلية التجارة وإدارة الأعمال', 'BIS برنامج نظم معلومات الأعمال', 'Facultylogo.jpg', 'program.png', 'أ.د. حسام الرفاعي', 'أ.د. هند عودة', 'أ.د. أماني فاخر', 'أ.م.د. رشا فرغلى');

-- --------------------------------------------------------

--
-- Table structure for table `p39_attendance`
--

CREATE TABLE `p39_attendance` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `meeting_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_attendance`
--

INSERT INTO `p39_attendance` (`user_id`, `meeting_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_dates`
--

CREATE TABLE `p39_dates` (
  `date_id` smallint(5) UNSIGNED NOT NULL,
  `month` tinyint(2) UNSIGNED DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `formation_id` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_dates`
--

INSERT INTO `p39_dates` (`date_id`, `month`, `year`, `formation_id`) VALUES
(73, 9, 2023, 7),
(74, 10, 2023, 7),
(75, 11, 2023, 7),
(76, 12, 2023, 7),
(77, 1, 2024, 7),
(78, 2, 2024, 7),
(79, 3, 2024, 7),
(80, 4, 2024, 7),
(81, 5, 2024, 7),
(82, 6, 2024, 7),
(83, 7, 2024, 7),
(84, 8, 2024, 7);

-- --------------------------------------------------------

--
-- Table structure for table `p39_decision`
--

CREATE TABLE `p39_decision` (
  `decision_id` smallint(5) UNSIGNED NOT NULL,
  `decision_details` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `decision_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `subject_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `needs_action` tinyint(3) UNSIGNED DEFAULT NULL,
  `action_to` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `is_action_done` tinyint(3) UNSIGNED DEFAULT NULL,
  `comments` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_decision`
--

INSERT INTO `p39_decision` (`decision_id`, `decision_details`, `decision_type_id`, `subject_id`, `needs_action`, `action_to`, `is_action_done`, `comments`, `added_on`, `added_by`) VALUES
(1, 'الموافقة على الموضوع', 1, 1, 1, 'د. جمال علي', 1, NULL, '2023-06-24 00:33:49', 1),
(2, 'الرفض على الموضوع', 2, 3, 0, NULL, NULL, NULL, '2023-06-24 00:34:01', 1),
(3, 'الموافقة على الموضوع', 1, 2, 1, 'د محمد عبدالسلام', 0, NULL, '2023-06-24 00:34:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_decision_attachment`
--

CREATE TABLE `p39_decision_attachment` (
  `attachment_id` smallint(5) UNSIGNED NOT NULL,
  `attachment_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `attachment_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `decision_id` smallint(5) UNSIGNED DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_decision_attachment`
--

INSERT INTO `p39_decision_attachment` (`attachment_id`, `attachment_name`, `attachment_title`, `decision_id`, `added_on`, `added_by`) VALUES
(1, 'images/_f73d8b7fdf7faed0f49b4252c9dd8bbb.pdf', 'activity digram (1).pdf', 1, '2023-06-24 00:36:23', 1),
(2, 'images/_f73d8b7fdf7faed0f49b4252c9dd8bbb.pdf', 'activity digram.pdf', 1, '2023-06-24 00:36:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_decision_type`
--

CREATE TABLE `p39_decision_type` (
  `decision_type_id` tinyint(3) UNSIGNED NOT NULL,
  `decision_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_decision_type`
--

INSERT INTO `p39_decision_type` (`decision_type_id`, `decision_type_name`) VALUES
(1, 'موافقة'),
(2, 'رفض'),
(3, 'تأجيل');

-- --------------------------------------------------------

--
-- Table structure for table `p39_department`
--

CREATE TABLE `p39_department` (
  `department_id` tinyint(3) UNSIGNED NOT NULL,
  `department_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_department`
--

INSERT INTO `p39_department` (`department_id`, `department_name`) VALUES
(1, 'قسم المحاسبة'),
(2, 'قسم إدارة الأعمال'),
(3, 'قسم الاقتصاد والتجارة الخارجية'),
(4, 'قسم الإحصاء'),
(5, 'قسم العلوم السياسية'),
(6, 'قسم نظم المعلومات'),
(7, 'عضو خارجي'),
(8, 'إداري');

-- --------------------------------------------------------

--
-- Table structure for table `p39_formation`
--

CREATE TABLE `p39_formation` (
  `formation_id` smallint(5) UNSIGNED NOT NULL,
  `formation_number` mediumint(8) UNSIGNED DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `is_current` tinyint(3) UNSIGNED DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_formation`
--

INSERT INTO `p39_formation` (`formation_id`, `formation_number`, `start_year`, `is_current`, `added_on`, `added_by`) VALUES
(7, 1, 2023, 1, '2023-06-24 00:18:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_formation_user`
--

CREATE TABLE `p39_formation_user` (
  `formation_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `job_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_formation_user`
--

INSERT INTO `p39_formation_user` (`formation_id`, `user_id`, `job_title`) VALUES
(7, 2, 'منسق برنامج BIS'),
(7, 3, 'منسق برنامج BIS'),
(7, 4, 'منسق برنامج BIS'),
(7, 5, 'منسق برنامج BIS');

-- --------------------------------------------------------

--
-- Table structure for table `p39_job_rank`
--

CREATE TABLE `p39_job_rank` (
  `job_rank_id` tinyint(3) UNSIGNED NOT NULL,
  `job_rank_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_job_rank`
--

INSERT INTO `p39_job_rank` (`job_rank_id`, `job_rank_name`) VALUES
(1, 'أستاذ'),
(2, 'أستاذ مساعد'),
(3, 'مدرس'),
(4, 'خبير'),
(5, 'إداري');

-- --------------------------------------------------------

--
-- Table structure for table `p39_job_type`
--

CREATE TABLE `p39_job_type` (
  `job_type_id` tinyint(3) UNSIGNED NOT NULL,
  `job_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_job_type`
--

INSERT INTO `p39_job_type` (`job_type_id`, `job_type_name`) VALUES
(1, 'عميد'),
(2, 'وكيل الكلية'),
(3, 'رئيس قسم'),
(4, 'عضو هيئة تدريس'),
(5, 'إداري'),
(6, 'عضو حارجي'),
(7, 'أخرى');

-- --------------------------------------------------------

--
-- Table structure for table `p39_meeting`
--

CREATE TABLE `p39_meeting` (
  `meeting_id` smallint(5) UNSIGNED NOT NULL,
  `meeting_number` mediumint(8) UNSIGNED DEFAULT NULL,
  `meeting_month` smallint(5) UNSIGNED DEFAULT NULL,
  `meeting_year` year(4) DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `is_current` tinyint(3) UNSIGNED DEFAULT 1,
  `status` enum('pending','confirmed','finished') DEFAULT 'pending',
  `is_shown` tinyint(3) UNSIGNED DEFAULT 0,
  `formation_id` smallint(5) UNSIGNED DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_meeting`
--

INSERT INTO `p39_meeting` (`meeting_id`, `meeting_number`, `meeting_month`, `meeting_year`, `meeting_date`, `is_current`, `status`, `is_shown`, `formation_id`, `added_on`, `added_by`) VALUES
(1, 1, 9, 2023, '2024-01-04', 1, 'pending', 1, 7, '2023-06-24 00:19:31', 1),
(2, 2, 10, 2023, NULL, 0, 'confirmed', 0, 7, '2023-06-24 00:32:28', 1),
(3, 3, 11, 2023, NULL, 0, 'confirmed', 0, 7, '2023-06-24 00:32:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_meeting_attachment`
--

CREATE TABLE `p39_meeting_attachment` (
  `attachment_id` smallint(5) UNSIGNED NOT NULL,
  `attachment_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `attachment_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `meeting_id` smallint(5) UNSIGNED DEFAULT NULL,
  `is_final` tinyint(3) UNSIGNED DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p39_meeting_transaction`
--

CREATE TABLE `p39_meeting_transaction` (
  `transaction_id` smallint(5) UNSIGNED NOT NULL,
  `transaction_type` enum('Edit','Delete') DEFAULT NULL,
  `meeting_id` smallint(5) UNSIGNED DEFAULT NULL,
  `old_row` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `new_row` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `made_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `made_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_meeting_transaction`
--

INSERT INTO `p39_meeting_transaction` (`transaction_id`, `transaction_type`, `meeting_id`, `old_row`, `new_row`, `made_on`, `made_by`) VALUES
(1, 'Edit', 1, '(1, 1, 9, 2023, Null, 1, pending, 1, 7, 2023-06-24 02:19:31, 1)', '(1, 1, 9, 2023, 2024-01-04, 1, pending, 1, 7, 2023-06-24 02:19:31, 1)', '2023-06-24 00:37:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_subject`
--

CREATE TABLE `p39_subject` (
  `order_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `subject_id` mediumint(8) UNSIGNED NOT NULL,
  `subject_number` mediumint(8) UNSIGNED DEFAULT NULL,
  `subject_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `subject_details` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `subject_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `meeting_id` smallint(5) UNSIGNED DEFAULT NULL,
  `comments` text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_subject`
--

INSERT INTO `p39_subject` (`order_id`, `subject_id`, `subject_number`, `subject_name`, `subject_details`, `subject_type_id`, `meeting_id`, `comments`, `added_on`, `added_by`) VALUES
(1, 1, 1, 'توزيع اشراف مشروع التخرج', 'تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع', 1, 1, NULL, '2023-06-24 00:24:23', 1),
(3, 2, 2, 'طلب التحويل', 'تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع', 1, 1, NULL, '2023-06-24 00:24:38', 1),
(2, 3, 3, 'عنوان الموضوع', 'تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع', 5, 1, NULL, '2023-06-24 00:24:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_subject_attachment`
--

CREATE TABLE `p39_subject_attachment` (
  `attachment_id` smallint(5) UNSIGNED NOT NULL,
  `attachment_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `attachment_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `subject_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_subject_attachment`
--

INSERT INTO `p39_subject_attachment` (`attachment_id`, `attachment_name`, `attachment_title`, `subject_id`, `added_on`, `added_by`) VALUES
(1, 'images/_fcdb33449fc6b9c0f29d91060e8de7e2.png', 'add and modify.png', 1, '2023-06-24 00:24:23', 1),
(2, 'images/_f73d8b7fdf7faed0f49b4252c9dd8bbb.pdf', 'activity digram (1).pdf', 1, '2023-06-24 00:24:23', 1),
(3, 'images/_f73d8b7fdf7faed0f49b4252c9dd8bbb.pdf', 'activity digram.pdf', 1, '2023-06-24 00:24:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_subject_picture`
--

CREATE TABLE `p39_subject_picture` (
  `picture_id` smallint(5) UNSIGNED NOT NULL,
  `picture_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `picture_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `subject_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_subject_picture`
--

INSERT INTO `p39_subject_picture` (`picture_id`, `picture_name`, `picture_title`, `subject_id`, `added_on`, `added_by`) VALUES
(1, 'images/_4e7b9bd836e0ad176411f978b2f43449.jpg', 'usecase.jpg', 1, '2023-06-24 00:24:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_subject_transaction`
--

CREATE TABLE `p39_subject_transaction` (
  `transaction_id` smallint(5) UNSIGNED NOT NULL,
  `transaction_type` enum('Edit','Delete') DEFAULT NULL,
  `subject_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `old_row` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `new_row` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `made_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `made_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_subject_transaction`
--

INSERT INTO `p39_subject_transaction` (`transaction_id`, `transaction_type`, `subject_id`, `old_row`, `new_row`, `made_on`, `made_by`) VALUES
(1, 'Edit', 1, '(Null, 1, 1, توزيع اشراف مشروع التخرج, تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع ', '(1, 1, 1, توزيع اشراف مشروع التخرج, تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفا', '2023-06-24 00:25:22', 1),
(2, 'Edit', 3, '(Null, 3, 3, عنوان الموضوع, تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل المو', '(2, 3, 3, عنوان الموضوع, تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع', '2023-06-24 00:25:34', 1),
(3, 'Edit', 2, '(Null, 2, 2, طلب التحويل, تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضو', '(3, 2, 2, طلب التحويل, تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع \r\nتفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع تفاصيل الموضوع ت', '2023-06-24 00:25:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_subject_type`
--

CREATE TABLE `p39_subject_type` (
  `subject_type_id` tinyint(3) UNSIGNED NOT NULL,
  `subject_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_subject_type`
--

INSERT INTO `p39_subject_type` (`subject_type_id`, `subject_type_name`) VALUES
(1, 'شئون التعليم والطلاب'),
(2, 'شئون الدراسات العليا والبحوث'),
(3, 'شئون خدمة المجتمع وتنمية البيئة'),
(4, 'قسم المحاسبة'),
(5, 'قسم إدارة الأعمال'),
(6, 'قسم الاقتصاد والتجارة الخارجية'),
(7, 'قسم الإحصاء'),
(8, 'قسم العلوم السياسية'),
(9, 'قسم نظم المعلومات'),
(10, 'لجنة البرامج'),
(11, 'موضوعات عامة'),
(12, 'لجنة البرامج الجديدة');

-- --------------------------------------------------------

--
-- Table structure for table `p39_users`
--

CREATE TABLE `p39_users` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `job_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `job_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `job_rank_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `department_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `gender` enum('M','F') CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT 'images/members/user.svg',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `is_admin` tinyint(3) UNSIGNED DEFAULT NULL,
  `added_by` smallint(5) UNSIGNED DEFAULT NULL,
  `is_enabled` tinyint(3) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_users`
--

INSERT INTO `p39_users` (`user_id`, `name`, `job_title`, `job_type_id`, `job_rank_id`, `department_id`, `gender`, `image`, `email`, `password`, `is_admin`, `added_by`, `is_enabled`) VALUES
(1, 'محمود بدر', 'Admin', 1, 1, 1, 'M', 'images/members/user.svg', 'm@hotmail.com', '$2y$10$QyL5sGwbWIk./cUXORlNV.9C4ZZsHPV6llGcX5WggZ8tyGcNo0tXS', 1, NULL, 1),
(2, 'د.محمد عبدالسلام', 'منسق برنامج BIS', 4, 1, 6, 'M', 'images/members/_a049ec921032e78a8d869dbe4fb926f8.jpg', 'abdelsalam@gmail.com', '$2y$10$PDgjYoiI2JjCY0nyArhXMO3gyw.ZBclYXgvc0UTvtff7pv629IOLi', 0, 1, 1),
(3, 'د. محمود بهلول', 'منسق برنامج BIS', 4, 1, 6, 'M', 'images/members/user.svg', 'd1@gmail.com', '$2y$10$GphBvDb3uGBnYSkub/E/VeLgml0avW29AaYxFCfHNMizApxJ6JAMq', 0, 1, 1),
(4, 'عبدالرحمن الفرماوي', 'منسق برنامج BIS', 4, 1, 2, 'M', 'images/members/user.svg', 'd2@gmail.com', '$2y$10$4H.Un8zFRSCyWvvNONWATeWowCC75PQUSrnK8frEMjVQsqZgN8lqG', 0, 1, 1),
(5, 'د محمد عبدالوهاب', 'منسق برنامج BIS', 4, 1, 6, 'M', 'images/members/user.svg', 'd3@gmail.com', '$2y$10$oLp6bVbsPLdyJxfVDU259uTAFpGH6EmhsYx0l4Pz28WEAL7nYD/gu', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_user_transaction`
--

CREATE TABLE `p39_user_transaction` (
  `transaction_id` smallint(5) UNSIGNED NOT NULL,
  `transaction_type` enum('Edit','Delete') DEFAULT NULL,
  `user_id` smallint(5) UNSIGNED DEFAULT NULL,
  `old_row` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `new_row` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `made_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `made_by` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_user_transaction`
--

INSERT INTO `p39_user_transaction` (`transaction_id`, `transaction_type`, `user_id`, `old_row`, `new_row`, `made_on`, `made_by`) VALUES
(1, 'Edit', 2, '(2, د.محمد عبدالسلام, منسق برنامج BIS, 4, 1, 6, M, images/members/user.svg, abdelsalam@gmail.com, $2y$10$PDgjYoiI2JjCY0nyArhXMO3gyw.ZBclYXgvc0UTvtff7pv629IOLi, Null, 1, 1)', '(2, د.محمد عبدالسلام, منسق برنامج BIS, 4, 1, 6, M, images/members/_a049ec921032e78a8d869dbe4fb926f8.jpg, abdelsalam@gmail.com, $2y$10$PDgjYoiI2JjCY0nyArhXMO3gyw.ZBclYXgvc0UTvtff7pv629IOLi, Null, 1, 1)', '2023-06-24 00:10:05', 1),
(2, 'Edit', 2, '(2, د.محمد عبدالسلام, منسق برنامج BIS, 4, 1, 6, M, images/members/_a049ec921032e78a8d869dbe4fb926f8.jpg, abdelsalam@gmail.com, $2y$10$PDgjYoiI2JjCY0nyArhXMO3gyw.ZBclYXgvc0UTvtff7pv629IOLi, Null, 1, 1)', '(2, د.محمد عبدالسلام, منسق برنامج BIS, 4, 1, 6, M, images/members/_a049ec921032e78a8d869dbe4fb926f8.jpg, abdelsalam@gmail.com, $2y$10$PDgjYoiI2JjCY0nyArhXMO3gyw.ZBclYXgvc0UTvtff7pv629IOLi, Null, 1, 1)', '2023-06-24 00:18:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p39_vote`
--

CREATE TABLE `p39_vote` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `subject_id` mediumint(8) UNSIGNED NOT NULL,
  `vote_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_vote`
--

INSERT INTO `p39_vote` (`user_id`, `subject_id`, `vote_type_id`, `added_on`) VALUES
(2, 1, 1, '2023-06-24 00:29:12'),
(2, 2, 2, '2023-06-24 00:29:19'),
(2, 3, 2, '2023-06-24 00:29:14'),
(3, 1, 2, '2023-06-24 00:30:38'),
(3, 2, 1, '2023-06-24 00:31:05'),
(3, 3, 4, '2023-06-24 00:30:53'),
(4, 1, 1, '2023-06-24 00:29:45'),
(4, 2, 4, '2023-06-24 00:29:50'),
(4, 3, 3, '2023-06-24 00:29:47'),
(5, 1, 4, '2023-06-24 00:30:09'),
(5, 2, 1, '2023-06-24 00:30:19'),
(5, 3, 5, '2023-06-24 00:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `p39_vote_type`
--

CREATE TABLE `p39_vote_type` (
  `vote_type_id` tinyint(3) UNSIGNED NOT NULL,
  `vote_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p39_vote_type`
--

INSERT INTO `p39_vote_type` (`vote_type_id`, `vote_type_name`) VALUES
(1, 'موافقة'),
(2, 'رفض'),
(3, 'امتناع'),
(4, 'تحفظ'),
(5, 'انسحاب');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_data`
--
ALTER TABLE `application_data`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `p39_attendance`
--
ALTER TABLE `p39_attendance`
  ADD PRIMARY KEY (`user_id`,`meeting_id`),
  ADD KEY `meeting_id` (`meeting_id`);

--
-- Indexes for table `p39_dates`
--
ALTER TABLE `p39_dates`
  ADD PRIMARY KEY (`date_id`),
  ADD KEY `formation_id` (`formation_id`);

--
-- Indexes for table `p39_decision`
--
ALTER TABLE `p39_decision`
  ADD PRIMARY KEY (`decision_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `decision_type_id` (`decision_type_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `p39_decision_attachment`
--
ALTER TABLE `p39_decision_attachment`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `decision_id` (`decision_id`);

--
-- Indexes for table `p39_decision_type`
--
ALTER TABLE `p39_decision_type`
  ADD PRIMARY KEY (`decision_type_id`);

--
-- Indexes for table `p39_department`
--
ALTER TABLE `p39_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `p39_formation`
--
ALTER TABLE `p39_formation`
  ADD PRIMARY KEY (`formation_id`),
  ADD UNIQUE KEY `start_year` (`start_year`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `p39_formation_user`
--
ALTER TABLE `p39_formation_user`
  ADD PRIMARY KEY (`formation_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `p39_job_rank`
--
ALTER TABLE `p39_job_rank`
  ADD PRIMARY KEY (`job_rank_id`);

--
-- Indexes for table `p39_job_type`
--
ALTER TABLE `p39_job_type`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `p39_meeting`
--
ALTER TABLE `p39_meeting`
  ADD PRIMARY KEY (`meeting_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `formation_id` (`formation_id`);

--
-- Indexes for table `p39_meeting_attachment`
--
ALTER TABLE `p39_meeting_attachment`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `meeting_id` (`meeting_id`);

--
-- Indexes for table `p39_meeting_transaction`
--
ALTER TABLE `p39_meeting_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `made_by` (`made_by`);

--
-- Indexes for table `p39_subject`
--
ALTER TABLE `p39_subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `subject_type_id` (`subject_type_id`),
  ADD KEY `meeting_id` (`meeting_id`);

--
-- Indexes for table `p39_subject_attachment`
--
ALTER TABLE `p39_subject_attachment`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `p39_subject_picture`
--
ALTER TABLE `p39_subject_picture`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `p39_subject_transaction`
--
ALTER TABLE `p39_subject_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `made_by` (`made_by`);

--
-- Indexes for table `p39_subject_type`
--
ALTER TABLE `p39_subject_type`
  ADD PRIMARY KEY (`subject_type_id`);

--
-- Indexes for table `p39_users`
--
ALTER TABLE `p39_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `job_type_id` (`job_type_id`),
  ADD KEY `job_rank_id` (`job_rank_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `p39_user_transaction`
--
ALTER TABLE `p39_user_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `made_by` (`made_by`);

--
-- Indexes for table `p39_vote`
--
ALTER TABLE `p39_vote`
  ADD PRIMARY KEY (`user_id`,`subject_id`),
  ADD KEY `vote_type_id` (`vote_type_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `p39_vote_type`
--
ALTER TABLE `p39_vote_type`
  ADD PRIMARY KEY (`vote_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_data`
--
ALTER TABLE `application_data`
  MODIFY `app_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p39_dates`
--
ALTER TABLE `p39_dates`
  MODIFY `date_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `p39_decision`
--
ALTER TABLE `p39_decision`
  MODIFY `decision_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p39_decision_attachment`
--
ALTER TABLE `p39_decision_attachment`
  MODIFY `attachment_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p39_decision_type`
--
ALTER TABLE `p39_decision_type`
  MODIFY `decision_type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p39_department`
--
ALTER TABLE `p39_department`
  MODIFY `department_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p39_formation`
--
ALTER TABLE `p39_formation`
  MODIFY `formation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p39_job_rank`
--
ALTER TABLE `p39_job_rank`
  MODIFY `job_rank_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p39_job_type`
--
ALTER TABLE `p39_job_type`
  MODIFY `job_type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p39_meeting`
--
ALTER TABLE `p39_meeting`
  MODIFY `meeting_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p39_meeting_attachment`
--
ALTER TABLE `p39_meeting_attachment`
  MODIFY `attachment_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p39_meeting_transaction`
--
ALTER TABLE `p39_meeting_transaction`
  MODIFY `transaction_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p39_subject`
--
ALTER TABLE `p39_subject`
  MODIFY `subject_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p39_subject_attachment`
--
ALTER TABLE `p39_subject_attachment`
  MODIFY `attachment_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p39_subject_picture`
--
ALTER TABLE `p39_subject_picture`
  MODIFY `picture_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p39_subject_transaction`
--
ALTER TABLE `p39_subject_transaction`
  MODIFY `transaction_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p39_subject_type`
--
ALTER TABLE `p39_subject_type`
  MODIFY `subject_type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `p39_users`
--
ALTER TABLE `p39_users`
  MODIFY `user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p39_user_transaction`
--
ALTER TABLE `p39_user_transaction`
  MODIFY `transaction_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p39_vote_type`
--
ALTER TABLE `p39_vote_type`
  MODIFY `vote_type_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p39_attendance`
--
ALTER TABLE `p39_attendance`
  ADD CONSTRAINT `p39_attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_attendance_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `p39_meeting` (`meeting_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_dates`
--
ALTER TABLE `p39_dates`
  ADD CONSTRAINT `p39_dates_ibfk_1` FOREIGN KEY (`formation_id`) REFERENCES `p39_formation` (`formation_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_decision`
--
ALTER TABLE `p39_decision`
  ADD CONSTRAINT `p39_decision_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_decision_ibfk_2` FOREIGN KEY (`decision_type_id`) REFERENCES `p39_decision_type` (`decision_type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_decision_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `p39_subject` (`subject_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_decision_attachment`
--
ALTER TABLE `p39_decision_attachment`
  ADD CONSTRAINT `p39_decision_attachment_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_decision_attachment_ibfk_2` FOREIGN KEY (`decision_id`) REFERENCES `p39_decision` (`decision_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_formation`
--
ALTER TABLE `p39_formation`
  ADD CONSTRAINT `p39_formation_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_formation_user`
--
ALTER TABLE `p39_formation_user`
  ADD CONSTRAINT `p39_formation_user_ibfk_1` FOREIGN KEY (`formation_id`) REFERENCES `p39_formation` (`formation_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_formation_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `p39_users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `p39_meeting`
--
ALTER TABLE `p39_meeting`
  ADD CONSTRAINT `p39_meeting_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_meeting_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `p39_formation` (`formation_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_meeting_attachment`
--
ALTER TABLE `p39_meeting_attachment`
  ADD CONSTRAINT `p39_meeting_attachment_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_meeting_attachment_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `p39_meeting` (`meeting_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_meeting_transaction`
--
ALTER TABLE `p39_meeting_transaction`
  ADD CONSTRAINT `p39_meeting_transaction_ibfk_1` FOREIGN KEY (`made_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_subject`
--
ALTER TABLE `p39_subject`
  ADD CONSTRAINT `p39_subject_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_subject_ibfk_2` FOREIGN KEY (`subject_type_id`) REFERENCES `p39_subject_type` (`subject_type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_subject_ibfk_3` FOREIGN KEY (`meeting_id`) REFERENCES `p39_meeting` (`meeting_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_subject_attachment`
--
ALTER TABLE `p39_subject_attachment`
  ADD CONSTRAINT `p39_subject_attachment_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_subject_attachment_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `p39_subject` (`subject_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_subject_picture`
--
ALTER TABLE `p39_subject_picture`
  ADD CONSTRAINT `p39_subject_picture_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_subject_picture_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `p39_subject` (`subject_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_subject_transaction`
--
ALTER TABLE `p39_subject_transaction`
  ADD CONSTRAINT `p39_subject_transaction_ibfk_1` FOREIGN KEY (`made_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_users`
--
ALTER TABLE `p39_users`
  ADD CONSTRAINT `p39_users_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_users_ibfk_2` FOREIGN KEY (`job_type_id`) REFERENCES `p39_job_type` (`job_type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_users_ibfk_3` FOREIGN KEY (`job_rank_id`) REFERENCES `p39_job_rank` (`job_rank_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_users_ibfk_4` FOREIGN KEY (`department_id`) REFERENCES `p39_department` (`department_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_user_transaction`
--
ALTER TABLE `p39_user_transaction`
  ADD CONSTRAINT `p39_user_transaction_ibfk_1` FOREIGN KEY (`made_by`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `p39_vote`
--
ALTER TABLE `p39_vote`
  ADD CONSTRAINT `p39_vote_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `p39_users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_vote_ibfk_2` FOREIGN KEY (`vote_type_id`) REFERENCES `p39_vote_type` (`vote_type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `p39_vote_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `p39_subject` (`subject_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
