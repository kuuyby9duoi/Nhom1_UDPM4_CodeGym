-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 18, 2020 lúc 03:34 PM
-- Phiên bản máy phục vụ: 10.2.32-MariaDB-cll-lve
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `upfileco_codegym`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_user` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl_mua` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ghi lại thông tin khách hàng thêm vào giỏ hàng của mình';

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_user`, `id_product`, `sl_mua`, `coupon_code`) VALUES
('39', 'C06 C02 C03', '3 2 1', '0'),
('41', 'C02', '1', '0'),
('42', 'B01', '10', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl_mua` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship` int(11) NOT NULL,
  `coupon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(15) NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_user`, `id_product`, `sl_mua`, `ship`, `coupon`, `total`, `name`, `phone`, `email`, `address`, `note`, `status`) VALUES
(66, 42, 'B01', '10', 30000, '0', 1700000, 'Lã Gia Bách', 363810949, 'lagiabach1610@gmail.com', 'Thành phố Hà Nội', 'edsasđfád', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quequan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hobby` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `gender`, `address`, `quequan`, `phone`, `email`, `hobby`, `admin`, `password`, `salt`, `path_avatar`) VALUES
(2, 'vũ lê nguyên', 'Nam', '21', 'Tỉnh Bắc Kạn', 121, '121@a.s', 'Cà khịa', 'true', '12345', '', ''),
(36, '1', 'Nam', 'Tỉnh Bắc Ninh', '', 32154156, '1@a.a', 'Cà khịa', 'false', '12345', '', 'upload/defaut.webp'),
(37, 'hehe', 'Nữ', 'Tỉnh Hà Giang', '', 369918375, 'bibi@hehe.club.com', 'Cà khịa', 'false', '12345', '', 'upload/defaut.webp'),
(39, 'Trịnh Sỹ Dự', 'Nam', 'Alley 99, Goc De Lane, Hoang Mai District, Hanoi $conn->error', 'Tỉnh Thanh Hóa', 369918375, 'admin@trinhsydu.com', 'thích nhiều thứ nhưng đôi lúc đéo cần', 'true', 'c777df2a7c1128009c7d43dc98491555', '1e553533e2d02fdc04300fe3d2b62c74', 'upload/FB_IMG_1548676686648.jpg'),
(40, 'TSD pro', 'Nam', 'Tỉnh Bắc Kạn', 'Việt Nam', 366666666, 'kuuyby9duoi@mail.ru', 'Cà khịa', 'false', '8c7f03bf36177dbd5c48a33601434ba7', 'f6d6da00f04ab7b2695df0381a3a8def', 'upload/defaut.webp'),
(41, 'anh', 'Nam', 'Tỉnh Vĩnh Phúc', 'Việt Nam', 252055, 'anh@gmail.com', 'Cà khịa', 'false', 'a842541151a82000a195a45a6d425fdc', 'fa8129d2538a99018b84f15bdd899693', 'upload/defaut.webp'),
(42, 'Lã Gia Bách', 'Nam', 'Thành phố Hà Nội', 'Việt Nam', 363810949, 'lagiabach1610@gmail.com', 'Cà khịa', 'false', 'efe122d964dea6deb7467ec9187e293e', 'a3c92375a0068482289170f5d76e4831', 'upload/defaut.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quequan`
--

CREATE TABLE `quequan` (
  `id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `quequan`
--

INSERT INTO `quequan` (`id`, `address`, `type`) VALUES
('01', 'Thành phố Hà Nội', 'Thành phố Trung ương'),
('02', 'Tỉnh Hà Giang', 'Tỉnh'),
('04', 'Tỉnh Cao Bằng', 'Tỉnh'),
('06', 'Tỉnh Bắc Kạn', 'Tỉnh'),
('08', 'Tỉnh Tuyên Quang', 'Tỉnh'),
('10', 'Tỉnh Lào Cai', 'Tỉnh'),
('11', 'Tỉnh Điện Biên', 'Tỉnh'),
('12', 'Tỉnh Lai Châu', 'Tỉnh'),
('14', 'Tỉnh Sơn La', 'Tỉnh'),
('15', 'Tỉnh Yên Bái', 'Tỉnh'),
('17', 'Tỉnh Hoà Bình', 'Tỉnh'),
('19', 'Tỉnh Thái Nguyên', 'Tỉnh'),
('20', 'Tỉnh Lạng Sơn', 'Tỉnh'),
('22', 'Tỉnh Quảng Ninh', 'Tỉnh'),
('24', 'Tỉnh Bắc Giang', 'Tỉnh'),
('25', 'Tỉnh Phú Thọ', 'Tỉnh'),
('26', 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
('27', 'Tỉnh Bắc Ninh', 'Tỉnh'),
('30', 'Tỉnh Hải Dương', 'Tỉnh'),
('31', 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
('33', 'Tỉnh Hưng Yên', 'Tỉnh'),
('34', 'Tỉnh Thái Bình', 'Tỉnh'),
('35', 'Tỉnh Hà Nam', 'Tỉnh'),
('36', 'Tỉnh Nam Định', 'Tỉnh'),
('37', 'Tỉnh Ninh Bình', 'Tỉnh'),
('38', 'Tỉnh Thanh Hóa', 'Tỉnh'),
('40', 'Tỉnh Nghệ An', 'Tỉnh'),
('42', 'Tỉnh Hà Tĩnh', 'Tỉnh'),
('44', 'Tỉnh Quảng Bình', 'Tỉnh'),
('45', 'Tỉnh Quảng Trị', 'Tỉnh'),
('46', 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
('48', 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
('49', 'Tỉnh Quảng Nam', 'Tỉnh'),
('51', 'Tỉnh Quảng Ngãi', 'Tỉnh'),
('52', 'Tỉnh Bình Định', 'Tỉnh'),
('54', 'Tỉnh Phú Yên', 'Tỉnh'),
('56', 'Tỉnh Khánh Hòa', 'Tỉnh'),
('58', 'Tỉnh Ninh Thuận', 'Tỉnh'),
('60', 'Tỉnh Bình Thuận', 'Tỉnh'),
('62', 'Tỉnh Kon Tum', 'Tỉnh'),
('64', 'Tỉnh Gia Lai', 'Tỉnh'),
('66', 'Tỉnh Đắk Lắk', 'Tỉnh'),
('67', 'Tỉnh Đắk Nông', 'Tỉnh'),
('68', 'Tỉnh Lâm Đồng', 'Tỉnh'),
('70', 'Tỉnh Bình Phước', 'Tỉnh'),
('72', 'Tỉnh Tây Ninh', 'Tỉnh'),
('74', 'Tỉnh Bình Dương', 'Tỉnh'),
('75', 'Tỉnh Đồng Nai', 'Tỉnh'),
('77', 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
('79', 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
('80', 'Tỉnh Long An', 'Tỉnh'),
('82', 'Tỉnh Tiền Giang', 'Tỉnh'),
('83', 'Tỉnh Bến Tre', 'Tỉnh'),
('84', 'Tỉnh Trà Vinh', 'Tỉnh'),
('86', 'Tỉnh Vĩnh Long', 'Tỉnh'),
('87', 'Tỉnh Đồng Tháp', 'Tỉnh'),
('89', 'Tỉnh An Giang', 'Tỉnh'),
('91', 'Tỉnh Kiên Giang', 'Tỉnh'),
('92', 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
('93', 'Tỉnh Hậu Giang', 'Tỉnh'),
('94', 'Tỉnh Sóc Trăng', 'Tỉnh'),
('95', 'Tỉnh Bạc Liêu', 'Tỉnh'),
('96', 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produc_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `old_price` int(11) DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` int(4) DEFAULT NULL,
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_lieu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xuatxu` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baohanh` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_thuong_goi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_khoa_hoc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_goi_khac` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nguon_goc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dac_diem` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giao_hang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `danh_gia` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_mua` int(3) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`name`, `produc_id`, `category`, `money`, `old_price`, `description`, `in_stock`, `weight`, `size`, `chat_lieu`, `xuatxu`, `baohanh`, `ten_thuong_goi`, `ten_khoa_hoc`, `ten_goi_khac`, `nguon_goc`, `dac_diem`, `giao_hang`, `ho`, `danh_gia`, `max_mua`, `picture`) VALUES
('Cây Dây Nhện', 'B01', 'Cây mini', 170000, 170000, 'có khả năng hấp thụ tới 85% lượng khí Formaldehyde độc hại trong không khí xung quanh nó…', 20, '500g', '30cm x 40cm', ' ', ' ', ' ', 'Cây Dây Nhện', 'Chlorophytum Comosum', 'Cỏ Lan Chi', 'việt nam', 'dễ trồng', 'giao nhanh', ' ', '5 sao', 30, 'img/produc/10.webp '),
('Cây Hồng Môn Thủy Sinh', 'B02', 'Cây trong nhà', 220000, 300000, 'vẻ đẹp và những ý nghĩa may mắn, tốt lành cây thường được đặt trong phòng khách, cửa hàng, phòng làm việc.', 30, '500g', '30cm x 50cm', ' ', ' ', ' ', 'Cây Hồng Môn Thủy Sinh', 'Anthurium Andraeanum', 'không có', 'việt nam', 'dễ trồng', 'giao nhanh', ' ', '5 sao', 40, 'img/produc/113.webp '),
('Cây Phú Quý Thủy Sinh', 'B03', 'Cây mini', 170000, 300000, 'Cây Phú Quý thủy sinh ngoài các tác dụng như trang trí, giúp không khí trong lành hơn, còn mang lại nhiều ý nghĩa phong thủy tốt đẹp cho người trồng…', 12, '500g', '30cm', ' ', ' ', ' ', 'Cây Phú Quý Thủy Sinh', 'không có', 'không có', 'việt nam', 'dễ trồng', 'giao nhanh', ' ', '5 sao', 30, 'img/produc/112.webp'),
('Cây Kim Ngân', 'B04', 'Cây mini', 850000, 1000000, 'ối với người Tây phương có nghĩa là cây tiền. Cây thường được dùng để làm cây cảnh văn phòng, trang trí nhà ở với ý nghĩa mang lại nhiều tiền bạc, sự may mắn và thịnh vượng cho gia chủ…', 5, '1kg', '30cm x 40cm', '.', '.', '.', 'Cây Kim Ngân', ' Pachira Aquatica', 'Money Tree', 'Tây phương', 'dễ trồng', 'giao nhanh', '.', '5 sao', 10, 'img/produc/001.webp '),
('Cây Thường Xuân', 'B05', 'Cây trong nhà', 220000, 500000, 'là loài cây leo, thường xanh tốt quanh năm. Cây có khả năng thanh lọc không khí cực tốt. Trong phong thủy cây mang ý nghĩa xua đuổi tà ma, xóa tan âm khí, vượng dương khí mang đến bình an và may mắn cho gia chủ…', 13, '500g', '30cm', '.', '.', '.', 'Cây Thường Xuân', 'Hedera Helix', 'không có', 'việt nam', 'dễ trồng', 'giao nhanh', '.', '5 sao', 20, 'img/produc/003.webp'),
('Bỏng Thái', 'C02', 'Cây trong nhà', 140000, 190000, ' Hoa có rất nhiều màu sắc tùy vào giống cây bạn chọn, có thể là màu đò, màu vàng, màu tím,.. cây có cành mang hoa cao so với là, cho hoa đơn 4 cánh, mỗi cành sẽ mang một chùm hoa nhìn rất đẹp nên thường được chọn trồng trong sân vườn, cảnh quan đô thị, công trình, hành lang, trang trí nội thất,…… Hiện nay trên thị trường đang có 2 loại hoa đơn và kép với nhiều màu sắc như: Đỏ, cam, hồng,…  Cây bỏng thái là loài cây có nhiều ý nghĩa, màu sắc lại rực rỡ với sức sống bền bỉ mang theo nhiều ý nghĩa ', 11, '0.5 kg', '30cm x 25cm', '', 'Việt Nam', 'Không hỗ trợ', 'Bỏng Thái', '', 'cây lá bỏng', 'Thái Lan', 'Lá mọng nước', 'cod', 'Bỏng ngô', '1 lượt đánh giá', 3, 'img/produc/bongthai.webp img/produc/bongthai2.webp '),
('Tùng Thơm', 'C03', 'Cây để bàn', 120000, 170000, 'Cây Tùng thơm còn có tên gọi khác là cây tùng hương, cây tùng chanh, là loài cây thuộc dạng thân gỗ nhỏ, có hình tháp tự nhiên, chiều cao trung bình khoảng từ 40 – 60cm, cây có lá hình kim, mọc nhiều trên cành nhánh và có mùi thơm rất dễ chịu.Ngoài tác dụng làm cảnh, cây tùng thơm còn có thể xua đuổi côn trùng bởi mùi của nó, làm tỉnh táo tinh thần và xua tan mệt mỏi sau những ngày làm việc.', 0, '0', '', '', 'Việt Nam', 'Không hỗ trợ', '', '', '', '', '', 'cod', '', '1 lượt đánh giá', 8, 'img/produc/tung-thom-03-600x786.webp'),
('Bạch Mã Hoàng Tử', 'C06', 'Cây trong nhà', 175000, 225000, 'Cây có rễ chùm, màu trắng ngà. Đặc điểm nổi bật của cây Bạch Mã là sinh trưởng nhanh, lan bụi rộng. Người trồng có thể nhân giống bằng cách tách bụi, sẽ hiệu quả hơn nhiều so với việc gieo trồng.', 15, '0.48 kg', '30cm x 25cm', '', 'Việt Nam', 'Không hỗ trợ', '', '', 'trầu bà đế vương', 'Thái Lan', 'Lá chuối', 'COD', 'Bỏng ngô', '1 lượt đánh giá', 8, 'img/produc/bmht.webp img/produc/19-370x270.webp '),
('Hải Sơn Tùng', 'C09', 'Cây để bàn', 500000, 6000000, 'Hải Sơn Tùng có bộ lá nhHải Sơn Tùng là một dạng cây sống ở vùng bờ biển của Indonesia , Philippines và quần đảo Thái Bình Dương .', 20, '1kg', '30cm x 50cm', '.', '.', '.', 'Hải Sơn Tùng', 'PEMPHIS ACIDULA', 'không có', 'vùng bờ biển của Indonesia', 'dễ trồng', 'giao nhanh', '.', '5 sao', 40, 'img/produc/11.webp '),
('bonsai', 'C10', 'Cây để bàn', 1000000, 2000000, 'cây dáng đẹp ', 20, '20', '30cm', '.', 'Việt Nam', 'Không hỗ trợ', 'bonsai', '.', 'không có', '.', 'dễ trồng', 'cod', '.', '5 sao', 30, 'img/produc/22.webp '),
('Cây Lan Ý Thuỷ Sinh', 'C12', 'Cây để bàn', 220000, 500000, 'loài cây lọc không khí, hấp thụ một số chất gây ung thư như: formaldehyde, benzen và trichloroethylene…', 9, '500g', '30cm x 50cm', '.', '.', '.', 'Cây Lan Ý Thuỷ Sinh', 'Spathiphyllum wallisii', 'không có', 'việt nam', 'dễ trồng', 'giao nhanh', '.', '5 sao', 10, 'img/produc/44.webp'),
('Cây Vạn Lộc Thủy Sinh', 'C13', 'Cây trong nhà', 220000, 270000, 'có tốc độ sinh trưởng nhanh, dễ chăm sóc, phù hợp trang trí nội thất, phòng làm việc, tượng trưng cho sự may mắn, năng lượng tràn đầy và mang sự thịnh vượng, no đủ cho gia chủ…', 0, '', '', '', 'Việt Nam', 'Không hỗ trợ', '', '', '', '', '', 'cod', '', '1 lượt đánh giá', 8, 'img/produc/00.webp');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `uid` (`id_user`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quequan`
--
ALTER TABLE `quequan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`produc_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `uid` FOREIGN KEY (`id_user`) REFERENCES `khachhang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
