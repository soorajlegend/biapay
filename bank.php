<?php 
include("./dist/include/config.php");
session_start();
$pin="";
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
    $pass_error="";
    if(isset($_POST['add'])){
        $amt =$_POST['amt'];
        $_SESSION['amt']="$amt";
        header("location:btransfer.php");
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

        <title>Biapay </title>

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
}

    .profile-img{
        width:20%;
        border-radius: 50%;
        margin: 10px;
    }
.row{
    width: 40%;
    margin-left: 35%;
    margin-right: 20px;
    margin-top: 2%;
    padding: 10px 30px;
    box-shadow: -5px -5px 15px rgba(255, 255, 255, 0.5), 5px 5px 15px rgba(70, 70, 70, 0.12);
}
.my-card{
    border: 1.0px solid #ccc;
    padding: 20px 20px;
    border-radius: 4px;
    display: block;
    width: 50%;
    margin-top: 20px;
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

                        <form action="bank.php" method="post">
                        <img src="images/default-avarta.png" class="profile-img img-fluid">
                        <br>
                        <div class="form-group">
                            <input type="tel" name="amt" id="amt" class="form-control" placeholder="Amount">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="cn" id="CNumber" class="form-control" placeholder="Card Number">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="ed" id="Edate" class="form-control" placeholder="Expiry Date">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="cvv" id="cvv" class="form-control" placeholder="CVV">
                        </div>
                        <div class="form-group">
                            <input type="submit" onclick="" name="add" class="form-control btn green-bg" value="Update">
                        </div>
                        </form>
                    </div>
                    </div>
                    
                </div>
                <!-- /page content -->

                
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    function getcredit(){

      var acct = document.getElementById('acct');
//     var settings = {
//   "url": "https://fsi.ng/api/sterling/accountapi/api/Spay/InterbankTransferReq?=2PWRP62uUbkFeYSgkxxqRFan6pR22YgJ1634114038",
//   "method": "POST",
//   "timeout": 0,
//   "headers": {
//     "Sandbox-Key": "3f81b44afa59a7737ffd448d458aef99",
//     "Ocp-Apim-Subscription-Key": "t",
//     "Ocp-Apim-Trace": "true",
//     "Appid": "69",
//     "Content-Type": "application/json",
//     "ipval": "0",
//     "sandbox-key": "2PWRP62uUbkFeYSgkxxqRFan6pR22YgJ1634114038"
//   },
//   "data": JSON.stringify({
//     "Referenceid": "0101",
//     "RequestType": "01",
//     "Translocation": "0101",
//     "SessionID": "01",
//     "FromAccount": "acct",
//     "ToAccount": "2209854475",
//     "Amount": "amt",
//     "DestinationBankCode": "01",
//     "NEResponse": "01",
//     "BenefiName": "01",
//     "PaymentReference": "01",
//     "OriginatorAccountName": "01",
//     "translocation": "01"
//   }),
// };


// $.ajax(settings).done(function (response) {
//   console.log(response);
//   document.getElementById('status').innerHTML = response.data.ResponseText;

// });
// }

var settings = {
  "url": "https://fsi.ng/api/eco/corporateapi/merchant/card",
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Authorization": "Bearer eyJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpYW1hdW5pZmllZGRldjEwMyIsImV4cCI6MTU3NjI1MTA0NSwiaWF0IjoxNTc2MjUwOTI1LCJpc3MiOiJjb20uZWNvYmFuay5jb3Jwb3JhdGVhcGkiLCJqdGkiOiI0MDVhMTBiYi0xZGJkLTExZWEtOWY1YS0yZGU5ODMzNjJjMzMifQ.W0FeFszGksdSQFmmYABy1rdRNzzXVTxeoklmp7gyFTlUefixIIez4oY2FPDFdXUsuYF1Djwsjvzqv6kNlxY-jkHdbWPCvvqewSCqcF_0JdmAPGhTLUExY1kv0v3WIw0b0CZm8xULrdEtNhXWPbzxV-gO9LGvSYfEJpKtIURrf3HEY056u4w-MDtCwAuMCoRWzQczzW4niQWdYTzFbpn0MMQNPC_NDDjl4cQZNHNdd4_vu5sL1wlQW8UTYi3LUJOpQ7jjxKGJtXC_GYy-GiEhh-3AcOey26_bbfk5iD9eag0IQpferNpNDMCCjzzW1tg5I7W2zkaisn9-h6gL2S3Vgw",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Origin": "developer.ecobank.com",
    "Sandbox-Key": "2PWRP62uUbkFeYSgkxxqRFan6pR22YgJ1634114038"
  },
  "data": JSON.stringify({
    "paymentDetails": {
      "requestId": "4466",
      "productCode": "GMT112",
      "amount": "50035",
      "currency": "GBP",
      "locale": "en_AU",
      "orderInfo": "255s353",
      "returnUrl": "https://unifiedcallbacks.com/corporateclbkservice/callback/qr"
    },
    "merchantDetails": {
      "accessCode": "79742570",
      "merchantID": "ETZ001",
      "secureSecret": "sdsffd"
    },
    "secureHash": "7f137705f4caa39dd691e771403430dd23d27aa53cefcb97217927312e77847bca6b8764f487ce5d1f6520fd7227e4d4c470c5d1e7455822c8ee95b10a0e9855"
  }),
};

$.ajax(settings).done(function (response) {
  console.log(response);
});

// var settings = {
//   "url": "https://fsi.ng/members/application-details/181/v1/africastalking/version1/messaging",
//   "method": "POST",
//   "timeout": 0,
//   "headers": {
//     "sandbox-key": "2PWRP62uUbkFeYSgkxxqRFan6pR22YgJ1634114038",
//     "Content-Type": "application/json"
//   },
//   "data": JSON.stringify({
//     "username": "sandbox",
//     "to": "+2348120534617",
//     "message": "testing message"
//   }),
// };

// $.ajax(settings).done(function (response) {
//   console.log(response);
// });
  </script>
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
