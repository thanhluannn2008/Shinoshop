<?php
    include "product_class.php";
    include "./inc/header.php";
    include "./inc/slider.php";
?>

<?php
    $pd = new Product();
    $show_product = $pd -> show_product();
?>
       <div class="admin-content-right">
        <div class="admin-content-right-cartegory_list">
                <h1>Danh sách sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Loại sản phẩm</th>
                        <th>Giá</th>
                        <th>Sale</th>
                        <th>Mô tả</th>
                        <th>Ảnh</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php
                     if($show_product){$i=0;
                        while($result = $show_product -> fetch_assoc()){$i++;
                       
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_id'] ?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['cartegory_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td><?php echo $result['product_price'] ?></td>
                        <td><?php echo $result['product_price_new'] ?></td>
                        <td><?php echo $result['product_desc'] ?></td>
                        <td> <img src="upload/<?php echo $result['product_img'] ?>"> </td>
                        <td><a href="product_edit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a>|<a href="product_delete.php?product_id=<?php echo $result['product_id'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>