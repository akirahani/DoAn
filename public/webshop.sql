-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 08:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$ugjTjR6za1e9HHWblsMNl.SYec0JxZpxYZhOX3LunwigUr1kmb95S', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi', 0, NULL, NULL, NULL),
(2, 'Iphone', 0, NULL, NULL, '2021-11-27 20:13:05'),
(3, 'Samsung', 0, NULL, NULL, '2021-11-27 20:13:48'),
(4, 'Oppo', 0, NULL, NULL, NULL),
(21, 'Vsmart', 0, NULL, '2021-11-26 09:11:31', '2021-11-26 09:11:31'),
(32, 'Sơn nội thất -Jotun', 0, NULL, '2022-02-18 19:27:27', '2022-03-26 10:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_10_050441_create_admins_table', 1),
(6, '2021_11_15_153619_create_categories_table', 2),
(7, '2021_11_22_130741_create_banners_table', 2),
(8, '2021_11_22_130801_create_news_table', 2),
(9, '2021_11_28_073303_create_products_table', 3),
(10, '2021_11_28_073334_create_image_products_table', 3),
(11, '2021_11_28_073415_create_product_tags_table', 3),
(12, '2021_11_28_073433_create_tags_table', 3),
(13, '2021_11_28_073517_create_customers_table', 3),
(14, '2021_11_28_073551_create_orders_table', 3),
(15, '2021_11_28_073628_create_order_products_table', 3),
(16, '2021_11_28_114605_create_detail_products_table', 4),
(17, '2021_11_28_073304_create_products_table', 5),
(18, '2021_11_28_114606_create_detail_products_table', 5),
(19, '2021_11_22_130803_create_news_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Corrona', '<p>dasdasdasdasdasd</p>\r\n\r\n<p>as</p>\r\n\r\n<p>das</p>\r\n\r\n<p>d</p>\r\n\r\n<p>as</p>\r\n\r\n<p>d</p>\r\n\r\n<p>as</p>\r\n\r\n<p>d</p>\r\n\r\n<p>as</p>\r\n\r\n<p>as</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>as</p>', '1641348110.jpg', '2022-01-04 19:01:50', '2022-01-04 19:01:50'),
(4, 'Có nên chờ mua Samsung Galaxy A03 - Điện thoại giá rẻ cực HOT', '<h2><a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-a03\" target=\"_blank\" title=\"Galaxy A03\" type=\"Galaxy A03\">Galaxy A03</a>&nbsp;đ&atilde; được nh&agrave;&nbsp;<a href=\"http://www.thegioididong.com/samsung\" target=\"_blank\" title=\"Samsung \" type=\"Samsung \">Samsung</a>&nbsp;tr&igrave;nh l&agrave;ng tại thị trường Việt Nam.&nbsp;Tiếp nối truyền thống của những chiếc điện thoại gi&aacute; rẻ trước đ&acirc;y th&igrave; mẫu&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"smartphone \" type=\"smartphone \">smartphone</a>&nbsp;n&agrave;y sở hữu m&agrave;n h&igrave;nh lớn c&ugrave;ng vi&ecirc;n pin si&ecirc;u tr&acirc;u như chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-a03s\" target=\"_blank\" title=\"Galaxy A03s\" type=\"Galaxy A03s\">Galaxy A03s</a>&nbsp;vừa được ra mắt c&aacute;ch đ&acirc;y kh&ocirc;ng l&acirc;u. Vậy&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/samsung-galaxy-a03-co-diem-gi-noi-bat-1392650\" target=\"_blank\" title=\"Galaxy A03 có điểm gì nổi bật\" type=\"Galaxy A03 có điểm gì nổi bật\">Galaxy A03 c&oacute; g&igrave; nổi bật</a>? H&atilde;y c&ugrave;ng&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc\" target=\"_blank\" title=\"24h Công Nghệ\" type=\"24h Công Nghệ\">24h C&ocirc;ng nghệ</a>&nbsp;t&igrave;m hiểu trong b&agrave;i viết n&agrave;y nh&eacute;.</h2>\r\n\r\n<h3><strong>1. M&agrave;n h&igrave;nh Samsung Galaxy A03 6.5 inch với&nbsp;độ ph&acirc;n giải HD+</strong></h3>\r\n\r\n<p>Galaxy A03 được xem như phi&ecirc;n bản thu gọn với tầm gi&aacute; phải chăng hơn&nbsp;của Galaxy A03s. Nhắc lại một ch&uacute;t về Galaxy A03s, đ&acirc;y l&agrave; chiếc smartphone gi&aacute; rẻ vừa Samsung ra mắt v&agrave;o th&aacute;ng 8/2021. Thiết bị sở hữu m&agrave;n h&igrave;nh PLS TFT LCD 6.5 inch độ ph&acirc;n giải HD+ (720 x 1.600 pixel).<img alt=\"\" src=\"http://127.0.0.1:8000/public/upload/img-backend/ckeditor/galaxya03mau_1280x720-800-resize_1641350140.jpg\" style=\"height:428px; width:760px\" /></p>\r\n\r\n<p>V&agrave; một tin vui rằng Galaxy A03 cũng được trang bị một m&agrave;n h&igrave;nh hiển thị tốt&nbsp;tương tự như Galaxy A03s. Với m&agrave;n h&igrave;nh Infinity-V 6.5 inch hoạt động tr&ecirc;n tấm nền LCD th&igrave; chiếc smartphone n&agrave;y vẫn đ&aacute;p&nbsp;ứng&nbsp;được c&aacute;c nhu cầu cơ bản như&nbsp;l&agrave;m việc, học tập, giải tr&iacute; của người d&ugrave;ng với chất lượng h&igrave;nh&nbsp;ảnh&nbsp;đẹp mắt tr&ecirc;n một kh&ocirc;ng gian rộng r&atilde;i.</p>\r\n\r\n<p>C&oacute; thể n&oacute;i, ở ph&acirc;n kh&uacute;c gi&aacute; rẻ n&agrave;y, m&igrave;nh cũng kh&ocirc;ng qu&aacute; mong đợi nhiều ở chất lượng m&agrave;n h&igrave;nh. Ch&iacute;nh v&igrave; vậy, với những trang bị m&agrave; nh&agrave; Samsung mang đến cho ch&uacute;ng ta tr&ecirc;n thiết bị n&agrave;y th&igrave; ho&agrave;n to&agrave;n c&oacute; thể chấp nhận được.</p>\r\n\r\n<h3><strong>2. Galaxy A03 - Mẫu điện thoại pin tr&acirc;u gi&aacute; rẻ với vi&ecirc;n pin 5.000 mAh</strong></h3>\r\n\r\n<p>Giống như thế hệ &#39;đ&agrave;n anh&#39; Galaxy A03 c&oacute; vi&ecirc;n pin khỏe l&ecirc;n&nbsp;đến 5.000 mAh. V&igrave; vậy, chiếc smartphone n&agrave;y c&oacute; thể dư sức phục vụ tốt c&aacute;c nhu cầu cả ng&agrave;y d&agrave;i li&ecirc;n tục cũng như tối&nbsp;ưu h&oacute;a thời gian sử dụng thiết bị của người d&ugrave;ng.</p>\r\n\r\n<p>Galaxy A03 sẽ l&agrave; một chiếc&nbsp;điện thoại ph&ugrave; hợp với học sinh sinh vi&ecirc;n khi muốn t&igrave;m mua một chiếc&nbsp;điện thoại tầm gi&aacute; rẻ nhưng sở hữu dung lượng pin lớn hỗ trợ học tập v&agrave; l&agrave;m việc trong cả ng&agrave;y d&agrave;i. Vi&ecirc;n pin lớn như thế n&agrave;y th&igrave; đ&acirc;y cũng l&agrave; một lựa chọn đ&aacute;ng c&acirc;n nhắc cho c&aacute;c shipper hay những t&agrave;i xế xe &ocirc;m c&ocirc;ng nghệ đấy.</p>\r\n\r\n<h3><strong>3. Galaxy A03 nổi bật với camera&nbsp;độ ph&acirc;n giải cao 48 MP</strong></h3>\r\n\r\n<p>Kh&aacute; bất ngờ khi Galaxy A03 lại được đổi mới một ch&uacute;t về thiết kế cụm camera. Mới nh&igrave;n qua, m&igrave;nh c&oacute; cảm gi&aacute;c kh&aacute; quen thuộc với hai cảm biến sau được đặt gọn trong h&igrave;nh vu&ocirc;ng. Thoạt nh&igrave;n m&igrave;nh thấy n&oacute; kh&aacute; tương tự như chiếc iPhone 11, bạn c&oacute; thấy như m&igrave;nh kh&ocirc;ng?</p>\r\n\r\n<p>Đặc biệt, về th&ocirc;ng số camera ch&iacute;nh th&igrave; nh&agrave; Samsung c&oacute; sự n&acirc;ng cấp lớn với camera ch&iacute;nh độ ph&acirc;n giải l&ecirc;n đến 48 MP v&agrave; một camera đo độ s&acirc;u 2 MP. Tuy bị cắt giảm bớt một camera macro nhưng b&ugrave; lại ch&uacute;ng ta c&oacute; một ống k&iacute;nh ch&iacute;nh với độ ph&acirc;n giải cao hơn. V&agrave; ở mặt trước l&agrave; camera selfie 5 MP.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/public/upload/img-backend/ckeditor/6_1280x720-800-resize_1641350194.png\" style=\"float:left; height:428px; width:760px\" /></p>', '1641350248.jpg', '2022-01-04 19:37:28', '2022-01-04 19:37:28'),
(5, 'dá', '<p>fdsasda</p>', '1646032369.jpg', '2022-02-28 00:12:49', '2022-02-28 00:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `status`, `received_date`, `name`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(21, 14200000, 1, '2021-12-17', 'Linh', '0126330645', '12 LKT, NQ, HP', 'Giao hàng nhanh', '2021-12-12 05:45:38', '2021-12-12 05:45:38'),
(22, 6200000, 1, '2021-12-30', 'LG', '012633065', 'Ngo Quyen', 'ssss', '2021-12-12 06:52:25', '2021-12-12 06:52:25'),
(23, 8000000, 1, '2021-12-08', 'sss', '0126330646', 'NQ HP', 'dssđs', '2021-12-12 06:54:48', '2021-12-12 06:54:48'),
(24, 21100000, 1, '2021-12-21', 'aaa', '0126334585', 'âd', 'aaaa', '2021-12-12 20:41:25', '2021-12-12 20:41:25'),
(25, 42200000, 1, '2022-01-04', 'Linh', '0357836964', 'Ngo Quyen', 'đáasdsa', '2022-01-03 20:43:19', '2022-01-03 20:43:19'),
(26, 243120000, 1, '2022-03-30', 'ha anh', '2141241232', '73 Ngô Gia Tự, Cát Bi, Hải An, Hải Phòng', 'a', '2022-03-21 09:28:45', '2022-03-21 09:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `order_id`, `quantity`, `created_at`, `updated_at`) VALUES
(23, 4, 21, 1, NULL, NULL),
(24, 6, 21, 1, NULL, NULL),
(25, 4, 22, 1, NULL, NULL),
(26, 6, 23, 1, NULL, NULL),
(27, 7, 24, 2, NULL, NULL),
(28, 7, 25, 357836964, NULL, NULL),
(29, 8, 26, 1, NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `price_sale` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rear_cam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `front_cam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory_stick` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `price_sale`, `category_id`, `image`, `status`, `display`, `rear_cam`, `front_cam`, `ram`, `rom`, `cpu`, `pin`, `system`, `sim`, `memory_stick`, `created_at`, `updated_at`) VALUES
(3, 'Sơn Jotun- sơn nước Jotaplast -17 lit', 850000, 4000000, 32, '1648314588.png', '', 'Sơn nội thất trong nhà', '17lit -25kg', '20 MP', '6 GB', '64 GB', 'MediaTek Helio G90T', '4500 mAh', 'Android 9 (Pie)', '2 Nano SIM Hỗ trợ 4G', '256GB', '2021-11-28 07:35:45', '2022-03-26 10:15:50'),
(4, 'Xiaomi Black Shark 2', 6200000, 0, 1, '1638930946.jpg', '', 'AMOLED6.39\"Full HD+', 'Chính 48 MP & Phụ 12 MP', '20 MP', '8 GB', '128 GB', 'Snapdragon 855', '4000 mAh', 'Android 9 (Pie)', '2 Nano SIMHỗ trợ 4G', '256 GB', '2021-11-28 07:37:13', '2021-12-07 19:35:46'),
(6, 'Iphone Xs', 8000000, 0, 2, '1638190390.jpg', '', '', '', '', '0', '0', '', '0', '0', '', '', '2021-11-29 05:53:10', '2021-11-29 05:53:10'),
(7, 'Iphone XS max', 10550000, 9550000, 2, '1638190466.jpg', '', '', '', '', '0', '0', '', '0', '0', '', '', '2021-11-29 05:54:26', '2021-11-29 05:54:26'),
(8, 'Iphone 12 Pro Max', 30390000, 30000000, 2, '1638191236.jpg', '', '', '', '', '0', '0', '', '0', '0', '', '', '2021-11-29 05:57:11', '2021-11-29 06:07:16'),
(9, 'Iphone 11', 17000000, 16000000, 2, '1638190702.jpg', '', '', '', '', '0', '0', '', '0', '0', '', '', '2021-11-29 05:58:22', '2021-11-29 05:58:22'),
(10, 'Iphone 13 Pro max', 46000000, 0, 2, '1638191352.jpg', '', '6.1\", Super Retina XDR, OLED, 2532 x 1170 Pixel', '12.0 MP + 12.0 MP + 12.0 MP', '12.0 MP', '6 GB', '128 GB', 'A15 Bionic', '3095 mAh', 'iOS 15', '2, 1 eSIM, 1 Nano SIM', '256GB', '2021-11-29 06:08:19', '2021-12-12 17:48:31'),
(11, 'Xiaomi redmi 10', 3990000, 0, 1, '1638191815.jpg', '', '', '', '', '0', '0', '', '0', '0', '', '', '2021-11-29 06:16:55', '2021-11-29 06:16:55'),
(13, 'VinSAris Pro', 4000000, 0, 21, '1639359982.jpg', NULL, '16LCD OLED', '12MP 8MP', '8MP', '4GB', '128GB', 'Snapdragon 839', '4500 mAh', 'Android', '2 SIM', '256GB', '2021-12-12 08:01:59', '2021-12-12 18:46:22'),
(14, 'Vsmart Joy 4', 8000000, 0, 21, '1639359693.png', NULL, '6.53\", FHD+, LTPS IPS LCD, 1080 x 2340 Pixel', '16.0 MP + 8.0 MP + 2.0 MP + 2.0 MP', '13.0 MP', '8GB', '64 GB', 'Snapdragon 665', '5000 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:15:21', '2021-12-12 18:41:33'),
(15, 'Vsmart Live 4', 9000000, 0, 21, '1639359747.jpg', NULL, '6.5\", FHD+, IPS LCD, 1080 x 2340 Pixel', '48.0 MP + 8.0 MP + 5.0 MP + 2.0 MP', '13.0 MP', '6 GB', '64 GB', 'Snapdragon 675', '5000 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:21:09', '2021-12-12 18:42:27'),
(16, 'Vsmart Star 4', 1200000, 0, 21, '1639359759.jpg', NULL, '6.09\", HD+, IPS LCD, 720 x 1560 Pixel', '8.0 MP + 5.0 MP', '8.0 MP', '3GB', '32GB', 'Helio P35', '3500 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:24:22', '2021-12-12 18:42:39'),
(17, 'Vsmart Aris Pro', 22000000, 0, 21, '1639359928.jpg', NULL, '6.8\", WQHD+, Dynamic AMOLED 2X, 1440 x 3200 Pixel', '108.0 MP + 10.0 MP + 12.0 MP + 10.0 MP', '40.0 MP', '12 GB', '128 GB', 'Exynos 2100', '5000 mAh', 'Android 11', '2, 2 Nano SIM hoặc 1 eSIM, 1 Nano SIM', '0', '2021-12-12 08:28:34', '2021-12-12 18:45:28'),
(18, 'Samsung Galaxy A71', 11500000, 0, 3, '1639360085.jpg', NULL, '6.7\", FHD+, Super AMOLED, 1080 x 2400 Pixel', '64.0 MP + 12.0 MP + 5.0 MP + 5.0 MP', '32.0 MP', '8 GB', '128 GB', 'Snapdragon 730', '4500 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:31:59', '2021-12-12 18:48:53'),
(19, 'Samsung Galaxy A51', 5000000, 0, 3, '1639360177.jpg', NULL, '6.53\", FHD+, LTPS IPS LCD, 1080 x 2340 Pixel', '64.0 MP + 12.0 MP + 5.0 MP + 5.0 MP', '32.0 MP', '8GB', '64 GB', 'Snapdragon 665', '5000 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:36:49', '2021-12-12 18:51:07'),
(20, 'Samsung Galaxy A12', 3000000, 0, 3, '1639360195.jpg', NULL, '6.5\", HD+, TFT LCD, 720 x 1600 Pixel', '48.0 MP + 5.0 MP + 2.0 MP + 2.0 MP', '8.0 MP', '4GB', '128 GB', 'Helio G35/Exynos 850', '5000 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:39:35', '2021-12-12 18:50:52'),
(21, 'Oppo A12', 2200000, 0, 4, '1639360285.jpg', NULL, '6.22\", HD+, IPS LCD, 720 x 1560 Pixel', '13.0 MP + 2.0 MP', '5.0 MP', '3GB', '32GB', 'Helio P35', '4230 mAh', 'Android 9.0', '2, Nano SIM', '0', '2021-12-12 08:41:56', '2021-12-12 18:51:25'),
(22, 'OPPO A93', 6400000, 0, 4, '1639360321.jpg', NULL, '6.43\", FHD+, AMOLED, 1080 x 2400 Pixel', '48.0 MP + 8.0 MP + 2.0 MP + 2.0 MP', '16.0 MP + 2.0 MP', '8GB', '128 GB', 'Mediatek Helio P95', '4500 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:44:04', '2021-12-12 18:52:01'),
(23, 'OPPO A95', 7000000, 0, 4, '1639360375.jpg', NULL, '6.43\", FHD+, AMOLED, 1080 x 2400 Pixel', '48.0 MP + 2.0 MP + 2.0 MP', '16.0 MP', '8GB', '128 GB', 'Snapdragon 662', '5000 mAh', 'Android 10.0', '2, Nano SIM', '0', '2021-12-12 08:46:01', '2021-12-12 18:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$9VGQw3oOnE43YPm5wqziOeXU61Tirst0EdUgC502VV2MZ6S1IzTfC', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
