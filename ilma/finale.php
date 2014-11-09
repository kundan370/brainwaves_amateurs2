<?php
	include 'connect.inc.php';
	include 'core.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../fa vicon.ico">

    <title>Generate ILMA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body style="background="back.png";">
    <div class="container">

	<center><div class="jumbotron">
	  <h1>ILMA Card</h1>
	  <p><?php echo $_SESSION['key'];?></p>
	</div></center>

	Your QR Code is : 
	<img src="<?php echo html_entity_decode(stripslashes($_SESSION['qrcode'])) ?>">
	
	</div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
