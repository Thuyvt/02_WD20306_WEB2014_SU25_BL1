<?php
    class CategoryQuery {
        public $pdo;

        public function __construct() {
            // Sử dụng PDO kết nối CSDL
            try {
                $this->pdo = new PDO("mysql:host=localhost;port=3306;dbname=02_wd20306_web2014_su25_bl1", "root", "");
                echo "// Kết nối cơ sở dữ liệu thành công <hr>";
            } catch (Exception $error) {
                echo "// Lỗi : " . $error ->getMessage();
                echo "<br>";
            }
        }

        public function __destruct() {
            // Đóng kết nối với CSDL
            $this->pdo = null;
        }

        public function all() {
            try {
                // 1. Khai báo sql
                $sql = "SELECT * FROM category";
                // 2. Thực thi sql
                $data = $this->pdo->query($sql)->fetchAll();
                // 3. Convert data sang object
                $danhSachCateogy = [];
                foreach ($data as $value) {
                    $object = new Category();
                    $object->id = $value["id"];
                    $object->name = $value["name"];
                    $danhSachCateogy[] = $object;
                }
                return $danhSachCateogy;
            } catch(Exception $error) {

            }
        }
    }
?>