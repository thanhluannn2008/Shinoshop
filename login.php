<?php
include 'lib/session.php';
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

$cs = new customer();
// ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Login/Registor</title>
</head>
<?php
$login_check = session::get('login');
if ($login_check) {
  header('location:index.php');
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $insert_customer = $cs->insert_customer($_POST);
}

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  $login_customer = $cs->login_customer($_POST);
}

?>

<body>
  <div class="container mt-3">
    <div class="row p-2" style="border: 1px solid black; border-radius: 10px;">
      <div class="col-md-4 p-2" style="border: 1px solid #dddd; border-radius: 10px;">
        <form action="" method="POST" class="needs-validation" novalidate>
          <h1 class="text-center">Login</h1>
          <?php
          if (isset($login_customer)) {
            echo $login_customer;
          }
          ?>
          <div class="form-group">
            <label for="uname">Username:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Check this checkbox to continue.</div>
            </label>
          </div>
          <input type="submit" class="btn btn-primary" value="Sign In" name="login">
          <br>
          <br>
          <a href="index.php" class="btn btn-info"> Trang chủ</a>
        </form>

      </div>
      <div class="col-md-8 p-2" style="border: 1px solid #dddd; border-radius: 10px;">
        <form action="" method="POST" class="needs-validation" novalidate>
          <h1 class="text-center">Register New Account</h1>
          <?php
          if (isset($insert_customer)) {
            echo $insert_customer;
          }
          ?>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="uname">Username:</label>
            <input type="text" class="form-control" placeholder="Enter username" name="username" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="pass" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Check this checkbox to continue.</div>
            </label>
          </div>
          <input type="submit" name="submit" class="btn btn-success" value="Create Account">
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  // Disable form submissions if there are invalid fields
  (function () {
    'use strict';
    window.addEventListener('load', function () {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</html>