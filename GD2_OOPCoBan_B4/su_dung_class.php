<?php
    include "Product.php";
    include "ProductQuery.php";

    // Khởi tạo object của class ProductQuery
    $productQuery = new ProductQuery();
    
    // Gọi hàm lấy danh sách 
    echo "Danh sách sản phẩm: <br>";
    $danhSachSP = $productQuery->all();
    var_dump($danhSachSP);
    echo "<hr>";

    // Gọi hàm thấy thông tin chi tiết
    echo "Chi tiết sản phẩm:<br>";
    $product01 = $productQuery->find(9);
    // Nếu product01 là object Product
    if ($product01 !== null) {
        $product01->displayProductInfor();
    }
    echo "<br>";

    // Xóa bản ghi
    echo "Xóa sản phẩm:<br>";
    $result = $productQuery->delete(7);
    if ($result === 1) {
        echo "Xóa thành công <hr>";
    } else {
        echo "Xóa thất bại <hr>";
    }

    // Tạo mới
    $productTaoMoi = new Product();
    $productTaoMoi->name = "Iphone 17";
    $productTaoMoi->price = 45000000;
    $productTaoMoi->quantity = 100;
    $result02 = $productQuery->insert($productTaoMoi);
    echo "Tạo mới sản phẩm: <br>";
    if ($result02 === 1) {
        echo "Tạo mới thành công <hr>";
    } else {
        echo "Tạo mới thất bại <hr>";
    }
?>