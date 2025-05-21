<?php 
    class ProductQuery {
        // Khai báo thuộc tính
        public $pdo;

        // Khai báo phương thức
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

        // Các phương thức mở rộng
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

                    // thêm đối tượng đã convert vào mảng
                    $danhSachSP[] = $product;
                }
                return $danhSachSP;
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage();
            }
        }

        // Lấy thông tin chi tiết bản ghi theo id
        public function find($id) {
            try {
                // 1. Khai báo câu lệnh sql lấy chi tiết
                $sql = "SELECT * FROM `product` WHERE id = $id";
                // 2. Thực thi truy vấn và lấy giá trị trả về
                $data = $this->pdo->query($sql)->fetch();
                // 3. Convert dữ liệu sang object Product
                // Kiểm ra xem bản ghi tồn tại trong CSDL không 
                // $data == false là không có dữ liệu
                if ($data === false) {
                    echo "// Bản ghi không tồn tại. Vui lòng kiểm tra lại";
                    return;
                } else {
                    $product = new Product();
                    $product->id = $data["id"];
                    $product->name = $data["name"];
                    $product->price = $data["price"];
                    $product->quantity = $data["quantity"];

                    return $product;
                }
            } catch (Exception $er) {
                echo "Lỗi: " .$er->getMessage() ."<br>";
            }
        }

        // Hàm xử lý chức năng xóa
        public function delete($id) {
            try {
                // 1. Khai báo câu sql
                $sql = "DELETE FROM product WHERE `product`.`id` = $id";

                // 2. Thực thi câu lệnh 
                $data = $this->pdo->exec($sql);
                // $data = 1 nếu thực hiện thành công
                return $data;
                
            } catch(Exception $error) {
                echo "Lỗi: " . $error->getMessage() . "<br>";
            }
        }

        public function insert(Product $product) {
            try {
                // 1. Khai báo câu sql
                $sql = "INSERT INTO `product` 
                (`id`, `name`, `price`, `quantity`) 
                VALUES (NULL, '".$product->name."', '".$product->price."', '".$product->quantity."');";
                // 2. Thực thi câu lệnh 
                $data = $this->pdo->exec($sql);
                // insert thành công $data = 1
                return $data; 
            } catch(Exception $error) { 
                echo "Lỗi: ".$error ->getMessage();
            }
        }
    }
?>