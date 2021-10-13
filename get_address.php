<?php  
session_start();
include("./dist/include/config.php");
$address=$_SESSION['address'];
if (!empty($_POST['address'])) {
  $recieverAddress=$_POST['address'];
  $sql1 = "SELECT * FROM users WHERE myAddress='$recieverAddress' ";
    $query1= $dbh -> prepare($sql1);
    $query1-> execute();
    $results1 = $query1 -> fetchAll(PDO::FETCH_OBJ);
    if($query1 -> rowCount() == 1)
    {
      foreach($results1 as $result){
        $name=$result->fullname;
        $balance=$result->balance;
        $email=$result->email;
        $mobile=$result->mobile;
}
}
$_SESSION['raddress'] = "$recieverAddress";
$_SESSION['rname'] = "$name";
$_SESSION['balance'] = "$balance";
$_SESSION['email'] = $email;
$_SESSION['mobile']= "$mobile";
echo "<script>window.location.replace('transfer.php');</script>";
echo '<script type="text/javascript">swal({
  text: "Search for a movie. e.g. "La La Land".",
  content: "input",
  button: {
    text: "Search!",
    closeModal: false,
  },
})
.then(name => {
  if (!name) throw null;
 
  return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
})
.then(results => {
  return results.json();
})
.then(json => {
  const movie = json.results[0];
 
  if (!movie) {
    return swal("No movie was found!");
  }
 
  const name = movie.trackName;
  const imageURL = movie.artworkUrl100;
 
  swal({
    title: "Top result:",
    text: name,
    icon: imageURL,
  });
})
.catch(err => {
  if (err) {
    swal("Oh noes!", "The AJAX request failed!", "error");
  } else {
    swal.stopLoading();
    swal.close();
  }
});</script>';
}




if (!empty($_POST['gaddress'])) {
  $sender=$_POST['gaddress'];
  $sql1 = "SELECT * FROM users WHERE myAddress='$sender' ";
    $query1= $dbh -> prepare($sql1);
    $query1-> execute();
    $results1 = $query1 -> fetchAll(PDO::FETCH_OBJ);
    if($query1 -> rowCount() == 1)
    {
      foreach($results1 as $result){
        $name=$result->fullname;
        $balance=$result->balance;
        $email=$result->email;
        $mobile=$result->mobile;
}
}
$_SESSION['saddress'] = "$sender";
$_SESSION['rname'] = "$name";
$_SESSION['balance'] = "$balance";
$_SESSION['email'] = $email;
$_SESSION['mobile']= "$mobile";
echo "<script>window.location.replace('get.php');</script>";
echo '<script type="text/javascript">swal({
  text: "Search for a movie. e.g. "La La Land".",
  content: "input",
  button: {
    text: "Search!",
    closeModal: false,
  },
})
.then(name => {
  if (!name) throw null;
 
  return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
})
.then(results => {
  return results.json();
})
.then(json => {
  const movie = json.results[0];
 
  if (!movie) {
    return swal("No movie was found!");
  }
 
  const name = movie.trackName;
  const imageURL = movie.artworkUrl100;
 
  swal({
    title: "Top result:",
    text: name,
    icon: imageURL,
  });
})
.catch(err => {
  if (err) {
    swal("Oh noes!", "The AJAX request failed!", "error");
  } else {
    swal.stopLoading();
    swal.close();
  }
});</script>';
}



if (!empty($_POST['amount'])) {
  $amount=$_POST['amount'];
  $sql2 = "SELECT * FROM users WHERE myAddress='$address' ";
    $query2= $dbh -> prepare($sql2);
    $query2-> execute();
    $results2 = $query2 -> fetchAll(PDO::FETCH_OBJ);
    if($query2 -> rowCount() == 1)
    {
      foreach($results2 as $result2){
        $balance=$result2->balance;

}
  if ($amount > $balance) {
    echo "Insuficient fund";
  }
}


}



if (!empty($_POST['getamount'])) {
  $amount=$_POST['getamount'];
  $saddress = $_SESSION['saddress'];
  $sql2 = "SELECT * FROM users WHERE myAddress='$saddress' ";
    $query2= $dbh -> prepare($sql2);
    $query2-> execute();
    $results2 = $query2 -> fetchAll(PDO::FETCH_OBJ);
    if($query2 -> rowCount() == 1)
    {
      foreach($results2 as $result2){
        $balance=$result2->balance;

}
  if ($amount > $balance) {
    echo "Insuficient fund";
  }
}


}





if (!empty($_POST['pin'])) {
  $pin=md5($_POST['pin']);
  $sql3 = "SELECT * FROM users WHERE myAddress='$address' AND pin='$pin'";
    $query3= $dbh -> prepare($sql3);
    $query3-> execute();
    $results3 = $query3 -> fetchAll(PDO::FETCH_OBJ);
    if($query3 -> rowCount() == 1)
    {
echo "<script>window.location.replace('verified.php');</script>";
}else{
  echo "invalid pin";
}


}




if (!empty($_POST['getpin'])) {
  $getpin=md5($_POST['getpin']);
  $saddress = $_SESSION['saddress'];
  $sql3 = "SELECT * FROM users WHERE myAddress='$saddress' AND pin='$getpin'";
    $query3= $dbh -> prepare($sql3);
    $query3-> execute();
    $results3 = $query3 -> fetchAll(PDO::FETCH_OBJ);
    if($query3 -> rowCount() == 1)
    {
echo "<script>window.location.replace('getverified.php');</script>";
}else{
  echo "invalid pin";
}


}
 ?>