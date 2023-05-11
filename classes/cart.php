<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>

<?php
    class cart {
    private $fm;
    private $db;
    public function __construct(){

        $this-> db = new Database();
        $this->fm = new Format();
    }

    public function add_to_cart($id, $quantity){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sid = session_id();

        $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
        $result = $this->db->select($query)->fetch_assoc();

        // echo '<pre>';
        // echo print_r($result);
        // echo '<pre>';

        $product_img = $result["product_img"];
        $product_price = $result["product_price"];
        $productName = $result["product_name"];

        $query_insert = "INSERT INTO tbl_cart(product_id, sId, product_name, product_price, quantity,product_img) VALUES ('$id', '$sid', '$productName', '$product_price', '$quantity', '$product_img' )";
                $insert_cart = $this->db-> insert($query_insert);
                if($result){
                     header('location: cart.php');
                }

    }

    public function get_product_cart(){
        $sid = session_id();
        $query= "SELECT * FROM tbl_cart WHERE sId = '$sid'";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_product_cart($cart_id){
        $cart_id = mysqli_real_escape_string($this->db->link, $cart_id);
        $query = "DELETE FROM tbl_cart WHERE cart_id = '$cart_id'";
        $result = $this->db->delete($query);
        if($result){
            header('location:cart.php');
        }else{
            $msg = '<span class="eror">Product delete not successfully</span>';
            return $msg;
        }
    }

    }
?>