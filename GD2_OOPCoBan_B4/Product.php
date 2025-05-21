<?php 
    class Product {
        // Khai báo thuộc tính
        public $id;
        public $name;
        public $price;
        public $quantity;

        // Khai báo phương thức mặc định
        public function __construct() {}
        
        public function __destruct() {}

        public function displayProductInfor() {
            echo "Id: " . $this->id . "<br>";
            echo "Tên: " .$this->name . "<br>";
            echo "Giá: " . $this->price. "<br>";
            echo "Số lượng: " . $this->quantity. "<br>";
        }
    }
?>
