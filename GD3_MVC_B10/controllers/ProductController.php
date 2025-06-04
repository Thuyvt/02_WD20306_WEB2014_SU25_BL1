<?php 
    class ProductController {
        // Khai báo thuộc tính cần thiết
        public $productQuery;
        public $categoryQuery;

        // Khai báo phương thức
        public function __construct() {
            $this->productQuery = new ProductQuery();
            $this->categoryQuery = new CategoryQuery();
        }

        public function __destruct() {}

        public function list() {
            // Gọi ProductQuery->all() để lấy danh sách trong CSDL
            $danhSachProduct = $this->productQuery->all();
            // Hiển thị file view
            include 'views/product/list.php';
        }

        public function create() {
            // 1. Tạo biến cần thiết
            $product = new Product();
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";
            // Lấy danh mục trong CSDL
            $danhSachCategory = $this->categoryQuery->all();
            // var_dump($danhSachCategory);
            var_dump($_POST);
            // Xử lý logic tạo mới khi người dùng nhấn nút submit
            if (isset($_POST["submitForm"])) {
                // 2. Gán giá trị cho object $product
                $product->name = trim($_POST["name"]);
                $product->price = trim($_POST["price"]);
                $product->category_id = trim($_POST["category_id"]);
                $product->quantity = trim($_POST["quantity"]);
                $product->image_src = trim($_POST["image_src"]);
                $product->created_date = trim($_POST["created_date"]);

                // 3 Validsate form
                // Validate bắt buộc nhập
                if ($product->name === "" || $product->price === "" || $product->quantity === "") {
                    $thongBaoLoi = "Tên, Giá, Số lương là thông tin bắt buộc nhập";
                }
                // Validate khác 
                // 4. Xử lý upload ảnh 
                // Nội dung nâng cao, TODO sau

                // 5. Gọi lớp model để insert giá trị vào cơ sở dữ liệu
                if ($thongBaoLoi === "") {
                    $data = $this->productQuery->insert($product);
                    if ($data == 1) {
                        // Reset giá trị biến $product
                        $product = new Product();
                        $thongBaoThanhCong = "Tạo mới thành công";
                    }

                } else {
                    $thongBaoLoi = "Tạo mới thất bại, mời bạn nhập lại";
                }

            }
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
            // 1. Tạo biến cần thiết
            $product = new Product();
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";
            // Lấy danh mục trong CSDL
            $danhSachCategory = $this->categoryQuery->all();

            // Kiểm tra giá trị param nhận được
            echo "ID muốn chỉnh sửa là : $id<hr>";
            if ($id !== "") {
                // 2. Gọi lớp model lấy thông tin chi tiết sp theo id
                $product = $this->productQuery->find($id);
                if (isset($_POST["submitForm"])) {
                    // 2. Gán giá trị cho object $product
                    $product->name = trim($_POST["name"]);
                    $product->price = trim($_POST["price"]);
                    $product->category_id = trim($_POST["category_id"]);
                    $product->quantity = trim($_POST["quantity"]);
                    $product->image_src = trim($_POST["image_src"]);
                    $product->created_date = trim($_POST["created_date"]);

                    // 3 Validsate form
                    // Validate bắt buộc nhập
                    if ($product->name === "" || $product->price === "" || $product->quantity === "") {
                        $thongBaoLoi = "Tên, Giá, Số lương là thông tin bắt buộc nhập";
                    }
                    // Validate khác 
                    // 4. Xử lý upload ảnh 
                    // Nội dung nâng cao, TODO sau

                    // 5. Gọi lớp model để update giá trị mới vào cơ sở dữ liệu
                    if ($thongBaoLoi === "") {
                        $data = $this->productQuery->update($product);
                        if ($data == 1 || $data == 0) {
                            // Reset giá trị biến $product
                            $product = new Product();
                            $thongBaoThanhCong = "Cập nhật thành công";
                        }

                    } else {
                        $thongBaoLoi = "Cập nhật thất bại, mời bạn nhập lại";
                    }
                }
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
                // lấy danh sách category
                $danhSachCategory = $this->categoryQuery->all();
                // lấy thông tin chi tiết bản ghi 
                $product = $this->productQuery->find($id);
                // hiển thị file view
                include "views/product/detail.php";
            } else {
                echo "Lỗi: Không tìm thấy thông tin <hr>";
            }
        }
    }
?>