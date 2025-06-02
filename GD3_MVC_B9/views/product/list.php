<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Trang Danh sách sản phẩm</h3>
    <!-- <?php 
        var_dump($danhSachProduct);
    ?> -->
    <!-- Khu vực điều hướng -->

    <a href="?act=product-create">Trang tạo mới</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- C1: Chèn code HTML vào PHP -->
               <?php
                // foreach($danhSachProduct as $pro) { 
                //     echo "<tr>";
                //     echo "    <td>$pro->id</td>";
                //     echo "    <td>$pro->name</td>";
                //     echo "    <td>$pro->price</td>";
                //     echo "    <td>$pro->category_id</td>";
                //     echo "    <td>$pro->image_src</td>";
                //     echo "    <td>$pro->quantity</td>";
                //     echo "    <td>$pro->created_date</td>";
                //     echo "    <td>";
                //     echo "         <a href='?act=product-update&id=$pro->id'>Sửa</a>
                //                     <a href='?act=product-delete&id=$pro->id'>Xóa</a>";
                //     echo "    </td>";
                //     echo " </tr>";

                // }
            ?>
            <!-- // C2: Chèn code PHP vào html -->
            <?php
                foreach($danhSachProduct as $pro) { ?>
                    <tr>
                        <td><?= $pro->id ?></td>
                        <td><?= $pro->name ?></td>
                        <td><?= $pro->price ?></td>
                        <td><?= $pro->category_id ?></td>
                        <td><?= $pro->image_src ?></td>
                        <td><?= $pro->quantity ?></td>
                        <td><?= $pro->created_date ?></td>
                        <td>
                            <a href="?act=product-update&id=<?= $pro->id ?>">Sửa</a>
                            <a href="?act=product-delete&id=<?= $pro->id ?>" 
                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                Xóa</a>
                        </td>
                    </tr>

            <?php    }
            ?> 
          
        </tbody>
    </table>
</body>
</html>