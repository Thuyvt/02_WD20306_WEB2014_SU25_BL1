<?php 
    // Include, nhúng file cần sử dụng 
    include "SinhVien.php";

    // Sử dụng class
    // Khởi tạo object sinh viên đầu tiên
    $sinhVien01 = new SinhVien();

    // Gán giá trị cho từng thuộc tính của sinhVien01
    $sinhVien01->hoVaTen = "Sơn Tùng";
    $sinhVien01->namSinh = 2000;
    // ...
    // Gọi phương thức của object
    $sinhVien01->gioiThieuThongTinCaNhan();

    // Khởi tạo object sinh viên thứ 2
    $sinhVien02 = new SinhVien();
    // Gán giá trị cho sinh viên 02
    $sinhVien02->hoVaTen = "Việt Hoàng";
    $sinhVien02->namSinh = 2004;
    $sinhVien02->email = "hoangnvph123456@gmail.com";

    // gọi phương thức
    $sinhVien02->gioiThieuThongTinCaNhan();

?>