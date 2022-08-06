-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 03:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Danh mục con của DM 1', 1, 7, '2021-11-29 16:30:48', '2021-12-18 17:32:35'),
(2, 'Danh mục 3', 1, 0, '2021-11-29 16:31:22', '2021-12-18 17:32:20'),
(3, 'Danh mục 2', 1, 0, '2021-11-29 16:32:34', '2021-12-18 17:32:16'),
(5, 'Danh mục con 1 của DM 2', 1, 3, '2021-11-29 16:59:59', '2021-12-18 17:32:55'),
(6, 'Danh mục con của DM 2', 1, 3, '2021-11-29 17:12:36', '2021-12-18 17:32:48'),
(7, 'Danh mục 1', 1, 0, '2021-11-29 17:12:50', '2021-12-18 17:32:10'),
(8, 'Danh mục con 2 của DM 1', 1, 7, '2021-12-18 17:42:56', '2021-12-18 17:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_28_071008_create_categories_table', 1),
(6, '2021_11_28_071131_create_products_table', 1),
(7, '2021_11_28_072348_create_sizes_table', 1),
(8, '2021_11_28_074804_create_product_sizes_table', 1),
(9, '2021_11_28_074827_create_orders_table', 1),
(10, '2021_11_28_075311_create_order_details_table', 1),
(11, '2021_11_28_080238_create_news_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `name`, `short_description`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-12-19-04-57-0161bf01ed5ec65.jpg', 'It is a long established fact a reader be distracted', 'Creative WordPress Themes', '<p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>\r\n\r\n<p><img alt=\"\" src=\"images/image_2.jpg\" /></p>\r\n\r\n<p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>\r\n\r\n<p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>\r\n\r\n<p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>\r\n\r\n<p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>', 1, '2021-12-09 04:41:04', '2021-12-19 09:57:01'),
(2, '2021-12-09-11-41-1161b188e7dbf5f.jpg', 'meow 1', 'meow 1', '<p>meow 1</p>', 1, '2021-12-09 04:41:11', '2021-12-09 04:41:11'),
(3, '2021-12-09-11-41-1961b188efb828c.png', 'meow 2', 'meow 2 meow 2 meow 2 meow 2 meow 2 meow 2', '<p>meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;meow 2 Đang cập nhật&nbsp;</p>', 1, '2021-12-09 04:41:19', '2021-12-10 09:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0: Đã xác nhận, 1: Chưa xác nhận, 2: Đã thanh toán',
  `notification` int(11) NOT NULL DEFAULT '1' COMMENT '0: Đã đọc, 1: Chưa đọc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `note`, `status`, `notification`, `created_at`, `updated_at`) VALUES
(1, 6, 'i luv uuu', 2, 0, '2021-12-09 07:07:47', '2021-12-09 07:34:35'),
(2, 6, '123', 1, 1, '2021-12-10 09:09:01', '2021-12-10 09:09:01'),
(3, 6, NULL, 1, 1, '2021-12-10 09:18:36', '2021-12-10 09:18:36'),
(4, 6, 'ok ok ok', 1, 1, '2021-12-13 13:09:36', '2021-12-13 13:09:36'),
(6, 7, '123dfsd f', 1, 1, '2021-12-13 13:10:52', '2021-12-13 13:10:52'),
(7, 7, NULL, 1, 1, '2021-12-13 13:17:47', '2021-12-13 13:17:47'),
(8, 7, NULL, 1, 1, '2021-12-13 13:19:11', '2021-12-13 13:19:11'),
(9, 19, NULL, 1, 0, '2021-12-19 09:22:09', '2021-12-19 09:22:53'),
(10, 19, '213213', 1, 1, '2021-12-20 14:42:56', '2021-12-20 14:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_size_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 280000, '2021-12-09 07:07:47', '2021-12-09 07:07:47'),
(2, 1, 3, 3, 840000, '2021-12-09 07:07:47', '2021-12-09 07:07:47'),
(3, 2, 6, 3, 57000, '2021-12-10 09:09:01', '2021-12-10 09:09:01'),
(4, 3, 1, 1, 280000, '2021-12-10 09:18:36', '2021-12-10 09:18:36'),
(5, 4, 1, 1, 280000, '2021-12-13 13:09:36', '2021-12-13 13:09:36'),
(6, 4, 3, 1, 280000, '2021-12-13 13:09:36', '2021-12-13 13:09:36'),
(7, 6, 6, 1, 19000, '2021-12-13 13:10:53', '2021-12-13 13:10:53'),
(8, 7, 7, 1, 350000, '2021-12-13 13:17:47', '2021-12-13 13:17:47'),
(9, 8, 6, 1, 19000, '2021-12-13 13:19:11', '2021-12-13 13:19:11'),
(10, 9, 7, 3, 1050000, '2021-12-19 09:22:09', '2021-12-19 09:22:09'),
(11, 9, 6, 1, 19000, '2021-12-19 09:22:09', '2021-12-19 09:22:09'),
(12, 10, 2, 4, 1120000, '2021-12-20 14:42:56', '2021-12-20 14:42:56'),
(13, 10, 1, 1, 280000, '2021-12-20 14:42:56', '2021-12-20 14:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `price` double NOT NULL DEFAULT '0',
  `sale_percent` double NOT NULL DEFAULT '0' COMMENT 'Phần trăm sale',
  `price_sale` double DEFAULT '0' COMMENT 'Giá sale',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `image`, `name`, `description`, `price`, `sale_percent`, `price_sale`, `status`, `created_at`, `updated_at`) VALUES
(10, 7, '2021-12-19-09-50-3961bf46bf8bf6e.jpg', 'Sản phẩm 3', '<p>Đang cập nhật</p>', 350000, 0, 350000, 1, '2021-12-08 10:47:50', '2021-12-19 14:50:39'),
(11, 7, '2021-12-19-09-50-3361bf46b99114f.jpg', 'Sản phẩm 2', '<p>Đang cập nhật</p>', 350000, 20, 280000, 1, '2021-12-09 04:13:48', '2021-12-19 14:50:33'),
(12, 7, '2021-12-19-09-50-2461bf46b0cf737.jpg', 'Sản phẩm 1', '<p>Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;Đang cập nhật&nbsp;</p>', 20000, 5, 19000, 1, '2021-12-09 11:33:58', '2021-12-19 14:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 11, 4, 6, '2021-12-09 04:57:09', '2021-12-20 14:42:56'),
(2, 11, 3, 11, '2021-12-09 04:57:15', '2021-12-20 14:42:56'),
(3, 11, 2, 1, '2021-12-09 04:57:19', '2021-12-13 13:09:36'),
(4, 11, 1, 20, '2021-12-09 04:57:23', '2021-12-09 04:57:23'),
(6, 12, 5, 0, '2021-12-10 08:22:56', '2021-12-19 09:22:09'),
(7, 10, 5, 6, '2021-12-13 13:14:16', '2021-12-19 09:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '28', 1, '2021-12-09 04:56:50', '2021-12-09 04:56:50'),
(2, '29', 1, '2021-12-09 04:56:53', '2021-12-09 04:56:53'),
(3, '30', 1, '2021-12-09 04:56:58', '2021-12-09 04:56:58'),
(4, '31', 1, '2021-12-09 04:57:02', '2021-12-09 04:57:02'),
(5, 'Hàng mới', 1, '2021-12-10 08:21:25', '2021-12-10 08:21:25'),
(6, 'Hàng cũ', 1, '2021-12-10 08:21:31', '2021-12-10 08:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 0, 'Nguyễn Tiến Thành', 'admin@gmail.com', NULL, '$2y$10$z7CyGiTCtzWqfY2kiCyFgOj9JU.j60iT65FD3aKhUcvixmtklNXqu', '0334736187', 'Trần Phú, Hà Đông', NULL, '2021-11-28 05:02:16', '2021-11-28 05:02:16'),
(7, 1, 'Nguyễn Tiến Thành', 'nguyentienthanh9291@gmail.com', NULL, '$2y$10$z7CyGiTCtzWqfY2kiCyFgOj9JU.j60iT65FD3aKhUcvixmtklNXqu', '0334736188', 'Trần Phú, Hà Đông', NULL, '2021-11-28 13:18:15', '2021-11-29 16:39:05'),
(15, 1, 'unicostreel', 'unicosteelco@gmail.com', NULL, '$2y$10$9JeuecovitLioOqEXCBy7OmfD5jcopPTGcLswp2GHPll2giHg.w3y', '0904123459', 'Số 1137 Đê La Thành, phường Ngọc Khánh, Ba Đình, Hà Nội', NULL, '2021-12-07 09:06:00', '2021-12-07 09:06:00'),
(19, 1, 'unicostreel', 'nguyentienthanh9291server@gmail.com', NULL, '$2y$10$IZ1/WTby3sP6X1RV7a85n.Yvup9vX4Ui9nCzB/S3wNnmS8tmpdY.G', '0904123453', 'Số 1137 Đê La Thành, phường Ngọc Khánh, Ba Đình, Hà Nội', NULL, '2021-12-07 11:27:10', '2021-12-19 09:23:45'),
(23, 1, 'Thành', 'nguyentienthanh9291server1@gmail.com', NULL, '$2y$10$IS5iZclr21jfLauj60YC9.y2jN2IWyPQetBezuNII9rCPWRGqq8eO', '0334736184', 'Hà Đông', NULL, '2021-12-07 16:44:14', '2021-12-19 11:28:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
