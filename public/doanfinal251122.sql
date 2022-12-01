-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2022 lúc 07:32 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
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
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$GCbavL5j7pQeJlFQKm/vaemkX3FhiWYnVwhx3f1LKus9JqT6U96fe', NULL, NULL, '2022-11-13 03:26:02'),
(3, 'Linh', 'linh@gmail.com', '$2y$10$GCbavL5j7pQeJlFQKm/vaemkX3FhiWYnVwhx3f1LKus9JqT6U96fe', NULL, '2022-05-28 21:11:59', '2022-11-13 03:26:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`user_id`, `role_id`) VALUES
(3, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cancels`
--

CREATE TABLE `cancels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cancels`
--

INSERT INTO `cancels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Không nhận gọi', '2022-06-04 18:23:28', '2022-06-04 18:23:28'),
(3, 'Không gặp được khách hàng', '2022-06-04 18:23:42', '2022-06-04 18:23:42'),
(4, 'Test', '2022-06-04 18:23:54', '2022-06-04 18:23:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
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
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `manual`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Sơn ngoại thất', '<p>D&ugrave;ng ở ngo&agrave;i c&ocirc;ng tr&igrave;nh</p>', 0, '2022-04-03 09:05:57', '2022-04-03 09:05:57'),
(3, 'Sơn nội thất', '<p>D&ugrave;ng b&ecirc;n trong c&ocirc;ng tr&igrave;nh</p>', 0, '2022-04-03 09:06:14', '2022-04-03 09:06:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_colors`
--

CREATE TABLE `category_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `ma`, `product`, `created_at`, `updated_at`) VALUES
(1, '#007bff', 'Xanh nhạt', '[\"8\"]', NULL, '2022-11-24 07:14:41'),
(2, '#6610f2', 'Tím đậm', '[\"3\"]', NULL, '2022-11-24 07:33:57'),
(3, '#6f42c1', 'Tím nhạt', '[\"12\"]', NULL, '2022-11-24 07:34:08'),
(4, '#e83e8c', 'Hường', '[\"14\"]', NULL, '2022-11-24 07:34:19'),
(5, '#dc3545', 'Đỏ nhạt', '[\"2\",\"6\"]', NULL, '2022-11-24 07:35:29'),
(6, '#fd7e14', 'cam nhạt', '[\"3\"]', NULL, '2022-11-24 07:33:34'),
(7, '#ffc107', 'Vàng cam', '[\"12\"]', NULL, '2022-11-24 07:34:43'),
(8, '#28a745', 'Xanh lục', '[\"2\",\"14\"]', NULL, '2022-11-24 07:34:54'),
(9, '#20c997', 'xanh nhạt', '[\"11\",\"12\"]', NULL, '2022-11-24 07:35:05'),
(10, '#ddd', 'Ghi', '[\"1\",\"7\"]', NULL, '2022-11-24 07:35:22'),
(12, '#411218', 'Nâu đậm', '[\"10\",\"11\"]', NULL, '2022-11-24 07:32:11'),
(14, '#ab0013', 'đỏ đô', '[\"6\"]', NULL, NULL),
(15, '#6d08a0', 'Tím', '[\"3\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
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
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `name`, `logo`, `favicon`, `address`, `tel`, `description`, `sub_description`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', '1648986649.jpg', '1648986649.jpg', '73 Ngô Gia Tự, Cát Bi, Hải An, Hải Phòng', '0934357971', 'Cấu hình trang chủ', 'Cấu hình trang chủ', '#', '#', '#', '2022-04-03 04:48:23', '2022-04-03 04:50:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sanpham` bigint(20) DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sao` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `sanpham`, `ten`, `dienthoai`, `noidung`, `sao`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '2022-06-05 18:03:25', '2022-06-05 18:03:25'),
(2, 8, 'Minh', '034548558', 'hello', 5, '2022-06-05 18:05:24', '2022-06-05 18:05:24'),
(3, 8, 'Haf', '03154545', 'dsss', 0, '2022-06-05 18:08:12', '2022-06-05 18:08:12'),
(4, 8, 'Linh', '0345478787', 'test', 0, '2022-06-06 01:27:58', '2022-06-06 01:27:58'),
(5, 8, 'Linh', '01534547554', 'Minh', 0, '2022-06-06 01:32:41', '2022-06-06 01:32:41'),
(6, 8, 'Chi', '0348888888', 'đâs', 0, '2022-06-06 01:35:22', '2022-06-06 01:35:22'),
(7, 7, 's', '12312312', 'dsadas', 0, '2022-06-06 01:37:53', '2022-06-06 01:37:53'),
(8, 8, 'sssdas', '123123', 'đâsdas', 0, '2022-06-06 01:43:59', '2022-06-06 01:43:59'),
(9, 8, 'Minh', '03634488585', 'sadasdas', 4, '2022-06-06 01:55:25', '2022-06-06 01:55:25'),
(10, 8, 'Hà', '034545445', 'lkdcaskjldsjakl', 3, '2022-06-06 01:58:07', '2022-06-06 01:58:07'),
(11, 9, 'Minh', '035787878', 'san pham tot', 2, '2022-06-06 03:13:32', '2022-06-06 03:13:32'),
(12, 3, 'Minh', '0357836964', 'minh day', 4, '2022-08-09 13:18:14', '2022-08-09 13:18:14'),
(13, 2, 'Minh', '0357836964', 'đasa', 3, '2022-09-02 14:52:13', '2022-09-02 14:52:13'),
(14, 2, 'ew432', '1231312312', 'rewrerew', 4, '2022-10-15 12:37:17', '2022-10-15 12:37:17'),
(15, 13, 'Minh Hoàng', '0345745678', 'Đã sử dụng rất ok', 4, '2022-11-13 03:29:00', '2022-11-13 03:29:00'),
(16, 2, 'Minh', '0204054450', 'fdgfgfgdf', 3, '2022-11-23 08:28:02', '2022-11-23 08:28:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exports`
--

CREATE TABLE `exports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoixuat` int(11) NOT NULL,
  `sanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exports`
--

INSERT INTO `exports` (`id`, `ma`, `nguoixuat`, `sanpham`, `noidung`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'ádasdasdas', 3, '[{\"product_id\":\"1\",\"soluong\":\"5\"},{\"product_id\":\"2\",\"soluong\":\"5\"},{\"product_id\":\"3\",\"soluong\":\"5\"}]', 'đâsd', 'ádasdasdas', '2022-06-04 07:33:41', '2022-06-04 07:33:41'),
(2, 'đâs12521512512', 3, '[{\"product_id\":\"1\",\"soluong\":\"1\"},{\"product_id\":\"2\",\"soluong\":\"1\"},{\"product_id\":\"3\",\"soluong\":\"1\"}]', 'ádasdas', 'đá', '2022-06-04 07:34:44', '2022-06-04 07:34:44'),
(3, 'PX111120220534AM', 3, '[{\"product_id\":\"2\",\"soluong\":\"400\"}]', 'xuat kova 05CN', NULL, '2022-11-10 22:35:01', '2022-11-10 22:35:01'),
(5, 'sssdsa', 3, '[{\"product_id\":\"2\",\"soluong\":\"100\"},{\"product_id\":\"4\",\"soluong\":\"100\"}]', 'nhap kova', NULL, '2022-11-10 22:39:10', '2022-11-10 22:39:10'),
(6, 'fddszfdsf', 3, '[{\"product_id\":\"2\",\"soluong\":\"100\"},{\"product_id\":\"3\",\"soluong\":\"100\"}]', 'sadasdsada', NULL, '2022-11-11 12:49:54', '2022-11-11 12:49:54'),
(7, 'dsadsadsa', 3, '[{\"product_id\":\"1\",\"soluong\":\"100\"}]', 'sadasdas', NULL, '2022-11-12 08:30:53', '2022-11-12 08:30:53'),
(8, 'NH231022125800122', 3, '[{\"product_id\":\"1\",\"soluong\":\"12\"}]', 'x kova213123', NULL, '2022-11-23 08:51:45', '2022-11-23 08:51:45'),
(9, 'NH231022125800122', 3, '[{\"product_id\":\"1\",\"soluong\":\"12\"}]', 'x kova213123', NULL, '2022-11-23 08:52:06', '2022-11-23 08:52:06'),
(10, 'fafsasdfasd', 3, '[{\"product_id\":\"2\",\"soluong\":\"100\"},{\"product_id\":\"4\",\"soluong\":\"100\"},{\"product_id\":\"8\",\"soluong\":\"100\"}]', 'ádasdsadas', NULL, '2022-11-23 14:06:09', '2022-11-23 14:06:09'),
(11, '2311ok22', 3, '[{\"product_id\":\"4\",\"soluong\":\"50\"},{\"product_id\":\"8\",\"soluong\":\"42\"}]', 'xuat kova', NULL, '2022-11-23 16:41:15', '2022-11-23 16:41:15'),
(12, 'dsssssssssssss', 3, '[{\"product_id\":\"2\",\"soluong\":\"20\"},{\"product_id\":\"8\",\"soluong\":\"10\"}]', 'aaaaaaaaa', NULL, '2022-11-23 17:16:25', '2022-11-23 17:16:25'),
(13, 'aaaaaaaaaaaaaaaaaaa', 3, '[{\"product_id\":\"2\",\"soluong\":\"25\"}]', 'â', NULL, '2022-11-23 17:17:15', '2022-11-23 17:17:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `imports`
--

CREATE TABLE `imports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoinhap` int(11) DEFAULT NULL,
  `sanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhacungcap` int(11) DEFAULT NULL,
  `tongthu` int(11) DEFAULT NULL,
  `conlai` int(11) DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `imports`
--

INSERT INTO `imports` (`id`, `ma`, `nguoinhap`, `sanpham`, `noidung`, `nhacungcap`, `tongthu`, `conlai`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'NH231022125800sfd', 3, '[{\"product\":\"2\",\"quantity\":\"200\",\"supplier\":\"3\",\"price\":\"15000\",\"unit\":\"2\"},{\"product\":\"3\",\"quantity\":\"150\",\"supplier\":\"3\",\"price\":\"16000\",\"unit\":\"2\"}]', 'nhap kova', 3, 5400000, 1000000, NULL, '2022-11-11 12:44:08', '2022-11-11 12:44:59'),
(4, 'NH231022125800s', 3, '[{\"product\":\"4\",\"quantity\":\"500\",\"supplier\":\"3\",\"price\":\"14000\",\"unit\":\"2\"},{\"product\":\"8\",\"quantity\":\"250\",\"supplier\":\"3\",\"price\":\"17000\",\"unit\":\"2\"},{\"product\":\"2\",\"quantity\":\"200\",\"supplier\":\"3\",\"price\":\"16000\",\"unit\":\"2\"}]', 'nhap kova', 3, 14450000, 14450000, NULL, '2022-11-12 06:50:47', '2022-11-12 06:50:47'),
(5, 'NH231022125800', 3, '[{\"product\":\"4\",\"quantity\":\"200\",\"supplier\":\"3\",\"price\":\"14000\",\"unit\":\"2\"}]', 'nhap kova', 3, 2800000, 2800000, NULL, '2022-11-12 06:57:21', '2022-11-12 06:57:21'),
(6, 'đasa', 3, '[{\"product\":\"4\",\"quantity\":\"200\",\"supplier\":\"3\",\"price\":\"14000\",\"unit\":\"2\"},{\"product\":\"8\",\"quantity\":\"400\",\"supplier\":\"3\",\"price\":\"17000\",\"unit\":\"2\"}]', 'nhap kova', 3, 9600000, 9600000, NULL, '2022-11-12 06:58:28', '2022-11-12 06:58:28'),
(7, 'sfsafds', 3, '[{\"product\":\"2\",\"quantity\":\"600\",\"supplier\":\"3\",\"price\":\"16000\",\"unit\":\"2\"},{\"product\":\"4\",\"quantity\":\"100\",\"supplier\":\"3\",\"price\":\"14000\",\"unit\":\"2\"},{\"product\":\"8\",\"quantity\":\"100\",\"supplier\":\"3\",\"price\":\"17000\",\"unit\":\"2\"}]', 'fdsfds', 3, 12700000, 12700000, NULL, '2022-11-12 07:00:23', '2022-11-12 07:00:23'),
(8, 'NH231022125800dssd', 3, '[{\"product\":\"1\",\"quantity\":\"200\",\"supplier\":\"5\",\"price\":\"14000\",\"unit\":\"2\"}]', 'sdsdsds', 5, 2800000, 2800000, NULL, '2022-11-12 08:30:24', '2022-11-12 08:30:24'),
(9, 'NH231022125800111', 3, '[{\"product\":\"2\",\"quantity\":\"150\",\"supplier\":\"3\",\"price\":\"18000\",\"unit\":\"2\"},{\"product\":\"3\",\"quantity\":\"400\",\"supplier\":\"3\",\"price\":\"17000\",\"unit\":\"2\"},{\"product\":\"7\",\"quantity\":\"200\",\"supplier\":\"3\",\"price\":\"15000\",\"unit\":\"2\"}]', 'nhap kova', 3, 12500000, 12500000, NULL, '2022-11-13 03:31:11', '2022-11-13 03:31:11'),
(10, 'NH2313210', 3, '[{\"product\":\"2\",\"quantity\":\"730\",\"supplier\":\"3\",\"price\":\"14000\",\"unit\":\"2\"},{\"product\":\"3\",\"quantity\":\"200\",\"supplier\":\"3\",\"price\":\"17000\",\"unit\":\"2\"},{\"product\":\"7\",\"quantity\":\"100\",\"supplier\":\"3\",\"price\":\"18000\",\"unit\":\"2\"}]', 'nhap kova', 3, 15420000, 15420000, NULL, '2022-11-13 03:35:03', '2022-11-13 03:35:03'),
(11, 'NH231022125800123', 3, '[{\"product\":\"2\",\"quantity\":\"200\",\"supplier\":\"3\",\"price\":\"18000\",\"unit\":\"2\"},{\"product\":\"4\",\"quantity\":\"100\",\"supplier\":\"3\",\"price\":\"19000\",\"unit\":\"2\"}]', 'a', 3, 5500000, 500000, NULL, '2022-11-23 08:42:27', '2022-11-23 08:44:32'),
(12, 'dasdasd', 3, '[{\"product\":\"4\",\"quantity\":\"180\",\"supplier\":\"3\",\"price\":\"15000\",\"unit\":\"2\"},{\"product\":\"8\",\"quantity\":\"100\",\"supplier\":\"3\",\"price\":\"16000\",\"unit\":\"2\"}]', 'asd2122', 3, 4300000, 4300000, NULL, '2022-11-23 12:58:36', '2022-11-23 12:58:36'),
(13, 'gfqws21312', 3, '[{\"product\":\"4\",\"quantity\":\"250\",\"supplier\":\"3\",\"price\":\"14000\",\"unit\":\"2\"},{\"product\":\"8\",\"quantity\":\"250\",\"supplier\":\"3\",\"price\":\"15000\",\"unit\":\"2\"},{\"product\":\"2\",\"quantity\":\"250\",\"supplier\":\"3\",\"price\":\"16000\",\"unit\":\"2\"}]', 'fas21222', 3, 11250000, 11250000, NULL, '2022-11-23 13:58:53', '2022-11-23 13:58:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhach`
--

CREATE TABLE `loaikhach` (
  `id` int(11) NOT NULL,
  `ten` text DEFAULT NULL,
  `tien` int(11) DEFAULT NULL,
  `giam` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaikhach`
--

INSERT INTO `loaikhach` (`id`, `ten`, `tien`, `giam`, `created_at`, `updated_at`) VALUES
(1, 'Vip1', 5000000, 5, '2022-11-12 08:24:07', '2022-11-12 08:24:07'),
(3, 'Vip 2', 10000000, 10, '2022-11-12 08:23:59', '2022-11-12 08:23:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `method`
--

CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `ten` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `method`
--

INSERT INTO `method` (`id`, `ten`) VALUES
(1, 'tiền mặt'),
(2, 'chuyển khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
(25, '2022_02_23_034303_create_products_table', 4),
(26, '2022_02_19_061552_create_orders_table', 5),
(27, '2022_04_08_014059_create_order_products_table', 6),
(28, '2022_02_19_061553_create_orders_table', 7),
(29, '2022_04_08_014060_create_order_products_table', 7),
(30, '2022_02_19_061554_create_orders_table', 8),
(31, '2022_05_26_021414_create_units_table', 9),
(32, '2022_05_26_033832_create_imports_table', 10),
(33, '2022_05_26_033840_create_exports_table', 10),
(34, '2022_05_31_181050_create_cancels_table', 11),
(35, '2022_06_05_005610_create_cancels_table', 12),
(36, '2022_02_19_061555_create_orders_table', 13),
(37, '2022_02_19_061556_create_orders_table', 14),
(38, '2014_10_12_000001_create_users_table', 15),
(39, '2022_02_17_162630_create_colors_table', 16),
(40, '2022_06_05_170730_create_danh_gias_table', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `navbars`
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
-- Đang đổ dữ liệu cho bảng `navbars`
--

INSERT INTO `navbars` (`id`, `title`, `ordering`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 1, '/', '2022-04-03 04:58:17', '2022-04-03 04:58:31'),
(2, 'Giới thiệu', 2, '/introduce', '2022-04-03 05:00:39', '2022-04-03 05:00:39'),
(3, 'Sản phẩm', 3, '/product', '2022-04-03 05:01:11', '2022-04-03 05:01:11'),
(4, 'Tin tức', 4, '/news', '2022-04-03 05:01:32', '2022-04-03 05:01:32'),
(5, 'Liên hệ', 5, '/contact', '2022-04-03 05:01:42', '2022-04-03 05:01:42'),
(6, 'Phối màu', 6, '/color', '2022-06-01 11:29:48', '2022-06-01 11:29:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
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
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'CHƯƠNG TRÌNH NHÀ THẦU CHUYÊN NGHIỆP SƠN TOA 2022: DÙNG SƠN - TÍCH ĐIỂM - NHẬN QUÀ', '<p>Với sự đồng h&agrave;nh, tin tưởng v&agrave; ủng hộ của Qu&yacute; Nh&agrave; Thầu, Thợ Sơn đối với c&aacute;c sản phẩm của sơn TOA, ch&iacute;nh l&agrave; một trong những động lực gi&uacute;p sơn TOA ph&aacute;t triển như ng&agrave;y h&ocirc;m nay.&nbsp;<a href=\"https://www.toagroup.com.vn/\"><strong>C&ocirc;ng ty TNHH Sơn TOA Việt Nam</strong></a>&nbsp;xin tr&acirc;n trọng giới thiệu&nbsp;<strong>Chương tr&igrave;nh Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA 2022</strong>&nbsp;với mong muốn tri &acirc;n kh&aacute;ch h&agrave;ng, đem lại những lợi &iacute;ch thiết thực v&agrave; hiệu quả cho c&aacute;c nh&agrave; thầu đ&atilde;, đang v&agrave; sẽ l&agrave; Hội vi&ecirc;n của chương tr&igrave;nh.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; chương tr&igrave;nh t&iacute;ch lũy điểm thưởng d&agrave;nh cho Qu&yacute; Nh&agrave; thầu, Thợ Sơn th&ocirc;ng qua ứng dụng&nbsp;<strong>TOA.painter</strong>&nbsp;tr&ecirc;n điện thoại th&ocirc;ng minh. C&aacute;c th&agrave;nh vi&ecirc;n khi tham gia chương tr&igrave;nh t&iacute;ch lũy điểm thưởng bằng c&aacute;ch sử dụng ứng dụng tr&ecirc;n để qu&eacute;t m&atilde; QR in tr&ecirc;n nắp th&ugrave;ng của sản phẩm khi mua c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng của sơn TOA tại c&aacute;c đại l&yacute; tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/2fbf59a8b19020-bannerdungsontichdiemnhanqua_1648987410.jpg\" style=\"height:420px; width:840px\" /></p>\r\n\r\n<p><strong>1. ĐỐI TƯỢNG THAM GIA</strong></p>\r\n\r\n<p>Tất cả kh&aacute;ch h&agrave;ng tr&ecirc;n 18 tuổi, l&agrave;&nbsp;<strong>Nh&agrave; thầu Hội vi&ecirc;n TOA</strong>&nbsp;(*) của chương tr&igrave;nh Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA.</p>\r\n\r\n<p>(*) Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA (sau đ&acirc;y gọi tắt l&agrave; Hội vi&ecirc;n) l&agrave; những Hội vi&ecirc;n đ&atilde; gia nhập trong năm 2019, năm 2020, năm 2021 v&agrave; Hội vi&ecirc;n mới gia nhập năm 2022.</p>\r\n\r\n<p><strong>2. C&Aacute;CH THỨC ĐĂNG K&Yacute; T&Agrave;I KHOẢN, T&Iacute;CH ĐIỂM &amp; NHẬN QU&Agrave;</strong></p>\r\n\r\n<p><strong>Bước 1:</strong>&nbsp;Nh&agrave; thầu điền đầy đủ th&ocirc;ng tin v&agrave;o Đơn đăng k&yacute; theo mẫu của sơn TOA cung cấp th&ocirc;ng qua nh&acirc;n vi&ecirc;n của TOA:</p>\r\n\r\n<ul>\r\n	<li>Cung cấp bản sao Giấy tờ tuỳ th&acirc;n (CMND/ CCCD/ Hộ chiếu) nếu l&agrave; nh&agrave; thầu c&aacute; nh&acirc;n.</li>\r\n	<li>Cung cấp bản sao Giấy chứng nhận đăng k&yacute; doanh nghiệp (hoặc giấy tờ c&oacute; gi&aacute; trị ph&aacute;p l&yacute; tương đương) nếu nh&agrave; thầu l&agrave; tổ chức được th&agrave;nh lập hợp ph&aacute;p tại Việt Nam.</li>\r\n</ul>\r\n\r\n<p><strong>Bước 2:</strong>&nbsp;Nh&acirc;n vi&ecirc;n Sơn TOA sẽ kiểm tra, đăng tải v&agrave; x&aacute;c nhận th&ocirc;ng tin đăng k&yacute; của nh&agrave; thầu tr&ecirc;n ứng dụng TOA.dms<strong>&nbsp;</strong>(**)</p>\r\n\r\n<p><strong>Bước 3:</strong>&nbsp;TOA th&ocirc;ng b&aacute;o cho nh&agrave; thầu về việc đăng k&yacute; th&agrave;nh c&ocirc;ng t&agrave;i khoản qua số điện thoại v&agrave;/ hoặc địa chỉ email k&egrave;m với M&atilde; Hội vi&ecirc;n, ch&iacute;nh thức trở th&agrave;nh Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA.</p>\r\n\r\n<p><strong>Bước 4:</strong>&nbsp;Nh&agrave; thầu được cung cấp một t&agrave;i khoản Hội vi&ecirc;n để đăng nhập v&agrave;o ứng dụng&nbsp;<strong>TOA.painter</strong>&nbsp;(***)</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.toagroup.com.vn/uploads/images/847a3dfeb39033-toapainter.png\" style=\"height:161px; width:508px\" /></p>\r\n\r\n<p><em>Ch&uacute; th&iacute;ch:&nbsp;</em><br />\r\n(**)&nbsp;TOA.dms: Ứng dụng d&agrave;nh cho nh&acirc;n vi&ecirc;n của sơn TOA<br />\r\n(***) TOA.painter: Ứng dụng qu&eacute;t m&atilde; QR d&agrave;nh cho Hội vi&ecirc;n</p>\r\n\r\n<p><strong>3.&nbsp;THỜI GIAN &Aacute;P DỤNG CHƯƠNG TR&Igrave;NH KHUYẾN M&Atilde;I</strong></p>\r\n\r\n<p>Chương tr&igrave;nh tạo điều kiện cho c&aacute;c nh&agrave; thầu v&agrave; Hội vi&ecirc;n c&oacute; thể tham gia v&agrave; nhận được c&aacute;c phần qu&agrave; hấp dẫn với thời gian diễn ra bắt đầu từ 04/01/2022 đến 31/12/2022.</p>\r\n\r\n<p><strong>3.1. Hoạt động khuyến m&atilde;i 1</strong></p>\r\n\r\n<p>Mỗi Nh&agrave; thầu sau khi đăng k&yacute; th&agrave;nh c&ocirc;ng sẽ trở th&agrave;nh Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA v&agrave; được cấp M&atilde; Hội vi&ecirc;n trong thời gian khuyến mại của hoạt động khuyến m&atilde;i 1 sẽ được tặng&nbsp;<strong>một (01) &aacute;o thun &ldquo;Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA&rdquo; v&agrave; một (01) n&oacute;n kết</strong></p>\r\n\r\n<p>Qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết n&agrave;y sẽ được Nh&acirc;n vi&ecirc;n của TOA trao cho Nh&agrave; thầu theo c&aacute;c đợt như sau:</p>\r\n\r\n<ul>\r\n	<li><em><strong>Đợt 1:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 1 v&agrave; th&aacute;ng 2 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/03/2022.</em></li>\r\n	<li><em><strong>Đợt 2:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 3 v&agrave; th&aacute;ng 4 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/05/2022.</em></li>\r\n	<li><em><strong>Đợt 3:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 5 v&agrave; th&aacute;ng 6 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/07/2022.</em></li>\r\n	<li><em><strong>Đợt 4:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 7 v&agrave; th&aacute;ng 8 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 30/09/2022.</em></li>\r\n	<li><em><strong>Đợt 5:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 9 v&agrave; th&aacute;ng 10 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 30/11/2022.</em></li>\r\n	<li><em><strong>Đợt 6:</strong>&nbsp;Đối với c&aacute;c nh&agrave; thầu đăng k&yacute; v&agrave; được cấp m&atilde; hội vi&ecirc;n trong th&aacute;ng 11 v&agrave; th&aacute;ng 12 năm 2022, qu&agrave; tặng &Aacute;o thun v&agrave; N&oacute;n kết sẽ được trao tặng cho nh&agrave; thầu muộn nhất v&agrave;o ng&agrave;y 31/01/2023.</em></li>\r\n</ul>\r\n\r\n<p><strong>3.2.&nbsp;Hoạt động khuyến m&atilde;i 2</strong></p>\r\n\r\n<ul>\r\n	<li>Mỗi Hội vi&ecirc;n sẽ được&nbsp;<strong>tặng 200 điểm</strong>&nbsp;(tương đương với&nbsp;<strong>200.000 đồng</strong>) v&agrave;o th&aacute;ng sinh nhật của Hội vi&ecirc;n nếu Hội vi&ecirc;n đạt số điểm từ 300 điểm trở l&ecirc;n v&agrave;o th&aacute;ng sinh nhật.</li>\r\n	<li>Điểm sẽ được cộng dồn v&agrave;o điểm t&iacute;ch lũy v&agrave; được trả thưởng v&agrave;o đợt thanh to&aacute;n tương ứng.</li>\r\n</ul>\r\n\r\n<p><strong>3.3. Hoạt động khuyến m&atilde;i 3</strong></p>\r\n\r\n<p>Mỗi khi c&oacute; C&ocirc;ng tr&igrave;nh mới v&agrave; c&oacute; sử dụng sơn TOA, Hội vi&ecirc;n sẽ đăng k&yacute; th&ocirc;ng tin C&ocirc;ng tr&igrave;nh cho TOA th&ocirc;ng qua một trong hai c&aacute;ch sau:</p>\r\n\r\n<p><strong>C&aacute;ch 1:</strong>&nbsp;Đăng k&yacute; trực tiếp cho Nh&acirc;n vi&ecirc;n của Sơn TOA.</p>\r\n\r\n<p><strong>C&aacute;ch 2:</strong>&nbsp;Đăng tải th&ocirc;ng tin C&ocirc;ng tr&igrave;nh mới l&ecirc;n ứng dụng TOA.painter với t&agrave;i khoản đ&atilde; được cung cấp.</p>\r\n\r\n<p>Sau khi nhận được th&ocirc;ng tin về C&ocirc;ng tr&igrave;nh mới, TOA sẽ kiểm tra, x&aacute;c thực th&ocirc;ng tin được cung cấp v&agrave; ghi nhận việc đăng k&yacute; C&ocirc;ng tr&igrave;nh mới th&agrave;nh c&ocirc;ng tr&ecirc;n cả hai ứng dụng TOA.painter tại t&agrave;i khoản c&aacute; nh&acirc;n của Hội vi&ecirc;n v&agrave; TOA.dms.&nbsp;</p>\r\n\r\n<p><strong>Lưu &yacute;:</strong>&nbsp;Thời gian x&aacute;c thực th&ocirc;ng tin của C&ocirc;ng tr&igrave;nh mới c&oacute; thể dao động từ 05 ng&agrave;y đến 10 ng&agrave;y l&agrave;m việc.<br />\r\n&nbsp;<br />\r\nSau khi C&ocirc;ng tr&igrave;nh đ&atilde; được đăng k&yacute; v&agrave; duyệt th&agrave;nh c&ocirc;ng, Hội vi&ecirc;n d&ugrave;ng ứng dụng TOA.painter để qu&eacute;t m&atilde; QR tr&ecirc;n sản phẩm của TOA tại C&ocirc;ng tr&igrave;nh đ&atilde; đăng k&yacute; để t&iacute;ch lũy điểm. Số điểm t&iacute;ch luỹ sẽ được quy đổi th&agrave;nh tiền v&agrave; được chuyển khoản trực tiếp v&agrave;o số t&agrave;i khoản ng&acirc;n h&agrave;ng của ch&iacute;nh Hội vi&ecirc;n theo th&ocirc;ng tin Hội vi&ecirc;n đ&atilde; đăng k&yacute; hoặc cung cấp th&ocirc;ng tin cho TOA.&nbsp;</p>\r\n\r\n<p>Mỗi điểm t&iacute;ch lũy sẽ được quy đổi th&agrave;nh 1.000 đồng (một ngh&igrave;n đồng).</p>\r\n\r\n<p>Điểm t&iacute;ch luỹ sẽ được chuyển v&agrave;o t&agrave;i khoản c&aacute; nh&acirc;n của Hội vi&ecirc;n tr&ecirc;n ứng dụng TOA.painter v&agrave; được chia th&agrave;nh 4 đợt:</p>\r\n\r\n<ul>\r\n	<li><em><strong>Đợt 1:</strong>&nbsp;Điểm t&iacute;ch luỹ từ 04/01/2022 đến hết 31/03/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 1.</em></li>\r\n	<li><em><strong>Đợt 2:&nbsp;</strong>Điểm t&iacute;ch luỹ từ 01/04/2022 đến hết 30/06/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 2.</em></li>\r\n	<li><em><strong>Đợt 3:</strong>&nbsp;Điểm t&iacute;ch lũy từ 01/07/2022 đến hết 30/09/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 3.</em></li>\r\n	<li><em><strong>Đợt 4:&nbsp;</strong>Điểm t&iacute;ch lũy từ 01/10/2022 đến hết 31/12/2022 sẽ được thanh to&aacute;n trong v&ograve;ng 45 ng&agrave;y t&iacute;nh từ ng&agrave;y kết th&uacute;c đợt 4.</em></li>\r\n</ul>\r\n\r\n<p><strong>4. DANH S&Aacute;CH C&Aacute;C SẢN PHẨM &amp; ĐIỂM T&Iacute;CH LUỸ TƯƠNG ỨNG</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/89f34f88210872-bngim_1648987473.jpg\" style=\"height:972px; width:650px\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5. ĐIỀU KHOẢN &amp; QUY ĐỊNH KH&Aacute;C</strong></p>\r\n\r\n<p>5.1. Chương tr&igrave;nh khuyến m&atilde;i n&agrave;y chỉ &aacute;p dụng đối với C&ocirc;ng tr&igrave;nh đ&atilde; được đăng k&yacute; th&agrave;nh c&ocirc;ng v&agrave; c&oacute; diện t&iacute;ch sơn từ 200m2 đến 5.000m2;</p>\r\n\r\n<p>5.2. Mỗi m&atilde; QR tr&ecirc;n mỗi th&ugrave;ng/ lon sơn TOA sẽ chỉ qu&eacute;t được 1 lần;</p>\r\n\r\n<p>5.3. Đối với Hoạt động khuyến mại số 2 v&agrave; Hoạt động khuyến mại số 3, để được thanh to&aacute;n điểm thưởng, Hội vi&ecirc;n phải cung cấp đầy đủ th&ocirc;ng tin t&agrave;i khoản (gồm Số t&agrave;i khoản, T&ecirc;n ng&acirc;n h&agrave;ng, Chi nh&aacute;nh ng&acirc;n h&agrave;ng) ch&iacute;nh chủ của Hội vi&ecirc;n cho TOA chậm nhất v&agrave;o ng&agrave;y kết th&uacute;c thời gian trả thưởng ương ứng;</p>\r\n\r\n<p>5.4. Khi kết th&uacute;c mỗi đợt t&iacute;ch điểm, Hội vi&ecirc;n cần c&oacute; điểm t&iacute;ch lũy &iacute;t nhất từ 300 điểm trở l&ecirc;n mới được chuyển tiền v&agrave;o t&agrave;i khoản. Nếu Hội vi&ecirc;n kh&ocirc;ng đủ điểm để được trả thưởng, số điểm c&oacute; thể được bảo lưu đến đợt trả thưởng tiếp theo. Đến ng&agrave;y 31/12/2022, nếu Hội vi&ecirc;n vẫn kh&ocirc;ng đủ điểm để trả thưởng, số điểm sẽ được hủy bỏ v&agrave; sẽ kh&ocirc;ng được bảo lưu đến năm sau;</p>\r\n\r\n<p>5.5. Chỉ t&iacute;nh đi&ecirc;̉m cho Hội vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA mua sơn tại c&aacute;c cửa h&agrave;ng thuộc hệ thống Sơn TOA;</p>\r\n\r\n<p>5.6. Chỉ Nh&agrave; Thầu c&oacute; đăng k&yacute; trở th&agrave;nh Hội Vi&ecirc;n Nh&agrave; thầu Chuy&ecirc;n nghiệp Sơn TOA mới được tham gia. Nh&acirc;n vi&ecirc;n của TOA, c&aacute;c Chủ đại l&yacute;, nh&agrave; ph&acirc;n phối của TOA, c&aacute;c nh&acirc;n vi&ecirc;n của c&aacute;c đại l&yacute;/ nh&agrave; ph&acirc;n phối của TOA kh&ocirc;ng được ph&eacute;p tham gia chương tr&igrave;nh n&agrave;y;</p>\r\n\r\n<p>5.7. Nh&agrave; thầu gia nhập phải cung cấp th&ocirc;ng tin, giấy tờ theo quy định của C&ocirc;ng ty TNHH Sơn TOA Việt Nam;</p>\r\n\r\n<p>5.8. C&aacute;c Giấy tờ t&ugrave;y th&acirc;n (Chứng minh nh&acirc;n d&acirc;n/ Căn cước c&ocirc;ng d&acirc;n) đối với Nh&agrave; thầu l&agrave; c&aacute; nh&acirc;n v&agrave; c&aacute;c Giấy tờ ph&aacute;p l&yacute; (Giấy chứng nhận đăng k&yacute; doanh nghiệp/ Giấy tờ c&oacute; gi&aacute; trị ph&aacute;p l&yacute; tương đương, v.v.) đối với Nh&agrave; thầu l&agrave; tổ chức m&agrave; Nh&agrave; thầu cung cấp khi tham gia chương tr&igrave;nh, phải hợp lệ v&agrave; c&ograve;n hiệu lực theo luật quy định của Việt Nam. C&aacute;c Giấy tờ t&ugrave;y th&acirc;n, Giấy tờ ph&aacute;p l&yacute; n&agrave;y phải c&ograve;n hiệu lực t&iacute;nh đến hết thời điểm trả thưởng;</p>\r\n\r\n<p>5.9. Ng&agrave;y th&agrave;nh lập đối với Nh&agrave; thầu l&agrave; ng&agrave;y tổ chức, doanh nghiệp được cơ quan thẩm quyền của Việt Nam cấp Giấy chứng nhận đăng k&yacute; doanh nghiệp (hoặc Giấy tờ c&oacute; gi&aacute; trị ph&aacute;p l&yacute; tương đương kh&aacute;c) lần đầu ti&ecirc;n;&nbsp;</p>\r\n\r\n<p>5.10. C&ocirc;ng ty Sơn TOA c&oacute; quy&ecirc;̀n từ ch&ocirc;́i trả thưởng cho Hội Vi&ecirc;n n&ecirc;́u ph&aacute;t hiện c&oacute; việc khai b&aacute;o kh&ocirc;ng đ&uacute;ng;</p>\r\n\r\n<p>5.11. Điểm t&iacute;ch luỹ chỉ được c&ocirc;ng nhận khi thao t&aacute;c qu&eacute;t m&atilde; vạch được thực hiện tại c&ocirc;ng tr&igrave;nh đ&atilde; đăng k&yacute; trước đ&oacute;;</p>\r\n\r\n<p>5.12. Chứng minh nh&acirc;n d&acirc;n/ Căn cước c&ocirc;ng d&acirc;n m&agrave; Nh&agrave; thầu cung cấp khi tham gia chương tr&igrave;nh phải hợp lệ theo luật quy định của Nh&agrave; nước Việt Nam (CMND/ CCCD phải c&ograve;n hạn sử dụng t&iacute;nh đến thời điểm trả thưởng);</p>\r\n\r\n<p>5.13. T&agrave;i khoản ng&acirc;n h&agrave;ng của Hội vi&ecirc;n phải l&agrave; t&agrave;i khoản của ch&iacute;nh Hội vi&ecirc;n. C&ocirc;ng ty TNHH Sơn TOA Việt Nam kh&ocirc;ng chấp nhận bất kỳ trường hợp ngoại lệ n&agrave;o;</p>\r\n\r\n<p>5.14. C&ocirc;ng ty TNHH Sơn TOA Việt Nam sẽ khấu trừ c&aacute;c khoản thuế thu nhập c&aacute; nh&acirc;n hoặc doanh nghiệp, v.v&hellip; (nếu c&oacute;) đối với c&aacute;c khoản tiền thưởng Hội vi&ecirc;n nhận được khi tham gia chương tr&igrave;nh n&agrave;y, theo quy định ph&aacute;p luật hiện h&agrave;nh về thuế thu nhập c&aacute; nh&acirc;n, thuế thu nhập doanh nghiệp, v.v&hellip; trước khi thanh to&aacute;n khoản tiền thưởng cho Hội vi&ecirc;n;</p>\r\n\r\n<p>5.15. Hội vi&ecirc;n c&oacute; tr&aacute;ch nhiệm hợp t&aacute;c với nh&acirc;n vi&ecirc;n C&ocirc;ng ty TNHH Sơn TOA Việt Nam trong việc ki&ecirc;̉m tra, x&aacute;c thực th&ocirc;ng tin được cung cấp, kể cả c&aacute;c th&ocirc;ng tin về C&ocirc;ng tr&igrave;nh;</p>\r\n\r\n<p>5.16.&nbsp;C&ocirc;ng ty Sơn TOA c&oacute; to&agrave;n quy&ecirc;̀n sử dụng h&igrave;nh ảnh của Hội vi&ecirc;n v&agrave;o mục đ&iacute;ch quảng c&aacute;o m&agrave; kh&ocirc;ng phải trả b&acirc;́t cứ chi ph&iacute; n&agrave;o.<br />\r\n&nbsp;</p>', '1648987526.jpg', '2022-04-03 05:05:26', '2022-04-03 05:05:26'),
(2, 'SỐNG BỪNG SẮC RIÊNG - TÁI TẠO SỨC SỐNG MỚI VỚI XU HƯỚNG SẮC MÀU NĂM 2022', '<p>Cuối năm l&agrave; thời điểm th&iacute;ch hợp để t&acirc;n trang, đổi mới kh&ocirc;ng gian sống với những thay đổi về bố cục sắp xếp nội thất, s&aacute;ng tạo m&agrave;u sắc, tạo kh&ocirc;ng gian sống tươi mới v&agrave; bền đẹp. Điều th&uacute; vị của sự thay đổi tr&ecirc;n nằm ở c&aacute;ch ch&uacute;ng ta kh&aacute;m ph&aacute; m&agrave;u sắc bằng những trải nghiệm v&agrave; kh&ocirc;ng gian sống theo c&aacute;ch ri&ecirc;ng của ch&iacute;nh m&igrave;nh, một kh&ocirc;ng gian ngập tr&agrave;n những x&uacute;c cảm, đầy cảm hứng v&agrave; thể hiện &yacute; nghĩa của cuộc sống, đặc biệt trong bối cảnh thế giới với nhiều thử th&aacute;ch như hiện nay.</p>\r\n\r\n<p>Xu hướng m&agrave;u sắc mới của năm 2022 với chủ đề&nbsp;<strong>&ldquo;THE COLOR OF THOUGHTFUL LIVING&rdquo; - &ldquo;SỐNG BỪNG SẮC RI&Ecirc;NG&rdquo;</strong>, được nghi&ecirc;n cứu v&agrave; lấy cảm hứng từ c&aacute;c chuy&ecirc;n gia m&agrave;u sắc h&agrave;ng đầu của sơn TOA. M&agrave;u sắc chủ đạo của năm l&agrave; những gam m&agrave;u mang đến cảm gi&aacute;c y&ecirc;n b&igrave;nh, ấm &aacute;p với những sắc th&aacute;i trầm v&agrave; dịu hơn, thể hiện niềm hi vọng về một thế giới &ldquo;B&igrave;nh Thường Mới&rdquo; đang dần hồi sinh sau đại dịch.</p>\r\n\r\n<p>Bạn đ&atilde; sẵn s&agrave;ng để kh&aacute;m ph&aacute; những m&agrave;u sắc sẽ l&ecirc;n ng&ocirc;i năm 2022? H&atilde;y bắt đầu cuộc h&agrave;nh tr&igrave;nh đầy bất ngờ v&agrave; s&aacute;ng tạo c&ugrave;ng với sơn TOA m&agrave; bạn kh&ocirc;ng n&ecirc;n bỏ lỡ.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/8731d6af8a7bc1-toacolortrend2022_1648987653.png\" style=\"height:683px; width:683px\" /></p>\r\n\r\n<p><strong>XU HƯỚNG 1: BIO-CENTRIC</strong></p>\r\n\r\n<p>Xu hướng sắc m&agrave;u&nbsp;<strong>Trắng Ấm</strong>&nbsp;(<strong>TOA 8300</strong>) v&agrave;&nbsp;<strong>Trắng Lạnh</strong>&nbsp;(<strong>TOA 7268</strong>) l&agrave; gam m&agrave;u biểu tượng cho sự hạnh ph&uacute;c v&agrave; an to&agrave;n với sức khoẻ của con người, tạo n&ecirc;n cảm gi&aacute;c sạch sẽ cho kh&ocirc;ng gian nh&agrave; th&ecirc;m phần rộng r&atilde;i, tho&aacute;ng m&aacute;t. M&agrave;u trắng c&ograve;n được xem l&agrave; m&agrave;u của sự khởi đầu, mọi vật đều được bắt nguồn từ m&agrave;u trắng. T&ocirc;ng m&agrave;u trắng s&aacute;ng l&agrave; t&ocirc;ng m&agrave;u chủ đạo ph&ugrave; hợp với mọi phong c&aacute;ch kiến tr&uacute;c bởi sự ho&agrave;n hảo, sang trọng m&agrave; n&oacute; đem lại, b&ecirc;n cạnh đ&oacute; c&ograve;n gi&uacute;p ng&ocirc;i nh&agrave; c&acirc;n bằng &aacute;nh s&aacute;ng, mang đến cho kh&ocirc;ng gian sống sự thanh lịch v&agrave; nhẹ nh&agrave;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/38c1d11bca0f5b-trangamtoa83001_1648987710.jpg\" style=\"height:510px; width:680px\" /></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Trắng Ấm (TOA 8300)</em></p>\r\n\r\n<p><strong>XU HƯỚNG 2: UNIVERSE WE</strong></p>\r\n\r\n<p>Năm 2022 l&agrave; sự l&ecirc;n ng&ocirc;i của m&agrave;u&nbsp;<strong>T&iacute;m</strong>&nbsp;(<strong>TOA 7227</strong>) với t&ocirc;ng&nbsp;nhẹ nh&agrave;ng tươi s&aacute;ng, l&agrave; xu hướng m&agrave;u của tương lai v&agrave; sự hy vọng - điều m&agrave; tất cả ch&uacute;ng ta đang đi t&igrave;m trong cuộc sống hiện nay, mang đến một khởi đầu ho&agrave;n to&agrave;n mới v&agrave; đem lại cảm gi&aacute;c b&igrave;nh an trước cuộc sống c&oacute; nhiều đổi thay v&agrave; x&aacute;o trộn. Sắc T&iacute;m được xem như một sự bổ sung ho&agrave;n hảo, mang đến một kh&ocirc;ng gian sống quyến rũ v&agrave; trang nh&atilde;, th&uacute;c đẩy sự s&aacute;ng tạo v&agrave; t&iacute;nh thẩm mỹ cho mọi c&ocirc;ng tr&igrave;nh kiến tr&uacute;c. Gam m&agrave;u n&agrave;y c&ograve;n l&agrave; m&agrave;u sắc l&yacute; tưởng khi kết hợp với c&aacute;c t&ocirc;ng m&agrave;u s&aacute;ng v&agrave; tối kh&aacute;c.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/cd793fb4fefccd-camgachtoa86161_1648987826.jpg\" style=\"height:496px; width:680px\" /></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>Cam Gạch (TOA 8616)</em></p>\r\n\r\n<p><strong>XU</strong><strong>&nbsp;HƯỚNG 3:&nbsp;</strong><strong>AUTHENTIC IMPRESS</strong></p>\r\n\r\n<p>Khơi cảm hứng s&aacute;ng tạo từ những n&eacute;t văn h&oacute;a truyền thống, những m&agrave;u sắc như&nbsp;<strong>Be</strong>&nbsp;(<strong>TOA 8771</strong>),&nbsp;<strong>Đỏ Đ&ocirc;</strong>&nbsp;(<strong>TOA 8710</strong>) v&agrave;&nbsp;<strong>Cam Gạch</strong>&nbsp;(<strong>TOA 8616</strong>) đại diện cho một lối sống &ldquo;B&igrave;nh Thường Mới&rdquo; v&agrave; gợi nhớ về những ho&agrave;i niệm v&agrave; sự cổ điển. M&agrave;u Be ch&iacute;nh l&agrave; m&agrave;u nguy&ecirc;n thuỷ nhất của con người, l&agrave; sợi d&acirc;y li&ecirc;n kết giữa những điều cũ v&agrave; mới, c&oacute; thể truyền tải lối sống hiện đại bằng c&aacute;ch thức đơn giản m&agrave; vẫn thể hiện được sự tr&acirc;n trọng cội nguồn v&agrave; k&yacute; ức xưa. Sắc Đỏ Đ&ocirc; thanh lịch v&agrave; sang trọng gi&uacute;p k&iacute;ch th&iacute;ch sự s&aacute;ng tạo v&agrave; gợi l&ecirc;n niềm cảm hứng, thể hiện bản sắc của thế hệ trẻ với ước vọng tạo ra dấu ấn ri&ecirc;ng của ch&iacute;nh họ qua c&aacute;c n&eacute;t t&iacute;nh c&aacute;ch độc đ&aacute;o. C&ugrave;ng với đ&oacute; l&agrave; t&ocirc;ng Cam Gạch mang lại sự ấm &aacute;p v&agrave; sống động cũng như cảm gi&aacute;c gần gũi, l&agrave;m nổi bật phong c&aacute;ch mộc mạc v&agrave; trầm lắng cho kh&ocirc;ng gian sống.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/072bd429cc29d5-betoa87711_1648987733.jpg\" style=\"height:757px; width:680px\" /></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Trắng Lạnh (TOA 7268)</em></p>\r\n\r\n<p><strong>XU HƯỚNG 4: SHELTERAL (Shelter + Natural)</strong></p>\r\n\r\n<p>Đối với xu hướng n&agrave;y, sắc&nbsp;<strong>Xanh Lam Đậm</strong>&nbsp;(<strong>TOA 7398</strong>),&nbsp;<strong>Trắng X&aacute;m</strong>&nbsp;(<strong>TOA 8257</strong>) v&agrave;&nbsp;<strong>Xanh L&aacute; Nhạt</strong>&nbsp;(<strong>TOA 8409</strong>) đ&oacute;ng vai tr&ograve; l&agrave; m&agrave;u sắc chủ đạo. Những gam m&agrave;u n&agrave;y mang lại cảm gi&aacute;c nhẹ nh&agrave;ng v&agrave; thoải m&aacute;i, tạo cảm gi&aacute;c nh&agrave; ch&iacute;nh l&agrave; nơi ch&uacute;ng ta cảm thấy được bảo vệ v&agrave; an y&ecirc;n nhất. Trong khi ch&uacute;ng ta đang chứng kiến ng&agrave;y c&agrave;ng nhiều hơn những sự hỗn loạn, nguy hiểm v&agrave; những bất ngờ ở ph&iacute;a trước, th&igrave; một kh&ocirc;ng gian sống y&ecirc;n b&igrave;nh v&agrave; mang hơi thở của thi&ecirc;n nhi&ecirc;n trở th&agrave;nh điều m&agrave; ch&uacute;ng ta ưu ti&ecirc;n v&agrave; tập trung hơn bao giờ hết.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/b192803c879397-xanhlamamtoa73981_1648987748.jpg\" style=\"height:453px; width:680px\" /></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Xanh Lam Đậm (TOA 7398)</em></p>', '1648987863.jpg', '2022-04-03 05:11:03', '2022-04-03 05:11:03'),
(3, 'TOA HYDRO QUICK PRIMER - SƠN LÓT ĐA NĂNG CAO CẤP BẢO VỆ CÔNG TRÌNH TOÀN DIỆN', '<p>L&agrave; một trong những nh&atilde;n h&agrave;ng đi đầu trong việc cung cấp c&aacute;c giải ph&aacute;p sơn bảo vệ c&ocirc;ng tr&igrave;nh to&agrave;n diện, sơn TOA hiểu r&otilde; những t&aacute;c động của kh&iacute; hậu v&agrave; thời tiết đang t&aacute;c động trực tiếp v&agrave;o bề mặt tường của c&aacute;c ng&ocirc;i nh&agrave; Việt, từ đ&oacute; đ&atilde; nghi&ecirc;n cứu v&agrave; mang đến một sản phẩm sơn l&oacute;t đa năng cao cấp ho&agrave;n to&agrave;n mới -&nbsp;<a href=\"https://www.toagroup.com.vn/san-pham-chi-tiet/son-lot-da-nang-cao-cap-toa-hydro-quick-primer\"><strong>TOA Hydro Quick Primer</strong></a>. Sản phẩm sở hữu c&aacute;c t&iacute;nh năng vượt trội, ho&agrave;n to&agrave;n ph&ugrave; hợp cho mọi c&ocirc;ng tr&igrave;nh v&agrave; hỗ trợ tuyệt vời cho c&aacute;c lớp sơn phủ gi&uacute;p bề mặt sơn l&aacute;ng mịn, ho&agrave;n hảo nhất. Bất kể l&agrave; sơn tường mới hay tường cũ, nội thất hay ngoại thất, sơn l&oacute;t đa năng cao cấp&nbsp;<a href=\"https://www.toagroup.com.vn/san-pham-chi-tiet/son-lot-da-nang-cao-cap-toa-hydro-quick-primer-copy\">TOA Hydro Quick Primer</a>&nbsp;c&oacute; vai tr&ograve; cực kỳ quan trọng, kh&ocirc;ng chỉ g&oacute;p phần bảo vệ bề mặt tường, m&agrave; c&ograve;n tăng th&ecirc;m t&iacute;nh thẩm mỹ cho ng&ocirc;i nh&agrave;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/assets/image/img_news/mau-son-noi-that-jotun-dep-cho-phong-lam-viec-mau-kem-va-nau-cat_1649130490.jpg\" style=\"height:600px; width:600px\" /></p>\r\n\r\n<p><a href=\"https://www.toagroup.com.vn/san-pham-chi-tiet/son-lot-da-nang-cao-cap-toa-hydro-quick-primer\">TOA Hydro&nbsp;Quick&nbsp;Primer</a>&nbsp;l&agrave; sơn l&oacute;t đa năng cao cấp gốc nước đặc biệt, được sản xuất từ nhựa styrene acrylic, kh&ocirc;ng sử dụng ch&igrave; v&agrave; thủy ng&acirc;n trong c&ocirc;ng thức.</p>\r\n\r\n<p><a href=\"https://www.toagroup.com.vn/san-pham-chi-tiet/son-lot-da-nang-cao-cap-toa-hydro-quick-primer-copy\">TOA Hydro&nbsp;Quick&nbsp;Primer</a>&nbsp;ph&ugrave; hợp sử dụng cho bề mặt vữa t&ocirc; mới x&acirc;y&nbsp;<strong>sau 3 ng&agrave;y</strong>&nbsp;trong điều kiện b&igrave;nh thường hoặc bề mặt tường cũ, bị phấn h&oacute;a hay c&oacute; độ b&aacute;m d&iacute;nh k&eacute;m, gi&uacute;p tăng khả năng kh&aacute;ng kiềm cho c&aacute;c bề mặt tường cả trong nh&agrave; v&agrave; ngo&agrave;i trời, v&igrave; thế khi sơn nh&agrave; hay bất kỳ c&ocirc;ng tr&igrave;nh n&agrave;o cũng kh&ocirc;ng n&ecirc;n bỏ qua lớp sơn l&oacute;t n&agrave;y.</p>\r\n\r\n<p><strong>Sản phẩm c&ograve;n sở hữu những t&iacute;nh năng nổi bật kh&aacute;c như:</strong></p>\r\n\r\n<ul>\r\n	<li>Độ b&aacute;m d&iacute;nh cao: sản phẩm gi&uacute;p tăng độ kết d&iacute;nh v&agrave; độ bền cho lớp sơn phủ.</li>\r\n	<li>Kh&aacute;ng kiềm v&agrave; chống loang muối hiệu quả: t&iacute;nh kiềm thường g&acirc;y ra c&aacute;c hiện tượng ph&aacute; vỡ cấu tr&uacute;c của sơn, như bong tr&oacute;c, muối ho&aacute; hay đốm m&agrave;u, l&agrave;m m&agrave;ng sơn bị phấn h&oacute;a, loang lỗ v&agrave; nấm mốc. V&igrave; vậy, với khả năng kh&aacute;ng kiềm v&agrave; loang muối tối ưu, TOA Hydro Quick Primer c&oacute; khả năng ngăn chặn v&agrave; khắc phục những khiếm khuyết hay gặp phải của bề mặt tường do t&aacute;c động của kiềm.</li>\r\n	<li>Chống ố v&agrave;ng: TOA Hydro Quick Primer gi&uacute;p ngăn kiềm t&aacute;c động l&ecirc;n lớp sơn phủ l&agrave;m bề mặt sơn bị ố v&agrave;ng; đặc biệt l&agrave; với bề mặt tường cũ.</li>\r\n	<li>Sản phẩm c&oacute; thể sử dụng được cho cả tường ngoại v&agrave; nội thất.</li>\r\n</ul>\r\n\r\n<p>B&ecirc;n cạnh những t&iacute;nh năng tuyệt hảo tr&ecirc;n, việc tu&acirc;n thủ c&aacute;c bước thi c&ocirc;ng đặc biệt l&agrave; bước sơn l&oacute;t cũng rất quan trọng, gi&uacute;p bạn c&oacute; được một ng&ocirc;i nh&agrave; vừa đẹp mắt, lại bền l&acirc;u. H&atilde;y c&ugrave;ng xem quy tr&igrave;nh thi c&ocirc;ng sơn l&oacute;t TOA Hydro Quick Primer nhanh ch&oacute;ng v&agrave; tiết kiệm thời gian dưới đ&acirc;y, gi&uacute;p n&acirc;ng cao t&iacute;nh thẩm mỹ v&agrave; chất lượng c&ocirc;ng tr&igrave;nh của bạn.</p>\r\n\r\n<h2><strong>HƯỚNG DẪN C&Aacute;C BƯỚC THI C&Ocirc;NG KHI SỬ DỤNG SƠN L&Oacute;T TOA HYDRO QUICK PRIMER</strong></h2>\r\n\r\n<p><strong>Bước 1 &ndash; Xử l&yacute; bề mặt:</strong></p>\r\n\r\n<p><strong>Đối với bề mặt mới:</strong></p>\r\n\r\n<ul>\r\n	<li>Tường, vữa x&acirc;y t&ocirc; đ&atilde; kh&ocirc; sau 3 ng&agrave;y, độ ẩm tường phải đảm bảo dưới 30% v&agrave; độ pH của tường dưới 11 (kiểm tra bằng thiết bị chuy&ecirc;n dụng).</li>\r\n	<li>Loại bỏ hết bụi bẩn, dầu mỡ, nhựa xi măng, bề mặt bị phấn h&oacute;a v&agrave; c&aacute;c tạp chất kh&aacute;c bằng c&aacute;c thiết bị chuy&ecirc;n dụng như: m&aacute;y m&agrave;i, m&aacute;y ch&agrave; nh&aacute;m, m&aacute;y h&uacute;t bụi, m&aacute;y rửa nước sạch &aacute;p lực cao v&agrave; được vệ sinh sạch sẽ.</li>\r\n</ul>\r\n\r\n<p><strong>Đối với bề mặt cũ:</strong></p>\r\n\r\n<ul>\r\n	<li>L&agrave;m sạch bề mặt, loại bỏ bụi bẩn, lớp sơn cũ bằng c&aacute;c thiết bị chuy&ecirc;n dụng. Xử l&yacute; c&aacute;c bề mặt bị rong r&ecirc;u, nấm mốc bằng h&oacute;a chất th&iacute;ch hợp.</li>\r\n	<li>Rửa sạch bề mặt v&agrave; để kh&ocirc; r&aacute;o ho&agrave;n to&agrave;n, độ ẩm bề mặt phải dưới 30% (kiểm tra bằng thiết bị chuy&ecirc;n dụng).</li>\r\n	<li>Khu vực bị hư hỏng, vết nứt cần được sửa chữa lại v&agrave; l&agrave;m phẳng bằng vật liệu ph&ugrave; hợp.</li>\r\n</ul>\r\n\r\n<p><strong>Bước 2 &ndash; Sơn l&oacute;t:</strong>&nbsp;Sử dụng 1 lớp sơn l&oacute;t đa năng cao cấp TOA Hydro Quick Primer.</p>\r\n\r\n<p><strong>Bước 3 - Sơn phủ:</strong>&nbsp;Sử dụng 2 lớp sơn nước TOA nội thất hoặc ngoại thất.</p>\r\n\r\n<p>Sơn l&oacute;t đa năng cao cấp&nbsp;<a href=\"https://www.toagroup.com.vn/san-pham-chi-tiet/son-lot-da-nang-cao-cap-toa-hydro-quick-primer\"><strong>TOA Hydro Quick Primer</strong></a>&nbsp;l&agrave; giải ph&aacute;p ho&agrave;n hảo cho mọi c&ocirc;ng tr&igrave;nh v&agrave; l&agrave; một bước cần thiết trong quy tr&igrave;nh thi c&ocirc;ng sơn để n&acirc;ng cao chất lượng bề mặt c&ocirc;ng tr&igrave;nh, giữ cho m&agrave;u sơn phủ đẹp l&iacute; tưởng l&acirc;u d&agrave;i v&agrave; bền m&agrave;u cao, đem lại một ng&ocirc;i nh&agrave; đẹp như &yacute; cho bạn.</p>\r\n\r\n<p>T&igrave;m hiểu th&ecirc;m về sản phẩm sơn l&oacute;t mới TOA Hydro Quick Primer tại:&nbsp;<a href=\"https://www.toagroup.com.vn/san-pham-chi-tiet/son-lot-da-nang-cao-cap-toa-hydro-quick-primer\">https://www.toagroup.com.vn/san-pham-chi-tiet/son-lot-da-nang-cao-cap-toa-hydro-quick-primer</a></p>', '1649130511.jpg', '2022-04-04 20:48:31', '2022-04-04 20:48:31'),
(4, 'dasdas', '<p>dasdas</p>', '1649131270.jpg', '2022-04-04 21:01:10', '2022-04-04 21:01:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khach` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `total_price` bigint(20) DEFAULT NULL,
  `lydohuy` bigint(20) DEFAULT NULL,
  `giohoanthanh` datetime DEFAULT NULL,
  `giovanchuyen` datetime DEFAULT NULL,
  `hinhthucthanhtoan` int(11) DEFAULT NULL,
  `nganhang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sotaikhoan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sanphamtuvan` int(11) DEFAULT NULL,
  `loai` int(11) DEFAULT NULL,
  `anhchuyenkhoan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `khach`, `name`, `tel`, `address`, `receive`, `note`, `mail`, `status`, `total_price`, `lydohuy`, `giohoanthanh`, `giovanchuyen`, `hinhthucthanhtoan`, `nganhang`, `sotaikhoan`, `sanphamtuvan`, `loai`, `anhchuyenkhoan`, `created_at`, `updated_at`) VALUES
(34, 1, 'Minh Anh', '023135153135', NULL, NULL, NULL, NULL, 4, 888000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-11-23 14:22:45', '2022-11-23 14:22:45'),
(35, 8, 'Minh Anh', '023135153135', NULL, NULL, NULL, NULL, 4, 888000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-11-23 14:22:59', '2022-11-23 14:22:59'),
(36, 1, 'Minh Đức', '0230531355', NULL, NULL, NULL, NULL, 4, 1261500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-11-23 14:23:58', '2022-11-23 14:23:58'),
(37, 1, 'Minh Đức`', '0231354345', NULL, NULL, NULL, NULL, 4, 288000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-11-23 14:24:15', '2022-11-23 14:24:15'),
(38, 10, 'Minh Đức`', '0231354345', NULL, NULL, NULL, NULL, 4, 288000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-11-23 14:25:27', '2022-11-23 14:25:27'),
(39, 1, 'Huỳnh Đức', '0231354553', NULL, NULL, NULL, NULL, 4, 1249500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-11-23 14:25:53', '2022-11-23 14:25:53'),
(40, 1, 'Vũ Anh', '032513541232', NULL, NULL, NULL, NULL, 4, 5330000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-11-23 14:27:10', '2022-11-23 14:27:10'),
(41, NULL, 'Vũ Anh', '032513541232', 'HP', '1', NULL, NULL, 4, 159600, NULL, '2022-11-24 09:06:18', '2022-11-24 09:06:14', 1, NULL, NULL, NULL, 1, NULL, '2022-11-24 02:03:58', '2022-11-24 02:06:18'),
(42, NULL, 'Vũ Anh', '032513541232', 'HP', '1', NULL, NULL, 4, 228000, NULL, '2022-11-24 09:06:57', '2022-11-24 09:06:53', 1, NULL, NULL, NULL, 1, NULL, '2022-11-24 02:06:43', '2022-11-24 02:06:57'),
(43, NULL, 'Bui Quang', '04554857812', 'HP', '1', NULL, NULL, 2, 24000, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, '2022-11-24 18:11:20', '2022-11-24 18:19:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, 21000, NULL, NULL),
(2, 2, 2, 20, 21000, NULL, NULL),
(3, 1, 2, 1, 21000, NULL, NULL),
(4, 2, 3, 4, 21000, NULL, NULL),
(5, 3, 3, 3, 25500, NULL, NULL),
(6, 2, 6, 5, 21000, NULL, NULL),
(7, 4, 6, 6, 21000, NULL, NULL),
(8, 3, 7, 1, 25500, NULL, NULL),
(9, 2, 38, 12, 24000, NULL, NULL),
(10, 3, 39, 25, 25500, NULL, NULL),
(11, 2, 39, 24, 25500, NULL, NULL),
(12, 4, 40, 20, 21000, NULL, NULL),
(13, 3, 40, 20, 25500, NULL, NULL),
(14, 15, 40, 20, 220000, NULL, NULL),
(15, 2, 41, 7, 24000, NULL, NULL),
(16, 3, 42, 5, 25500, NULL, NULL),
(17, 8, 42, 5, 22500, NULL, NULL),
(18, 2, 43, 1, 24000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
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
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `trademark_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bigint(20) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(255) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `price_sale` bigint(20) DEFAULT NULL,
  `ingredient` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `face_paint` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solid_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proportion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wet_paint_film` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dry_paint_film` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dry_time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_dry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surface_dry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theoretical_attrition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paint_next_layer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tool` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solvent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutorial` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `trademark_id`, `status`, `description`, `category_id`, `image`, `price`, `price_sale`, `ingredient`, `color`, `face_paint`, `solid_content`, `proportion`, `wet_paint_film`, `dry_paint_film`, `dry_time`, `complete_dry`, `surface_dry`, `theoretical_attrition`, `paint_next_layer`, `tool`, `solvent`, `tutorial`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 'Sơn jotaplast jotun 1122', 109, '1', 2, '<p>Sơn jotun chất lượng</p>', 3, '1649004422.jpg', 21000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-03 09:47:02', '2022-11-23 13:40:41'),
(2, 'Sơn Kova CN-05 chống nóng', 872, '6', 2, '<p>Sơn kova&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649005933.png', 24000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-03 10:12:13', '2022-11-24 18:11:21'),
(3, 'Sơn Mastic chịu ẩm Kova SK6', 2, '6', 2, '<p>Sơn mastic chịu ẩm</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649260120.jpg', 25500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-06 08:48:40', '2022-11-24 02:06:43'),
(4, 'Sơn Mastic Dẻo Kova MT-T', 1395, '6', 2, '<p>Sơn nội thất mastic dẻo Kova MT-T</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649260744.png', 21000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-06 08:59:04', '2022-11-23 16:41:15'),
(5, 'Sơn Kova MTKLST', 2, '6', 2, '<p>Sơn Kova MTKLST</p>', 3, '1649264163.jpg', 200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-06 09:56:03', '2022-11-12 08:21:50'),
(6, 'Sơn nước Kova K265', 2, '6', 2, '<p>Sơn Kova K265</p>', 3, '1649264204.png', 200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-06 09:56:44', '2022-11-08 15:35:31'),
(7, 'SƠN MASTIC DẺO KOVA MT KT5T', 13, '6', 2, '<p>SƠN MASTIC DẺO KOVA MT KT5T là sơnch&ocirc;́ng th&acirc;́m đặc bi&ecirc;̣t có c&acirc;́u tạo từ nhựa Styrene Acrylic dùng đ&ecirc;̉ pha với xi măng, sử dụng c&ocirc;ng nghệ chống thấm của CHLB Đức c&oacute; khả năng Chống Thấm th&ocirc;ng minh: ngăn kh&ocirc;ng cho nước thấm từ b&ecirc;n ngo&agrave;i v&agrave;o, đồng thời hơi ẩm b&ecirc;n trong tường vẫn c&oacute; thể tho&aacute;t ra ngo&agrave;i theo những kẽ hở giữa c&aacute;c phần tử nhằm chống thấm hiệu quả và tăng đ&ocirc;̣ b&ecirc;̀n t&ocirc;́i đa cho b&ecirc;̀ mặt xi măng, c&acirc;́u trúc b&ecirc; t&ocirc;ng.<br />\r\nTOA Ch&ocirc;́ng Th&acirc;́m Đa Năng khác bi&ecirc;̣t với sơn ch&ocirc;́ng th&acirc;́m th&ocirc;ng thường nhờ tính năng vượt tr&ocirc;̣i:<br />\r\n* Ch&ocirc;́ng th&acirc;́m hoàn hảo g&acirc;́p 2 l&acirc;̀n<br />\r\n* Sử dụng cho N&ocirc;̣i &amp; Ngoại th&acirc;́t<br />\r\n* Ch&ocirc;́ng ki&ecirc;̀m hóa và n&acirc;́m m&ocirc;́c<br />\r\n* Màng sơn thoát &acirc;̉m d&ecirc;̃ dàng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649307495.jpg', 27000, NULL, 'Chất tạo màng, bột khoáng, nước', 'Theo catalogue', 'Bóng mờ', '41 ± 2 (%)', '1.25 – 1.35', '146 - 171 micron / lớp', '60 - 70 micron / lớp', 'tại 30oC', '7 ngày', 'sau 30 phút', '4.5 – 5.3 (m2/kg/lớp)', '120 phút', 'Cọ, Con lăn, Máy phun sơn thông thường', 'KHÔNG CẦN PHA LOÃNG', '<p><strong>CHUẨN BỊ BỀ MẶT:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt mới:</strong></li>\r\n</ul>\r\n\r\n<p>- Để kh&ocirc; bề mặt sau 28 ng&agrave;y trong điều kiện b&igrave;nh thường (nhiệt độ trung b&igrave;nh khoảng 30oC, độ ẩm tương đối 80%).</p>\r\n\r\n<p>- Độ ẩm bề mặt phải nhỏ hơn 16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Loại bỏ hết bụi bẩn, dầu mỡ khỏi bề mặt cần sơn.</p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt cũ:</strong></li>\r\n</ul>\r\n\r\n<p>- L&agrave;m sạch bề mặt loại bỏ bụi bẩn, lớp sơn cũ. Xử l&yacute; c&aacute;c bề mặt bị rong r&ecirc;u, nấm mốc bằng h&oacute;a chất th&iacute;ch hợp.</p>\r\n\r\n<p>- Rửa sạch bề mặt (nếu cần) v&agrave; để kh&ocirc; r&aacute;o ho&agrave;n to&agrave;n. Độ ẩm bề mặt phải &lt;16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Sửa chữa lại những khu vực bị hư hỏng. Nếu c&oacute; vết nứt lớn, cần được gia c&ocirc;ng lại v&agrave; l&agrave;m phẳng.</p>\r\n\r\n<p>- Sử dụng 1 lớp sơn l&oacute;t chuy&ecirc;n dụng TOA 4 Seasons Super Contact Sealer đối với bề mặt bị phấn h&oacute;a hay c&oacute; độ b&aacute;m d&iacute;nh k&eacute;m.</p>\r\n\r\n<p><strong>PHA TRỘN:&nbsp;</strong>Kh&ocirc;ng cần pha trộn với xi măng v&agrave; nước. Pha m&agrave;u trực tiếp bằng m&aacute;y pha m&agrave;u tự động.</p>\r\n\r\n<p><strong>THI C&Ocirc;NG:</strong>&nbsp;Ho&agrave;n thiện bằng 2 lớp TOA Waterblock Color.</p>\r\n\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n\r\n<p><strong>- KH&Ocirc;NG SỬ DỤNG BỘT TR&Eacute;T.</strong></p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điều kiện nhiệt độ kh&ocirc;ng kh&iacute; thấp hơn 15oC hoặc cao hơn 40oC.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện độ ẩm kh&ocirc;ng kh&iacute; vượt qu&aacute; 85%.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện nhiệt độ bề mặt cần sơn thấp hơn 3oC so với điểm tạo sương (dew-point) của kh&ocirc;ng kh&iacute;.</p>\r\n\r\n<p>- Khuấy kỹ trước khi sử dụng. N&ecirc;n sử dụng hết sau khi mở nắp th&ugrave;ng.</p>\r\n\r\n<p>- Đ&oacute;ng chặt nắp khi kh&ocirc;ng sử dụng.</p>', 2, '2022-04-06 21:58:15', '2022-11-13 03:35:03'),
(8, 'SƠN MASTIC DẺO KOVA 12312', 1503, '6', 2, '<p>SƠN MASTIC DẺO KOVA MT KT5T là sơnch&ocirc;́ng th&acirc;́m đặc bi&ecirc;̣t có c&acirc;́u tạo từ nhựa Styrene Acrylic dùng đ&ecirc;̉ pha với xi măng, sử dụng c&ocirc;ng nghệ chống thấm của CHLB Đức c&oacute; khả năng Chống Thấm th&ocirc;ng minh: ngăn kh&ocirc;ng cho nước thấm từ b&ecirc;n ngo&agrave;i v&agrave;o, đồng thời hơi ẩm b&ecirc;n trong tường vẫn c&oacute; thể tho&aacute;t ra ngo&agrave;i theo những kẽ hở giữa c&aacute;c phần tử nhằm chống thấm hiệu quả và tăng đ&ocirc;̣ b&ecirc;̀n t&ocirc;́i đa cho b&ecirc;̀ mặt xi măng, c&acirc;́u trúc b&ecirc; t&ocirc;ng.<br />\r\nTOA Ch&ocirc;́ng Th&acirc;́m Đa Năng khác bi&ecirc;̣t với sơn ch&ocirc;́ng th&acirc;́m th&ocirc;ng thường nhờ tính năng vượt tr&ocirc;̣i:<br />\r\n* Ch&ocirc;́ng th&acirc;́m hoàn hảo g&acirc;́p 2 l&acirc;̀n<br />\r\n* Sử dụng cho N&ocirc;̣i &amp; Ngoại th&acirc;́t<br />\r\n* Ch&ocirc;́ng ki&ecirc;̀m hóa và n&acirc;́m m&ocirc;́c<br />\r\n* Màng sơn thoát &acirc;̉m d&ecirc;̃ dàng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649307495.jpg', 22500, NULL, 'Chất tạo màng, bột khoáng, nước', 'Theo catalogue', 'Bóng mờ', '41 ± 2 (%)', '1.25 – 1.35', '146 - 171 micron / lớp', '60 - 70 micron / lớp', 'tại 30oC', '7 ngày', 'sau 30 phút', '4.5 – 5.3 (m2/kg/lớp)', '120 phút', 'Cọ, Con lăn, Máy phun sơn thông thường', 'KHÔNG CẦN PHA LOÃNG', '<p><strong>CHUẨN BỊ BỀ MẶT:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt mới:</strong></li>\r\n</ul>\r\n\r\n<p>- Để kh&ocirc; bề mặt sau 28 ng&agrave;y trong điều kiện b&igrave;nh thường (nhiệt độ trung b&igrave;nh khoảng 30oC, độ ẩm tương đối 80%).</p>\r\n\r\n<p>- Độ ẩm bề mặt phải nhỏ hơn 16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Loại bỏ hết bụi bẩn, dầu mỡ khỏi bề mặt cần sơn.</p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt cũ:</strong></li>\r\n</ul>\r\n\r\n<p>- L&agrave;m sạch bề mặt loại bỏ bụi bẩn, lớp sơn cũ. Xử l&yacute; c&aacute;c bề mặt bị rong r&ecirc;u, nấm mốc bằng h&oacute;a chất th&iacute;ch hợp.</p>\r\n\r\n<p>- Rửa sạch bề mặt (nếu cần) v&agrave; để kh&ocirc; r&aacute;o ho&agrave;n to&agrave;n. Độ ẩm bề mặt phải &lt;16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Sửa chữa lại những khu vực bị hư hỏng. Nếu c&oacute; vết nứt lớn, cần được gia c&ocirc;ng lại v&agrave; l&agrave;m phẳng.</p>\r\n\r\n<p>- Sử dụng 1 lớp sơn l&oacute;t chuy&ecirc;n dụng TOA 4 Seasons Super Contact Sealer đối với bề mặt bị phấn h&oacute;a hay c&oacute; độ b&aacute;m d&iacute;nh k&eacute;m.</p>\r\n\r\n<p><strong>PHA TRỘN:&nbsp;</strong>Kh&ocirc;ng cần pha trộn với xi măng v&agrave; nước. Pha m&agrave;u trực tiếp bằng m&aacute;y pha m&agrave;u tự động.</p>\r\n\r\n<p><strong>THI C&Ocirc;NG:</strong>&nbsp;Ho&agrave;n thiện bằng 2 lớp TOA Waterblock Color.</p>\r\n\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n\r\n<p><strong>- KH&Ocirc;NG SỬ DỤNG BỘT TR&Eacute;T.</strong></p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điều kiện nhiệt độ kh&ocirc;ng kh&iacute; thấp hơn 15oC hoặc cao hơn 40oC.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện độ ẩm kh&ocirc;ng kh&iacute; vượt qu&aacute; 85%.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện nhiệt độ bề mặt cần sơn thấp hơn 3oC so với điểm tạo sương (dew-point) của kh&ocirc;ng kh&iacute;.</p>\r\n\r\n<p>- Khuấy kỹ trước khi sử dụng. N&ecirc;n sử dụng hết sau khi mở nắp th&ugrave;ng.</p>\r\n\r\n<p>- Đ&oacute;ng chặt nắp khi kh&ocirc;ng sử dụng.</p>', 2, '2022-04-06 21:58:15', '2022-11-24 02:06:43'),
(9, 'SƠN MASTIC DẺO KOVA MT 121', 14, '6', 2, '<p>SƠN MASTIC DẺO KOVA MT KT5T là sơnch&ocirc;́ng th&acirc;́m đặc bi&ecirc;̣t có c&acirc;́u tạo từ nhựa Styrene Acrylic dùng đ&ecirc;̉ pha với xi măng, sử dụng c&ocirc;ng nghệ chống thấm của CHLB Đức c&oacute; khả năng Chống Thấm th&ocirc;ng minh: ngăn kh&ocirc;ng cho nước thấm từ b&ecirc;n ngo&agrave;i v&agrave;o, đồng thời hơi ẩm b&ecirc;n trong tường vẫn c&oacute; thể tho&aacute;t ra ngo&agrave;i theo những kẽ hở giữa c&aacute;c phần tử nhằm chống thấm hiệu quả và tăng đ&ocirc;̣ b&ecirc;̀n t&ocirc;́i đa cho b&ecirc;̀ mặt xi măng, c&acirc;́u trúc b&ecirc; t&ocirc;ng.<br />\r\nTOA Ch&ocirc;́ng Th&acirc;́m Đa Năng khác bi&ecirc;̣t với sơn ch&ocirc;́ng th&acirc;́m th&ocirc;ng thường nhờ tính năng vượt tr&ocirc;̣i:<br />\r\n* Ch&ocirc;́ng th&acirc;́m hoàn hảo g&acirc;́p 2 l&acirc;̀n<br />\r\n* Sử dụng cho N&ocirc;̣i &amp; Ngoại th&acirc;́t<br />\r\n* Ch&ocirc;́ng ki&ecirc;̀m hóa và n&acirc;́m m&ocirc;́c<br />\r\n* Màng sơn thoát &acirc;̉m d&ecirc;̃ dàng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649307495.jpg', 300000, NULL, 'Chất tạo màng, bột khoáng, nước', 'Theo catalogue', 'Bóng mờ', '41 ± 2 (%)', '1.25 – 1.35', '146 - 171 micron / lớp', '60 - 70 micron / lớp', 'tại 30oC', '7 ngày', 'sau 30 phút', '4.5 – 5.3 (m2/kg/lớp)', '120 phút', 'Cọ, Con lăn, Máy phun sơn thông thường', 'KHÔNG CẦN PHA LOÃNG', '<p><strong>CHUẨN BỊ BỀ MẶT:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt mới:</strong></li>\r\n</ul>\r\n\r\n<p>- Để kh&ocirc; bề mặt sau 28 ng&agrave;y trong điều kiện b&igrave;nh thường (nhiệt độ trung b&igrave;nh khoảng 30oC, độ ẩm tương đối 80%).</p>\r\n\r\n<p>- Độ ẩm bề mặt phải nhỏ hơn 16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Loại bỏ hết bụi bẩn, dầu mỡ khỏi bề mặt cần sơn.</p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt cũ:</strong></li>\r\n</ul>\r\n\r\n<p>- L&agrave;m sạch bề mặt loại bỏ bụi bẩn, lớp sơn cũ. Xử l&yacute; c&aacute;c bề mặt bị rong r&ecirc;u, nấm mốc bằng h&oacute;a chất th&iacute;ch hợp.</p>\r\n\r\n<p>- Rửa sạch bề mặt (nếu cần) v&agrave; để kh&ocirc; r&aacute;o ho&agrave;n to&agrave;n. Độ ẩm bề mặt phải &lt;16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Sửa chữa lại những khu vực bị hư hỏng. Nếu c&oacute; vết nứt lớn, cần được gia c&ocirc;ng lại v&agrave; l&agrave;m phẳng.</p>\r\n\r\n<p>- Sử dụng 1 lớp sơn l&oacute;t chuy&ecirc;n dụng TOA 4 Seasons Super Contact Sealer đối với bề mặt bị phấn h&oacute;a hay c&oacute; độ b&aacute;m d&iacute;nh k&eacute;m.</p>\r\n\r\n<p><strong>PHA TRỘN:&nbsp;</strong>Kh&ocirc;ng cần pha trộn với xi măng v&agrave; nước. Pha m&agrave;u trực tiếp bằng m&aacute;y pha m&agrave;u tự động.</p>\r\n\r\n<p><strong>THI C&Ocirc;NG:</strong>&nbsp;Ho&agrave;n thiện bằng 2 lớp TOA Waterblock Color.</p>\r\n\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n\r\n<p><strong>- KH&Ocirc;NG SỬ DỤNG BỘT TR&Eacute;T.</strong></p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điều kiện nhiệt độ kh&ocirc;ng kh&iacute; thấp hơn 15oC hoặc cao hơn 40oC.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện độ ẩm kh&ocirc;ng kh&iacute; vượt qu&aacute; 85%.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện nhiệt độ bề mặt cần sơn thấp hơn 3oC so với điểm tạo sương (dew-point) của kh&ocirc;ng kh&iacute;.</p>\r\n\r\n<p>- Khuấy kỹ trước khi sử dụng. N&ecirc;n sử dụng hết sau khi mở nắp th&ugrave;ng.</p>\r\n\r\n<p>- Đ&oacute;ng chặt nắp khi kh&ocirc;ng sử dụng.</p>', 2, '2022-04-06 21:58:15', '2022-10-23 09:42:18'),
(10, 'Sơn abc jotun 1', 66, '1', 2, '<p>Sơn jotun chất lượng</p>', 3, '1649004422.jpg', 120000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-03 09:47:02', '2022-11-08 16:46:35'),
(11, 'Sơn Kova CN-02 chống rét', 10, '6', 2, '<p>Sơn kova&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649005933.png', 220000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-03 10:12:13', '2022-10-23 11:17:29'),
(12, 'SƠN MASTIC KOVA 12', 56, '6', 2, '<p>SƠN MASTIC DẺO KOVA MT KT5T là sơnch&ocirc;́ng th&acirc;́m đặc bi&ecirc;̣t có c&acirc;́u tạo từ nhựa Styrene Acrylic dùng đ&ecirc;̉ pha với xi măng, sử dụng c&ocirc;ng nghệ chống thấm của CHLB Đức c&oacute; khả năng Chống Thấm th&ocirc;ng minh: ngăn kh&ocirc;ng cho nước thấm từ b&ecirc;n ngo&agrave;i v&agrave;o, đồng thời hơi ẩm b&ecirc;n trong tường vẫn c&oacute; thể tho&aacute;t ra ngo&agrave;i theo những kẽ hở giữa c&aacute;c phần tử nhằm chống thấm hiệu quả và tăng đ&ocirc;̣ b&ecirc;̀n t&ocirc;́i đa cho b&ecirc;̀ mặt xi măng, c&acirc;́u trúc b&ecirc; t&ocirc;ng.<br />\r\nTOA Ch&ocirc;́ng Th&acirc;́m Đa Năng khác bi&ecirc;̣t với sơn ch&ocirc;́ng th&acirc;́m th&ocirc;ng thường nhờ tính năng vượt tr&ocirc;̣i:<br />\r\n* Ch&ocirc;́ng th&acirc;́m hoàn hảo g&acirc;́p 2 l&acirc;̀n<br />\r\n* Sử dụng cho N&ocirc;̣i &amp; Ngoại th&acirc;́t<br />\r\n* Ch&ocirc;́ng ki&ecirc;̀m hóa và n&acirc;́m m&ocirc;́c<br />\r\n* Màng sơn thoát &acirc;̉m d&ecirc;̃ dàng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649307495.jpg', 300000, NULL, 'Chất tạo màng, bột khoáng, nước', 'Theo catalogue', 'Bóng mờ', '41 ± 2 (%)', '1.25 – 1.35', '146 - 171 micron / lớp', '60 - 70 micron / lớp', 'tại 30oC', '7 ngày', 'sau 30 phút', '4.5 – 5.3 (m2/kg/lớp)', '120 phút', 'Cọ, Con lăn, Máy phun sơn thông thường', 'KHÔNG CẦN PHA LOÃNG', '<p><strong>CHUẨN BỊ BỀ MẶT:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt mới:</strong></li>\r\n</ul>\r\n\r\n<p>- Để kh&ocirc; bề mặt sau 28 ng&agrave;y trong điều kiện b&igrave;nh thường (nhiệt độ trung b&igrave;nh khoảng 30oC, độ ẩm tương đối 80%).</p>\r\n\r\n<p>- Độ ẩm bề mặt phải nhỏ hơn 16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Loại bỏ hết bụi bẩn, dầu mỡ khỏi bề mặt cần sơn.</p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt cũ:</strong></li>\r\n</ul>\r\n\r\n<p>- L&agrave;m sạch bề mặt loại bỏ bụi bẩn, lớp sơn cũ. Xử l&yacute; c&aacute;c bề mặt bị rong r&ecirc;u, nấm mốc bằng h&oacute;a chất th&iacute;ch hợp.</p>\r\n\r\n<p>- Rửa sạch bề mặt (nếu cần) v&agrave; để kh&ocirc; r&aacute;o ho&agrave;n to&agrave;n. Độ ẩm bề mặt phải &lt;16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Sửa chữa lại những khu vực bị hư hỏng. Nếu c&oacute; vết nứt lớn, cần được gia c&ocirc;ng lại v&agrave; l&agrave;m phẳng.</p>\r\n\r\n<p>- Sử dụng 1 lớp sơn l&oacute;t chuy&ecirc;n dụng TOA 4 Seasons Super Contact Sealer đối với bề mặt bị phấn h&oacute;a hay c&oacute; độ b&aacute;m d&iacute;nh k&eacute;m.</p>\r\n\r\n<p><strong>PHA TRỘN:&nbsp;</strong>Kh&ocirc;ng cần pha trộn với xi măng v&agrave; nước. Pha m&agrave;u trực tiếp bằng m&aacute;y pha m&agrave;u tự động.</p>\r\n\r\n<p><strong>THI C&Ocirc;NG:</strong>&nbsp;Ho&agrave;n thiện bằng 2 lớp TOA Waterblock Color.</p>\r\n\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n\r\n<p><strong>- KH&Ocirc;NG SỬ DỤNG BỘT TR&Eacute;T.</strong></p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điều kiện nhiệt độ kh&ocirc;ng kh&iacute; thấp hơn 15oC hoặc cao hơn 40oC.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện độ ẩm kh&ocirc;ng kh&iacute; vượt qu&aacute; 85%.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện nhiệt độ bề mặt cần sơn thấp hơn 3oC so với điểm tạo sương (dew-point) của kh&ocirc;ng kh&iacute;.</p>\r\n\r\n<p>- Khuấy kỹ trước khi sử dụng. N&ecirc;n sử dụng hết sau khi mở nắp th&ugrave;ng.</p>\r\n\r\n<p>- Đ&oacute;ng chặt nắp khi kh&ocirc;ng sử dụng.</p>', 2, '2022-04-06 21:58:15', '2022-11-13 05:48:44'),
(13, 'SƠN MASTIC KOVA 1221', 0, '6', 2, '<p>SƠN MASTIC DẺO KOVA MT KT5T là sơnch&ocirc;́ng th&acirc;́m đặc bi&ecirc;̣t có c&acirc;́u tạo từ nhựa Styrene Acrylic dùng đ&ecirc;̉ pha với xi măng, sử dụng c&ocirc;ng nghệ chống thấm của CHLB Đức c&oacute; khả năng Chống Thấm th&ocirc;ng minh: ngăn kh&ocirc;ng cho nước thấm từ b&ecirc;n ngo&agrave;i v&agrave;o, đồng thời hơi ẩm b&ecirc;n trong tường vẫn c&oacute; thể tho&aacute;t ra ngo&agrave;i theo những kẽ hở giữa c&aacute;c phần tử nhằm chống thấm hiệu quả và tăng đ&ocirc;̣ b&ecirc;̀n t&ocirc;́i đa cho b&ecirc;̀ mặt xi măng, c&acirc;́u trúc b&ecirc; t&ocirc;ng.<br />\r\nTOA Ch&ocirc;́ng Th&acirc;́m Đa Năng khác bi&ecirc;̣t với sơn ch&ocirc;́ng th&acirc;́m th&ocirc;ng thường nhờ tính năng vượt tr&ocirc;̣i:<br />\r\n* Ch&ocirc;́ng th&acirc;́m hoàn hảo g&acirc;́p 2 l&acirc;̀n<br />\r\n* Sử dụng cho N&ocirc;̣i &amp; Ngoại th&acirc;́t<br />\r\n* Ch&ocirc;́ng ki&ecirc;̀m hóa và n&acirc;́m m&ocirc;́c<br />\r\n* Màng sơn thoát &acirc;̉m d&ecirc;̃ dàng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649307495.jpg', 300000, NULL, 'Chất tạo màng, bột khoáng, nước', 'Theo catalogue', 'Bóng mờ', '41 ± 2 (%)', '1.25 – 1.35', '146 - 171 micron / lớp', '60 - 70 micron / lớp', 'tại 30oC', '7 ngày', 'sau 30 phút', '4.5 – 5.3 (m2/kg/lớp)', '120 phút', 'Cọ, Con lăn, Máy phun sơn thông thường', 'KHÔNG CẦN PHA LOÃNG', '<p><strong>CHUẨN BỊ BỀ MẶT:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt mới:</strong></li>\r\n</ul>\r\n\r\n<p>- Để kh&ocirc; bề mặt sau 28 ng&agrave;y trong điều kiện b&igrave;nh thường (nhiệt độ trung b&igrave;nh khoảng 30oC, độ ẩm tương đối 80%).</p>\r\n\r\n<p>- Độ ẩm bề mặt phải nhỏ hơn 16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Loại bỏ hết bụi bẩn, dầu mỡ khỏi bề mặt cần sơn.</p>\r\n\r\n<ul>\r\n	<li><strong>Bề mặt cũ:</strong></li>\r\n</ul>\r\n\r\n<p>- L&agrave;m sạch bề mặt loại bỏ bụi bẩn, lớp sơn cũ. Xử l&yacute; c&aacute;c bề mặt bị rong r&ecirc;u, nấm mốc bằng h&oacute;a chất th&iacute;ch hợp.</p>\r\n\r\n<p>- Rửa sạch bề mặt (nếu cần) v&agrave; để kh&ocirc; r&aacute;o ho&agrave;n to&agrave;n. Độ ẩm bề mặt phải &lt;16% (đo bằng Protimeter).</p>\r\n\r\n<p>- Sửa chữa lại những khu vực bị hư hỏng. Nếu c&oacute; vết nứt lớn, cần được gia c&ocirc;ng lại v&agrave; l&agrave;m phẳng.</p>\r\n\r\n<p>- Sử dụng 1 lớp sơn l&oacute;t chuy&ecirc;n dụng TOA 4 Seasons Super Contact Sealer đối với bề mặt bị phấn h&oacute;a hay c&oacute; độ b&aacute;m d&iacute;nh k&eacute;m.</p>\r\n\r\n<p><strong>PHA TRỘN:&nbsp;</strong>Kh&ocirc;ng cần pha trộn với xi măng v&agrave; nước. Pha m&agrave;u trực tiếp bằng m&aacute;y pha m&agrave;u tự động.</p>\r\n\r\n<p><strong>THI C&Ocirc;NG:</strong>&nbsp;Ho&agrave;n thiện bằng 2 lớp TOA Waterblock Color.</p>\r\n\r\n<p><strong>LƯU &Yacute;:</strong></p>\r\n\r\n<p><strong>- KH&Ocirc;NG SỬ DỤNG BỘT TR&Eacute;T.</strong></p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điều kiện nhiệt độ kh&ocirc;ng kh&iacute; thấp hơn 15oC hoặc cao hơn 40oC.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện độ ẩm kh&ocirc;ng kh&iacute; vượt qu&aacute; 85%.</p>\r\n\r\n<p>- Kh&ocirc;ng thi c&ocirc;ng trong điệu kiện nhiệt độ bề mặt cần sơn thấp hơn 3oC so với điểm tạo sương (dew-point) của kh&ocirc;ng kh&iacute;.</p>\r\n\r\n<p>- Khuấy kỹ trước khi sử dụng. N&ecirc;n sử dụng hết sau khi mở nắp th&ugrave;ng.</p>\r\n\r\n<p>- Đ&oacute;ng chặt nắp khi kh&ocirc;ng sử dụng.</p>', 2, '2022-04-06 21:58:15', '2022-11-13 04:52:13'),
(14, 'Sơn phủ jotun 222', 1, '1', 2, '<p>Sơn jotun chất lượng</p>', 3, '1649004422.jpg', 120000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-03 09:47:02', '2022-11-12 04:18:14'),
(15, 'Sơn Kova CN-02 chống rét', -35, '6', 2, '<p>Sơn kova&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 3, '1649005933.png', 220000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-03 10:12:13', '2022-11-23 14:27:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 'admin', '2022-04-03 05:12:49', '2022-04-03 05:12:49'),
(2, 'Collaboration', 'Cộng tác viên', '2022-05-28 21:12:46', '2022-05-28 21:12:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `product` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `storage`
--

INSERT INTO `storage` (`id`, `product`, `supplier`, `quantity`, `unit`, `price`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 4150, 2, 14000, '2022-11-12 06:50:47', '2022-11-23 16:41:15'),
(2, 8, 3, 4448, 2, 15000, '2022-11-12 06:50:47', '2022-11-23 17:16:25'),
(3, 2, 3, 5776, 2, 16000, '2022-11-12 06:50:47', '2022-11-24 02:06:03'),
(4, 1, 5, 1500, 2, 14000, '2022-11-12 08:30:24', '2022-11-23 13:40:41'),
(6, 3, 3, 7600, 2, 17000, '2022-11-13 03:31:11', '2022-11-13 03:31:11'),
(7, 7, 3, 8500, 2, 18000, '2022-11-13 03:31:11', '2022-11-13 03:31:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `ten` text DEFAULT NULL,
  `thuonghieu` int(11) DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `ten`, `thuonghieu`, `diachi`, `created_at`, `updated_at`) VALUES
(2, 'Hà Nam Giang', 2, '114 Lương Khánh Thiện, phường Cầu Đất, quận Ngô Quyền, TP.Hải Phòng', '2022-10-23 05:10:31', '2022-10-23 05:10:31'),
(3, 'ABKova', 6, '3 Lý Thường Kiệt, Ngô Quyền Hải Phòng', '2022-10-23 05:54:12', '2022-10-23 05:54:12'),
(4, 'MyLifeMCL', 3, '123 Ngô Gia Tự, Hải An,Hải Phòng', '2022-10-23 05:54:55', '2022-10-23 05:54:55'),
(5, 'DCJ1', 1, '115 Đà Nẵng, Máy Tơ, Ngô Quyền, Hải Phòng', '2022-10-23 05:55:30', '2022-11-13 07:42:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongkechi`
--

CREATE TABLE `thongkechi` (
  `id` int(11) NOT NULL,
  `nhacungcap` int(11) DEFAULT NULL,
  `tienchi` int(11) DEFAULT NULL,
  `ngaychi` date DEFAULT NULL,
  `phieunhap` int(11) DEFAULT NULL,
  `thua` int(11) DEFAULT NULL,
  `thieu` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongkechi`
--

INSERT INTO `thongkechi` (`id`, `nhacungcap`, `tienchi`, `ngaychi`, `phieunhap`, `thua`, `thieu`, `created_at`, `updated_at`) VALUES
(1, 3, 400000, '2022-11-11', 1, NULL, 5000000, '2022-11-11 12:44:28', '2022-11-11 12:44:28'),
(2, 3, 4000000, '2022-11-11', 1, NULL, 1000000, '2022-11-11 12:44:59', '2022-11-11 12:44:59'),
(3, 3, 1000000, '2022-11-23', 11, NULL, 4500000, '2022-11-23 08:43:16', '2022-11-23 08:43:16'),
(4, 3, 4000000, '2022-11-23', 11, NULL, 500000, '2022-11-23 08:44:32', '2022-11-23 08:44:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thumnails`
--

CREATE TABLE `thumnails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trademarks`
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
-- Đang đổ dữ liệu cho bảng `trademarks`
--

INSERT INTO `trademarks` (`id`, `name`, `introduce`, `logo`, `img_description`, `hotline`, `created_at`, `updated_at`) VALUES
(1, 'SƠN JOTUN', 'Sơn Jotun được sản xuất trên dây chuyền công nghệ hiện đại bậc nhất, hoàn toàn tự động từ khâu nạp liệu khép kín cho đến khâu đóng gói sản phẩm. Sản phẩm được sử dụng công nghệ Colourlock tiên tiến, các phân tử màu có liên kết hóa học siêu bền, không bị phân hủy bởi tia UV, cho màu sắc phong phú đa dạng và bền đẹp trong nhiều năm.', '1648997246.png', '1648997246.png', '0357845678', '2022-04-03 07:47:26', '2022-04-03 07:47:26'),
(2, 'Baris Color', 'Sơn Baris Color là  thương hiệu sơn nổi tiếng và được người tiêu dùng tin tưởng, yêu thích, nằm trong danh sách 10 công ty sơn hàng đầu có mặt tại Việt Nam hiện nay. Đến với sản phẩm sơn Bewin từ Be&C Việt Nam, cả một không gian Châu Âu đẳng cấp và sang trọng được mở ra trong không gian sống của bạn.', '1648997341.jpg', '1648997341.jpg', '0358878912', '2022-04-03 07:49:01', '2022-04-03 07:49:01'),
(3, 'MY COLOR', 'Sơn My Color là công ty sơn, thương hiệu sơn nổi tiếng và được người tiêu dùng tin tưởng, yêu thích, nằm trong danh sách 10 công ty sơn hàng đầu có mặt tại Việt Nam hiện nay. Đến với sản phẩm sơn Bewin từ Be&C Việt Nam, cả một không gian Châu Âu đẳng cấp và sang trọng được mở ra trong không gian sống của bạn.', '1648997505.svg', '1648997505.jpg', '0155678887', '2022-04-03 07:51:45', '2022-04-03 08:28:50'),
(6, 'KOVA', 'Sơn KOVA vượt qua các kiểm nghiệm chất lượng của TÜV SÜD PSB Singapore, đạt nhãn Green Label và được đưa vào HDB Listing của Bộ Phát triển nhà ở Singapore.\r\nSơn KOVA hiện được dùng cho hàng loạt các dự án từ khách sạn, trường học, bệnh viện, nhà máy, trung tâm thương mại, giao thông,… đặc biệt là nhiều công trình lớn như: Vivo City, tàu điện ngầm MRT, bệnh viện tỷ đô Ng Teng Fong,...', '1649261077.jpg', '1649261077.jpg', '1900636451', '2022-04-06 09:04:37', '2022-04-06 09:04:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuvan`
--

CREATE TABLE `tuvan` (
  `id` int(11) NOT NULL,
  `donhang` int(11) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `khach` int(11) DEFAULT NULL,
  `sanpham` int(11) DEFAULT NULL,
  `nguoituvan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tuvan`
--

INSERT INTO `tuvan` (`id`, `donhang`, `noidung`, `khach`, `sanpham`, `nguoituvan`, `created_at`, `updated_at`) VALUES
(1, 4, '<p>ok chưa</p>', 1, 2, 1, '2022-11-12 14:27:38', '2022-11-12 14:27:38'),
(2, 4, '<p>Anh nen chon loai A B c</p>', 2, 1, 1, '2022-11-23 08:30:08', '2022-11-23 08:30:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `units`
--

INSERT INTO `units` (`id`, `name`, `ma`, `created_at`, `updated_at`) VALUES
(2, 'Kg', 'kg', '2022-11-23 17:19:09', '2022-11-23 17:19:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaikhach` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `username`, `password`, `loaikhach`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nam Giang', NULL, '0494912354', NULL, NULL, '0494912354', '$2y$10$Fw0TIKYspQxM.cc.3et72ewqbWHD4xkmsaFuixb6GQXdoKmPTpyje', NULL, NULL, NULL, NULL),
(2, 'Bui Quang', NULL, '04554857812', NULL, NULL, '04554857812', '$2y$10$wSDFa5rpvzQ91vulPNU8heKSX2jOBFiotJLy5RcnUySkGmpWSuG3y', NULL, NULL, NULL, NULL),
(3, 'Lữ Phụng Tiên', 'pt@gmail.com', '0357855646', 'HP', NULL, '0357855646', '$2y$10$tm6.XfP2rTcRK2/WLUkg5Oc6bpb23y5i9u4yOSF6ke6/G9UT26x4.', NULL, NULL, '2022-11-13 03:20:10', '2022-11-13 03:24:29'),
(4, 'Bùi Anh Đức', NULL, '04554857132', NULL, NULL, '04554857132', '$2y$10$ot0QOra0lLOoB5w5L5jhJOcb9amSPIdE1k5JnrPlnDD.aaFR5GZE.', NULL, NULL, NULL, NULL),
(5, 'Huyền Đức', NULL, '03454544554', NULL, NULL, '03454544554', '$2y$10$YvMqTnK9ggUDNg.i6MeNPeYv3sroXPAtUSIDfWu6y7rcagi9MjWIe', NULL, NULL, NULL, NULL),
(6, 'Hoàng', NULL, '023135153', NULL, NULL, '023135153', '$2y$10$.ezyyYAXM9WSKCYaS5Zj/.cEGOUm19x16n6BDWpytKw4cYQSLmdFq', NULL, NULL, NULL, NULL),
(7, 'Vũ vượng', NULL, '0231531538153', NULL, NULL, '0231531538153', '$2y$10$PfKGI7tHx.IymBUDYdhAfuu5eP0wWa3t8wDQ3HrxxYIaIXX7DMNh2', NULL, NULL, NULL, NULL),
(8, 'Minh Anh', NULL, '023135153135', NULL, NULL, '023135153135', '$2y$10$C8MF6j.SxlsReXNpABc6geN8CrH44hG.4e0OMdEWwoC.nkdZHwB/u', NULL, NULL, NULL, NULL),
(9, 'Minh Đức', NULL, '0230531355', NULL, NULL, '0230531355', '$2y$10$xG20PlebS.Lzlpf1Mlwez.K30BrE/AnMA8uNtpoOlA/UpfdiiJAya', NULL, NULL, NULL, NULL),
(10, 'Minh Đức`', NULL, '0231354345', NULL, NULL, '0231354345', '$2y$10$a8fTuBcuqOkDzy67ORSmOufglHymo/7mbXVG5f.WQwroWWNI4UUwK', NULL, NULL, NULL, NULL),
(11, 'Huỳnh Đức', NULL, '0231354553', NULL, NULL, '0231354553', '$2y$10$s7BTlQ/9iL5lEq6Hdix7IOkVP7jS2U0wfv3DcaKYMo9kHfdMD064e', NULL, NULL, NULL, NULL),
(12, 'Vũ Anh', NULL, '032513541232', NULL, NULL, '032513541232', '$2y$10$cVfpLvdqzQjwtEg3NX9nOu7Nuu5v9TX11hzcFE1FED3Ic5mP48.IG', NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `cancels`
--
ALTER TABLE `cancels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_colors`
--
ALTER TABLE `category_colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaikhach`
--
ALTER TABLE `loaikhach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongkechi`
--
ALTER TABLE `thongkechi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thumnails`
--
ALTER TABLE `thumnails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuvan`
--
ALTER TABLE `tuvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cancels`
--
ALTER TABLE `cancels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category_colors`
--
ALTER TABLE `category_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `exports`
--
ALTER TABLE `exports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `imports`
--
ALTER TABLE `imports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `loaikhach`
--
ALTER TABLE `loaikhach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thongkechi`
--
ALTER TABLE `thongkechi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thumnails`
--
ALTER TABLE `thumnails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tuvan`
--
ALTER TABLE `tuvan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
