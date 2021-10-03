-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 03:28 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
(1, 1, 'njaGJ6iqchAQ42Yiit2FDTicVFiEaVpd|1', 'valid', '2021-09-19 21:23:20', '2021-05-22 16:51:07', '2021-09-19 01:23:20'),
(2, 2, 'jkNDc9y5ZZw0J8FxvUX22LYGdDLgjTKR|2', 'expired', '2021-06-28 07:42:21', '2021-05-23 10:03:07', '2021-06-28 04:37:11'),
(3, 3, 'n32GvIvQGMDNVSqc90TwqCPtSSqsKaiH|3', 'expired', '2021-06-28 07:14:06', '2021-06-27 10:51:33', '2021-06-27 11:14:11'),
(4, 7, 'ImJNguNW7PlyI73k8ZLkAFlAspzMmVuB|7', 'valid', '2021-06-28 06:57:43', '2021-06-27 10:57:43', '2021-06-27 10:57:43'),
(5, 23, 'D6gb2HwVAlbnKizhM45Dm1q7zxmMwic7|23', 'expired', '2021-06-29 09:46:44', '2021-06-28 13:37:38', '2021-06-28 13:50:24'),
(6, 25, 'LFGjiRayuC2QCJFBcFoBSSddNv1Mkcwg|25', 'valid', '2021-07-05 05:21:28', '2021-07-04 07:00:49', '2021-07-04 09:21:28'),
(7, 26, '5DUTlN2zTUr7i5netZK6WhpFxjImwRzg|26', 'valid', '2021-07-05 03:40:41', '2021-07-04 07:40:28', '2021-07-04 07:40:41'),
(8, 33, 'RgGotXqCfWGD6rkeNbd4YI0OvYMWOBoV|33', 'valid', '2021-08-09 22:06:55', '2021-08-09 17:06:44', '2021-08-09 17:06:55'),
(9, 34, '1WqIcZ8V6KPKPbkaH9MXM5Jvf9gKnF2n|34', 'valid', '2021-08-09 22:18:01', '2021-08-09 17:16:42', '2021-08-09 17:18:01'),
(10, 35, '2w38sWeOxsQflwGByVUOzsnQkaNzZMAA|35', 'valid', '2021-08-28 03:58:50', '2021-08-10 16:30:58', '2021-08-27 07:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `certificates` (`id`, `firstname`, `middlename`, `lastname`, `suffix`, `certificate_type`, `priest_id`, `meta`, `is_deleted`, `created_by`, `created_date`, `created_at`, `updated_at`) VALUES
(6, 'Rhechelow', 'B.', 'Acuram', 'Jr.', 'baptism', 2, '{\"born_on\":\"3/11/2020\",\"born_in\":\"TDH, San Isidro, Talisay City\",\"father_firstname\":\"Rhechelow \",\"father_middlename\":\"T.\",\"father_lastname\":\"Acuram\",\"father_suffix\":\"\",\"mother_firstname\":\"Bernadith\",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Berang- Berang\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Lipata, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Richard Dayaday, Clavel Carbajosa\",\"baptismal_register\":\"1\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 10:29:34', '2021-08-10 17:29:34', '2021-08-10 13:06:36'),
(7, 'Gio Sean', 'A.', 'Arañas', NULL, 'baptism', 3, '{\"born_on\":\"10\\/19\\/2020\",\"born_in\":\"MGBH Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Ricky\",\"father_middlename\":\"C.\",\"father_lastname\":\"Ara\\u00f1as\",\"mother_firstname\":\"Creshilda\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Alegado\",\"resident_of\":\"Tunghaan, Minglanilla, Cbeu\",\"baptism_date\":\"12\\/10\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"2\",\"godparents\":\"Ronel Aranas, Neria Coloso\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 10:36:06', '2021-08-10 17:36:06', '2021-08-10 17:36:06'),
(8, 'Prince Ethan', 'I.', 'Branzuela', NULL, 'baptism', 2, '{\"born_on\":\"12\\/11\\/2019\",\"born_in\":\"MDH, Calajo-an, Minglanilla, Cebu \",\"father_firstname\":\"Joselito \",\"father_middlename\":\"O. \",\"father_lastname\":\"Branzuela\",\"mother_firstname\":\"Jenalyn\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Isidro\",\"resident_of\":\"Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"3\",\"godparents\":\"Nilfa Branzuela, Riva Sumampong\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 10:50:18', '2021-08-10 17:50:18', '2021-08-10 17:50:18'),
(9, 'Cedric Ford', 'R.', 'Cañeda', NULL, 'baptism', 2, '{\"born_on\":\"10\\/16\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City\",\"father_firstname\":\"Clifford \",\"father_middlename\":\"R. \",\"father_lastname\":\"Ca\\u00f1eda\",\"mother_firstname\":\"Maria Cristina \",\"mother_middlename\":\"L. \",\"mother_lastname\":\"Racho\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"4\",\"godparents\":\"Aileen Bacus, Mark Christopher Racho\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 10:55:11', '2021-08-10 17:55:11', '2021-08-10 17:55:11'),
(10, 'Hanna Casey', 'A.', 'Dayaday', NULL, 'baptism', 2, '{\"born_on\":\"3\\/20\\/2020\",\"born_in\":\"MGBH Pob. Ward 1, Minglanilla, Cebu\",\"father_firstname\":\"Brian\",\"father_middlename\":\"S. \",\"father_lastname\":\"Dayaday\",\"mother_firstname\":\"Mercedisa \",\"mother_middlename\":\"G. \",\"mother_lastname\":\"Angana\",\"resident_of\":\"Lower Lipata, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"5\",\"godparents\":\"Maria Lorenza Labrador, Jimmy Packies\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 11:00:08', '2021-08-10 18:00:08', '2021-08-10 18:00:08'),
(11, 'Love Marie', 'P.', 'Dense', NULL, 'baptism', 2, '{\"born_on\":\"3/27/2020\",\"born_in\":\"SAMCH, Basak, Cebu City\",\"father_firstname\":\"Joshua\",\"father_middlename\":\"C.\",\"father_lastname\":\"Dense\",\"mother_firstname\":\"Ma. Paz \",\"mother_middlename\":\"C.\",\"mother_lastname\":\"Paredes\",\"resident_of\":\"Upper Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Myla M. Bariquit, Alford A. Magdogo\",\"baptismal_register\":\"6\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 11:06:54', '2021-08-10 18:06:54', '2021-08-10 10:09:01'),
(12, 'April Joy', 'L.', 'Edullantes', NULL, 'baptism', 2, '{\"born_on\":\"4\\/28\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Jhorel Dave\",\"father_middlename\":\"A. \",\"father_lastname\":\"Edullantes\",\"mother_firstname\":\"Josie \",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Lozano\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"7\",\"godparents\":\"Julius Lozano, Kris Marie Laput\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 11:21:54', '2021-08-10 18:21:54', '2021-08-10 18:21:54'),
(13, 'Stephanie', 'M.', 'Flores', NULL, 'baptism', 2, '{\"born_on\":\"7\\/12\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City\",\"father_firstname\":\"Gilbert\",\"father_middlename\":\"R.\",\"father_lastname\":\"Flores\",\"mother_firstname\":\"Mary Ann \",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Moja\",\"resident_of\":\"Pob. Ward IV, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"8\",\"godparents\":\"Mariel Rivera, Jeshel Baclado\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 11:24:43', '2021-08-10 18:24:43', '2021-08-10 18:24:43'),
(14, 'Claython James', NULL, 'Fuertes', NULL, 'baptism', 2, '{\"born_on\":\"5/17/2018\",\"born_in\":\"MDH, Calajo-an, MInglanilla, Cebu\",\"father_firstname\":\" \",\"father_middlename\":\" \",\"father_lastname\":\" \",\"father_suffix\":\"\",\"mother_firstname\":\"Josephine\",\"mother_middlename\":\"R.\",\"mother_lastname\":\"Fuertes\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Lucia M. Lastimosa, Ma. Florida Villasencio\",\"baptismal_register\":\"9\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 11:30:39', '2021-08-10 18:30:39', '2021-08-10 12:41:08'),
(15, 'Mark', 'G.', 'Franza', NULL, 'baptism', 2, '{\"born_on\":\"10\\/18\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Tiburcio\",\"father_middlename\":\"\",\"father_lastname\":\"Franza Jr.\",\"mother_firstname\":\"Nilda\",\"mother_middlename\":\"\",\"mother_lastname\":\"Gequillo\",\"resident_of\":\"Tulay Bacay, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"10\",\"godparents\":\"Ronaldo Lebunfacil, Cristina Eronico\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 11:36:35', '2021-08-10 18:36:35', '2021-08-10 18:36:35'),
(16, 'Mark Luis', NULL, 'Garay', NULL, 'baptism', 2, '{\"born_on\":\"8/11/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City\",\"father_firstname\":\"-\",\"father_middlename\":\"-\",\"father_lastname\":\"-\",\"father_suffix\":\"\",\"mother_firstname\":\"Mary- Rose \",\"mother_middlename\":\"F. \",\"mother_lastname\":\"Garay\",\"mother_suffix\":\"\",\"resident_of\":\"Ward IV, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Cherrylyn Cabanig, Joshua Aleser\",\"baptismal_register\":\"11\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 11:44:56', '2021-08-10 18:44:56', '2021-08-10 12:40:15'),
(17, 'Quibb Siemon', 'S.', 'Garcines', NULL, 'baptism', 2, '{\"born_on\":\"8\\/4\\/2020\",\"born_in\":\"MMCBHC Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Rey Mark\",\"father_middlename\":\"E. \",\"father_lastname\":\"Garcines\",\"mother_firstname\":\"Carmila\",\"mother_middlename\":\"C. \",\"mother_lastname\":\"Sellote\",\"resident_of\":\"Ward III, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"12\",\"godparents\":\"Sheena Sacol, Mary Jean Sellote\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 11:48:39', '2021-08-10 18:48:39', '2021-08-10 18:48:39'),
(18, 'Zsabella Corine', 'C.', 'Geonzon', NULL, 'baptism', 2, '{\"born_on\":\"6\\/4\\/2020\",\"born_in\":\"MGBH Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Al Chris\",\"father_middlename\":\"C. \",\"father_lastname\":\"Geonzon\",\"mother_firstname\":\"Chieza Marie\",\"mother_middlename\":\"M.\",\"mother_lastname\":\"Catipay\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"13\",\"godparents\":\"Noemi Catipay, Gretchen Catalan\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 11:56:44', '2021-08-10 18:56:44', '2021-08-10 18:56:44'),
(19, 'Jhon Aiden', NULL, 'Largo', NULL, 'baptism', 2, '{\"born_on\":\"9\\/5\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Julie Anne\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Largo\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"14\",\"godparents\":\"Jocelyn Oberes, Rizza Mae Largo\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 13:46:47', '2021-08-10 20:46:47', '2021-08-10 20:46:47'),
(20, 'Zjaff Amber', 'D.', 'Lagrimas', NULL, 'baptism', 2, '{\"born_on\":\"8\\/16\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City\",\"father_firstname\":\"Mark John\",\"father_middlename\":\"I. \",\"father_lastname\":\"Lagrimas\",\"father_suffix\":\"\",\"mother_firstname\":\"Floravel\",\"mother_middlename\":\"T. \",\"mother_lastname\":\"De Gracia\",\"mother_suffix\":\"\",\"resident_of\":\"Pob. Ward I, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"15\",\"godparents\":\"Ryan Kaye Cabajar, Nerissa Abella\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 13:53:02', '2021-08-10 20:53:02', '2021-08-10 20:53:02'),
(21, 'Jhon Carl', 'Y.', 'Mangcao', NULL, 'baptism', 2, '{\"born_on\":\"9\\/10\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Ruel\",\"father_middlename\":\"D. \",\"father_lastname\":\"Mangcao\",\"father_suffix\":\"\",\"mother_firstname\":\"Joy \",\"mother_middlename\":\"T. \",\"mother_lastname\":\"Ybaritta\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"16\",\"godparents\":\"Analyn Salvascion, Cerelo Mangcao\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:02:20', '2021-08-10 21:02:20', '2021-08-10 21:02:20'),
(22, 'Hurley Fredich', 'C.', 'Medina', NULL, 'baptism', 2, '{\"born_on\":\"9\\/25\\/2020\",\"born_in\":\"SAMCH, Basak, Cebu City\",\"father_firstname\":\"Alfred \",\"father_middlename\":\"C. \",\"father_lastname\":\"Medina\",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Juper\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Caparas\",\"mother_suffix\":\"\",\"resident_of\":\"Pob. Ward III, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"17\",\"godparents\":\"Dave Marvie Villalus, Rodulf Esparaguera\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:13:46', '2021-08-10 21:13:46', '2021-08-10 21:13:46'),
(23, 'Gabriella', 'A.', 'Mundo', NULL, 'baptism', 2, '{\"born_on\":\"10\\/4\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Julius Caesar\",\"father_middlename\":\"C.\",\"father_lastname\":\"Mundo\",\"father_suffix\":\"\",\"mother_firstname\":\"Nerissa\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Abella\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"18\",\"godparents\":\"Princess Joy Mundo, Kylie Arregado\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:23:29', '2021-08-10 21:23:29', '2021-08-10 21:23:29'),
(24, 'Athena', 'E.', 'Panganiban', NULL, 'baptism', 2, '{\"born_on\":\"9\\/4\\/2020\",\"born_in\":\"MGBH Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Byrom\",\"father_middlename\":\"A. \",\"father_lastname\":\"Panganiban\",\"father_suffix\":\"\",\"mother_firstname\":\"Anjeilyn \",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Ebora\",\"mother_suffix\":\"\",\"resident_of\":\"Teves Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"19\",\"godparents\":\"Marjorie Jabadan, Jose Rey Ebora\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:27:22', '2021-08-10 21:27:22', '2021-08-10 21:27:22'),
(25, 'Raylinn Berniss', 'A.', 'Rodriguez', NULL, 'baptism', 2, '{\"born_on\":\"3\\/20\\/2020\",\"born_in\":\"CPCMH Inc. Cebu City\",\"father_firstname\":\"Raymund Bernard\",\"father_middlename\":\"E. \",\"father_lastname\":\"Rodriguez\",\"father_suffix\":\"\",\"mother_firstname\":\"Reneelinn\",\"mother_middlename\":\"R.\",\"mother_lastname\":\"Alcala\",\"mother_suffix\":\"\",\"resident_of\":\"Linao, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"20\",\"godparents\":\"Jade Seno, Marie Jeneviv Musong\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:32:55', '2021-08-10 21:32:55', '2021-08-10 21:32:55'),
(26, 'Mark Jacob', 'C.', 'Rico', NULL, 'baptism', 2, '{\"born_on\":\"8\\/5\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Mark John\",\"father_middlename\":\"L. \",\"father_lastname\":\"Rico\",\"father_suffix\":\"\",\"mother_firstname\":\"Rica May\",\"mother_middlename\":\"V.\",\"mother_lastname\":\"Cabrera\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"21\",\"godparents\":\"Wilma Darundag, Genevie Cabrera\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:37:33', '2021-08-10 21:37:33', '2021-08-10 21:37:33'),
(27, 'Maybelle', 'J.', 'Sabanal', NULL, 'baptism', 2, '{\"born_on\":\"5\\/29\\/2020\",\"born_in\":\"SAMCH, Basak, Cebu City\",\"father_firstname\":\"Edmon \",\"father_middlename\":\"B.\",\"father_lastname\":\"Sabanal\",\"father_suffix\":\"\",\"mother_firstname\":\"Jocelyn \",\"mother_middlename\":\"T. \",\"mother_lastname\":\"Jimenez\",\"mother_suffix\":\"\",\"resident_of\":\"Tungkil, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"22\",\"godparents\":\"Richard Villena, Erma Advincula\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:44:57', '2021-08-10 21:44:57', '2021-08-10 21:44:57'),
(28, 'Ryane Jane', 'S.', 'Sellote', NULL, 'baptism', 2, '{\"born_on\":\"9/12/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Jay Ryan\",\"father_middlename\":\"C. \",\"father_lastname\":\"Sellote\",\"father_suffix\":\"\",\"mother_firstname\":\"Mary Grace Dayana\",\"mother_middlename\":\"C.\",\"mother_lastname\":\" Segundino\",\"mother_suffix\":\"\",\"resident_of\":\"Ward III, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Mary Grace Sasoman, Marlito Sellote\",\"baptismal_register\":\"23\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 14:49:20', '2021-08-10 21:49:20', '2021-08-10 13:51:01'),
(29, 'Earl Nicolai', 'L.', 'Soco', NULL, 'baptism', 2, '{\"born_on\":\"10\\/27\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay Cebu\",\"father_firstname\":\"Earl\",\"father_middlename\":\"P.\",\"father_lastname\":\"Soco\",\"father_suffix\":\"\",\"mother_firstname\":\"Cheralllyn\",\"mother_middlename\":\"S.\",\"mother_lastname\":\"Lavapiez\",\"mother_suffix\":\"\",\"resident_of\":\"Lower, Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"\",\"baptismal_register\":\"24\",\"godparents\":\"Cherie Jean L. Getuaban, Christian Jade S. Lavapiez\",\"volume\":\"96\",\"page\":\"001\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 14:55:19', '2021-08-10 21:55:19', '2021-08-10 21:55:19'),
(30, 'Jaypee', 'F.', 'Tanduyan', NULL, 'baptism', 2, '{\"born_on\":\"7/16/2020\",\"born_in\":\"MGBH Pob. Ward I,  Minglanilla, Cebu\",\"father_firstname\":\"Jerome \",\"father_middlename\":\"O. \",\"father_lastname\":\"Tanduyan\",\"father_suffix\":\"\",\"mother_firstname\":\"Melrose\",\"mother_middlename\":\"B. \",\"mother_lastname\":\"Flores\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Lipata, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Nelson Pilapil, Laila Flores\",\"baptismal_register\":\"25\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 14:59:45', '2021-08-10 21:59:45', '2021-08-10 14:38:16'),
(31, 'Kiesha Esabel', 'R.', 'Tumulak', NULL, 'baptism', 2, '{\"born_on\":\"3/24/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Junnie\",\"father_middlename\":\"T. \",\"father_lastname\":\"Tumulak\",\"father_suffix\":\"\",\"mother_firstname\":\"Analiza\",\"mother_middlename\":\"V. \",\"mother_lastname\":\"Rafayla\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Lipata, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Marie Joy Hoyhoy, Peter Gella\",\"baptismal_register\":\"26\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 15:06:39', '2021-08-10 22:06:39', '2021-08-10 14:37:54'),
(32, 'Alexia Jade', 'A.', 'Termulo', NULL, 'baptism', 2, '{\"born_on\":\"7/10/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Christopher\",\"father_middlename\":\"E. \",\"father_lastname\":\"Termulo\",\"father_suffix\":\"\",\"mother_firstname\":\"Rayciel\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Abregana\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Rosemarie Pepito, Carlo Oretega\",\"baptismal_register\":\"27\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 15:21:41', '2021-08-10 22:21:41', '2021-08-10 14:37:30'),
(33, 'Khloe Aleziandra', 'R.', 'Verceles', NULL, 'baptism', 2, '{\"born_on\":\"8/9/2020\",\"born_in\":\"SAMCH, Basak, Cebu City\",\"father_firstname\":\"Kelvin\",\"father_middlename\":\"A.\",\"father_lastname\":\"Verceles\",\"father_suffix\":\"\",\"mother_firstname\":\"Joann\",\"mother_middlename\":\"B. \",\"mother_lastname\":\"Resane\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11/22/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"godparents\":\"Jhezzel B. Gucela, Miraflor Jauculan \",\"baptismal_register\":\"28\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 15:32:40', '2021-08-10 22:32:40', '2021-08-10 14:37:18'),
(34, 'Khaye Luna', NULL, 'Zabate', NULL, 'baptism', 2, '{\"born_on\":\"7\\/10\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Janine\",\"mother_middlename\":\"J.\",\"mother_lastname\":\"Zabate\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11\\/22\\/2020\",\"baptism_minister\":\"Rev. Fr. Kent Dahrel C. Galo\",\"baptismal_register\":\"29\",\"godparents\":\"Jeremy Franza, Mayflor Suansing\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 15:36:41', '2021-08-10 22:36:41', '2021-08-10 22:36:41'),
(35, 'Nathan', 'M.', 'Taluberio', NULL, 'baptism', 3, '{\"born_on\":\"10\\/18\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay, Cebu\",\"father_firstname\":\"Nico \",\"father_middlename\":\"E. \",\"father_lastname\":\"Toluberio\",\"father_suffix\":\"\",\"mother_firstname\":\"Shiela Mae\",\"mother_middlename\":\"O. \",\"mother_lastname\":\"Monicit\",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"11\\/28\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"31\",\"godparents\":\"Wendell Ababon, Baby Jane Monicit\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 15:42:34', '2021-08-10 22:42:34', '2021-08-10 22:42:34'),
(36, 'Prince Mathushael', 'G.', 'Ang', NULL, 'baptism', 3, '{\"born_on\":\"1\\/9\\/2021\",\"born_in\":\"CPCMH Inc. Cebu City\",\"father_firstname\":\"Eugene\",\"father_middlename\":\"L. \",\"father_lastname\":\"Ang\",\"father_suffix\":\"\",\"mother_firstname\":\"Desirie\",\"mother_middlename\":\"M.\",\"mother_lastname\":\"Galapin \",\"mother_suffix\":\"\",\"resident_of\":\"Pakigne, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"31\",\"godparents\":\"Ging- ging Ronquillo, Gerald Bacus\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 16:13:18', '2021-08-10 23:13:18', '2021-08-10 23:13:18'),
(38, 'Baby Ashley', 'C.', 'Acebedo', NULL, 'baptism', 3, '{\"born_on\":\"6\\/27\\/2020\",\"born_in\":\"TDH, San Isidro, Talisay City\",\"father_firstname\":\"Benedicto\",\"father_middlename\":\"W. \",\"father_lastname\":\"Acebedo\",\"father_suffix\":\"\",\"mother_firstname\":\"Anna Mae\",\"mother_middlename\":\"B.\",\"mother_lastname\":\"Cuna\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"32\",\"godparents\":\"Jason Clamonte, Cris Ann Vaflor\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 16:19:04', '2021-08-10 23:19:04', '2021-08-10 23:19:04'),
(39, 'Haeya Easter Mohryn', 'M.', 'Buot', NULL, 'baptism', 3, '{\"born_on\":\"4/12/2020\",\"born_in\":\"SAMCH, Basak, Cebu City\",\"father_firstname\":\"Mohr Svenson\",\"father_middlename\":\"T. \",\"father_lastname\":\"Buot\",\"father_suffix\":\"\",\"mother_firstname\":\"Emalyn\",\"mother_middlename\":\"G. \",\"mother_lastname\":\"Moreno\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11/29/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Deborah G. Banquil, Honey May B. Pabia\",\"baptismal_register\":\"33\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 16:24:04', '2021-08-10 23:24:04', '2021-08-10 15:25:28'),
(40, 'Maizie Jane', 'S.', 'Cabilis', NULL, 'baptism', 2, '{\"born_on\":\"5\\/4\\/2020\",\"born_in\":\"TDH, San Isidro, Talisay CIty\",\"father_firstname\":\"Juny \",\"father_middlename\":\"B. \",\"father_lastname\":\"Cabilis\",\"father_suffix\":\"\",\"mother_firstname\":\"Evelyn\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Samson\",\"mother_suffix\":\"\",\"resident_of\":\"Linao, Minglanilla, cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"34\",\"godparents\":\"Bernard D. Lagaras, Elgen A. Samson\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 16:29:14', '2021-08-10 23:29:14', '2021-08-10 23:29:14'),
(41, 'Crishan Keith', 'T.', 'Cauyon', NULL, 'baptism', 3, '{\"born_on\":\"4\\/13\\/2020\",\"born_in\":\"TDH, San Isidro, Talisay City\",\"father_firstname\":\"Jaybert\",\"father_middlename\":\"O. \",\"father_lastname\":\"Cauyon\",\"father_suffix\":\"\",\"mother_firstname\":\"Ritchell\",\"mother_middlename\":\"F. \",\"mother_lastname\":\"Tolbo\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglaniilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"35\",\"godparents\":\"Roxan Puagang, Reynaldo Cauzarin\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 16:33:36', '2021-08-10 23:33:36', '2021-08-10 23:33:36'),
(42, 'Savannah', 'N.', 'Carbadilla', NULL, 'baptism', 3, '{\"born_on\":\"6\\/24\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Jocol\",\"father_middlename\":\"L. \",\"father_lastname\":\"Carbadilla\",\"father_suffix\":\"\",\"mother_firstname\":\"Charlyn\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Navaja\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"36\",\"godparents\":\"Ronilo Lovero, Irene Navaja\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 16:37:57', '2021-08-10 23:37:57', '2021-08-10 23:37:57'),
(43, 'Jake Zhyler', 'A.', 'Catano', NULL, 'baptism', 3, '{\"born_on\":\"8/11/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minlganilla, Cebu\",\"father_firstname\":\"Kent Maynard \",\"father_middlename\":\"\",\"father_lastname\":\"Catano\",\"father_suffix\":\"\",\"mother_firstname\":\"Jay \",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Alipar\",\"mother_suffix\":\"\",\"resident_of\":\"Tubod, Minglanilla, Cebu\",\"baptism_date\":\"11/29/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Christian Versoza, Kimberly Sellon\",\"baptismal_register\":\"37\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 16:51:32', '2021-08-10 23:51:32', '2021-08-10 15:52:48'),
(44, 'Carl Ruzzel', 'D.', 'Diaz', NULL, 'baptism', 3, '{\"born_on\":\"5\\/3\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Carlo\",\"father_middlename\":\"B.\",\"father_lastname\":\"Diaz\",\"father_suffix\":\"\",\"mother_firstname\":\"Ruzell \",\"mother_middlename\":\"\",\"mother_lastname\":\"Del Socorro\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Pakigne, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"38\",\"godparents\":\"Johana Patoc, Bonifacio Ageas\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 16:57:18', '2021-08-10 23:57:18', '2021-08-10 23:57:18'),
(45, 'Paul George', NULL, 'Egao', NULL, 'baptism', 3, '{\"born_on\":\"3\\/1\\/2018\",\"born_in\":\"MDH, Calajoa-an, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Libercriss\",\"mother_middlename\":\"\",\"mother_lastname\":\"Egao\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"39\",\"godparents\":\"Alex Alieamcer, Motito Cubar\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 17:01:10', '2021-08-11 00:01:10', '2021-08-11 00:01:10'),
(46, 'Shamcey Kate', NULL, 'Edusma', NULL, 'baptism', 3, '{\"born_on\":\"4\\/3\\/2020\",\"born_in\":\"MDH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Jocebeth\",\"mother_middlename\":\"T.\",\"mother_lastname\":\"Edusma\",\"mother_suffix\":\"\",\"resident_of\":\"Tungkil, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"40\",\"godparents\":\"Cristel Moreno, Michel Malda\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 17:11:38', '2021-08-11 00:11:38', '2021-08-11 00:11:38'),
(47, 'Elaizah', 'M.', 'Languido', NULL, 'baptism', 3, '{\"born_on\":\"2/11/2020\",\"born_in\":\"OBH, Pob. City of Naga\",\"father_firstname\":\"Jerson\",\"father_middlename\":\"S. \",\"father_lastname\":\"Languido\",\"father_suffix\":\"\",\"mother_firstname\":\"Critche \",\"mother_middlename\":\"F. \",\"mother_lastname\":\"Memoracion\",\"mother_suffix\":\"\",\"resident_of\":\"Bayong Cadulawan, Minglanilla, Cebu\",\"baptism_date\":\"11/29/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Claire Caparas, Alfonso Empenado Jr.\",\"baptismal_register\":\"41\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-10 17:16:30', '2021-08-11 00:16:30', '2021-08-10 16:22:44'),
(48, 'Elaijah', 'M.', 'Languido', NULL, 'baptism', 3, '{\"born_on\":\"2\\/11\\/2020\",\"born_in\":\"OBH, Pob. City of Naga\",\"father_firstname\":\"Jerson\",\"father_middlename\":\"S. \",\"father_lastname\":\"Languido\",\"father_suffix\":\"\",\"mother_firstname\":\"Critche \",\"mother_middlename\":\"F. \",\"mother_lastname\":\"Memoracion\",\"mother_suffix\":\"\",\"resident_of\":\"Bayong Cadulawan, Minglanilla, Cebu \",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"42\",\"godparents\":\"Roberto Bulac, Cherry Garing\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 17:21:24', '2021-08-11 00:21:24', '2021-08-11 00:21:24'),
(49, 'Riona', 'G.', 'Mantalaba', NULL, 'baptism', 3, '{\"born_on\":\"10\\/16\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Sherge Rio\",\"father_middlename\":\"L. \",\"father_lastname\":\"Mantalaba\",\"father_suffix\":\"\",\"mother_firstname\":\"Jenalyn \",\"mother_middlename\":\"V. \",\"mother_lastname\":\"Gentica\",\"mother_suffix\":\"\",\"resident_of\":\"Tiber, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"43\",\"godparents\":\"Jose Boca, Lucille Gentica\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 17:25:53', '2021-08-11 00:25:53', '2021-08-11 00:25:53'),
(50, 'Rashinegel', 'S.', 'Minguito', NULL, 'baptism', 3, '{\"born_on\":\"8\\/8\\/2019\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Raul \",\"father_middlename\":\"C.\",\"father_lastname\":\"Minguito\",\"father_suffix\":\"\",\"mother_firstname\":\"Angel \",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Sore\\u00f1o\",\"mother_suffix\":\"\",\"resident_of\":\"Bacay Tulay, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"44\",\"godparents\":\"Rodyard Juario, Florencia Bordaje\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 17:36:04', '2021-08-11 00:36:04', '2021-08-11 00:36:04'),
(51, 'Zyair Keil', 'M.', 'Montemayor', NULL, 'baptism', 3, '{\"born_on\":\"7\\/30\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Micheal \",\"father_middlename\":\"T. \",\"father_lastname\":\"Montemayor \",\"father_suffix\":\"\",\"mother_firstname\":\"Joe- ann\",\"mother_middlename\":\"T. \",\"mother_lastname\":\"Mabiya\",\"mother_suffix\":\"\",\"resident_of\":\"Ward III, MInglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"45\",\"godparents\":\"Joanne Marie Radayla, Karl Ateinza\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-10 17:47:31', '2021-08-11 00:47:31', '2021-08-11 00:47:31'),
(52, 'Kent Jyrell', 'G.', 'Narvasa', NULL, 'baptism', 3, '{\"born_on\":\"9\\/13\\/2019\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Roel\",\"father_middlename\":\"R. \",\"father_lastname\":\"Narvasa\",\"father_suffix\":\"\",\"mother_firstname\":\"Jhenny\",\"mother_middlename\":\"O. \",\"mother_lastname\":\"Geonzon\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"46\",\"godparents\":\"Diomedes M. Rudenas Jr. , John Bert R. Narvasa\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 08:58:35', '2021-08-11 15:58:35', '2021-08-11 15:58:35'),
(53, 'Mise Chestel', 'D.', 'Navoa', NULL, 'baptism', 3, '{\"born_on\":\"10\\/19\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Rod Lester\",\"father_middlename\":\"C. \",\"father_lastname\":\"Navoa\",\"father_suffix\":\"\",\"mother_firstname\":\"Michelle\",\"mother_middlename\":\"N. \",\"mother_lastname\":\"Dejan\",\"mother_suffix\":\"\",\"resident_of\":\"Tagaytay Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"47\",\"godparents\":\"Abegail Sellote, Ken Wood Lariosa\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 09:03:12', '2021-08-11 16:03:12', '2021-08-11 16:03:12'),
(54, 'Zowie', 'L.', 'Olaer', NULL, 'baptism', 3, '{\"born_on\":\"10/24/2020\",\"born_in\":\"PSH, Gorordo Ave. Cebu City\",\"father_firstname\":\"Jerson\",\"father_middlename\":\"C.\",\"father_lastname\":\"Olaer\",\"father_suffix\":\"\",\"mother_firstname\":\"Eva Mae \",\"mother_middlename\":\"V.\",\"mother_lastname\":\"Lipura\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11/29/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Mae Jean Cañoneo, Christian Louie Veegas\",\"baptismal_register\":\"48\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 09:23:14', '2021-08-11 16:23:14', '2021-08-11 08:36:52'),
(55, 'Princess Pauline', 'E.', 'Olmillo', NULL, 'baptism', 3, '{\"born_on\":\"10\\/21\\/2019\",\"born_in\":\"MDH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Paul Vincent\",\"father_middlename\":\"D. \",\"father_lastname\":\"Olmillo \",\"father_suffix\":\"\",\"mother_firstname\":\"Ubecriss\",\"mother_middlename\":\"\",\"mother_lastname\":\"Egao\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr, Roy D. Bucag\",\"baptismal_register\":\"49\",\"godparents\":\"Ubigildo Alicamer, Jasmin Alicamer\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 09:41:21', '2021-08-11 16:41:21', '2021-08-11 16:41:21'),
(56, 'Jamaica', 'E.', 'Olmillo', NULL, 'baptism', 3, '{\"born_on\":\"10\\/5\\/2020\",\"born_in\":\"MDH, Calajo-an, MInglanilla, Cebu\",\"father_firstname\":\"Paul Vincent\",\"father_middlename\":\"D. \",\"father_lastname\":\"Olmillo\",\"father_suffix\":\"\",\"mother_firstname\":\"Ubecriss\",\"mother_middlename\":\"\",\"mother_lastname\":\"Egao\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"50\",\"godparents\":\"Cherry Marie Puson, Jonalith Pontonial\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 09:50:14', '2021-08-11 16:50:14', '2021-08-11 16:50:14'),
(57, 'Kend Slater', 'U.', 'Paran', NULL, 'baptism', 3, '{\"born_on\":\"4\\/21\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Kenard \",\"father_middlename\":\"V. \",\"father_lastname\":\"Paran\",\"father_suffix\":\"\",\"mother_firstname\":\"Kirstenver\",\"mother_middlename\":\"L. \",\"mother_lastname\":\"Urquiza\",\"mother_suffix\":\"\",\"resident_of\":\"Lipata, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"51\",\"godparents\":\"\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 09:55:04', '2021-08-11 16:55:04', '2021-08-11 16:55:04'),
(58, 'Shantal', 'B.', 'Partosa', NULL, 'baptism', 3, '{\"born_on\":\"4\\/19\\/2019\",\"born_in\":\"CBHC, Angeles City, Pampanga \",\"father_firstname\":\"Victor\",\"father_middlename\":\"S. \",\"father_lastname\":\"Partosa\",\"father_suffix\":\"\",\"mother_firstname\":\"Rochie\",\"mother_middlename\":\"C. \",\"mother_lastname\":\"Bastona\",\"mother_suffix\":\"\",\"resident_of\":\"Tungkil, Minglanilla, cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"52\",\"godparents\":\"Felix Albarida, Lucia Maspara\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:02:37', '2021-08-11 17:02:37', '2021-08-11 17:02:37'),
(59, 'Jay Lance', 'N.', 'Rodriguez', NULL, 'baptism', 3, '{\"born_on\":\"10\\/1\\/2020\",\"born_in\":\"OBH, Pob. City of Naga, Cebu\",\"father_firstname\":\"Linly \",\"father_middlename\":\"Q. \",\"father_lastname\":\"Rodriguez \",\"father_suffix\":\"\",\"mother_firstname\":\"Maria Ginna \",\"mother_middlename\":\"L. \",\"mother_lastname\":\"Neme\\u00f1o\",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"53\",\"godparents\":\"Rene T. Paculanang, Asterio S. Tundag Jr. \",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:11:52', '2021-08-11 17:11:52', '2021-08-11 17:11:52'),
(60, 'Wendil', 'G.', 'Sardual', 'Jr.', 'baptism', 3, '{\"born_on\":\"6\\/16\\/2020\",\"born_in\":\"MDH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Wendil\",\"father_middlename\":\"J.\",\"father_lastname\":\"Sardual\",\"father_suffix\":\"\",\"mother_firstname\":\"Leahlie\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Grafil\",\"mother_suffix\":\"\",\"resident_of\":\"Tungkil, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"54\",\"godparents\":\"Kyle Hernandez, Robin Lopez\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:16:19', '2021-08-11 17:16:19', '2021-08-11 17:16:19'),
(61, 'Dave Angelo', 'V.', 'Selgas', NULL, 'baptism', 3, '{\"born_on\":\"10/20/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Alex \",\"father_middlename\":\"A. \",\"father_lastname\":\"Selgas\",\"father_suffix\":\"\",\"mother_firstname\":\"Jo-an \",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Villeta\",\"mother_suffix\":\"\",\"resident_of\":\"Camarin Vito, Minglanilla, Cebu\",\"baptism_date\":\"11/29/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Riza Zuny Zamora,Tommy Taping\",\"baptismal_register\":\"55\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 10:24:46', '2021-08-11 17:24:46', '2021-08-11 09:55:14'),
(62, 'Sofia Mae', 'P.', 'Selloria', NULL, 'baptism', 3, '{\"born_on\":\"10\\/17\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Daryl\",\"father_middlename\":\"D. \",\"father_lastname\":\"Selloria\",\"father_suffix\":\"\",\"mother_firstname\":\"Erica\",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Paran\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"56\",\"godparents\":\"Norvin Selloria, Kimberlly Villeta\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:27:47', '2021-08-11 17:27:47', '2021-08-11 17:27:47'),
(63, 'Jayru Smith', 'P.', 'Sabellano', NULL, 'baptism', 3, '{\"born_on\":\"11\\/2\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Michael\",\"father_middlename\":\"I. \",\"father_lastname\":\"Sabellano\",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Marlyn\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Pangandoyon \",\"mother_suffix\":\"\",\"resident_of\":\"Tungkil, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"57\",\"godparents\":\"Aycee Layese, Michael Albao\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:40:55', '2021-08-11 17:40:55', '2021-08-11 17:40:55'),
(64, 'Chanise', NULL, 'Tampus', NULL, 'baptism', 3, '{\"born_on\":\"11\\/9\\/2020\",\"born_in\":\"Vito, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Michelle \",\"mother_middlename\":\"E. \",\"mother_lastname\":\"Tampus\",\"mother_suffix\":\"\",\"resident_of\":\"Bacay, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"58\",\"godparents\":\"Domenic Gempesao, Gina Almaquer\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:46:12', '2021-08-11 17:46:12', '2021-08-11 17:46:12'),
(65, 'Ven Kaizen', 'P.', 'Tolentino', NULL, 'baptism', 3, '{\"born_on\":\"10\\/31\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Kim Gary \",\"father_middlename\":\"A. \",\"father_lastname\":\"Tolentino\",\"father_suffix\":\"\",\"mother_firstname\":\"Shiela \",\"mother_middlename\":\"S, \",\"mother_lastname\":\"Putot\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr, Roy D. Bucag\",\"baptismal_register\":\"59\",\"godparents\":\"Jimmy Potot, Josamiya Arabis\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:54:19', '2021-08-11 17:54:19', '2021-08-11 17:54:19'),
(66, 'Laurice Jane', NULL, 'Trocio', NULL, 'baptism', 3, '{\"born_on\":\"12\\/3\\/2019\",\"born_in\":\"MDH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Juvelyn \",\"mother_middlename\":\"B. \",\"mother_lastname\":\"Trocio\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"60\",\"godparents\":\"John Bert Magbanua, Rachel Ann Magbanua \",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 10:59:29', '2021-08-11 17:59:29', '2021-08-11 17:59:29'),
(67, 'James Amber', 'A.', 'Villondo', NULL, 'baptism', 3, '{\"born_on\":\"10\\/8\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Romar \",\"father_middlename\":\"B. \",\"father_lastname\":\"Villondo\",\"father_suffix\":\"\",\"mother_firstname\":\"Mylene\",\"mother_middlename\":\"R. \",\"mother_lastname\":\"Abacahan\",\"mother_suffix\":\"\",\"resident_of\":\"Pakigne, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"61\",\"godparents\":\"KC Empinado, Anthony Jabellana\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 11:16:53', '2021-08-11 18:16:53', '2021-08-11 18:16:53'),
(68, 'Aiden Zyaire', 'V.', 'De Venencia', NULL, 'baptism', 3, '{\"born_on\":\"9\\/5\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Christian \",\"father_middlename\":\"R. \",\"father_lastname\":\"De Venencia\",\"father_suffix\":\"\",\"mother_firstname\":\"Analy \",\"mother_middlename\":\"C. \",\"mother_lastname\":\"Vaflor\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"62\",\"godparents\":\"Shaira Jean Lapasaran, Mark Edizon Marquita\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 11:21:10', '2021-08-11 18:21:10', '2021-08-11 18:21:10'),
(69, 'Mary Queen', 'V.', 'Villondo', NULL, 'baptism', 3, '{\"born_on\":\"5\\/5\\/2020\",\"born_in\":\"MMCBH Co., Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Michael \",\"father_middlename\":\"C. \",\"father_lastname\":\"Villondo\",\"father_suffix\":\"\",\"mother_firstname\":\"Jhonalyn\",\"mother_middlename\":\"R. \",\"mother_lastname\":\"Vicente\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Tulay, MInglanilla, Cebu \",\"baptism_date\":\"11\\/29\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D Bucag\",\"baptismal_register\":\"63\",\"godparents\":\"Bernadith P. Avila, Norman Villondo\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 11:35:11', '2021-08-11 18:35:11', '2021-08-11 18:35:11'),
(70, 'Zha Via Mae', NULL, 'Ababon', NULL, 'baptism', 4, '{\"born_on\":\"10/1/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Remia Richelle\",\"mother_middlename\":\"T. \",\"mother_lastname\":\"Ababon\",\"mother_suffix\":\"\",\"resident_of\":\"Cadulawan, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Christine Mo-ambong, Mera Ababon\",\"baptismal_register\":\"64\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 11:43:29', '2021-08-11 18:43:29', '2021-08-11 10:55:03'),
(71, 'Nichole', 'A.', 'Almaden', NULL, 'baptism', 4, '{\"born_on\":\"10\\/16\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Tito\",\"father_middlename\":\"E. \",\"father_lastname\":\"Almaden\",\"father_suffix\":\"\",\"mother_firstname\":\"Rechilda\",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Artiaga\",\"mother_suffix\":\"\",\"resident_of\":\"Tungkil, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"65\",\"godparents\":\"Kyle Anthony Rizon, Faye Ann Almaden\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 11:54:25', '2021-08-11 18:54:25', '2021-08-11 18:54:25'),
(72, 'Rahmge Noah', 'A.', 'Bersales', NULL, 'baptism', 4, '{\"born_on\":\"8/31/2020\",\"born_in\":\"BMC, Ward II,Minglanilla, Cebu\",\"father_firstname\":\"Jerahmeel \",\"father_middlename\":\"C. \",\"father_lastname\":\"Bersales\",\"father_suffix\":\"\",\"mother_firstname\":\"Germalyn \",\"mother_middlename\":\"B. \",\"mother_lastname\":\"Ababon\",\"mother_suffix\":\"\",\"resident_of\":\"Pob. Ward III, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong \",\"godparents\":\"Maris Abalayan, Khenneth Ellunado\",\"baptismal_register\":\"66\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 12:01:37', '2021-08-11 19:01:37', '2021-08-11 11:06:48'),
(73, 'Kleisha Marrie', 'E.', 'Bihag', NULL, 'baptism', 4, '{\"born_on\":\"9\\/3\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Geraldo \",\"father_middlename\":\"C. \",\"father_lastname\":\"Bihag\",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Blainey Kleisa\",\"mother_middlename\":\"R. \",\"mother_lastname\":\"Etol \",\"mother_suffix\":\"\",\"resident_of\":\"Bacay Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"67\",\"godparents\":\"Margie Demicillo, Jason Prandas\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 12:06:26', '2021-08-11 19:06:26', '2021-08-11 19:06:26'),
(74, 'Jornsen', 'M.', 'Cañizares', 'Jr.', 'baptism', 4, '{\"born_on\":\"4\\/13\\/2020\",\"born_in\":\"TDH, San Isidro,Talisay City, Cebu\",\"father_firstname\":\"Jornsen\",\"father_middlename\":\"B. \",\"father_lastname\":\"Ca\\u00f1izares\",\"father_suffix\":\"\",\"mother_firstname\":\"Merlyn \",\"mother_middlename\":\"T. \",\"mother_lastname\":\"Margallo\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Bayong, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B.Jecong\",\"baptismal_register\":\"68\",\"godparents\":\"Riza MacDonald, Richard Yongco\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 12:14:14', '2021-08-11 19:14:14', '2021-08-11 19:14:14');
INSERT INTO `certificates` (`id`, `firstname`, `middlename`, `lastname`, `suffix`, `certificate_type`, `priest_id`, `meta`, `is_deleted`, `created_by`, `created_date`, `created_at`, `updated_at`) VALUES
(75, 'Leila Ria', 'A.', 'Cañizares', NULL, 'baptism', 4, '{\"born_on\":\"11\\/2\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Moriesco\",\"father_middlename\":\"B. \",\"father_lastname\":\"Ca\\u00f1izares\",\"father_suffix\":\"\",\"mother_firstname\":\"Lanie \",\"mother_middlename\":\"L. \",\"mother_lastname\":\"Apuhin\",\"mother_suffix\":\"\",\"resident_of\":\"Cadulawan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"69\",\"godparents\":\"Arturo Alforque, Menchu Ca\\u00f1izares\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 13:49:33', '2021-08-11 20:49:33', '2021-08-11 20:49:33'),
(76, 'Salshiele', 'D.', 'Catubay', NULL, 'baptism', 4, '{\"born_on\":\"4\\/15\\/2020\",\"born_in\":\"TDH, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Salvador \",\"father_middlename\":\"G. \",\"father_lastname\":\"Catubay\",\"father_suffix\":\"\",\"mother_firstname\":\"Bleshiele\",\"mother_middlename\":\"\",\"mother_lastname\":\"Demecillo\",\"mother_suffix\":\"\",\"resident_of\":\"Bayong Cadulawan, MInglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"70\",\"godparents\":\"Analyn Catubay, Gemela Branzuela\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 13:52:54', '2021-08-11 20:52:54', '2021-08-11 20:52:54'),
(77, 'Kyng', NULL, 'Caramihan', NULL, 'baptism', 4, '{\"born_on\":\"11\\/4\\/2020\",\"born_in\":\"MMCBH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Geraldine\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Caramihan\",\"mother_suffix\":\"\",\"resident_of\":\"Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric Jecong\",\"baptismal_register\":\"71\",\"godparents\":\"Raissa Ann Laspo\\u00f1a, Vivian Pasion\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 13:56:20', '2021-08-11 20:56:20', '2021-08-11 20:56:20'),
(78, 'Juan Daniel', 'S.', 'Daños', NULL, 'baptism', 4, '{\"born_on\":\"4\\/3\\/2020\",\"born_in\":\"SLM, Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Jiebel Mark\",\"father_middlename\":\"G. \",\"father_lastname\":\"Da\\u00f1os\",\"father_suffix\":\"\",\"mother_firstname\":\"Cassiopeia\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Seromines\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"72\",\"godparents\":\"Leneth Villoria, Cyril Pacilan\",\"volume\":\"96\",\"page\":\"003\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 14:04:35', '2021-08-11 21:04:35', '2021-08-11 21:04:35'),
(79, 'Amarah', 'D.', 'Delsocorro', NULL, 'baptism', 4, '{\"born_on\":\"9/16/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Junbel \",\"father_middlename\":\"N. \",\"father_lastname\":\"Delsocorro\",\"father_suffix\":\"\",\"mother_firstname\":\"Angel\",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Dejan\",\"mother_suffix\":\"\",\"resident_of\":\"Tubod, Minglanilla Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr, Eric B. Jecong\",\"godparents\":\"Ethel Dejan, Jenelle Mae Alcuizar\",\"baptismal_register\":\"73\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 14:22:18', '2021-08-11 21:22:18', '2021-08-11 13:22:37'),
(80, 'Catherine Rose', 'P.', 'De Vera', NULL, 'baptism', 4, '{\"born_on\":\"11\\/13\\/2020\",\"born_in\":\"SLM, Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Jaymar \",\"father_middlename\":\"A. \",\"father_lastname\":\"De Vera \",\"father_suffix\":\"\",\"mother_firstname\":\"Anne Therese \",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Pagusara\",\"mother_suffix\":\"\",\"resident_of\":\"Ward IV, MInglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong \",\"baptismal_register\":\"74\",\"godparents\":\"Britney Kathleen Tabada, Erwin Villaflor\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 14:27:32', '2021-08-11 21:27:32', '2021-08-11 21:27:32'),
(81, 'Kyle Lowry', NULL, 'Disu', NULL, 'baptism', 4, '{\"born_on\":\"6\\/18\\/2019\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Marilou \",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Disu\",\"mother_suffix\":\"\",\"resident_of\":\"Vito Acoy, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"75\",\"godparents\":\"Jameson A\\u00f1asco, Jenelyn Sellon\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 14:33:31', '2021-08-11 21:33:31', '2021-08-11 21:33:31'),
(82, 'Gyle Noah', NULL, 'Geonzon', NULL, 'baptism', 4, '{\"born_on\":\"9/2/2020\",\"born_in\":\"BMC, Ward II, MInglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Hanna Mae\",\"mother_middlename\":\"M. \",\"mother_lastname\":\"Geonzon\",\"mother_suffix\":\"\",\"resident_of\":\"Tubod, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Jayson Estrada, Rhea Bastida\",\"baptismal_register\":\"76\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 14:39:27', '2021-08-11 21:39:27', '2021-08-11 13:39:45'),
(83, 'Astherielle Kaylee', 'P.', 'Gempisao', NULL, 'baptism', 4, '{\"born_on\":\"10/18/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Franpe \",\"father_middlename\":\"R. \",\"father_lastname\":\"Gempisao \",\"father_suffix\":\"\",\"mother_firstname\":\"Noradel \",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Pamada\",\"mother_suffix\":\"\",\"resident_of\":\"Bacay Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Dominic Natividad, Florime Sellote\",\"baptismal_register\":\"77\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 14:47:03', '2021-08-11 21:47:03', '2021-08-11 13:47:38'),
(84, 'Chrisantha', 'V.', 'Lariosa', NULL, 'baptism', 4, '{\"born_on\":\"10/31/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Jhon Kerl \",\"father_middlename\":\"S. \",\"father_lastname\":\"Lariosa\",\"father_suffix\":\"\",\"mother_firstname\":\"Christy \",\"mother_middlename\":\"M. \",\"mother_lastname\":\"Villamor\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Florime Sellote, Jay Steven P. Isok\",\"baptismal_register\":\"78\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-11 15:06:13', '2021-08-11 22:06:13', '2021-08-11 14:20:25'),
(85, 'Eivind', 'L.', 'Librea', NULL, 'baptism', 4, '{\"born_on\":\"10\\/3\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Aldrin\",\"father_middlename\":\"B. \",\"father_lastname\":\"Librea\",\"father_suffix\":\"\",\"mother_firstname\":\"Jenalyn \",\"mother_middlename\":\"M. \",\"mother_lastname\":\"Lazaga\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"79\",\"godparents\":\"Eunice Suan, Rico Jay Bastatas\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 15:41:16', '2021-08-11 22:41:16', '2021-08-11 22:41:16'),
(86, 'Chantelle Avery', 'A.', 'Lim', NULL, 'baptism', 4, '{\"born_on\":\"9\\/22\\/2020\",\"born_in\":\"GRO Inc. Basak, Cebu City\",\"father_firstname\":\"Charlton \",\"father_middlename\":\"L. \",\"father_lastname\":\"Lim\",\"father_suffix\":\"\",\"mother_firstname\":\"Floramie\",\"mother_middlename\":\"E. \",\"mother_lastname\":\"Amancio\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, MInglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"80\",\"godparents\":\"Riza See, Warren Baguio\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-11 15:46:42', '2021-08-11 22:46:42', '2021-08-11 22:46:42'),
(87, 'Catriona Athaliah', 'C.', 'Longno', NULL, 'baptism', 4, '{\"born_on\":\"1\\/12\\/2020\",\"born_in\":\"SLM, Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Jan Michael\",\"father_middlename\":\"C. \",\"father_lastname\":\"Longno\",\"father_suffix\":\"\",\"mother_firstname\":\"Jakylou\",\"mother_middlename\":\"C. \",\"mother_lastname\":\"Cantanao\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"81\",\"godparents\":\"Junex Aliporo, Ma. Paz Vergara\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 08:46:22', '2021-08-12 15:46:22', '2021-08-12 15:46:22'),
(88, 'Phyxus Grey', 'S.', 'Miñoza', NULL, 'baptism', 4, '{\"born_on\":\"8\\/16\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Pablo\",\"father_middlename\":\"E. \",\"father_lastname\":\"Mi\\u00f1oza \",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Teresita\",\"mother_middlename\":\"Q. \",\"mother_lastname\":\"Sanchez\",\"mother_suffix\":\"\",\"resident_of\":\"Tubod, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"82\",\"godparents\":\"Clarisa Caparida, Ronald Gelaga\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 08:51:25', '2021-08-12 15:51:25', '2021-08-12 15:51:25'),
(89, 'Justine Ryker', 'A.', 'Montemor', NULL, 'baptism', 4, '{\"born_on\":\"9\\/22\\/2020\",\"born_in\":\"BMC, Pob. Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Justine\",\"father_middlename\":\"V. \",\"father_lastname\":\"Montemor\",\"father_suffix\":\"\",\"mother_firstname\":\"Renalyn\",\"mother_middlename\":\"M. \",\"mother_lastname\":\"Abesia \",\"mother_suffix\":\"\",\"resident_of\":\"Upper Linao, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"83\",\"godparents\":\"Charlie Gueva, Jonalyn Manayon\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 09:04:10', '2021-08-12 16:04:10', '2021-08-12 16:04:10'),
(90, 'Christian Jay', 'L.', 'Navaja', NULL, 'baptism', 3, '{\"born_on\":\"12/24/2019\",\"born_in\":\"MDH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Joseph\",\"father_middlename\":\"O. \",\"father_lastname\":\"Navaja\",\"father_suffix\":\"\",\"mother_firstname\":\"Christina\",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Lareta\",\"mother_suffix\":\"\",\"resident_of\":\"Bayong Cadulawan, Minglanilla, Cebu\",\"baptism_date\":\"12/24/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Zoraida Geolleque, Jeffrey Chandler\",\"baptismal_register\":\"84\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:08:40', '2021-08-12 16:08:40', '2021-08-12 08:08:53'),
(91, 'Gwyneth', 'A.', 'Olavides', NULL, 'baptism', 4, '{\"born_on\":\"8/28/2020\",\"born_in\":\"BGBLC, Quezon City, Metro Manila\",\"father_firstname\":\"Adriane\",\"father_middlename\":\"J. \",\"father_lastname\":\"Olavides\",\"father_suffix\":\"\",\"mother_firstname\":\"Bernadeth \",\"mother_middlename\":\"\",\"mother_lastname\":\"Adelan\",\"mother_suffix\":\"\",\"resident_of\":\"Cadulawan, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Daniel Padilla, Edwin Español\",\"baptismal_register\":\"85\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:11:09', '2021-08-12 16:11:09', '2021-08-12 08:51:18'),
(92, 'Jenniah Thaniah', 'A.', 'Opeña', NULL, 'baptism', 4, '{\"born_on\":\"9/22/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Edward \",\"father_middlename\":\"M. \",\"father_lastname\":\"Opeña\",\"father_suffix\":\"\",\"mother_firstname\":\"Jeanette \",\"mother_middlename\":\"U. \",\"mother_lastname\":\"Amajado\",\"mother_suffix\":\"\",\"resident_of\":\"Vito Ugoy, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Julcris Andebor, Michelle Amajado\",\"baptismal_register\":\"86\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:18:00', '2021-08-12 16:18:00', '2021-08-12 08:51:45'),
(93, 'Xian Dean', 'S.', 'Paglinawan', NULL, 'baptism', 4, '{\"born_on\":\"9/28/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Jigie\",\"father_middlename\":\"R. \",\"father_lastname\":\"Paglinawan\",\"father_suffix\":\"\",\"mother_firstname\":\"Danielyn \",\"mother_middlename\":\"T. \",\"mother_lastname\":\"Sameon\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Marjorie Quijano, Rollynde Pasaylo\",\"baptismal_register\":\"87\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:23:35', '2021-08-12 16:23:35', '2021-08-12 08:52:25'),
(94, 'Ziggy Chris', 'M.', 'Porgal', NULL, 'baptism', 4, '{\"born_on\":\"3/24/2020\",\"born_in\":\"CPCMH Inc., Cebu City\",\"father_firstname\":\"Marvie\",\"father_middlename\":\"P. \",\"father_lastname\":\"Porgal \",\"father_suffix\":\"\",\"mother_firstname\":\"Crisel \",\"mother_middlename\":\"Kaye \",\"mother_lastname\":\"S. Manacao\",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Carmeline Andaya, Jeran Bolo\",\"baptismal_register\":\"88\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:26:45', '2021-08-12 16:26:45', '2021-08-12 08:55:11'),
(95, 'Chein', 'A.', 'Racho', NULL, 'baptism', 4, '{\"born_on\":\"2/11/2020\",\"born_in\":\"OBH, Pob. City of Naga, Cebu\",\"father_firstname\":\"Joel \",\"father_middlename\":\"P. \",\"father_lastname\":\"Racho\",\"father_suffix\":\"\",\"mother_firstname\":\"Cherry\",\"mother_middlename\":\"G.\",\"mother_lastname\":\"Abalayan\",\"mother_suffix\":\"\",\"resident_of\":\"Tagaytay Vito, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Lenie Rose Ponse, Marilyn Racho\",\"baptismal_register\":\"89\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:29:58', '2021-08-12 16:29:58', '2021-08-12 08:50:43'),
(96, 'Sonia Zein', NULL, 'Rico', NULL, 'baptism', 4, '{\"born_on\":\"6/5/2020\",\"born_in\":\"MDH, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Ann Sheilla\",\"mother_middlename\":\"P.\",\"mother_lastname\":\"Rico\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Arlene Erediano, Jerome Dologuin\",\"baptismal_register\":\"90\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:37:59', '2021-08-12 16:37:59', '2021-08-12 08:50:28'),
(97, 'Tom', 'L.', 'Stammberger', NULL, 'baptism', 4, '{\"born_on\":\"8/11/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Christian\",\"father_middlename\":\"\",\"father_lastname\":\"Stammberger\",\"father_suffix\":\"\",\"mother_firstname\":\"Rowena\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Layar\",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Pearlideth Layar, Marlon Patawaran\",\"baptismal_register\":\"91\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:41:43', '2021-08-12 16:41:43', '2021-08-12 08:49:43'),
(98, 'John David', 'C.', 'Unabia', NULL, 'baptism', 4, '{\"born_on\":\"10/10/2020\",\"born_in\":\"MGBH, Pob. I Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Roland \",\"father_middlename\":\"M. \",\"father_lastname\":\"Unabia\",\"father_suffix\":\"\",\"mother_firstname\":\"Sheila Marie \",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Cañedo\",\"mother_suffix\":\"\",\"resident_of\":\"Ward II, Minglanilla, Cebu\",\"baptism_date\":\"12/6/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"godparents\":\"Emelie Sabanal, Jerick Pilare\",\"baptismal_register\":\"92\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 09:45:01', '2021-08-12 16:45:01', '2021-08-12 08:49:30'),
(99, 'Maria Letezia', 'L.', 'Tango-an', NULL, 'baptism', 4, '{\"born_on\":\"10\\/11\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Bienvenido \",\"father_middlename\":\"H. \",\"father_lastname\":\"Tango-an\",\"father_suffix\":\" Jr. \",\"mother_firstname\":\"Emelia \",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Liugan\",\"mother_suffix\":\"\",\"resident_of\":\"Tagaytay Vito, Minglanilla, Cebu\",\"baptism_date\":\"12\\/6\\/2020\",\"baptism_minister\":\"Rev. Fr. Eric B. Jecong\",\"baptismal_register\":\"93\",\"godparents\":\"Eligio Tango-an, Victoria Reyes\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 09:49:10', '2021-08-12 16:49:10', '2021-08-12 16:49:10'),
(100, 'Josiah Vince', 'M.', 'Errua', NULL, 'baptism', 2, '{\"born_on\":\"9/17/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Virgilio\",\"father_middlename\":\"C. \",\"father_lastname\":\"Errua\",\"father_suffix\":\"\",\"mother_firstname\":\"Janely Paula\",\"mother_middlename\":\"B. \",\"mother_lastname\":\"Mateo\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"12/8/2020\",\"baptism_minister\":\"Rev. Fr. Joselito E. Danao\",\"godparents\":\"Ceres Edillo, Elmer Rodriguez\",\"baptismal_register\":\"94\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 10:01:28', '2021-08-12 17:01:28', '2021-08-12 09:14:52'),
(101, 'Jacc Aj', 'B.', 'Badayos', NULL, 'baptism', 5, '{\"born_on\":\"9\\/22\\/2020\",\"born_in\":\"SAMCH, Basak San Nicolas, Cebu City\",\"father_firstname\":\"Aurelio\",\"father_middlename\":\"L. \",\"father_lastname\":\"Badayos\",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Carmensita \",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Barequit \",\"mother_suffix\":\"\",\"resident_of\":\"Sangi Calajo-an, Minglanilla, Cebu \",\"baptism_date\":\"12\\/12\\/2020\",\"baptism_minister\":\"Rev. Fr. Joselito E. Danao\",\"baptismal_register\":\"95\",\"godparents\":\"Lucel Bariquit, Willy Fabian\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 10:07:43', '2021-08-12 17:07:43', '2021-08-12 17:07:43'),
(102, 'Jagari Vicci', 'O.', 'Getuaban', NULL, 'baptism', 5, '{\"born_on\":\"10\\/25\\/2020\",\"born_in\":\"MMCBH Co., Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"James Gerald \",\"father_middlename\":\"M. \",\"father_lastname\":\"Getuaban\",\"father_suffix\":\"\",\"mother_firstname\":\"Vincy \",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Orbeta\",\"mother_suffix\":\"\",\"resident_of\":\"Abuno Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/12\\/2020\",\"baptism_minister\":\"Rev. Fr. Joselito E. Danao\",\"baptismal_register\":\"96\",\"godparents\":\"Ythel Sinangote, France Ian Sinajon\",\"volume\":\"96\",\"page\":\"004\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 10:14:28', '2021-08-12 17:14:28', '2021-08-12 17:14:28'),
(103, 'Aisha Niña', 'C.', 'Go', NULL, 'baptism', 9, '{\"born_on\":\"10\\/9\\/2020\",\"born_in\":\"UCMC, Mandaue City, Cebu\",\"father_firstname\":\"Kelvin \",\"father_middlename\":\"B. \",\"father_lastname\":\"Go\",\"father_suffix\":\"\",\"mother_firstname\":\"Leizel \",\"mother_middlename\":\" V. \",\"mother_lastname\":\"Cabarado\",\"mother_suffix\":\"\",\"resident_of\":\"Tiber, Ward I, Minglanilla, Cebu\",\"baptism_date\":\"12\\/12\\/2020\",\"baptism_minister\":\"Rev. Fr. Russdel Noel\",\"baptismal_register\":\"97\",\"godparents\":\"Joshua Bengil, Jaila Marie Marquez\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 10:24:41', '2021-08-12 17:24:41', '2021-08-12 17:24:41'),
(104, 'Matthias Gregory', 'S.', 'Pitoc', NULL, 'baptism', 3, '{\"born_on\":\"2\\/5\\/2020\",\"born_in\":\"CVGH, F. Ramos St., Cebu City\",\"father_firstname\":\"Larry \",\"father_middlename\":\"\",\"father_lastname\":\"Pitoc \",\"father_suffix\":\"\",\"mother_firstname\":\"Bunny Lou \",\"mother_middlename\":\"C. \",\"mother_lastname\":\"Salipang\",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12\\/12\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"98\",\"godparents\":\"Bobby John D. Zosa, Rodette R. Zosa\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 10:32:11', '2021-08-12 17:32:11', '2021-08-12 17:32:11'),
(105, 'Reese Zyra', 'A.', 'Abano', NULL, 'baptism', 3, '{\"born_on\":\"10/27/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Jonathan \",\"father_middlename\":\"F. \",\"father_lastname\":\"Abano \",\"father_suffix\":\"\",\"mother_firstname\":\"Jeramae \",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Alipar\",\"mother_suffix\":\"\",\"resident_of\":\"Camarin Vito, Minglanilla, Cebu\",\"baptism_date\":\"12/13/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Rizza Mae Alvarda, Emmanuel Alipar\",\"baptismal_register\":\"99\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 10:51:25', '2021-08-12 17:51:25', '2021-08-12 09:58:24'),
(106, 'Aoi Autumn', 'C.', 'Alidon', NULL, 'baptism', 3, '{\"born_on\":\"6/29/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Fulgencio \",\"father_middlename\":\"R. \",\"father_lastname\":\"Alidon \",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Junelyn Marie\",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Cipres\",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12/13/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"godparents\":\"Jennifer Feidican, Genald Bernel\",\"baptismal_register\":\"100\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-12 10:53:20', '2021-08-12 17:53:20', '2021-08-12 09:58:06'),
(107, 'Princess Bethany', 'V.', 'Anonsa-on', NULL, 'baptism', 3, '{\"born_on\":\"7\\/26\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Remmel\",\"father_middlename\":\"B. \",\"father_lastname\":\"Anonsa-on\",\"father_suffix\":\"\",\"mother_firstname\":\"Neserme\",\"mother_middlename\":\"L. \",\"mother_lastname\":\"Veraces\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"101\",\"godparents\":\"Jolex Pepito, Daisy Ranises\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 11:02:47', '2021-08-12 18:02:47', '2021-08-12 18:02:47'),
(108, 'Jolly Chris', 'R.', 'Arranguez', NULL, 'baptism', 3, '{\"born_on\":\"7\\/16\\/2019\",\"born_in\":\"TDH, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Christopher \",\"father_middlename\":\"G. \",\"father_lastname\":\"Arranguez\",\"father_suffix\":\"\",\"mother_firstname\":\"Juvy\",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Repuela\",\"mother_suffix\":\"\",\"resident_of\":\"Pakigne, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"102\",\"godparents\":\"Julie An Gisanan, Jhon Cawale\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 11:25:53', '2021-08-12 18:25:53', '2021-08-12 18:25:53'),
(109, 'Kleah Jane', 'A.', 'Avila', NULL, 'baptism', 3, '{\"born_on\":\"11\\/22\\/2019\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Benjie\",\"father_middlename\":\"Y. \",\"father_lastname\":\"Avila\",\"father_suffix\":\"\",\"mother_firstname\":\"Cecilia\",\"mother_middlename\":\"G. \",\"mother_lastname\":\"Ababon\",\"mother_suffix\":\"\",\"resident_of\":\"Cadulawan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"103\",\"godparents\":\"Rey Y. Avila, Donna A. Joyo\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 11:29:15', '2021-08-12 18:29:15', '2021-08-12 18:29:15'),
(110, 'Kendrick', 'C.', 'Baculi', NULL, 'baptism', 3, '{\"born_on\":\"10\\/1\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Federico \",\"father_middlename\":\"R.\",\"father_lastname\":\"Baculi\",\"father_suffix\":\"\",\"mother_firstname\":\"Nelia\",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Caballero \",\"mother_suffix\":\"\",\"resident_of\":\"Pob. WardIV, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"104\",\"godparents\":\"Lucena Gornez, Charniel Payac\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 13:52:15', '2021-08-12 20:52:15', '2021-08-12 20:52:15'),
(111, 'Lawrence Gideon', 'P.', 'Bation', NULL, 'baptism', 3, '{\"born_on\":\"9\\/13\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Richel \",\"father_middlename\":\"P. \",\"father_lastname\":\"Bation\",\"father_suffix\":\"\",\"mother_firstname\":\"Jovilyn\",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Panonce\",\"mother_suffix\":\"\",\"resident_of\":\"Lower Lipata, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"105\",\"godparents\":\"Mercilita J. Calipay, Reybeth Opiar\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 13:59:28', '2021-08-12 20:59:28', '2021-08-12 20:59:28'),
(112, 'Janine', 'H.', 'Bastida', NULL, 'baptism', 3, '{\"born_on\":\"7\\/13\\/2020\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"Junneil \",\"father_middlename\":\"D. \",\"father_lastname\":\"Bastida\",\"father_suffix\":\"\",\"mother_firstname\":\"Abelinda\",\"mother_middlename\":\"\",\"mother_lastname\":\"Hornada\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"106\",\"godparents\":\"Ernesto Plando, Jessa Vic Hornada\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:14:41', '2021-08-12 21:14:41', '2021-08-12 21:14:41'),
(113, 'Jemo Kim', 'P.', 'Bastida', NULL, 'baptism', 3, '{\"born_on\":\"11\\/15\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Jefferson\",\"father_middlename\":\"R. \",\"father_lastname\":\"Bastida\",\"father_suffix\":\"\",\"mother_firstname\":\"Cecil\",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Peges\",\"mother_suffix\":\"\",\"resident_of\":\"Ugoy Vito, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"107\",\"godparents\":\"Jemar Pegis, Gerlie Madrid\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:18:15', '2021-08-12 21:18:15', '2021-08-12 21:18:15'),
(114, 'Chloe Naomi', 'J.', 'Blateria', NULL, 'baptism', 3, '{\"born_on\":\"8\\/25\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Francis\",\"father_middlename\":\"C. \",\"father_lastname\":\"Blateria\",\"father_suffix\":\"\",\"mother_firstname\":\"Ma. Theresa\",\"mother_middlename\":\"\",\"mother_lastname\":\"Jesura\",\"mother_suffix\":\"\",\"resident_of\":\"Pinggan Pakigne, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"108\",\"godparents\":\"Nathaniel Aurestila, Honey Blateria\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:22:29', '2021-08-12 21:22:29', '2021-08-12 21:22:29'),
(115, 'Krysa Jane', 'G.', 'Cabiles', NULL, 'baptism', 3, '{\"born_on\":\"9\\/25\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Argie\",\"father_middlename\":\"\",\"father_lastname\":\"Cabiles\",\"father_suffix\":\"\",\"mother_firstname\":\"Agnes\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Godornes\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"109\",\"godparents\":\"Jenia P. Casta\\u00f1ares, Glenn Alfante\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:28:27', '2021-08-12 21:28:27', '2021-08-12 21:28:27'),
(116, 'Nethan', 'B.', 'Calunod', NULL, 'baptism', 3, '{\"born_on\":\"12\\/1\\/2019\",\"born_in\":\"TDH, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Arnel \",\"father_middlename\":\"T. \",\"father_lastname\":\"Calunod\",\"father_suffix\":\"\",\"mother_firstname\":\"Femar\",\"mother_middlename\":\"E. \",\"mother_lastname\":\"Bangquiao\",\"mother_suffix\":\"\",\"resident_of\":\"Ward II, Minglani;;a, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"110\",\"godparents\":\"Rodelito Pablio, Maria Nery Laurente\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:31:54', '2021-08-12 21:31:54', '2021-08-12 21:31:54'),
(117, 'Ivanna', NULL, 'Camingawan', NULL, 'baptism', 3, '{\"born_on\":\"4\\/10\\/2020\",\"born_in\":\"MDH, Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Antonia\",\"mother_middlename\":\"G. \",\"mother_lastname\":\"Camingawan\",\"mother_suffix\":\"\",\"resident_of\":\"Tagaytay Vito, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"111\",\"godparents\":\"Charmioe Deiparine, Gino Camingawan\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:35:19', '2021-08-12 21:35:19', '2021-08-12 21:35:19'),
(118, 'Dexter Jake', 'V.', 'Carpio', NULL, 'baptism', 3, '{\"born_on\":\"10\\/24\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Melbert \",\"father_middlename\":\"M. \",\"father_lastname\":\"Carpio\",\"father_suffix\":\"\",\"mother_firstname\":\"Hazel \",\"mother_middlename\":\"R. \",\"mother_lastname\":\"Villarin\",\"mother_suffix\":\"\",\"resident_of\":\"Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"112\",\"godparents\":\"Merry Cris Betache, Noel Razo\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:40:52', '2021-08-12 21:40:52', '2021-08-12 21:40:52'),
(119, 'Alaia Zahara', 'D.', 'Cuizon', NULL, 'baptism', 3, '{\"born_on\":\"8\\/31\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Mark Junry \",\"father_middlename\":\"U. \",\"father_lastname\":\"Unabia\",\"father_suffix\":\"\",\"mother_firstname\":\"Princes Joy\",\"mother_middlename\":\"\",\"mother_lastname\":\"Daban\",\"mother_suffix\":\"\",\"resident_of\":\"Tungkil, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"113\",\"godparents\":\"Jason France Timoteo, Nova Baynosa\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:44:06', '2021-08-12 21:44:06', '2021-08-12 21:44:06'),
(120, 'Nile Amaris Violet', 'S.', 'Delantar', NULL, 'baptism', 3, '{\"born_on\":\"9\\/26\\/2020\",\"born_in\":\"Countryside Village, Linao, Minglanilla, Cebu\",\"father_firstname\":\"Lionel Ray \",\"father_middlename\":\"L. \",\"father_lastname\":\"Delantar\",\"father_suffix\":\"\",\"mother_firstname\":\"Deneb Rose \",\"mother_middlename\":\"M. \",\"mother_lastname\":\"Saavedra\",\"mother_suffix\":\"\",\"resident_of\":\"Linao Lipata, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"114\",\"godparents\":\"Ria Mae Garcia, Regil Rodolf Saavedra \",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:52:25', '2021-08-12 21:52:25', '2021-08-12 21:52:25'),
(121, 'Jovielyn', 'E.', 'Dela Torre', NULL, 'baptism', 3, '{\"born_on\":\"3\\/6\\/2018\",\"born_in\":\"MPH, Masbate City, Masbate\",\"father_firstname\":\"Roberto\",\"father_middlename\":\"D. \",\"father_lastname\":\"Dela Torre \",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Rovielyn \",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Estriba\",\"mother_suffix\":\"\",\"resident_of\":\"Bacay Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"115\",\"godparents\":\"Marife Collamar, John Mark Besa\\u00f1ez\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 14:59:35', '2021-08-12 21:59:35', '2021-08-12 21:59:35'),
(122, 'John Ericks', 'E.', 'Dela Torre', NULL, 'baptism', 3, '{\"born_on\":\"1\\/21\\/2020\",\"born_in\":\"TDH, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Roberto \",\"father_middlename\":\"D. \",\"father_lastname\":\"Dela Torre \",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Rovelyn \",\"mother_middlename\":\"P. \",\"mother_lastname\":\"Estriba\",\"mother_suffix\":\"\",\"resident_of\":\"Bacay Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"116\",\"godparents\":\"Jeramde L.Handaya, Jena Resujento\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:03:51', '2021-08-12 22:03:51', '2021-08-12 22:03:51'),
(123, 'Yency Kate', 'G.', 'Fernandez', NULL, 'baptism', 3, '{\"born_on\":\"9\\/20\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"Jhon Dave\",\"father_middlename\":\"M. \",\"father_lastname\":\"Fernandez\",\"father_suffix\":\"\",\"mother_firstname\":\"Kathleen \",\"mother_middlename\":\"\",\"mother_lastname\":\"Gica\",\"mother_suffix\":\"\",\"resident_of\":\"Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"117\",\"godparents\":\"Genesis Cabastas, Sabrina Aranco\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:08:07', '2021-08-12 22:08:07', '2021-08-12 22:08:07'),
(124, 'Daevydrechie', 'C.', 'Gabuya', NULL, 'baptism', 3, '{\"born_on\":\"11\\/3\\/2020\",\"born_in\":\"MGBH, Pob. Ward I,  Minglanilla, Cebu\",\"father_firstname\":\"Rechie Albert\",\"father_middlename\":\"C. \",\"father_lastname\":\"Gabuya\",\"father_suffix\":\"\",\"mother_firstname\":\"Angelyn\",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Colaste\",\"mother_suffix\":\"\",\"resident_of\":\"Lipata, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"118\",\"godparents\":\"Rachel Galloso, Nelio Tumulak\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:16:07', '2021-08-12 22:16:07', '2021-08-12 22:16:07'),
(125, 'Dystiny Scarlett', 'E.', 'Mañacap', NULL, 'baptism', 3, '{\"born_on\":\"10\\/23\\/2020\",\"born_in\":\"YBC, Inayagan City of Naga, Cebu\",\"father_firstname\":\"Khenygie \",\"father_middlename\":\"M. \",\"father_lastname\":\"Ma\\u00f1acap\",\"father_suffix\":\"\",\"mother_firstname\":\"Ma. Ligaya\",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Espallardo\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Linao Lipata, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"119\",\"godparents\":\"Fatima M. Truz, Jerick Batitay\",\"volume\":\"96\",\"page\":\"005\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:24:14', '2021-08-12 22:24:14', '2021-08-12 22:24:14'),
(126, 'Zayd Gavin', 'B.', 'Misal', NULL, 'baptism', 3, '{\"born_on\":\"10\\/4\\/2020\",\"born_in\":\"DMC, Tunghaan, Minglanilla, Cebu\",\"father_firstname\":\"Khit John Ni\\u00f1o\",\"father_middlename\":\"D. \",\"father_lastname\":\"Misal\",\"father_suffix\":\"\",\"mother_firstname\":\"Bath Sheeba\",\"mother_middlename\":\"R. \",\"mother_lastname\":\"Birao\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"120\",\"godparents\":\"Greg Dabalos, Ednalyn Dabalos\",\"volume\":\"96\",\"page\":\"002\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:33:22', '2021-08-12 22:33:22', '2021-08-12 22:33:22'),
(127, 'Jarvis Daven', 'A.', 'Nebril', NULL, 'baptism', 3, '{\"born_on\":\"10\\/19\\/2020\",\"born_in\":\"MMCBH Co., Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Mark Alvin \",\"father_middlename\":\"V.\",\"father_lastname\":\"Nebril\",\"father_suffix\":\"\",\"mother_firstname\":\"Danica\",\"mother_middlename\":\"E. \",\"mother_lastname\":\"Alipin\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Pakigne, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"121\",\"godparents\":\"Marjorie Abella, Rechie Abatayo\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:46:55', '2021-08-12 22:46:55', '2021-08-12 22:46:55'),
(128, 'Jiuel Love', 'B.', 'Postrano', NULL, 'baptism', 3, '{\"born_on\":\"1\\/31\\/2020\",\"born_in\":\"Orlanes Clinic, City of Naga, Cebu\",\"father_firstname\":\"Jimmy\",\"father_middlename\":\"V. \",\"father_lastname\":\"Postrano\",\"father_suffix\":\"\",\"mother_firstname\":\"Raquel\",\"mother_middlename\":\"M. \",\"mother_lastname\":\"Borla\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"122\",\"godparents\":\"Vilma Flores, Elmer Gabon\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:54:43', '2021-08-12 22:54:43', '2021-08-12 22:54:43'),
(129, 'Zeign Aira Elizabeth', 'G.', 'Resgonia', NULL, 'baptism', 3, '{\"born_on\":\"6\\/3\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Clifford \",\"father_middlename\":\"S. \",\"father_lastname\":\"Resgonia\",\"father_suffix\":\"\",\"mother_firstname\":\"Lovelyn Grace \",\"mother_middlename\":\"C. \",\"mother_lastname\":\"Gako\",\"mother_suffix\":\"\",\"resident_of\":\"Ward III, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"123\",\"godparents\":\"Maria Teresa C. Aquino, Kent Robby Caraba\\u00f1a\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 15:59:10', '2021-08-12 22:59:10', '2021-08-12 22:59:10'),
(130, 'Nehemiah', NULL, 'Rico', NULL, 'baptism', 3, '{\"born_on\":\"12\\/7\\/2019\",\"born_in\":\"TDH, San Isidro, Talisay City, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Anna Rose\",\"mother_middlename\":\"C. \",\"mother_lastname\":\"Rico\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan,  Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"124\",\"godparents\":\"Presilla Rico, Ranel Hermosa\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-12 16:02:42', '2021-08-12 23:02:42', '2021-08-12 23:02:42'),
(131, 'Rhyle Kheurt', 'T.', 'Sedentario', NULL, 'baptism', 3, '{\"born_on\":\"10\\/13\\/2020\",\"born_in\":\"MGBH, Pob. Ward I, Minglanilla, Cebu\",\"father_firstname\":\"Roland \",\"father_middlename\":\"B. \",\"father_lastname\":\"Sedentario\",\"father_suffix\":\"\",\"mother_firstname\":\"Jecel \",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Talledo\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"125\",\"godparents\":\"Jemboy Montil, Rose Saurnido\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:00:46', '2021-08-13 16:00:46', '2021-08-13 16:00:46'),
(132, 'Zayne', 'K.', 'Sellon', NULL, 'baptism', 3, '{\"born_on\":\"9\\/22\\/2020\",\"born_in\":\"BMC, Ward II, Minglanilla, Cebu\",\"father_firstname\":\"Janbert \",\"father_middlename\":\"L. \",\"father_lastname\":\"Sellon\",\"father_suffix\":\"\",\"mother_firstname\":\"Glenalyn \",\"mother_middlename\":\"R. \",\"mother_lastname\":\"Karuko\",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"\",\"baptismal_register\":\"126\",\"godparents\":\"Crizalialyn S. Bajo, Meriel B. Sellon\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:04:08', '2021-08-13 16:04:08', '2021-08-13 16:04:08'),
(133, 'Jean Crezianiah', 'P.', 'Tan', NULL, 'baptism', 3, '{\"born_on\":\"11\\/16\\/2020\",\"born_in\":\"CSMC, San Isidro, Talisay City\",\"father_firstname\":\"Christian  Jay \",\"father_middlename\":\"P. \",\"father_lastname\":\"Tan\",\"father_suffix\":\"\",\"mother_firstname\":\"Fritzie Jean\",\"mother_middlename\":\"\",\"mother_lastname\":\"Pantonial\",\"mother_suffix\":\"\",\"resident_of\":\"Ward IV, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"127\",\"godparents\":\"Jeffrey Charles Gunther, May Ruscher\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:09:25', '2021-08-13 16:09:25', '2021-08-13 16:09:25'),
(134, 'Estelle Neriz', 'M.', 'Tumamak', NULL, 'baptism', 3, '{\"born_on\":\"8\\/29\\/2020\",\"born_in\":\"PSH, Gorordo Ave., Cebu City\",\"father_firstname\":\"Gener \",\"father_middlename\":\"C. \",\"father_lastname\":\"Tumamak\",\"father_suffix\":\"\",\"mother_firstname\":\"Riza \",\"mother_middlename\":\"D. \",\"mother_lastname\":\"Magno\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"128\",\"godparents\":\"Anna Leah Panulde, Harold Labora\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:13:46', '2021-08-13 16:13:46', '2021-08-13 16:13:46'),
(135, 'John Sebastian', 'A.', 'Vestil', NULL, 'baptism', 3, '{\"born_on\":\"11\\/6\\/2020\",\"born_in\":\"SAMCH, Basak, Cebu City\",\"father_firstname\":\"Augustin \",\"father_middlename\":\"P. \",\"father_lastname\":\"Vestil\",\"father_suffix\":\"\",\"mother_firstname\":\"Jilybee\",\"mother_middlename\":\"J. \",\"mother_lastname\":\"Adlawan\",\"mother_suffix\":\"\",\"resident_of\":\"Countryside, Lipata, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"129\",\"godparents\":\"Jodilito Adlawan, Dafodil Vestil\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:17:41', '2021-08-13 16:17:41', '2021-08-13 16:17:41'),
(136, 'Rence Louie', NULL, 'Carabaña', NULL, 'baptism', 3, '{\"born_on\":\"9\\/13\\/2020\",\"born_in\":\"SAMCH, Basak, Cebu City\",\"father_firstname\":\"Vince Louie \",\"father_middlename\":\"D. \",\"father_lastname\":\"Ca\\u00f1edo \",\"father_suffix\":\"\",\"mother_firstname\":\"Therese Anne\",\"mother_middlename\":\"L. \",\"mother_lastname\":\"Carba\\u00f1a \",\"mother_suffix\":\"\",\"resident_of\":\"Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12\\/13\\/2020\",\"baptism_minister\":\"Rev. Fr. Roy D. Bucag\",\"baptismal_register\":\"130\",\"godparents\":\"Kint Robby L. Caraba\\u00f1a, Willie Jean Espino\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:22:15', '2021-08-13 16:22:15', '2021-08-13 16:22:15'),
(137, 'Sheena Zekk', 'Y.', 'Lauron', NULL, 'baptism', 5, '{\"born_on\":\"8/15/2020\",\"born_in\":\"MMCBH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Kevin \",\"father_middlename\":\"R. \",\"father_lastname\":\"Lauron\",\"father_suffix\":\"\",\"mother_firstname\":\"Kareen \",\"mother_middlename\":\"S. \",\"mother_lastname\":\"Ypil\",\"mother_suffix\":\"\",\"resident_of\":\"Cadulawan, Minglanilla, Cebu\",\"baptism_date\":\"12/19/2020\",\"baptism_minister\":\"Rev. Fr.\\tJoselito\\tE. Danao\",\"godparents\":\"Narciso Vergara. Maria Fe Canumay\",\"baptismal_register\":\"131\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-13 09:24:32', '2021-08-13 16:24:32', '2021-08-13 08:26:31'),
(138, 'Belle Andrea', 'B.', 'Tabora', NULL, 'baptism', 4, '{\"born_on\":\"11/7/2020\",\"born_in\":\"MMCBH, Calajo-an, Minglanilla, Cebu\",\"father_firstname\":\"Clayton Mark \",\"father_middlename\":\"D. \",\"father_lastname\":\"Tabora \",\"father_suffix\":\"\",\"mother_firstname\":\"Marites \",\"mother_middlename\":\"A. \",\"mother_lastname\":\"Bolo\",\"mother_suffix\":\"\",\"resident_of\":\"Ward IV, Minglanilla, Cebu\",\"baptism_date\":\"12/19/2020\",\"baptism_minister\":\"Rev. Fr. Eric, B. Jecong\",\"godparents\":\"Rolly Joy Villasencio, Analyn Guangco\",\"baptismal_register\":\"132\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-13 09:31:15', '2021-08-13 16:31:15', '2021-08-13 08:39:34'),
(139, 'Kylo Ray', 'R.', 'Sara', NULL, 'baptism', 5, '{\"born_on\":\"11\\/3\\/2020\",\"born_in\":\"DMC, Tunghaan, Minglanilla, Cebu\",\"father_firstname\":\"John Paul \",\"father_middlename\":\"P. \",\"father_lastname\":\"Sara\",\"father_suffix\":\"\",\"mother_firstname\":\"Kimberly \",\"mother_middlename\":\"\",\"mother_lastname\":\"Retes\",\"mother_suffix\":\"\",\"resident_of\":\"Tunghaan, Minglanilla, Cebu\",\"baptism_date\":\"12\\/19\\/2020\",\"baptism_minister\":\"Rev. Fr. Joselito E. Danao\",\"baptismal_register\":\"133\",\"godparents\":\"Faith Canonigo, Joshua Deiparine \",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:38:29', '2021-08-13 16:38:29', '2021-08-13 16:38:29'),
(140, 'Zalthea Trisha', 'P.', 'Abad', NULL, 'baptism', 5, '{\"born_on\":\"6\\/17\\/2020\",\"born_in\":\"TDH, San Isidro, Talisay City\",\"father_firstname\":\"Fidel \",\"father_middlename\":\"U.\",\"father_lastname\":\"Abad\",\"father_suffix\":\"Jr.\",\"mother_firstname\":\"Irish \",\"mother_middlename\":\"M. \",\"mother_lastname\":\"Pepania\",\"mother_suffix\":\"\",\"resident_of\":\"Upper Tulay, Minglanilla, Cebu\",\"baptism_date\":\"12\\/20\\/2020\",\"baptism_minister\":\"Rev. Fr.\\tJoselito\\tE. Danao\",\"baptismal_register\":\"134\",\"godparents\":\"Nanette T. Escobido, Joel C. Villamor\",\"volume\":\"96\",\"page\":\"006\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-13 09:43:35', '2021-08-13 16:43:35', '2021-08-13 16:43:35'),
(142, 'Mercy Queen', NULL, 'Inahid', NULL, 'baptism', 4, '{\"born_on\":\"2\\/14\\/1995\",\"born_in\":\"Minglanilla, Cebu\",\"father_firstname\":\"\",\"father_middlename\":\"\",\"father_lastname\":\"\",\"father_suffix\":\"\",\"mother_firstname\":\"Rosita \",\"mother_middlename\":\"Villarino\",\"mother_lastname\":\" Inahid\",\"mother_suffix\":\"\",\"resident_of\":\"Vito, Minglanilla, Cebu\",\"baptism_date\":\"6\\/4\\/2021\",\"baptism_minister\":\"Rev. Fr. Eric Jecong\",\"baptismal_register\":\"854\",\"godparents\":\"Rizalyn Balbona\",\"volume\":\"96\",\"page\":\"036\",\"date_issued\":\"NaN\\/NaN\\/NaN\"}', 0, 35, '21-08-16 13:55:22', '2021-08-16 05:55:22', '2021-08-16 05:55:22');
INSERT INTO `certificates` (`id`, `firstname`, `middlename`, `lastname`, `suffix`, `certificate_type`, `priest_id`, `meta`, `is_deleted`, `created_by`, `created_date`, `created_at`, `updated_at`) VALUES
(143, 'Amber Emilliana', 'V.', 'Bartolobac', NULL, 'baptism', 6, '{\"born_on\":\"4/7/2021\",\"born_in\":\"YBC, Tungkop, Minglanilla, Cebu\",\"father_firstname\":\"John \",\"father_middlename\":\"R. \",\"father_lastname\":\"Bartolobac\",\"father_suffix\":\"\",\"mother_firstname\":\"Kate Maerill \",\"mother_middlename\":\"\",\"mother_lastname\":\"Verano\",\"mother_suffix\":\"\",\"resident_of\":\"Calajo-an, Minglanilla, Cebu\",\"baptism_date\":\"6/6/2021\",\"baptism_minister\":\"Rev. Fr. Loreto Jumao-as\",\"godparents\":\"Wenice April de Lara, Janielyn Mabitag\",\"baptismal_register\":\"710\",\"volume\":\"96\",\"page\":\"30\",\"date_issued\":\"NaN/NaN/NaN\"}', 0, 35, '21-08-27 08:47:04', '2021-08-27 00:47:04', '2021-08-26 16:49:42');

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
  `suffix` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priests`
--

INSERT INTO `priests` (`id`, `firstname`, `middlename`, `lastname`, `suffix`, `prefix`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Kent Dahrel', 'C.', 'Galo', NULL, 'Rev. Fr.', 0, '2021-08-10 17:06:06', '2021-08-10 17:06:06'),
(3, 'Roy', 'D.', 'Bucag', NULL, 'Rev. Fr.', 0, '2021-08-10 17:07:02', '2021-08-10 17:07:02'),
(4, 'Eric', 'B.', 'Jecong', NULL, 'Rev. Fr.', 0, '2021-08-10 17:07:39', '2021-08-10 17:07:39'),
(5, 'Joselito', 'E.', 'Danao', NULL, 'Rev. Fr.', 0, '2021-08-10 17:08:10', '2021-08-10 17:08:10'),
(6, 'Loreto', 'S.', 'Jumao-as', NULL, 'Rev. Fr.', 0, '2021-08-10 17:09:24', '2021-08-10 17:09:24'),
(9, 'Russdel', NULL, 'Noel', NULL, 'Rev. Fr.', 0, '2021-08-12 17:19:06', '2021-08-12 17:19:06');

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
(1, 'death', '<html>\n    <head>\n        <title>Death Certificate</title>\n    </head>\n    <body>\n	<br><br>\n        <h1 style=\"visibility: hidden; margin-top:12pt; margin-bottom:3pt; text-align:center; page-break-after:avoid; font-size:16pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">Archdiocesan Shrine of</span><span style=\"font-family:Cambria; color:#ffffff;\">&nbsp;&nbsp;</span><span style=\"font-family:Cambria; color:#ffffff;\">the Immaculate Heart of Mary</span></h1>\n        <p style=\"visibility: hidden; margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">Minglanilla, Cebu 6046</span></p>\n        <p style=\"visibility: hidden; margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">FB: www.facebook.com/ASIHM1857260-3462</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Georgia; color:#ffffff;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:24pt;\"><span style=\"font-family:Algerian;\">CERTIFICATE OF DEATH</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:24pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;\"><span style=\"font-family:Calibri;\">This is to certify that the following data appears in the Registry of Death at the</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Archdiocesan Shrine of the Immaculate Heart of Mary Parish;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Name of Deceased</span><span style=\"width:15.17pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">:</span><span style=\"font-family:Calibri;\">&nbsp;</span><span style=\"font-family:Calibri;\">fullname_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Age</span><span style=\"width:16.19pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: age_system</span><span style=\"width:7.07pt; display:inline-block;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Residence</span><span style=\"width:19.73pt; display:inline-block;\">&nbsp;</span><span style=\"width:37.5pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: residence_of_system</p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date of Death</span><span style=\"width:1.32pt; display:inline-block;\">&nbsp;</span><span style=\"width:37.5pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: date_of_death_system</p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Place of Burial</span><span style=\"width:1.32pt; display:inline-block;\">&nbsp;</span><span style=\"width:33.5pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: place_of_burial_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date of Burial</span><span style=\"width:2.48pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: date_of_burial_system</p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Informant/Relatives</span><span style=\"width:2.48pt; display:inline-block;\">&nbsp;</span><span style=\"width:9pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: informant_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Book Number</span><span style=\"width:2.48pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: book_number_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Page Number</span><span style=\"width:5.62pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: page_number_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Registry Number</span><span style=\"width:5.62pt; display:inline-block;\">&nbsp;</span><span style=\"width:18pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: registry_number_system</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date Issued</span><span style=\"width:13.93pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: date_issued_system</span></p>\n    </body>\n</html>', 1, 0, '2021-06-26 06:53:16', '2021-09-11 18:37:12'),
(2, 'birth', '<html>\n    <body style=\"margin-top: 108.48px; margin-bottom: 48px; margin-left: 96px; margin-right: 96px;\">\n        <p style=\"margin-top:0pt; margin-bottom:-2pt; text-align:center; line-height:57%; font-size:5pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:20pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Archdiocesan Shrine of the Immaculate Heart of Mary</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:16.5pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Minglanilla, Cebu 6046</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:16.5pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Tel. No. 260-3462</span><span style=\"font-family:\'Old English Text MT\'; font-size:15pt; color:#black;\"></span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:90%; font-size:37pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Certificate of Baptism</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:5pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">This is to certify that:</span></p>\n        <p style=\"margin-top:4pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:18pt;\"><strong><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fullname</span></strong><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:1pt; visibility: hidden;\"><span style=\"font-family:\'Times New Roman\'; color:#black;\">_______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:8pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Born on</span><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">born_on_date</span><span style=\"width:146.51pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">in&nbsp;</span><span style=\"font-family:\'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;born_in_date</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:14pt;\"><span style=\"font-family:\'Times New Roman\'; font-size:14pt; color:#black; visibility: hidden;\">Child of</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#ff0000;\">&nbsp;</span><strong><span style=\"font-family:Calibri;\">fathers_name</span></strong><span style=\"width: 121.82pt;display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#black; visibility: hidden;\">and&nbsp;</span><strong><span style=\"font-family:Calibri;\">mothers_name</span></strong></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:5pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:4pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Residents of</span><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">residents_of</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:3pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:12pt; visibility: hidden;\"><span style=\"font-family:\'Times New Roman\'; color:#black;\">in God&rsquo;s good time received the</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:26pt; visibility: hidden;\"><span style=\"font-family:\'Old English Text MT\'; color:#black;\">Sacrament of Baptism</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:5pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:4pt; margin-bottom:0pt; font-size:26pt;\"><span style=\"font-family:\'Old English Text MT\'; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri; font-size:12pt;\">date_of_baptism</span><span style=\"font-family:Calibri; font-size:12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong><span style=\"font-family:Calibri; font-size:14pt;\">minister_of</span></strong></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:200%; font-size:1pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">__________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</span><span style=\"font-family:\'Times New Roman\'; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; color:#black; visibility:hidden;\">____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:200%; font-size:12pt;\"><em><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></em><em><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Date of Baptism</span></em><em><span style=\"font-family:\'Times New Roman\'; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></em><em><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Minister of Baptism</span></em></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:2pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top: -3pt; margin-bottom:0pt; line-height:150%; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:#black; visibility: hidden;\">Godparents:</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; color:black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;godparents_list</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; font-size:9pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:10pt; font-size:9pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:16pt;\"><span style=\"font-family:\'Times New Roman\'; color:#ff0000;\">&nbsp;</span></p>\n        <p style=\"margin-top:5pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Baptismal Register:</span><span style=\"font-family:\'Times New Roman\'; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\';\">baptismal_register</span></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:14pt;\"><span style=\"font-family:\'Times New Roman\'; font-size:10.5pt; color:#black; visibility: hidden;\">Volume</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#ff0000;\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">volume_number</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Page</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">page_number</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"width:12.29pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:12pt; color:#ff0000;\">&nbsp;</span><strong><span style=\"font-family:Calibri;\">parish_priest</span></strong></p>\n        <p style=\"margin-top:0pt; margin-bottom:0pt; line-height:115%; font-size:12pt;\"><span style=\"height:0pt; display:block; position:absolute; z-index:1;\"></span><span style=\"height:0pt; display:block; position:absolute; z-index:0;\"></span><span style=\"height:0pt; display:block; position:absolute; z-index:3;\"></span><span style=\"height:0pt; display:block; position:absolute; z-index:2;\"></span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Date Issue</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black;\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt;\">date_issued&nbsp;</span><span style=\"font-family:\'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"width:114.72pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:\'Times New Roman\'; font-size:11pt; color:#black; visibility: hidden;\">Parish Priest</span></p>\n    </body>\n</html>', 1, 0, '2021-06-26 06:54:38', '2021-08-25 20:23:01'),
(3, 'confirmation', '<html>\n    <head>\n        <title>Confirmation Certificate</title>\n        <link href=\"sourceLink\" rel=\"stylesheet\">\n        <style>\n            div{\n                padding: 0px !important;\n            }\n            p{\n                margin-bottom: 0px !important;\n                margin-top: 0px !important;\n            }\n            body{\n                margin: 48px;\n            }\n            .border_color{\n                border-bottom: 1px solid white;\n            }\n            .white-text{\n                visibility: hidden;\n            }\n            .itemsAlignment{\n                transform: translateY(35px);\n            }\n            .parentsAlignment{\n                transform: translateY(35px) translateX(-50px);\n            }\n            .itemsAlignment2{\n                transform: translateY(20px);\n            }\n            .dayAligment{\n                transform: translateY(20px) translateX(36px);\n            }\n            .wholeAligment{\n                transform: translateY(21px) translateX(-77px);\n            }\n            .itemsAlignment4{\n                transform: translateY(10px);\n            }\n            .itemsAlignment3{\n                transform: translateY(-22px) translateX(50px);\n            }\n            .alignLeft1{\n                transform: translateX(10px);\n            }\n        </style>\n    </head>\n    <body style=\"margin: 48px;\">\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s12 center\">\n                <h6 class=\"white-text\">IMMACULATE HEART OF MARY PARISH</h6>\n                <p class=\"white-text\">\n                    Minglanilla, Cebu Philippines\n                    <br>\n                    Tel. Nos. 490-9635, 272-5807\n                </p>\n            </div>\n            <div class=\"col s12 center\">\n                <h6 class=\"white-text\" style=\"margin-bottom: 0\">Confirmation Certificate</h6>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 white-text\">\n                <p>This is to certify that</p>\n            </div>\n            <div class=\"col s9 center border_color itemsAlignment\">\n                <p style=\"margin-bottom:0px;\">fullname</p>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 white-text\">\n                <p>son/daughter of</p>\n            </div>\n            <div class=\"col s4 center border_color parentsAlignment\">\n                <p style=\"margin-bottom:0px;\">fathers_name</p>\n            </div>\n            <div class=\"col s1 center white-text\">\n                <p>and</p>\n            </div>\n            <div class=\"col s4 center border_color parentsAlignment\">\n                <p style=\"margin-bottom:0px;\">mothers_name</p>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s12 white-text\">\n                <p>\n                    was <b style=\"font-family: \'Times New Roman\', Times, serif; font-size: 20px;\">confirmed according to the rite of the Roman Catholic Church</b> on the\n                </p>\n            </div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s2 center border_color dayAligment\"><p style=\"margin-bottom:0px;\">number_day</p></div>\n            <div class=\"col s1 white-text\"><p>day of</p></div>\n            <div class=\"col s4 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">month_text</p></div>\n            <div class=\"col s1 white-text\"><p>, 20</p></div>\n            <div class=\"col s1 center border_color wholeAligment\"><p style=\"margin-bottom:0px;\">year</p></div>\n            <div class=\"col s1 white-text\"><p>by</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">&nbsp;</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s12 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">priest_name</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s1\"></div>\n            <div class=\"col s3 white-text\"><p>The Sponsors being</p></div>\n            <div class=\"col s7 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">first_sponsor</p></div>\n            <div class=\"col s1 white-text\"><p>and</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s7 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">second_sponsor</p></div>\n            <div class=\"col s5 white-text\"><p>as appears from the Confirmation</p></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 white-text\"><p>Register Book</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">register_book</p></div>\n            <div class=\"col s1 white-text\"><p>Page</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">page_number</p></div>\n            <div class=\"col s1 white-text\"><p>No.</p></div>\n            <div class=\"col s2 center border_color itemsAlignment2\"><p style=\"margin-bottom:0px;\">cert_no</p></div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s12 white-text\">\n                <p>of this church.</p>\n            </div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s12\"></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 center border_color itemsAlignment3\">date_issue</div>\n            <div class=\"col s9\"></div>\n        </div>\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\n            <div class=\"col s3 center white-text\">Date Issue</div>\n            <div class=\"col s6\"></div>\n            <div class=\"col s3 center white-text\">Parish Priest</div>\n        </div>\n    </body>\n</html>', 1, 0, '2021-07-03 06:54:53', '2021-09-11 18:37:06'),
(4, 'marriage', '<html>\n    <head>\n        <title>Marriage Certificate</title>\n        <link href=\"sourceLink\" rel=\"stylesheet\">\n        <style>\n            p{\n                margin-bottom: 0px !important;\n                margin-top: 0px !important;\n            }\n            body{\n                margin-top: 85px;\n                margin-bottom: 48px;\n                margin-left: 48px;\n                margin-right: 48px;\n            }\n            .border_color{\n                border-bottom: 1px solid white;\n            }\n            .white-text{\n                visibility: hidden;\n            }\n            .mb-10{\n                margin-bottom: 10px !important;\n            }\n            .remove_margin{\n                margin-bottom: 0px !important;\n            }\n            .remove_margin_top{\n                margin-top: 0px !important;\n            }\n            .mart-3{\n                margin-top: 3px !important;\n            }\n            .colHeight{\n                height: 12px !important;\n            }\n            .addfive{\n                margin-top: 7px;\n            }\n            .margin-negative-2{\n                margin-top: -2px !important;\n            }\n        </style>\n    </head>\n    <body>\n        <div class=\"row\">\n            <h1>&nbsp;</h1>\n            <h1>&nbsp;</h1>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s4\">\n                <div class=\"col s12 white-text\">Name:</div>\n                <div class=\"col s12 white-text\">Age:</div>\n                <div class=\"col s12 white-text\">Civil Status:</div>\n                <div class=\"col s12 white-text\">Date of Birth:</div>\n                <div class=\"col s12 white-text\">Residence:</div>\n                <div class=\"col s12 white-text\">&nbsp;</div>\n                <div class=\"col s12 white-text\">Date of Baptism:</div>\n                <div class=\"col s12 white-text\">Father\'s Name:</div>\n                <div class=\"col s12 white-text\">Mother\'s Name:</div>\n                <div class=\"col s12 white-text\">Witness:</div>\n                <div class=\"col s12 white-text\">&nbsp;</div>\n            </div>\n            <div class=\"col s4\">\n                <div class=\"col s12 border_color \">husbands_name</div>\n                <div class=\"col s12 border_color \">husbands_age</div>\n                <div class=\"col s12 border_color \">husbands_civil_status</div>\n                <div class=\"col s12 border_color \">husbands_date_of_birth</div>\n                <div class=\"col s12 border_color \">husbands_place_of_birth</div>\n                <div class=\"col s12 border_color \">husbands_residence</div>\n                <div class=\"col s12 border_color colHeight\">&nbsp;</div>\n                <div class=\"col s12 border_color \">husbands_date_of_baptism</div>\n                <div class=\"col s12 border_color \">husbands_fathers_name</div>\n                <div class=\"col s12 border_color \">husbands_mothers_name</div>\n                <div class=\"col s12 border_color \">husbands_first_witness</div>\n                <div class=\"col s12 border_color \">husbands_second_witness</div>\n            </div>\n            <div class=\"col s4 margin-negative-2\">\n                <div class=\"col s12 border_color \">wifes_name</div>\n                <div class=\"col s12 border_color \">wifes_age</div>\n                <div class=\"col s12 border_color \">wifes_civil_status</div>\n                <div class=\"col s12 border_color \">wifes_date_of_birth</div>\n                <div class=\"col s12 border_color \">wifes_place_of_birth</div>\n                <div class=\"col s12 border_color \">wifes_residence</div>\n                <div class=\"col s12 border_color colHeight\">&nbsp;</div>\n                <div class=\"col s12 border_color \">wifes_date_of_baptism</div>\n                <div class=\"col s12 border_color \">wifes_fathers_name</div>\n                <div class=\"col s12 border_color \">wifes_mothers_name</div>\n                <div class=\"col s12 border_color \">wifes_first_witness</div>\n                <div class=\"col s12 border_color \">wifes_second_witness</div>\n            </div>\n        </div>\n        <br>\n        <div class=\"row remove_margin addfive\">\n            <div class=\"col s3 white-text\">Place of Marriage:</div>\n            <div class=\"col s4 border_color \">place_of_marriage</div>\n        </div>\n        <div class=\"row remove_margin_top remove_margin\">\n            <div class=\"col s3 white-text\">Date of Marriage:</div>\n            <div class=\"col s4 border_color \">date_of_marriage</div>\n        </div>\n        <div class=\"row remove_margin_top\">\n            <div class=\"col s3 white-text\"><b>Solemnized by:</b></div>\n            <div class=\"col s4 border_color \">solemnized_by</div>\n        </div>\n        <br>\n        <div class=\"row remove_margin_top remove_margin\">\n            <div class=\"col s12 white-text\">\n                I hereby certify to the correctness of the date aboce as found in the Parish Book of\n            </div>\n        </div>\n        <div class=\"row remove_margin mart-3\">\n            <div class=\"col s12\">\n                <span class=\"white-text\">Marriages No.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>marriages_no</span>\n                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"white-text\">Page:</span><span>page_no</span>\n                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"white-text\">Line:</span><span>line_no</span>\n            </div>\n        </div>\n        <div class=\"row remove_margin mart-3\">\n            <div class=\"col s12\">\n                <span class=\"white-text\">Given this</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>number_day</span>\n                <span class=\"white-text\">day of</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>month_text</span>\n                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"white-text\">, 20</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>year_in_two</span>\n            </div>\n        </div>\n        <h3>&nbsp;</h3>\n        <div class=\"row\">\n            <div class=\"col s12 border_color\">\n                <p class=\"right\"></p>\n            </div>\n        </div>\n    </body>\n</html>', 1, 0, '2021-07-03 14:45:06', '2021-09-11 18:37:01');

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
(1, 3, 'Julcarl Selma', 'carljulamles@gmail.com', 'users/default.png', NULL, '$2y$10$/vQQwrLJfiDARDEXYJyLBuNC5ZDJI.rjPSjl61UiQKSF0ZD1iROPW', NULL, '{\"locale\":\"en\"}', '2021-05-18 07:48:40', '2021-07-07 19:56:15', 1),
(34, 1, 'john gimenez', 'john.gimenez80@gmail.com', 'users/default.png', NULL, '$2y$10$U.qxPXcjIbMXHQ7Y6oxANue2qS3oFptBELslYFHdhmaBYdOQGVBXK', NULL, NULL, '2021-08-09 09:15:11', '2021-08-09 09:15:33', 1),
(35, 2, 'Therese Hygeia P. Doron', 'thrshyg@gmail.com', 'users/default.png', NULL, '$2y$10$qtSG99ApZbFSLVAiM7h7V.Hu98C.aW07z5.c/sglfO/FKria9moTK', NULL, NULL, '2021-08-10 08:27:51', '2021-08-10 08:47:36', 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
