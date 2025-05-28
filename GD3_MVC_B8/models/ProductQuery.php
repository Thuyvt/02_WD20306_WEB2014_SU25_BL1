<?php
    class ProductQuery {
        // Khai báo thuộc tính
        public $pdo;

        // Khai báo phương
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
                // 1. Khai báo câu lệnh sql 
                $sql = "SELECT * FROM product";

                // 2. Thực thi câu lệnh truy vấn và lấy giá trị danh sách trả về
                $data = $this->pdo->query($sql)->fetchAll();
                // var_dump($data);
                // 3. Convert data sang object Product
                $danhSachSP = [];
                foreach ($data as $value) {
                    $product = new Product();
                    $product->id = $value["id"];
                    $product->name= $value["name"];
                    $product->price =$value["price"];
                    $product->quantity = $value["quantity"];
                    $product->image_src = $value["image_src"];
                    $product->category_id = $value["category_id"];
                    $product->created_date = $value["created_date"];
                    
                    // thêm đối tượng đã convert vào mảng
                    $danhSachSP[] = $product;
                }
                return $danhSachSP;
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage();
            }
        }

        public function delete($id) {
            try {
                // 1. Khai báo sql
                $sql = "DELETE FROM product WHERE `product`.`id` = $id";

                // 2. Thực thi câu sql
                $data = $this->pdo->exec($sql);
                // Lưu ý: $data = 1 nếu thành công
                // 3. Return giá trị cho controller
                // if ($data === 1) {
                //     return "ok";
                // }
                return $data;
            } catch(Exception $error) {
                echo "Lỗi: " .  $error->getMessage();
            }
        }

    }
?>