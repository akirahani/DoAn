-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 07:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
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
(1, 'Admin', 'admin@gmail.com', '$2y$10$H6gTYdLq4ocASJhFD7nyG.DZvQTgvpDQ1Z4mRj75sPuDs2./oJYYe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `manual`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Sơn ngoại thất', '<p>D&ugrave;ng ở ngo&agrave;i c&ocirc;ng tr&igrave;nh</p>', 0, '2022-04-03 09:05:57', '2022-04-03 09:05:57'),
(3, 'Sơn nội thất', '<p>D&ugrave;ng b&ecirc;n trong c&ocirc;ng tr&igrave;nh</p>', 0, '2022-04-03 09:06:14', '2022-04-03 09:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `category_colors`
--

CREATE TABLE `category_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `name`, `logo`, `favicon`, `address`, `tel`, `description`, `sub_description`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', '1648986649.jpg', '1648986649.jpg', '73 Ngô Gia Tự, Cát Bi, Hải An, Hải Phòng', '0934357971', 'Cấu hình trang chủ', 'Cấu hình trang chủ', '#', '#', '#', '2022-04-03 04:48:23', '2022-04-03 04:50:49');

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
(5, '2022_02_17_141829_create_admins_table', 1),
(6, '2022_02_17_141916_create_roles_table', 1),
(7, '2022_02_17_142001_create_permissions_table', 1),
(8, '2022_02_17_142038_create_admin_roles_table', 1),
(9, '2022_02_17_142057_create_role_permissions_table', 1),
(10, '2022_02_17_161958_create_categories_table', 1),
(11, '2022_02_17_162327_create_configs_table', 1),
(12, '2022_02_17_162356_create_category_news_table', 1),
(13, '2022_02_17_162408_create_news_table', 1),
(14, '2022_02_17_162618_create_category_colors_table', 1),
(15, '2022_02_17_162629_create_colors_table', 1),
(16, '2022_02_17_162843_create_thumnails_table', 1),
(17, '2022_02_19_061407_create_product_details_table', 1),
(18, '2022_02_19_061551_create_orders_table', 1),
(19, '2022_02_19_061558_create_order_details_table', 1),
(20, '2022_02_23_034301_create_products_table', 1),
(21, '2022_03_06_051809_create_navbars_table', 1),
(22, '2022_03_21_095302_create_trademarks_table', 1),
(23, '2022_02_17_161957_create_categories_table', 2),
(24, '2022_02_23_034302_create_products_table', 3),
(25, '2022_02_23_034303_create_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `navbars`
--

CREATE TABLE `navbars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` bigint(20) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navbars`
--

INSERT INTO `navbars` (`id`, `title`, `ordering`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 1, '/', '2022-04-03 04:58:17', '2022-04-03 04:58:31'),
(2, 'Giới thiệu', 2, '/introduce', '2022-04-03 05:00:39', '2022-04-03 05:00:39'),
(3, 'Sản phẩm', 3, '/product', '2022-04-03 05:01:11', '2022-04-03 05:01:11'),
(4, 'Tin tức', 4, '/news', '2022-04-03 05:01:32', '2022-04-03 05:01:32'),
(5, 'Liên hệ', 5, '/contact', '2022-04-03 05:01:42', '2022-04-03 05:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'CHƯƠNG TRÌNH NHÀ THẦU CHUYÊN NGHIỆP SƠN TOA 2022: DÙNG SƠN - TÍCH ĐIỂM - NHẬN QUÀ', '<p>Với sự đồng h&agrave;nh, tin tưởng v&agrave; ủng hộ của Qu&yacute; Nh&agrave; Thầu, Thợ Sơn đối với c&aacute;c sản phẩm của sơn TOA, ch&iacute;nh l&agrave; một trong những động lực gi&uacute;p sơn TOA ph&aacute;t triển như ng&agrave;y h&ocirc;m nay.&nbsp;<a href=\"https://www.toagroup.com.vn/\"><strong>C&ocirc;ng ty TNHH Sơn TOA Việt Nam</strong></a>&nbsp;xin tr&acirc;n trọng giới thiệu&nbsp;<strong>Chương tr&igrave;nh Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA 2022</strong>&nbsp;với mong muốn tri &acirc;n kh&aacute;ch h&agrave;ng, đem lại những lợi &iacute;ch thiết thực v&agrave; hiệu quả cho c&aacute;c nh&agrave; thầu đ&atilde;, đang v&agrave; sẽ l&agrave; Hội vi&ecirc;n của chương tr&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; chương tr&igrave;nh t&iacute;ch lũy điểm thưởng d&agrave;nh cho Qu&yacute; Nh&agrave; thầu, Thợ Sơn th&ocirc;ng qua ứng dụng&nbsp;<strong>TOA.painter</strong>&nbsp;tr&ecirc;n điện thoại th&ocirc;ng minh. C&aacute;c th&agrave;nh vi&ecirc;n khi tham gia chương tr&igrave;nh t&iacute;ch lũy điểm thưởng bằng c&aacute;ch sử dụng ứng dụng tr&ecirc;n để qu&eacute;t m&atilde; QR in tr&ecirc;n nắp th&ugrave;ng của sản phẩm khi mua c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng của sơn TOA tại c&aacute;c đại l&yacute; tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/2fbf59a8b19020-bannerdungsontichdiemnhanqua_1648987410.jpg\" style=\"height:420px; width:840px\" /></p>\r\n\r\n<p><strong>1. ĐỐI TƯỢNG THAM GIA</strong></p>\r\n\r\n<p>Tất cả kh&aacute;ch h&agrave;ng tr&ecirc;n 18 tuổi, l&agrave;&nbsp;<strong>Nh&agrave; thầu Hội vi&ecirc;n TOA</strong>&nbsp;(*) của chương tr&igrave;nh Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA.</p>\r\n\r\n<p>(*) Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA (sau đ&acirc;y gọi tắt l&agrave; Hội vi&ecirc;n) l&agrave; những Hội vi&ecirc;n đ&atilde; gia nhập trong năm 2019, năm 2020, năm 2021 v&agrave; Hội vi&ecirc;n mới gia nhập năm 2022.</p>\r\n\r\n<p><strong>2. C&Aacute;CH THỨC ĐĂNG K&Yacute; T&Agrave;I KHOẢN, T&Iacute;CH ĐIỂM &amp; NHẬN QU&Agrave;</strong></p>\r\n\r\n<p><strong>Bước 1:</strong>&nbsp;Nh&agrave; thầu điền đầy đủ th&ocirc;ng tin v&agrave;o Đơn đăng k&yacute; theo mẫu của sơn TOA cung cấp th&ocirc;ng qua nh&acirc;n vi&ecirc;n của TOA:</p>\r\n\r\n<ul>\r\n	<li>Cung cấp bản sao Giấy tờ tuỳ th&acirc;n (CMND/ CCCD/ Hộ chiếu) nếu l&agrave; nh&agrave; thầu c&aacute; nh&acirc;n.</li>\r\n	<li>Cung cấp bản sao Giấy chứng nhận đăng k&yacute; doanh nghiệp (hoặc giấy tờ c&oacute; gi&aacute; trị ph&aacute;p l&yacute; tương đương) nếu nh&agrave; thầu l&agrave; tổ chức được th&agrave;nh lập hợp ph&aacute;p tại Việt Nam.</li>\r\n</ul>\r\n\r\n<p><strong>Bước 2:</strong>&nbsp;Nh&acirc;n vi&ecirc;n Sơn TOA sẽ kiểm tra, đăng tải v&agrave; x&aacute;c nhận th&ocirc;ng tin đăng k&yacute; của nh&agrave; thầu tr&ecirc;n ứng dụng TOA.dms<strong>&nbsp;</strong>(**)</p>\r\n\r\n<p><strong>Bước 3:</strong>&nbsp;TOA th&ocirc;ng b&aacute;o cho nh&agrave; thầu về việc đăng k&yacute; th&agrave;nh c&ocirc;ng t&agrave;i khoản qua số điện thoại v&agrave;/ hoặc địa chỉ email k&egrave;m với M&atilde; Hội vi&ecirc;n, ch&iacute;nh thức trở th&agrave;nh Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA.</p>\r\n\r\n<p><strong>Bước 4:</strong>&nbsp;Nh&agrave; thầu được cung cấp một t&agrave;i khoản Hội vi&ecirc;n để đăng nhập v&agrave;o ứng dụng&nbsp;<strong>TOA.painter</strong>&nbsp;(***)</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.toagroup.com.vn/uploads/images/847a3dfeb39033-toapainter.png\" style=\"height:161px; width:508px\" /></p>\r\n\r\n<p><em>Ch&uacute; th&iacute;ch:&nbsp;</em><br />\r\n(**)&nbsp;TOA.dms: Ứng dụng d&agrave;nh cho nh&acirc;n vi&ecirc;n của sơn TOA<br />\r\n(***) TOA.painter: Ứng dụng qu&eacute;t m&atilde; QR d&agrave;nh cho Hội vi&ecirc;n</p>\r\n\r\n<p><strong>3.&nbsp;THỜI GIAN &Aacute;P DỤNG CHƯƠNG TR&Igrave;NH KHUYẾN M&Atilde;I</strong></p>\r\n\r\n<p>Chương tr&igrave;nh tạo điều kiện cho c&aacute;c nh&agrave; thầu v&agrave; Hội vi&ecirc;n c&oacute; thể tham gia v&agrave; nhận được c&aacute;c phần qu&agrave; hấp dẫn với thời gian diễn ra bắt đầu từ 04/01/2022 đến 31/12/2022.</p>\r\n\r\n<p><strong>3.1. Hoạt động khuyến m&atilde;i 1</strong></p>\r\n\r\n<p>Mỗi Nh&agrave; thầu sau khi đăng k&yacute; th&agrave;nh c&ocirc;ng sẽ trở th&agrave;nh Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA v&agrave; được cấp M&atilde; Hội vi&ecirc;n trong thời gian khuyến mại của hoạt động khuyến m&atilde;i 1 sẽ được tặng&nbsp;<strong>một (01) &aacute;o thun &ldquo;Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA&rdquo; v&agrave; một (01) n&oacute;n kết</strong></p>\r\n\r\n<p>Qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết n&agrave;y sẽ được Nh&acirc;n vi&ecirc;n của TOA trao cho Nh&agrave; thầu theo c&aacute;c đợt như sau:</p>\r\n\r\n<ul>\r\n	<li><em><strong>Đợt 1:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 1 v&agrave; th&aacute;ng 2 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/03/2022.</em></li>\r\n	<li><em><strong>Đợt 2:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 3 v&agrave; th&aacute;ng 4 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/05/2022.</em></li>\r\n	<li><em><strong>Đợt 3:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 5 v&agrave; th&aacute;ng 6 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/07/2022.</em></li>\r\n	<li><em><strong>Đợt 4:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 7 v&agrave; th&aacute;ng 8 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 30/09/2022.</em></li>\r\n	<li><em><strong>Đợt 5:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 9 v&agrave; th&aacute;ng 10 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 30/11/2022.</em></li>\r\n	<li><em><strong>Đợt 6:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 11 v&agrave; th&aacute;ng 12 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/01/2023.</em></li>\r\n</ul>\r\n\r\n<p><strong>3.2.&nbsp;Hoạt động khuyến m&atilde;i 2</strong></p>\r\n\r\n<ul>\r\n	<li>Mỗi Hội vi&ecirc;n sẽ được&nbsp;<strong>tặng 200 điểm</strong>&nbsp;(tương đương với&nbsp;<strong>200.000 đồng</strong>) v&agrave;o th&aacute;ng sinh nhật của Hội vi&ecirc;n nếu Hội vi&ecirc;n đạt số điểm từ 300 điểm trở l&ecirc;n v&agrave;o th&aacute;ng sinh nhật.</li>\r\n	<li>Điểm sẽ được cộng dồn v&agrave;o điểm t&iacute;ch lũy v&agrave; được trả thưởng v&agrave;o đợt thanh to&aacute;n tương ứng.</li>\r\n</ul>\r\n\r\n<p><strong>3.3. Hoạt động khuyến m&atilde;i 3</strong></p>\r\n\r\n<p>Mỗi khi c&oacute; C&ocirc;ng tr&igrave;nh mới v&agrave; c&oacute; sử dụng sơn TOA, Hội vi&ecirc;n sẽ đăng k&yacute; th&ocirc;ng tin C&ocirc;ng tr&igrave;nh cho TOA th&ocirc;ng qua một trong hai c&aacute;ch sau:</p>\r\n\r\n<p><strong>C&aacute;ch 1:</strong>&nbsp;Đăng k&yacute; trực tiếp cho Nh&acirc;n vi&ecirc;n của Sơn TOA.</p>\r\n\r\n<p><strong>C&aacute;ch 2:</strong>&nbsp;Đăng tải th&ocirc;ng tin C&ocirc;ng tr&igrave;nh mới l&ecirc;n ứng dụng TOA.painter với t&agrave;i khoản đ&atilde; được cung cấp.</p>\r\n\r\n<p>Sau khi nhận được th&ocirc;ng tin về C&ocirc;ng tr&igrave;nh mới, TOA sẽ kiểm tra, x&aacute;c thực th&ocirc;ng tin được cung cấp v&agrave; ghi nhận việc đăng k&yacute; C&ocirc;ng tr&igrave;nh mới th&agrave;nh c&ocirc;ng tr&ecirc;n cả hai ứng dụng TOA.painter tại t&agrave;i khoản c&aacute; nh&acirc;n của Hội vi&ecirc;n v&agrave; TOA.dms.&nbsp;</p>\r\n\r\n<p><strong>Lưu &yacute;:</strong>&nbsp;Thời gian x&aacute;c thực th&ocirc;ng tin của C&ocirc;ng tr&igrave;nh mới c&oacute; thể dao động từ 05 ng&agrave;y đến 10 ng&agrave;y l&agrave;m việc.<br />\r\n&nbsp;<br />\r\nSau khi C&ocirc;ng tr&igrave;nh đ&atilde; được đăng k&yacute; v&agrave; duyệt th&agrave;nh c&ocirc;ng, Hội vi&ecirc;n d&ugrave;ng ứng dụng TOA.painter để qu&eacute;t m&atilde; QR tr&ecirc;n sản phẩm của TOA tại C&ocirc;ng tr&igrave;nh đ&atilde; đăng k&yacute; để t&iacute;ch lũy điểm. Số điểm t&iacute;ch luỹ sẽ được quy đổi th&agrave;nh tiền v&agrave; được chuyển khoản trực tiếp v&agrave;o số t&agrave;i khoản ng&acirc;n h&agrave;ng của ch&iacute;nh Hội vi&ecirc;n theo th&ocirc;ng tin Hội vi&ecirc;n đ&atilde; đăng k&yacute; hoặc cung cấp th&ocirc;ng tin cho TOA.&nbsp;</p>\r\n\r\n<p>Mỗi điểm t&iacute;ch lũy sẽ được quy đổi th&agrave;nh 1.000 đồng (một ngh&igrave;n đồng).</p>\r\n\r\n<p>Điểm t&iacute;ch luỹ sẽ được chuyển v&agrave;o t&agrave;i khoản c&aacute; nh&acirc;n của Hội vi&ecirc;n tr&ecirc;n ứng dụng TOA.painter v&agrave; được chia th&agrave;nh 4 đợt:</p>\r\n\r\n<ul>\r\n	<li><em><strong>Đợt 1:</strong>&nbsp;Điểm t&iacute;ch luỹ từ 04/01/2022 đến hết 31/03/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 1.</em></li>\r\n	<li><em><strong>Đợt 2:&nbsp;</strong>Điểm t&iacute;ch luỹ từ 01/04/2022 đến hết 30/06/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 2.</em></li>\r\n	<li><em><strong>Đợt 3:</strong>&nbsp;Điểm t&iacute;ch lũy từ 01/07/2022 đến hết 30/09/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 3.</em></li>\r\n	<li><em><strong>Đợt 4:&nbsp;</strong>Điểm t&iacute;ch lũy từ 01/10/2022 đến hết 31/12/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 4.</em></li>\r\n</ul>\r\n\r\n<p><strong>4. DANH S&Aacute;CH C&Aacute;C SẢN PHẨM &amp; ĐIỂM T&Iacute;CH LUỸ TƯƠNG ỨNG</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/89f34f88210872-bngim_1648987473.jpg\" style=\"height:972px; width:650px\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5. ĐIỀU KHOẢN &amp; QUY ĐỊNH KH&Aacute;C</strong></p>\r\n\r\n<p>5.1. Chương tr&igrave;nh khuyến m&atilde;i n&agrave;y chỉ &aacute;p dụng đối với C&ocirc;ng tr&igrave;nh đ&atilde; được đăng k&yacute; th&agrave;nh c&ocirc;ng v&agrave; c&oacute; diện t&iacute;ch sơn từ 200m2 đến 5.000m2;</p>\r\n\r\n<p>5.2. Mỗi m&atilde; QR tr&ecirc;n mỗi th&ugrave;ng/ lon sơn TOA sẽ chỉ qu&eacute;t được 1 lần;</p>\r\n\r\n<p>5.3. Đối với Hoạt động khuyến mại số 2 v&agrave; Hoạt động khuyến mại số 3, để được thanh to&aacute;n điểm thưởng, Hội vi&ecirc;n phải cung cấp đầy đủ th&ocirc;ng tin t&agrave;i khoản (gồm Số t&agrave;i khoản, T&ecirc;n ng&acirc;n h&agrave;ng, Chi nh&aacute;nh ng&acirc;n h&agrave;ng) ch&iacute;nh chủ của Hội vi&ecirc;n cho TOA chậm nhất v&agrave;o ng&agrave;y kết th&uacute;c thời gian trả thưởng ương ứng;</p>\r\n\r\n<p>5.4. Khi kết th&uacute;c mỗi đợt t&iacute;ch điểm, Hội vi&ecirc;n cần c&oacute; điểm t&iacute;ch lũy &iacute;t nhất từ 300 điểm trở l&ecirc;n mới được chuyển tiền v&agrave;o t&agrave;i khoản. Nếu Hội vi&ecirc;n kh&ocirc;ng đủ điểm để được trả thưởng, số điểm c&oacute; thể được bảo lưu đến đợt trả thưởng tiếp theo. Đến ng&agrave;y 31/12/2022, nếu Hội vi&ecirc;n vẫn kh&ocirc;ng đủ điểm để trả thưởng, số điểm sẽ được hủy bỏ v&agrave; sẽ kh&ocirc;ng được bảo lưu đến năm sau;</p>\r\n\r\n<p>5.5. Chỉ t&iacute;nh đi&ecirc;̉m cho Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA mua sơn tại c&aacute;c cửa h&agrave;ng thuộc hệ thống Sơn TOA;</p>\r\n\r\n<p>5.6. Chỉ Nh&agrave; Thầu c&oacute; đăng k&yacute; trở th&agrave;nh Hội Vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA mới được tham gia. Nh&acirc;n vi&ecirc;n của TOA, c&aacute;c Chủ đại l&yacute;, nh&agrave; ph&acirc;n phối của TOA, c&aacute;c nh&acirc;n vi&ecirc;n của c&aacute;c đại l&yacute;/ nh&agrave; ph&acirc;n phối của TOA kh&ocirc;ng được ph&eacute;p tham gia chương tr&igrave;nh n&agrave;y;</p>\r\n\r\n<p>5.7. Nh&agrave; thầu gia nhập phải cung cấp th&ocirc;ng tin, giấy tờ theo quy định của C&ocirc;ng ty TNHH Sơn TOA Việt Nam;</p>\r\n\r\n<p>5.8. C&aacute;c Giấy tờ t&ugrave;y th&acirc;n (Chứng minh nh&acirc;n d&acirc;n/ Căn cước c&ocirc;ng d&acirc;n) đối với Nh&agrave; thầu l&agrave; c&aacute; nh&acirc;n v&agrave; c&aacute;c Giấy tờ ph&aacute;p l&yacute; (Giấy chứng nhận đăng k&yacute; doanh nghiệp/ Giấy tờ c&oacute; gi&aacute; trị ph&aacute;p l&yacute; tương đương, v.v.) đối với Nh&agrave; thầu l&agrave; tổ chức m&agrave; Nh&agrave; thầu cung cấp khi tham gia chương tr&igrave;nh, phải hợp lệ v&agrave; c&ograve;n hiệu lực theo luật quy định của Việt Nam. C&aacute;c Giấy tờ t&ugrave;y th&acirc;n, Giấy tờ ph&aacute;p l&yacute; n&agrave;y phải c&ograve;n hiệu lực t&iacute;nh đến hết thời điểm trả thưởng;</p>\r\n\r\n<p>5.9. Ng&agrave;y th&agrave;nh lập đối với Nh&agrave; thầu l&agrave; ng&agrave;y tổ chức, doanh nghiệp được cơ quan thẩm quyền của Việt Nam cấp Giấy chứng nhận đăng k&yacute; doanh nghiệp (hoặc Giấy tờ c&oacute; gi&aacute; trị ph&aacute;p l&yacute; tương đương kh&aacute;c) lần đầu ti&ecirc;n;&nbsp;</p>\r\n\r\n<p>5.10. C&ocirc;ng ty Sơn TOA c&oacute; quy&ecirc;̀n từ ch&ocirc;́i trả thưởng cho Hội Vi&ecirc;n n&ecirc;́u ph&aacute;t hiện c&oacute; việc khai b&aacute;o kh&ocirc;ng đ&uacute;ng;</p>\r\n\r\n<p>5.11. Điểm t&iacute;ch luỹ chỉ được c&ocirc;ng nhận khi thao t&aacute;c qu&eacute;t m&atilde; vạch được thực hiện tại c&ocirc;ng tr&igrave;nh đ&atilde; đăng k&yacute; trước đ&oacute;;</p>\r\n\r\n<p>5.12. Chứng minh nh&acirc;n d&acirc;n/ Căn cước c&ocirc;ng d&acirc;n m&agrave; Nh&agrave; thầu cung cấp khi tham gia chương tr&igrave;nh phải hợp lệ theo luật quy định của Nh&agrave; nước Việt Nam (CMND/ CCCD phải c&ograve;n hạn sử dụng t&iacute;nh đến thời điểm trả thưởng);</p>\r\n\r\n<p>5.13. T&agrave;i khoản ng&acirc;n h&agrave;ng của Hội vi&ecirc;n phải l&agrave; t&agrave;i khoản của ch&iacute;nh Hội vi&ecirc;n. C&ocirc;ng ty TNHH Sơn TOA Việt Nam kh&ocirc;ng chấp nhận bất kỳ trường hợp ngoại lệ n&agrave;o;</p>\r\n\r\n<p>5.14. C&ocirc;ng ty TNHH Sơn TOA Việt Nam sẽ khấu trừ c&aacute;c khoản thuế thu nhập c&aacute; nh&acirc;n hoặc doanh nghiệp, v.v&hellip; (nếu c&oacute;) đối với c&aacute;c khoản tiền thưởng Hội vi&ecirc;n nhận được khi tham gia chương tr&igrave;nh n&agrave;y, theo quy định ph&aacute;p luật hiện h&agrave;nh về thuế thu nhập c&aacute; nh&acirc;n, thuế thu nhập doanh nghiệp, v.v&hellip; trước khi thanh to&aacute;n khoản tiền thưởng cho Hội vi&ecirc;n;</p>\r\n\r\n<p>5.15. Hội vi&ecirc;n c&oacute; tr&aacute;ch nhiệm hợp t&aacute;c với nh&acirc;n vi&ecirc;n C&ocirc;ng ty TNHH Sơn TOA Việt Nam trong việc ki&ecirc;̉m tra, x&aacute;c thực th&ocirc;ng tin được cung cấp, kể cả c&aacute;c th&ocirc;ng tin về C&ocirc;ng tr&igrave;nh;</p>\r\n\r\n<p>5.16.&nbsp;C&ocirc;ng ty Sơn TOA c&oacute; to&agrave;n quy&ecirc;̀n sử dụng h&igrave;nh ảnh của Hội vi&ecirc;n v&agrave;o mục đ&iacute;ch quảng c&aacute;o m&agrave; kh&ocirc;ng phải trả b&acirc;́t cứ chi ph&iacute; n&agrave;o.<br />\r\n&nbsp;</p>', '1648987526.jpg', '2022-04-03 05:05:26', '2022-04-03 05:05:26'),
(2, 'SỐNG BỪNG SẮC RIÊNG - TÁI TẠO SỨC SỐNG MỚI VỚI XU HƯỚNG SẮC MÀU NĂM 2022', '<p>Cuối năm l&agrave; thời điểm th&iacute;ch hợp để t&acirc;n trang, đổi mới kh&ocirc;ng gian sống với những thay đổi về bố cục sắp xếp nội thất, s&aacute;ng tạo m&agrave;u sắc, tạo kh&ocirc;ng gian sống tươi mới v&agrave; bền đẹp. Điều th&uacute; vị của sự thay đổi tr&ecirc;n nằm ở c&aacute;ch ch&uacute;ng ta kh&aacute;m ph&aacute; m&agrave;u sắc bằng những trải nghiệm v&agrave; kh&ocirc;ng gian sống theo c&aacute;ch ri&ecirc;ng của ch&iacute;nh m&igrave;nh, một kh&ocirc;ng gian ngập tr&agrave;n những x&uacute;c cảm, đầy cảm hứng v&agrave; thể hiện &yacute; nghĩa của cuộc sống, đặc biệt trong bối cảnh thế giới với nhiều thử th&aacute;ch như hiện nay.</p>\r\n\r\n<p>Xu hướng m&agrave;u sắc mới của năm 2022 với chủ đề&nbsp;<strong>&ldquo;THE COLOR OF THOUGHTFUL LIVING&rdquo; - &ldquo;SỐNG BỪNG SẮC RI&Ecirc;NG&rdquo;</strong>, được nghi&ecirc;n cứu v&agrave; lấy cảm hứng từ c&aacute;c chuy&ecirc;n gia m&agrave;u sắc h&agrave;ng đầu của sơn TOA. M&agrave;u sắc chủ đạo của năm l&agrave; những gam m&agrave;u mang đến cảm gi&aacute;c y&ecirc;n b&igrave;nh, ấm &aacute;p với những sắc th&aacute;i trầm v&agrave; dịu hơn, thể hiện niềm hi vọng về một thế giới &ldquo;B&igrave;nh Thường Mới&rdquo; đang dần hồi sinh sau đại dịch.</p>\r\n\r\n<p>Bạn đ&atilde; sẵn s&agrave;ng để kh&aacute;m ph&aacute; những m&agrave;u sắc sẽ l&ecirc;n ng&ocirc;i năm 2022? H&atilde;y bắt đầu cuộc h&agrave;nh tr&igrave;nh đầy bất ngờ v&agrave; s&aacute;ng tạo c&ugrave;ng với sơn TOA m&agrave; bạn kh&ocirc;ng n&ecirc;n bỏ lỡ.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/8731d6af8a7bc1-toacolortrend2022_1648987653.png\" style=\"height:683px; width:683px\" /></p>\r\n\r\n<p><strong>XU HƯỚNG 1: BIO-CENTRIC</strong></p>\r\n\r\n<p>Xu hướng sắc m&agrave;u&nbsp;<strong>Trắng Ấm</strong>&nbsp;(<strong>TOA 8300</strong>) v&agrave;&nbsp;<strong>Trắng Lạnh</strong>&nbsp;(<strong>TOA 7268</strong>) l&agrave; gam m&agrave;u biểu tượng cho sự hạnh ph&uacute;c v&agrave; an to&agrave;n với sức khoẻ của con người, tạo n&ecirc;n cảm gi&aacute;c sạch sẽ cho kh&ocirc;ng gian nh&agrave; th&ecirc;m phần rộng r&atilde;i, tho&aacute;ng m&aacute;t. M&agrave;u trắng c&ograve;n được xem l&agrave; m&agrave;u của sự khởi đầu, mọi vật đều được bắt nguồn từ m&agrave;u trắng. T&ocirc;ng m&agrave;u trắng s&aacute;ng l&agrave; t&ocirc;ng m&agrave;u chủ đạo ph&ugrave; hợp với mọi phong c&aacute;ch kiến tr&uacute;c bởi sự ho&agrave;n hảo, sang trọng m&agrave; n&oacute; đem lại, b&ecirc;n cạnh đ&oacute; c&ograve;n gi&uacute;p ng&ocirc;i nh&agrave; c&acirc;n bằng &aacute;nh s&aacute;ng, mang đến cho kh&ocirc;ng gian sống sự thanh lịch v&agrave; nhẹ nh&agrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/38c1d11bca0f5b-trangamtoa83001_1648987710.jpg\" style=\"height:510px; width:680px\" /></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Trắng Ấm (TOA 8300)</em></p>\r\n\r\n<p><strong>XU HƯỚNG 2: UNIVERSE WE</strong></p>\r\n\r\n<p>Năm 2022 l&agrave; sự l&ecirc;n ng&ocirc;i của m&agrave;u&nbsp;<strong>T&iacute;m</strong>&nbsp;(<strong>TOA 7227</strong>) với t&ocirc;ng&nbsp;nhẹ nh&agrave;ng tươi s&aacute;ng, l&agrave; xu hướng m&agrave;u của tương lai v&agrave; sự hy vọng - điều m&agrave; tất cả ch&uacute;ng ta đang đi t&igrave;m trong cuộc sống hiện nay, mang đến một khởi đầu ho&agrave;n to&agrave;n mới v&agrave; đem lại cảm gi&aacute;c b&igrave;nh an trước cuộc sống c&oacute; nhiều đổi thay v&agrave; x&aacute;o trộn. Sắc T&iacute;m được xem như một sự bổ sung ho&agrave;n hảo, mang đến một kh&ocirc;ng gian sống quyến rũ v&agrave; trang nh&atilde;, th&uacute;c đẩy sự s&aacute;ng tạo v&agrave; t&iacute;nh thẩm mỹ cho mọi c&ocirc;ng tr&igrave;nh kiến tr&uacute;c. Gam m&agrave;u n&agrave;y c&ograve;n l&agrave; m&agrave;u sắc l&yacute; tưởng khi kết hợp với c&aacute;c t&ocirc;ng m&agrave;u s&aacute;ng v&agrave; tối kh&aacute;c.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/cd793fb4fefccd-camgachtoa86161_1648987826.jpg\" style=\"height:496px; width:680px\" /></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>Cam Gạch (TOA 8616)</em></p>\r\n\r\n<p><strong>XU</strong><strong>&nbsp;HƯỚNG 3:&nbsp;</strong><strong>AUTHENTIC IMPRESS</strong></p>\r\n\r\n<p>Khơi cảm hứng s&aacute;ng tạo từ những n&eacute;t văn h&oacute;a truyền thống, những m&agrave;u sắc như&nbsp;<strong>Be</strong>&nbsp;(<strong>TOA 8771</strong>),&nbsp;<strong>Đỏ Đ&ocirc;</strong>&nbsp;(<strong>TOA 8710</strong>) v&agrave;&nbsp;<strong>Cam Gạch</strong>&nbsp;(<strong>TOA 8616</strong>) đại diện cho một lối sống &ldquo;B&igrave;nh Thường Mới&rdquo; v&agrave; gợi nhớ về những ho&agrave;i niệm v&agrave; sự cổ điển. M&agrave;u Be ch&iacute;nh l&agrave; m&agrave;u nguy&ecirc;n thuỷ nhất của con người, l&agrave; sợi d&acirc;y li&ecirc;n kết giữa những điều cũ v&agrave; mới, c&oacute; thể truyền tải lối sống hiện đại bằng c&aacute;ch thức đơn giản m&agrave; vẫn thể hiện được sự tr&acirc;n trọng cội nguồn v&agrave; k&yacute; ức xưa. Sắc Đỏ Đ&ocirc; thanh lịch v&agrave; sang trọng gi&uacute;p k&iacute;ch th&iacute;ch sự s&aacute;ng tạo v&agrave; gợi l&ecirc;n niềm cảm hứng, thể hiện bản sắc của thế hệ trẻ với ước vọng tạo ra dấu ấn ri&ecirc;ng của ch&iacute;nh họ qua c&aacute;c n&eacute;t t&iacute;nh c&aacute;ch độc đ&aacute;o. C&ugrave;ng với đ&oacute; l&agrave; t&ocirc;ng Cam Gạch mang lại sự ấm &aacute;p v&agrave; sống động cũng như cảm gi&aacute;c gần gũi, l&agrave;m nổi bật phong c&aacute;ch mộc mạc v&agrave; trầm lắng cho kh&ocirc;ng gian sống.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/072bd429cc29d5-betoa87711_1648987733.jpg\" style=\"height:757px; width:680px\" /></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Trắng Lạnh (TOA 7268)</em></p>\r\n\r\n<p><strong>XU HƯỚNG 4: SHELTERAL (Shelter + Natural)</strong></p>\r\n\r\n<p>Đối với xu hướng n&agrave;y, sắc&nbsp;<strong>Xanh Lam Đậm</strong>&nbsp;(<strong>TOA 7398</strong>),&nbsp;<strong>Trắng X&aacute;m</strong>&nbsp;(<strong>TOA 8257</strong>) v&agrave;&nbsp;<strong>Xanh L&aacute; Nhạt</strong>&nbsp;(<strong>TOA 8409</strong>) đ&oacute;ng vai tr&ograve; l&agrave; m&agrave;u sắc chủ đạo. Những gam m&agrave;u n&agrave;y mang lại cảm gi&aacute;c nhẹ nh&agrave;ng v&agrave; thoải m&aacute;i, tạo cảm gi&aacute;c nh&agrave; ch&iacute;nh l&agrave; nơi ch&uacute;ng ta cảm thấy được bảo vệ v&agrave; an y&ecirc;n nhất. Trong khi ch&uacute;ng ta đang chứng kiến ng&agrave;y c&agrave;ng nhiều hơn những sự hỗn loạn, nguy hiểm v&agrave; những bất ngờ ở ph&iacute;a trước, th&igrave; một kh&ocirc;ng gian sống y&ecirc;n b&igrave;nh v&agrave; mang hơi thở của thi&ecirc;n nhi&ecirc;n trở th&agrave;nh điều m&agrave; ch&uacute;ng ta ưu ti&ecirc;n v&agrave; tập trung hơn bao giờ hết.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/b192803c879397-xanhlamamtoa73981_1648987748.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Xanh Lam Đậm (TOA 7398)</em></p>', '1648987863.jpg', '2022-04-03 05:11:03', '2022-04-03 05:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `route`, `created_at`, `updated_at`) VALUES
(1, 'account_view', 'account.index', '2022-04-03 05:14:15', '2022-04-03 05:14:15'),
(2, 'account_add', 'account.add', '2022-04-03 05:17:29', '2022-04-03 05:17:29'),
(3, 'account_insert', 'account.insert', '2022-04-03 05:17:47', '2022-04-03 05:17:47'),
(4, 'account_edit', 'account.edit', '2022-04-03 05:18:01', '2022-04-03 05:18:01'),
(5, 'account_update', 'account.update', '2022-04-03 05:18:16', '2022-04-03 05:18:16'),
(6, 'account_delete', 'account.delete', '2022-04-03 05:18:27', '2022-04-03 05:18:27');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `trademark_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `price_sale` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `trademark_id`, `status`, `description`, `category_id`, `image`, `price`, `price_sale`, `created_at`, `updated_at`) VALUES
(1, 'Sơn jotaplast jotun 1122', NULL, '3', 2, '<p>Sơn jotun chất lượng</p>', '3', '1649004422.jpg', 200000, NULL, '2022-04-03 09:47:02', '2022-04-03 10:09:39'),
(2, 'Sơn Kova CN-05 chống nóng', NULL, '3', 2, '<p>Sơn kova&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2', '1649005933.png', 200000, NULL, '2022-04-03 10:12:13', '2022-04-03 10:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Quản trị', 'admin', '2022-04-03 05:12:49', '2022-04-03 05:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thumnails`
--

CREATE TABLE `thumnails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trademarks`
--

CREATE TABLE `trademarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trademarks`
--

INSERT INTO `trademarks` (`id`, `name`, `introduce`, `logo`, `img_description`, `hotline`, `created_at`, `updated_at`) VALUES
(1, 'SƠN JOTUN', 'Sơn Jotun được sản xuất trên dây chuyền công nghệ hiện đại bậc nhất, hoàn toàn tự động từ khâu nạp liệu khép kín cho đến khâu đóng gói sản phẩm. Sản phẩm được sử dụng công nghệ Colourlock tiên tiến, các phân tử màu có liên kết hóa học siêu bền, không bị phân hủy bởi tia UV, cho màu sắc phong phú đa dạng và bền đẹp trong nhiều năm.', '1648997246.png', '1648997246.png', '0357845678', '2022-04-03 07:47:26', '2022-04-03 07:47:26'),
(2, 'Baris Color', 'Sơn Baris Color là  thương hiệu sơn nổi tiếng và được người tiêu dùng tin tưởng, yêu thích, nằm trong danh sách 10 công ty sơn hàng đầu có mặt tại Việt Nam hiện nay. Đến với sản phẩm sơn Bewin từ Be&C Việt Nam, cả một không gian Châu Âu đẳng cấp và sang trọng được mở ra trong không gian sống của bạn.', '1648997341.jpg', '1648997341.jpg', '0358878912', '2022-04-03 07:49:01', '2022-04-03 07:49:01'),
(3, 'MY COLOR', 'Sơn My Color là công ty sơn, thương hiệu sơn nổi tiếng và được người tiêu dùng tin tưởng, yêu thích, nằm trong danh sách 10 công ty sơn hàng đầu có mặt tại Việt Nam hiện nay. Đến với sản phẩm sơn Bewin từ Be&C Việt Nam, cả một không gian Châu Âu đẳng cấp và sang trọng được mở ra trong không gian sống của bạn.', '1648997505.svg', '1648997505.jpg', '0155678887', '2022-04-03 07:51:45', '2022-04-03 08:28:50');

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
(1, 'User', 'user@gmail.com', NULL, '$2y$10$WhmDglpTWY6mGxLmKn/sNODV4LhoMcJKHnkuf3XLF5L5BdcTks7Cu', NULL, NULL, NULL);

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
-- Indexes for table `category_colors`
--
ALTER TABLE `category_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
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
-- Indexes for table `navbars`
--
ALTER TABLE `navbars`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thumnails`
--
ALTER TABLE `thumnails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trademarks`
--
ALTER TABLE `trademarks`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_colors`
--
ALTER TABLE `category_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thumnails`
--
ALTER TABLE `thumnails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
