create database uneti;

use uneti;

create table admin
(
    id        varchar(50) charset utf8mb4 default '' not null
        primary key,
    ho        varchar(100) charset utf8mb4           null,
    ten       varchar(100) charset utf8mb4           null,
    ngay_sinh date                                   null,
    gioi_tinh tinyint(1)                             null,
    create_at date                                   null,
    update_at date                                   null
);

create table extra
(
    id   bigint                      not null
        primary key,
    name varchar(50) charset utf8mb4 null
);

create table khoa
(
    id       int auto_increment
        primary key,
    ten_khoa varchar(100) charset utf8mb4 null
);

create table giang_vien
(
    id        int auto_increment
        primary key,
    ten       varchar(100) charset utf8mb4 null,
    ho        varchar(100) charset utf8mb4 null,
    ma_khoa   int                          null,
    ngay_sinh date                         null,
    gioi_tinh tinyint(1)                   null,
    constraint giang_vien_ibfk_1
        foreign key (ma_khoa) references khoa (id)
);

create index ma_khoa
    on giang_vien (ma_khoa);

create definer = root@localhost trigger create_account_giang_vien
    after insert
    on giang_vien
    for each row
BEGIN
    INSERT INTO tai_khoan (tai_khoan, extra)
    VALUES (NEW.id, 1);
END;

create table khoa_hoc
(
    id          int auto_increment
        primary key,
    ten_khoa    varchar(100) charset utf8mb4 null,
    nam_bat_dau date                         null
);

create table lop_bien_che
(
    id            int auto_increment
        primary key,
    ten_lop       varchar(100) charset utf8mb4 null,
    ma_khoa       int                          null,
    ma_giang_vien int                          null,
    constraint lop_bien_che_ibfk_1
        foreign key (ma_khoa) references khoa (id),
    constraint lop_bien_che_ibfk_2
        foreign key (ma_giang_vien) references giang_vien (id)
);

create index ma_giang_vien
    on lop_bien_che (ma_giang_vien);

create index ma_khoa
    on lop_bien_che (ma_khoa);

create table mon_hoc_phan
(
    id               int auto_increment
        primary key,
    ten_mon_hoc_phan varchar(100) charset utf8mb4 null,
    so_tin_chi       int                          null
);

create table lop_hoc_phan
(
    id              int auto_increment
        primary key,
    ma_khoa         int                  null,
    ma_lop_bien_che int                  null,
    ma_giang_vien   int                  null,
    khoa_hoc        int                  null,
    ma_mon_hoc_phan int                  null,
    trang_thai      tinyint(1) default 1 null,
    hoc_ki          int                  null,
    nam_hoc         int                  null,
    constraint ma_mon_hoc_phan
        unique (ma_mon_hoc_phan, ma_lop_bien_che, khoa_hoc),
    constraint lop_hoc_phan_ibfk_1
        foreign key (ma_khoa) references khoa (id),
    constraint lop_hoc_phan_ibfk_2
        foreign key (ma_lop_bien_che) references lop_bien_che (id),
    constraint lop_hoc_phan_ibfk_3
        foreign key (ma_giang_vien) references giang_vien (id),
    constraint lop_hoc_phan_ibfk_4
        foreign key (ma_mon_hoc_phan) references mon_hoc_phan (id)
);

create index ma_giang_vien
    on lop_hoc_phan (ma_giang_vien);

create index ma_khoa
    on lop_hoc_phan (ma_khoa);

create index ma_lop_bien_che
    on lop_hoc_phan (ma_lop_bien_che);

create table sinh_vien
(
    id              int auto_increment
        primary key,
    ten             varchar(100) charset utf8mb4        null,
    ho              varchar(100) charset utf8mb4        null,
    ngay_sinh       date                                null,
    gioi_tinh       tinyint(1)                          null,
    ma_khoa_hoc     int                                 null,
    ma_lop_bien_che int                                 null,
    ma_khoa         int                                 null,
    create_at       timestamp default CURRENT_TIMESTAMP null,
    update_at       timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    constraint sinh_vien_ibfk_1
        foreign key (ma_khoa_hoc) references khoa_hoc (id),
    constraint sinh_vien_ibfk_2
        foreign key (ma_lop_bien_che) references lop_bien_che (id),
    constraint sinh_vien_ibfk_3
        foreign key (ma_khoa) references khoa (id)
);

