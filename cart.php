<?php
include 'inc/header.php';

?>

<?php
if(isset($_GET['cartId'])){
    $cart_id = $_GET['cartId'];
    $del_cart = $ct->del_product_cart($cart_id);

}
?>
<!---------------------------------------------------------------------------------- cart ----------------------------------------------------------------------------->
<section class="cart">
    <div class="container">
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-items">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="cart-top-address cart-top-items">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="cart-top-payment cart-top-items">
                    <i class="fa-solid fa-money-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <?php
                if(isset($del_cart)){
                    echo $del_cart;
                }?>
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>SL</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                    $get_product_cart = $ct -> get_product_cart();
                    if($get_product_cart){
                        $subtotal = 0;
                        $sum_quantity =0;
                        while($result = $get_product_cart->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><img src="admin/upload/<?php echo $result['product_img']; ?>" alt=""></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><input type="number" value="<?php echo $result['quantity']; ?>" min="1"></td>
                        <td><?php 
                        $total = $result['quantity'] * $result['product_price'];
                        echo $total; ?> <sup>đ</sup></td>
                        <td><a href="?cartId=<?php echo $result['cart_id']; ?>"><span>X</span></a></td>
                    </tr>
                    <?php
                    $subtotal +=$total;
                    $sum_quantity += $result['quantity'];
                    }
                }
                    ?>
                </table>

            </div>
            <?php
            
            ?>
            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan="2"><b>TỔNG TIỀN GIỎ HÀNG</b></th>
                    </tr>
                    <tr>
                        <td><b>TỔNG SẢN PHẨM:  </b></td>
                        <td><?php echo $sum_quantity;?> </td>
                    </tr>
                    <tr>
                        <td><b>TỔNG TIỀN HÀNG:  </b></td>
                        <td><?php echo $subtotal;?><sup>đ</sup></td>
                    </tr>
                </table>
                <div class="cart-content-right-text">
                    <p>
                    Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000.00đ
                    </p>
                    <p style="color: RED; font-weight: bold;">
                        Mua thêm <span style="font-size: 16px;">131.000<sup>đ</sup></span> được miêm phí SHIP
                    </p>
                </div>
                <div class="cart-content-right-button">
                    <button><a href="cartegory.php">TIẾP TỤC MUA SẮM</a></button><br>
                    <a href="delivery.php"><button>THANH TOÁN</button></a>
                </div>
            </div>
        </div>
    </div>

</section>
<?php
include 'inc/footer.php';

?>