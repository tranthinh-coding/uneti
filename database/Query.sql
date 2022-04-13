-- CREATE TABLE khoa (
-- id INT AUTO_INCREMENT,
-- ten_khoa VARCHAR(100),
-- PRIMARY KEY(id)
-- );

-- -- gioi tinh: 
-- -- [1] nam  [0] nu   [] khong tra loi
-- CREATE TABLE giang_vien (
-- id INT AUTO_INCREMENT,
-- ten VARCHAR(100),
-- ma_khoa INT,
-- nam_sinh DATE,
-- gioi_tinh BOOLEAN,
-- FOREIGN KEY (ma_khoa) REFERENCES khoa(id),
-- PRIMARY KEY(id)
-- );

-- CREATE TABLE lop_bien_che (
-- id INT AUTO_INCREMENT,
-- ten_lop VARCHAR(100),
-- ma_khoa INT,
-- ma_giang_vien INT,
-- FOREIGN KEY (ma_khoa) REFERENCES khoa(id),
-- FOREIGN KEY (ma_giang_vien) REFERENCES giang_vien(id),
-- PRIMARY KEY(id)
-- )

-- CREATE TABLE khoa_hoc (
-- id INT AUTO_INCREMENT,
-- ten_khoa VARCHAR(100),
-- nam_bat_dau DATE,
-- PRIMARY KEY (id)
-- );

-- CREATE TABLE mon_hoc_phan (
-- id INT AUTO_INCREMENT,
-- ten_mon_hoc_phan VARCHAR(100),
-- so_tin_chi INT,
-- PRIMARY KEY(id)
-- );

-- CREATE TABLE lop_hoc_phan (
-- id INT AUTO_INCREMENT,
-- ma_khoa INT,
-- ma_lop_bien_che INT,
-- ma_giang_vien INT,
-- khoa_hoc INT,
-- ma_mon_hoc_phan INT,
-- FOREIGN KEY (ma_khoa) REFERENCES khoa(id),
-- FOREIGN KEY (ma_lop_bien_che) REFERENCES lop_bien_che(id),
-- FOREIGN KEY (ma_giang_vien) REFERENCES giang_vien(id),
-- FOREIGN KEY (ma_mon_hoc_phan) REFERENCES mon_hoc_phan(id),
-- UNIQUE(ma_mon_hoc_phan, ma_lop_bien_che, khoa_hoc),
-- PRIMARY KEY(id)
-- );
-- 
-- gioi tinh: [1] Nam  [0] Nu  [NULL] Khac
-- CREATE TABLE sinh_vien (
-- id INT AUTO_INCREMENT,
-- ho_ten VARCHAR(100),
-- ngay_sinh DATE,
-- gioi_tinh BOOLEAN,
-- ma_khoa_hoc INT,
-- ma_lop_bien_che INT,
-- ma_khoa INT,
-- create_at DATE,
-- update_at DATE,
-- FOREIGN KEY (ma_khoa_hoc) REFERENCES khoa_hoc(id),
-- FOREIGN KEY (ma_lop_bien_che) REFERENCES lop_bien_che(id),
-- FOREIGN KEY (ma_khoa) REFERENCES khoa(id),
-- PRIMARY KEY(id)
-- );

-- CREATE TABLE admin (
-- id INT AUTO_INCREMENT,
-- ho_ten VARCHAR(100),
-- ngay_sinh DATE,
-- gioi_tinh BOOLEAN,
-- create_at DATE,
-- update_at DATE,
-- PRIMARY KEY(id)
-- );

-- CREATE TABLE sinh_vien_lop_hoc_phan (
-- id_sinh_vien INT,
-- id_lop_hoc_phan INT,
-- FOREIGN KEY (id_sinh_vien) REFERENCES sinh_vien(id),
-- FOREIGN KEY (id_lop_hoc_phan) REFERENCES lop_hoc_phan(id)
-- );