create table diem_hoc_phan
(
    ma_mon_hoc_phan int                         null,
    ma_sinh_vien    int                         null,
    he_so_1         float                       null,
    he_so_2         float                       null,
    diem_chuyen_can float                       null,
    diem_qua_trinh  float                       null,
    diem_thi        float                       null,
    xep_loai        varchar(50) charset utf8mb4 null,
    diem_tong_ket   float                       null,
    tong_ket_he_4   float                       null,
    ma_lop_hoc_phan int                         null,
    constraint ma_mon_hoc_phan
        unique (ma_mon_hoc_phan, ma_sinh_vien),
    constraint FK_diem_hoc_phan_lop_hoc_phan
        foreign key (ma_lop_hoc_phan) references lop_hoc_phan (id),
    constraint diem_hoc_phan_ibfk_1
        foreign key (ma_mon_hoc_phan) references mon_hoc_phan (id),
    constraint diem_hoc_phan_ibfk_2
        foreign key (ma_sinh_vien) references sinh_vien (id)
);

create index ma_sinh_vien
    on diem_hoc_phan (ma_sinh_vien);

create table diem_trung_binh
(
    ma_sinh_vien        int   null,
    diem_tb_hoc_ky_X    float null,
    diem_tb_hoc_ky_IV   float null,
    hoc_ki              int   null,
    nam_hoc             int   null,
    diem_tb_tich_luy    int   null,
    diem_tb_tich_luy_IV int   null,
    ma_khoa             int   null,
    constraint ma_sinh_vien
        unique (ma_sinh_vien),
    constraint diem_trung_binh_ibfk_1
        foreign key (ma_sinh_vien) references sinh_vien (id),
    constraint diem_trung_binh_khoa_id_fk
        foreign key (ma_khoa) references khoa (id)
);

create index ma_khoa
    on sinh_vien (ma_khoa);

create index ma_khoa_hoc
    on sinh_vien (ma_khoa_hoc);

create index ma_lop_bien_che
    on sinh_vien (ma_lop_bien_che);

create definer = root@localhost trigger create_account_sinh_vien
    after insert
    on sinh_vien
    for each row
BEGIN
    INSERT INTO tai_khoan (tai_khoan, extra)
    VALUES (NEW.id, 2);
END;

create table sinh_vien_lop_hoc_phan
(
    id_sinh_vien    int null,
    id_lop_hoc_phan int null,
    constraint sinh_vien_lop_hoc_phan_ibfk_1
        foreign key (id_sinh_vien) references sinh_vien (id),
    constraint sinh_vien_lop_hoc_phan_ibfk_2
        foreign key (id_lop_hoc_phan) references lop_hoc_phan (id)
);

create index id_lop_hoc_phan
    on sinh_vien_lop_hoc_phan (id_lop_hoc_phan);

create index id_sinh_vien
    on sinh_vien_lop_hoc_phan (id_sinh_vien);

create definer = root@localhost trigger them_sinh_vien_lop_hoc_phan
    after insert
    on sinh_vien_lop_hoc_phan
    for each row
BEGIN
    DECLARE ma_mon INT;
    SET ma_mon = (SELECT ma_mon_hoc_phan FROM lop_hoc_phan WHERE id = NEW.id_lop_hoc_phan);

    INSERT INTO diem_hoc_phan (ma_mon_hoc_phan, ma_sinh_vien. ma_lop_hoc_phan)
    VALUES (ma_mon,  NEW.id_sinh_vien, NEW.id_lop_hoc_phan);
END;

create table tai_khoan
(
    id        int auto_increment
        primary key,
    tai_khoan varchar(20) charset utf8mb4                  null,
    mat_khau  varchar(255) charset utf8mb4 default 'uneti' null,
    extra     int                                          null,
    constraint `UNIQUE`
        unique (extra, tai_khoan)
);

