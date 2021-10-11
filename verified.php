<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bia pay</title>
</head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


<body>

</body>
</html>
<?php 
include("./dist/include/config.php");
session_start();
if ($_SESSION['address'] == ""){
    header("location:index.php");
}else{
$new_balance=0;
$new_credit_balance=0;
$pass_error="";
$status=0;

function generate_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0C2f ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
    );

}





$address = $_SESSION['address'];
$recieverAddress=$_SESSION['raddress'];
$amount=$_SESSION['amount'];
$sql1 = "SELECT * FROM users WHERE myAddress='$address' ";
    $query1= $dbh -> prepare($sql1);
    $query1-> execute();
    $results1 = $query1 -> fetchAll(PDO::FETCH_OBJ);
    if($query1 -> rowCount() == 1)
    {
      foreach($results1 as $result){
        $new_balance=$result->balance;
}
        $new_balance -= $amount;
        $sql1 = "UPDATE users SET balance='$new_balance' WHERE myAddress='$address' ";
    $query1= $dbh -> prepare($sql1);
    $query1-> execute();
}



$sql2 = "SELECT * FROM users WHERE myAddress='$recieverAddress' ";
    $query2= $dbh -> prepare($sql2);
    $query2-> execute();
    $results2 = $query2 -> fetchAll(PDO::FETCH_OBJ);
    if($query2 -> rowCount() == 1)
    {
      foreach($results2 as $result2){
        $new_credit_balance=$result2->balance;

}
        $new_credit_balance += $amount;
        $sql2 = "UPDATE users SET balance='$new_credit_balance' WHERE myAddress='$recieverAddress' ";
    $query2= $dbh -> prepare($sql2);
    $query2-> execute();
}
        


$reference = generate_uuid();
$sql = "INSERT INTO transactions (sender,reciever,reference,amount,status) VALUES ('$address','$recieverAddress','$reference','$amount','1')";
            $query= $dbh -> prepare($sql);
            $query-> execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId){
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


echo $pass_error;

 ?>