# # uneti
 Bài tập lớn | Cơ sở dữ liệu | UNETI

## [Xem Demo](https://uneti.qrgiamgia.com/)

* Tài khoản test:
    - ADMIN:
        + account: kadmin, tadmin, dadmin
        + password: admin

    - Giảng viên, sinh viên:
        + account: các số từ 1
        + password: uneti
    #### + Giảng viên đã có phân lớp để test:
        + account: 17
        + password: uneti
        + Khoa: CNTT, lớp CSDL Tin 14A6

### Database: Sử dụng mysql
#### PHP: version 8.1

## # Chức năng
+ Sinh viên
    - Đăng nhập
    - Xem điểm (tất cả các môn)

+ Giảng viên
    - Đăng nhập
    - Sửa điểm sinh viên
    - Kết thúc môn
        + Khi kết thúc môn -> tính điểm tổng bla bla

+ Phòng đào tạo
    - Thêm sinh viên, giảng viên
    - Thêm lớp (học phần)
    - Thêm môn học phần
    
## DATABASE
  + trigger:
    - tính điểm trung bình của từng sinh viên sau khi quản trị viên (Phòng đào tạo) xác nhận kết thúc học kỳ
        (chưa đưa được lên web do có nhiều sinh viên, chạy trigger 1 lần update nhiều sinh viên -> Chết Database)
    - tạo account đăng nhập sau khi insert giảng viên, sinh viên
    - thêm sinh viên vào bảng điểm của lớp học phần khi phân lớp học phần cho sinh viên

  + Những thứ chưa đưa lên webform được:
      - Kết thúc học kì, sau kết thúc đóng lại toàn bộ lớp học phần thuộc kì đó: ADMIN (Phòng đào tạo)
      - Lấy ra 3 bạn có điểm tổng kết cao nhất trong lớp học phần: TEACHER. (Đã làm)
      - Lấy ra các bạn chưa qua môn của lớp học phần đó. (Đã làm)

* Khi quản trị viên (Phòng Đào tạo) kết thúc học kì, sẽ xác nhận chạy con bot trên hosting
* Trên hosting co 1 con bot. Cai dat 1p chay file models/admin/upadteDiemTrungBinh.php cho tung lop
* Nếu để update kết thúc học kì và tổng kết điểm cho quá nhiều sinh viên cùng lúc => Chết Database
