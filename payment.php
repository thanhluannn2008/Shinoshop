<?php
include 'inc/header.php';
?>
<section class="payment">
    <div class="container">
        <div class="payment-top-wrap">
            <div class="payment-top">
                <div class="payment-top-cart payment-top-items">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="payment-top-address payment-top-items">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="payment-top-payment payment-top-items">
                    <i class="fa-solid fa-money-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="payment-content row">
            <div class="paymnet-content-left">
                <div class="paymnet-content-left-method-delivery">
                    <p style="font-weight: bold;">Phương thức giao hàng</p>
                    <div class="paymnet-content-left-method-delivery-items">
                        <input type="radio">
                        <label for="">Giao hàng chuyển phát nhanh</label>
                    </div>
                    <div class="paymnet-content-left-method-payment">
                        <p style="font-weight: bold;">Phương thức thanh toán</p>
                        <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không được lưu lại</p>
                        <div class="paymnet-content-left-method-payment-items">
                            <input checked name="method-payment" type="radio">
                            <label for="">Thanh toán bằng thẻ tín dụng(OnePay)</label>
                        </div>
                        <div class="paymnet-content-left-method-payment-items-img">
                            <img src="images/visa.png" alt="">
                        </div>
                        <div class="paymnet-content-left-method-payment-items">
                            <input checked name="method-payment" type="radio">
                            <label for="">Thanh toán bằng thẻ ATM</label>
                        </div>
                        <div class="paymnet-content-left-method-payment-items-img">
                            <img src="images/vcb.jpg" alt="">
                        </div>
                        <div class="paymnet-content-left-method-payment-items">
                            <input checked name="method-payment" type="radio">
                            <label for="">Thanh toán qua ví MOMO</label>
                        </div>
                        <div class="paymnet-content-left-method-payment-items-img">
                            <img src="images/momo.jpg" alt="">
                        </div>
                        <div class="paymnet-content-left-method-payment-items">
                            <input checked name="method-payment" type="radio">
                            <label for="">Thu tiền tận nơi</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment-content-right">
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã giảm giá/quà tặng">
                    <button><i class="fa-solid fa-check"></i></button>
                </div>
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã cộng tác viên">
                    <button><i class="fa-solid fa-check"></i></button>
                </div>
                <div class="payment-content-right-mnv">
                    <select name="" id="">
                        <option value="">Chọn mã nhân viên thân thiết</option>
                        <option value="">D345</option>
                        <option value="">D346</option>
                        <option value="">D347</option>
                        <option value="">D348</option>
                        <option value="">D349</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="payment-content-left-button row">
            <a href="delivery.php"> <p><span><i class="fa-solid fa-angles-left"></i></span> Quay lại</p></a>
            <a href="?cartId=<?php echo $result['cart_id']; ?>"><button><p style="font-weight: bold;">THANH TOÁN</p></button></a>
         </div>
    </div>
</section>
<?php
include 'inc/footer.php';

?>