-- X: he 10, IV: he 4
-- CREATE TABLE diem_trung_binh (
-- ma_sinh_vien INT,
-- diem_tb_hoc_ky_X FLOAT,
-- diem_tb_hoc_ky_IV FLOAT,
-- diem_tb_tich_luy_X FLOAT,
-- diem_tb_tich_luy_IV FLOAT,
-- hoc_ky INT,
-- nam_hoc DATE,
-- FOREIGN KEY(ma_sinh_vien) REFERENCES sinh_vien (id),
-- UNIQUE (ma_sinh_vien, hoc_ky, nam_hoc)
-- );

-- CREATE TABLE diem_hoc_phan (
-- ma_mon_hoc_phan INT,
-- ma_sinh_vien INT,
-- he_so_1 FLOAT,
-- he_so_2 FLOAT,
-- diem_chuyen_can FLOAT,
-- diem_qua_trinh FLOAT,
-- diem_thi FLOAT,
-- xep_loai VARCHAR(50),
-- diem_tong_ket FLOAT,
-- tong_ket_he_4 FLOAT,
-- UNIQUE(ma_mon_hoc_phan, ma_sinh_vien),
-- FOREIGN KEY (ma_mon_hoc_phan) REFERENCES mon_hoc_phan(id),
-- FOREIGN KEY (ma_sinh_vien) REFERENCES sinh_vien(id)
-- );

-- CREATE table quyen(
-- id INT AUTO_INCREMENT,
-- ten_quyen VARCHAR(100),
-- PRIMARY KEY (id)
-- );

-- CREATE TABLE tai_khoan(
-- id INT AUTO_INCREMENT,
-- tai_khoan INT NOT NULL,
-- mat_khau VARCHAR(255) NOT NULL,
-- ten_nguoi_dung VARCHAR(100),
-- PRIMARY KEY (id)
-- );

-- CREATE TABLE extra (
-- 	id INT,
-- 	NAME CHAR(50),
-- 	PRIMARY KEY(id)
-- );
-- 
-- CREATE TABLE quyen_nguoi_dung (
-- id_quyen INT,
-- id_nguoi_dung INT,
-- FOREIGN KEY (id_quyen) REFERENCES quyen(id),
-- FOREIGN KEY (id_nguoi_dung) REFERENCES tai_khoan(id)
-- );

-- TRIGGER ------------------------------------------------
-- TAO TAI KHOAN CHO GIANG VIEN KHI THEM MOI
-- DELIMITER $$
-- DROP TRIGGER create_account;
-- CREATE TRIGGER create_account_giang_vien
-- AFTER INSERT
-- ON giang_vien FOR EACH ROW
-- BEGIN
-- 	INSERT INTO tai_khoan (tai_khoan)
-- 	VALUES (NEW.id);
-- END$$
-- DELIMITER;

-- --THEM THONG TIN SINH VIEN VAO DANH SACH BANG DIEM CUA LOP HOC PHAN ....
-- DELIMITER $$
-- CREATE TRIGGER them_sinh_vien_lop_hoc_phan
-- AFTER INSERT
-- ON sinh_vien_lop_hoc_phan FOR EACH ROW
-- BEGIN	
-- 	DECLARE ma_mon INT;
-- 	SET ma_mon = (SELECT ma_mon_hoc_phan FROM lop_hoc_phan WHERE id = NEW.id_lop_hoc_phan);
-- 	
-- 	INSERT INTO diem_hoc_phan (ma_mon_hoc_phan, ma_sinh_vien, ma_lop_hoc_phan)
-- 	VALUES (ma_mon,  NEW.id_sinh_vien, NEW.id_lop_hoc_phan);
-- END$$
-- DELIMITER;

-- TAO TAI KHOAN CHO SINH VIEN KHI THEM MOI
-- DELIMITER $$
-- CREATE TRIGGER create_account_sinh_vien
-- AFTER INSERT
-- ON sinh_vien FOR EACH ROW
-- BEGIN
-- 	INSERT INTO tai_khoan (tai_khoan)
-- 	VALUES (NEW.id);
-- END$$
-- DELIMITER ;

 -- ====================================================================================
