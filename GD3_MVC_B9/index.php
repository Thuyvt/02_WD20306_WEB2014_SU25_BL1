<?php
    // 1. include tất cả file trong model và controller
    include "controllers/ProductController.php";

    include "models/Product.php";
    include "models/ProductQuery.php";
    include "models/Category.php";
    include "models/CategoryQuery.php";

    // 2. Lấy các giá trị cần thiết từ url
    $act = "";
    if(isset($_GET["act"])) {
        $act = $_GET["act"];
    }
    echo "Giá trị act là: $act <hr>";
    // Lấy giá trị id
    $id = "";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    echo "Giá trị id là: $id <hr>";

    // Điều hướng sang trang cần thiết
    var_dump($act);
    match($act) {
        '' => (new ProductController)->list(),
        'product-list' => (new ProductController)->list(),
        'product-create' => (new ProductController)->create(),
        'product-detail' => (new ProductController)->detail($id),
        'product-update' => (new ProductController)->update($id),
        'product-delete' => (new ProductController)->delete($id)
    }
?>