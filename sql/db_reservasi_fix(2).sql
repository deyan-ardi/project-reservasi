-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Bulan Mei 2021 pada 13.39
-- Versi server: 5.7.24
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reservasi_fix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'af969d34dfc3ccf59ca6a2e9aa04613b', '2021-04-05 07:35:47'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'fc99e30f0a51717fad533e85c357b923', '2021-04-05 07:40:50'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '9c96b675835e1127f467222ef4269f0f', '2021-04-05 08:20:55'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '18355d5225ebe62c8879edc58fe205fb', '2021-04-05 08:28:27'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '18355d5225ebe62c8879edc58fe205fb', '2021-04-05 08:30:50'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'f08fd6ce62e7d21e2a4c330e9ded98ce', '2021-04-05 22:22:03'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36 Edg/89.0.774.68', 'a705a4de7a4aba45517f1a9bd22ec7e6', '2021-04-05 23:03:55'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '16259fca7ee3a0041f700d4e2fa15028', '2021-04-13 21:25:00'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '4e594b4dc8e516e555226e00b5891b4d', '2021-04-18 18:46:07'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '90431ba4b5f6143ec168e30a25722342', '2021-04-18 18:48:58'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '824060d59f2afd11f099b7dac566f9f5', '2021-04-18 22:59:52'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '86215676287d8ea2494bf8e5caa8efe0', '2021-05-06 00:09:29'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 Edg/90.0.818.51', '86215676287d8ea2494bf8e5caa8efe0', '2021-05-06 00:09:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'super admin', 'this for super admin user'),
(2, 'admin', 'this for staff/admin user'),
(3, 'user', 'this for user/member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(5, 2, 2),
(6, 3, 3),
(7, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'riyan@undiksha.ac.id', 2, '2021-04-05 07:35:54', 1),
(2, '::1', 'riyan@undiksha.ac.id', 2, '2021-04-05 07:40:19', 1),
(3, '::1', 'deyan', 1, '2021-04-05 07:40:31', 0),
(4, '::1', 'riyan.clsg11@gmail.com', 1, '2021-04-05 07:40:56', 1),
(5, '::1', 'riyan@undiksha.ac.id', 2, '2021-04-05 07:42:31', 1),
(6, '::1', 'riyan.clsg11@gmail.com', 1, '2021-04-05 08:08:10', 1),
(7, '::1', 'riyan@undiksha.ac.id', 2, '2021-04-05 08:09:20', 1),
(8, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-05 08:21:04', 1),
(9, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-05 08:23:00', 1),
(10, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-05 08:23:15', 1),
(11, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-05 08:24:12', 1),
(12, '::1', 'riyan.clsg11@gmail.com', 1, '2021-04-05 08:24:40', 1),
(13, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-05 08:24:50', 1),
(14, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-05 08:25:29', 1),
(15, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-05 08:26:07', 1),
(16, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:28:35', 1),
(17, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:29:10', 1),
(18, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:30:13', 1),
(19, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:30:50', 1),
(20, '::1', 'riyan.clsg11@gmail.com', 1, '2021-04-05 08:31:00', 1),
(21, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:31:11', 1),
(22, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:31:52', 1),
(23, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:33:02', 1),
(24, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 08:33:41', 1),
(25, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 11:41:27', 1),
(26, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 11:43:49', 1),
(27, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:44:11', 0),
(28, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 11:45:23', 1),
(29, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:48:41', 0),
(30, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:48:53', 0),
(31, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:49:07', 0),
(32, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 11:50:12', 1),
(33, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:53:45', 0),
(34, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:53:52', 0),
(35, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:54:01', 0),
(36, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:54:09', 0),
(37, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:55:09', 0),
(38, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:55:20', 0),
(39, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:56:49', 0),
(40, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 11:56:59', 1),
(41, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:58:12', 0),
(42, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:58:20', 0),
(43, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:58:31', 0),
(44, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:59:29', 0),
(45, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 11:59:39', 0),
(46, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 12:00:21', 0),
(47, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 12:00:34', 0),
(48, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 12:39:09', 1),
(49, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-05 12:39:52', 0),
(50, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 12:39:56', 1),
(51, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 12:43:00', 1),
(52, '::1', 'riyan.clsg12@gmail.com', 5, '2021-04-05 22:22:16', 1),
(53, '::1', 'riyan@undiksha.ac.id', 4, '2021-04-05 22:23:53', 1),
(54, '::1', 'riyan.clsg12@gmail.com', 6, '2021-04-05 23:04:03', 1),
(55, '::1', 'riyan.clsg13@gmail.com', 1, '2021-04-06 00:17:10', 1),
(56, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-06 01:11:03', 0),
(57, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-06 01:11:13', 1),
(58, '::1', 'riyan.clsg13@gmail.com', 1, '2021-04-06 01:15:05', 1),
(59, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-06 06:20:33', 1),
(60, '::1', 'riyan.clsg13@gmail.com', 1, '2021-04-06 06:22:13', 1),
(61, '::1', 'riyan.clsg13@gmail.com', NULL, '2021-04-06 07:44:48', 0),
(62, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-06 07:44:53', 1),
(63, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-06 08:06:32', 1),
(64, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-06 08:49:04', 1),
(65, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-08 08:26:10', 0),
(66, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-08 08:26:15', 1),
(67, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-09 09:15:44', 1),
(68, '::1', 'riyan.clsg12@gmail.com', NULL, '2021-04-09 09:59:05', 0),
(69, '::1', 'riyan.clsg12@gmail.com', NULL, '2021-04-09 09:59:16', 0),
(70, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-09 10:09:27', 1),
(71, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-09 12:08:39', 1),
(72, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-11 05:50:17', 1),
(73, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-11 05:56:27', 1),
(74, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-11 05:58:18', 1),
(75, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-12 09:46:54', 1),
(76, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-12 09:48:39', 1),
(77, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-12 11:17:55', 1),
(78, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-12 11:18:08', 1),
(79, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-12 12:04:20', 1),
(80, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-12 12:04:37', 1),
(81, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-12 22:25:53', 1),
(82, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-13 14:53:40', 0),
(83, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-13 14:53:49', 1),
(84, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-13 14:54:38', 1),
(85, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-13 21:25:09', 1),
(86, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-13 22:39:36', 1),
(87, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-13 22:41:36', 0),
(88, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-13 22:41:53', 1),
(89, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-13 23:04:55', 1),
(90, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-15 10:11:44', 1),
(91, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-15 12:05:07', 1),
(92, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-15 12:07:24', 0),
(93, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-15 12:07:31', 1),
(94, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-15 12:08:49', 0),
(95, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-15 12:08:58', 1),
(96, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-15 12:10:26', 0),
(97, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-15 12:10:33', 1),
(98, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-15 14:10:47', 1),
(99, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-15 14:52:59', 1),
(100, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-15 15:07:21', 1),
(101, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-15 18:09:48', 1),
(102, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-15 18:10:15', 1),
(103, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-15 18:10:28', 1),
(104, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-15 19:27:02', 0),
(105, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-15 19:27:07', 1),
(106, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-16 00:02:05', 1),
(107, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-16 09:02:11', 0),
(108, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-16 09:02:27', 1),
(109, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-16 11:12:16', 1),
(110, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-16 21:33:31', 1),
(111, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-16 22:14:10', 1),
(112, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-16 23:21:50', 1),
(113, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-17 13:27:35', 1),
(114, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-17 15:47:03', 0),
(115, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-17 15:47:07', 1),
(116, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-17 22:07:20', 0),
(117, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-17 22:07:25', 1),
(118, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-17 22:36:43', 1),
(119, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-17 22:59:35', 1),
(120, '::1', 'riyan.clsg11@gmail.com', 4, '2021-04-17 23:51:07', 1),
(121, '::1', 'riyan.clsg12@gmail.com', 1, '2021-04-18 00:35:06', 1),
(122, '::1', 'riyan@undiksha.ac.id', 5, '2021-04-18 00:56:31', 1),
(123, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-18 18:42:53', 0),
(124, '::1', 'riyan@undiksha.ac.id', 1, '2021-04-18 18:47:32', 1),
(125, '::1', 'riyan@undiksha.ac.id', 1, '2021-04-18 18:49:10', 1),
(126, '::1', 'riyan.clsg12@gmail.com', 2, '2021-04-18 18:56:29', 1),
(127, '::1', 'riyan.clsg13@gmail.com', 3, '2021-04-18 22:59:56', 1),
(128, '::1', 'riyan@undiksha.ac.id', 1, '2021-04-18 23:02:55', 1),
(129, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-22 21:25:46', 0),
(130, '::1', 'riyan.clsg12@gmail.com', 2, '2021-04-22 21:25:51', 1),
(131, '::1', 'riyan@undiksha.ac.id', 1, '2021-04-22 21:26:08', 1),
(132, '::1', 'riyan.clsg13@gmail.com', 3, '2021-04-22 21:26:29', 1),
(133, '::1', 'riyan@undiksha.ac.id', 1, '2021-04-22 21:32:08', 1),
(134, '::1', 'riyan@undiksha.ac.id', 1, '2021-04-22 23:11:24', 1),
(135, '::1', 'riyan@undiksha.ac.id', 1, '2021-04-22 23:21:19', 1),
(136, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-22 23:53:13', 0),
(137, '::1', 'riyan.clsg13@gmail.com', 3, '2021-04-22 23:53:19', 1),
(138, '::1', 'riyan.clsg12@gmail.com', 2, '2021-04-23 00:16:59', 1),
(139, '::1', 'deyan ardi', NULL, '2021-04-23 00:17:28', 0),
(140, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-23 00:17:34', 0),
(141, '::1', 'aa', NULL, '2021-04-23 00:17:39', 0),
(142, '::1', 'aada', NULL, '2021-04-23 00:17:49', 0),
(143, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-23 00:22:21', 0),
(144, '::1', 'riyan.clsg12@gmail.com', 2, '2021-04-23 00:22:29', 1),
(145, '::1', 'riyan.clsg12@gmail.com', 2, '2021-05-03 18:25:56', 1),
(146, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-05 23:47:53', 1),
(147, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-06 00:06:51', 1),
(148, '::1', 'riyan.clsg13@gmail.com', 3, '2021-05-06 00:07:12', 1),
(149, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-06 00:07:28', 1),
(150, '::1', 'ganatech.id@gmail.com', 4, '2021-05-06 00:10:04', 1),
(151, '::1', 'ganatech.id@gmail.com', 4, '2021-05-06 09:50:14', 1),
(152, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-06 10:01:36', 1),
(153, '::1', 'riyan.clsg13@gmail.com', 3, '2021-05-06 10:03:29', 1),
(154, '::1', 'riyan.clsg12@gmail.com', 2, '2021-05-06 12:38:48', 1),
(155, '::1', 'ganatech.id@gmail.com', 4, '2021-05-06 12:39:09', 1),
(156, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-06 12:39:23', 1),
(157, '::1', 'riyan.clsg13@gmail.com', 3, '2021-05-06 13:28:15', 1),
(158, '::1', 'ganatech.id@gmail.com', 4, '2021-05-06 21:00:02', 1),
(159, '::1', 'riyan.clsg13@gmail.com', 3, '2021-05-06 21:00:18', 1),
(160, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-06 21:28:54', 1),
(161, '::1', 'riyan.clsg13@gmail.com', 3, '2021-05-07 18:49:36', 1),
(162, '::1', 'riyan.clsg13@gmail.com', 3, '2021-05-12 21:26:25', 1),
(163, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-12 21:27:12', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'riyan@undiksha.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '7cb6499fd174e1715d7696f3318fb6ac', '2021-04-05 11:50:01'),
(2, 'riyan@undiksha.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '259b45d5402156dcebe8fcacc5cc38b4', '2021-04-05 11:56:44'),
(3, 'riyan.clsg12@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '0a18ec4b462f899ae8ca74fd30b3924b', '2021-04-09 10:09:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_kamar`
--

CREATE TABLE `kategori_kamar` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_kamar`
--

INSERT INTO `kategori_kamar` (`id_kategori`, `nama_kategori`, `deskripsi`, `created_at`, `created_by`) VALUES
(3, 'Kamar Single', 'Deskripsi Untuk Kamar Single', '2021-05-12 21:29:18', 'Deyan Ardi'),
(4, 'Kamar Double', 'Deskripsi Untuk Kamar Double', '2021-05-12 21:29:51', 'Deyan Ardi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `layanan_kamar` int(11) DEFAULT '0',
  `sub_total` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajemen_kamar`
--

CREATE TABLE `manajemen_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(250) NOT NULL,
  `deskripsi_kamar` text NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `foto_kamar` text NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_kamar` varchar(25) NOT NULL,
  `status_kamar` int(11) DEFAULT '0',
  `rating` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manajemen_kamar`
--

INSERT INTO `manajemen_kamar` (`id_kamar`, `nama_kamar`, `deskripsi_kamar`, `harga_kamar`, `foto_kamar`, `id_kategori`, `no_kamar`, `status_kamar`, `rating`, `created_at`, `created_by`) VALUES
(4, 'Kamar Single 1', 'Kamar ini menawarkan kamar dengan suasan yang sejuk dan asri yang dikelilingi dangan suasana perbukitan. Kamar ini juga dilengkapi dengan teras untuk menikmati pemandangan yang sangat indah dan interior kayu di kamar tidur dan kamar mandi dengan model classic', 250000, '[{\"kamar\":\"1620826317_91de7a1e3bc8106c750e.jpg\"},{\"kamar\":\"1620826318_93e14c3e5524940aaa76.jpg\"},{\"kamar\":\"1620826318_7f2f62095ee985e862e9.jpg\"},{\"kamar\":\"1620826318_76b6206b214397fb1a6e.jpg\"},{\"kamar\":\"1620826318_703f58fb92354a88b7f8.jpg\"},{\"kamar\":\"1620826318_e59210bd98b79d34e64d.jpg\"},{\"kamar\":\"1620826319_6623a2da535130fae315.jpg\"},{\"kamar\":\"1620826319_39203b08b02a12a0d902.jpg\"},{\"kamar\":\"1620826319_99cfc3c50c3f6c958f75.jpg\"},{\"kamar\":\"1620826319_b6a3981cef34a23a10da.jpg\"},{\"kamar\":\"1620826320_9834c4d3afbf984fd217.jpg\"}]', 3, '01', 0, NULL, '2021-05-12 21:32:00', 'Deyan Ardi'),
(5, 'Kamar Double 1', 'Kamar ini dirancang khusus untuk kenikmatan interaksi sosial, bersama keluarga, teman, atau kombinasi keduanya. Terletak di dalam kompleks taman yang tak bernoda dengan halaman rumput terawat dan spesies flora asli.', 500000, '[{\"kamar\":\"1620826371_4c80c0c88d23d9b99ce8.jpg\"},{\"kamar\":\"1620826372_02cae2a3b2e25872f2d8.jpg\"},{\"kamar\":\"1620826372_93dff920bccddac57f10.jpg\"},{\"kamar\":\"1620826372_b4fe12764b6fc4266194.jpg\"},{\"kamar\":\"1620826373_0436e3c0fbef5edda9c1.jpg\"}]', 4, '02', 0, NULL, '2021-05-12 21:32:53', 'Deyan Ardi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1617625728, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode_pesanan` varchar(15) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `total_bayar` int(11) NOT NULL DEFAULT '0',
  `sisa_bayar` int(11) DEFAULT '0',
  `accept_date` datetime DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `bukti_bayar` varchar(50) DEFAULT NULL,
  `tamu_dewasa` int(11) DEFAULT '0',
  `tamu_anak` int(11) DEFAULT '0',
  `pesan` text,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `status_keranjang` int(11) DEFAULT '0',
  `status_pesanan` int(11) DEFAULT '0',
  `status_bukti` int(11) DEFAULT '0',
  `status_menginap` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pesanan`
--

CREATE TABLE `rincian_pesanan` (
  `id_rincian` int(11) NOT NULL,
  `kode_pesanan` varchar(25) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `pay_date` datetime NOT NULL,
  `tamu_dewasa` int(11) NOT NULL,
  `tamu_anak` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `alamat` text,
  `ttl` date DEFAULT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto`, `alamat`, `ttl`, `no_tlp`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1619099119_6de58e3e47bac8a6b4c7.png', '', NULL, '081915656865', 'riyan@undiksha.ac.id', 'Deyan Ardi', '$2y$10$.ZQ9ylhkO4tm4Ly0oOTM3eHCGs3PSriypOExEcy9x5/1spCDxZXgq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-18 18:43:18', '2021-04-22 21:50:10', NULL),
(2, NULL, '', NULL, '8000000000', 'riyan.clsg12@gmail.com', 'Vina Velina', '$2y$10$6Ja5iYG6.QBlrQo2H9tC9uAztZI/kZhUuFNsmsdRfe7tC4rvvehGa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-18 18:48:27', '2021-04-18 18:56:03', NULL),
(3, '1618758945_e4e0d87afcea35a8d7d0.png', 'Desa Kalibukbuk', '1998-06-20', '81915656865', 'riyan.clsg13@gmail.com', 'Riyan Ardi', '$2y$10$E.bQNAueHYDA.LOjHL7MD.zVbnaM1597M/YZxaiS1mbkqLNRZCzwS', 'e31988d6c1c5998cefee61201835f995', NULL, '2021-04-23 01:03:02', NULL, NULL, NULL, 1, 0, '2021-04-18 22:58:24', '2021-04-23 00:03:02', NULL),
(4, NULL, 'lovina', '2021-05-03', '81915656865', 'ganatech.id@gmail.com', 'Deyan Deyan', '$2y$10$iHydH8GaM1F3hmwxqxt4S.LEPyUKMVqIfQJH3.WIsL4dgvxg6eRHi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-06 00:08:42', '2021-05-06 00:10:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `kategori_kamar`
--
ALTER TABLE `kategori_kamar`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_kamar` (`id_kamar`),
  ADD KEY `fk_keranjang_user` (`id_user`),
  ADD KEY `fk_keranjang_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `manajemen_kamar`
--
ALTER TABLE `manajemen_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `fk_kategori_kamar_kamar` (`id_kategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_user_keranjang` (`id_user`);

--
-- Indeks untuk tabel `rincian_pesanan`
--
ALTER TABLE `rincian_pesanan`
  ADD PRIMARY KEY (`id_rincian`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_kamar`
--
ALTER TABLE `kategori_kamar`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `manajemen_kamar`
--
ALTER TABLE `manajemen_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rincian_pesanan`
--
ALTER TABLE `rincian_pesanan`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `manajemen_kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keranjang_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keranjang_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `manajemen_kamar`
--
ALTER TABLE `manajemen_kamar`
  ADD CONSTRAINT `fk_kategori_kamar_kamar` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_kamar` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_user_keranjang` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
