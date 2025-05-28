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
            // Gọi ProductQuery->all() để lấy danh sách trong CSDL
            $danhSachProduct = $this->productQuery->all();
            // Hiển thị file view
            include 'views/product/list.php';
        }

        public function create() {
            // hiển thị file view
            include 'views/product/create.php';
        }

        public function delete($id) {
            // Kiểm tra giá trị param nhận được
            echo "ID muốn xóa là : $id<hr>";
            if ($id !== "") {
                // hiển thị file view
                // Gọi tới phương thức xóa ProductQuery
                $result = $this->productQuery->delete($id);
                // Nếu thành công
                if ($result == 1) {
                    // Chuyển trang
                    header("Location: ?act=product-list");
                } else {
                    echo "Lỗi: Không thể thực hiện xóa <hr>";
                }
                // echo "Xóa thành công<hr>";
                // include "views/product/update.php";
            } else {
                echo "Lỗi: Không tìm thấy thông tin <hr>";
            }
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