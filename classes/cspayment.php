<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>

<?php
class csPayment
{
    private $fm;
    private $db;
    public function __construct()
    {

        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_csPayment()
    {
        $customerName = $_POST['customerName'];
        $customerPhone = $_POST['customerPhone'];
        $province = $_POST['province'];
        $town = $_POST['town'];
        $address = $_POST['address'];
        // $check_name = "SELECT * FROM tbl_cspayment WHERE email = '$customerName'";
        // $result_check = $this->db->select($check_name);
        // if ($result_check) {
        //     $alert = "<span class='error'>Name already existed</span>";
        //     return $alert;
        // } else {
        $query = "INSERT INTO tbl_cuspayment(cusName, cusPhone, province, town, address) 
                VALUES ('$customerName', '$customerPhone', '$province', '$town', '$address')";
        $result = $this->db->insert($query);
        // return $result;
        if ($result) {
            header('location: payment.php');
        }
    }
}
?>