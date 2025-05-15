<!-- Khu vực xử lý code logic php -->
<?php 
    //1. Khai báo mảng 2 chiều
    $danhSachSinhVien = array(
        array("ten" => "Nguyễn Văn A", "tuoi" => 18, "diaChi" =>"Hà Nội"),
        array("ten" => "Nguyễn Thị B", "tuoi" => 18, "diaChi" =>"Hải Phòng"),
        array("ten" => "Trần Văn C", "tuoi" => 19, "diaChi" =>"Nam Định")
    );
    $danhSachBanDau = $danhSachSinhVien;
    // 2. Hiển thị dữ liệu mảng 2 chiều trên html

    // 3. Kiểm tra dữ liệu submit form
    echo "Log thử giá trị người dùng nhập vào form";
    var_dump($_GET);
    echo "<br><br>";

    // Nếu submit form tìm kiếm tuyệt đối
    if (isset($_GET["tkTuyetDoi"])) {
        echo "Submit form tuyệt đối <br>";
        // lấy dữ liệu nhập vào form và lưu vào biến cần thiết
        // trim(): loại bỏ khoảng trắng đầu cuối
        $tenTimKiem = trim($_GET["tenSv"]);
        if ($tenTimKiem !== "") {
            //duyệt mảng chính kiểm tra phần tử không thỏa mãn => xóa phần tử khỏi mảng
            foreach($danhSachSinhVien as $key => $value) {
                if($value["ten"] !== $tenTimKiem) {
                    unset($danhSachSinhVien[$key]);
                }
            }
        }
    }

    // Nếu submit form tìm kiếm tương đối
    if (isset($_GET["tkTuongDoi"])) {
        // Lấy dữ liệu nhập vào form và lưu vào biến
        $tenTimKiem = $_GET["tenSv"];
        $diaChi = $_GET["diaChi"];

        // kiểm tra giá trị tên nhập vào
        if ($tenTimKiem !== "") {
            // Duyệt mảng chính kiểm tra phần tử không thỏa mãn và xóa khỏi mảng
            foreach($danhSachSinhVien as $key => $value) {
                $viTri = strpos(strtolower($value["ten"]), strtolower($tenTimKiem));
                if($viTri === false) {
                    unset($danhSachSinhVien[$key]);
                }
            }
        }
        // tìm theo địa chỉ
        // kiểm tra giá trị tên nhập vào
        if ($diaChi !== "") {
            // Duyệt mảng chính kiểm tra phần tử không thỏa mãn và xóa khỏi mảng
            foreach($danhSachSinhVien as $key => $value) {
                $viTri = strpos(strtolower($value["diaChi"]), strtolower($diaChi));
                if($viTri === false) {
                    unset($danhSachSinhVien[$key]);
                }
            }
        }
    }


    // Lấy lại danh sách sinh viên như ban đầu
    if(isset($_GET["taiLai"])) {
        $danhSachSinhVien = $danhSachBanDau;
    }

?>
<!-- Khu vực code html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td { padding: 8px 16px;}
    </style>
</head>
<body>
    <!-- Khu vực form tìm kiếm tuyệt đối -->
    <h3>1. Form tìm kiếm tuyệt đối</h3>
    <p>Logic:</p>
    <ul>'
        <li>Nhập đầy dủ tên sinh viên để tìm kiếm</li>
        <li>Hỗ trợ loại bỏ khoảng trắng đầu và cuối</li>
    </ul>
    <!-- Khu vực bảng dữ liệu -->
    <form action="" method="GET">
        <span>Nhập tên:</span>
        <input type="text" name="tenSv">
        <button type="submit" name="tkTuyetDoi">Tìm kiếm</button>
    </form>
        <!-- Khu vực form tìm kiếm tương đối -->
     <h3>2. Form tìm kiếm tương đối</h3>
     <p>Logic:</p>
     <ul>
        <li>Hỗ trợ nhập một vài ký tự và tìm kiếm được</li>
        <li>Hỗ trợ loại bỏ khoảng trắng đầu cuối</li>
        <li>Hỗ trợ tìm kiếm không phân biệt hoa thường</li>
        <li>Hỗ trợ hiển thị lại giá trị đã nhập trước đõ</li>
        <li>Hỗ trợ tìm kiếm kết hợp tên và địa chỉ</li>
        <li>Hỗ trợ button tải lại</li>
     </ul>
    <form action="" method="GET">
        <!-- Tìm kiếm tương đối -->
        <span>Nhập tên:</span>
        <?php 
            if(!isset($_GET["tkTuongDoi"])) {
                echo '  <input type="text" name="tenSv">';
            } else  {
                echo '  <input type="text" name="tenSv" value="' . $tenTimKiem.'">';
            }
        ?>
        <span>Nhập địa chỉ:</span>
        <?php
            if(!isset($_GET["tkTuongDoi"])) {
                echo '  <input type="text" name="diaChi">';
            } else  {
                echo '  <input type="text" name="diaChi" value="' . $diaChi.'">';
            }
        ?>
        <button type="submit" name="tkTuongDoi">Tìm kiếm</button>
    </form>
    <form action="" method="GET">
        <button type="submit" name="taiLai">Tải lại</button>
    </form>
    <h3>Danh sách bảng</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(count($danhSachSinhVien) >0) {
                    foreach ($danhSachSinhVien as $item) {
                        echo "";
                        echo "<tr>";
                        echo "<td>".$item["ten"]."</td>";
                        echo "<td>".$item["tuoi"]."</td>";
                        echo "<td>".$item["diaChi"]."</td>";
                        echo " </tr>";
                    }   
                } else {
                    echo "<tr>";
                    echo '   <td colspan="3">Không có dữ liệu</td>';
                    echo "</tr>";
                }
               
            ?>

        </tbody>
    </table>
    
</body>
</html>