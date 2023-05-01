-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2023 lúc 04:35 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `toyshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_Name`) VALUES
(1, 'yyytswr');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `CUS_ID` int(11) NOT NULL,
  `CUS_Name` varchar(50) NOT NULL,
  `CUS_Username` varchar(50) NOT NULL,
  `CUS_Password` varchar(200) NOT NULL,
  `CUS_Email` varchar(100) NOT NULL,
  `CUS_Phone` varchar(20) NOT NULL,
  `CUS_Address` text NOT NULL,
  `CUS_Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`CUS_ID`, `CUS_Name`, `CUS_Username`, `CUS_Password`, `CUS_Email`, `CUS_Phone`, `CUS_Address`, `CUS_Role`) VALUES
(155101, 'Gialap Duong', 'gialap', '202cb962ac59075b964b07152d234b70', 'gialap000@gmail.com', '0919636851', 'Anphu, Angiang, Vietnam', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `ORD_ID` int(11) NOT NULL,
  `OR_ID` int(11) NOT NULL,
  `PRO_ID` int(11) NOT NULL,
  `ORD_Price` double NOT NULL,
  `ORD_Quantily` int(11) NOT NULL,
  `ORD_Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OR_ID` int(11) NOT NULL,
  `OR_Date` date NOT NULL,
  `OR_Delivery` date NOT NULL,
  `OR_Address` text NOT NULL,
  `OR_Total` double NOT NULL,
  `CUS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OR_ID`, `OR_Date`, `OR_Delivery`, `OR_Address`, `OR_Total`, `CUS_ID`) VALUES
(982063, '2023-05-01', '2023-05-21', 'Anphu, Angiang, Vietnam', 4650000, 155101);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `PRO_ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `PRO_Name` varchar(40) NOT NULL,
  `PRO_Images` varchar(50) NOT NULL,
  `PRO_Description` text NOT NULL,
  `PRO_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`PRO_ID`, `CAT_ID`, `PRO_Name`, `PRO_Images`, `PRO_Description`, `PRO_Price`) VALUES
(1, 1, 'Barbatos lupux red ', 'IMG_6239.JPG', 'VICTORY 2 ASSAULT BUSTER GUNDAM (HGUC - 1/144)', 1550000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUS_ID`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`ORD_ID`),
  ADD KEY `OR_ID` (`OR_ID`),
  ADD KEY `PRO_ID` (`PRO_ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OR_ID`),
  ADD KEY `CUS_ID` (`CUS_ID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRO_ID`),
  ADD KEY `CAT_ID` (`CAT_ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `OR_ID` FOREIGN KEY (`OR_ID`) REFERENCES `orders` (`OR_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRO_ID` FOREIGN KEY (`PRO_ID`) REFERENCES `products` (`PRO_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `CUS_ID` FOREIGN KEY (`CUS_ID`) REFERENCES `customer` (`CUS_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CAT_ID`) REFERENCES `category` (`CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
