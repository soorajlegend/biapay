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
    overflow-y: scroll;
}

.row{
    margin-left: 20%;
    margin-right: 20px;
    margin-top: 10%;

}
.history{
    box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.5), 5px 5px 15px rgba(70, 70, 70, 0.12);
    padding: 10px 0px;
    margin-top: 5px;
    list-style: none;
    display: block;
    overflow: auto;
    width: 40%;

}
.history li{
    padding: 0;
    list-style: none;
    margin-left: -15px;
}
.history .name{
    list-style: none;
    font-size: 1.5vw;
    color: #000;
    position: relative;
    float: left;
    margin-top: 5px;
    list-style: none;
}
.history .name .debit{
    color: red;
    margin-right: 10px;
}
.history .name .credit{
    color: #00b359;
    margin-right: 10px;
}
.history .amount{
    list-style: none;
    font-size: 1.5vw;
    font-weight: 700;
    color: #00b359;
    position: relative;
    float: right;
    margin-top: 5px;
    list-style: none;
}
.history .text{
    list-style: none;
    font-size: 1vw;
    color: #000;
    position: relative;
    float: left;
    margin-top: 5px;
    list-style: none;
}









@media only screen and (max-width: 600px) {
    .main-body{
        background-color: white;
        padding: 0px 10px ;
    }

    .row{
    margin-left: 0;
    margin-right: 0;

}
.nav-top{
    position: fixed;
    width: 83%; 
    z-index: 99;
}
.my-card{
    border: 1.0px solid #ccc;
    padding: 10px 20px;
    border-radius: 4px;
    display: block;
    min-width: 100%;
    margin-top: 20px;
}
.history{
    box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.5), 5px 5px 15px rgba(70, 70, 70, 0.12);
    padding: 10px 0px;
    margin-top: 5px;
    list-style: none;
    overflow: auto;
    width: 100%;
}
.history li{
    padding: 0;
    list-style: none;
    margin-left: -15px;
}
.history .name{
    list-style: none;
    font-size: 5vw;
    color: #000;
    position: relative;
    float: left;
    margin-top: 5px;
    list-style: none;
}
.history .name .debit{
    color: red;
    margin-right: 10px;
}
.history .name .credit{
    color: #00b359;
    margin-right: 10px;
}
.history .amount{
    list-style: none;
    font-size: 5vw;
    font-weight: 700;
    color: #00b359;
    position: relative;
    float: right;
    margin-top: 5px;
    list-style: none;
}
.history .text{
    list-style: none;
    font-size: 4vw;
    color: #000;
    position: relative;
    float: left;
    margin-top: 5px;
    list-style: none;
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
                <div class="col-md-3 left_col " style="position: fixed;" >
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
                <div class="top_nav nav-top" style="">
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
                    <div class="alert alert-success green-bg" style="margin-top: 0px;padding: 0px;">
                        <center><h3 style="">Transactions</h3></center>
                    </div>
                    <!-- /Page Header -->
                    
                    <div align="center" class="row">
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-in credit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>">
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-out debit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-in credit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>">
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-out debit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-in credit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>">
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-out debit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-in credit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>">
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-out debit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-in credit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>">
                    <ul class="history">
                        <li class="history-list"><ul><li><b class="name"><i class="fa fa-sign-out debit"></i>Sooraj muhammad</b> <span class="amount"><del>N</del>100</span></li>
                            <li class="text">you have sent 100 naira to muhammad musa</li></ul></li>
                    </ul>
                    
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
