<?php
    // 1.Khai báo biên
    // Sử dụng ký tự $ để bắt đầu khai báo biến
    $tenSanPham = "Bình hoa pha lê";
    $soLuong = 9;
    $trangThaiHienThi = true;

    // 2. In ra giá trị của biến
    // Sử dụng echo
    // Dữ liệu sẽ bị convert về dạng string và in ra màn hình
    echo $tenSanPham;
    echo $trangThaiHienThi;
    echo "<br>";

    // Sử dụng var_dump
    // In ra màn hình kiểu dữ liệu và giá trị của biến
    var_dump($tenSanPham);
    var_dump($trangThaiHienThi);
    echo "<br>";

    // sử dụng echo dạng ngắn 1 dòng
    // các biến các nhau bởi dấu ,
    echo $tenSanPham, $soLuong, $trangThaiHienThi, "<br>";
    echo "<hr>";

    // Sử dụng cho in giá trị biến kết hợp đoạn văn
    // Sử dụng dấu nháy kép để in được giá trị biến ""
    echo "Tên sản phẩm: $tenSanPham";
    echo "<br>";
    echo 'Tên sản phẩm: $tenSanPham'; // Lỗi
    echo "<br>";
    // Sử dụng dấu . để nối chuỗi
    echo "Tên sản phẩm:" .$tenSanPham;
    

?>