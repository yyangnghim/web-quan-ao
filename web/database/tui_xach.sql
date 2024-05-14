-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 02:34 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tui_xach`
--
CREATE DATABASE IF NOT EXISTS `tui_xach` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tui_xach`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `don_hang_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `don_hang_id`, `san_pham_id`, `so_luong`) VALUES
(1, 1, 13, 1),
(2, 2, 24, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_danh_muc`) VALUES
(1, 'Túi xách nam'),
(2, 'Túi xách nữ'),
(3, 'Túi xách thời trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `user_id`, `tong_tien`) VALUES
(1, 2, 1903320),
(2, 2, 3998000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `id` int(11) NOT NULL,
  `ten_tai_khoan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `chu_de` varchar(100) NOT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lien_he`
--

INSERT INTO `lien_he` (`id`, `ten_tai_khoan`, `email`, `so_dien_thoai`, `chu_de`, `noi_dung`) VALUES
(1, 'Đức Duy', 'ducduy@gmail.com', '0912849506', 'sướng', 'sướng'),
(2, 'Đức Duy', 'ducduy@gmail.com', '0912849506', 'sướng', 's');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(100) NOT NULL,
  `gia_tien` int(11) NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `anh_san_pham` varchar(30) NOT NULL,
  `danh_muc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `gia_tien`, `giam_gia`, `anh_san_pham`, `danh_muc`) VALUES
(1, 'Túi xách nữ cao cấp da thật ELLY – ET82', 1399000, 50, 'pro_1.jpg', 2),
(2, 'Túi xách nữ cao cấp da thật ELLY – ET54', 2199000, 50, 'pro_2.jpg', 2),
(3, 'Túi clutch nữ cao cấp da thật ELLY – EC18', 899000, 49, 'pro_3.jpg', 2),
(4, 'Túi xách nữ thời trang cao cấp ELLY – EL65', 1300000, 10, 'pro_4.jpg', 2),
(5, 'Túi xách nữ cao cấp da thật ELLY – ET61', 1860000, 0, 'pro_5.jpg', 2),
(6, 'Túi xách nữ thời trang cao cấp ELLY – EL2', 1299000, 46, 'pro_6.jpg', 2),
(7, 'Túi xách nữ thời trang cao cấp ELLY – EL78', 1260000, 45, 'pro_7.jpg', 2),
(8, 'Túi xách nữ cao cấp da thật ELLY – ET63', 1699000, 41, 'pro_8.jpg', 2),
(9, 'Túi clutch nữ cao cấp da thật ELLY – EC4', 1999000, 0, 'pro_9.jpg', 2),
(10, 'Túi xách nữ thời trang cao cấp ELLY – EL47', 1008000, 0, 'pro_10.jpg', 2),
(11, 'Túi xách nam da thật ELLY HOMME – ETM14', 2399000, 41, 'pro_11.jpg', 1),
(12, 'Túi xách nam da thật ELLY HOMME – ETM11', 2699000, 33, 'pro_12.jpg', 1),
(13, 'Túi xách nam da thật ELLY HOMME – ETM16', 2799000, 32, 'pro_13.jpg', 1),
(14, 'Túi xách nam da thật ELLY HOMME – ETM6', 2699000, 0, 'pro_14.jpg', 1),
(15, 'Túi xách nam da thật ELLY HOMME – ETM15', 3999000, 0, 'pro_15.jpg', 1),
(16, 'Túi clutch nam da thật ELLY HOMME – ECM14', 2299000, 0, 'pro_16.jpg', 1),
(17, 'Túi xách nam cao cấp da thật ELLY- ETM20', 2099000, 0, 'pro_17.jpg', 1),
(18, 'Túi clutch nam da thật ELLY HOMME – ECM17', 2099000, 0, 'pro_18.jpg', 1),
(19, 'Túi xách nam cao cấp da thật ELLY- ETM21', 1899000, 0, 'pro_19.jpg', 1),
(20, 'Túi clutch nam da thật ELLY HOMME – ECM19', 2299000, 0, 'pro_20.jpg', 1),
(21, 'Túi xách nữ thời trang ELLY – EL284', 1199000, 0, 'pro_21.jpg', 3),
(22, 'Túi clutch nữ thời trang ELLY – ECH67', 699000, 0, 'pro_22.jpg', 3),
(23, 'Túi xách nữ thời trang ELLY – EL285', 1299000, 0, 'pro_23.jpg', 3),
(24, 'Túi xách nữ thời trang ELLY – EL286', 1999000, 0, 'pro_24.jpg', 3),
(25, 'Túi xách nữ thời trang ELLY – EL267', 1860000, 0, 'pro_25.jpg', 3),
(26, 'Túi xách nữ thời trang ELLY – EL265', 1099000, 20, 'pro_26.jpg', 3),
(27, 'Túi xách nữ thời trang ELLY – EL268', 1399000, 0, 'pro_27.jpg', 3),
(28, 'Túi xách nữ thời trang ELLY – EL266', 699000, 0, 'pro_28.jpg', 3),
(29, 'Túi xách nữ thời trang ELLY – EL269', 2799000, 0, 'pro_29.jpg', 3),
(30, 'Túi xách nữ thời trang ELLY – EL246', 2699000, 0, 'pro_30.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `ten_tai_khoan` varchar(50) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mat_khau` varchar(20) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `dia_chi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `ten_tai_khoan`, `ten_dang_nhap`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`) VALUES
(1, 'Đức Duy', 'ducduy123', 'ducduy@gmail.com', '123', '0912849506', 'Hà Nội'),
(2, 'Đức Hiếu', 'duchiu123', 'duchiu123@gmail.com', '123', '0912456789', 'Hà Nội'),
(3, 'test123', 'test123', 'test123@gmail.com', '123', '0912345678', 'Hà Nội'),
(6, 'test', 'test', 'test1@gmail.com', '123', '0912456789', 'Hà Nội'),
(7, 'test321', 'test321', 'test321@gmail.com', '123', '0912456789', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_san_pham`
--

CREATE TABLE `thong_tin_san_pham` (
  `id` int(11) NOT NULL,
  `san_xuat` varchar(100) NOT NULL DEFAULT 'Trung Quốc',
  `mau_sac` varchar(30) NOT NULL,
  `chat_lieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_san_pham`
--

INSERT INTO `thong_tin_san_pham` (`id`, `san_xuat`, `mau_sac`, `chat_lieu`) VALUES
(1, 'Trung Quốc', 'Đen', 'Da bò cao cấp nhập khẩu'),
(2, 'Trung Quốc', 'Nâu', 'Da bò cao cấp'),
(3, 'Trung Quốc', 'Đen', 'Da bò cao cấp'),
(4, 'Trung Quốc', 'Nâu', 'Da tổng hợp cao cấp nhập khẩu bóng đẹp, chống thấm tốt, chống bám bụi, bền bỉ với thời gian. Từng đường may mũi chỉ tinh tế, đều nhau trên bề mặt da giúp tăng sự bền đẹp của sản phẩm'),
(5, 'Trung Quốc', 'Nâu', 'Da bò cao cấp nhập khẩu mềm mịn, bóng đẹp, chống thấm nước, ẩm mốc, bám bụi với vân da tự nhiên và chất lượng bền bỉ lâu dài với thời gian'),
(6, 'Trung Quốc', 'Đen', 'Da thật cao cấp nhập khẩu'),
(7, 'Trung Quốc', 'Đen', 'Da thật cao cấp nhập khẩu'),
(8, 'Trung Quốc', 'Đen', 'Da thật cao cấp nhập khẩu'),
(9, 'Trung Quốc', 'Đen', 'Da thật cao cấp nhập khẩu'),
(10, 'Trung Quốc', 'Đen', 'Da thật cao cấp nhập khẩu'),
(11, 'Trung Quốc', 'Đen', 'Da thật cao cấp'),
(12, 'Trung Quốc', 'Đen', 'Da thật cao cấp'),
(13, 'Trung Quốc', 'Đen', 'Da thật cao cấp'),
(14, 'Trung Quốc', 'Đen', 'Da thật cao cấp'),
(15, 'Trung Quốc', 'Nâu', 'Da thật cao cấp'),
(16, 'Trung Quốc', 'Đen', 'Da thật cao cấp'),
(17, 'Trung Quốc', 'Đen', 'Da thật cao cấp'),
(18, 'Trung Quốc', 'Xanh', 'Da thật cao cấp'),
(19, 'Trung Quốc', 'Xanh', 'Da thật cao cấp'),
(20, 'Trung Quốc', 'Đen', 'Da thật cao cấp'),
(21, 'Trung Quốc', 'Nâu', 'Da tổng hợp cao cấp, mây tre đan'),
(22, 'Trung Quốc', 'Nâu', 'Da tổng hợp cao cấp, tre trúc đa'),
(23, 'Trung Quốc', 'Đen', 'Da tổng hợp cao cấp, tre trúc đa'),
(24, 'Trung Quốc', 'Nâu', 'Da tổng hợp cao cấp, tre trúc đa'),
(25, 'Trung Quốc', 'Đen', 'Da tổng hợp cao cấp'),
(26, 'Trung Quốc', 'Hồng', 'Da tổng hợp cao cấp'),
(27, 'Trung Quốc', 'Hồng', 'Da tổng hợp cao cấp'),
(28, 'Trung Quốc', 'Hồng', 'Da tổng hợp cao cấp'),
(29, 'Trung Quốc', 'Trắng', 'Da tổng hợp cao cấp'),
(30, 'Trung Quốc', 'Trắng', 'Da tổng hợp cao cấp');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc` (`danh_muc`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- Chỉ mục cho bảng `thong_tin_san_pham`
--
ALTER TABLE `thong_tin_san_pham`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tai_khoan` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`danh_muc`) REFERENCES `danh_muc` (`id`);

--
-- Các ràng buộc cho bảng `thong_tin_san_pham`
--
ALTER TABLE `thong_tin_san_pham`
  ADD CONSTRAINT `thong_tin_san_pham_ibfk_1` FOREIGN KEY (`id`) REFERENCES `san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
