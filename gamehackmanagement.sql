-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2024 lúc 11:36 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gamehackmanagement`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `download`
--

CREATE TABLE `download` (
  `download_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `download_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `download`
--

INSERT INTO `download` (`download_id`, `user_id`, `file_id`, `download_date`) VALUES
(1, 9, 1, '2024-12-01 07:31:23'),
(2, 9, 13, '2024-12-01 07:31:32'),
(3, 9, 1, '2024-12-01 07:33:41'),
(4, 9, 13, '2024-12-01 07:37:07'),
(5, 9, 1, '2024-12-01 07:38:49'),
(6, 9, 1, '2024-12-01 07:45:38'),
(7, 9, 44, '2024-12-01 07:45:41'),
(8, 9, 34, '2024-12-01 08:06:01'),
(9, 9, 43, '2024-12-01 08:06:04'),
(10, 9, 45, '2024-12-01 08:06:06'),
(11, 9, 46, '2024-12-01 08:06:10'),
(12, 9, 34, '2024-12-01 08:07:40'),
(13, 9, 34, '2024-12-01 08:12:00'),
(14, 9, 34, '2024-12-01 08:14:13'),
(15, 9, 34, '2024-12-01 08:15:59'),
(16, 9, 34, '2024-12-01 08:16:55'),
(17, 9, 1, '2024-12-01 08:17:46'),
(18, 9, 13, '2024-12-01 08:17:51'),
(19, 9, 44, '2024-12-01 08:19:52'),
(20, 9, 13, '2024-12-01 08:22:30'),
(21, 9, 13, '2024-12-01 08:22:43'),
(22, 9, 13, '2024-12-01 08:26:21'),
(23, 9, 44, '2024-12-01 08:26:58'),
(24, 9, 44, '2024-12-01 08:31:02'),
(25, 9, 44, '2024-12-01 08:31:06'),
(26, 9, 44, '2024-12-01 08:32:58'),
(27, 9, 44, '2024-12-01 08:32:59'),
(28, 9, 44, '2024-12-01 08:32:59'),
(29, 9, 13, '2024-12-01 08:33:02'),
(30, 9, 13, '2024-12-01 08:33:30'),
(31, 9, 13, '2024-12-01 08:33:34'),
(32, 9, 13, '2024-12-01 08:34:06'),
(33, 9, 13, '2024-12-01 08:34:07'),
(34, 9, 13, '2024-12-01 08:34:10'),
(35, 9, 13, '2024-12-01 08:47:27'),
(36, 9, 13, '2024-12-01 08:49:24'),
(37, 9, 13, '2024-12-01 08:50:28'),
(38, 9, 13, '2024-12-01 08:54:44'),
(39, 9, 13, '2024-12-01 08:54:46'),
(40, 9, 13, '2024-12-01 08:54:51'),
(41, 9, 13, '2024-12-01 08:55:58'),
(42, 9, 13, '2024-12-01 08:55:59'),
(43, 9, 13, '2024-12-01 08:55:59'),
(44, 9, 13, '2024-12-01 08:55:59'),
(45, 9, 13, '2024-12-01 08:55:59'),
(46, 9, 13, '2024-12-01 08:56:00'),
(47, 9, 13, '2024-12-01 08:56:03'),
(48, 9, 13, '2024-12-01 08:57:29'),
(49, 9, 13, '2024-12-01 08:58:22'),
(50, 9, 13, '2024-12-01 08:58:25'),
(51, 9, 13, '2024-12-01 08:58:56'),
(52, 9, 13, '2024-12-01 08:58:59'),
(53, 9, 13, '2024-12-01 08:59:26'),
(54, 9, 13, '2024-12-01 08:59:46'),
(55, 9, 13, '2024-12-01 08:59:55'),
(56, 9, 13, '2024-12-01 09:00:14'),
(57, 9, 13, '2024-12-01 09:01:54'),
(58, 9, 13, '2024-12-01 09:02:01'),
(59, 9, 13, '2024-12-01 09:03:04'),
(60, 9, 13, '2024-12-01 09:03:08'),
(61, 9, 13, '2024-12-01 09:07:30'),
(62, 9, 13, '2024-12-01 09:07:42'),
(63, 9, 13, '2024-12-01 09:07:56'),
(64, 9, 13, '2024-12-01 09:08:33'),
(65, 9, 1, '2024-12-01 09:08:51'),
(66, 9, 34, '2024-12-01 09:09:06'),
(67, 9, 34, '2024-12-01 09:41:04'),
(68, 9, 34, '2024-12-01 09:41:43'),
(69, 9, 2, '2024-12-01 09:52:50'),
(70, 9, 43, '2024-12-01 09:53:06'),
(71, 9, 43, '2024-12-01 09:57:45'),
(72, 9, 34, '2024-12-01 09:57:49'),
(73, 9, 34, '2024-12-01 10:18:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `VERSION` varchar(20) DEFAULT NULL,
  `developer` varchar(100) DEFAULT NULL,
  `the_loai` varchar(500) DEFAULT NULL,
  `download_count` int(11) DEFAULT 0,
  `link_file` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `file`
--

INSERT INTO `file` (`file_id`, `file_name`, `description`, `image`, `VERSION`, `developer`, `the_loai`, `download_count`, `link_file`, `created_at`) VALUES
(1, 'Test Hack Tool', 'Description of test file', 'https://cdn.jsdelivr.net/gh/tiptipios/ios@main/photo_2024-09-26_13-30-09.jpg', '1.0', 'Test Dev', 'ios', 6, 'https://cdn.jsdelivr.net/gh/tiptipios/ios@main/photo_2024-09-26_13-30-09.jpg', '2024-11-29 08:03:05'),
(2, 'Liên quân', 'Hack Map', 'https://cdn.glitch.global/a5da2f18-878d-4722-b1ad-5ae2f04638f8/f399da84-52b5-4dfc-82bb-b3a99ce8ce72.image.png?v=1681997379317%27', 'V1', 'TipTip', 'Android\r\n', 1, 'https://3link.co/Naj3nphxX9A', '2024-11-30 15:46:32'),
(13, 'Liên quân', 'Hack Map', 'https://cdn.glitch.global/a5da2f18-878d-4722-b1ad-5ae2f04638f8/f399da84-52b5-4dfc-82bb-b3a99ce8ce72.image.png?v=1681997379317%27', 'V1', 'TipTip', 'ios', 43, 'https://3link.co/Naj3nphxX9A', '2024-11-30 15:59:48'),
(34, 'Obey Me NB Ikemen Otome', ' ✅Auto Tap ✅ Custom Notes* ✅ Perfect => 0 ✅ Great => 1 ✅ Nice => 2', 'https://is1-ssl.mzstatic.com/image/thumb/Purple211/v4/ec/52/d6/ec52d616-4d81-b07b-d733-354c0564d0cf/AppIcon-0-0-1x_U007emarketing-0-7-0-85-220.png/100x100bb.jpg', '9.0', 'TipTip', 'Android', 13, 'https://3link.co/Naj3nphxX9A', '2024-12-01 06:26:01'),
(43, 'Free Fire', 'Aim Bot', 'https://cdn.jsdelivr.net/gh/tiptipios/ios@main/IMG_9654.jpeg', 'V5', 'Tip Tip', 'android', 3, 'https://3link.co/6ZMbi', '2024-12-01 06:49:12'),
(44, 'Free Fire', 'Aim Bot', 'https://cdn.jsdelivr.net/gh/tiptipios/ios@main/IMG_9654.jpeg', 'V5', 'Tip Tip', 'ios', 8, 'https://3link.co/6ZMbi', '2024-12-01 06:59:21'),
(45, 'GTA', 'mod', 'https://tiptipios.github.io/chanthuhoi/index/IMG_9525.jpeg', '8.0', 'TipTip', 'Android', 1, 'https://3link.co/6ZMbi', '2024-12-01 07:01:07'),
(46, 'shadow Knight ', 'Never Die - High Damage - Always Win (PVP)', 'https://is1-ssl.mzstatic.com/image/thumb/Purple221/v4/46/98/9a/46989a58-cde6-1370-eea5-c99ad403a946/AppIcon-1x_U007emarketing-0-7-0-85-220-0.png/100x100bb.jpg', '5.7', 'TipTip', 'Android', 1, 'https://3link.co/6ZMbi', '2024-12-01 07:12:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(9, 'son', '1', 'nguyenxuanson282003@gmail.com', 'user', '2024-11-30 05:33:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`download_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Chỉ mục cho bảng `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `download`
--
ALTER TABLE `download`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `download`
--
ALTER TABLE `download`
  ADD CONSTRAINT `download_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `download_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `file` (`file_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
