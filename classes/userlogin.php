<?php
    include 'lib/session.php';
session::checkLogin();
    include 'lib/database.php';
    include 'helper/format.php';
?>

<?php
class userlogin{

    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function login_user($User,$Pass){
        $User = $this->fm->validation($User);
        $Pass = $this->fm->validation($Pass);

        $User = mysqli_real_escape_string($this->db->link, $User);
        $Pass = mysqli_real_escape_string($this->db->link, $Pass);

        if(empty($User)|| empty($Pass)){
            $alert = "User and Password must be not empty";
            return $alert;
        }else{
            $query = "SELECT * FROM tbl_user WHERE User = '$User' AND Pass = '$Pass' LIMIT 1";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                session::set('login', true);
                session::set('userID', $value['userID']);
                session::set('User', $value['User']);
               // session::set('adminPass', $value['adminPass']);
                session::set('userName', $value['userName']);
                header('location:index.php');
            }else{
                $alert = "User and Password not match";
                return $alert;

            }
        }
    }
}
?>