
<section class="admin-content">
        <div class="admin-content-left">
            <ul>
                <li>
                    <a href="#">Danh mục</a>
                    <ul>
                        <li><a href="cartegory_add.php">Thêm danh mục</a></li>
                        <li><a href="cartegory_list.php">Danh sách danh mục</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Loại sản phẩm</a>
                    <ul>
                        <li><a href="brand_add.php">Thêm loại sản phẩm</a></li>
                        <li><a href="brand_list.php">Danh sách loại sản phẩm</a></li>
                    </ul>
                </li>
                <li>    
                    <a href="#">Sản phẩm</a>
                    <ul>
                        <li><a href="product_add.php">Thêm sản phẩm</a></li>
                        <li><a href="product_list.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <?Php
                    include '../lib/session.php';
                    session::checkSession();
                ?>

                <?php
                if(isset($_GET['action'])&& $_GET['action']=='logout'){
                    session::destroy();
                }
                 ?>
                <li class="logout">
                     <a href="?action=logout">Đăng xuất</a>
                </li>

            </ul>
        </div>