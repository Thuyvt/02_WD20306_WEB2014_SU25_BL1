<?php 
    class Product {
        // Thuộc tính
        public $id;
        public $name;
        public $price;
        public $category_id;
        public $image_src;
        public $quantity;
        public $created_date;
        
        // Các phương thức mặc định nếu không khai báo thì 
        // class mặc định hiểu ngầm có 2 phương thức __construct(), __destruct()
    }

?>