<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Trang chi tiết sản phẩm</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <!-- Khu vực tên -->
        <div style="margin-bottom: 16px">
            <span>Nhập tên:</span>
            <input type="text" name="name" value="<?= $product->name ?>" disabled>
        </div>
        <!-- Khu vực giá -->
        <div style="margin-bottom: 16px">
            <span>Nhập giá:</span>
            <input type="number" name="price" value="<?= $product->price ?>" disabled>
        </div>

        <!-- Khu vực danh mục -->
        <div style="margin-bottom: 16px">
            <span>Danh mục:</span>
            <select name="category_id" disabled>
                <?php
                    foreach($danhSachCategory as $cat) { ?>
                         <option value="<?= $cat->id ?>"> <?= $cat->name ?></option>
                <?php    } 
                ?>
            </select>
        </div>
        <!-- Khu vực ảnh -->
        <div style="margin-bottom: 16px">
            <div>
                <span>Đường dẫn ảnh:</span>
                <input type="text" name="image_src" value="<?= $product->image_src ?>" disabled>
            </div>
            <div>
                <span>Chọn ảnh:</span>
                <input type="file" name="file_upload">
            </div>
        </div>
        <!-- Khu vực số lượng -->
        <div style="margin-bottom: 16px">
            <span>Nhập số lượng:</span>
            <input type="number" name="quantity" value="<?= $product->quantity ?>" disabled>
        </div>
        <!-- Khu vực ngày tạo -->
        <div style="margin-bottom: 16px">
            <span>Nhập ngày tạo:</span>
            <input type="date" name="created_date" value="<?= $product->created_date ?>" disabled>
        </div>

        <!-- Khu vực button -->
        <div style="margin-bottom: 16px">
            <a href="?act=product-list">Quay lại</a>
        </div>

    </form>
</body>
</html>