<?php
include("phpqrcode/qrlib.php");
include("./dist/include/config.php");
session_start();  
$pass_error="";
if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $image="default-avarta.png";
    $sql1 = "SELECT * FROM users WHERE email='$email' OR  mobile='$mobile'";
   $query1= $dbh -> prepare($sql1);
$query1-> execute();
$results1 = $query1 -> fetchAll(PDO::FETCH_OBJ);
if($query1 -> rowCount() == 1)
{
        $pass_error = '<script>swal("Invalid", "The Email address or phone number is already registered!", "error")</script>';
    } else {
        if ($password != $cpassword) {
            $pass_error = '<script>swal("Invalid", "Password and comfirm password did not match!", "error")</script>';
        } else {
            $address=sha1($email);
            $file = "qr/".uniqid().".png";
            $sql = "INSERT INTO users (fullname,email,mobile,password,profileImage,myAddress,barcode,status) VALUES ('$fname','$email','$mobile','$password','$image','$address','$file','1')";
            $query= $dbh -> prepare($sql);
            $query-> execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId){
                $_SESSION['address'] = "$address";
  QRcode::png($address,$file);
                $pass_error = ' <script>
swal({
  title: "Success!",
  text: "Good",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "dashboard.php";
});
</script>';
            } else {
               echo "error for users";
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <title>Bia Pay</title>
    <style type="text/css">

    </style>
  </head>
  <body>
	  	<div class="container">
  <div class="signinForm col-lg-5 col-md-8 col-sm-8 p-4">
    <div class="loginHeader pt-3 pb-4">
    	<div align="center">
    		<img src="./images/bia.png" width="100" height="100">
    	</div>
      <?php echo $pass_error; ?>
    	<ul class="nav nav-pills mb-4">
                <li class="nav-item pill-1">
                    <a class="nav-link rounded-0" data-toggle="tab" href="index.php">Login</a>
                </li>
                <li class="nav-item pill-2">
                    <a class="nav-link active  rounded-0" data-toggle="tab" href="register.php">Signup</a>
                </li>
            </ul>
    </div>
    <form action="register.php" method="post">
    <div class="loginBody">
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-lg" name="fname" placeholder="FullName...">
          <div class="input-group-append">
            <span class="input-group-text p-3"><i class="fa fa-user"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-lg" name="email" placeholder="Email Address...">
          <div class="input-group-append">
            <span class="input-group-text p-3"><i class="fa fa-at"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-lg" name="mobile" placeholder="Phone Number...">
          <div class="input-group-append">
            <span class="input-group-text p-3"><i class="fa fa-phone"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="password" class="form-control form-control-lg" name="password" placeholder="Create Password...">
          <div class="input-group-append">
            <span class="input-group-text p-3"><i class="fa fa-lock"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="password" class="form-control form-control-lg" name="cpassword" placeholder="Comfirm Password...">
          <div class="input-group-append">
            <span class="input-group-text p-3"><i class="fa fa-lock"></i></span>
          </div>
        </div>
      </div>
      <!--div class="text-right form-group">
        <a href="#">Forgot password ?</a>
      </div-->
      <div class="form-group">
        <button type="submit" name="signup" class="btn btn-block btn-lg btn-success">Signup</button>
      </div>
    </div>
  </form>
  </div>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>