-- LAY RA THONG TIN DIEM CUA SINH VIEN ID = 1
SELECT a.*, m.ten_mon_hoc_phan, m.so_tin_chi 
FROM (
  SELECT * FROM diem_hoc_phan
  WHERE ma_sinh_vien = 1
) a 
JOIN mon_hoc_phan as m 
on m.id = a.ma_mon_hoc_phan
-- 
-- ====================================================================================
-- LAY THONG TIN CHI TIET CUA SINH VIEN
SELECT 
		a.id, 
		a.ho, 
		a.ten, 
		a.ngay_sinh, 
		kh.ten_khoa, 
		lbc.ten_lop, 
		k.ten_khoa AS khoa 
	FROM sinh_vien as a 
LEFT JOIN khoa k ON a.ma_khoa = k.id
LEFT JOIN khoa_hoc kh ON a.ma_khoa_hoc = kh.id
LEFT JOIN lop_bien_che lbc ON a.ma_lop_bien_che = lbc.id;

-- ====================================================================================
-- LAY RA DANH SACH SINH VIEN VA BANG DIEM THUOC MA LOP HOC PHAN
SELECT d.ma_sinh_vien,
		sv.ho, 
		sv.ten,
		d.he_so_1, 
		d.he_so_2, 
		d.diem_chuyen_can, 
		d.diem_qua_trinh,
		d.diem_thi, 
		d.xep_loai,
		d.diem_tong_ket,
		d.tong_ket_he_4
FROM
	(SELECT * FROM diem_hoc_phan
		WHERE ma_lop_hoc_phan = 8) AS d
JOIN sinh_vien AS sv
ON d.ma_sinh_vien = sv.id


-- ====================================================================================
-- LAY RA KHOA, LOP HOC PHAN MA GIANG VIEN MA 17 DANG DAY
SELECT 
	lp.ma_khoa, 
	lp.id as ma_lop, 
	mh.ten_mon_hoc_phan AS ten_mon,
	lbc.ten_lop as ten_lop
FROM 
  (SELECT * FROM lop_hoc_phan WHERE ma_giang_vien = 17) lp
JOIN khoa ON lp.ma_khoa = khoa.id
JOIN mon_hoc_phan mh ON mh.id = lp.ma_mon_hoc_phan
JOIN lop_bien_che lbc ON lbc.id = lp.ma_lop_bien_che;

-- ====================================================================================
-- RESET DIEM HOC PHAN THEO MA LOP
-- UPDATE diem_hoc_phan
-- SET diem_chuyen_can = NULL,
-- he_so_1 = NULL,
-- he_so_2 = NULL,
-- diem_thi = NULL,
-- diem_qua_trinh = NULL,
-- diem_tong_ket = NULL,
-- tong_ket_he_4 = NULL,
-- xep_loai = NULL
-- WHERE ma_lop_hoc_phan = 10;
-- 
-- ====================================================================================
-- Kết thúc môn học phần, UPDATE TOAN BO DIEM
UPDATE diem_hoc_phan 
SET he_so_1 = CASE 
	WHEN he_so_1 IS NULL THEN 0 
	ELSE he_so_1
	END,
he_so_2 = CASE 
	WHEN he_so_2 IS NULL THEN 0 
	ELSE he_so_2
	END,
diem_chuyen_can = CASE 
	WHEN diem_chuyen_can IS NULL THEN 10 
	ELSE diem_chuyen_can
	END,
diem_thi = CASE 
	WHEN diem_thi IS NULL THEN 0 
	ELSE diem_thi
	END,
