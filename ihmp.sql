-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 03:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

CREATE TABLE `access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_tokens`
--

INSERT INTO `access_tokens` (`id`, `user_id`, `token_key`, `token_status`, `expiration`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dnr9W8XeA0img1nTl5sCqnNAZtZPOOb9|1', 'valid', '2021-07-11 11:54:35', '2021-05-22 16:51:07', '2021-07-10 15:54:35'),
(2, 2, 'jkNDc9y5ZZw0J8FxvUX22LYGdDLgjTKR|2', 'expired', '2021-06-28 07:42:21', '2021-05-23 10:03:07', '2021-06-28 04:37:11'),
(3, 3, 'n32GvIvQGMDNVSqc90TwqCPtSSqsKaiH|3', 'expired', '2021-06-28 07:14:06', '2021-06-27 10:51:33', '2021-06-27 11:14:11'),
(4, 7, 'ImJNguNW7PlyI73k8ZLkAFlAspzMmVuB|7', 'valid', '2021-06-28 06:57:43', '2021-06-27 10:57:43', '2021-06-27 10:57:43'),
(5, 23, 'D6gb2HwVAlbnKizhM45Dm1q7zxmMwic7|23', 'expired', '2021-06-29 09:46:44', '2021-06-28 13:37:38', '2021-06-28 13:50:24'),
(6, 25, 'LFGjiRayuC2QCJFBcFoBSSddNv1Mkcwg|25', 'valid', '2021-07-05 05:21:28', '2021-07-04 07:00:49', '2021-07-04 09:21:28'),
(7, 26, '5DUTlN2zTUr7i5netZK6WhpFxjImwRzg|26', 'valid', '2021-07-05 03:40:41', '2021-07-04 07:40:28', '2021-07-04 07:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priest_id` int(11) NOT NULL,
  `meta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `firstname`, `middlename`, `lastname`, `certificate_type`, `priest_id`, `meta`, `is_deleted`, `created_by`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa', 'aaaaa', 'aaaaa', 'confirmation', 0, '{\"father_firstname\":\"aaaaa\",\"father_middlename\":\"aaaaa\",\"father_lastname\":\"aaaaa\",\"mother_firstname\":\"aaaaa\",\"mother_middlename\":\"aaaaa\",\"mother_lastname\":\"aaaaa\",\"confirmation_day\":28,\"confirmation_month\":12,\"confirmation_year\":2010,\"confirmation_by\":\"aaaaa\",\"first_sponsor\":\"aaaaa\",\"second_sponsor\":\"aaaaa\",\"registration_book\":\"1\",\"book_page\":\"1\",\"book_number\":\"1\",\"date_issued\":\"12\\/28\\/2010\"}', 0, 1, '21-07-05 21:06:20', '2021-07-05 13:06:20', '2021-07-05 13:06:20'),
(2, 'bbbbb', 'bbbbb', 'bbbbb', 'confirmation', 0, '{\"father_firstname\":\"bbbbb\",\"father_middlename\":\"bbbbb\",\"father_lastname\":\"bbbbb\",\"mother_firstname\":\"bbbbb\",\"mother_middlename\":\"bbbbb\",\"mother_lastname\":\"bbbbb\",\"confirmation_day\":29,\"confirmation_month\":12,\"confirmation_year\":2010,\"confirmation_by\":\"bbbbb\",\"first_sponsor\":\"bbbbb\",\"second_sponsor\":\"bbbbb\",\"registration_book\":\"2\",\"book_page\":\"2\",\"book_number\":\"2\",\"date_issued\":\"12\\/29\\/2010\"}', 0, 1, '21-07-05 21:06:22', '2021-07-05 13:06:22', '2021-07-05 13:06:22'),
(3, 'ccccc', 'ccccc', 'ccccc', 'confirmation', 0, '{\"father_firstname\":\"\",\"father_middlename\":\"ccccc\",\"father_lastname\":\"ccccc\",\"mother_firstname\":\"ccccc\",\"mother_middlename\":\"ccccc\",\"mother_lastname\":\"ccccc\",\"confirmation_day\":30,\"confirmation_month\":12,\"confirmation_year\":2010,\"confirmation_by\":\"ccccc\",\"first_sponsor\":\"ccccc\",\"second_sponsor\":\"ccccc\",\"registration_book\":\"3\",\"book_page\":\"3\",\"book_number\":\"3\",\"date_issued\":\"12\\/30\\/2010\"}', 0, 1, '21-07-05 21:06:24', '2021-07-05 13:06:24', '2021-07-05 13:06:24'),
(4, 'dddd', 'dddd', 'dddd', 'confirmation', 0, '{\"father_firstname\":\"\",\"father_middlename\":\"dddd\",\"father_lastname\":\"dddd\",\"mother_firstname\":\"dddd\",\"mother_middlename\":\"dddd\",\"mother_lastname\":\"dddd\",\"confirmation_day\":31,\"confirmation_month\":12,\"confirmation_year\":2010,\"confirmation_by\":\"dddd\",\"first_sponsor\":\"dddd\",\"second_sponsor\":\"dddd\",\"registration_book\":\"4\",\"book_page\":\"4\",\"book_number\":\"4\",\"date_issued\":\"12\\/31\\/2010\"}', 0, 1, '21-07-05 21:06:26', '2021-07-05 13:06:26', '2021-07-05 13:06:26'),
(5, 'eeee', 'eeee', 'eeee', 'confirmation', 0, '{\"father_firstname\":\"\",\"father_middlename\":\"eeee\",\"father_lastname\":\"eeee\",\"mother_firstname\":\"eeee\",\"mother_middlename\":\"eeee\",\"mother_lastname\":\"eeee\",\"confirmation_day\":1,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"eeee\",\"first_sponsor\":\"eeee\",\"second_sponsor\":\"eeee\",\"registration_book\":\"5\",\"book_page\":\"5\",\"book_number\":\"5\",\"date_issued\":\"1\\/1\\/2011\"}', 0, 1, '21-07-05 21:06:27', '2021-07-05 13:06:27', '2021-07-05 13:06:27'),
(6, 'ffff', 'ffff', 'ffff', 'confirmation', 0, '{\"father_firstname\":\"ffff\",\"father_middlename\":\"ffff\",\"father_lastname\":\"ffff\",\"mother_firstname\":\"ffff\",\"mother_middlename\":\"ffff\",\"mother_lastname\":\"ffff\",\"confirmation_day\":2,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"ffff\",\"first_sponsor\":\"ffff\",\"second_sponsor\":\"ffff\",\"registration_book\":\"6\",\"book_page\":\"6\",\"book_number\":\"6\",\"date_issued\":\"1\\/2\\/2011\"}', 0, 1, '21-07-05 21:06:29', '2021-07-05 13:06:29', '2021-07-05 13:06:29'),
(7, 'gggg', 'gggg', 'gggg', 'confirmation', 0, '{\"father_firstname\":\"gggg\",\"father_middlename\":\"gggg\",\"father_lastname\":\"gggg\",\"mother_firstname\":\"gggg\",\"mother_middlename\":\"gggg\",\"mother_lastname\":\"gggg\",\"confirmation_day\":3,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"gggg\",\"first_sponsor\":\"gggg\",\"second_sponsor\":\"gggg\",\"registration_book\":\"7\",\"book_page\":\"7\",\"book_number\":\"7\",\"date_issued\":\"1\\/3\\/2011\"}', 0, 1, '21-07-05 21:06:32', '2021-07-05 13:06:32', '2021-07-05 13:06:32'),
(8, 'iiiii', 'iiiii', 'iiiii', 'confirmation', 0, '{\"father_firstname\":\"iiiii\",\"father_middlename\":\"iiiii\",\"father_lastname\":\"iiiii\",\"mother_firstname\":\"iiiii\",\"mother_middlename\":\"iiiii\",\"mother_lastname\":\"iiiii\",\"confirmation_day\":5,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"iiiii\",\"first_sponsor\":\"iiiii\",\"second_sponsor\":\"iiiii\",\"registration_book\":\"9\",\"book_page\":\"9\",\"book_number\":\"9\",\"date_issued\":\"1\\/5\\/2011\"}', 0, 1, '21-07-05 21:06:33', '2021-07-05 13:06:33', '2021-07-05 13:06:33'),
(9, 'jjjjjj', 'jjjjjj', 'jjjjjj', 'confirmation', 0, '{\"father_firstname\":\"jjjjjj\",\"father_middlename\":\"jjjjjj\",\"father_lastname\":\"jjjjjj\",\"mother_firstname\":\"jjjjjj\",\"mother_middlename\":\"jjjjjj\",\"mother_lastname\":\"jjjjjj\",\"confirmation_day\":6,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"jjjjjj\",\"first_sponsor\":\"jjjjjj\",\"second_sponsor\":\"jjjjjj\",\"registration_book\":\"10\",\"book_page\":\"10\",\"book_number\":\"10\",\"date_issued\":\"1\\/6\\/2011\"}', 0, 1, '21-07-05 21:06:35', '2021-07-05 13:06:35', '2021-07-05 13:06:35'),
(10, 'kkkkk', 'kkkkk', 'kkkkk', 'confirmation', 0, '{\"father_firstname\":\"kkkkk\",\"father_middlename\":\"kkkkk\",\"father_lastname\":\"kkkkk\",\"mother_firstname\":\"kkkkk\",\"mother_middlename\":\"kkkkk\",\"mother_lastname\":\"kkkkk\",\"confirmation_day\":7,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"kkkkk\",\"first_sponsor\":\"kkkkk\",\"second_sponsor\":\"kkkkk\",\"registration_book\":\"11\",\"book_page\":\"11\",\"book_number\":\"11\",\"date_issued\":\"1\\/7\\/2011\"}', 0, 1, '21-07-05 21:06:37', '2021-07-05 13:06:37', '2021-07-05 13:06:37'),
(11, 'llllll', 'llllll', 'llllll', 'confirmation', 0, '{\"father_firstname\":\"llllll\",\"father_middlename\":\"llllll\",\"father_lastname\":\"llllll\",\"mother_firstname\":\"llllll\",\"mother_middlename\":\"llllll\",\"mother_lastname\":\"llllll\",\"confirmation_day\":8,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"llllll\",\"first_sponsor\":\"llllll\",\"second_sponsor\":\"llllll\",\"registration_book\":\"12\",\"book_page\":\"12\",\"book_number\":\"12\",\"date_issued\":\"1\\/8\\/2011\"}', 0, 1, '21-07-05 21:06:39', '2021-07-05 13:06:39', '2021-07-05 13:06:39'),
(12, 'mmmmmm', 'mmmmmm', 'mmmmmm', 'confirmation', 0, '{\"father_firstname\":\"mmmmmm\",\"father_middlename\":\"mmmmmm\",\"father_lastname\":\"mmmmmm\",\"mother_firstname\":\"mmmmmm\",\"mother_middlename\":\"mmmmmm\",\"mother_lastname\":\"mmmmmm\",\"confirmation_day\":9,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"mmmmmm\",\"first_sponsor\":\"mmmmmm\",\"second_sponsor\":\"mmmmmm\",\"registration_book\":\"13\",\"book_page\":\"13\",\"book_number\":\"13\",\"date_issued\":\"1\\/9\\/2011\"}', 0, 1, '21-07-05 21:06:41', '2021-07-05 13:06:41', '2021-07-05 13:06:41'),
(13, 'nnnnnn', 'nnnnnn', 'nnnnnn', 'confirmation', 0, '{\"father_firstname\":\"nnnnnn\",\"father_middlename\":\"nnnnnn\",\"father_lastname\":\"nnnnnn\",\"mother_firstname\":\"nnnnnn\",\"mother_middlename\":\"nnnnnn\",\"mother_lastname\":\"nnnnnn\",\"confirmation_day\":10,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"nnnnnn\",\"first_sponsor\":\"nnnnnn\",\"second_sponsor\":\"nnnnnn\",\"registration_book\":\"14\",\"book_page\":\"14\",\"book_number\":\"14\",\"date_issued\":\"1\\/10\\/2011\"}', 0, 1, '21-07-05 21:06:43', '2021-07-05 13:06:43', '2021-07-05 13:06:43'),
(14, 'oooooo', 'oooooo', 'oooooo', 'confirmation', 0, '{\"father_firstname\":\"oooooo\",\"father_middlename\":\"oooooo\",\"father_lastname\":\"oooooo\",\"mother_firstname\":\"oooooo\",\"mother_middlename\":\"oooooo\",\"mother_lastname\":\"oooooo\",\"confirmation_day\":11,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"oooooo\",\"first_sponsor\":\"oooooo\",\"second_sponsor\":\"oooooo\",\"registration_book\":\"15\",\"book_page\":\"15\",\"book_number\":\"15\",\"date_issued\":\"1\\/11\\/2011\"}', 0, 1, '21-07-05 21:06:45', '2021-07-05 13:06:45', '2021-07-05 13:06:45'),
(15, 'ppppp', 'ppppp', 'ppppp', 'confirmation', 0, '{\"father_firstname\":\"ppppp\",\"father_middlename\":\"ppppp\",\"father_lastname\":\"ppppp\",\"mother_firstname\":\"ppppp\",\"mother_middlename\":\"ppppp\",\"mother_lastname\":\"ppppp\",\"confirmation_day\":12,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"ppppp\",\"first_sponsor\":\"ppppp\",\"second_sponsor\":\"ppppp\",\"registration_book\":\"16\",\"book_page\":\"16\",\"book_number\":\"16\",\"date_issued\":\"1\\/12\\/2011\"}', 0, 1, '21-07-05 21:06:48', '2021-07-05 13:06:48', '2021-07-05 13:06:48'),
(16, 'qqqqq', 'qqqqq', 'qqqqq', 'confirmation', 0, '{\"father_firstname\":\"qqqqq\",\"father_middlename\":\"qqqqq\",\"father_lastname\":\"qqqqq\",\"mother_firstname\":\"qqqqq\",\"mother_middlename\":\"qqqqq\",\"mother_lastname\":\"qqqqq\",\"confirmation_day\":13,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"qqqqq\",\"first_sponsor\":\"qqqqq\",\"second_sponsor\":\"qqqqq\",\"registration_book\":\"17\",\"book_page\":\"17\",\"book_number\":\"17\",\"date_issued\":\"1\\/13\\/2011\"}', 0, 1, '21-07-05 21:06:49', '2021-07-05 13:06:49', '2021-07-05 13:06:49'),
(17, 'rrrrr', 'rrrrr', 'rrrrr', 'confirmation', 0, '{\"father_firstname\":\"rrrrr\",\"father_middlename\":\"rrrrr\",\"father_lastname\":\"rrrrr\",\"mother_firstname\":\"rrrrr\",\"mother_middlename\":\"rrrrr\",\"mother_lastname\":\"rrrrr\",\"confirmation_day\":14,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"rrrrr\",\"first_sponsor\":\"rrrrr\",\"second_sponsor\":\"rrrrr\",\"registration_book\":\"18\",\"book_page\":\"18\",\"book_number\":\"18\",\"date_issued\":\"1\\/14\\/2011\"}', 0, 1, '21-07-05 21:06:51', '2021-07-05 13:06:51', '2021-07-05 13:06:51'),
(18, 'sssss', 'sssss', 'sssss', 'confirmation', 0, '{\"father_firstname\":\"sssss\",\"father_middlename\":\"sssss\",\"father_lastname\":\"sssss\",\"mother_firstname\":\"sssss\",\"mother_middlename\":\"sssss\",\"mother_lastname\":\"sssss\",\"confirmation_day\":15,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"sssss\",\"first_sponsor\":\"sssss\",\"second_sponsor\":\"sssss\",\"registration_book\":\"19\",\"book_page\":\"19\",\"book_number\":\"19\",\"date_issued\":\"1\\/15\\/2011\"}', 0, 1, '21-07-05 21:06:53', '2021-07-05 13:06:53', '2021-07-05 13:06:53'),
(19, 'ttttt', 'ttttt', 'ttttt', 'confirmation', 0, '{\"father_firstname\":\"ttttt\",\"father_middlename\":\"ttttt\",\"father_lastname\":\"ttttt\",\"mother_firstname\":\"ttttt\",\"mother_middlename\":\"ttttt\",\"mother_lastname\":\"ttttt\",\"confirmation_day\":16,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"ttttt\",\"first_sponsor\":\"ttttt\",\"second_sponsor\":\"ttttt\",\"registration_book\":\"20\",\"book_page\":\"20\",\"book_number\":\"20\",\"date_issued\":\"1\\/16\\/2011\"}', 0, 1, '21-07-05 21:06:55', '2021-07-05 13:06:55', '2021-07-05 13:06:55'),
(20, 'uuuuuu', 'uuuuuu', 'uuuuuu', 'confirmation', 0, '{\"father_firstname\":\"uuuuuu\",\"father_middlename\":\"uuuuuu\",\"father_lastname\":\"uuuuuu\",\"mother_firstname\":\"uuuuuu\",\"mother_middlename\":\"uuuuuu\",\"mother_lastname\":\"uuuuuu\",\"confirmation_day\":17,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"uuuuuu\",\"first_sponsor\":\"uuuuuu\",\"second_sponsor\":\"uuuuuu\",\"registration_book\":\"21\",\"book_page\":\"21\",\"book_number\":\"21\",\"date_issued\":\"1\\/17\\/2011\"}', 0, 1, '21-07-05 21:06:57', '2021-07-05 13:06:57', '2021-07-05 13:06:57'),
(21, 'vvvvvvv', 'vvvvvvv', 'vvvvvvv', 'confirmation', 0, '{\"father_firstname\":\"vvvvvvv\",\"father_middlename\":\"vvvvvvv\",\"father_lastname\":\"vvvvvvv\",\"mother_firstname\":\"vvvvvvv\",\"mother_middlename\":\"vvvvvvv\",\"mother_lastname\":\"vvvvvvv\",\"confirmation_day\":18,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"vvvvvvv\",\"first_sponsor\":\"vvvvvvv\",\"second_sponsor\":\"vvvvvvv\",\"registration_book\":\"22\",\"book_page\":\"22\",\"book_number\":\"22\",\"date_issued\":\"1\\/18\\/2011\"}', 0, 1, '21-07-05 21:06:59', '2021-07-05 13:06:59', '2021-07-05 13:06:59'),
(22, 'wwwww', 'wwwww', 'wwwww', 'confirmation', 0, '{\"father_firstname\":\"wwwww\",\"father_middlename\":\"wwwww\",\"father_lastname\":\"wwwww\",\"mother_firstname\":\"wwwww\",\"mother_middlename\":\"wwwww\",\"mother_lastname\":\"wwwww\",\"confirmation_day\":19,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"wwwww\",\"first_sponsor\":\"wwwww\",\"second_sponsor\":\"wwwww\",\"registration_book\":\"23\",\"book_page\":\"23\",\"book_number\":\"23\",\"date_issued\":\"1\\/19\\/2011\"}', 0, 1, '21-07-05 21:07:01', '2021-07-05 13:07:01', '2021-07-05 13:07:01'),
(23, 'xxxxxx', 'xxxxxx', 'xxxxxx', 'confirmation', 0, '{\"father_firstname\":\"xxxxxx\",\"father_middlename\":\"xxxxxx\",\"father_lastname\":\"xxxxxx\",\"mother_firstname\":\"xxxxxx\",\"mother_middlename\":\"xxxxxx\",\"mother_lastname\":\"xxxxxx\",\"confirmation_day\":20,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"xxxxxx\",\"first_sponsor\":\"xxxxxx\",\"second_sponsor\":\"xxxxxx\",\"registration_book\":\"24\",\"book_page\":\"24\",\"book_number\":\"24\",\"date_issued\":\"1\\/20\\/2011\"}', 0, 1, '21-07-05 21:07:02', '2021-07-05 13:07:02', '2021-07-05 13:07:02'),
(24, 'yyyyy', 'yyyyy', 'yyyyy', 'confirmation', 0, '{\"father_firstname\":\"yyyyy\",\"father_middlename\":\"yyyyy\",\"father_lastname\":\"yyyyy\",\"mother_firstname\":\"yyyyy\",\"mother_middlename\":\"yyyyy\",\"mother_lastname\":\"yyyyy\",\"confirmation_day\":21,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"yyyyy\",\"first_sponsor\":\"yyyyy\",\"second_sponsor\":\"yyyyy\",\"registration_book\":\"25\",\"book_page\":\"25\",\"book_number\":\"25\",\"date_issued\":\"1\\/21\\/2011\"}', 0, 1, '21-07-05 21:07:04', '2021-07-05 13:07:04', '2021-07-05 13:07:04'),
(25, 'Carmela', 'Lawas', 'Selma', 'confirmation', 13, '{\"father_firstname\":\"zzzzz\",\"father_middlename\":\"zzzzz\",\"father_lastname\":\"zzzzz\",\"mother_firstname\":\"zzzzz\",\"mother_middlename\":\"zzzzz\",\"mother_lastname\":\"zzzzz\",\"confirmation_day\":22,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"zzzzz\",\"first_sponsor\":\"zzzzz\",\"second_sponsor\":\"zzzzz\",\"registration_book\":\"26\",\"book_page\":\"26\",\"book_number\":\"26\",\"date_issued\":\"1/22/2011\"}', 0, 1, '21-07-05 21:07:06', '2021-07-05 13:07:06', '2021-07-10 08:23:01'),
(26, 'Yasmin', 'Gondeza', 'Tapado', 'confirmation', 0, '{\"father_firstname\":\"ccddd\",\"father_middlename\":\"\",\"father_lastname\":\"ccddd\",\"mother_firstname\":\"ccddd\",\"mother_middlename\":\"ccddd\",\"mother_lastname\":\"ccddd\",\"confirmation_day\":23,\"confirmation_month\":1,\"confirmation_year\":2011,\"confirmation_by\":\"ccddd\",\"first_sponsor\":\"ccddd\",\"second_sponsor\":\"ccddd\",\"registration_book\":\"27\",\"book_page\":\"27\",\"book_number\":\"27\",\"date_issued\":\"1/23/2011\"}', 0, 1, '21-07-05 21:07:08', '2021-07-05 13:07:08', '2021-07-09 22:24:09'),
(27, 'Julcarl', 'Lawas', 'Selma', 'confirmation', 14, '{\"father_firstname\":\"Julito\",\"father_middlename\":\"Bariquit\",\"father_lastname\":\"Selma\",\"mother_firstname\":\"Carmela\",\"mother_middlename\":\"Carmela\",\"mother_lastname\":\"Carmela\",\"confirmation_day\":23,\"confirmation_month\":7,\"confirmation_year\":2021,\"confirmation_by\":\"Siya ako ikaw\",\"first_sponsor\":\"aaa\",\"second_sponsor\":\"aa\",\"registration_book\":\"12\",\"book_page\":\"43\",\"book_number\":\"21\",\"date_issued\":\"7/31/2021\"}', 0, 1, '21-07-05 21:09:24', '2021-07-05 13:09:24', '2021-07-06 22:11:44'),
(28, 'addd', 'addd', 'addd', 'marriage', 19, '{\"husband_firstname\":\"addd\",\"husband_middlename\":\"addd\",\"husband_lastname\":\"addd\",\"husband_age\":33,\"husband_civil_status\":\"Single\",\"husband_birthdate\":\"12\\/19\\/1987\",\"husband_birthplace\":\"addd\",\"husband_residence\":\"addd\",\"husband_baptismdate\":\"12\\/19\\/1987\",\"husband_fathersname\":\"addd\",\"husband_mothersname\":\"addd\",\"husband_firstwitness\":\"addd\",\"husband_secondwitness\":\"addd\",\"wife_firstname\":\"addd\",\"wife_middlename\":\"addd\",\"wife_lastname\":\"addd\",\"wife_age\":33,\"wife_civil_status\":\"Single\",\"wife_birthdate\":\"12\\/19\\/1987\",\"wife_birthplace\":\"addd\",\"wife_residence\":\"addd\",\"wife_baptismdate\":\"12\\/19\\/1987\",\"wife_fathersname\":\"addd\",\"wife_mothersname\":\"addd\",\"wife_firstwitness\":\"addd\",\"wife_secondwitness\":\"addd\",\"marriage_place\":\"addd\",\"marriage_date\":\"12\\/19\\/1987\",\"solemnized_by\":\"addd\",\"marriage_number\":\"12\",\"marriage_page\":\"12\",\"marriage_line\":\"12\",\"marriage_day\":19,\"marriage_month\":12,\"marriage_year\":1987}', 0, 1, '21-07-05 21:11:11', '2021-07-05 13:11:11', '2021-07-10 08:31:23'),
(29, 'grab', 'grab', 'grab', 'marriage', 14, '{\"husband_firstname\":\"grab\",\"husband_middlename\":\"grab\",\"husband_lastname\":\"grab\",\"husband_age\":33,\"husband_civil_status\":\"Single\",\"husband_birthdate\":\"12\\/19\\/1987\",\"husband_birthplace\":\"grab\",\"husband_residence\":\"grab\",\"husband_baptismdate\":\"12\\/19\\/1987\",\"husband_fathersname\":\"grab\",\"husband_mothersname\":\"grab\",\"husband_firstwitness\":\"grab\",\"husband_secondwitness\":\"grab\",\"wife_firstname\":\"dadd\",\"wife_middlename\":\"dadd\",\"wife_lastname\":\"dadd\",\"wife_age\":33,\"wife_civil_status\":\"Single\",\"wife_birthdate\":\"12\\/19\\/1987\",\"wife_birthplace\":\"grab\",\"wife_residence\":\"grab\",\"wife_baptismdate\":\"12\\/19\\/1987\",\"wife_fathersname\":\"grab\",\"wife_mothersname\":\"grab\",\"wife_firstwitness\":\"grab\",\"wife_secondwitness\":\"grab\",\"marriage_place\":\"grab\",\"marriage_date\":\"12\\/19\\/1987\",\"solemnized_by\":\"grab\",\"marriage_number\":\"1\",\"marriage_page\":\"1\",\"marriage_line\":\"1\",\"marriage_day\":19,\"marriage_month\":12,\"marriage_year\":1987}', 0, 1, '21-07-05 21:11:13', '2021-07-05 13:11:13', '2021-07-10 08:30:19'),
(30, 'aaaaa', 'aaaaa', 'aaaaa', 'baptism', 13, '{\"born_on\":\"11/28/2010\",\"born_in\":\"aaaaa\",\"father_firstname\":\"aaaaa\",\"father_middlename\":\"aaaaa\",\"father_lastname\":\"aaaaa\",\"mother_firstname\":\"aaaaa\",\"mother_middlename\":\"aaaaa\",\"mother_lastname\":\"aaaaa\",\"resident_of\":\"aaaaa\",\"baptism_date\":\"11/28/2010\",\"baptism_minister\":\"aaaaa\",\"godparents\":\"\\\"aaaaa\",\"baptismal_register\":\" aaaaa\\\"\",\"volume\":\"1\",\"page\":\"1\",\"date_issued\":\"7/11/2021\"}', 0, 1, '21-07-05 21:11:53', '2021-07-05 13:11:53', '2021-07-10 08:29:24'),
(31, 'bbdbdbd', 'bbdbdbd', 'bbdbdbd', 'baptism', 13, '{\"born_on\":\"11\\/28\\/2010\",\"born_in\":\"bbdbdbd\",\"father_firstname\":\"bbdbdbd\",\"father_middlename\":\"bbdbdbd\",\"father_lastname\":\"bbdbdbd\",\"mother_firstname\":\"bbdbdbd\",\"mother_middlename\":\"bbdbdbd\",\"mother_lastname\":\"bbdbdbd\",\"resident_of\":\"bbdbdbd\",\"baptism_date\":\"11\\/28\\/2010\",\"baptism_minister\":\"bbdbdbd\",\"baptismal_register\":\"2\",\"godparents\":\"bbdbdbd\",\"volume\":\"2\",\"page\":\"2\",\"date_issued\":\"11\\/28\\/2010\"}', 0, 1, '21-07-05 21:11:55', '2021-07-05 13:11:55', '2021-07-10 08:29:46'),
(32, 'fname', 'mname', 'lname', 'baptism', 0, '{\"born_on\":\"11\\/28\\/2010\",\"born_in\":\"bin\",\"father_firstname\":\"ffname\",\"father_middlename\":\"mmname\",\"father_lastname\":\"flname\",\"mother_firstname\":\"mfname\",\"mother_middlename\":\"mmname\",\"mother_lastname\":\"mlname\",\"resident_of\":\"Address\",\"baptism_date\":\"11\\/28\\/2010\",\"baptism_minister\":\"min\",\"baptismal_register\":\"1\",\"godparents\":\"Godparents\",\"volume\":\"2\",\"page\":\"2\",\"date_issued\":\"11\\/28\\/2010\"}', 1, 1, '21-07-05 21:11:57', '2021-07-05 13:11:57', '2021-07-06 22:18:08'),
(33, 'addd', 'addd', 'addd', 'death', 0, '{\"deceased_name\":\"addd addd addd\",\"age\":\"12\",\"residence\":\"addd\",\"date_of_death\":\"2\\/21\\/2020\",\"place_of_burial\":\"addd\",\"date_of_burial\":\"2\\/21\\/2020\",\"informant_or_relatives\":\"2\\/21\\/2020\",\"book_number\":\"addd\",\"page_number\":\"12\",\"registry_number\":\"12\",\"date_issued\":\"12\\/1\\/2001\"}', 0, 0, '21-07-05 21:12:26', '2021-07-05 13:12:26', '2021-07-05 13:12:26'),
(34, 'bdddd', 'bdddd', 'bdddd', 'death', 0, '{\"deceased_name\":\"bdddd bdddd bdddd\",\"age\":\"52\",\"residence\":\"bdddd\",\"date_of_death\":\"2\\/21\\/2020\",\"place_of_burial\":\"bdddd\",\"date_of_burial\":\"2\\/21\\/2020\",\"informant_or_relatives\":\"2\\/21\\/2020\",\"book_number\":\"bdddd\",\"page_number\":\"52\",\"registry_number\":\"52\",\"date_issued\":\"1\\/1\\/1952\"}', 0, 0, '21-07-05 21:12:28', '2021-07-05 13:12:28', '2021-07-05 13:12:28'),
(35, 'cdddd', 'cdddd', 'cdddd', 'death', 0, '{\"deceased_name\":\"cdddd cdddd cdddd\",\"age\":\"63\",\"residence\":\"cdddd\",\"date_of_death\":\"2\\/21\\/2020\",\"place_of_burial\":\"cdddd\",\"date_of_burial\":\"2\\/21\\/2020\",\"informant_or_relatives\":\"2\\/21\\/2020\",\"book_number\":\"cdddd\",\"page_number\":\"63\",\"registry_number\":\"63\",\"date_issued\":\"1\\/1\\/1963\"}', 0, 0, '21-07-05 21:12:30', '2021-07-05 13:12:30', '2021-07-05 13:12:30'),
(36, 'dddd', 'dddd', 'dddd', 'death', 14, '{\"deceased_name\":\"dddd dddd dddd\",\"age\":\"78\",\"residence\":\"dddd\",\"date_of_death\":\"2\\/21\\/2020\",\"place_of_burial\":\"dddd\",\"date_of_burial\":\"2\\/21\\/2020\",\"informant_or_relatives\":\"2\\/21\\/2020\",\"book_number\":\"dddd\",\"page_number\":\"78\",\"registry_number\":\"78\",\"date_issued\":\"1\\/1\\/1978\"}', 0, 0, '21-07-05 21:12:31', '2021-07-05 13:12:31', '2021-07-05 20:48:31'),
(37, 'Julcarlsss', 'Lawas', 'Selma', 'baptism', 13, '{\"born_on\":\"7/13/2006\",\"born_in\":\"Minglanilla\",\"father_firstname\":\"Julito\",\"father_middlename\":\"Bariquit\",\"father_lastname\":\"Selma\",\"mother_firstname\":\"Carmela\",\"mother_middlename\":\"Lawas\",\"mother_lastname\":\"Selma\",\"resident_of\":\"Minglanilla\",\"baptism_date\":\"7/24/2009\",\"baptism_minister\":\"Rev. Fr. Hernani Bercede\",\"godparents\":\"Sample, Sample 2,\",\"baptismal_register\":\"12\",\"volume\":\"43\",\"page\":\"12\",\"date_issued\":\"7/31/2021\"}', 0, 1, '21-07-07 14:17:44', '2021-07-07 06:17:44', '2021-07-09 22:42:47'),
(38, 'Jhomark', 'Lawas', 'Selma', 'baptism', 0, '{\"born_on\":\"10/2/1993\",\"born_in\":\"Minglanilla\",\"father_firstname\":\"Julito\",\"father_middlename\":\"Lawas\",\"father_lastname\":\"Selma\",\"mother_firstname\":\"Carmela\",\"mother_middlename\":\"Lawas\",\"mother_lastname\":\"Selma\",\"resident_of\":\"Minglanilla\",\"baptism_date\":\"10/2/1993\",\"baptism_minister\":\"Rev. Fr. Hernani Bercede\",\"godparents\":\"\\\"Selma\",\"baptismal_register\":\" Selma 2\",\"volume\":\" Selma 3\",\"page\":\"\\\"\",\"date_issued\":\"11/1/2001\"}', 0, 1, '21-07-07 14:21:13', '2021-07-07 06:21:13', '2021-07-09 22:35:07'),
(39, 'Jhomark', 'Lawas', 'Selma', 'confirmation', 18, '{\"father_firstname\":\"Julito\",\"father_middlename\":\"Bariquit\",\"father_lastname\":\"Selma\",\"mother_firstname\":\"Carmela\",\"mother_middlename\":\"Lawas\",\"mother_lastname\":\"Selma\",\"confirmation_day\":7,\"confirmation_month\":7,\"confirmation_year\":2021,\"confirmation_by\":\"Rev. Fr. Hernani Bercede\",\"first_sponsor\":\"Julcarl Selma\",\"second_sponsor\":\"Yasmin Tapado\",\"registration_book\":\"123\",\"book_page\":\"23\",\"book_number\":\"54\",\"date_issued\":\"7\\/8\\/2021\"}', 0, 1, '21-07-08 11:49:28', '2021-07-08 03:49:28', '2021-07-08 03:49:28'),
(40, 'Calvin', 'Klein', 'Sting', 'confirmation', 19, '{\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"mother_firstname\":\"test\",\"mother_middlename\":\"test\",\"mother_lastname\":\"test\",\"confirmation_day\":12,\"confirmation_month\":11,\"confirmation_year\":2021,\"confirmation_by\":\"test\",\"first_sponsor\":\"test\",\"second_sponsor\":\"test\",\"registration_book\":\"2\",\"book_page\":\"2\",\"book_number\":\"2\",\"date_issued\":\"11/12/2021\"}', 0, 1, '21-07-08 11:52:24', '2021-07-08 03:52:24', '2021-07-10 00:07:57'),
(41, 'Franchezkha Andrei', 'Obradas', 'Selma', 'baptism', 0, '{\"born_on\":\"7/8/2004\",\"born_in\":\"Minglanilla\",\"father_firstname\":\"Jhomark Jame\",\"father_middlename\":\"Lawas\",\"father_lastname\":\"Selma\",\"mother_firstname\":\"Joy\",\"mother_middlename\":\"Dinlaoso\",\"mother_lastname\":\"Obradas\",\"resident_of\":\"Minglanilla\",\"baptism_date\":\"7/31/2021\",\"baptism_minister\":\"Rev. Fr. Selma\",\"godparents\":\"Siya, ikaw, ako\",\"baptismal_register\":\"123\",\"volume\":\"32\",\"page\":\"121\",\"date_issued\":\"7/9/2021\"}', 0, 1, '21-07-08 22:12:48', '2021-07-08 14:12:48', '2021-07-09 22:39:37'),
(42, 'Doggy', 'Kitty', 'Catty', 'death', 13, '{\"deceased_name\":\"Doggy Kitty Catty\",\"age\":\"12\",\"residence\":\"Minglanilla\",\"date_of_death\":\"7\\/8\\/2021\",\"place_of_burial\":\"Minglanilla\",\"date_of_burial\":\"7\\/31\\/2021\",\"informant_or_relatives\":\"Siya\",\"book_number\":\"12\",\"page_number\":\"4\",\"registry_number\":\"12\",\"date_issued\":\"7\\/31\\/2021\"}', 0, 1, '21-07-08 22:13:39', '2021-07-08 14:13:39', '2021-07-10 08:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 0, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 0, 1, 1, 1, 1, '{}', 6),
(23, 1, 'is_active', 'checkbox', 'Is Active', 1, 1, 1, 1, 1, 1, '{}', 8);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2021-05-18 07:47:47', '2021-07-05 06:18:34'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-05-18 07:47:48', '2021-05-18 07:47:48'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-05-18 07:47:48', '2021-05-18 07:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-05-18 07:47:49', '2021-06-28 06:14:20'),
(2, 'super_admin', '2021-05-23 01:10:19', '2021-06-28 06:14:12'),
(3, 'staff', '2021-05-23 01:36:37', '2021-05-23 01:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-05-18 07:47:49', '2021-05-18 07:47:49', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 6, '2021-05-18 07:47:49', '2021-05-23 01:25:33', 'voyager.media.index', NULL),
(3, 1, 'Manage Users', '', '_self', 'voyager-person', '#000000', NULL, 5, '2021-05-18 07:47:50', '2021-05-23 01:31:03', 'voyager.users.index', 'null'),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 5, 4, '2021-05-18 07:47:51', '2021-05-23 01:25:39', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 7, '2021-05-18 07:47:51', '2021-05-23 01:25:33', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2021-05-18 07:47:51', '2021-05-23 01:23:47', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2021-05-18 07:47:52', '2021-05-23 01:23:47', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-05-18 07:47:52', '2021-05-23 01:23:47', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-05-18 07:47:53', '2021-05-23 01:23:47', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 8, '2021-05-18 07:47:53', '2021-05-23 01:25:33', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2021-05-18 07:47:58', '2021-05-23 01:23:47', 'voyager.hooks', NULL),
(12, 1, 'Manage Records', '/certificate', '_self', 'voyager-file-text', '#000000', NULL, 2, '2021-05-23 01:23:24', '2021-05-23 01:24:29', NULL, ''),
(13, 1, 'Manage Priests', '/priest', '_self', 'voyager-person', '#000000', NULL, 3, '2021-05-23 01:25:22', '2021-05-23 01:25:39', NULL, ''),
(14, 2, 'Manage Records', '/certificate', '_self', 'voyager-file-text', '#000000', NULL, 3, '2021-05-23 01:26:26', '2021-05-23 01:30:33', NULL, ''),
(15, 2, 'Manage Priests', '/priest', '_self', 'voyager-people', '#000000', NULL, 4, '2021-05-23 01:27:51', '2021-05-23 01:30:33', NULL, ''),
(16, 2, 'Manage Users', '', '_self', 'voyager-person', '#000000', NULL, 2, '2021-05-23 01:28:59', '2021-05-23 01:31:26', 'voyager.users.index', 'null'),
(17, 2, 'Dashboard', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2021-05-23 01:30:27', '2021-05-23 01:30:33', 'voyager.dashboard', 'null'),
(19, 3, 'Dashboard', '', '_self', NULL, '#000000', NULL, 10, '2021-05-23 01:37:22', '2021-05-23 01:38:03', 'voyager.dashboard', 'null'),
(20, 3, 'Manage Records', '/certificate', '_self', 'voyager-file-text', '#000000', NULL, 11, '2021-05-23 01:37:47', '2021-05-23 01:37:47', NULL, ''),
(21, 3, 'Manage Priests', '/priest', '_self', 'voyager-people', '#000000', NULL, 12, '2021-05-23 01:38:20', '2021-05-23 01:38:20', NULL, ''),
(22, 2, 'Settings', '', '_self', 'voyager-settings', '#000000', NULL, 13, '2021-05-23 01:46:11', '2021-05-23 01:46:29', 'voyager.settings.index', 'null'),
(24, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2021-07-03 22:25:43', '2021-07-03 22:25:43', 'voyager.users.index', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2021_05_15_041657_create_priests_table', 1),
(25, '2021_05_15_041759_create_access_tokens_table', 1),
(26, '2021_05_15_041822_create_certificates_table', 1),
(27, '2021_05_15_041836_create_templates_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(2, 'browse_bread', NULL, '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(3, 'browse_database', NULL, '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(4, 'browse_media', NULL, '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(5, 'browse_compass', NULL, '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(6, 'browse_menus', 'menus', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(7, 'read_menus', 'menus', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(8, 'edit_menus', 'menus', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(9, 'add_menus', 'menus', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(10, 'delete_menus', 'menus', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(11, 'browse_roles', 'roles', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(12, 'read_roles', 'roles', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(13, 'edit_roles', 'roles', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(14, 'add_roles', 'roles', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(15, 'delete_roles', 'roles', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(16, 'browse_users', 'users', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(17, 'read_users', 'users', '2021-05-18 07:47:54', '2021-05-18 07:47:54'),
(18, 'edit_users', 'users', '2021-05-18 07:47:54', '2021-05-18 07:47:54'),
(19, 'add_users', 'users', '2021-05-18 07:47:54', '2021-05-18 07:47:54'),
(20, 'delete_users', 'users', '2021-05-18 07:47:54', '2021-05-18 07:47:54'),
(21, 'browse_settings', 'settings', '2021-05-18 07:47:54', '2021-05-18 07:47:54'),
(22, 'read_settings', 'settings', '2021-05-18 07:47:54', '2021-05-18 07:47:54'),
(23, 'edit_settings', 'settings', '2021-05-18 07:47:54', '2021-05-18 07:47:54'),
(24, 'add_settings', 'settings', '2021-05-18 07:47:55', '2021-05-18 07:47:55'),
(25, 'delete_settings', 'settings', '2021-05-18 07:47:55', '2021-05-18 07:47:55'),
(26, 'browse_hooks', NULL, '2021-05-18 07:47:58', '2021-05-18 07:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 1),
(26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `priests`
--

CREATE TABLE `priests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priests`
--

INSERT INTO `priests` (`id`, `firstname`, `middlename`, `lastname`, `prefix`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Julcarl', 'Lawas', 'Selma', 'Reverend', 0, '2021-05-25 14:10:59', '2021-05-25 14:10:59'),
(2, 'Yasmin', 'Lawas', 'Tapado', 'Reverend', 0, '2021-05-25 14:33:07', '2021-05-25 14:33:07'),
(3, 'Jhomark Jame', 'Lawas', 'Selma', 'Reverend', 1, '2021-05-25 14:34:00', '2021-05-25 07:02:46'),
(4, 'Daniel', 'S.', 'Catindoy', 'Archbishop', 1, '2021-05-30 05:00:59', '2021-06-02 05:36:32'),
(5, 'Daniel', 'S.', 'Catindoy', 'Deacon', 1, '2021-05-30 05:01:02', '2021-06-02 05:59:47'),
(6, 'Dionarene', 'S.', 'Pabalan', 'Reverend', 1, '2021-05-30 05:02:46', '2021-06-02 06:04:04'),
(7, 'Julito', 'Bariquit', 'Selma', 'Reverend', 1, '2021-05-30 05:05:17', '2021-06-02 05:38:42'),
(8, 'Arjay', 'Rosalino', 'Suson', 'Sakristan', 1, '2021-05-30 05:15:33', '2021-06-02 05:38:11'),
(9, 'Efrens', 'Bata', 'Reyes', 'Reverend', 0, '2021-06-02 14:04:38', '2021-06-02 06:06:39'),
(10, 'Dionarene', 'D.', 'Pabalan', 'Deacon', 0, '2021-06-06 13:17:04', '2021-06-06 13:17:04'),
(11, 'test', 'test', 'test', 'test', 1, '2021-06-14 13:19:40', '2021-07-10 08:44:36'),
(12, 'test2', 'test2', 'test2', 'Rev. Dea', 0, '2021-06-14 13:23:05', '2021-07-10 08:32:26'),
(13, 'Esteban', NULL, 'Binghay', 'Rev. Msgr.', 0, '2021-06-17 03:40:45', '2021-07-10 08:06:53'),
(14, 'Joey', 'N.', 'Belcena', 'Rev. Fr.', 0, '2021-06-17 03:40:52', '2021-07-10 07:56:16'),
(15, 'iii', 'iii', 'iii', 'iii', 1, '2021-06-17 03:41:00', '2021-07-03 23:08:45'),
(16, 'jjjj', 'jjjj', 'jjjj', 'jjjj', 1, '2021-06-17 03:41:09', '2021-07-03 23:09:05'),
(17, 'Saonzzzz', 'Julcarl', 'Gwapo', 'Rev. Fr.', 1, '2021-06-17 03:41:16', '2021-07-06 22:24:45'),
(18, 'Jose', 'Porsyente', 'Inocente', 'Rev. Fr.', 0, '2021-07-04 07:08:07', '2021-07-10 07:55:06'),
(19, 'Hernani', 'M', 'Bercede', 'Rev. Msgr.', 0, '2021-07-07 06:24:27', '2021-07-07 06:24:27'),
(20, 'Ladislao', 'M', 'Tangente', 'Rev. Fr.', 0, '2021-07-10 15:56:22', '2021-07-10 08:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-05-18 07:47:53', '2021-05-18 07:47:53'),
(2, 'staff', 'Staff', '2021-05-18 07:47:53', '2021-05-18 07:49:35'),
(3, 'super_admin', 'Super Admin', '2021-05-18 07:49:51', '2021-05-18 07:49:51'),
(4, 'user', 'Normal User', '2021-07-03 22:25:44', '2021-07-03 22:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'IHMP - SOR', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\May2021\\MCrpEVCjU0FiKuY60jtg.jpg', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\May2021\\9DmRvUufcJMtjhCD0n5j.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'IHMP', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'IHMP Back Pannel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_template` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `template_type`, `content`, `is_template`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'death', '<html>\n    <head>\n        <title>Death Certificate</title>\n    </head>\n    <body>\n        <h1 style=\"visibility: hidden; margin-top:12pt; margin-bottom:3pt; text-align:center; page-break-after:avoid; font-size:16pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">Archdiocesan Shrine of</span><span style=\"font-family:Cambria; color:#ffffff;\">&nbsp;&nbsp;</span><span style=\"font-family:Cambria; color:#ffffff;\">the Immaculate Heart of Mary</span></h1>\n        <p style=\"visibility: hidden; margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">Minglanilla, Cebu 6046</span></p>\n        <p style=\"visibility: hidden; margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">FB: www.facebook.com/ASIHM1857260-3462</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Georgia; color:#ffffff;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:24pt;\"><span style=\"font-family:Algerian;\">CERTIFICATE OF DEATH</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:24pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;\"><span style=\"font-family:Calibri;\">This is to certify that the following data appears in the Registry of Death at the</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Archdiocesan Shrine of the Immaculate Heart of Mary Parish;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Name of Deceased</span><span style=\"width:15.17pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">:</span><span style=\"font-family:Calibri;\">&nbsp;</span><span style=\"font-family:Calibri;\">fullname_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Age</span><span style=\"width:16.19pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: age_system</span><span style=\"width:7.07pt; display:inline-block;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Residence</span><span style=\"width:19.73pt; display:inline-block;\">&nbsp;</span><span style=\"width:37.5pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: residence_of_system</p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date of Death</span><span style=\"width:1.32pt; display:inline-block;\">&nbsp;</span><span style=\"width:37.5pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: date_of_death_system</p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Place of Burial</span><span style=\"width:1.32pt; display:inline-block;\">&nbsp;</span><span style=\"width:33.5pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: place_of_burial_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date of Burial</span><span style=\"width:2.48pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: date_of_burial_system</p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Informant/Relatives</span><span style=\"width:2.48pt; display:inline-block;\">&nbsp;</span><span style=\"width:9pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: informant_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Book Number</span><span style=\"width:2.48pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: book_number_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Page Number</span><span style=\"width:5.62pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: page_number_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Registry Number</span><span style=\"width:5.62pt; display:inline-block;\">&nbsp;</span><span style=\"width:18pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: registry_number_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date Issued</span><span style=\"width:13.93pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: date_issued_system</span></p>\n    </body>\n</html>', 0, 0, '2021-06-26 06:53:16', '2021-07-03 06:02:27'),
(2, 'birth', '<html>\r\n    <body style=\"margin-top: 108.48px; margin-bottom: 48px; margin-left: 96px; margin-right: 96px;\">\r\n        <p style=\"margin-top:0pt; margin-bottom:-2pt; text-align:center; line-height:57%; font-size:5pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:20pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Archdiocesan Shrine of the Immaculate Heart of Mary</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:16.5pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Minglanilla, Cebu 6046</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:16.5pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Tel. No. 260-3462</span><span style=\"font-family:\'Old English Text MT\'; font-size:15pt; color:#black;\"></span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:90%; font-size:37pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Certificate of Baptism</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:5pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">This is to certify that:</span></p>\r\n        <p style=\"margin-top:-2pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:18pt;\"><strong><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fullname</span></strong><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:1pt; visibility: hidden;\"><span style=\"font-family:\'Times New Roman\'; color:#black;\">_______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:8pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Born on</span><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span><span style=\"font-family:Calibri;\">born_on_date</span><span style=\"width:146.51pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">in&nbsp;</span><span style=\"font-family:\'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;born_in_date</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#black; visibility: hidden;\">Child of</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#ff0000;\">&nbsp;</span><strong><span style=\"font-family:Calibri;\">fathers_name</span></strong><span style=\"width:142.82pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#black; visibility: hidden;\">and&nbsp;</span><strong><span style=\"font-family:Calibri;\">mothers_name</span></strong></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:5pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Residents of</span><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">residents_of</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:3pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:12pt; visibility: hidden;\"><span style=\"font-family:\'Times New Roman\'; color:#black;\">in God&rsquo;s good time received the</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:26pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Sacrament of Baptism</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:5pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:26pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri; font-size:12pt;\">date_of_baptism</span><span style=\"font-family:Calibri; font-size:12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong><span style=\"font-family:Calibri; font-size:14pt;\">minister_of</span></strong></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:200%; font-size:1pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">__________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</span><span style=\"font-family:\'Times New Roman\'; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; color:#black; visibility:hidden;\">____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:200%; font-size:12pt;\"><em><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></em><em><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Date of Baptism</span></em><em><span style=\"font-family:\'Times New Roman\'; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></em><em><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Minister of Baptism</span></em></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:2pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Godparents:</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:black;\">godparents_list</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; font-size:9pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:10pt; font-size:9pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:16pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Baptismal Register:</span><span style=\"font-family:\'Times New Roman\'; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\';\">baptismal_register</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:14pt;\"><span style=\"font-family:\'Times New Roman\'; font-size:10.5pt; color:#black; visibility: hidden;\">Volume</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#ff0000;\">&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">volume_number</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Page</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">page_number</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"width:12.29pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#ff0000;\">&nbsp;</span><strong><span style=\"font-family:Calibri;\">parish_priest</span></strong></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;\"><span style=\"height:0pt; display:block; position:absolute; z-index:1;\"></span><span style=\"height:0pt; display:block; position:absolute; z-index:0;\"></span><span style=\"height:0pt; display:block; position:absolute; z-index:3;\"></span><span style=\"height:0pt; display:block; position:absolute; z-index:2;\"></span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Date Issue</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black;\">&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">date_issued&nbsp;</span><span style=\"font-family:\'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"width:114.72pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Parish Priest</span></p>\r\n    </body>\r\n</html>', 0, 0, '2021-06-26 06:54:38', '2021-07-04 00:54:09'),
(3, 'confirmation', '<html>\n    <head>\n        <title>Confirmation Certificate</title>\n        <link href=\"sourceLink\" rel=\"stylesheet\">\n        <style>\n            div{\n                padding: 0px !important;\n            }\n            p{\n                margin-bottom: 0px !important;\n                margin-top: 0px !important;\n            }\n            body{\n                margin: 48px;\n            }\n            .border_color{\n                border-bottom: 1px solid white;\n            }\n            .white-text{\n                visibility: hidden;\n            }\n            .itemsAlignment{\n                transform: translateY(35px);\n            }\n            .parentsAlignment{\n                transform: translateY(35px) translateX(-50px);\n            }\n            .itemsAlignment2{\n                transform: translateY(16px);\n            }\n            .dayAligment{\n                transform: translateY(18px) translateX(45px);\n            }\n            .wholeAligment{\n                transform: translateY(18px) translateX(-80px);\n            }\n            .itemsAlignment4{\n                transform: translateY(10px);\n            }\n            .itemsAlignment3{\n                transform: translateY(-22px) translateX(50px);\n            }\n            .alignLeft1{\n                transform: translateX(10px);\n            }\n        </style>\n    </head>\n    <body style=\"margin: 48px;\">\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s12 center\">\n                <h6 class=\"white-text\">IMMACULATE HEART OF MARY PARISH</h6>\n                <p class=\"white-text\">\n                    Minglanilla, Cebu Philippines\n                    <br>\n                    Tel. Nos. 490-9635, 272-5807\n                </p>\n            </div>\n            <div class=\"col s12 center\">\n                <h6 class=\"white-text\" style=\"margin-bottom: 0\">Confirmation Certificate</h6>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 white-text\">\n                <p>This is to certify that</p>\n            </div>\n            <div class=\"col s9 center border_color itemsAlignment\">\n                <p style=\"margin-bottom:0px;\">fullname</p>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 white-text\">\n                <p>son/daughter of</p>\n            </div>\n            <div class=\"col s4 center border_color parentsAlignment\">\n                <p style=\"margin-bottom:0px;\">fathers_name</p>\n            </div>\n            <div class=\"col s1 center white-text\">\n                <p>and</p>\n            </div>\n            <div class=\"col s4 center border_color parentsAlignment\">\n                <p style=\"margin-bottom:0px;\">mothers_name</p>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s12 white-text\">\n                <p>\n                    was <b style=\"font-family: \'Times New Roman\', Times, serif; font-size: 20px;\">confirmed according to the rite of the Roman Catholic Church</b> on the\n                </p>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s2 center border_color dayAligment\"><p style=\"margin-bottom:0px;\">number_day</p></div>\n            <div class=\"col s1 white-text\"><p>day of</p></div>\n            <div class=\"col s4 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">month_text</p></div>\n            <div class=\"col s1 white-text\"><p>, 20</p></div>\n            <div class=\"col s1 center border_color wholeAligment\"><p style=\"margin-bottom:0px;\">year</p></div>\n            <div class=\"col s1 white-text\"><p>by</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">&nbsp;</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s12 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">priest_name</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s1\"></div>\n            <div class=\"col s3 white-text\"><p>The Sponsors being</p></div>\n            <div class=\"col s7 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">first_sponsor</p></div>\n            <div class=\"col s1 white-text\"><p>and</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s7 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">second_sponsor</p></div>\n            <div class=\"col s5 white-text\"><p>as appears from the Confirmation</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 white-text\"><p>Register Book</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">register_book</p></div>\n            <div class=\"col s1 white-text\"><p>Page</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">page_number</p></div>\n            <div class=\"col s1 white-text\"><p>No.</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">cert_no</p></div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s12 white-text\">\n                <p>of this church.</p>\n            </div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s12\"></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 center border_color itemsAlignment3\">date_issue</div>\n            <div class=\"col s9\"></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 center white-text\">Date Issue</div>\n            <div class=\"col s6\"></div>\n            <div class=\"col s3 center white-text\">Parish Priest</div>\n        </div>\n    </body>\n</html>', 1, 0, '2021-07-03 06:54:53', '2021-07-04 02:32:26'),
(4, 'marriage', '<html>\r\n    <head>\r\n        <title>Marriage Certificate</title>\r\n        <!-- <link href=\"http://192.168.1.10/ihmp/css/materialize.css\" rel=\"stylesheet\"> -->\r\n        <link href=\"sourceLink\" rel=\"stylesheet\">\r\n        <style>\r\n            p{\r\n                margin-bottom: 0px !important;\r\n                margin-top: 0px !important;\r\n            }\r\n            body{\r\n                margin-top: 85px;\r\n                margin-bottom: 48px;\r\n                margin-left: 48px;\r\n                margin-right: 48px;\r\n            }\r\n            .border_color{\r\n                border-bottom: 1px solid white;\r\n            }\r\n            .white-text{\r\n                visibility: hidden;\r\n            }\r\n            .mb-10{\r\n                margin-bottom: 10px !important;\r\n            }\r\n            .remove_margin{\r\n                margin-bottom: 0px !important;\r\n            }\r\n            .remove_margin_top{\r\n                margin-top: 0px !important;\r\n            }\r\n            .colHeight{\r\n                height: 12px !important;\r\n            }\r\n            .addfive{\r\n                margin-top: 7px;\r\n            }\r\n        </style>\r\n    </head>\r\n    <body>\r\n        <div class=\"row\">\r\n            <h1>&nbsp;</h1>\r\n            <h1>&nbsp;</h1>\r\n        </div>\r\n        <div class=\"row\">\r\n            <div class=\"col s4\">\r\n                <div class=\"col s12 white-text\">Name:</div>\r\n                <div class=\"col s12 white-text\">Age:</div>\r\n                <div class=\"col s12 white-text\">Civil Status:</div>\r\n                <div class=\"col s12 white-text\">Date of Birth:</div>\r\n                <div class=\"col s12 white-text\">Residence:</div>\r\n                <div class=\"col s12 white-text\">&nbsp;</div>\r\n                <div class=\"col s12 white-text\">Date of Baptism:</div>\r\n                <div class=\"col s12 white-text\">Father\'s Name:</div>\r\n                <div class=\"col s12 white-text\">Mother\'s Name:</div>\r\n                <div class=\"col s12 white-text\">Witness:</div>\r\n                <div class=\"col s12 white-text\">&nbsp;</div>\r\n            </div>\r\n            <div class=\"col s4\">\r\n                <div class=\"col s12 border_color \">husbands_name</div>\r\n                <div class=\"col s12 border_color \">husbands_age</div>\r\n                <div class=\"col s12 border_color \">husbands_civil_status</div>\r\n                <div class=\"col s12 border_color \">husbands_date_of_birth</div>\r\n                <div class=\"col s12 border_color \">husbands_place_of_birth</div>\r\n                <div class=\"col s12 border_color \">husbands_residence</div>\r\n                <div class=\"col s12 border_color colHeight\">&nbsp;</div>\r\n                <div class=\"col s12 border_color \">husbands_date_of_baptism</div>\r\n                <div class=\"col s12 border_color \">husbands_fathers_name</div>\r\n                <div class=\"col s12 border_color \">husbands_mothers_name</div>\r\n                <div class=\"col s12 border_color \">husbands_first_witness</div>\r\n                <div class=\"col s12 border_color \">husbands_second_witness</div>\r\n            </div>\r\n            <div class=\"col s4\">\r\n                <div class=\"col s12 border_color \">wifes_name</div>\r\n                <div class=\"col s12 border_color \">wifes_age</div>\r\n                <div class=\"col s12 border_color \">wifes_civil_status</div>\r\n                <div class=\"col s12 border_color \">wifes_date_of_birth</div>\r\n                <div class=\"col s12 border_color \">wifes_place_of_birth</div>\r\n                <div class=\"col s12 border_color \">wifes_residence</div>\r\n                <div class=\"col s12 border_color colHeight\">&nbsp;</div>\r\n                <div class=\"col s12 border_color \">wifes_date_of_baptism</div>\r\n                <div class=\"col s12 border_color \">wifes_fathers_name</div>\r\n                <div class=\"col s12 border_color \">wifes_mothers_name</div>\r\n                <div class=\"col s12 border_color \">wifes_first_witness</div>\r\n                <div class=\"col s12 border_color \">wifes_second_witness</div>\r\n            </div>\r\n        </div>\r\n        <br>\r\n        <div class=\"row remove_margin addfive\">\r\n            <div class=\"col s3 white-text\">Place of Marriage:</div>\r\n            <div class=\"col s4 border_color \">place_of_marriage</div>\r\n        </div>\r\n        <div class=\"row remove_margin_top remove_margin\">\r\n            <div class=\"col s3 white-text\">Date of Marriage:</div>\r\n            <div class=\"col s4 border_color \">date_of_marriage</div>\r\n        </div>\r\n        <div class=\"row remove_margin_top\">\r\n            <div class=\"col s3 white-text\"><b>Solemnized by:</b></div>\r\n            <div class=\"col s4 border_color \">solemnized_by</div>\r\n        </div>\r\n        <br>\r\n        <div class=\"row remove_margin_top remove_margin\">\r\n            <div class=\"col s12 white-text\">\r\n                I hereby certify to the correctness of the date aboce as found in the Parish Book of\r\n            </div>\r\n        </div>\r\n        <div class=\"row remove_margin_top remove_margin\">\r\n            <div class=\"col s12\">\r\n                <span class=\"white-text\">Marriages No.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>marriages_no</span>\r\n                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"white-text\">Page:</span><span>page_no</span>\r\n                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"white-text\">Line:</span><span>line_no</span>\r\n            </div>\r\n        </div>\r\n        <div class=\"row remove_margin\">\r\n            <div class=\"col s12\">\r\n                <span class=\"white-text\">Given this</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>number_day</span>\r\n                <span class=\"white-text\">day of</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>month_text</span>\r\n                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"white-text\">, 20</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>year_in_two</span>\r\n            </div>\r\n        </div>\r\n        <h3>&nbsp;</h3>\r\n        <div class=\"row\">\r\n            <div class=\"col s12 border_color\">\r\n                <p class=\"right\"></p>\r\n            </div>\r\n        </div>\r\n    </body>\r\n</html>', 1, 0, '2021-07-03 14:45:06', '2021-07-04 00:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, 'Julcarl Selma', 'carljulamles@gmail.com', 'users/default.png', NULL, '$2y$10$/vQQwrLJfiDARDEXYJyLBuNC5ZDJI.rjPSjl61UiQKSF0ZD1iROPW', NULL, '{\"locale\":\"en\"}', '2021-05-18 07:48:40', '2021-07-07 19:56:15', 1),
(2, 1, 'Yasmin Tapado', 'yasmintapado@gmail.com', 'users/default.png', NULL, '$2y$10$rqf1hDpy/zfi75T6hBoo/ull1Sx6yKB9sdDJJrVJBjjPOdUl4Mw2u', NULL, '{\"locale\":\"en\"}', '2021-05-18 07:50:54', '2021-06-27 03:41:29', 1),
(3, 2, 'Daniel Catindoy', 'act.danielcatindoy@gmail.com', 'users/default.png', NULL, '$2y$10$ok6GIRvHw4.qFfE2Hc004eOegiUOJBmw/J3b7H4udkNYuwZCGMRQW', NULL, '{\"locale\":\"en\"}', '2021-05-18 07:58:04', '2021-07-07 05:02:51', 1),
(4, 2, 'Nora Catindoy', 'noracatindoy@gmail.com', 'users/default.png', NULL, '$2y$10$ok6GIRvHw4.qFfE2Hc004eOegiUOJBmw/J3b7H4udkNYuwZCGMRQW', NULL, '{\"locale\":\"en\"}', '2021-06-27 00:45:59', '2021-06-27 03:17:01', 1),
(5, 2, 'Jhomark Jame Selma', 'sjhomark@gmail.com', 'users/default.png', NULL, '$2y$10$KzfUlZUXMzPxQlfuNBtdwuXGokgR9Szb1K09x4rRETN0Q3lU.8PrS', NULL, '{\"locale\":\"en\"}', '2021-06-27 00:46:47', '2021-06-27 03:21:10', 1),
(23, 2, 'Chris evans', 'christiuamazing@gmail.com', 'users/default.png', NULL, '$2y$10$9m4EfPCkHwnodmlg0Z3mL.P7xdCh9mvSi6th44e5SuiDTLFaV2bVK', NULL, NULL, '2021-06-28 05:35:38', '2021-06-28 05:50:13', 1),
(24, 2, 'Chris Tiu', 'anamarie@gmail.com', 'users/default.png', NULL, '$2y$10$pAvXpSqxGqVT3GiZHuogrO22K9XPoa./IMaqxU2rqcTV62jHaE0eW', NULL, NULL, '2021-06-30 06:51:14', '2021-06-30 06:51:14', 1),
(25, 3, 'Arjay', 'rosalinosuson@gmail.com', 'users/default.png', NULL, '$2y$10$ok6GIRvHw4.qFfE2Hc004eOegiUOJBmw/J3b7H4udkNYuwZCGMRQW', NULL, NULL, '2021-07-03 22:58:01', '2021-07-03 23:00:37', 1),
(26, 3, 'Admin', 'admin@ihmp.com', 'users/default.png', NULL, '$2y$10$7iYnjT8PFbq1ohUmoBTEDuvJA8ymXrwKmHqnipeuByabQzzRmOhr6', NULL, NULL, '2021-07-03 23:33:38', '2021-07-03 23:36:59', 1),
(27, 2, 'John', 'john123@gmail.com', 'users/default.png', NULL, '$2y$10$/NdvQkCnYy7jqG9AIbubc.iILZT/xFeRRRuBdX/fRBR9.ZzE6vGlK', NULL, NULL, '2021-07-06 22:15:27', '2021-07-06 22:15:27', 1),
(28, 2, 'Din Dong', 'dindongdantes@gmail.com', 'users/default.png', NULL, '$2y$10$Mb7yx4xnezuf66aKSJ805ekhGE6c2WpNTqdq1alYn4cyoM1jIqrHC', NULL, NULL, '2021-07-07 05:16:33', '2021-07-07 05:18:33', 1),
(29, 2, 'Jose Marie Chan', 'josemariechan@gmail.com', 'users/default.png', NULL, '$2y$10$S.Hs3ngR3Zn6f/Qhx/mgje55mK0nNdrmR5t8PU5e8aPmQrcjK9UGy', NULL, NULL, '2021-07-07 05:17:20', '2021-07-07 05:18:43', 1),
(30, 1, 'Christine Hermosa', 'christinehermosa@gmail.com', 'users/default.png', NULL, '$2y$10$FafcSXfPhOB3QhioDS1JZefJpA3nh9ZuYfR7wId48ngNQ1vjiB0Ie', NULL, NULL, '2021-07-07 05:17:42', '2021-07-07 05:22:10', 1),
(31, 1, 'jhomark jame selma', 'kram@gmail.com', 'users/default.png', NULL, '$2y$10$ok6GIRvHw4.qFfE2Hc004eOegiUOJBmw/J3b7H4udkNYuwZCGMRQW', NULL, NULL, '2021-07-07 19:43:51', '2021-07-07 19:55:04', 0),
(32, 2, 'Ethyl Alcohol', 'ethylalcohol@gmail.com', 'users/default.png', NULL, '$2y$10$.1ZjtED0UjX8g//fB0I8k.5lpoupRcOMnIqOqIqeHQ.HpIAIyvySO', NULL, NULL, '2021-07-09 22:11:26', '2021-07-09 22:11:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tokens`
--
ALTER TABLE `access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `priests`
--
ALTER TABLE `priests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_tokens`
--
ALTER TABLE `access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `priests`
--
ALTER TABLE `priests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
