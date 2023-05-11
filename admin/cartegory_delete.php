<?php
    include "cartegory_class.php";
    include "./inc/header.php";
    include "./inc/slider.php";
?>
<?php
    //include "cartegory_class.php";
    $cartegory = new cartegory;
    if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id']==NULL){
        echo "<script>window.location= 'cartegory_list.php'</script>";
    }else {
        $cartegory_id = $_GET['cartegory_id'];
    }
    $delete_cartegory = $cartegory -> delete_cartegory($cartegory_id);
    
?>
