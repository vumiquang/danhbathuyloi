-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2021 lúc 11:23 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_danhba_thuyloi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `user`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'root', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_canbo`
--

CREATE TABLE `tb_canbo` (
  `id` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `chucvu` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `didong` varchar(50) DEFAULT NULL,
  `madonvi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_canbo`
--

INSERT INTO `tb_canbo` (`id`, `hoten`, `chucvu`, `email`, `didong`, `madonvi`) VALUES
(1, 'Trần Văn Thịnh', 'Giảng viên', 'tvthinh@gmail.com', '0315454545', 'DB'),
(9, 'Đỗ Lân', 'Phó BM', 'dolan@gmail.com', '07777777777', 'toan'),
(10, 'Nguyễn Thanh Tùng', 'Trưởng khoa', 'ntt@gmail.com', '0999999999', 'vpk'),
(11, 'Nguyễn Khánh Linh', 'Trợ lý khoa', 'linh@gmail.com', '087878787878', 'vpk'),
(12, 'Nguyễn Hữu Thọ', 'Trưởng BM', 'nht@gmail.com', '014567878778', 'toan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_donvi`
--

CREATE TABLE `tb_donvi` (
  `id` int(11) NOT NULL,
  `tendonvi` varchar(50) NOT NULL,
  `sdt` varchar(50) DEFAULT NULL,
  `madonvi` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_donvi`
--

INSERT INTO `tb_donvi` (`id`, `tendonvi`, `sdt`, `madonvi`, `website`, `diachi`) VALUES
(2, 'Đường bộ', '099999999999', 'DB', NULL, NULL),
(19, 'BM Toán', '03245454545', 'toan', 'toan@tlu.edu.vn', 'p204'),
(20, 'Văn phòng khoa', '0555555555', 'vpk', 'vpk@tlu.edu.vn', 'p305');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_canbo`
--
ALTER TABLE `tb_canbo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `madonvi` (`madonvi`);

--
-- Chỉ mục cho bảng `tb_donvi`
--
ALTER TABLE `tb_donvi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `madonvi` (`madonvi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tb_canbo`
--
ALTER TABLE `tb_canbo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tb_donvi`
--
ALTER TABLE `tb_donvi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_canbo`
--
ALTER TABLE `tb_canbo`
  ADD CONSTRAINT `madonvi` FOREIGN KEY (`madonvi`) REFERENCES `tb_donvi` (`madonvi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
