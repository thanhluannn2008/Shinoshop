<?php
include 'inc/header.php';
include '../classes/adminlogin.php';
?>
<?php
$class = new adminlogin();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $adminUser = $_POST['adminUser'];
  $adminPass = $_POST['adminPass'];

  $login_check = $class->login_admin($adminUser,$adminPass);

}
?>
<form action="login.php" method="post">
  <h1>Admin Login</h1>
 <span>
 <?php
    if(isset($login_check)){
   echo $login_check;
    }
  ?>

 </span>
    <div class="container">
      <label ><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="adminUser" >
  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="adminPass">
  
      <button type="submit">Login</button>
    </div>
  
    <div class="container" style="background-color: #dddddd">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>