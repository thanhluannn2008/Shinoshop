<?php
include '../lib/database.php';
?>

<?php
    class Product {
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
        }


        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
            $result = $this -> db -> select($query);
            return $result;
        }

        public function show_brand(){
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
             $query = "SELECT tbl_brand. *, tbl_cartegory.cartegory_name
             FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
             ORDER BY tbl_brand.brand_id DESC";
             $result = $this -> db -> select($query);
             return $result;
         }

        public function delete_product($product_id){
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this -> db -> delete($query);
            header('Location:product_list.php');
            return $result;
        }

        public function get_product($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this -> db -> select($query);
            return $result;
        }

        public function show_product(){
        $query = "SELECT * from tbl_product as pd
        inner join tbl_brand as br
        on pd.brand_id= br.brand_id
        inner join tbl_cartegory as cat
        on cat.cartegory_id = br.cartegory_id
        order by pd.product_id desc";
            $result = $this -> db -> select($query);
            return $result;
         }
    public function get_producById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
        $result = $this->db->select($query);
        return $result;
     }

     public function get_product_detail($id){
        $query = "SELECT * from tbl_product as pd
        inner join tbl_brand as br
        on pd.brand_id= br.brand_id
        inner join tbl_cartegory as cat
        on cat.cartegory_id = br.cartegory_id
        where pd.product_id = '$id'
        order by pd.product_id desc";
            $result = $this -> db -> select($query);
            return $result;
         }
    //     public function update_product($id){
    //         $product_name = $_POST['product_name'];
    //         $cartegory_id = $_POST['cartegory_id'];
    //         $brand_id = $_POST['brand_id'];
    //         $product_price = $_POST['product_price'];
    //         $product_price_new = $_POST['product_price_new'];
    //         $product_desc = $_POST['product_desc'];
    //         $product_img = $_FILES['product_img']['name'];

    //         $permited = array('jpg', 'jpeg', 'png', 'gif');
    //         $file_name = $_FILES['product_img']['name'];
    //         $file_size = $_FILES['product_img']['size'];
    //         $file_temp = $_FILES['product_img']['tmp_name'];

    //         $div = explode('.', $file_name);
    //         $file_ext = strtolower(end($div));
    //         $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    //         $upload_image = "upload/" . $unique_image;

    //         if(!empty($file_name)){
    //             if($file_size>20480){
    //             $alert = "<span class = 'success'> Ảnh tải lên nên dưới 20MB!!</span> ";
    //                 return $alert;
    //             }elseif(in_array($file_ext, $permited)===false){
    //                 $alert = "<span class = 'success'> You can upload only: ".implpode(',',$permited)." </span>";
    //                 return $alert;
    //             }
    //             $query = "UPDATE tbl_product 
    //             SET 
    //              product_name = '$product_name',
    //              cartegory_name = '$cartegory_id',
    //              brand_name = '$brand_id',
    //              product_price = '$product_price',
    //              product_price_new = '$product_price_new',
    //              product_img = '$unique_image',
    //              product_desc = '$product_desc',
    //              WHERE  product_id='$id'";
    //         }else{
    //             $query = "UPDATE tbl_product 
    //             SET 
    //              product_name = '$product_name',
    //              cartegory_name = '$cartegory_id',
    //              brand_name = '$brand_id',
    //              product_price = '$product_price',
    //              product_price_new = '$product_price_new',
    //              product_desc = '$product_desc',
    //              WHERE  product_id='$id'";
    //         }

    //         $result = $this->db->insert($query);
    //         return $result;
          
    //     }

    public function insert_product()
    {
        $product_name = $_POST['product_name'];
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_price_new = $_POST['product_price_new'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];

         $permited = array('jpg', 'jpeg', 'png', 'gif');
         $file_name = $_FILES['product_img']['name'];
         $file_size = $_FILES['product_img']['size'];
         $file_temp = $_FILES['product_img']['tmp_name'];

         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
         $upload_image = "upload/" . $unique_image;
        move_uploaded_file($_FILES['product_img']['tmp_name'], "upload/" . $_FILES['product_img']['name']);
        $query = "INSERT INTO tbl_product (
                product_name,
                cartegory_id,
                brand_id,
                product_price,
                product_price_new,
                product_desc,
                product_img) VALUES (
                    '$product_name',
                    '$cartegory_id',
                    '$brand_id',
                    '$product_price',
                    '$product_price_new',
                    '$product_desc',
                    '$product_img')";
        $result = $this->db->insert($query);
        return $result;
        // header('Location:brand_list.php');

        if ($result) {
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $product_id = $result['product_id'];
            $filename = $_FILES['product_img_desc']['name'];
            $filttmp = $_FILES['product_img_desc']['tmp_name'];

            foreach ($filename as $key => $value) {
                move_uploaded_file($filttmp[$key], "uploads/" . $value);
                $query = "INSERT INTO tbl_product_img_desc(product_id, product_img_desc) VALUES ('$product_id','$value')";
                $result = $this->db->insert($query);
            }

            //  }
            return $result;
        }
    }

        
    }
?>