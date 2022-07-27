-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `maDanhMuc` int(10) NOT NULL,
  `tenDanhMuc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`maDanhMuc`, `tenDanhMuc`) VALUES
(19, 'Âu Phục'),
(15, 'Thời Trang Nam Giới'),
(16, 'Thời Trang Nữ Giới'),
(20, 'Thời Trang Paris'),
(21, 'Tuần Lễ Thời Trang Ý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` int(11) NOT NULL,
  `tongTien` int(11) NOT NULL,
  `ngayMua` date NOT NULL,
  `ghiChu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `maHD` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `soLuongMua` int(11) NOT NULL,
  `donGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(11) NOT NULL,
  `tenKH` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soDT` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` int(11) NOT NULL,
  `maDanhMuc` int(10) NOT NULL,
  `moTa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `image`, `soLuong`, `donGia`, `maDanhMuc`, `moTa`) VALUES
(2, 'Quần Ấu', 'thoi-trang-nam-mua-he-jpg__4__f6561e5f88da42069f87f9d8950a75b7_grande.jpg', 100, 400, 20, 'sản phẩm quần âu, đăng cấp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`maDanhMuc`) USING BTREE,
  ADD UNIQUE KEY `ten_dm_duynhat` (`tenDanhMuc`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`),
  ADD KEY `fk_maKH` (`maKH`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD KEY `maSP` (`maSP`),
  ADD KEY `fk_maHD` (`maHD`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `fk_maDanhMuc` (`maDanhMuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `maDanhMuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12334;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_maKH` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`) ON DELETE CASCADE,
  ADD CONSTRAINT `maKH` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`);

--
-- Các ràng buộc cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `fk_maHD` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`) ON DELETE CASCADE,
  ADD CONSTRAINT `maHD` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`),
  ADD CONSTRAINT `maSP` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_maDanhMuc` FOREIGN KEY (`maDanhMuc`) REFERENCES `danhmuc` (`maDanhMuc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
