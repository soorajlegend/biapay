<?php 
include("phpqrcode/qrlib.php");
$file="";
if (isset($_POST['generate'])) {
	$text = $_POST['text'];
	$file = "qr/".uniqid().".png";
	QRcode::png($text,$file);
}
 ?>
 <?php 
if (isset($_GET['image'])) {
	$filename = $_GET['image'];
	if(file_exists($filename)) {
		header("content-Discription:file transfet");
		header("Content-Type:application/image");
		header('Content-Disposition:attachment; filename=" '.basename($filename).'"');
		header('content-Length:'.filesize($filename));
		readfile($filename);
	}
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>barcode</title>
</head>
<body>
<form action="barcode.php" method="post">
	<input type="text" name="text" placeholder="text">
	<input type="submit" name="generate" value="generate">
</form>

<?php 
if (!empty($file)) {
	?>
	<img src="<?php echo $file; ?>" class="">
	<a href="barcode.php?image=<?php echo $file; ?>">download</a>

	<?php
}
 ?>





 
  </body>
</html>