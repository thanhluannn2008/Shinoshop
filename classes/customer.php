<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>

<?php
    class customer {
    private $fm;
    private $db;
    public function __construct(){

        $this-> db = new Database();
        $this->fm = new Format();
    }

    // public function insert_customer($data){
    //     $email = mysqli_real_escape_string($this->db->link, $data['email']);
    //     $username = mysqli_real_escape_string($this->db->link, $data['username']);
    //     $pass = mysqli_real_escape_string($this->db->link, $data['pass']);
    //     if($email="" || $username = "" || $pass = ""){
    //         $alert = "<span class='error'>Field must be not empty</span>";
    //         return  $alert;
    //     }else{
    //         $check_email = "SELECT * FROM tbl_customer WHERE email = '$email'";
    //         $result_check = $this->db->select($check_email);
    //         if($result_check){
    //             $alert = "<span class='error'>Email already existed</span>";
    //             return $alert;
    //         }else{
    //             $query = "INSERT INTO 
    //             tbl_customer(
    //                 email, 
    //                 userName, 
    //                 pass) VALUES(
    //                     '$email', 
    //                     '$username', 
    //                     '$pass')";
    //             $result = $this->db-> insert($query);
    //             if($result){
    //                 $alert = "<span class='error'>Insert account sucessfully</span>";
    //                 return $alert;
    //             }else{
    //                 $alert = "<span class='error'>Insert account not sucess</span>";
    //                 return $alert;
    //             }
    //         }
    //     }
    // }
    public function insert_customer(){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
            $check_email = "SELECT * FROM tbl_customer WHERE email = '$email'";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'>Email already existed</span>";
                return $alert;
            }else{
                $query = "INSERT INTO 
                tbl_customer(
                    email, 
                    userName, 
                    pass) VALUES(
                        '$email', 
                        '$username', 
                        '$pass')";
                $result = $this->db-> insert($query);
                if($result){
                    $alert = "<span class='error'>Insert account sucessfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Insert account not sucess</span>";
                    return $alert;
                }
            }
        }
    public function login_customer(){
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $username = mysqli_real_escape_string($this->db->link, $username);
        $pass = mysqli_real_escape_string($this->db->link, $pass);

        if(empty($username)|| empty($pass)){
            $alert = "User and Password must be not empty";
            return $alert;
        }else{
            $query = "SELECT * FROM tbl_customer WHERE username = '$username' AND pass = '$pass' LIMIT 1";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                session::set('login', true);
                session::set('id', $value['id']);
                session::set('username', $value['username']);
               // session::set('adminPass', $value['adminPass']);
                header('location:index.php');
            }else{
                $alert = "User and Password not match";
                return $alert;

            }
        }
    }
    }
?>