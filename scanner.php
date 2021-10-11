<?php  
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SCANNER</title><!-- 
<script type="text/javascript" src="adapter.min.js"></script>
<script type="text/javascript" src="vue.min.js"></script>
<script type="text/javascript" src="instascan.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<script src="sample/html5-qrcode.min.js"></script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  .scanner{
    width: 50%;
    max-height: 300px;
    margin-top: 30px;
    margin-left: 25%;
    position: absolute;
  }
  .result-panel{
    position: absolute;
    display: block;
    margin-top: 300px;
    display: none;
  }
  @media only screen and (max-width: 600px) {
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:block;
  }
  .scanner{
    width: 100%;
    max-height: 300px;
    margin-top: 30px;
    margin-left: 0%;
    position: relative;
  }
  .result-panel{
    position: absolute;
    display: block;
    margin-top: 300px;
    display:none;
  }
    }
</style>
<script type="text/javascript">
  function get_address() {
  $("#loaderIcon").show();
jQuery.ajax({
url: "get_address.php",
data:'address='+$("#address").val(),
type: "POST",
success:function(data){
$("#check_address").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>
</head>
<body>
<div class="row">
  <div class="scanner">
    <div style="width:100%;" id="reader">
    </div>
  </div>
  <div class="result-panel" style="padding:30px;">
    <h4>SCAN RESULT</h4>
    <form action="scanner.php" method="post">
    <div class="form-group">
      <input type="text" name="address" id="address"  placeholder="result">
    </div>
    <span id="check_address"></span>
    </form>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById('address').value = qrCodeMessage;
    return get_address();

    // document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

while(document.getElementById('address').value.length  > 0){
  alert("hello");
}
</script>
</body>
</html>