diem_qua_trinh = (he_so_1 + 2 * he_so_2) / 3,
diem_tong_ket = diem_thi * 0.6 + diem_qua_trinh * 0.4,
tong_ket_he_4 = CASE
	WHEN diem_tong_ket >= 8.5  THEN 4.0
	WHEN diem_tong_ket >= 8.0 AND diem_tong_ket < 8.5 THEN 3.5
	WHEN diem_tong_ket >= 7.0 AND diem_tong_ket < 8.0 THEN 3.0
	WHEN diem_tong_ket >= 6.5 AND diem_tong_ket < 7.0 THEN 2.5
	WHEN diem_tong_ket >= 5.5 AND diem_tong_ket < 6.5 THEN 2.0
	WHEN diem_tong_ket >= 5.0 AND diem_tong_ket < 5.5 THEN 1.5
	WHEN diem_tong_ket >= 4.0 AND diem_tong_ket < 5.0 THEN 1.0
	ELSE 0
	END,
xep_loai = CASE 
	WHEN diem_tong_ket >= 8.5 THEN 'A'
	WHEN diem_tong_ket >= 7.0 AND diem_tong_ket < 8.5 THEN 'B'
	WHEN diem_tong_ket >= 5.5 AND diem_tong_ket < 7.0 THEN 'C'
	WHEN diem_tong_ket >= 4.0 AND diem_tong_ket < 5.5 THEN 'D'
	ELSE 'F'
	END
WHERE 
ma_lop_hoc_phan = 8;

-- ====================================================================================
-- UPDATE diem_hoc_phan
-- SET diem_qua_trinh = (he_so_1 + 2 * he_so_2) / 3,
-- diem_tong_ket = diem_thi * 0.6 + diem_qua_trinh * 0.4
-- WHERE ma_lop_hoc_phan = 8;

-- ====================================================================================
-- LAY RA 3 BAN CO DIEM TONG KET CAO TRONG LOP HOC PHAN SO 8 (KHONG TOI UU)
SELECT sv.id, sv.ten, sv.ho, diem_hoc_phan.diem_tong_ket
FROM diem_hoc_phan
JOIN sinh_vien sv ON diem_hoc_phan.ma_sinh_vien = sv.id
WHERE ma_lop_hoc_phan = 8 AND diem_tong_ket IS NOT NULL
ORDER BY diem_tong_ket
LIMIT 3;

-- ====================================================================================
-- LAY RA 3 BAN CO DIEM TONG KET CAO TRONG LOP HOC PHAN 8 (TOI UU VOI SUBQUERY): 
-- Dùng php check xem lớp học phần đã kết thúc hay chưa
SELECT sv.id, sv.ten, sv.ho, dhp.*
FROM (
	SELECT ma_sinh_vien AS msv, diem_tong_ket
	FROM diem_hoc_phan
	WHERE diem_tong_ket IS NOT NULL AND ma_lop_hoc_phan = 8
	ORDER BY diem_tong_ket
	LIMIT 3
) dhp
JOIN sinh_vien sv ON dhp.msv = sv.id

-- ====================================================================================
-- LAY RA NHUNG BAN CHUA QUA MON (TOI UU): Dùng php check lớp học phần đã học xong hay chưa rồi mới thực hiện
SELECT sv.id, sv.ten, sv.ho, dhp.*
FROM (
	SELECT ma_sinh_vien AS msv, diem_tong_ket
	FROM diem_hoc_phan
	WHERE (diem_tong_ket IS NULL OR diem_tong_ket <= 4.0) AND ma_lop_hoc_phan = 8
) dhp
JOIN sinh_vien sv ON dhp.msv = sv.id

-- ====================================================================================
-- SELECT AVG(diem_tong_ket * mh.so_tin_chi) FROM diem_hoc_phan
-- GROUP BY ma_sinh_vien
-- JOIN mon_hoc_phan mh ON diem_hoc_phan.ma_mon_hoc_phan = mon_hoc_phan.id

-- ====================================================================================
SELECT
	dhp.ma_sinh_vien as msv, 
	SUM(mh.so_tin_chi) AS stc, 
	SUM(dhp.diem_tong_ket) AS dtk
FROM (
	SELECT * FROM diem_hoc_phan
	WHERE ma_lop_hoc_phan = 8
) dhp
JOIN mon_hoc_phan mh ON mh.id = dhp.ma_mon_hoc_phan
GROUP BY (dhp.ma_sinh_vien);
