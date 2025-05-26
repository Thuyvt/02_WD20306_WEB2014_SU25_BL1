<?php 
    class ProductController {
        // Khai báo thuộc tính cần thiết
        public $productQuery;

        // Khai báo phương thức
        public function __construct() {
            $this->productQuery = new ProductQuery();
        }

        public function __destruct() {}

        public function list() {
            // Hiển thị file view
            include 'views/product/list.php';
        }

        public function create() {
            // hiển thị file view
            include 'views/product/create.php';
        }

        public function update($id) {
            // Kiểm tra giá trị param nhận được
            echo "ID muốn chỉnh sửa là : $id<hr>";
            if ($id !== "") {
                // hiển thị file view
                include "views/product/update.php";
            } else {
                echo "Lỗi: Không tìm thấy thông tin <hr>";
            }
        }

        
        public function detail($id) {
            // Kiểm tra giá trị param nhận được
            echo "ID muốn xem chi tiết là : $id<hr>";
            if ($id !== "") {
                // hiển thị file view
                include "views/product/detail.php";
            } else {
                echo "Lỗi: Không tìm thấy thông tin <hr>";
            }
        }
    }
?>