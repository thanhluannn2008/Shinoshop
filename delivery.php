<?php
include 'inc/header.php';
// include 'lib/session.php';
// session::init();

?>

<?php
// include './lib/database.php';
// include './helper/format.php';
// include './classes/category.php';
// include './classes/brand.php';

// spl_autoload_register(function ($classname) {
//     include_once "classes/" . $classname . ".php";
// });
 ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csp = new csPayment();
    $insert_csPayment = $csp->insert_csPayment();
}

?>

<!---------------------------------------------------------------------------------- DELIVERY ----------------------------------------------------------------------------->
<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-items">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="delivery-top-address delivery-top-items">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="delivery-top-payment delivery-top-items">
                    <i class="fa-solid fa-money-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="delivery-content row">
            <div class="delivery-content-left">
                <p>Vui lòng chọn đia chỉ giao hàng</p>
                <div class="delivery-content-left-signIn row">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <p>Đăng nhập (Nếu bạn đã có tài khoản)</p>
                </div>
                <div class="delivery-content-left-guest row">
                    <input checked name="loaiKhach" type="radio">
                    <p><span style="font-weight: bold;">Khách lẻ</span>(Nếu bạn không muốn lưu lại thông tin)</p>
                </div>
                <div class="delivery-content-left-dangKy row">
                    <input name="loaiKhach" type="radio">
                    <p><span style="font-weight: bold;">Đăng ký</span>(Tạo tài khoản mới với thông tin bên dưới)</p>
                </div>
                <form action="" method="POST">
                    <?php
                    if (isset($insert_csPayment)) {
                        echo $insert_csPayment;
                    }
                    ?>
                    <div class="delivery-content-left-input-top row">
                        <div class="delivery-content-left-input-top-items">
                            <label for="">Họ tên <span style="color: red;">*</span></label>
                            <input type="text" name="customerName">
                        </div>
                        <div class="delivery-content-left-input-top-items">
                            <label for="">Điện thoại <span style="color: red;">*</span></label>
                            <input type="text" name="customerPhone">
                        </div>
                        <div class="delivery-content-left-input-top-items">
                            <label for="">Tỉnh/Tp <span style="color: red;">*</span></label>
                            <input type="text" name="province">
                        </div>
                        <div class="delivery-content-left-input-top-items">
                            <label for="">Quận/Huyện <span style="color: red;">*</span></label>
                            <input type="text" name="town">
                        </div>
                    </div>
                    <div class="delivery-content-left-input-bottom">
                        <div class="delivery-content-left-input-bottom-items">
                            <label for="">Địa chỉ <span style="color: red;">*</span></label>
                            <input type="text" name="address">
                        </div>

                    </div>
                    <div class="delivery-content-left-button row">
                    <a href="cart.php">
                        <p><span><i class="fa-solid fa-angles-left"></i></span> Quay lại trang giỏ hàng</p>
                    </a>
                    <input class="" type="submit" name="submit"
                            value="THANH TOÁN VÀ GIAO HÀNG">
                </div>
                </form>
                <!-- <div class="delivery-content-left-button row">
                    <a href="cart.php">
                        <p><span><i class="fa-solid fa-angles-left"></i></span> Quay lại trang giỏ hàng</p>
                    </a>
                    <a href="payment.php"><input class="" type="submit" name="payment"
                            value="THANH TOÁN VÀ GIAO HÀNG"></a>
                </div> -->

            </div>
            <div class="delivery-content-right">
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th></th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>

                    <?php
                    $get_product_cart = $ct->get_product_cart();
                    if ($get_product_cart) {
                        $subtotal = 0;
                        $sum_quantity = 0;
                        while ($result = $get_product_cart->fetch_assoc()) {

                            ?>
                    <tr>
                        <td>
                            <?php echo $result['product_name']; ?>
                        </td>
                        <td></td>
                        <td><input type="number" value="<?php echo $result['quantity']; ?>" min="1"></td>
                        <td>
                            <p>
                                <?php
                                $total = $result['quantity'] * $result['product_price'];
                                echo $total; ?> <sup>đ</sup>
                            </p>
                        </td>
                    </tr>
                    <?php
                    $subtotal += $total;
                    $sum_quantity += $result['quantity'];
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="3" style="font-weight: bold;">Tổng</td>
                        <td style="font-weight: bold;">
                            <p>
                                <?php echo $subtotal; ?><sup>đ</sup>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: bold;">Thuế VAT</td>
                        <td style="font-weight: bold;">
                            <p>69.000<sup>đ</sup></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: bold;">Tổng tiền hàng</td>
                        <td style="font-weight: bold;">
                            <?php
                            $sum = $subtotal - 69000;
                            echo $sum;
                            ?>
                            <sup>đ</sup></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include 'inc/footer.php';

?>