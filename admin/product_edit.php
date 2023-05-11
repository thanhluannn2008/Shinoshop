<?php
    include "product_class.php";
    include "./inc/header.php";
    include "./inc/slider.php";
?>

<?php
    $product = new Product();
   // $show_product = $product -> show_product();
   if(!isset($_GET['product_id'])||$_GET['product_id']==NULL){
        echo "<script>window.location = 'product_list.php'</script>";
   }else{
        $id = $_GET['product_id'];
    
   }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $update_product = $product->update_product($_POST, $_FILES, $id);
}
?>

       <div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
<?php
$get_product = $product->get_producById($id);
if ($get_product) {
    while ($result_pd = $get_product->fetch_assoc()) {
?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" required type="text" value="<?php echo $result_pd['product_name']; ?>">
                    <label for="">Chọn danh mục <span style="color: red;">*</span></label>
                    
                    <select name="cartegory_id" id ="">
                    <option value="#">--Chọn--</option>
                        <?php
                             $show_cartegory = $product->show_cartegory();
                            if ($show_cartegory) {
                                while ($result = $show_cartegory->fetch_assoc()) {
                        ?>
                       <option 
                                <?php
                                    if($result['cartegory_id'] == $result_pd['cartegory_id']){
                                        echo 'selected';
                                    }
                                ?>
                                value="<?php echo $result['cartegory_id'] ?>"   >
                       
                       <?php echo $result['cartegory_name'] ?>
                    
                    
                    </option>
                       
                       <?php
                                }
                            }
                       ?>
                    </select>
                    <label for="">Chọn loại sản phẩm <span style="color: red;">*</span></label>
                    <select name="brand_id" id ="">    
                       <option value="#">--Chọn--</option>
                       <?php
        $show_brand = $product->show_brand();
        if ($show_brand) {
            while ($result = $show_brand->fetch_assoc()) {
                       ?>
                       <option 
                       <?php
                                    if($result['brand_id'] == $result_pd['brand_id']){
                                        echo 'selected';
                                    }
                                ?>
                       value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                       <?php
            }
        }
                       ?>
                    </select>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input name="product_price" required type="text" value="<?php echo $result_pd['product_price']; ?>">

                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input name="product_price_new" required type="text" value="<?php echo $result_pd['product_price_new']; ?>">

                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea name="product_desc" id="" cols="30" rows="10" ><?php echo $result_pd['product_desc']; ?></textarea>

                    <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
                    <img src="upload/<?php echo $result_pd['product_img'] ?>">
                    <input name="product_img" required type="file">

                    <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
                    <input name="product_img_desc" required multiple type="file">
                    <button type="submit">Sửa</button>
                </form>
                <?php
    }
}
                ?>
            </div>
    </div>
    </section>
</body>
</html>