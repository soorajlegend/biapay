<?php
include("./dist/include/config.php");
session_start();
$pass_error="";
if (isset($_POST['signin'])) {
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);
    $sql1 = "SELECT * FROM users WHERE mobile='$mobile' AND  password='$password'";
    $query1= $dbh -> prepare($sql1);
    $query1-> execute();
    $results1 = $query1 -> fetchAll(PDO::FETCH_OBJ);
    if($query1 -> rowCount() == 1)
    {
      foreach($results1 as $result)
{ 
  $address=$result->myAddress;
                
              } 
              $_SESSION['address'] = "$address";
                $pass_error = ' <script>
swal({
  title: "logged!",
  text: "Good",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "dashboard.php";
});
</script>';
            } else {
                $pass_error='<script>swal("Access Denied!", "You clicked the button to try again!", "error")</script>';
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
  <div class="loginForm col-lg-5 col-md-8 col-sm-8 p-4">
    <div class="loginHeader pt-3 pb-4">
    	<div align="center">
    		<img src="./images/bia.png" width="100" height="100">
    	</div>
      <?php echo $pass_error; ?>
    	<ul class="nav nav-pills mb-4">
                <li class="nav-item pill-1">
                    <a class="nav-link active rounded-0" data-toggle="tab" href="index.php">Sign in</a>
                </li>
                <li class="nav-item pill-2">
                    <a class="nav-link  rounded-0" data-toggle="tab" href="register.php">Signup</a>
                </li>
            </ul>
    </div>
    <form action="index.php" method="post">
    <div class="loginBody">
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-lg" name="mobile" placeholder="Phone Number...">
          <div class="input-group-append">
            <span class="input-group-text p-3"><i class="fa fa-user"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="password" class="form-control form-control-lg" name="password" placeholder="Password...">
          <div class="input-group-append">
            <span class="input-group-text p-3"><i class="fa fa-lock"></i></span>
          </div>
        </div>
      </div>
      <!--div class="text-right form-group">
        <a href="#">Forgot password ?</a>
      </div-->
      <div class="form-group">
        <button type="submit" name="signin" class="btn btn-block btn-lg btn-success">Sign in</button>
      </div>
    </div>
  </form>
  </div>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>