<?php
    // Khai báo class
    // Tên class viết dạng UpperCamelCase
    // Tên thuộc tính/property viết dạng lowerCamelCase
    //  Tên phương thức/method viết dạng lowerCamelCase
    class SinhVien {
        // Khai báo thuộc tính
        public $hoVaTen;
        public $namSinh;
        public $maSinhVien;
        public $email;
        public $sdt;
        public $sdtPhuHuynh;

        // Khai báo phương thức/method
        // 1. Phương thức mặc định, luôn luôn phải có, phương thức khởi tạp
        public function __construct() {
            // Hàm khởi tạo mặc định, hàm này sẽ chạy khi khởi tạo object
            // Dùng để khai báo giá trị mặc định cần thiết
        }
        public function __destruct() {
            // Hàm chạy sau khi không sử dụng object
            // Dùng để xóa, reset thông tin thuộc tính, giải phóng bộ nhớ...
        }

        // Các phương thức khác
        public function gioiThieuThongTinCaNhan() {
            // Lấy giá trị thuộc tính trong class để hiển thị 
            // Cấu trúc lệnh $this->tenThuocTinh
            echo "Thông tin cá nhân: <br>";
            echo "Họ Tên: " .$this->hoVaTen. "<br>";
            echo "Năm sinh:" .$this->namSinh. "<br>" ;
            echo "Tuổi:" .(2025 - $this->namSinh). "<br>";
            echo "Email:" . $this->email. "<br>";
            echo "<br>";
        }
    }
?>