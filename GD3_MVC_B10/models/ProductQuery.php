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
                $sql = "SELECT pro.*, cat.name as category_name 
                FROM `product` as pro JOIN `category` as cat 
                ON pro.category_id = cat.id;";

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
                    $product->category_name = $value["category_name"];
                    
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
        public function insert(Product $product) {
            try {
                // 1. Khai báo sql
                $sql = "INSERT INTO `product` (`id`, `name`, `price`, `category_id`, `image_src`, `quantity`, `created_date`) 
                VALUES (NULL, '".$product->name."', '".$product->price."', '".$product->category_id."',
                 '".$product->image_src."', '".$product->quantity."', '".$product->created_date."');";
                // 2. Thực thi
                $data = $this->pdo->exec($sql);
                // 3. return giá trị 
                return $data;
            } catch(Exception $error) {
                
            }
        }

        // Hàm tìm thông tin sản phẩm theo id
        public function find($id) {
            try {
                // Khai báo sql
                $sql = "SELECT * FROM product WHERE id = $id";
                // Thực thi
                $data = $this->pdo->query($sql)->fetch();
                if ($data !== false) {
                    // Convert data sang object Product
                    $product = new Product();
                    $product->id = $data["id"];
                    $product->name= $data["name"];
                    $product->price =$data["price"];
                    $product->quantity = $data["quantity"];
                    $product->image_src = $data["image_src"];
                    $product->category_id = $data["category_id"];
                    $product->created_date = $data["created_date"];
                    return $product;
                } else {
                    echo "// Bản ghi không tôn tại, vui lòng kiểm tra lại";
                }
                 
            } catch(Exception $error) {
                echo "Lỗi: ". $error->getMessage();
            }
        }

        // hàm update
        public function update(Product $product) {
            try {
                // 1. Khai báo sql
                $sql = "UPDATE `product` SET `name` = '$product->name', 
                `price` = '$product->price', `category_id` = '$product->category_id', 
                `image_src` = '$product->image_src', `quantity` = '$product->quantity', 
                `created_date` = '$product->created_date' WHERE `product`.`id` = $product->id;";
                // 2. Thực thi
                $data = $this->pdo->exec($sql);
                
                // 3. Return 
                return $data;

            }catch (Exception $error) {
                echo "Lỗi: ". $error->getMessage();
            }
        }
    }
?>