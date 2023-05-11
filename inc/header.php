<?php
include './lib/session.php';
session::init();
?>

<?php
include './lib/database.php';
include './helper/format.php';
include './classes/category.php';
include './classes/brand.php';

spl_autoload_register(function ($classname) {
    include_once "classes/" . $classname . ".php";
});

//     $db = new Database();
//     $fm = new Format();
     $ct = new cart();
//     $us = new user();
     $cat = new cartegory();
     $pd = new Product();
     $br = new brand();
     $cs = new customer();
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="./asset/styles.css">
    <title>SHINO Perfurme</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="./img/SHINO-removebg-preview.png" alt="logo IVY Moda"></a>
        </div>
        <div class="menu">
        <li><a href="cartegory.php">BỘ SƯU TẬP</a></li>
                <?php
                    $cartegory = $cat->get_cartegoryFE();
                if ($cartegory) {
                    while ($result = $cartegory ->fetch_assoc()) {

                ?>
            <li><a href=""><?php echo $result['cartegory_name']; ?></a>
                <ul class="sub-menu-1">
                    <li><a href="">Thương hiệu</a></li>
                        <ul>
                            <?php
                                $brand = $br->get_brandFE();
                                if ($brand) {
                                    while ($result = $brand ->fetch_assoc()) {

                            ?>
                            <li><a href=""><?php echo $result['brand_name']; ?></a></li>
                            <?php
                                    }
                             }
                            ?>
                        </ul>
    
                </ul>
            </li>

            <?php
                    }
                }
            ?>
            <li><a href="contact.php">LIÊN HỆ</a></li>
        </div>
        <div class="other">
            <li>
                <form method="get" action="cartegory.php?quanly=timkiem">
                    <input placeholder="Tìm kiếm..."  type="text" name="tukhoa"> 
                    <button><input type="submit" value="Tìm"></i></button>
                </form>
            </li>
            <li>
                <a href="login.php"><i class="fa-solid fa-user"></i></a>
            </li>
            <li>
                <a href="contact.php"><i class="fa-solid fa-headphones"></i></a>
            </li>
            <li>
                <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            </li>
            <?php
                if(isset($_GET['action'])&& $_GET['action']=='logout'){
                    session::destroy();
                }
                 ?>
            <li class="logout">
                <?php
                $login_check = session::get('login');
                if($login_check== false){
                    echo '<a href="login.php">Đăng nhập</a>';
                }else{
                    // echo "<a href='?action=logout'>Đăng nhập</a>";
                    echo "<a href='?action=logout'>Đăng xuất</a>";
                }
                ?>
            </li>
        </div>
    </header>
