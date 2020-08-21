-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 05:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Tuấn', 'admin', 'admin1@gmail.com', NULL, '$2y$10$.qMhWRpUwsM2p0vUZrlBgeAWCwB7/ztQSQgfkMzX6cNy.kWVmCRg.', NULL, '2020-08-17 20:09:04', '2020-08-17 20:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Front-End', NULL, NULL, NULL),
(2, 'Back-End', NULL, NULL, NULL),
(3, 'Android', NULL, NULL, NULL),
(4, 'IOS bbsbsb', NULL, '2020-08-13 06:29:51', NULL),
(6, 'Toán học', '2020-08-14 11:18:35', '2020-08-14 11:18:35', 'toan-hoc'),
(7, 'DevOps', '2020-08-19 10:03:27', '2020-08-19 10:03:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `thumbnail`, `category_id`, `description`, `price`, `created_at`, `updated_at`, `slug`, `status_id`) VALUES
(1, 'PHP Co ban', 'upload/course/cac-ong-chu-hoang-loan-tim-mua-phan-mem-gian-diep-theo-doi-nhan-vien-dang-lam-viec-tai-nha-696x522.jpg', 2, 'học về php nè', NULL, '2020-07-14 01:57:25', '2020-08-16 07:08:28', 'php-co-ban', 1),
(2, 'Java swing', 'upload/course/amstrong.PNG', 3, 'Học về java nè3', NULL, '2020-08-12 17:48:42', '2020-08-12 18:48:06', 'java-swing', 1),
(3, 'Python', 'upload/course/php.PNG', 2, 'scscscsc', NULL, '2020-08-12 18:33:18', '2020-08-12 19:14:35', 'python', -1),
(4, 'Vue JS', 'upload/course/amstrong.PNG', 1, 'sdfsdfsđ', NULL, '2020-08-12 18:33:31', '2020-08-16 09:58:30', 'vue-js', 1),
(5, 'React JS', 'upload/course/1dbe2-1528032422-800.jpg', 1, 'ndndndn', NULL, '2020-08-12 18:33:38', '2020-08-16 09:58:36', 'react-js', 1),
(6, 'Angular JS', 'upload/course/kisscc0-laptop-macbook-pro-table-desk-computer-5afd7c7fa283764004869415265619196657-15858846028109626645.jpg', 1, 'dfsdfs', NULL, '2020-08-12 18:33:53', '2020-08-16 09:59:00', 'angular-js', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `username`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `status`, `avatar`, `about`, `work_place`) VALUES
(1, 'Sarah Parker', 'mentortest', 'mentortest@gmail.com', '$2y$10$5IqY0xjyikBc5FPXU7lzPOfJx5dvdecQgkx3bI9icp88Ib0WxW8Fi', NULL, NULL, '2020-08-20 18:54:07', '2020-08-20 19:51:24', '1', 'upload/instructors/avatar/instructor_2.jpg', 'sss', NULL),
(2, 'mentor02', 'mentor02', 'mentor02@gmail.com', '$2y$10$pT9bZf8xHt2GdXBTV5oVkOFTL25OUnBVsWwc0dkp0/YmuG0jWJWBy', NULL, NULL, '2020-08-20 19:50:02', '2020-08-20 19:52:14', NULL, 'upload/instructors/avatar/instructor_3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `video`, `course_id`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Viết chương trình hello world trong python', 'm66j0nKBMdc', 3, 1, '2020-08-15 07:20:03', '2020-08-16 17:54:39', 'viet-chuong-trinh-hello-world-trong-python'),
(2, 'Viết chương trình hello world trong java', 'ok', 2, 1, '2020-08-15 07:22:14', '2020-08-16 17:55:18', 'viet-chuong-trinh-hello-world-trong-java'),
(3, 'Biến trong python', 'nBBXR_imVKA', 3, 1, '2020-08-15 07:47:39', '2020-08-16 18:56:03', 'bien-trong-python'),
(4, 'Viết chương trình hello world trong PHP', 'không có 12', 1, 1, '2020-08-16 07:03:23', '2020-08-16 10:00:57', 'viet-chuong-trinh-hello-world-trong-php'),
(5, 'Hello World Angular', 'Pd9QnYUwrAU', 6, 1, '2020-08-20 19:57:12', '2020-08-20 19:57:12', 'hello-world-angular');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2020_07_14_080528_create_table_courses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `name`, `avatar`, `about`, `work_place`) VALUES
(1, 'tuannguyensn2001', 'devpro2001@gmail.com', NULL, '$2y$10$WDYiGnpbeeq8rkU6.vzMRewVbURo8.4ZRL6HEr263fAS.ap0pv65K', NULL, '2020-07-14 01:55:49', '2020-08-19 23:27:42', 1, 'Nguyễn Văn Tuấn', 'upload/users/avatar/555555.jpg', 'hellos', 'HUS'),
(2, 'admintest', 'admintest@gmail.com', NULL, '$2y$10$4Aryn8/rJnEm5BLIBRdduusuZaRM.C/LyeIaj6.eN8tJFHDj/EwTS', NULL, '2020-08-18 19:49:40', '2020-08-19 08:36:44', 1, 'Admin', 'upload/users/avatar/70887935_468320187097119_5797944286091673600_n.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertocourse`
--

CREATE TABLE `usertocourse` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `type` int(255) DEFAULT NULL COMMENT '1: student , 2:instructors'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertocourse`
--

INSERT INTO `usertocourse` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`, `is_active`, `type`) VALUES
(1, 1, 1, '2020-08-19 10:10:03', '2020-08-20 19:24:58', '0', 1),
(2, 1, 2, '2020-08-19 11:00:17', '2020-08-20 18:40:59', '1', 1),
(3, 2, 6, '2020-08-19 11:01:40', '2020-08-20 18:41:23', '1', 1),
(4, 1, 3, '2020-08-19 19:24:40', '2020-08-20 18:41:00', '1', 1),
(5, 1, 5, '2020-08-20 19:24:16', '2020-08-20 19:27:06', '1', 2),
(6, 1, 4, '2020-08-20 19:24:18', '2020-08-20 19:27:08', '1', 2),
(7, 2, 2, '2020-08-20 19:56:04', '2020-08-20 19:56:04', '1', 2),
(8, 2, 3, '2020-08-20 19:56:06', '2020-08-20 19:56:06', '1', 2),
(9, 2, 4, '2020-08-20 19:56:06', '2020-08-20 19:56:06', '1', 2),
(10, 1, 6, '2020-08-20 19:57:32', '2020-08-20 19:57:32', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertocourse`
--
ALTER TABLE `usertocourse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertocourse`
--
ALTER TABLE `usertocourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
