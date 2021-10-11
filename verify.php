 <?php 
include("./dist/include/config.php");
session_start();
if ($_SESSION['address'] == ""){
    header("location:index.php");
}else{
    $address = $_SESSION['address'];
    $sql1 = "SELECT * FROM users WHERE myAddress='$address' ";
    $query1= $dbh -> prepare($sql1);
    $query1-> execute();
    $results1 = $query1 -> fetchAll(PDO::FETCH_OBJ);
    if($query1 -> rowCount() == 1)
    {
      foreach($results1 as $result)
{
	

    if (isset($_POST['send'])) {
       $amount = $_POST['amount'];
       $_SESSION['amount'] = "$amount";
       echo "<script>window.location.replace('verify.php');</script>";

    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bia</title>

        <!-- Bootstrap -->
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Custom Theme Style -->
        <link href="build/css/custom.css" rel="stylesheet">
        <style type="text/css">
        body{
            overflow-y: hidden;
        }

            .green-bg{
    background-image: linear-gradient(#00331a, #00b359);
    transition: .5s; 
    color: #fff;
}
.green-bg:hover{
    background-image: linear-gradient(#00b359, #00331a); 
    color: #fff;
}
footer{
    width: 100%;
    position: fixed;
    bottom: 0;
}
.main-body{
    background-color: #fff;
    min-height: 650px;
}
body{
    background-color: #fff;
}

.row{
    margin-left: 20%;
    margin-right: 20px;
    margin-top: 0%;
    width: 50%;
    margin-left: 25%;
}
.my-card{
    border: 1.0px solid #ccc;
    padding: 20px 20px;
    border-radius: 4px;
    display: block;
    width: 50%;
    margin-top: 20px;
}
.transaction-header{
    color: #00331a;
    font-weight: 700;
    font-size: 2vw;
}
.name{ 
    color: #00331a;
    font-weight: 700;
    font-size: 2vw;
}
.balance sub{ 
    color: #00331a;
    font-weight: 700;
    font-size: 1vw;
}
.status{
    font-size: 2vw;
    color: red;
    float: left;
}
.password{
    font-size: 4vw;
    overflow: auto;
    padding: 10px;
    text-transform: none;
    justify-content: center;
}



@media only screen and (max-width: 600px) {
    .status{
    font-size: 5vw;
    color: red;
    float: left;
}
	.transaction-header{
    color: #00331a;
    font-weight: 600;
    font-size: 8vw;
}
.name{ 
    color: #00331a;
    font-weight: 700;
    font-size: 7vw;
}
.balance sub{ 
    color: #00331a;
    font-weight: 700;
    font-size: 5vw;
}
    .main-body{
        background-color: white;
        padding: 0px 10px ;
    }

    .row{
    margin-left: 0;
    margin-right: 0;
    width: 100%;

}
.my-card{
    border: 1.0px solid #ccc;
    padding: 10px 20px;
    border-radius: 4px;
    display: block;
    min-width: 100%;
    margin-top: 20px;
}
    }
        </style>

        <script type="text/javascript">
  function check_pin() {
  $("#loaderIcon").show();
jQuery.ajax({
url: "get_address.php",
data:'pin='+$("#pin").val(),
type: "POST",
success:function(data){
$("#balance_status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
        </script>
    </head>

    <body class="nav-md">
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div>
        <div class="container body">
            <div class="main_container " >
                <div class="col-md-3 left_col" >
                    <div class="left_col scroll-view green-bg" style="padding-top: 40px;" >

                        <div class="clearfix"></div>

                        <?php include("dist/include/header.php") ?>
                        <!-- /menu footer buttons -->
<!--                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>-->
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/bia.png" alt=""><?php echo htmlentities($result->fullname);?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="main-body" role="main">
                    
                    <div class="clearfix"></div>
                    
                    <!-- Page Header -->
                    <div class="alert alert-success green-bg" style="padding: 0px;">
                        <center><h3 style="">Overview</h3></center>
                    </div>
                    <!-- /Page Header -->
                    
                    <div align="center" class="">
    <?php 

	$raddress=$_SESSION['raddress'];
 // echo $_SESSION['rname'];
	// echo $_SESSION['balance'];
	// echo $_SESSION['email'];
	// echo $_SESSION['mobile'];
	$sql2 = "SELECT * FROM users WHERE myAddress='$raddress' ";
    $query2= $dbh -> prepare($sql2);
    $query2-> execute();
    $results2 = $query2 -> fetchAll(PDO::FETCH_OBJ);
    if($query2 -> rowCount() == 1)
    {
      foreach($results2 as $result2){
	?>
</div>
<div align="center" class="row">
                    <div class="my-container">

                    	<input type="hidden" name="balance" id="balance" value="<?php echo $result->balance; ?>">
                        <form action="transfer.php" method="post">
                        <img src="images/<?php echo $result->profileImage; ?>" class="profile-img img-fluid" style="border-radius: 50%;">
                        <br>
                        <div class="form-group">
                            <span class="name">you are trying to send<?php  echo " NGN". htmlentities($_SESSION['amount']); ?>&nbsp;to <?php  echo htmlentities($result2->fullname); ?></span>
                        </div>
                        <div class="form-group">
                        	<label for="mobile" style="float: left;">Verify your pin</label>
                            <input type="password" id="pin" name="pin" onkeyup="check_pin()" class="form-control password" placeholder="" >
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btn" name="verify" class="form-control btn green-bg" placeholder="NGN" >
                        </div>

                        <span id="balance_status" class="status"></span>                        
                        </form>
                    </div>
                    </div>
                    
                </div>
                <!-- /page content -->
<?php 
}
} 
 ?>
                
            </div>
        </div>
        <!-- <script type="text/javascript">
            var slider = document.createElement("input");
slider.type = "range";
 
swal({
  content: slider,
});



        	function check_my_balance(){
        	var x = document.getElementById('balance').value;
        	var y = document.getElementById('amount').value;
        	if (x <= y) {
        		document.getElementById('balance_status').innerHTML = "<p style='color:red; float:left;'>insufficient fund</p>";
        		document.getElementById('btn').disabled=true;
        	}else{
        		document.getElementById('balance_status').innerHTML = "<p style='color:red; float:left;'></p>";
        		document.getElementById('btn').disabled=false;
        	}
        }
        </script> -->
        <!-- footer content >
                <footer class="green-bg">
                    <div class="pull-right " style="color: #fff;">
                        <b>Bia</b> Design by <a href="#" style="color: #fff;">Sooraj</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                < /footer content -->
        <!-- jQuery -->
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/angularjs/ui-bootstrap-tpls-0.12.1.min.js"></script>
        <!-- FastClick -->
        <script src="vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- Datatables -->
        <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>
    </body>
</html>
<?php 
 } 
 }
 }
?>