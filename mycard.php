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
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fcapt | Admin </title>

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
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="build/css/custom.css" rel="stylesheet">
        <style type="text/css">
        body{
            overflow-y: hidden;
        }

            .green-bg{
    background-image: linear-gradient(#00331a, #00b359); 
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

    .profile-img{
        width:20%;
        border-radius: 50%;
        margin: 10px;
    }
    .qr-img{
        width: 80%;
    }
.row{
    width: 40%;
    margin-left: 35%;
    margin-right: 20px;
    margin-top: 10%;
}

.barcode-card{
    display: flex;
    width: 323.52px;
    height: 204px;
    border-radius: 9px;
    transform: scale(1.2);
    background:#fff;
    padding: 20px 20px;
    border: 1.0px solid #ccc;
    /*background-image: url("images/card-bg5.png");*/
    background-position: center;
    background-size: contain;
    background-attachment: scroll;
}

.barcode-card::before {
    content: '';
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    margin-top: ;
    width: 100%;
    height: 100%;
    padding-top: 50px;
    background: linear-gradient(#009900, #001a00);
    clip-path: circle(70% at right 150%);
    border-radius: 9px;
}

.barcode-card .qr-img{
    position: absolute;
    left: 0;
    margin-left: 10px;
    width: 100px;
    height: 100px;
    display: block;
}
.barcode-card .qr-name{
    position: absolute;
    left: 0;
    font-family: 'Orbitron', sans-serif;
    color: #000;
    white-space: nowrap;
    font-size: 13pt;
    margin-top: 100px;
    margin-left: 20px;
    width: 100px;
    height: 100px;
}
.barcode-card .qr-number{
    position: absolute;
    left: 0;
    font-family: 'Orbitron', sans-serif;
    color: #000;
    white-space: nowrap;
    font-size: 10pt;
    margin-top: 130px;
    margin-left: 20px;
    width: 100px;
    height: 100px;
}
.barcode-card .qr-logo{
    position: absolute;
    right: 0;
    top: 0;
    font-family: 'Orbitron', sans-serif;
    color: #000;
    white-space: nowrap;
    font-size: 10pt;
    margin-right: 12px;
    margin-top: 20px;
    width: 50px;
    height: 50px;
}
.barcode-card .qr-flower{
    position: absolute;
    z-index: 2;
    height: 150px;
    right: 0;
    bottom: 0;
    margin-right: -20px;
}
#print{
    position: relative;
    margin-top: 50px;
    width: 323.52px;
}








@media only screen and (max-width: 600px) {
    .profile-img{
        width:50%;
        border-radius: 50%;
        margin: 10px;
    }
    .main-body{
        background-color: white;
        padding: 0px 10px ;
    }

    .row{
        width: 100%;
    margin-left: 0;
    margin-right: 0;

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
                        <center><h3 style="">Edit Profile</h3></center>
                    </div>
                    <!-- /Page Header -->
                    
                    <div align="center" class="row">

                    <div class="my-container">
                        <!-- <img src="<?php // echo htmlentities($result->barcode);?>" class="qr-img"> -->
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00331a" fill-opacity="1" d="M0,64L60,101.3C120,139,240,213,360,218.7C480,224,600,160,720,138.7C840,117,960,139,1080,170.7C1200,203,1320,245,1380,266.7L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg> -->
                            <center>
                                <div class="barcode-card">
                                <img src="images/bia.png" class="qr-logo">
                                <img src="images/card-bg-5.png" class="qr-flower">
                                <img src="<?php echo htmlentities($result->barcode);?>" class="qr-img">
                                <h3 class="qr-name"><?php echo htmlentities($result->fullname);?></h3>
                                <h3 class="qr-number"><?php echo htmlentities($result->mobile);?></h3>
                                </div>
                            </center>
                            <div class="form-group">
                                <button onclick="window.print()" id="print" class="form-control green-bg">Print&nbsp;<i class="fa fa-print"></i></button>
                            </div>
                    </div>

                    </div>
                    
                </div>
                <!-- /page content -->

                
            </div>
        </div>
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
<?php }}} ?>