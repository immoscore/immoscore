-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 12:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la-blankdb`
--
-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `backup_size` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `tags`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administration', '[]', '#000', NULL, '2017-05-26 15:26:31', '2017-09-15 07:17:34'),
(2, 'Test Department', '[]', '#ff0000', '2017-07-10 15:15:15', '2017-07-07 03:44:47', '2017-07-10 15:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reporting_level_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `region_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `woreda_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `kebele_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `gender`, `mobile`, `email`, `dept`, `city`, `address`, `deleted_at`, `created_at`, `updated_at`, `reporting_level_id`, `country_id`, `region_id`, `woreda_id`, `kebele_id`) VALUES
(1, 'Super Administrator', 'Super Admin', 'Male', '0000000000', 'wv.admin@mandemobile.com', 1, 'Pune', 'Karve nagar, Pune 411030', NULL, '2017-05-26 15:27:34', '2017-08-03 04:27:38', 1, 1, 1, 1, 1),
(3, 'Ritesh Singh', 'M&E Officer', 'Male', '0000000000', 'ritesh@mailinator.com', 1, 'Dubai', 'A99, xyz ', NULL, '2017-08-02 13:18:39', '2017-08-02 13:18:39', 2, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `la_configs`
--

CREATE TABLE `la_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_configs`
--

INSERT INTO `la_configs` (`id`, `key`, `section`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sitename', '', 'UBS MIS', '2017-05-26 15:26:37', '2017-10-31 03:29:41'),
(2, 'sitename_part1', '', 'UBS', '2017-05-26 15:26:37', '2017-10-31 03:29:41'),
(3, 'sitename_part2', '', 'MIS', '2017-05-26 15:26:37', '2017-10-31 03:29:41'),
(4, 'sitename_short', '', 'UM', '2017-05-26 15:26:37', '2017-10-31 03:29:41'),
(5, 'site_description', '', 'UBS - Management Information System', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(6, 'sidebar_search', '', '0', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(7, 'show_messages', '', '0', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(8, 'show_notifications', '', '1', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(9, 'show_tasks', '', '0', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(10, 'show_rightsidebar', '', '0', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(11, 'skin', '', 'skin-blue', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(12, 'layout', '', 'fixed', '2017-05-26 15:26:38', '2017-10-31 03:29:42'),
(13, 'default_email', '', 'demo@mandemobile.com', '2017-05-26 15:26:38', '2017-10-31 03:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `la_menus`
--

CREATE TABLE `la_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'module',
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `hierarchy` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_menus`
--

INSERT INTO `la_menus` (`id`, `name`, `url`, `icon`, `type`, `parent`, `hierarchy`, `created_at`, `updated_at`) VALUES
(1, 'System', '#', 'fa-cogs', 'custom', 0, 8, '2017-05-26 15:26:31', '2017-10-25 00:19:35'),
(3, 'Uploads', 'uploads', 'fa-files-o', 'module', 1, 5, '2017-05-26 15:26:31', '2017-09-12 08:57:52'),
(4, 'Departments', 'departments', 'fa-tags', 'module', 1, 4, '2017-05-26 15:26:31', '2017-08-24 09:20:46'),
(6, 'Roles', 'roles', 'fa-user-plus', 'module', 1, 2, '2017-05-26 15:26:31', '2017-08-24 09:20:46'),
(8, 'Permissions', 'permissions', 'fa-magic', 'module', 1, 3, '2017-05-26 15:26:31', '2017-08-24 09:20:46'),
(55, 'Users', 'users', 'fa-group', 'module', 1, 1, '2017-08-18 12:16:02', '2017-08-18 12:16:40'),
(64, 'Logout', '../logout', 'fa-sign-out', 'custom', 0, 9, '2017-09-12 08:57:34', '2017-10-25 00:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_26_050000_create_modules_table', 1),
('2014_05_26_055000_create_module_field_types_table', 1),
('2014_05_26_060000_create_module_fields_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_12_01_000000_create_uploads_table', 1),
('2016_05_26_064006_create_departments_table', 1),
('2016_05_26_064007_create_employees_table', 1),
('2016_05_26_064446_create_roles_table', 1),
('2016_07_05_115343_create_role_user_table', 1),
('2016_07_06_140637_create_organizations_table', 1),
('2016_07_07_134058_create_backups_table', 1),
('2016_07_07_134058_create_menus_table', 1),
('2016_09_10_163337_create_permissions_table', 1),
('2016_09_10_163520_create_permission_role_table', 1),
('2016_09_22_105958_role_module_fields_table', 1),
('2016_09_22_110008_role_module_table', 1),
('2016_10_06_115413_create_la_configs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_db` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `view_col` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fa_icon` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `is_gen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `label`, `name_db`, `view_col`, `model`, `controller`, `fa_icon`, `is_gen`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'Users', 'users', 'name', 'User', 'UsersController', 'fa-group', 1, '2017-05-26 15:25:48', '2017-05-26 15:26:38'),
(2, 'Uploads', 'Uploads', 'uploads', 'name', 'Upload', 'UploadsController', 'fa-files-o', 1, '2017-05-26 15:25:53', '2017-05-26 15:26:38'),
(3, 'Departments', 'Departments', 'departments', 'name', 'Department', 'DepartmentsController', 'fa-tags', 1, '2017-05-26 15:25:56', '2017-05-26 15:26:38'),
(4, 'Employees', 'Employees', 'employees', 'name', 'Employee', 'EmployeesController', 'fa-group', 1, '2017-05-26 15:25:58', '2017-05-26 15:26:39'),
(5, 'Roles', 'Roles', 'roles', 'name', 'Role', 'RolesController', 'fa-user-plus', 1, '2017-05-26 15:26:02', '2017-05-26 15:26:39'),
(6, 'Organizations', 'Organizations', 'organizations', 'name', 'Organization', 'OrganizationsController', 'fa-university', 1, '2017-05-26 15:26:11', '2017-05-26 15:26:39'),
(7, 'Backups', 'Backups', 'backups', 'name', 'Backup', 'BackupsController', 'fa-hdd-o', 1, '2017-05-26 15:26:15', '2017-05-26 15:26:39'),
(8, 'Permissions', 'Permissions', 'permissions', 'name', 'Permission', 'PermissionsController', 'fa-magic', 1, '2017-05-26 15:26:18', '2017-05-26 15:26:39'),
(65, 'Profiles', 'Profiles', 'profiles', 'username', 'Profile', 'ProfilesController', 'fa-user', 1, '2017-10-05 20:55:30', '2017-10-05 20:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `module_fields`
--

CREATE TABLE `module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `colname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module` int(10) UNSIGNED NOT NULL,
  `field_type` int(10) UNSIGNED NOT NULL,
  `unique` tinyint(1) NOT NULL DEFAULT '0',
  `defaultvalue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `minlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `maxlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `popup_vals` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_fields`
--

INSERT INTO `module_fields` (`id`, `colname`, `label`, `module`, `field_type`, `unique`, `defaultvalue`, `minlength`, `maxlength`, `required`, `popup_vals`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'name', 'Name', 1, 16, 0, '', 5, 250, 1, '', 0, '2017-05-26 15:25:49', '2017-05-26 15:25:49'),
(2, 'context_id', 'Context', 1, 13, 0, '0', 0, 0, 0, '', 0, '2017-05-26 15:25:49', '2017-05-26 15:25:49'),
(3, 'email', 'Email', 1, 8, 1, '', 0, 250, 0, '', 0, '2017-05-26 15:25:49', '2017-05-26 15:25:49'),
(4, 'password', 'Password', 1, 17, 0, '', 6, 250, 1, '', 0, '2017-05-26 15:25:49', '2017-05-26 15:25:49'),
(5, 'type', 'User Type', 1, 7, 0, 'Employee', 0, 0, 0, '[\"Employee\",\"Client\"]', 0, '2017-05-26 15:25:50', '2017-05-26 15:25:50'),
(6, 'name', 'Name', 2, 16, 0, '', 5, 250, 1, '', 0, '2017-05-26 15:25:53', '2017-05-26 15:25:53'),
(7, 'path', 'Path', 2, 19, 0, '', 0, 250, 0, '', 0, '2017-05-26 15:25:53', '2017-05-26 15:25:53'),
(8, 'extension', 'Extension', 2, 19, 0, '', 0, 20, 0, '', 0, '2017-05-26 15:25:53', '2017-05-26 15:25:53'),
(9, 'caption', 'Caption', 2, 19, 0, '', 0, 250, 0, '', 0, '2017-05-26 15:25:53', '2017-05-26 15:25:53'),
(10, 'user_id', 'Owner', 2, 7, 0, '1', 0, 0, 0, '@users', 0, '2017-05-26 15:25:53', '2017-05-26 15:25:53'),
(11, 'hash', 'Hash', 2, 19, 0, '', 0, 250, 0, '', 0, '2017-05-26 15:25:54', '2017-05-26 15:25:54'),
(12, 'public', 'Is Public', 2, 2, 0, '0', 0, 0, 0, '', 0, '2017-05-26 15:25:54', '2017-05-26 15:25:54'),
(13, 'name', 'Name', 3, 16, 1, '', 1, 250, 1, '', 0, '2017-05-26 15:25:57', '2017-05-26 15:25:57'),
(14, 'tags', 'Tags', 3, 20, 0, '[]', 0, 0, 0, '', 0, '2017-05-26 15:25:57', '2017-05-26 15:25:57'),
(15, 'color', 'Color', 3, 19, 0, '', 0, 50, 1, '', 0, '2017-05-26 15:25:57', '2017-05-26 15:25:57'),
(16, 'name', 'Name', 4, 16, 0, '', 5, 250, 1, '', 0, '2017-05-26 15:25:58', '2017-05-26 15:25:58'),
(17, 'designation', 'Designation', 4, 19, 0, '', 0, 50, 1, '', 0, '2017-05-26 15:25:58', '2017-05-26 15:25:58'),
(18, 'gender', 'Gender', 4, 18, 0, 'Male', 0, 0, 1, '[\"Male\",\"Female\"]', 0, '2017-05-26 15:25:58', '2017-05-26 15:25:58'),
(19, 'mobile', 'Mobile', 4, 14, 0, '', 10, 20, 1, '', 0, '2017-05-26 15:25:58', '2017-05-26 15:25:58'),
(21, 'email', 'Email', 4, 8, 1, '', 5, 250, 1, '', 0, '2017-05-26 15:25:59', '2017-05-26 15:25:59'),
(22, 'dept', 'Department', 4, 7, 0, '0', 0, 256, 0, '@departments', 0, '2017-05-26 15:25:59', '2017-07-21 14:08:56'),
(23, 'city', 'City', 4, 19, 0, '', 0, 50, 0, '', 0, '2017-05-26 15:25:59', '2017-05-26 15:25:59'),
(24, 'address', 'Address', 4, 1, 0, '', 0, 1000, 0, '', 0, '2017-05-26 15:25:59', '2017-05-26 15:25:59'),
(30, 'name', 'Name', 5, 16, 1, '', 1, 250, 1, '', 0, '2017-05-26 15:26:02', '2017-05-26 15:26:02'),
(31, 'display_name', 'Display Name', 5, 19, 0, '', 0, 250, 1, '', 0, '2017-05-26 15:26:02', '2017-05-26 15:26:02'),
(32, 'description', 'Description', 5, 21, 0, '', 0, 1000, 0, '', 0, '2017-05-26 15:26:02', '2017-05-26 15:26:02'),
(33, 'parent', 'Parent Role', 5, 7, 0, '1', 0, 0, 0, '@roles', 0, '2017-05-26 15:26:03', '2017-05-26 15:26:03'),
(34, 'dept', 'Department', 5, 7, 0, '1', 0, 0, 0, '@departments', 0, '2017-05-26 15:26:03', '2017-05-26 15:26:03'),
(35, 'name', 'Name', 6, 16, 1, '', 5, 250, 1, '', 0, '2017-05-26 15:26:11', '2017-05-26 15:26:11'),
(36, 'email', 'Email', 6, 8, 1, '', 0, 250, 0, '', 0, '2017-05-26 15:26:11', '2017-05-26 15:26:11'),
(37, 'phone', 'Phone', 6, 14, 0, '', 0, 20, 0, '', 0, '2017-05-26 15:26:11', '2017-05-26 15:26:11'),
(38, 'website', 'Website', 6, 23, 0, 'http://', 0, 250, 0, '', 0, '2017-05-26 15:26:11', '2017-05-26 15:26:11'),
(39, 'assigned_to', 'Assigned to', 6, 7, 0, '0', 0, 0, 0, '@employees', 0, '2017-05-26 15:26:11', '2017-05-26 15:26:11'),
(40, 'connect_since', 'Connected Since', 6, 4, 0, 'date(\'Y-m-d\')', 0, 0, 0, '', 0, '2017-05-26 15:26:11', '2017-05-26 15:26:11'),
(41, 'address', 'Address', 6, 1, 0, '', 0, 1000, 1, '', 0, '2017-05-26 15:26:12', '2017-05-26 15:26:12'),
(42, 'city', 'City', 6, 19, 0, '', 0, 250, 1, '', 0, '2017-05-26 15:26:12', '2017-05-26 15:26:12'),
(43, 'description', 'Description', 6, 21, 0, '', 0, 1000, 0, '', 0, '2017-05-26 15:26:12', '2017-05-26 15:26:12'),
(44, 'profile_image', 'Profile Image', 6, 12, 0, '', 0, 250, 0, '', 0, '2017-05-26 15:26:12', '2017-05-26 15:26:12'),
(45, 'profile', 'Company Profile', 6, 9, 0, '', 0, 250, 0, '', 0, '2017-05-26 15:26:12', '2017-05-26 15:26:12'),
(46, 'name', 'Name', 7, 16, 1, '', 0, 250, 1, '', 0, '2017-05-26 15:26:15', '2017-05-26 15:26:15'),
(47, 'file_name', 'File Name', 7, 19, 1, '', 0, 250, 1, '', 0, '2017-05-26 15:26:16', '2017-05-26 15:26:16'),
(48, 'backup_size', 'File Size', 7, 19, 0, '0', 0, 10, 1, '', 0, '2017-05-26 15:26:16', '2017-05-26 15:26:16'),
(49, 'name', 'Name', 8, 16, 1, '', 1, 250, 1, '', 0, '2017-05-26 15:26:18', '2017-05-26 15:26:18'),
(50, 'display_name', 'Display Name', 8, 19, 0, '', 0, 250, 1, '', 0, '2017-05-26 15:26:18', '2017-05-26 15:26:18'),
(51, 'description', 'Description', 8, 21, 0, '', 0, 1000, 0, '', 0, '2017-05-26 15:26:18', '2017-05-26 15:26:18'),
(171, 'designation', 'Designation', 1, 19, 0, '', 0, 256, 1, '', 0, '2017-08-20 04:33:54', '2017-08-20 04:34:21'),
(172, 'gender', 'Gender', 1, 18, 0, 'Male', 0, 0, 1, '[\"Male\",\"Female\"]', 0, '2017-08-20 04:35:21', '2017-08-20 04:35:21'),
(173, 'mobile', 'Mobile', 1, 14, 0, '', 10, 20, 1, '', 0, '2017-08-20 04:36:18', '2017-08-20 04:36:18'),
(174, 'dept', 'Department', 1, 7, 0, '0', 0, 0, 0, '@departments', 0, '2017-08-20 04:37:21', '2017-08-20 04:37:21'),
(175, 'city', 'City', 1, 19, 0, '', 0, 50, 0, '', 0, '2017-08-20 04:38:15', '2017-08-20 04:38:15'),
(176, 'address', 'Address', 1, 19, 0, '', 0, 1000, 0, '', 0, '2017-08-20 04:38:43', '2017-08-20 04:38:43'),
(182, 'role_id', 'User Role', 1, 7, 0, '', 0, 0, 1, '@roles', 0, '2017-08-20 06:33:14', '2017-10-04 10:51:09'),
(263, 'username', 'Username', 65, 22, 1, '', 0, 256, 1, '', 0, '2017-10-05 20:56:09', '2017-10-05 20:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `module_field_types`
--

CREATE TABLE `module_field_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_field_types`
--

INSERT INTO `module_field_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Address', '2017-05-26 15:25:41', '2017-05-26 15:25:41'),
(2, 'Checkbox', '2017-05-26 15:25:41', '2017-05-26 15:25:41'),
(3, 'Currency', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(4, 'Date', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(5, 'Datetime', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(6, 'Decimal', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(7, 'Dropdown', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(8, 'Email', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(9, 'File', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(10, 'Float', '2017-05-26 15:25:42', '2017-05-26 15:25:42'),
(11, 'HTML', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(12, 'Image', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(13, 'Integer', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(14, 'Mobile', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(15, 'Multiselect', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(16, 'Name', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(17, 'Password', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(18, 'Radio', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(19, 'String', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(20, 'Taginput', '2017-05-26 15:25:43', '2017-05-26 15:25:43'),
(21, 'Textarea', '2017-05-26 15:25:44', '2017-05-26 15:25:44'),
(22, 'TextField', '2017-05-26 15:25:44', '2017-05-26 15:25:44'),
(23, 'URL', '2017-05-26 15:25:44', '2017-05-26 15:25:44'),
(24, 'Files', '2017-05-26 15:25:44', '2017-05-26 15:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://',
  `assigned_to` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `connect_since` date NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` int(11) NOT NULL,
  `profile` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ritesh@example.com', '9de65792975be0e7c80fa61b13eca1efde8cfc422112c3dc4521b3dc7c59d687', '2017-07-07 06:14:22'),
('wv.admin@mandemobile.com', 'ea7fe8aa87c85ba185503599b9368161bb095046c4d8b7c656670192c270789c', '2017-07-23 13:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN_PANEL', 'Admin Panel', 'Admin Panel Permission', NULL, '2017-05-26 15:26:37', '2017-05-26 15:26:37'),
(2, 'xcZXCZXC', 'ZXCZXCZX', 'cZXCZXCZXCZXC', '2017-07-10 14:59:41', '2017-07-10 14:58:05', '2017-07-10 14:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `parent`, `dept`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SUPER_ADMIN', 'HQ Staff (World Vision)', 'HQ Staff (World Vision)', 1, 1, NULL, '2017-05-26 15:26:31', '2017-05-26 15:26:31'),
(2, 'M&E_ASSOCIATE', 'M&E Associates (Coordinator, Officer, Others)', 'M&E Associates (coordinator, officer, others)', 3, 1, '2017-10-31 03:24:06', '2017-07-07 03:47:41', '2017-10-31 03:24:06'),
(3, 'M&E_MANAGER', 'M&E Manager (Regional)', 'M&E Manager', 8, 1, '2017-10-31 03:24:03', '2017-09-07 15:16:41', '2017-10-31 03:24:03'),
(5, 'FIELD_STAFF', 'Field Staff (Officer, Facilitator, Others)', 'Field Staff (officer, facilitator, others)', 2, 1, '2017-10-31 03:24:00', '2017-09-07 15:17:51', '2017-10-31 03:24:00'),
(8, 'NATIONAL_MANAGER', 'M&E Manager (National)', 'M&E Manager (National)', 9, 1, '2017-10-31 03:23:55', '2017-09-14 15:59:16', '2017-10-31 03:23:55'),
(9, 'DEPUTY_CHIEF_OF_PARTY', 'Deputy Chief of Party', 'Deputy Chief of Party', 1, 1, '2017-10-31 03:23:52', '2017-09-14 16:01:24', '2017-10-31 03:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE `role_module` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `acc_view` tinyint(1) NOT NULL,
  `acc_create` tinyint(1) NOT NULL,
  `acc_edit` tinyint(1) NOT NULL,
  `acc_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`id`, `role_id`, `module_id`, `acc_view`, `acc_create`, `acc_edit`, `acc_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(2, 1, 2, 1, 1, 1, 1, '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(3, 1, 3, 1, 1, 1, 1, '2017-05-26 15:26:33', '2017-05-26 15:26:33'),
(4, 1, 4, 1, 1, 1, 1, '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(5, 1, 5, 1, 1, 1, 1, '2017-05-26 15:26:35', '2017-05-26 15:26:35'),
(6, 1, 6, 1, 1, 1, 1, '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(7, 1, 7, 1, 1, 1, 1, '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(8, 1, 8, 1, 1, 1, 1, '2017-05-26 15:26:37', '2017-05-26 15:26:37'),
(16, 2, 1, 0, 0, 0, 0, '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(17, 2, 2, 1, 1, 1, 1, '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(18, 2, 3, 0, 0, 0, 0, '2017-07-07 03:47:43', '2017-07-07 03:47:43'),
(19, 2, 4, 0, 0, 0, 0, '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(20, 2, 5, 0, 0, 0, 0, '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(21, 2, 6, 0, 0, 0, 0, '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(22, 2, 7, 0, 0, 0, 0, '2017-07-07 03:47:46', '2017-07-07 03:47:46'),
(23, 2, 8, 0, 0, 0, 0, '2017-07-07 03:47:47', '2017-07-07 03:47:47'),
(24, 1, 9, 1, 1, 1, 1, '2017-07-10 12:58:08', '2017-07-10 12:58:08'),
(26, 1, 12, 1, 1, 1, 1, '2017-07-10 13:20:52', '2017-07-10 13:20:52'),
(27, 1, 10, 1, 1, 1, 1, '2017-07-10 13:22:54', '2017-07-10 13:22:54'),
(28, 1, 13, 1, 1, 1, 1, '2017-07-10 13:31:03', '2017-07-10 13:31:03'),
(29, 1, 14, 1, 1, 1, 1, '2017-07-10 13:34:18', '2017-07-10 13:34:18'),
(31, 1, 16, 1, 1, 1, 1, '2017-07-10 13:39:14', '2017-07-10 13:39:14'),
(32, 1, 17, 1, 1, 1, 1, '2017-07-10 13:41:20', '2017-07-10 13:41:20'),
(33, 1, 18, 1, 1, 1, 1, '2017-07-10 13:45:22', '2017-07-10 13:45:22'),
(34, 1, 19, 1, 1, 1, 1, '2017-07-10 14:16:25', '2017-07-10 14:16:25'),
(35, 1, 20, 1, 1, 1, 1, '2017-07-10 14:17:48', '2017-07-10 14:17:48'),
(36, 1, 21, 1, 1, 1, 1, '2017-07-10 14:23:01', '2017-07-10 14:23:01'),
(37, 1, 22, 1, 1, 1, 1, '2017-07-10 14:24:00', '2017-07-10 14:24:00'),
(38, 1, 23, 1, 1, 1, 1, '2017-07-10 14:28:34', '2017-07-10 14:28:34'),
(39, 1, 24, 1, 1, 1, 1, '2017-07-10 14:31:00', '2017-07-10 14:31:00'),
(40, 1, 25, 1, 1, 1, 1, '2017-07-10 14:33:34', '2017-07-10 14:33:34'),
(41, 1, 26, 1, 1, 1, 1, '2017-07-10 14:50:31', '2017-07-10 14:50:31'),
(42, 1, 27, 1, 1, 1, 1, '2017-07-10 14:55:14', '2017-07-10 14:55:14'),
(43, 1, 28, 1, 1, 1, 1, '2017-07-10 15:23:42', '2017-07-10 15:23:42'),
(44, 1, 30, 1, 1, 1, 1, '2017-07-10 16:43:58', '2017-07-10 16:43:58'),
(45, 1, 31, 1, 1, 1, 1, '2017-07-10 16:50:26', '2017-07-10 16:50:26'),
(46, 1, 32, 1, 1, 1, 1, '2017-07-10 17:06:33', '2017-07-10 17:06:33'),
(47, 1, 33, 1, 1, 1, 1, '2017-07-24 11:37:51', '2017-07-24 11:37:51'),
(48, 1, 34, 1, 1, 1, 1, '2017-07-24 11:42:38', '2017-07-24 11:42:38'),
(49, 1, 35, 1, 1, 1, 1, '2017-07-24 11:44:32', '2017-07-24 11:44:32'),
(50, 1, 37, 1, 1, 1, 1, '2017-07-24 12:10:50', '2017-07-24 12:10:50'),
(51, 1, 36, 1, 1, 1, 1, '2017-07-24 12:14:02', '2017-07-24 12:14:02'),
(52, 1, 38, 1, 1, 1, 1, '2017-07-25 16:31:40', '2017-07-25 16:31:40'),
(53, 1, 39, 1, 1, 1, 1, '2017-07-25 16:36:38', '2017-07-25 16:36:38'),
(55, 1, 41, 1, 1, 1, 1, '2017-07-30 13:30:27', '2017-07-30 13:30:27'),
(56, 1, 42, 1, 1, 1, 1, '2017-07-31 11:05:14', '2017-07-31 11:05:14'),
(57, 1, 43, 1, 1, 1, 1, '2017-08-02 13:12:04', '2017-08-02 13:12:04'),
(58, 1, 44, 1, 1, 1, 1, '2017-08-03 10:20:10', '2017-08-03 10:20:10'),
(60, 1, 46, 1, 1, 1, 1, '2017-08-15 11:03:56', '2017-08-15 11:03:56'),
(61, 1, 47, 1, 1, 1, 1, '2017-08-15 14:31:43', '2017-08-15 14:31:43'),
(62, 1, 48, 1, 1, 1, 1, '2017-08-24 09:20:10', '2017-08-24 09:20:10'),
(63, 1, 49, 1, 1, 1, 1, '2017-08-24 12:31:42', '2017-08-24 12:31:42'),
(64, 1, 50, 1, 1, 1, 1, '2017-08-31 07:31:48', '2017-08-31 07:31:48'),
(65, 3, 1, 0, 0, 0, 0, '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(66, 3, 2, 1, 1, 1, 1, '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(67, 3, 3, 0, 0, 0, 0, '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(68, 3, 4, 0, 0, 0, 0, '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(69, 3, 5, 0, 0, 0, 0, '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(70, 3, 6, 0, 0, 0, 0, '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(71, 3, 7, 0, 0, 0, 0, '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(72, 3, 8, 0, 0, 0, 0, '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(73, 3, 9, 0, 0, 0, 0, '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(74, 3, 10, 1, 0, 0, 0, '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(75, 3, 12, 0, 0, 0, 0, '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(76, 3, 13, 1, 0, 0, 0, '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(77, 3, 14, 1, 0, 0, 0, '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(78, 3, 16, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(79, 3, 17, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(80, 3, 18, 1, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(81, 3, 19, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(82, 3, 20, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(83, 3, 21, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(84, 3, 22, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(85, 3, 23, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(86, 3, 24, 0, 0, 0, 0, '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(87, 3, 25, 0, 0, 0, 0, '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(88, 3, 26, 0, 0, 0, 0, '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(89, 3, 27, 0, 0, 0, 0, '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(90, 3, 28, 0, 0, 0, 0, '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(91, 3, 30, 0, 0, 0, 0, '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(92, 3, 31, 0, 0, 0, 0, '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(93, 3, 32, 1, 0, 0, 0, '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(94, 3, 33, 0, 0, 0, 0, '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(95, 3, 34, 0, 0, 0, 0, '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(96, 3, 35, 1, 1, 1, 1, '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(97, 3, 36, 1, 1, 1, 1, '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(98, 3, 37, 1, 1, 1, 1, '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(99, 3, 38, 1, 1, 1, 1, '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(100, 3, 39, 1, 1, 1, 1, '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(101, 3, 41, 1, 1, 1, 1, '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(102, 3, 42, 1, 1, 1, 1, '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(103, 3, 43, 1, 1, 1, 1, '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(104, 3, 44, 1, 1, 1, 1, '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(105, 3, 46, 1, 1, 1, 1, '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(106, 3, 47, 1, 1, 1, 1, '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(107, 3, 48, 0, 0, 0, 0, '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(108, 3, 49, 0, 0, 0, 0, '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(109, 3, 50, 1, 1, 1, 1, '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(155, 5, 1, 0, 0, 0, 0, '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(156, 5, 2, 1, 1, 1, 1, '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(157, 5, 3, 0, 0, 0, 0, '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(158, 5, 4, 0, 0, 0, 0, '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(159, 5, 5, 0, 0, 0, 0, '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(160, 5, 6, 0, 0, 0, 0, '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(161, 5, 7, 0, 0, 0, 0, '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(162, 5, 8, 0, 0, 0, 0, '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(163, 5, 9, 0, 0, 0, 0, '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(164, 5, 10, 0, 0, 0, 0, '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(165, 5, 12, 0, 0, 0, 0, '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(166, 5, 13, 0, 0, 0, 0, '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(167, 5, 14, 0, 0, 0, 0, '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(168, 5, 16, 0, 0, 0, 0, '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(169, 5, 17, 0, 0, 0, 0, '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(170, 5, 18, 0, 0, 0, 0, '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(171, 5, 19, 0, 0, 0, 0, '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(172, 5, 20, 0, 0, 0, 0, '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(173, 5, 21, 0, 0, 0, 0, '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(174, 5, 22, 0, 0, 0, 0, '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(175, 5, 23, 0, 0, 0, 0, '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(176, 5, 24, 0, 0, 0, 0, '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(177, 5, 25, 0, 0, 0, 0, '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(178, 5, 26, 0, 0, 0, 0, '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(179, 5, 27, 0, 0, 0, 0, '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(180, 5, 28, 0, 0, 0, 0, '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(181, 5, 30, 0, 0, 0, 0, '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(182, 5, 31, 0, 0, 0, 0, '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(183, 5, 32, 0, 0, 0, 0, '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(184, 5, 33, 0, 0, 0, 0, '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(185, 5, 34, 0, 0, 0, 0, '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(186, 5, 35, 0, 0, 0, 0, '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(187, 5, 36, 1, 1, 1, 1, '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(188, 5, 37, 0, 0, 0, 0, '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(189, 5, 38, 0, 0, 0, 0, '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(190, 5, 39, 1, 1, 1, 1, '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(191, 5, 41, 0, 0, 0, 0, '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(192, 5, 42, 0, 0, 0, 0, '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(193, 5, 43, 0, 0, 0, 0, '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(194, 5, 44, 1, 1, 1, 1, '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(195, 5, 46, 1, 1, 1, 1, '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(196, 5, 47, 1, 1, 1, 1, '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(197, 5, 48, 0, 0, 0, 0, '2017-09-07 15:18:03', '2017-09-07 15:18:03'),
(198, 5, 49, 0, 0, 0, 0, '2017-09-07 15:18:03', '2017-09-07 15:18:03'),
(199, 5, 50, 0, 0, 0, 0, '2017-09-07 15:18:03', '2017-09-07 15:18:03'),
(290, 2, 10, 1, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(291, 2, 13, 1, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(292, 2, 14, 1, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(293, 2, 18, 1, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(294, 2, 36, 1, 1, 1, 1, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(295, 2, 41, 1, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(296, 2, 42, 1, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(297, 2, 43, 1, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(298, 2, 44, 1, 1, 1, 1, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(299, 2, 46, 1, 1, 1, 1, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(300, 2, 47, 1, 1, 1, 1, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(301, 2, 48, 0, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(302, 2, 49, 0, 0, 0, 0, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(303, 2, 50, 1, 1, 1, 1, '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(304, 1, 51, 1, 1, 1, 1, '2017-09-08 18:23:40', '2017-09-08 18:23:40'),
(305, 1, 52, 1, 1, 1, 1, '2017-09-12 08:15:15', '2017-09-12 08:15:15'),
(306, 1, 53, 1, 1, 1, 1, '2017-09-13 13:30:45', '2017-09-13 13:30:45'),
(307, 2, 9, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(308, 2, 12, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(309, 2, 16, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(310, 2, 17, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(311, 2, 19, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(312, 2, 20, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(313, 2, 21, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(314, 2, 22, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(315, 2, 23, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(316, 2, 24, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(317, 2, 25, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(318, 2, 26, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(319, 2, 27, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(320, 2, 28, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(321, 2, 30, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(322, 2, 31, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(323, 2, 32, 1, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(324, 2, 33, 1, 1, 1, 1, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(325, 2, 34, 1, 1, 1, 1, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(326, 2, 35, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(327, 2, 37, 1, 1, 1, 1, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(328, 2, 38, 1, 1, 1, 1, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(329, 2, 39, 1, 1, 1, 1, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(330, 2, 51, 0, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(331, 2, 52, 1, 0, 0, 0, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(332, 2, 53, 1, 1, 1, 1, '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(333, 8, 1, 0, 0, 0, 0, '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(334, 8, 2, 1, 1, 1, 1, '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(335, 8, 3, 0, 0, 0, 0, '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(336, 8, 4, 0, 0, 0, 0, '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(337, 8, 5, 0, 0, 0, 0, '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(338, 8, 6, 0, 0, 0, 0, '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(339, 8, 7, 0, 0, 0, 0, '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(340, 8, 8, 0, 0, 0, 0, '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(341, 8, 9, 0, 0, 0, 0, '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(342, 8, 10, 1, 0, 0, 0, '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(343, 8, 12, 0, 0, 0, 0, '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(344, 8, 13, 1, 1, 1, 1, '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(345, 8, 14, 1, 1, 1, 1, '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(346, 8, 16, 0, 0, 0, 0, '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(347, 8, 17, 0, 0, 0, 0, '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(348, 8, 18, 1, 1, 1, 1, '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(349, 8, 19, 0, 0, 0, 0, '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(350, 8, 20, 0, 0, 0, 0, '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(351, 8, 21, 0, 0, 0, 0, '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(352, 8, 22, 0, 0, 0, 0, '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(353, 8, 23, 0, 0, 0, 0, '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(354, 8, 24, 0, 0, 0, 0, '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(355, 8, 25, 0, 0, 0, 0, '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(356, 8, 26, 0, 0, 0, 0, '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(357, 8, 27, 0, 0, 0, 0, '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(358, 8, 28, 0, 0, 0, 0, '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(359, 8, 30, 0, 0, 0, 0, '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(360, 8, 31, 0, 0, 0, 0, '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(361, 8, 32, 1, 0, 0, 0, '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(362, 8, 33, 0, 0, 0, 0, '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(363, 8, 34, 1, 1, 1, 1, '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(364, 8, 35, 1, 1, 1, 1, '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(365, 8, 36, 1, 1, 1, 1, '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(366, 8, 37, 1, 1, 1, 1, '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(367, 8, 38, 1, 1, 1, 1, '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(368, 8, 39, 1, 1, 1, 1, '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(369, 8, 41, 1, 1, 1, 1, '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(370, 8, 42, 1, 1, 1, 1, '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(371, 8, 43, 1, 1, 1, 1, '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(372, 8, 44, 1, 1, 1, 1, '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(373, 8, 46, 1, 1, 1, 1, '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(374, 8, 47, 1, 1, 1, 1, '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(375, 8, 48, 1, 1, 1, 1, '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(376, 8, 49, 1, 1, 1, 1, '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(377, 8, 50, 1, 1, 1, 1, '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(378, 8, 51, 0, 0, 0, 0, '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(379, 8, 52, 1, 1, 1, 1, '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(380, 8, 53, 1, 1, 1, 1, '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(381, 9, 1, 1, 1, 1, 1, '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(382, 9, 2, 1, 1, 1, 1, '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(383, 9, 3, 1, 1, 1, 1, '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(384, 9, 4, 1, 1, 1, 1, '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(385, 9, 5, 1, 1, 1, 1, '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(386, 9, 6, 1, 1, 1, 1, '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(387, 9, 7, 1, 1, 1, 1, '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(388, 9, 8, 1, 1, 1, 1, '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(389, 9, 9, 1, 1, 1, 1, '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(390, 9, 10, 1, 1, 1, 1, '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(391, 9, 12, 1, 1, 1, 1, '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(392, 9, 13, 1, 1, 1, 1, '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(393, 9, 14, 1, 1, 1, 1, '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(394, 9, 16, 1, 1, 1, 1, '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(395, 9, 17, 1, 1, 1, 1, '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(396, 9, 18, 1, 1, 1, 1, '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(397, 9, 19, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(398, 9, 20, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(399, 9, 21, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(400, 9, 22, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(401, 9, 23, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(402, 9, 24, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(403, 9, 25, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(404, 9, 26, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(405, 9, 27, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(406, 9, 28, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(407, 9, 30, 1, 1, 1, 1, '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(408, 9, 31, 1, 1, 1, 1, '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(409, 9, 32, 1, 1, 1, 1, '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(410, 9, 33, 1, 1, 1, 1, '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(411, 9, 34, 1, 1, 1, 1, '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(412, 9, 35, 1, 1, 1, 1, '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(413, 9, 36, 1, 1, 1, 1, '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(414, 9, 37, 1, 1, 1, 1, '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(415, 9, 38, 1, 1, 1, 1, '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(416, 9, 39, 1, 1, 1, 1, '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(417, 9, 41, 1, 1, 1, 1, '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(418, 9, 42, 1, 1, 1, 1, '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(419, 9, 43, 1, 1, 1, 1, '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(420, 9, 44, 1, 1, 1, 1, '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(421, 9, 46, 1, 1, 1, 1, '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(422, 9, 47, 1, 1, 1, 1, '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(423, 9, 48, 1, 1, 1, 1, '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(424, 9, 49, 1, 1, 1, 1, '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(425, 9, 50, 1, 1, 1, 1, '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(426, 9, 51, 1, 1, 1, 1, '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(427, 9, 52, 1, 1, 1, 1, '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(428, 9, 53, 1, 1, 1, 1, '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(429, 1, 54, 1, 1, 1, 1, '2017-09-15 19:44:29', '2017-09-15 19:44:29'),
(430, 5, 51, 0, 0, 0, 0, '2017-09-15 19:50:16', '2017-09-15 19:50:16'),
(431, 5, 52, 1, 0, 0, 0, '2017-09-15 19:50:16', '2017-09-15 19:50:16'),
(432, 5, 53, 1, 1, 1, 1, '2017-09-15 19:50:16', '2017-09-15 19:50:16'),
(433, 5, 54, 0, 0, 0, 0, '2017-09-15 19:50:16', '2017-09-15 19:50:16'),
(434, 2, 54, 1, 1, 1, 1, '2017-09-15 19:55:13', '2017-09-15 19:55:13'),
(435, 1, 55, 1, 1, 1, 1, '2017-09-18 13:00:35', '2017-09-18 13:00:35'),
(436, 1, 57, 1, 1, 1, 1, '2017-09-21 08:46:30', '2017-09-21 08:46:30'),
(437, 1, 58, 1, 1, 1, 1, '2017-09-21 12:48:15', '2017-09-21 12:48:15'),
(438, 1, 59, 1, 1, 1, 1, '2017-09-25 13:09:06', '2017-09-25 13:09:06'),
(439, 1, 60, 1, 1, 1, 1, '2017-09-25 13:16:25', '2017-09-25 13:16:25'),
(440, 1, 61, 1, 1, 1, 1, '2017-09-25 14:41:44', '2017-09-25 14:41:44'),
(441, 1, 62, 1, 1, 1, 1, '2017-10-01 19:48:50', '2017-10-01 19:48:50'),
(443, 1, 64, 1, 1, 1, 1, '2017-10-02 10:56:29', '2017-10-02 10:56:29'),
(444, 3, 51, 0, 0, 0, 0, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(445, 3, 52, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(446, 3, 53, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(447, 3, 54, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(448, 3, 55, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(449, 3, 57, 0, 0, 0, 0, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(450, 3, 58, 0, 0, 0, 0, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(451, 3, 59, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(452, 3, 60, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(453, 3, 61, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(454, 3, 62, 0, 0, 0, 0, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(456, 3, 64, 1, 1, 1, 1, '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(457, 8, 54, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(458, 8, 55, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(459, 8, 57, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(460, 8, 58, 0, 0, 0, 0, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(461, 8, 59, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(462, 8, 60, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(463, 8, 61, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(464, 8, 62, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(466, 8, 64, 1, 1, 1, 1, '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(467, 2, 55, 1, 0, 0, 0, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(468, 2, 57, 0, 0, 0, 0, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(469, 2, 58, 0, 0, 0, 0, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(470, 2, 59, 1, 1, 1, 1, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(471, 2, 60, 1, 1, 1, 1, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(472, 2, 61, 1, 1, 1, 1, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(473, 2, 62, 0, 0, 0, 0, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(475, 2, 64, 1, 1, 1, 1, '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(476, 9, 54, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(477, 9, 55, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(478, 9, 57, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(479, 9, 58, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(480, 9, 59, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(481, 9, 60, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(482, 9, 61, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(483, 9, 62, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(485, 9, 64, 1, 1, 1, 1, '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(486, 5, 55, 1, 0, 0, 0, '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(487, 5, 57, 0, 0, 0, 0, '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(488, 5, 58, 0, 0, 0, 0, '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(489, 5, 59, 1, 1, 1, 1, '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(490, 5, 60, 1, 1, 1, 1, '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(491, 5, 61, 1, 1, 1, 1, '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(493, 5, 62, 0, 0, 0, 0, '2017-10-05 20:23:03', '2017-10-05 20:23:03'),
(494, 5, 64, 0, 0, 0, 0, '2017-10-05 20:23:03', '2017-10-05 20:23:03'),
(495, 1, 65, 1, 1, 1, 1, '2017-10-05 20:56:22', '2017-10-05 20:56:22'),
(496, 2, 65, 1, 1, 1, 1, '2017-10-05 21:10:30', '2017-10-05 21:10:30'),
(497, 8, 65, 1, 1, 1, 1, '2017-10-05 21:24:39', '2017-10-05 21:24:39'),
(498, 3, 65, 1, 1, 1, 1, '2017-10-05 21:25:41', '2017-10-05 21:25:41'),
(499, 5, 65, 1, 1, 1, 1, '2017-10-05 21:27:32', '2017-10-05 21:27:32'),
(500, 9, 65, 1, 1, 1, 1, '2017-10-05 21:29:11', '2017-10-05 21:29:11'),
(502, 1, 68, 1, 1, 1, 1, '2017-10-06 14:24:57', '2017-10-06 14:24:57'),
(503, 1, 67, 1, 1, 1, 1, '2017-10-06 14:32:06', '2017-10-06 14:32:06'),
(504, 2, 67, 0, 0, 0, 0, '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(505, 3, 67, 0, 0, 0, 0, '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(506, 5, 67, 0, 0, 0, 0, '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(507, 8, 67, 1, 1, 1, 1, '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(508, 9, 67, 1, 1, 1, 1, '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(509, 1, 69, 1, 1, 1, 1, '2017-10-07 11:32:10', '2017-10-07 11:32:10'),
(510, 1, 70, 1, 1, 1, 1, '2017-10-07 11:35:47', '2017-10-07 11:35:47'),
(517, 1, 72, 1, 1, 1, 1, '2017-10-09 08:38:13', '2017-10-09 08:38:13'),
(518, 2, 72, 0, 0, 0, 0, '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(519, 3, 72, 0, 0, 0, 0, '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(520, 5, 72, 0, 0, 0, 0, '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(521, 8, 72, 1, 1, 1, 1, '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(522, 9, 72, 1, 1, 1, 1, '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(523, 1, 73, 1, 1, 1, 1, '2017-10-09 09:08:02', '2017-10-09 09:08:02'),
(524, 1, 74, 1, 1, 1, 1, '2017-10-09 09:13:48', '2017-10-09 09:13:48'),
(525, 2, 69, 1, 1, 1, 1, '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(526, 3, 69, 1, 1, 1, 1, '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(527, 5, 69, 1, 1, 1, 1, '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(528, 8, 69, 1, 1, 1, 1, '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(529, 9, 69, 1, 1, 1, 1, '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(530, 1, 75, 1, 1, 1, 1, '2017-10-17 15:29:16', '2017-10-17 15:29:16'),
(531, 1, 76, 1, 1, 1, 1, '2017-10-17 19:33:49', '2017-10-17 19:33:49'),
(532, 1, 77, 1, 1, 1, 1, '2017-10-22 18:14:05', '2017-10-22 18:14:05'),
(533, 1, 78, 1, 1, 1, 1, '2017-10-23 16:45:49', '2017-10-23 16:45:49'),
(534, 1, 79, 1, 1, 1, 1, '2017-10-23 19:31:53', '2017-10-23 19:31:53'),
(535, 1, 80, 1, 1, 1, 1, '2017-10-24 03:13:34', '2017-10-24 03:13:34'),
(536, 1, 81, 1, 1, 1, 1, '2017-10-25 00:18:18', '2017-10-25 00:18:18'),
(537, 1, 82, 1, 1, 1, 1, '2017-10-29 20:25:14', '2017-10-29 20:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_module_fields`
--

CREATE TABLE `role_module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `access` enum('invisible','readonly','write') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module_fields`
--

INSERT INTO `role_module_fields` (`id`, `role_id`, `field_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(2, 1, 2, 'invisible', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(3, 1, 3, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(4, 1, 4, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(5, 1, 5, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(6, 1, 6, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(7, 1, 7, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(8, 1, 8, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(9, 1, 9, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(10, 1, 10, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(11, 1, 11, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(12, 1, 12, 'write', '2017-05-26 15:26:32', '2017-05-26 15:26:32'),
(13, 1, 13, 'write', '2017-05-26 15:26:33', '2017-05-26 15:26:33'),
(14, 1, 14, 'write', '2017-05-26 15:26:33', '2017-05-26 15:26:33'),
(15, 1, 15, 'write', '2017-05-26 15:26:33', '2017-05-26 15:26:33'),
(16, 1, 16, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(17, 1, 17, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(18, 1, 18, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(19, 1, 19, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(21, 1, 21, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(22, 1, 22, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(23, 1, 23, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(24, 1, 24, 'write', '2017-05-26 15:26:34', '2017-05-26 15:26:34'),
(30, 1, 30, 'write', '2017-05-26 15:26:35', '2017-05-26 15:26:35'),
(31, 1, 31, 'write', '2017-05-26 15:26:35', '2017-05-26 15:26:35'),
(32, 1, 32, 'write', '2017-05-26 15:26:35', '2017-05-26 15:26:35'),
(33, 1, 33, 'write', '2017-05-26 15:26:35', '2017-05-26 15:26:35'),
(34, 1, 34, 'write', '2017-05-26 15:26:35', '2017-05-26 15:26:35'),
(35, 1, 35, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(36, 1, 36, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(37, 1, 37, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(38, 1, 38, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(39, 1, 39, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(40, 1, 40, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(41, 1, 41, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(42, 1, 42, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(43, 1, 43, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(44, 1, 44, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(45, 1, 45, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(46, 1, 46, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(47, 1, 47, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(48, 1, 48, 'write', '2017-05-26 15:26:36', '2017-05-26 15:26:36'),
(49, 1, 49, 'write', '2017-05-26 15:26:37', '2017-05-26 15:26:37'),
(50, 1, 50, 'write', '2017-05-26 15:26:37', '2017-05-26 15:26:37'),
(51, 1, 51, 'write', '2017-05-26 15:26:37', '2017-05-26 15:26:37'),
(72, 2, 1, 'readonly', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(73, 2, 2, 'readonly', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(74, 2, 3, 'readonly', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(75, 2, 4, 'invisible', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(76, 2, 5, 'readonly', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(77, 2, 6, 'write', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(78, 2, 7, 'write', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(79, 2, 8, 'write', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(80, 2, 9, 'write', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(81, 2, 10, 'write', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(82, 2, 11, 'write', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(83, 2, 12, 'write', '2017-07-07 03:47:42', '2017-07-07 03:47:42'),
(84, 2, 13, 'readonly', '2017-07-07 03:47:43', '2017-07-07 03:47:43'),
(85, 2, 14, 'readonly', '2017-07-07 03:47:43', '2017-07-07 03:47:43'),
(86, 2, 15, 'readonly', '2017-07-07 03:47:43', '2017-07-07 03:47:43'),
(87, 2, 16, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(88, 2, 17, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(89, 2, 18, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(90, 2, 19, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(92, 2, 21, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(93, 2, 22, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(94, 2, 23, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(95, 2, 24, 'readonly', '2017-07-07 03:47:44', '2017-07-07 03:47:44'),
(101, 2, 30, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(102, 2, 31, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(103, 2, 32, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(104, 2, 33, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(105, 2, 34, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(106, 2, 35, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(107, 2, 36, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(108, 2, 37, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(109, 2, 38, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(110, 2, 39, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(111, 2, 40, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(112, 2, 41, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(113, 2, 42, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(114, 2, 43, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(115, 2, 44, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(116, 2, 45, 'readonly', '2017-07-07 03:47:45', '2017-07-07 03:47:45'),
(117, 2, 46, 'readonly', '2017-07-07 03:47:46', '2017-07-07 03:47:46'),
(118, 2, 47, 'readonly', '2017-07-07 03:47:46', '2017-07-07 03:47:46'),
(119, 2, 48, 'readonly', '2017-07-07 03:47:46', '2017-07-07 03:47:46'),
(120, 2, 49, 'readonly', '2017-07-07 03:47:47', '2017-07-07 03:47:47'),
(121, 2, 50, 'readonly', '2017-07-07 03:47:47', '2017-07-07 03:47:47'),
(122, 2, 51, 'readonly', '2017-07-07 03:47:47', '2017-07-07 03:47:47'),
(123, 1, 52, 'write', '2017-07-10 12:56:27', '2017-07-10 12:56:27'),
(124, 1, 53, 'write', '2017-07-10 12:56:54', '2017-07-10 12:56:54'),
(125, 1, 54, 'write', '2017-07-10 12:57:17', '2017-07-10 12:57:17'),
(126, 1, 55, 'write', '2017-07-10 12:57:35', '2017-07-10 12:57:35'),
(127, 1, 56, 'write', '2017-07-10 13:13:04', '2017-07-10 13:13:04'),
(128, 1, 57, 'write', '2017-07-10 13:14:06', '2017-07-10 13:14:06'),
(130, 1, 59, 'write', '2017-07-10 13:20:46', '2017-07-10 13:20:46'),
(131, 1, 60, 'write', '2017-07-10 13:21:51', '2017-07-10 13:21:51'),
(132, 1, 61, 'write', '2017-07-10 13:22:33', '2017-07-10 13:22:33'),
(133, 1, 62, 'write', '2017-07-10 13:29:48', '2017-07-10 13:29:48'),
(134, 1, 63, 'write', '2017-07-10 13:30:27', '2017-07-10 13:30:27'),
(135, 1, 64, 'write', '2017-07-10 13:33:16', '2017-07-10 13:33:16'),
(136, 1, 65, 'write', '2017-07-10 13:33:37', '2017-07-10 13:33:37'),
(137, 1, 66, 'write', '2017-07-10 13:34:11', '2017-07-10 13:34:11'),
(139, 1, 68, 'write', '2017-07-10 13:39:00', '2017-07-10 13:39:00'),
(140, 1, 69, 'write', '2017-07-10 13:41:14', '2017-07-10 13:41:14'),
(141, 1, 70, 'write', '2017-07-10 13:43:59', '2017-07-10 13:43:59'),
(142, 1, 71, 'write', '2017-07-10 13:44:19', '2017-07-10 13:44:19'),
(143, 1, 72, 'write', '2017-07-10 13:44:48', '2017-07-10 13:44:48'),
(144, 1, 73, 'write', '2017-07-10 13:46:36', '2017-07-10 13:46:36'),
(145, 1, 74, 'write', '2017-07-10 14:16:19', '2017-07-10 14:16:19'),
(146, 1, 75, 'write', '2017-07-10 14:17:40', '2017-07-10 14:17:40'),
(147, 1, 76, 'write', '2017-07-10 14:22:54', '2017-07-10 14:22:54'),
(148, 1, 77, 'write', '2017-07-10 14:23:53', '2017-07-10 14:23:53'),
(149, 1, 78, 'write', '2017-07-10 14:28:15', '2017-07-10 14:28:15'),
(150, 1, 79, 'write', '2017-07-10 14:30:54', '2017-07-10 14:30:54'),
(151, 1, 80, 'write', '2017-07-10 14:33:26', '2017-07-10 14:33:26'),
(152, 1, 81, 'write', '2017-07-10 14:38:19', '2017-07-10 14:38:19'),
(153, 1, 82, 'write', '2017-07-10 14:54:59', '2017-07-10 14:54:59'),
(154, 1, 83, 'write', '2017-07-10 15:23:33', '2017-07-10 15:23:33'),
(155, 1, 85, 'write', '2017-07-10 16:43:52', '2017-07-10 16:43:52'),
(156, 1, 86, 'write', '2017-07-10 16:45:46', '2017-07-10 16:45:46'),
(158, 1, 88, 'write', '2017-07-10 16:55:35', '2017-07-10 16:55:35'),
(159, 1, 89, 'write', '2017-07-10 16:55:57', '2017-07-10 16:55:57'),
(160, 1, 90, 'write', '2017-07-10 16:57:03', '2017-07-10 16:57:03'),
(161, 1, 91, 'write', '2017-07-10 16:57:26', '2017-07-10 16:57:26'),
(162, 1, 92, 'write', '2017-07-10 16:57:49', '2017-07-10 16:57:49'),
(163, 1, 93, 'write', '2017-07-10 16:58:25', '2017-07-10 16:58:25'),
(164, 1, 94, 'write', '2017-07-10 16:58:54', '2017-07-10 16:58:54'),
(165, 1, 95, 'write', '2017-07-10 16:59:26', '2017-07-10 16:59:26'),
(166, 1, 96, 'write', '2017-07-10 17:00:13', '2017-07-10 17:00:13'),
(167, 1, 97, 'write', '2017-07-10 17:00:47', '2017-07-10 17:00:47'),
(168, 1, 98, 'write', '2017-07-10 17:01:35', '2017-07-10 17:01:35'),
(169, 1, 99, 'write', '2017-07-10 17:02:21', '2017-07-10 17:02:21'),
(170, 1, 100, 'write', '2017-07-10 17:02:49', '2017-07-10 17:02:49'),
(171, 1, 101, 'write', '2017-07-10 17:03:10', '2017-07-10 17:03:10'),
(172, 1, 102, 'write', '2017-07-10 17:03:33', '2017-07-10 17:03:33'),
(173, 1, 103, 'write', '2017-07-10 17:04:55', '2017-07-10 17:04:55'),
(174, 1, 104, 'write', '2017-07-10 17:05:20', '2017-07-10 17:05:20'),
(175, 1, 105, 'write', '2017-07-10 17:05:46', '2017-07-10 17:05:46'),
(176, 1, 106, 'write', '2017-07-10 17:06:15', '2017-07-10 17:06:15'),
(177, 1, 107, 'write', '2017-07-16 11:24:01', '2017-07-16 11:24:01'),
(180, 1, 110, 'write', '2017-07-20 13:13:54', '2017-07-20 13:13:54'),
(181, 1, 111, 'write', '2017-07-21 12:34:14', '2017-07-21 12:34:14'),
(182, 1, 112, 'write', '2017-07-23 14:26:43', '2017-07-23 14:26:43'),
(183, 1, 113, 'write', '2017-07-24 11:37:09', '2017-07-24 11:37:09'),
(184, 1, 114, 'write', '2017-07-24 11:37:39', '2017-07-24 11:37:39'),
(185, 1, 115, 'write', '2017-07-24 11:42:07', '2017-07-24 11:42:07'),
(186, 1, 116, 'write', '2017-07-24 11:42:30', '2017-07-24 11:42:30'),
(187, 1, 117, 'write', '2017-07-24 11:44:03', '2017-07-24 11:44:03'),
(188, 1, 118, 'write', '2017-07-24 11:44:23', '2017-07-24 11:44:23'),
(189, 1, 119, 'write', '2017-07-24 11:52:28', '2017-07-24 11:52:28'),
(190, 1, 120, 'write', '2017-07-24 12:10:40', '2017-07-24 12:10:40'),
(191, 1, 121, 'write', '2017-07-24 12:12:01', '2017-07-24 12:12:01'),
(192, 1, 122, 'write', '2017-07-24 12:13:25', '2017-07-24 12:13:25'),
(193, 1, 123, 'write', '2017-07-24 12:15:08', '2017-07-24 12:15:08'),
(194, 1, 124, 'write', '2017-07-24 12:19:14', '2017-07-24 12:19:14'),
(195, 1, 125, 'write', '2017-07-24 12:19:53', '2017-07-24 12:19:53'),
(196, 1, 126, 'write', '2017-07-24 12:39:38', '2017-07-24 12:39:38'),
(197, 1, 127, 'write', '2017-07-24 12:41:41', '2017-07-24 12:41:41'),
(198, 1, 129, 'write', '2017-07-25 16:30:01', '2017-07-25 16:30:01'),
(199, 1, 130, 'write', '2017-07-25 16:31:30', '2017-07-25 16:31:30'),
(200, 1, 131, 'write', '2017-07-25 16:32:43', '2017-07-25 16:32:43'),
(201, 1, 132, 'write', '2017-07-25 16:33:46', '2017-07-25 16:33:46'),
(202, 1, 133, 'write', '2017-07-25 16:36:27', '2017-07-25 16:36:27'),
(203, 1, 134, 'write', '2017-07-25 16:38:19', '2017-07-25 16:38:19'),
(207, 1, 138, 'write', '2017-07-30 13:30:27', '2017-07-30 13:30:27'),
(208, 1, 139, 'write', '2017-07-30 13:33:03', '2017-07-30 13:33:03'),
(209, 1, 140, 'write', '2017-07-30 13:34:35', '2017-07-30 13:34:35'),
(210, 1, 141, 'write', '2017-07-31 10:57:11', '2017-07-31 10:57:11'),
(211, 1, 142, 'write', '2017-07-31 10:58:29', '2017-07-31 10:58:29'),
(212, 1, 143, 'write', '2017-07-31 11:00:11', '2017-07-31 11:00:11'),
(216, 1, 147, 'write', '2017-07-31 11:03:51', '2017-07-31 11:03:51'),
(218, 1, 149, 'write', '2017-08-02 09:58:22', '2017-08-02 09:58:22'),
(219, 1, 150, 'write', '2017-08-02 09:59:35', '2017-08-02 09:59:35'),
(220, 1, 151, 'write', '2017-08-02 10:00:35', '2017-08-02 10:00:35'),
(221, 1, 152, 'write', '2017-08-02 12:09:12', '2017-08-02 12:09:12'),
(222, 1, 153, 'write', '2017-08-02 12:11:21', '2017-08-02 12:11:21'),
(223, 1, 154, 'write', '2017-08-02 13:05:24', '2017-08-02 13:05:24'),
(224, 1, 155, 'write', '2017-08-02 13:06:56', '2017-08-02 13:06:56'),
(225, 1, 156, 'write', '2017-08-02 13:07:39', '2017-08-02 13:07:39'),
(226, 1, 157, 'write', '2017-08-02 13:08:23', '2017-08-02 13:08:23'),
(227, 1, 158, 'write', '2017-08-02 13:11:40', '2017-08-02 13:11:40'),
(228, 1, 159, 'write', '2017-08-03 10:19:55', '2017-08-03 10:19:55'),
(229, 1, 160, 'write', '2017-08-10 06:29:55', '2017-08-10 06:29:55'),
(230, 1, 161, 'write', '2017-08-10 06:33:25', '2017-08-10 06:33:25'),
(231, 1, 162, 'write', '2017-08-10 06:35:15', '2017-08-10 06:35:15'),
(232, 1, 163, 'write', '2017-08-10 06:40:28', '2017-08-10 06:40:28'),
(235, 1, 166, 'write', '2017-08-15 11:03:38', '2017-08-15 11:03:38'),
(236, 1, 167, 'write', '2017-08-15 14:31:31', '2017-08-15 14:31:31'),
(237, 1, 168, 'write', '2017-08-17 02:49:58', '2017-08-17 02:49:58'),
(238, 1, 169, 'write', '2017-08-17 02:50:51', '2017-08-17 02:50:51'),
(239, 1, 170, 'write', '2017-08-18 10:42:03', '2017-08-18 10:42:03'),
(240, 1, 171, 'write', '2017-08-20 04:33:56', '2017-08-20 04:33:56'),
(241, 1, 172, 'write', '2017-08-20 04:35:22', '2017-08-20 04:35:22'),
(242, 1, 173, 'write', '2017-08-20 04:36:19', '2017-08-20 04:36:19'),
(243, 1, 174, 'write', '2017-08-20 04:37:23', '2017-08-20 04:37:23'),
(244, 1, 175, 'write', '2017-08-20 04:38:16', '2017-08-20 04:38:16'),
(245, 1, 176, 'write', '2017-08-20 04:38:44', '2017-08-20 04:38:44'),
(246, 1, 177, 'write', '2017-08-20 04:40:31', '2017-08-20 04:40:31'),
(247, 1, 178, 'write', '2017-08-20 04:41:19', '2017-08-20 04:41:19'),
(248, 1, 179, 'write', '2017-08-20 04:42:05', '2017-08-20 04:42:05'),
(249, 1, 180, 'write', '2017-08-20 04:42:43', '2017-08-20 04:42:43'),
(250, 1, 181, 'write', '2017-08-20 04:43:23', '2017-08-20 04:43:23'),
(251, 1, 182, 'write', '2017-08-20 06:33:17', '2017-08-20 06:33:17'),
(252, 1, 183, 'write', '2017-08-24 09:19:57', '2017-08-24 09:19:57'),
(253, 1, 184, 'write', '2017-08-24 12:31:32', '2017-08-24 12:31:32'),
(254, 1, 185, 'write', '2017-08-29 12:18:12', '2017-08-29 12:18:12'),
(255, 1, 186, 'write', '2017-08-30 10:06:33', '2017-08-30 10:06:33'),
(256, 1, 187, 'write', '2017-08-30 14:25:38', '2017-08-30 14:25:38'),
(257, 1, 188, 'write', '2017-08-31 07:30:14', '2017-08-31 07:30:14'),
(258, 1, 189, 'write', '2017-08-31 07:31:37', '2017-08-31 07:31:37'),
(259, 1, 190, 'write', '2017-09-05 11:57:29', '2017-09-05 11:57:29'),
(260, 3, 1, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(261, 3, 2, 'invisible', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(262, 3, 3, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(263, 3, 4, 'invisible', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(264, 3, 5, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(265, 3, 171, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(266, 3, 172, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(267, 3, 173, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(268, 3, 174, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(269, 3, 175, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(270, 3, 176, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(271, 3, 177, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(272, 3, 178, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(273, 3, 179, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(274, 3, 180, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(275, 3, 181, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(276, 3, 182, 'readonly', '2017-09-07 15:16:41', '2017-09-07 15:16:41'),
(277, 3, 6, 'readonly', '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(278, 3, 7, 'readonly', '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(279, 3, 8, 'readonly', '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(280, 3, 9, 'readonly', '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(281, 3, 10, 'readonly', '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(282, 3, 11, 'readonly', '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(283, 3, 12, 'readonly', '2017-09-07 15:16:42', '2017-09-07 15:16:42'),
(284, 3, 13, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(285, 3, 14, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(286, 3, 15, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(287, 3, 16, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(288, 3, 17, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(289, 3, 18, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(290, 3, 19, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(291, 3, 21, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(292, 3, 22, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(293, 3, 23, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(294, 3, 24, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(295, 3, 126, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(296, 3, 127, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(297, 3, 149, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(298, 3, 150, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(299, 3, 151, 'readonly', '2017-09-07 15:16:43', '2017-09-07 15:16:43'),
(300, 3, 30, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(301, 3, 31, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(302, 3, 32, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(303, 3, 33, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(304, 3, 34, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(305, 3, 35, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(306, 3, 36, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(307, 3, 37, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(308, 3, 38, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(309, 3, 39, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(310, 3, 40, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(311, 3, 41, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(312, 3, 42, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(313, 3, 43, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(314, 3, 44, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(315, 3, 45, 'readonly', '2017-09-07 15:16:45', '2017-09-07 15:16:45'),
(316, 3, 46, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(317, 3, 47, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(318, 3, 48, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(319, 3, 49, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(320, 3, 50, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(321, 3, 51, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(322, 3, 52, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(323, 3, 53, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(324, 3, 54, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(325, 3, 55, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(326, 3, 107, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(327, 3, 56, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(328, 3, 57, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(329, 3, 60, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(330, 3, 61, 'readonly', '2017-09-07 15:16:46', '2017-09-07 15:16:46'),
(331, 3, 59, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(332, 3, 62, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(333, 3, 110, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(334, 3, 63, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(335, 3, 160, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(336, 3, 161, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(337, 3, 64, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(338, 3, 65, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(339, 3, 66, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(342, 3, 73, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(343, 3, 162, 'readonly', '2017-09-07 15:16:47', '2017-09-07 15:16:47'),
(344, 3, 68, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(345, 3, 69, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(346, 3, 70, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(347, 3, 71, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(348, 3, 163, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(349, 3, 72, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(350, 3, 74, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(351, 3, 75, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(352, 3, 76, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(353, 3, 77, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(354, 3, 78, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(355, 3, 79, 'readonly', '2017-09-07 15:16:48', '2017-09-07 15:16:48'),
(356, 3, 80, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(357, 3, 81, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(358, 3, 82, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(359, 3, 83, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(360, 3, 85, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(361, 3, 111, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(362, 3, 86, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(363, 3, 88, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(364, 3, 89, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(365, 3, 90, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(366, 3, 91, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(367, 3, 92, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(368, 3, 93, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(369, 3, 94, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(370, 3, 95, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(371, 3, 96, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(372, 3, 97, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(373, 3, 98, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(374, 3, 99, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(375, 3, 100, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(376, 3, 101, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(377, 3, 102, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(378, 3, 103, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(379, 3, 104, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(380, 3, 105, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(381, 3, 106, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(382, 3, 112, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(383, 3, 186, 'readonly', '2017-09-07 15:16:49', '2017-09-07 15:16:49'),
(384, 3, 113, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(385, 3, 114, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(386, 3, 115, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(387, 3, 116, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(388, 3, 117, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(389, 3, 118, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(390, 3, 119, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(391, 3, 134, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(392, 3, 121, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(393, 3, 122, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(394, 3, 124, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(395, 3, 125, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(396, 3, 129, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(397, 3, 123, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(398, 3, 131, 'readonly', '2017-09-07 15:16:50', '2017-09-07 15:16:50'),
(399, 3, 120, 'readonly', '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(400, 3, 130, 'readonly', '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(401, 3, 132, 'readonly', '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(402, 3, 133, 'readonly', '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(403, 3, 138, 'write', '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(404, 3, 139, 'write', '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(405, 3, 140, 'write', '2017-09-07 15:16:51', '2017-09-07 15:16:51'),
(406, 3, 141, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(407, 3, 142, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(408, 3, 143, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(409, 3, 147, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(410, 3, 152, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(411, 3, 153, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(412, 3, 154, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(413, 3, 155, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(414, 3, 156, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(415, 3, 157, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(416, 3, 158, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(417, 3, 168, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(418, 3, 169, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(419, 3, 170, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(420, 3, 185, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(421, 3, 187, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(422, 3, 190, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(423, 3, 159, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(424, 3, 166, 'write', '2017-09-07 15:16:52', '2017-09-07 15:16:52'),
(425, 3, 167, 'write', '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(426, 3, 183, 'readonly', '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(427, 3, 184, 'readonly', '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(428, 3, 188, 'write', '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(429, 3, 189, 'write', '2017-09-07 15:16:53', '2017-09-07 15:16:53'),
(600, 5, 1, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(601, 5, 2, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(602, 5, 3, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(603, 5, 4, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(604, 5, 5, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(605, 5, 171, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(606, 5, 172, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(607, 5, 173, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(608, 5, 174, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(609, 5, 175, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(610, 5, 176, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(611, 5, 177, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(612, 5, 178, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(613, 5, 179, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(614, 5, 180, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(615, 5, 181, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(616, 5, 182, 'write', '2017-09-07 15:17:51', '2017-09-07 15:17:51'),
(617, 5, 6, 'write', '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(618, 5, 7, 'write', '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(619, 5, 8, 'write', '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(620, 5, 9, 'write', '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(621, 5, 10, 'write', '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(622, 5, 11, 'write', '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(623, 5, 12, 'write', '2017-09-07 15:17:52', '2017-09-07 15:17:52'),
(624, 5, 13, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(625, 5, 14, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(626, 5, 15, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(627, 5, 16, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(628, 5, 17, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(629, 5, 18, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(630, 5, 19, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(631, 5, 21, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(632, 5, 22, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(633, 5, 23, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(634, 5, 24, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(635, 5, 126, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(636, 5, 127, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(637, 5, 149, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(638, 5, 150, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(639, 5, 151, 'readonly', '2017-09-07 15:17:53', '2017-09-07 15:17:53'),
(640, 5, 30, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(641, 5, 31, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(642, 5, 32, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(643, 5, 33, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(644, 5, 34, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(645, 5, 35, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(646, 5, 36, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(647, 5, 37, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(648, 5, 38, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(649, 5, 39, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(650, 5, 40, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(651, 5, 41, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(652, 5, 42, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(653, 5, 43, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(654, 5, 44, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(655, 5, 45, 'readonly', '2017-09-07 15:17:54', '2017-09-07 15:17:54'),
(656, 5, 46, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(657, 5, 47, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(658, 5, 48, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(659, 5, 49, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(660, 5, 50, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(661, 5, 51, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(662, 5, 52, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(663, 5, 53, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(664, 5, 54, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(665, 5, 55, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(666, 5, 107, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(667, 5, 56, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(668, 5, 57, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(669, 5, 60, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(670, 5, 61, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(671, 5, 59, 'readonly', '2017-09-07 15:17:55', '2017-09-07 15:17:55'),
(672, 5, 62, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(673, 5, 110, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(674, 5, 63, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(675, 5, 160, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(676, 5, 161, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(677, 5, 64, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(678, 5, 65, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(679, 5, 66, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(682, 5, 73, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(683, 5, 162, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(684, 5, 68, 'readonly', '2017-09-07 15:17:56', '2017-09-07 15:17:56'),
(685, 5, 69, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(686, 5, 70, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(687, 5, 71, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(688, 5, 163, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(689, 5, 72, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(690, 5, 74, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(691, 5, 75, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(692, 5, 76, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(693, 5, 77, 'readonly', '2017-09-07 15:17:57', '2017-09-07 15:17:57'),
(694, 5, 78, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(695, 5, 79, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(696, 5, 80, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(697, 5, 81, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(698, 5, 82, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(699, 5, 83, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(700, 5, 85, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(701, 5, 111, 'readonly', '2017-09-07 15:17:58', '2017-09-07 15:17:58'),
(702, 5, 86, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(703, 5, 88, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(704, 5, 89, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(705, 5, 90, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(706, 5, 91, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(707, 5, 92, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(708, 5, 93, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(709, 5, 94, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(710, 5, 95, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(711, 5, 96, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(712, 5, 97, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(713, 5, 98, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(714, 5, 99, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(715, 5, 100, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(716, 5, 101, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(717, 5, 102, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(718, 5, 103, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(719, 5, 104, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(720, 5, 105, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(721, 5, 106, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(722, 5, 112, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(723, 5, 186, 'readonly', '2017-09-07 15:17:59', '2017-09-07 15:17:59'),
(724, 5, 113, 'readonly', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(725, 5, 114, 'readonly', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(726, 5, 115, 'readonly', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(727, 5, 116, 'readonly', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(728, 5, 117, 'readonly', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(729, 5, 118, 'readonly', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(730, 5, 119, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(731, 5, 134, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(732, 5, 121, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(733, 5, 122, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(734, 5, 124, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(735, 5, 125, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(736, 5, 129, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(737, 5, 123, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(738, 5, 131, 'write', '2017-09-07 15:18:00', '2017-09-07 15:18:00'),
(739, 5, 120, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(740, 5, 130, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(741, 5, 132, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(742, 5, 133, 'write', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(743, 5, 138, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(744, 5, 139, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(745, 5, 140, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(746, 5, 141, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(747, 5, 142, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(748, 5, 143, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(749, 5, 147, 'readonly', '2017-09-07 15:18:01', '2017-09-07 15:18:01'),
(750, 5, 152, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(751, 5, 153, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(752, 5, 154, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(753, 5, 155, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(754, 5, 156, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(755, 5, 157, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(756, 5, 158, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(757, 5, 168, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(758, 5, 169, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(759, 5, 170, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(760, 5, 185, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(761, 5, 187, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(762, 5, 190, 'readonly', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(763, 5, 159, 'write', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(764, 5, 166, 'write', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(765, 5, 167, 'write', '2017-09-07 15:18:02', '2017-09-07 15:18:02'),
(766, 5, 183, 'readonly', '2017-09-07 15:18:03', '2017-09-07 15:18:03'),
(767, 5, 184, 'readonly', '2017-09-07 15:18:03', '2017-09-07 15:18:03'),
(768, 5, 188, 'readonly', '2017-09-07 15:18:03', '2017-09-07 15:18:03'),
(769, 5, 189, 'readonly', '2017-09-07 15:18:03', '2017-09-07 15:18:03'),
(1110, 2, 171, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1111, 2, 172, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1112, 2, 173, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1113, 2, 174, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1114, 2, 175, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1115, 2, 176, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1116, 2, 177, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1117, 2, 178, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1118, 2, 179, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1119, 2, 180, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1120, 2, 181, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1121, 2, 182, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1122, 2, 126, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1123, 2, 127, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1124, 2, 149, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1125, 2, 150, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1126, 2, 151, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1127, 2, 52, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1128, 2, 53, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1129, 2, 54, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1130, 2, 55, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1131, 2, 107, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1132, 2, 56, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1133, 2, 57, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1134, 2, 60, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1135, 2, 61, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1136, 2, 59, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1137, 2, 62, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1138, 2, 110, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1139, 2, 63, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1140, 2, 160, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1141, 2, 161, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1142, 2, 64, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1143, 2, 65, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1144, 2, 66, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1147, 2, 73, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1148, 2, 162, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1149, 2, 68, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1150, 2, 69, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1151, 2, 70, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1152, 2, 71, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1153, 2, 163, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1154, 2, 72, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1155, 2, 74, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1156, 2, 75, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1157, 2, 76, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1158, 2, 77, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1159, 2, 78, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1160, 2, 79, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1161, 2, 80, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1162, 2, 81, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1163, 2, 82, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1164, 2, 83, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1165, 2, 85, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1166, 2, 111, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1167, 2, 86, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1168, 2, 88, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1169, 2, 89, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1170, 2, 90, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1171, 2, 91, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1172, 2, 92, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1173, 2, 93, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1174, 2, 94, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1175, 2, 95, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1176, 2, 96, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1177, 2, 97, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1178, 2, 98, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1179, 2, 99, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1180, 2, 100, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1181, 2, 101, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1182, 2, 102, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1183, 2, 103, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1184, 2, 104, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1185, 2, 105, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1186, 2, 106, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1187, 2, 112, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1188, 2, 186, 'readonly', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1189, 2, 113, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1190, 2, 114, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1191, 2, 115, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1192, 2, 116, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1193, 2, 117, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1194, 2, 118, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1195, 2, 119, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1196, 2, 134, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1197, 2, 121, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1198, 2, 122, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1199, 2, 124, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1200, 2, 125, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1201, 2, 129, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1202, 2, 123, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1203, 2, 131, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1204, 2, 120, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1205, 2, 130, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1206, 2, 132, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1207, 2, 133, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1208, 2, 138, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1209, 2, 139, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1210, 2, 140, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1211, 2, 141, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1212, 2, 142, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1213, 2, 143, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1214, 2, 147, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1215, 2, 152, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1216, 2, 153, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1217, 2, 154, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1218, 2, 155, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1219, 2, 156, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1220, 2, 157, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1221, 2, 158, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1222, 2, 168, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1223, 2, 169, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1224, 2, 170, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1225, 2, 185, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1226, 2, 187, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1227, 2, 190, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1228, 2, 159, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1229, 2, 166, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1230, 2, 167, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1231, 2, 183, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1232, 2, 184, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1233, 2, 188, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1234, 2, 189, 'write', '2017-09-08 08:45:21', '2017-09-08 08:45:21'),
(1239, 1, 195, 'write', '2017-09-11 06:33:04', '2017-09-11 06:33:04'),
(1240, 1, 196, 'write', '2017-09-11 06:33:24', '2017-09-11 06:33:24'),
(1241, 1, 197, 'write', '2017-09-11 06:34:06', '2017-09-11 06:34:06'),
(1242, 1, 198, 'write', '2017-09-11 06:34:26', '2017-09-11 06:34:26'),
(1243, 1, 199, 'write', '2017-09-12 08:15:05', '2017-09-12 08:15:05'),
(1244, 1, 200, 'write', '2017-09-13 13:26:33', '2017-09-13 13:26:33'),
(1245, 1, 201, 'write', '2017-09-13 13:27:05', '2017-09-13 13:27:05'),
(1246, 1, 202, 'write', '2017-09-13 13:27:41', '2017-09-13 13:27:41'),
(1247, 1, 203, 'write', '2017-09-13 13:28:06', '2017-09-13 13:28:06'),
(1248, 1, 204, 'write', '2017-09-13 13:28:30', '2017-09-13 13:28:30'),
(1249, 1, 205, 'write', '2017-09-13 13:28:46', '2017-09-13 13:28:46'),
(1250, 1, 206, 'write', '2017-09-13 13:29:44', '2017-09-13 13:29:44'),
(1251, 1, 207, 'write', '2017-09-13 13:30:11', '2017-09-13 13:30:11'),
(1252, 1, 208, 'write', '2017-09-13 13:33:25', '2017-09-13 13:33:25'),
(1253, 1, 209, 'write', '2017-09-13 13:34:29', '2017-09-13 13:34:29'),
(1254, 2, 208, 'readonly', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1255, 2, 209, 'readonly', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1256, 2, 195, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1257, 2, 196, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1258, 2, 197, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1259, 2, 198, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1260, 2, 199, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1261, 2, 200, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1262, 2, 201, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1263, 2, 202, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1264, 2, 203, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1265, 2, 204, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1266, 2, 205, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1267, 2, 206, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1268, 2, 207, 'write', '2017-09-14 15:49:03', '2017-09-14 15:49:03'),
(1269, 8, 1, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1270, 8, 2, 'invisible', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1271, 8, 3, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1272, 8, 4, 'invisible', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1273, 8, 5, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1274, 8, 171, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1275, 8, 172, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1276, 8, 173, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1277, 8, 174, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1278, 8, 175, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1279, 8, 176, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1280, 8, 177, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1281, 8, 178, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1282, 8, 179, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1283, 8, 180, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1284, 8, 181, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1285, 8, 182, 'readonly', '2017-09-14 15:59:16', '2017-09-14 15:59:16'),
(1286, 8, 6, 'write', '2017-09-14 15:59:17', '2017-09-14 15:59:17');
INSERT INTO `role_module_fields` (`id`, `role_id`, `field_id`, `access`, `created_at`, `updated_at`) VALUES
(1287, 8, 7, 'write', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1288, 8, 8, 'write', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1289, 8, 9, 'write', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1290, 8, 10, 'write', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1291, 8, 11, 'write', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1292, 8, 12, 'write', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1293, 8, 13, 'readonly', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1294, 8, 14, 'readonly', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1295, 8, 15, 'readonly', '2017-09-14 15:59:17', '2017-09-14 15:59:17'),
(1296, 8, 16, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1297, 8, 17, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1298, 8, 18, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1299, 8, 19, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1300, 8, 21, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1301, 8, 22, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1302, 8, 23, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1303, 8, 24, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1304, 8, 126, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1305, 8, 127, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1306, 8, 149, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1307, 8, 150, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1308, 8, 151, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1309, 8, 30, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1310, 8, 31, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1311, 8, 32, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1312, 8, 33, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1313, 8, 34, 'readonly', '2017-09-14 15:59:18', '2017-09-14 15:59:18'),
(1314, 8, 35, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1315, 8, 36, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1316, 8, 37, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1317, 8, 38, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1318, 8, 39, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1319, 8, 40, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1320, 8, 41, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1321, 8, 42, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1322, 8, 43, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1323, 8, 44, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1324, 8, 45, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1325, 8, 46, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1326, 8, 47, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1327, 8, 48, 'readonly', '2017-09-14 15:59:19', '2017-09-14 15:59:19'),
(1328, 8, 49, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1329, 8, 50, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1330, 8, 51, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1331, 8, 52, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1332, 8, 53, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1333, 8, 54, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1334, 8, 55, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1335, 8, 107, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1336, 8, 56, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1337, 8, 57, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1338, 8, 60, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1339, 8, 61, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1340, 8, 59, 'readonly', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1341, 8, 62, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1342, 8, 110, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1343, 8, 63, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1344, 8, 160, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1345, 8, 161, 'write', '2017-09-14 15:59:20', '2017-09-14 15:59:20'),
(1346, 8, 64, 'write', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1347, 8, 65, 'write', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1348, 8, 66, 'write', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1349, 8, 73, 'write', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1350, 8, 162, 'write', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1351, 8, 208, 'write', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1352, 8, 209, 'write', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1353, 8, 68, 'readonly', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1354, 8, 69, 'readonly', '2017-09-14 15:59:21', '2017-09-14 15:59:21'),
(1355, 8, 70, 'write', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1356, 8, 71, 'write', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1357, 8, 163, 'write', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1358, 8, 72, 'write', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1359, 8, 74, 'readonly', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1360, 8, 75, 'readonly', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1361, 8, 76, 'readonly', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1362, 8, 77, 'readonly', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1363, 8, 78, 'readonly', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1364, 8, 79, 'readonly', '2017-09-14 15:59:22', '2017-09-14 15:59:22'),
(1365, 8, 80, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1366, 8, 81, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1367, 8, 82, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1368, 8, 83, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1369, 8, 85, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1370, 8, 111, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1371, 8, 86, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1372, 8, 88, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1373, 8, 89, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1374, 8, 90, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1375, 8, 91, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1376, 8, 92, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1377, 8, 93, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1378, 8, 94, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1379, 8, 95, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1380, 8, 96, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1381, 8, 97, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1382, 8, 98, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1383, 8, 99, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1384, 8, 100, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1385, 8, 101, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1386, 8, 102, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1387, 8, 103, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1388, 8, 104, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1389, 8, 105, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1390, 8, 106, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1391, 8, 112, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1392, 8, 186, 'readonly', '2017-09-14 15:59:23', '2017-09-14 15:59:23'),
(1393, 8, 113, 'readonly', '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(1394, 8, 114, 'readonly', '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(1395, 8, 115, 'readonly', '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(1396, 8, 116, 'readonly', '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(1397, 8, 117, 'readonly', '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(1398, 8, 118, 'readonly', '2017-09-14 15:59:24', '2017-09-14 15:59:24'),
(1399, 8, 119, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1400, 8, 134, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1401, 8, 121, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1402, 8, 122, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1403, 8, 124, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1404, 8, 125, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1405, 8, 129, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1406, 8, 123, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1407, 8, 131, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1408, 8, 120, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1409, 8, 130, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1410, 8, 132, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1411, 8, 133, 'readonly', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1412, 8, 138, 'write', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1413, 8, 139, 'write', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1414, 8, 140, 'write', '2017-09-14 15:59:25', '2017-09-14 15:59:25'),
(1415, 8, 141, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1416, 8, 142, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1417, 8, 143, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1418, 8, 147, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1419, 8, 152, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1420, 8, 153, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1421, 8, 154, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1422, 8, 155, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1423, 8, 156, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1424, 8, 157, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1425, 8, 158, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1426, 8, 168, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1427, 8, 169, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1428, 8, 170, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1429, 8, 185, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1430, 8, 187, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1431, 8, 190, 'write', '2017-09-14 15:59:26', '2017-09-14 15:59:26'),
(1432, 8, 159, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1433, 8, 166, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1434, 8, 167, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1435, 8, 183, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1436, 8, 184, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1437, 8, 188, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1438, 8, 189, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1439, 8, 195, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1440, 8, 196, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1441, 8, 197, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1442, 8, 198, 'write', '2017-09-14 15:59:27', '2017-09-14 15:59:27'),
(1443, 8, 199, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1444, 8, 200, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1445, 8, 201, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1446, 8, 202, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1447, 8, 203, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1448, 8, 204, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1449, 8, 205, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1450, 8, 206, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1451, 8, 207, 'write', '2017-09-14 15:59:28', '2017-09-14 15:59:28'),
(1452, 9, 1, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1453, 9, 2, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1454, 9, 3, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1455, 9, 4, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1456, 9, 5, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1457, 9, 171, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1458, 9, 172, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1459, 9, 173, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1460, 9, 174, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1461, 9, 175, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1462, 9, 176, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1463, 9, 177, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1464, 9, 178, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1465, 9, 179, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1466, 9, 180, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1467, 9, 181, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1468, 9, 182, 'write', '2017-09-14 16:01:24', '2017-09-14 16:01:24'),
(1469, 9, 6, 'write', '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(1470, 9, 7, 'write', '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(1471, 9, 8, 'write', '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(1472, 9, 9, 'write', '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(1473, 9, 10, 'write', '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(1474, 9, 11, 'write', '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(1475, 9, 12, 'write', '2017-09-14 16:01:25', '2017-09-14 16:01:25'),
(1476, 9, 13, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1477, 9, 14, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1478, 9, 15, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1479, 9, 16, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1480, 9, 17, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1481, 9, 18, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1482, 9, 19, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1483, 9, 21, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1484, 9, 22, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1485, 9, 23, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1486, 9, 24, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1487, 9, 126, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1488, 9, 127, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1489, 9, 149, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1490, 9, 150, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1491, 9, 151, 'write', '2017-09-14 16:01:26', '2017-09-14 16:01:26'),
(1492, 9, 30, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1493, 9, 31, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1494, 9, 32, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1495, 9, 33, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1496, 9, 34, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1497, 9, 35, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1498, 9, 36, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1499, 9, 37, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1500, 9, 38, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1501, 9, 39, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1502, 9, 40, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1503, 9, 41, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1504, 9, 42, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1505, 9, 43, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1506, 9, 44, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1507, 9, 45, 'write', '2017-09-14 16:01:27', '2017-09-14 16:01:27'),
(1508, 9, 46, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1509, 9, 47, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1510, 9, 48, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1511, 9, 49, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1512, 9, 50, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1513, 9, 51, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1514, 9, 52, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1515, 9, 53, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1516, 9, 54, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1517, 9, 55, 'write', '2017-09-14 16:01:28', '2017-09-14 16:01:28'),
(1518, 9, 107, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1519, 9, 56, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1520, 9, 57, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1521, 9, 60, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1522, 9, 61, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1523, 9, 59, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1524, 9, 62, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1525, 9, 110, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1526, 9, 63, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1527, 9, 160, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1528, 9, 161, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1529, 9, 64, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1530, 9, 65, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1531, 9, 66, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1532, 9, 73, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1533, 9, 162, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1534, 9, 208, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1535, 9, 209, 'write', '2017-09-14 16:01:29', '2017-09-14 16:01:29'),
(1536, 9, 68, 'write', '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(1537, 9, 69, 'write', '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(1538, 9, 70, 'write', '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(1539, 9, 71, 'write', '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(1540, 9, 163, 'write', '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(1541, 9, 72, 'write', '2017-09-14 16:01:30', '2017-09-14 16:01:30'),
(1542, 9, 74, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1543, 9, 75, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1544, 9, 76, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1545, 9, 77, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1546, 9, 78, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1547, 9, 79, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1548, 9, 80, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1549, 9, 81, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1550, 9, 82, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1551, 9, 83, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1552, 9, 85, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1553, 9, 111, 'write', '2017-09-14 16:01:31', '2017-09-14 16:01:31'),
(1554, 9, 86, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1555, 9, 88, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1556, 9, 89, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1557, 9, 90, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1558, 9, 91, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1559, 9, 92, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1560, 9, 93, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1561, 9, 94, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1562, 9, 95, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1563, 9, 96, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1564, 9, 97, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1565, 9, 98, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1566, 9, 99, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1567, 9, 100, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1568, 9, 101, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1569, 9, 102, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1570, 9, 103, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1571, 9, 104, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1572, 9, 105, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1573, 9, 106, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1574, 9, 112, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1575, 9, 186, 'write', '2017-09-14 16:01:32', '2017-09-14 16:01:32'),
(1576, 9, 113, 'write', '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(1577, 9, 114, 'write', '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(1578, 9, 115, 'write', '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(1579, 9, 116, 'write', '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(1580, 9, 117, 'write', '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(1581, 9, 118, 'write', '2017-09-14 16:01:33', '2017-09-14 16:01:33'),
(1582, 9, 119, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1583, 9, 134, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1584, 9, 121, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1585, 9, 122, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1586, 9, 124, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1587, 9, 125, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1588, 9, 129, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1589, 9, 123, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1590, 9, 131, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1591, 9, 120, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1592, 9, 130, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1593, 9, 132, 'write', '2017-09-14 16:01:34', '2017-09-14 16:01:34'),
(1594, 9, 133, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1595, 9, 138, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1596, 9, 139, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1597, 9, 140, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1598, 9, 141, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1599, 9, 142, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1600, 9, 143, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1601, 9, 147, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1602, 9, 152, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1603, 9, 153, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1604, 9, 154, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1605, 9, 155, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1606, 9, 156, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1607, 9, 157, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1608, 9, 158, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1609, 9, 168, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1610, 9, 169, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1611, 9, 170, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1612, 9, 185, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1613, 9, 187, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1614, 9, 190, 'write', '2017-09-14 16:01:35', '2017-09-14 16:01:35'),
(1615, 9, 159, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1616, 9, 166, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1617, 9, 167, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1618, 9, 183, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1619, 9, 184, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1620, 9, 188, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1621, 9, 189, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1622, 9, 195, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1623, 9, 196, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1624, 9, 197, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1625, 9, 198, 'write', '2017-09-14 16:01:36', '2017-09-14 16:01:36'),
(1626, 9, 199, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1627, 9, 200, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1628, 9, 201, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1629, 9, 202, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1630, 9, 203, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1631, 9, 204, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1632, 9, 205, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1633, 9, 206, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1634, 9, 207, 'write', '2017-09-14 16:01:37', '2017-09-14 16:01:37'),
(1635, 5, 208, 'invisible', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1636, 5, 209, 'invisible', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1637, 5, 195, 'invisible', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1638, 5, 196, 'invisible', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1639, 5, 197, 'invisible', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1640, 5, 198, 'invisible', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1641, 5, 199, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1642, 5, 200, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1643, 5, 201, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1644, 5, 202, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1645, 5, 203, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1646, 5, 204, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1647, 5, 205, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1648, 5, 206, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1649, 5, 207, 'write', '2017-09-15 08:31:17', '2017-09-15 08:31:17'),
(1650, 1, 210, 'write', '2017-09-15 18:35:48', '2017-09-15 18:35:48'),
(1651, 1, 211, 'write', '2017-09-15 18:36:41', '2017-09-15 18:36:41'),
(1652, 1, 212, 'write', '2017-09-15 19:44:18', '2017-09-15 19:44:18'),
(1653, 5, 210, 'write', '2017-09-15 19:50:16', '2017-09-15 19:50:16'),
(1654, 5, 211, 'write', '2017-09-15 19:50:16', '2017-09-15 19:50:16'),
(1655, 5, 212, 'invisible', '2017-09-15 19:50:16', '2017-09-15 19:50:16'),
(1656, 2, 210, 'invisible', '2017-09-15 19:55:13', '2017-09-15 19:55:13'),
(1657, 2, 211, 'invisible', '2017-09-15 19:55:13', '2017-09-15 19:55:13'),
(1658, 2, 212, 'invisible', '2017-09-15 19:55:13', '2017-09-15 19:55:13'),
(1659, 1, 213, 'write', '2017-09-18 13:00:28', '2017-09-18 13:00:28'),
(1660, 1, 214, 'write', '2017-09-18 13:53:48', '2017-09-18 13:53:48'),
(1661, 1, 215, 'write', '2017-09-18 13:54:07', '2017-09-18 13:54:07'),
(1663, 1, 220, 'write', '2017-09-21 08:40:08', '2017-09-21 08:40:08'),
(1664, 1, 221, 'write', '2017-09-21 08:40:29', '2017-09-21 08:40:29'),
(1665, 1, 222, 'write', '2017-09-21 08:44:14', '2017-09-21 08:44:14'),
(1667, 1, 224, 'write', '2017-09-21 08:58:56', '2017-09-21 08:58:56'),
(1668, 1, 225, 'write', '2017-09-21 12:48:09', '2017-09-21 12:48:09'),
(1669, 1, 226, 'write', '2017-09-21 18:59:19', '2017-09-21 18:59:19'),
(1670, 1, 227, 'write', '2017-09-21 19:02:00', '2017-09-21 19:02:00'),
(1671, 1, 228, 'write', '2017-09-25 13:08:59', '2017-09-25 13:08:59'),
(1672, 1, 229, 'write', '2017-09-25 13:11:02', '2017-09-25 13:11:02'),
(1673, 1, 230, 'write', '2017-09-25 13:11:39', '2017-09-25 13:11:39'),
(1674, 1, 231, 'write', '2017-09-25 13:12:02', '2017-09-25 13:12:02'),
(1675, 1, 232, 'write', '2017-09-25 13:13:14', '2017-09-25 13:13:14'),
(1676, 1, 233, 'write', '2017-09-25 13:13:34', '2017-09-25 13:13:34'),
(1677, 1, 234, 'write', '2017-09-25 14:29:33', '2017-09-25 14:29:33'),
(1678, 1, 237, 'write', '2017-09-25 14:33:24', '2017-09-25 14:33:24'),
(1679, 1, 236, 'write', '2017-09-25 14:41:44', '2017-09-25 14:41:44'),
(1680, 1, 238, 'write', '2017-09-25 14:41:44', '2017-09-25 14:41:44'),
(1681, 1, 239, 'write', '2017-09-25 14:41:44', '2017-09-25 14:41:44'),
(1682, 1, 240, 'write', '2017-09-25 14:41:44', '2017-09-25 14:41:44'),
(1683, 1, 241, 'write', '2017-09-25 14:46:06', '2017-09-25 14:46:06'),
(1684, 1, 242, 'write', '2017-10-01 19:42:43', '2017-10-01 19:42:43'),
(1685, 1, 243, 'write', '2017-10-01 19:43:03', '2017-10-01 19:43:03'),
(1686, 1, 244, 'write', '2017-10-01 19:43:50', '2017-10-01 19:43:50'),
(1687, 1, 245, 'write', '2017-10-01 19:44:24', '2017-10-01 19:44:24'),
(1688, 1, 246, 'write', '2017-10-01 19:44:39', '2017-10-01 19:44:39'),
(1689, 1, 247, 'write', '2017-10-01 19:44:56', '2017-10-01 19:44:56'),
(1690, 1, 248, 'write', '2017-10-01 19:45:28', '2017-10-01 19:45:28'),
(1691, 1, 249, 'write', '2017-10-01 19:45:45', '2017-10-01 19:45:45'),
(1699, 1, 257, 'write', '2017-10-02 08:38:01', '2017-10-02 08:38:01'),
(1700, 1, 261, 'write', '2017-10-02 10:56:12', '2017-10-02 10:56:12'),
(1701, 1, 259, 'write', '2017-10-02 10:56:29', '2017-10-02 10:56:29'),
(1702, 1, 260, 'write', '2017-10-02 10:56:29', '2017-10-02 10:56:29'),
(1703, 3, 224, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1704, 3, 226, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1705, 3, 208, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1706, 3, 209, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1707, 3, 214, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1708, 3, 215, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1709, 3, 241, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1710, 3, 195, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1711, 3, 196, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1712, 3, 197, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1713, 3, 198, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1714, 3, 199, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1715, 3, 200, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1716, 3, 201, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1717, 3, 202, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1718, 3, 203, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1719, 3, 204, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1720, 3, 205, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1721, 3, 206, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1722, 3, 207, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1723, 3, 210, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1724, 3, 211, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1725, 3, 212, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1726, 3, 213, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1727, 3, 220, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1728, 3, 221, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1729, 3, 222, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1730, 3, 225, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1731, 3, 227, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1732, 3, 228, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1733, 3, 229, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1734, 3, 230, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1735, 3, 231, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1736, 3, 232, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1737, 3, 233, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1738, 3, 236, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1739, 3, 237, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1740, 3, 234, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1741, 3, 238, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1742, 3, 239, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1743, 3, 240, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1745, 3, 242, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1746, 3, 243, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1747, 3, 244, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1748, 3, 245, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1749, 3, 246, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1750, 3, 247, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1751, 3, 248, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1752, 3, 249, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1753, 3, 257, 'readonly', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1760, 3, 259, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1761, 3, 260, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1762, 3, 261, 'write', '2017-10-02 12:15:19', '2017-10-02 12:15:19'),
(1763, 8, 224, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1764, 8, 226, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1765, 8, 214, 'invisible', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1766, 8, 215, 'invisible', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1767, 8, 241, 'invisible', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1768, 8, 210, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1769, 8, 211, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1770, 8, 212, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1771, 8, 213, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1772, 8, 220, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1773, 8, 221, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1774, 8, 222, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1775, 8, 225, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1776, 8, 227, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1777, 8, 228, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1778, 8, 229, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1779, 8, 230, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1780, 8, 231, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1781, 8, 232, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1782, 8, 233, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1783, 8, 236, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1784, 8, 237, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1785, 8, 234, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1786, 8, 238, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1787, 8, 239, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1788, 8, 240, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1790, 8, 242, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1791, 8, 243, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1792, 8, 244, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1793, 8, 245, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1794, 8, 246, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1795, 8, 247, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1796, 8, 248, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1797, 8, 249, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1798, 8, 257, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1805, 8, 259, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1806, 8, 260, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1807, 8, 261, 'write', '2017-10-04 17:20:45', '2017-10-04 17:20:45'),
(1808, 2, 224, 'readonly', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1809, 2, 226, 'readonly', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1810, 2, 214, 'readonly', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1811, 2, 215, 'readonly', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1812, 2, 241, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1813, 2, 213, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1814, 2, 220, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1815, 2, 221, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1816, 2, 222, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1817, 2, 225, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1818, 2, 227, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1819, 2, 228, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1820, 2, 229, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1821, 2, 230, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1822, 2, 231, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1823, 2, 232, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1824, 2, 233, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1825, 2, 236, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1826, 2, 237, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1827, 2, 234, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1828, 2, 238, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1829, 2, 239, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1830, 2, 240, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1832, 2, 242, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1833, 2, 243, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1834, 2, 244, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1835, 2, 245, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1836, 2, 246, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1837, 2, 247, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1838, 2, 248, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1839, 2, 249, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1840, 2, 257, 'invisible', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1847, 2, 259, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1848, 2, 260, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1849, 2, 261, 'write', '2017-10-05 07:29:17', '2017-10-05 07:29:17'),
(1850, 1, 262, 'write', '2017-10-05 18:53:14', '2017-10-05 18:53:14'),
(1851, 8, 262, 'invisible', '2017-10-05 19:19:30', '2017-10-05 19:19:30'),
(1852, 9, 224, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1853, 9, 226, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1854, 9, 214, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1855, 9, 215, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1856, 9, 262, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1857, 9, 241, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1858, 9, 210, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1859, 9, 211, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1860, 9, 212, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1861, 9, 213, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1862, 9, 220, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1863, 9, 221, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1864, 9, 222, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1865, 9, 225, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1866, 9, 227, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1867, 9, 228, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1868, 9, 229, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1869, 9, 230, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1870, 9, 231, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1871, 9, 232, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1872, 9, 233, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1873, 9, 236, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1874, 9, 237, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1875, 9, 234, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1876, 9, 238, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1877, 9, 239, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1878, 9, 240, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1880, 9, 242, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1881, 9, 243, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1882, 9, 244, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1883, 9, 245, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1884, 9, 246, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1885, 9, 247, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1886, 9, 248, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1887, 9, 249, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1888, 9, 257, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1895, 9, 259, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1896, 9, 260, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1897, 9, 261, 'write', '2017-10-05 19:43:46', '2017-10-05 19:43:46'),
(1898, 3, 262, 'readonly', '2017-10-05 20:08:16', '2017-10-05 20:08:16'),
(1899, 2, 262, 'readonly', '2017-10-05 20:17:18', '2017-10-05 20:17:18'),
(1900, 5, 224, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1901, 5, 226, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1902, 5, 214, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1903, 5, 215, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1904, 5, 262, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1905, 5, 241, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1906, 5, 213, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1907, 5, 220, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1908, 5, 221, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1909, 5, 222, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1910, 5, 225, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1911, 5, 227, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1912, 5, 228, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1913, 5, 229, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1914, 5, 230, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1915, 5, 231, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1916, 5, 232, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1917, 5, 233, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1918, 5, 236, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1919, 5, 237, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1920, 5, 234, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1921, 5, 238, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1922, 5, 239, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1923, 5, 240, 'write', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1925, 5, 242, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1926, 5, 243, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1927, 5, 244, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1928, 5, 245, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1929, 5, 246, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1930, 5, 247, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1931, 5, 248, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1932, 5, 249, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1933, 5, 257, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1940, 5, 259, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1941, 5, 260, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1942, 5, 261, 'invisible', '2017-10-05 20:22:17', '2017-10-05 20:22:17'),
(1943, 1, 263, 'write', '2017-10-05 20:56:11', '2017-10-05 20:56:11'),
(1944, 2, 263, 'readonly', '2017-10-05 21:10:30', '2017-10-05 21:10:30'),
(1945, 8, 263, 'readonly', '2017-10-05 21:24:39', '2017-10-05 21:24:39'),
(1946, 3, 263, 'invisible', '2017-10-05 21:25:41', '2017-10-05 21:25:41'),
(1947, 5, 263, 'invisible', '2017-10-05 21:27:32', '2017-10-05 21:27:32'),
(1948, 9, 263, 'invisible', '2017-10-05 21:29:11', '2017-10-05 21:29:11'),
(1952, 1, 271, 'write', '2017-10-06 14:22:09', '2017-10-06 14:22:09'),
(1953, 1, 272, 'write', '2017-10-06 14:22:56', '2017-10-06 14:22:56'),
(1954, 1, 273, 'write', '2017-10-06 14:24:11', '2017-10-06 14:24:11'),
(1955, 1, 274, 'write', '2017-10-06 14:24:42', '2017-10-06 14:24:42'),
(1956, 1, 275, 'write', '2017-10-06 14:28:24', '2017-10-06 14:28:24'),
(1957, 1, 276, 'write', '2017-10-06 14:29:18', '2017-10-06 14:29:18'),
(1958, 1, 278, 'write', '2017-10-06 14:31:37', '2017-10-06 14:31:37'),
(1959, 1, 277, 'write', '2017-10-06 14:32:06', '2017-10-06 14:32:06'),
(1960, 1, 279, 'write', '2017-10-06 14:36:14', '2017-10-06 14:36:14'),
(1961, 2, 275, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1962, 2, 276, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1963, 2, 277, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1964, 2, 278, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1965, 2, 279, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1966, 3, 275, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1967, 3, 276, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1968, 3, 277, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1969, 3, 278, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1970, 3, 279, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1971, 5, 275, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1972, 5, 276, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1973, 5, 277, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1974, 5, 278, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1975, 5, 279, 'invisible', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1976, 8, 275, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1977, 8, 276, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1978, 8, 277, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1979, 8, 278, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1980, 8, 279, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1981, 9, 275, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1982, 9, 276, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1983, 9, 277, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1984, 9, 278, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1985, 9, 279, 'write', '2017-10-06 14:37:08', '2017-10-06 14:37:08'),
(1986, 1, 281, 'write', '2017-10-07 11:29:01', '2017-10-07 11:29:01'),
(1987, 1, 282, 'write', '2017-10-07 11:29:41', '2017-10-07 11:29:41'),
(1988, 1, 284, 'write', '2017-10-07 11:35:06', '2017-10-07 11:35:06'),
(1989, 1, 285, 'write', '2017-10-07 11:35:38', '2017-10-07 11:35:38'),
(1990, 1, 283, 'write', '2017-10-07 11:35:47', '2017-10-07 11:35:47'),
(1997, 1, 287, 'write', '2017-10-09 08:38:07', '2017-10-09 08:38:07'),
(1998, 2, 287, 'invisible', '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(1999, 3, 287, 'invisible', '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(2000, 5, 287, 'invisible', '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(2001, 8, 287, 'write', '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(2002, 9, 287, 'write', '2017-10-09 08:38:29', '2017-10-09 08:38:29'),
(2003, 1, 288, 'write', '2017-10-09 08:55:26', '2017-10-09 08:55:26'),
(2004, 2, 288, 'invisible', '2017-10-09 08:55:51', '2017-10-09 08:55:51'),
(2005, 3, 288, 'invisible', '2017-10-09 08:55:51', '2017-10-09 08:55:51'),
(2006, 5, 288, 'invisible', '2017-10-09 08:55:51', '2017-10-09 08:55:51'),
(2007, 8, 288, 'write', '2017-10-09 08:55:51', '2017-10-09 08:55:51'),
(2008, 9, 288, 'write', '2017-10-09 08:55:51', '2017-10-09 08:55:51'),
(2009, 1, 291, 'write', '2017-10-09 09:06:34', '2017-10-09 09:06:34'),
(2010, 1, 292, 'write', '2017-10-09 09:07:39', '2017-10-09 09:07:39'),
(2011, 1, 289, 'write', '2017-10-09 09:08:02', '2017-10-09 09:08:02'),
(2012, 1, 290, 'write', '2017-10-09 09:08:02', '2017-10-09 09:08:02'),
(2013, 1, 293, 'write', '2017-10-09 09:11:28', '2017-10-09 09:11:28'),
(2015, 1, 295, 'write', '2017-10-09 09:13:48', '2017-10-09 09:13:48'),
(2018, 1, 298, 'write', '2017-10-10 18:50:25', '2017-10-10 18:50:25'),
(2019, 1, 299, 'write', '2017-10-10 18:50:48', '2017-10-10 18:50:48'),
(2021, 2, 281, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2022, 2, 282, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2023, 3, 281, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2024, 3, 282, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2025, 5, 281, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2026, 5, 282, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2027, 8, 281, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2028, 8, 282, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2029, 9, 281, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2030, 9, 282, 'write', '2017-10-13 14:02:58', '2017-10-13 14:02:58'),
(2031, 1, 301, 'write', '2017-10-15 13:08:45', '2017-10-15 13:08:45'),
(2032, 1, 302, 'write', '2017-10-17 15:28:07', '2017-10-17 15:28:07'),
(2033, 1, 303, 'write', '2017-10-17 15:28:59', '2017-10-17 15:28:59'),
(2034, 1, 304, 'write', '2017-10-17 18:25:16', '2017-10-17 18:25:16'),
(2035, 1, 305, 'write', '2017-10-17 18:25:50', '2017-10-17 18:25:50'),
(2036, 1, 306, 'write', '2017-10-17 19:33:34', '2017-10-17 19:33:34'),
(2037, 1, 307, 'write', '2017-10-22 18:13:52', '2017-10-22 18:13:52'),
(2038, 1, 308, 'write', '2017-10-23 16:40:30', '2017-10-23 16:40:30'),
(2039, 1, 309, 'write', '2017-10-23 16:41:37', '2017-10-23 16:41:37'),
(2040, 1, 310, 'write', '2017-10-23 16:42:49', '2017-10-23 16:42:49'),
(2041, 1, 311, 'write', '2017-10-23 16:43:39', '2017-10-23 16:43:39'),
(2042, 1, 312, 'write', '2017-10-23 16:44:31', '2017-10-23 16:44:31'),
(2043, 1, 313, 'write', '2017-10-23 16:45:34', '2017-10-23 16:45:34'),
(2044, 1, 314, 'write', '2017-10-23 18:10:35', '2017-10-23 18:10:35'),
(2046, 1, 316, 'write', '2017-10-24 01:57:37', '2017-10-24 01:57:37'),
(2047, 1, 317, 'write', '2017-10-24 02:02:15', '2017-10-24 02:02:15'),
(2048, 1, 318, 'write', '2017-10-24 02:03:46', '2017-10-24 02:03:46'),
(2049, 1, 319, 'write', '2017-10-24 02:04:33', '2017-10-24 02:04:33'),
(2050, 1, 320, 'write', '2017-10-24 02:05:37', '2017-10-24 02:05:37'),
(2051, 1, 321, 'write', '2017-10-24 02:06:12', '2017-10-24 02:06:12'),
(2052, 1, 322, 'write', '2017-10-24 02:07:34', '2017-10-24 02:07:34'),
(2053, 1, 323, 'write', '2017-10-24 02:08:18', '2017-10-24 02:08:18'),
(2054, 1, 324, 'write', '2017-10-24 02:30:52', '2017-10-24 02:30:52'),
(2055, 1, 325, 'write', '2017-10-24 02:32:37', '2017-10-24 02:32:37'),
(2056, 1, 326, 'write', '2017-10-24 02:33:34', '2017-10-24 02:33:34'),
(2057, 1, 327, 'write', '2017-10-24 03:13:18', '2017-10-24 03:13:18'),
(2058, 1, 328, 'write', '2017-10-25 00:18:01', '2017-10-25 00:18:01'),
(2059, 1, 329, 'write', '2017-10-29 20:25:04', '2017-10-29 20:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(6, 2, 13, NULL, NULL),
(7, 3, 14, NULL, NULL),
(8, 5, 12, NULL, NULL),
(9, 8, 15, NULL, NULL),
(10, 9, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE `test_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `illage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `favpurite_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mothers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`id`, `name`, `school`, `class`, `illage`, `gender`, `age`, `favpurite_color`, `mothers_name`) VALUES
(1, 'afsf', 'asdf', 'asdf', 'afsf', 'm', '10', 'afsf', 'asdf'),
(2, 'sad', 'sa', 'sad', 'sad', 'f', '12', 'sad', 'sa'),
(3, 'fas', 'asdf', 'fsadf', 'fas', 'f', '22', 'fas', 'asdf'),
(4, 'df', 'dfas', 'asdf', 'df', 'm', '30', 'df', 'dfas');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hash` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `extension`, `caption`, `user_id`, `hash`, `public`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 'mtoag.PNG', 'D:\\house.ubs\\Source\\worldvision\\storage\\uploads\\2017-10-06-173037-mtoag.PNG', 'PNG', '', 15, 'r91kib4sxppfw5qqvk9p', 0, '2017-10-05 19:30:52', '2017-10-05 19:30:37', '2017-10-05 19:30:52'),
(11, 'IMG_09102017_200132_0.png', 'C:\\xampp\\htdocs\\worldvision\\storage\\uploads\\2017-10-10-110635-IMG_09102017_200132_0.png', 'png', '', 1, 'gza2xsffeoghwskp6ago', 0, NULL, '2017-10-09 13:06:35', '2017-10-09 13:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `context_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Employee',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `context_id`, `email`, `password`, `type`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `designation`, `gender`, `mobile`, `dept`, `city`, `address`, `role_id`) VALUES
(1, 'demo@mandemobile.com', 1, 'demo@mandemobile.com', '$2y$10$Yr3JqdgMBW//SfAEtlBGCuKKyWWyPm1SX4L0xdHx91uFQj/SFvh/y', 'Employee', 'k6YWRe2sPqXkYKvtk4XYCL4kuxBkZmfhkaU2HgDAdBTXIUOF5KUqEwjFfZxw', NULL, '2017-05-26 15:27:34', '2017-10-31 05:40:33', 'ada', 'Male', '0000000000', 1, '', '', 1);

-- --------------------------------------------------------

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backups_name_unique` (`name`),
  ADD UNIQUE KEY `backups_file_name_unique` (`file_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_dept_foreign` (`dept`);

--
-- Indexes for table `la_configs`
--
ALTER TABLE `la_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_menus`
--
ALTER TABLE `la_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_fields_module_foreign` (`module`),
  ADD KEY `module_fields_field_type_foreign` (`field_type`);

--
-- Indexes for table `module_field_types`
--
ALTER TABLE `module_field_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_name_unique` (`name`),
  ADD UNIQUE KEY `organizations_email_unique` (`email`),
  ADD KEY `organizations_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_parent_foreign` (`parent`),
  ADD KEY `roles_dept_foreign` (`dept`);

--
-- Indexes for table `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_role_id_foreign` (`role_id`),
  ADD KEY `role_module_module_id_foreign` (`module_id`);

--
-- Indexes for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_fields_role_id_foreign` (`role_id`),
  ADD KEY `role_module_fields_field_id_foreign` (`field_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `test_table`
--
ALTER TABLE `test_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_dept_foreign` (`dept`),
  ADD KEY `users_roll_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `la_configs`
--
ALTER TABLE `la_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `la_menus`
--
ALTER TABLE `la_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;
--
-- AUTO_INCREMENT for table `module_field_types`
--
ALTER TABLE `module_field_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role_module`
--
ALTER TABLE `role_module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=538;
--
-- AUTO_INCREMENT for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2060;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `test_table`
--
ALTER TABLE `test_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
