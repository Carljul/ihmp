-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 04:59 AM
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
(1, 1, '05kc2o3LkfzsmT9QKApN8BGsfwXQytYp|1', 'valid', '2021-07-04 22:39:01', '2021-05-22 16:51:07', '2021-07-04 02:39:01'),
(2, 2, 'jkNDc9y5ZZw0J8FxvUX22LYGdDLgjTKR|2', 'expired', '2021-06-28 07:42:21', '2021-05-23 10:03:07', '2021-06-28 04:37:11'),
(3, 3, 'n32GvIvQGMDNVSqc90TwqCPtSSqsKaiH|3', 'expired', '2021-06-28 07:14:06', '2021-06-27 10:51:33', '2021-06-27 11:14:11'),
(4, 7, 'ImJNguNW7PlyI73k8ZLkAFlAspzMmVuB|7', 'valid', '2021-06-28 06:57:43', '2021-06-27 10:57:43', '2021-06-27 10:57:43'),
(5, 23, 'D6gb2HwVAlbnKizhM45Dm1q7zxmMwic7|23', 'expired', '2021-06-29 09:46:44', '2021-06-28 13:37:38', '2021-06-28 13:50:24');

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
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2021-05-18 07:47:47', '2021-05-18 07:52:23'),
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
(22, 2, 'Settings', '', '_self', 'voyager-settings', '#000000', NULL, 13, '2021-05-23 01:46:11', '2021-05-23 01:46:29', 'voyager.settings.index', 'null');

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
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(11, 'test', 'test', 'test', 'test', 0, '2021-06-14 13:19:40', '2021-06-14 13:19:40'),
(12, 'test2', 'test2', 'test2', 'test2', 0, '2021-06-14 13:23:05', '2021-06-14 13:23:05'),
(13, 'gggg', 'gggg', 'gggg', 'gggg', 0, '2021-06-17 03:40:45', '2021-06-17 03:40:45'),
(14, 'hhhh', 'hhhh', 'hhhh', 'hhhh', 0, '2021-06-17 03:40:52', '2021-06-17 03:40:52'),
(15, 'iii', 'iii', 'iii', 'iii', 0, '2021-06-17 03:41:00', '2021-06-17 03:41:00'),
(16, 'jjjj', 'jjjj', 'jjjj', 'jjjj', 0, '2021-06-17 03:41:09', '2021-06-17 03:41:09'),
(17, 'Testing', 'kkkk', 'kkkk', 'kkkk', 0, '2021-06-17 03:41:16', '2021-06-18 19:28:52');

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
(3, 'super_admin', 'Super Admin', '2021-05-18 07:49:51', '2021-05-18 07:49:51');

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
(2, 'birth', '<html>\r\n    <body>\r\n        <h1 style=\"margin-top:12pt; margin-bottom:3pt; text-align:center; page-break-after:avoid; font-size:16pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">Archdiocesan Shrine of</span><span style=\"font-family:Cambria; color:#ffffff;\">&nbsp;&nbsp;</span><span style=\"font-family:Cambria; color:#ffffff;\">the Immaculate Heart of Mary</span></h1>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">Minglanilla, Cebu 6046</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:12pt;\"><span style=\"font-family:Cambria; color:#ffffff;\">FB: www.facebook.com/ASIHM1857260-3462</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Georgia; color:#ffffff;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:24pt;\"><span style=\"font-family:Algerian;\">CERTIFICATE OF DEATH</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:24pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt;\"><span style=\"font-family:Algerian;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;\"><span style=\"font-family:Calibri;\">This is to certify that the following data appears in the Registry of Death at the</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Archdiocesan Shrine of the Immaculate Heart of Mary Parish;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Name of Deceased</span><span style=\"width:15.17pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">:</span><span style=\"font-family:Calibri;\">&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Paula Taran</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Age</span><span style=\"width:16.19pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: 74 years old</span><span style=\"width:7.07pt; display:inline-block;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">&nbsp;Residence</span><span style=\"width:19.73pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: Vito, Minglanilla Cebu</span><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">&nbsp;Date of Death</span><span style=\"width:1.32pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: March</span><span style=\"font-family:Calibri;\">&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">30, 1957</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Place of Burial</span><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">: Roman Catholic Cemetery</span><span style=\"width:10.59pt; display:inline-block;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">&nbsp;Date of Burial</span><span style=\"width:2.48pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: March 31,</span><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">1957</span><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">&nbsp;Informant/Relatives</span><span style=\"width:7.65pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: Roberto Largo</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Page Number</span><span style=\"width:6.02pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: 18</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">Page Number</span><span style=\"width:5.62pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: 12</span><span style=\"width:17.91pt; display:inline-block;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">Registry Number</span><span style=\"width:25.97pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: 323</span><span style=\"width:11.83pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span></p>\r\n        <p style=\"margin-top:0pt; margin-bottom:0pt; font-size:12pt;\"><span style=\"font-family:Calibri;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:Calibri;\">Date Issued</span><span style=\"width:13.93pt; display:inline-block;\">&nbsp;</span><span style=\"width:36pt; display:inline-block;\">&nbsp;</span><span style=\"font-family:Calibri;\">: June 19, 2021</span></p>\r\n    </body>\r\n</html>', 0, 0, '2021-06-26 06:54:38', '2021-06-26 06:54:38'),
(3, 'confirmation', '<html>\r\n    <head>\r\n        <title>Confirmation Certificate</title>\r\n        <link href=\"http://127.0.0.1:8000/css/materialize.css\" rel=\"stylesheet\">\r\n        <style>\r\n            div{\r\n                padding: 0px !important;\r\n            }\r\n            p{\r\n                margin-bottom: 0px !important;\r\n                margin-top: 0px !important;\r\n            }\r\n            body{\r\n                margin: 48px;\r\n            }\r\n            .border_color{\r\n                border-bottom: 1px solid white;\r\n            }\r\n            .white-text{\r\n                visibility: hidden;\r\n            }\r\n        </style>\r\n    </head>\r\n    <body style=\"margin: 48px;\">\r\n        <div class=\"row\">\r\n            <div class=\"col s12 center\">\r\n                <h6 class=\"white-text\">IMMACULATE HEART OF MARY PARISH</h6>\r\n                <p class=\"white-text\">\r\n                    Minglanilla, Cebu Philippines\r\n                    <br>\r\n                    Tel. Nos. 490-9635, 272-5807\r\n                </p>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\">\r\n            <div class=\"col s12 center\">\r\n                <h5 class=\"white-text\">Confirmation Certificate</h5>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s3 white-text\">\r\n                <p>This is to certify that</p>\r\n            </div>\r\n            <div class=\"col s9 center border_color\">\r\n                <p style=\"margin-bottom:0px;\">fullname</p>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s3 white-text\">\r\n                <p>son/daughter of</p>\r\n            </div>\r\n            <div class=\"col s4 center border_color\">\r\n                <p style=\"margin-bottom:0px;\">fathers_name</p>\r\n            </div>\r\n            <div class=\"col s1 center white-text\">\r\n                <p>and</p>\r\n            </div>\r\n            <div class=\"col s4 center border_color\">\r\n                <p style=\"margin-bottom:0px;\">mothers_name</p>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s12 white-text\">\r\n                <p>\r\n                    was <b style=\"font-family: \'Times New Roman\', Times, serif; font-size: 20px;\">confirmed according to the rite of the Roman Catholic Church</b> on the\r\n                </p>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s2 center border_color\"><p style=\"margin-bottom:0px;\">number_day</p></div>\r\n            <div class=\"col s1 white-text\"><p>day of</p></div>\r\n            <div class=\"col s4 center border_color\"><p style=\"margin-bottom:0px;\">month_text</p></div>\r\n            <div class=\"col s1 white-text\"><p>, 20</p></div>\r\n            <div class=\"col s1 center border_color\"><p style=\"margin-bottom:0px;\">year</p></div>\r\n            <div class=\"col s1 white-text\"><p>by</p></div>\r\n            <div class=\"col s2 center border_color\"><p style=\"margin-bottom:0px;\">&nbsp;</p></div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s12 center border_color\"><p style=\"margin-bottom:0px;\">priest_name</p></div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s1\"></div>\r\n            <div class=\"col s3 white-text\"><p>The Sponsors being</p></div>\r\n            <div class=\"col s7 center border_color\"><p style=\"margin-bottom:0px;\">first_sponsor</p></div>\r\n            <div class=\"col s1 white-text\"><p>and</p></div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s7 center border_color\"><p style=\"margin-bottom:0px;\">second_sponsor</p></div>\r\n            <div class=\"col s5 white-text\"><p>as appears from the Confirmation</p></div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s3 white-text\"><p>Register Book</p></div>\r\n            <div class=\"col s2 center border_color\"><p style=\"margin-bottom:0px;\">register_book</p></div>\r\n            <div class=\"col s1 white-text\"><p>Page</p></div>\r\n            <div class=\"col s2 center border_color\"><p style=\"margin-bottom:0px;\">page_number</p></div>\r\n            <div class=\"col s1 white-text\"><p>No.</p></div>\r\n            <div class=\"col s2 center border_color\"><p style=\"margin-bottom:0px;\">cert_no</p></div>\r\n        </div>\r\n        <div class=\"row\">\r\n            <div class=\"col s12 white-text\">\r\n                <p>of this church.</p>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\">\r\n            <div class=\"col s12\"></div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s3 center border_color\">date_issue</div>\r\n            <div class=\"col s9\"></div>\r\n        </div>\r\n        <div class=\"row\" style=\"margin-bottom: 0px !important;\">\r\n            <div class=\"col s3 center white-text\">Date Issue</div>\r\n            <div class=\"col s6\"></div>\r\n            <div class=\"col s3 center white-text\">Parish Priest</div>\r\n        </div>\r\n    </body>\r\n</html>', 1, 0, '2021-07-03 06:54:53', '2021-07-03 04:00:31'),
(4, 'marriage', '<html>\n    <head>\n        <title>Marriage Certificate</title>\n        <link href=\"http://127.0.0.1:8000/css/materialize.css\" rel=\"stylesheet\">\n        <style>\n            p{\n                margin-bottom: 0px !important;\n                margin-top: 0px !important;\n            }\n            body{\n                margin: 48px;\n            }\n            .border_color{\n                border-bottom: 1px solid black;\n            }\n            .white-text{\n                /* visibility: hidden; */\n            }\n        </style>\n    </head>\n    <body>\n        <div class=\"row\">\n            <div class=\"col s4\">\n                <div class=\"col s12 white-text\">Name:</div>\n                <div class=\"col s12 white-text\">Age:</div>\n                <div class=\"col s12 white-text\">Civil Status:</div>\n                <div class=\"col s12 white-text\">Date of Birth:</div>\n                <div class=\"col s12 white-text\">Residence:</div>\n                <div class=\"col s12 white-text\">&nbsp;</div>\n                <div class=\"col s12 white-text\">Date of Baptism:</div>\n                <div class=\"col s12 white-text\">Father\'s Name:</div>\n                <div class=\"col s12 white-text\">Mother\'s Name:</div>\n                <div class=\"col s12 white-text\">Witness:</div>\n                <div class=\"col s12 white-text\">&nbsp;</div>\n            </div>\n            <div class=\"col s4\">\n                <div class=\"col s12 border_color center\">husbands_name</div>\n                <div class=\"col s12 border_color center\">husbands_age</div>\n                <div class=\"col s12 border_color center\">husbands_civil_status</div>\n                <div class=\"col s12 border_color center\">husbands_date_of_birth</div>\n                <div class=\"col s12 border_color center\">husbands_residence</div>\n                <div class=\"col s12 border_color center\">&nbsp;</div>\n                <div class=\"col s12 border_color center\">husbands_date_of_baptism</div>\n                <div class=\"col s12 border_color center\">husbands_fathers_name</div>\n                <div class=\"col s12 border_color center\">husbands_mothers_name</div>\n                <div class=\"col s12 border_color center\">husbands_first_witness</div>\n                <div class=\"col s12 border_color center\">husbands_second_witness</div>\n            </div>\n            <div class=\"col s4\">\n                <div class=\"col s12 border_color center\">wifes_name</div>\n                <div class=\"col s12 border_color center\">wifes_age</div>\n                <div class=\"col s12 border_color center\">wifes_civil_status</div>\n                <div class=\"col s12 border_color center\">wifes_date_of_birth</div>\n                <div class=\"col s12 border_color center\">wifes_residence</div>\n                <div class=\"col s12 border_color center\">&nbsp;</div>\n                <div class=\"col s12 border_color center\">wifes_date_of_baptism</div>\n                <div class=\"col s12 border_color center\">wifes_fathers_name</div>\n                <div class=\"col s12 border_color center\">wifes_mothers_name</div>\n                <div class=\"col s12 border_color center\">wifes_first_witness</div>\n                <div class=\"col s12 border_color center\">wifes_second_witness</div>\n            </div>\n        </div>\n        <br>\n        <div class=\"row\">\n            <div class=\"col s3 white-text\">Place of Marriage:</div>\n            <div class=\"col s4 border_color center\">place_of_marriage</div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s3 white-text\">Date of Marriage:</div>\n            <div class=\"col s4 border_color center\">date_of_marriage</div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s3 white-text\"><b>Solemnized by:</b></div>\n            <div class=\"col s4 border_color center\">solemnized_by</div>\n        </div>\n        <br>\n        <div class=\"row\">\n            <div class=\"col s12\">\n                I hereby certify to the correctness of the date aboce as found in the Parish Book of\n            </div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s2 white-text\">Marriages No.</div>\n            <div class=\"col s2 border_color center\">marriages_no</div>\n            <div class=\"col s2 white-text\">Page:</div>\n            <div class=\"col s2 border_color center\">page_no</div>\n            <div class=\"col s2 white-text\">Line:</div>\n            <div class=\"col s2 border_color center\">line_no</div>\n        </div>\n        <div class=\"row\">\n            <div class=\"col s2 white-text\">Given this</div>\n            <div class=\"col s2 border_color center\">number_day</div>\n            <div class=\"col s2 white-text\">day of</div>\n            <div class=\"col s2 border_color center\">month_text</div>\n            <div class=\"col s2 white-text\">, 20</div>\n            <div class=\"col s2 border_color center\">year_in_two</div>\n        </div>\n        <br>\n        <div class=\"row\">\n            <div class=\"col s12 border_color right\">\n                parish_priest\n            </div>\n        </div>\n    </body>\n</html>', 1, 0, '2021-07-03 14:45:06', '2021-07-03 14:45:06');

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
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `is_active`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 3, 'Julcarl Selma', 'carljulamles@gmail.com', 'users\\June2021\\nJBhmZY8zXGikLQuBENT.jpeg', NULL, '$2y$10$/L3rXlQMkL/xOdQpfU9NeuroV6iqqFNH9Ts0f960KjGlZZ2kuGH2m', 1, NULL, '{\"locale\":\"en\"}', '2021-05-18 07:48:40', '2021-06-27 00:44:40'),
(2, 1, 'Yasmin Tapado', 'yasmintapado@gmail.com', 'users/default.png', NULL, '$2y$10$rqf1hDpy/zfi75T6hBoo/ull1Sx6yKB9sdDJJrVJBjjPOdUl4Mw2u', 1, NULL, '{\"locale\":\"en\"}', '2021-05-18 07:50:54', '2021-06-27 03:41:29'),
(3, 2, 'Daniel Catindoy', 'act.danielcatindoy@gmail.com', 'users\\May2021\\hjhnulWhToMHEGG2PMBr.jpg', NULL, '$2y$10$ok6GIRvHw4.qFfE2Hc004eOegiUOJBmw/J3b7H4udkNYuwZCGMRQW', 1, NULL, '{\"locale\":\"en\"}', '2021-05-18 07:58:04', '2021-06-27 03:13:12'),
(4, 2, 'Nora Catindoy', 'noracatindoy@gmail.com', 'users/default.png', NULL, '$2y$10$ok6GIRvHw4.qFfE2Hc004eOegiUOJBmw/J3b7H4udkNYuwZCGMRQW', 0, NULL, '{\"locale\":\"en\"}', '2021-06-27 00:45:59', '2021-06-27 03:17:01'),
(5, 2, 'Jhomark Jame Selma', 'sjhomark@gmail.com', 'users/default.png', NULL, '$2y$10$KzfUlZUXMzPxQlfuNBtdwuXGokgR9Szb1K09x4rRETN0Q3lU.8PrS', 0, NULL, '{\"locale\":\"en\"}', '2021-06-27 00:46:47', '2021-06-27 03:21:10'),
(23, 2, 'Chris evans', 'christiuamazing@gmail.com', 'users/default.png', NULL, '$2y$10$9m4EfPCkHwnodmlg0Z3mL.P7xdCh9mvSi6th44e5SuiDTLFaV2bVK', 0, NULL, NULL, '2021-06-28 05:35:38', '2021-06-28 05:50:13'),
(24, 2, 'Chris Tiu', 'anamarie@gmail.com', 'users/default.png', NULL, '$2y$10$pAvXpSqxGqVT3GiZHuogrO22K9XPoa./IMaqxU2rqcTV62jHaE0eW', 0, NULL, NULL, '2021-06-30 06:51:14', '2021-06-30 06:51:14');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
