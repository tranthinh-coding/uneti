-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table uneti.admin: ~3 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `ho`, `ten`, `ngay_sinh`, `gioi_tinh`, `create_at`, `update_at`) VALUES
	('dadmin', 'Đỗ Văn', 'Đức', '2022-04-11', 1, '2022-04-11', '2022-04-11'),
	('kadmin', 'Nguyễn Công Mạnh', 'Khương', '2002-10-10', 1, '2022-04-11', '2022-04-11'),
	('tadmin', 'Trần Văn', 'Thinh', '2001-12-02', 1, '2022-04-11', '2022-04-11');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping data for table uneti.diem_hoc_phan: ~46 rows (approximately)
/*!40000 ALTER TABLE `diem_hoc_phan` DISABLE KEYS */;
INSERT INTO `diem_hoc_phan` (`ma_mon_hoc_phan`, `ma_sinh_vien`, `he_so_1`, `he_so_2`, `diem_chuyen_can`, `diem_qua_trinh`, `diem_thi`, `xep_loai`, `diem_tong_ket`, `tong_ket_he_4`, `ma_lop_hoc_phan`) VALUES
	(1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
	(1, 1, 8, 9, 10, NULL, NULL, NULL, NULL, NULL, 8),
	(3, 1, 1, 8, NULL, NULL, NULL, NULL, NULL, NULL, 10);
/*!40000 ALTER TABLE `diem_hoc_phan` ENABLE KEYS */;

-- Dumping data for table uneti.diem_trung_binh: ~0 rows (approximately)
/*!40000 ALTER TABLE `diem_trung_binh` DISABLE KEYS */;
/*!40000 ALTER TABLE `diem_trung_binh` ENABLE KEYS */;

-- Dumping data for table uneti.extra: ~3 rows (approximately)
/*!40000 ALTER TABLE `extra` DISABLE KEYS */;
INSERT INTO `extra` (`id`, `name`) VALUES
	(0, 'admin'),
	(1, 'Giảng viên'),
	(2, 'Sinh viên');
/*!40000 ALTER TABLE `extra` ENABLE KEYS */;

-- Dumping data for table uneti.giang_vien: ~13 rows (approximately)
/*!40000 ALTER TABLE `giang_vien` DISABLE KEYS */;
INSERT INTO `giang_vien` (`id`, `ten`, `ho`, `ma_khoa`, `ngay_sinh`, `gioi_tinh`) VALUES
	(16, 'T', 'Trần Văn', 1, '2001-12-02', 1),
	(17, 'K', 'Nguyễn Công Mạnh', 1, '2002-10-10', 1),
	(18, 'Đ', 'Đỗ Văn', 1, '2002-11-09', 1),
	(20, 'T', 'Bùi Văn', 1, '1986-12-03', 1),
	(21, 'N', 'Nguyễn Thị', 2, '1985-10-01', 0),
	(22, 'H', 'Võ Thu', 3, '1988-03-05', 0),
	(23, 'C', 'Lưu Khánh', 4, '1983-02-22', 1),
	(24, 'H', 'Phùng Thị Lan', 5, '1981-07-30', 0),
	(25, 'Q', 'Đặng Thị Thanh', 6, '1984-11-13', 0),
	(26, 'H', 'Bùi Huy', 7, '1985-04-26', 1),
	(27, 'Q', 'Nguyễn Hữu', 8, '1980-10-31', 1),
	(28, 'H', 'Vũ Duy', 9, '1982-11-10', 1);
/*!40000 ALTER TABLE `giang_vien` ENABLE KEYS */;

-- Dumping data for table uneti.khoa: ~9 rows (approximately)
/*!40000 ALTER TABLE `khoa` DISABLE KEYS */;
INSERT INTO `khoa` (`id`, `ten_khoa`) VALUES
	(1, 'Công nghệ thông tin'),
	(2, 'Kế toán'),
	(3, 'Điện'),
	(4, 'Quản trị kinh doanh'),
	(5, 'Tài chính - ngân hàng'),
	(6, 'Công nghệ thực phẩm'),
	(7, 'CNKT cơ điện tử'),
	(8, 'CNKT ô tô'),
	(9, 'CNKT điều khiển và TĐH'),
	(10, 'CNKT cơ khí');
/*!40000 ALTER TABLE `khoa` ENABLE KEYS */;

-- Dumping data for table uneti.khoa_hoc: ~0 rows (approximately)
/*!40000 ALTER TABLE `khoa_hoc` DISABLE KEYS */;
INSERT INTO `khoa_hoc` (`id`, `ten_khoa`, `nam_bat_dau`) VALUES
	(1, '14', '2021-10-08');
/*!40000 ALTER TABLE `khoa_hoc` ENABLE KEYS */;

-- Dumping data for table uneti.lop_bien_che: ~25 rows (approximately)
/*!40000 ALTER TABLE `lop_bien_che` DISABLE KEYS */;
INSERT INTO `lop_bien_che` (`id`, `ten_lop`, `ma_khoa`, `ma_giang_vien`) VALUES
	(1, 'Tin 14A6 ', 1, NULL),
	(2, 'Tin 14A7', 1, NULL),
	(3, 'Tin 14a1', 1, NULL),
	(4, 'Tin 14A2', 1, NULL),
	(5, 'Tin 14A3', 1, NULL),
	(6, 'Tin 14A4', 1, NULL),
	(7, 'Tin 14A5', 1, NULL),
	(8, 'Tin 14A8', 1, NULL),
	(9, 'Tin 14A9', 1, NULL),
	(10, 'Tin 14A10', 1, NULL),
	(11, 'QTKD 14A1', 4, NULL),
	(12, 'QTKD 14A2', 4, NULL),
	(13, 'QTKD 14A3', 4, NULL),
	(14, 'QTKD 14A4', 4, NULL),
	(15, 'KT 14A1', 2, NULL),
	(16, 'KT 14A2', 2, NULL),
	(17, 'KT 14A3', 2, NULL),
	(18, 'KT 14A4', 2, NULL),
	(19, 'KT 14A5', 2, NULL),
	(20, 'CK 14A1', 10, NULL),
	(21, 'CK 14A2', 10, NULL),
	(22, 'CK 14A3', 10, NULL),
	(23, 'KT CDT 14A1', 7, NULL),
	(24, 'KT CDT 14A2', 7, NULL),
	(25, 'KT CDT 14A3', 7, NULL);
/*!40000 ALTER TABLE `lop_bien_che` ENABLE KEYS */;

-- Dumping data for table uneti.lop_hoc_phan: ~7 rows (approximately)
/*!40000 ALTER TABLE `lop_hoc_phan` DISABLE KEYS */;
INSERT INTO `lop_hoc_phan` (`id`, `ma_khoa`, `ma_lop_bien_che`, `ma_giang_vien`, `khoa_hoc`, `ma_mon_hoc_phan`, `ten_lop_hoc_phan`) VALUES
	(8, 1, 1, 17, 1, 1, 'Cơ sở dữ liệu Tin 14A6'),
	(9, 1, 2, 17, 1, 2, 'Kĩ thuật đồ hoạ máy tính Tin 14A7'),
	(10, 1, 1, 17, 1, 3, 'Hệ điều hành Tin14A6'),
	(12, 1, 7, 17, 1, 1, 'Hệ điều hành Tin14A7'),
	(13, 1, 1, 17, 1, 11, 'Vật lý Tin14A6'),
	(14, 1, 7, 17, 1, 17, 'Toán rời rạc Tin14A6'),
	(15, 1, 8, 17, 1, 12, 'Đại số tuyến tính Tin14A6');
/*!40000 ALTER TABLE `lop_hoc_phan` ENABLE KEYS */;

-- Dumping data for table uneti.mon_hoc_phan: ~21 rows (approximately)
/*!40000 ALTER TABLE `mon_hoc_phan` DISABLE KEYS */;
INSERT INTO `mon_hoc_phan` (`id`, `ten_mon_hoc_phan`, `so_tin_chi`) VALUES
	(1, 'Cơ sở dữ liệu', 4),
	(2, 'Kỹ thuật đồ hoạ máy tính', 2),
	(3, 'Hệ điều hành', 3),
	(4, 'Thực tập lập trình hướng đối tượng', 2),
	(5, 'Tin cơ sở', 4),
	(6, 'Quản trị học', 2),
	(7, 'Logic học', 2),
	(8, 'Pháp luật đại cương', 2),
	(9, 'Tin học văn phòng', 2),
	(10, 'Xác suất thống kê', 3),
	(11, 'Vật lý', 4),
	(12, 'Đại số tuyến tính', 2),
	(13, 'Toán giải tích', 3),
	(14, 'Thực tập lập trình cơ bản', 3),
	(15, 'Triết học Mac - Lênin', 3),
	(16, 'Xử lý tín hiệu số', 2),
	(17, 'Toán rời rạc', 3),
	(18, 'Lập trình hướng đối tượng', 3),
	(19, 'Kiến trúc máy tính', 3),
	(20, 'Cấu trúc dữ liệu và giải thuật', 3),
	(21, 'Kinh tế chính trị Mac - Lê Nin', 2);
/*!40000 ALTER TABLE `mon_hoc_phan` ENABLE KEYS */;

-- Dumping data for table uneti.sinh_vien: ~65 rows (approximately)
/*!40000 ALTER TABLE `sinh_vien` DISABLE KEYS */;
INSERT INTO `sinh_vien` (`id`, `ten`, `ho`, `ngay_sinh`, `gioi_tinh`, `ma_khoa_hoc`, `ma_lop_bien_che`, `ma_khoa`, `create_at`, `update_at`) VALUES
	(1, 'T', 'Trần Văn', '2001-12-02', 1, 1, 1, 1, '2022-04-11 17:35:36', '2022-04-12 10:15:58'),
	(6, 'K', 'Nguyễn Công Mạnh', '2002-10-10', 1, 1, 1, 1, '2022-04-11 17:35:40', '2022-04-12 10:15:59'),
	(10, 'D', 'Đỗ Văn', '2312-01-01', 0, 1, 1, 1, '2022-04-11 17:35:18', '2022-04-12 10:16:00'),
	(12, 'Q', 'Trần Như Quỳnh', '2002-05-15', 0, 1, 1, 1, '2022-04-11 23:52:12', '2022-04-12 10:16:01'),
	(13, 'C', 'Phạm Huy', '2002-12-10', 1, 1, 1, 1, '2022-04-11 23:52:12', '2022-04-12 10:16:05'),
	(14, 'H', 'Trinh Đông', '2002-12-12', 1, 1, 1, 1, '2022-04-11 23:52:12', '2022-04-12 10:16:06'),
	(15, 'H', 'Nguyễn Hữu Quốc', '2002-01-10', 1, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:07'),
	(16, 'N', 'Vũ Phương', '2002-02-10', 0, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:08'),
	(17, 'H', 'Phương Quốc', '2002-12-11', 1, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:09'),
	(18, 'N', 'Nguyễn Thị', '2002-12-10', 0, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:11'),
	(19, 'H', 'Nguyễn Trần', '2002-12-10', 1, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:12'),
	(20, 'C', 'Trần Văn', '2002-06-11', 1, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:14'),
	(21, 'T', 'Đỗ Văn', '2002-07-10', 1, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:16'),
	(22, 'T', 'Đinh Văn', '2002-07-12', 1, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:17'),
	(23, 'B', 'Nguyễn Xuân', '2002-05-10', 0, 1, 1, 1, '2022-04-11 23:52:13', '2022-04-12 10:16:18'),
	(24, 'K', 'Nguyễn Văn', '2002-08-12', 1, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(25, 'B', 'Trần Văn', '2002-04-07', 1, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(26, 'D', 'Trần Tùng', '2002-07-27', 1, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(27, 'N', 'Nguyễn Thị', '2002-07-24', 0, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(28, 'Q', 'Trần Như', '2002-05-15', 0, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(29, 'C', 'Trần Văn', '2002-08-24', 1, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(30, 'B', 'Phạm Thị', '2002-04-17', 0, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(31, 'D', 'Trần Thành', '2002-10-27', 1, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(32, 'N', 'Hồng Thị', '2002-07-30', 0, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(33, 'Q', 'Trần Thị', '2002-08-15', 0, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(34, 'K', 'Nguyễn Mạnh', '2002-09-02', 1, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(35, 'P', 'Khổng Thị', '2002-04-07', 0, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(36, 'T', 'Nguyễn Đình', '2002-10-21', 1, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(37, 'Y', 'Bùi Thị', '2002-07-24', 0, 1, 1, 1, '2022-04-11 23:52:32', '2022-04-12 10:14:40'),
	(38, 'L', 'Lê Văn', '2002-05-15', 1, 1, 1, 1, '2022-04-12 02:42:28', '2022-04-12 10:14:40'),
	(39, 'D', 'Phạm Văn', '2002-10-15', 1, 1, 1, 1, '2022-04-11 23:52:47', '2022-04-12 10:14:40'),
	(40, 'T', 'Hoàng Thanh', '2002-04-17', 0, 1, 1, 1, '2022-04-11 23:52:47', '2022-04-12 10:14:40'),
	(41, 'Đ', 'Trần Thành', '2002-01-31', 0, 1, 1, 1, '2022-04-11 23:52:47', '2022-04-12 10:14:40'),
	(42, 'S', 'Phạm Thừa', '2002-06-29', 1, 1, 1, 1, '2022-04-11 23:52:47', '2022-04-12 10:14:40'),
	(43, 'T', 'Nguyễn Thanh', '2002-08-15', 0, 1, 1, 1, '2022-04-11 23:52:47', '2022-04-12 10:14:40'),
	(44, 'T', 'Hoàng Văn', '2002-08-12', 1, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(45, 'N', 'Vũ Phương', '2002-04-18', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(46, 'H', 'Trịnh Đông', '2002-04-01', 1, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(47, 'B', 'Vũ Văn', '2002-07-24', 1, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(48, 'L', 'Trịnh Thị', '2002-02-18', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(49, 'H', 'Trịnh Văn', '2002-08-24', 1, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(50, 'T', 'Nguyễn Thị Thu', '2002-04-17', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(51, 'A', 'Phạm Lan', '2002-10-27', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(52, 'Y', 'Trần Thị Thu', '2002-07-30', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(53, 'B', 'Trần Quốc', '2002-08-15', 1, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(54, 'T', 'Nguyễn Thu', '2002-08-12', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(55, 'V', 'Lương Thị', '2002-04-07', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(56, 'N', 'Hà Thị', '2002-08-27', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(57, 'H', 'Nguyễn Trần', '2002-01-28', 1, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(58, 'K', 'Đinh Văn', '2002-08-13', 1, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(59, 'Y', 'Trần Hải', '2002-11-24', 0, 1, 1, 1, '2022-04-11 23:52:48', '2022-04-12 10:14:40'),
	(60, 'L', 'Phạm Vũ', '2002-07-27', 1, 1, 1, 1, '2022-04-11 23:53:14', '2022-04-12 10:14:40'),
	(61, 'T', 'Vũ Chí', '2002-12-17', 1, 1, 1, 1, '2022-04-11 23:53:14', '2022-04-12 10:14:40'),
	(62, 'N', 'Lê Uyên', '2002-01-31', 1, 1, 1, 1, '2022-04-11 23:53:14', '2022-04-12 10:14:40'),
	(63, 'M', 'Trần Hồng', '2002-03-16', 0, 1, 1, 1, '2022-04-11 23:53:14', '2022-04-12 10:14:40'),
	(64, 'P', 'Nguyễn Huy', '2002-08-13', 1, 1, 1, 1, '2022-04-11 23:53:14', '2022-04-12 10:14:40'),
	(65, 'V', 'Phạm Xuân', '2002-05-07', 1, 1, 1, 1, '2022-04-11 23:53:14', '2022-04-12 10:14:40'),
	(66, 'N', 'Phạm Hồng', '2002-07-28', 0, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40'),
	(67, 'M', 'Nguyễn Thị Trà', '2002-03-24', 0, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40'),
	(68, 'D', 'Nguyễn Thùy', '2002-05-25', 0, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40'),
	(69, 'Q', 'Ngô Thị', '2002-08-24', 0, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40'),
	(70, 'Đ', 'Lê Trung', '2002-04-17', 1, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40'),
	(71, 'V', 'Phan Đình', '2002-10-27', 1, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40'),
	(72, 'S', 'Võ Thị', '2002-07-30', 0, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40'),
	(73, 'H', 'Phương Quốc', '2002-08-15', 1, 1, 1, 1, '2022-04-11 23:53:15', '2022-04-12 10:14:40');
/*!40000 ALTER TABLE `sinh_vien` ENABLE KEYS */;

-- Dumping data for table uneti.sinh_vien_lop_hoc_phan: ~49 rows (approximately)
/*!40000 ALTER TABLE `sinh_vien_lop_hoc_phan` DISABLE KEYS */;
INSERT INTO `sinh_vien_lop_hoc_phan` (`id_sinh_vien`, `id_lop_hoc_phan`) VALUES
	(51, 8),
	(53, 8),
	(39, 8),
	(57, 8),
	(73, 8),
	(17, 8),
	(49, 8),
	(19, 8),
	(6, 8),
	(24, 8),
	(34, 8),
	(58, 8),
	(38, 8),
	(48, 8),
	(60, 8),
	(63, 8),
	(67, 8),
	(16, 8),
	(18, 8),
	(32, 8),
	(27, 8),
	(56, 8),
	(45, 8),
	(62, 8),
	(66, 8),
	(35, 8),
	(64, 8),
	(12, 8),
	(28, 8),
	(33, 8),
	(69, 8),
	(42, 8),
	(25, 8),
	(23, 8),
	(47, 8),
	(30, 8),
	(53, 8),
	(13, 8),
	(29, 8),
	(20, 8),
	(10, 8),
	(39, 8),
	(26, 8),
	(68, 8),
	(31, 8),
	(46, 8),
	(14, 8),
	(15, 8),
	(1, 8),
	(1, 10);
/*!40000 ALTER TABLE `sinh_vien_lop_hoc_phan` ENABLE KEYS */;

-- Dumping data for table uneti.tai_khoan: ~87 rows (approximately)
/*!40000 ALTER TABLE `tai_khoan` DISABLE KEYS */;
INSERT INTO `tai_khoan` (`id`, `tai_khoan`, `mat_khau`, `extra`) VALUES
	(1, 'tadmin', 'admin', 0),
	(43, '15', 'uneti', 1),
	(44, '16', 'uneti', 1),
	(45, '17', 'uneti', 1),
	(46, '18', 'uneti', 1),
	(47, '1', 'uneti', 2),
	(48, '6', 'uneti', 2),
	(49, 'kadmin', 'admin', 0),
	(50, 'dadmin', 'admin', 0),
	(51, '7', 'uneti', 2),
	(52, '8', 'uneti', 2),
	(53, '9', 'uneti', 2),
	(54, '10', 'uneti', 2),
	(55, '19', 'uneti', 1),
	(56, '11', 'uneti', 2),
	(57, '12', 'uneti', 2),
	(58, '13', 'uneti', 2),
	(59, '14', 'uneti', 2),
	(60, '15', 'uneti', 2),
	(61, '16', 'uneti', 2),
	(62, '17', 'uneti', 2),
	(63, '18', 'uneti', 2),
	(64, '19', 'uneti', 2),
	(65, '20', 'uneti', 2),
	(66, '21', 'uneti', 2),
	(67, '22', 'uneti', 2),
	(68, '23', 'uneti', 2),
	(69, '24', 'uneti', 2),
	(70, '25', 'uneti', 2),
	(71, '26', 'uneti', 2),
	(72, '27', 'uneti', 2),
	(73, '28', 'uneti', 2),
	(74, '29', 'uneti', 2),
	(75, '30', 'uneti', 2),
	(76, '31', 'uneti', 2),
	(77, '32', 'uneti', 2),
	(78, '33', 'uneti', 2),
	(79, '34', 'uneti', 2),
	(80, '35', 'uneti', 2),
	(81, '36', 'uneti', 2),
	(82, '37', 'uneti', 2),
	(83, '38', 'uneti', 2),
	(84, '39', 'uneti', 2),
	(85, '40', 'uneti', 2),
	(86, '41', 'uneti', 2),
	(87, '42', 'uneti', 2),
	(88, '43', 'uneti', 2),
	(89, '44', 'uneti', 2),
	(90, '45', 'uneti', 2),
	(91, '46', 'uneti', 2),
	(92, '47', 'uneti', 2),
	(93, '48', 'uneti', 2),
	(94, '49', 'uneti', 2),
	(95, '50', 'uneti', 2),
	(96, '51', 'uneti', 2),
	(97, '52', 'uneti', 2),
	(98, '53', 'uneti', 2),
	(99, '54', 'uneti', 2),
	(100, '55', 'uneti', 2),
	(101, '56', 'uneti', 2),
	(102, '57', 'uneti', 2),
	(103, '58', 'uneti', 2),
	(104, '59', 'uneti', 2),
	(105, '60', 'uneti', 2),
	(106, '61', 'uneti', 2),
	(107, '62', 'uneti', 2),
	(108, '63', 'uneti', 2),
	(109, '64', 'uneti', 2),
	(110, '65', 'uneti', 2),
	(111, '66', 'uneti', 2),
	(112, '67', 'uneti', 2),
	(113, '68', 'uneti', 2),
	(114, '69', 'uneti', 2),
	(115, '70', 'uneti', 2),
	(116, '71', 'uneti', 2),
	(117, '72', 'uneti', 2),
	(118, '73', 'uneti', 2),
	(119, '20', 'uneti', 1),
	(120, '21', 'uneti', 1),
	(121, '22', 'uneti', 1),
	(122, '23', 'uneti', 1),
	(123, '24', 'uneti', 1),
	(124, '25', 'uneti', 1),
	(125, '26', 'uneti', 1),
	(126, '27', 'uneti', 1),
	(127, '28', 'uneti', 1),
	(128, '74', 'uneti', 2),
	(129, '29', 'uneti', 1),
	(130, '30', 'uneti', 1);
/*!40000 ALTER TABLE `tai_khoan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
