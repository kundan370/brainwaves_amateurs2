<?php
	include 'connect.inc.php';
	include 'core.inc.php';
	include "classes/class.phpmailer.php";
	//send_mail();
	
	function send_mail(){
		$mail = new PHPMailer();
		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->SMTPSecure = "tls";
		$mail->Host = "smtp.gmail.com";  // specify main and backup server
		$mail->Port = 587;
		$mail->Username = "rockker.fu@gmail.com";  // SMTP username
		$mail->Password = "magic366"; // SMTP password

		$mail->From = "rockker.fu@gmail.com";
		$mail->FromName = "ILMA Service";
		$mail->AddAddress("rockker.fu@gmail.com", "Kundan");

		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = "ILMA Service";
		$mail->Body    = "This is ti inform you just accessed your account... If not, kindly check immediately";
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
	}
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

    <title>Bank of Tomorrow..</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <style type="text/css">
     .x
     {
     	background-image: url("atm.jpeg");
     }
  </style>
  <body >
    <div class="container">
    <div class="page-header">
  	<h1 align="center">Welcome to "Bank of Tomorrow"</h1>
	</div>
	</div>
    <div class="container" style="margin-top: 10px;">
		<center><div class="jumbotron">
  <h1>Welcome <?php echo get_field('cust_name')?> !</h1>
  <p><a class="btn btn-success btn-lg" href="#" role="button"><?php echo "your Account Number : ".get_field('bank_acc_no')?></a>
  <a class="btn btn-primary btn-lg" href="#" role="button"><?php echo "your Available Bal.ance : ".get_field('balance')?></a>
  <a class="btn btn-danger btn-lg" href="logout.php" role="button">LOGOUT</a></p>
	</div></center>
		<div class="tab-content">
		  <div class="tab-pane active" id="create">
      
         <div >
		    <button type="button" class="btn btn-danger btn-lg btn-block" onclick = "window.location.assign('transaction.php')">Normal Transaction-- Click Here</button>
		    <br>
		    <br>
		  </div>
          <!--<div>
          	<br>
          </div>-->
		  <div >
		 <button type="button" class="btn btn-danger btn-lg btn-block" onclick = "window.location.assign('generate.php')">Lost Cards--Click Here..</button>
		  </div>

        </br>
        
         <!--<div class="btn-group">
		    <button type="button" class="btn btn-danger btn-lg">Lost Cards-- Click Here..</button>
		  </div>-->
        <!-- Form End -->
		  
		  </div>
		  <div class="tab-pane" id="edit">
		  
		  <!-- Start -->
		  <br>
		  	<div class="row">
		  		<div class="col-md-4"></div>
		  		<div class="col-md-4">
		  		 <div class="form-group">
			          <label for="tedit">Enter the Trainer ID to be edited :</label>
			          <input type="text" class="form-control" id="tedit" placeholder="Trainer ID">
			      </div>
			      <br>
			      <div class="btn-group">
				    <button type="button" class="btn btn-primary btn-lg">Submit</button>
				  </div>
		  		</div>
		  		<div class="col-md-4"></div>
		  	</div>
		  	
		  
		  <!-- End -->
		  		  
		  </div>
		  
		  
		  <div class="tab-pane" id="search">
		  
		   <!-- Start -->
		  <br>
		  	<div class="row">
		  		<div class="col-md-4"></div>
		  		<div class="col-md-4">
		  		 <div class="form-group">
			          <label for="edit">Enter the Trainer ID to be Searched :</label>
			          <input type="text" class="form-control" id="tsearch" placeholder="Trainer ID">
			      </div>
			      <br>
			      <div class="btn-group">
				    <button type="button" class="btn btn-primary btn-lg">Submit</button>
				  </div>
		  		</div>
		  		<div class="col-md-4"></div>
		  	</div>
		  
		  <!-- End -->
		  
		  </div>
		  
		  
		  <div class="tab-pane" id="delete">
			 <!-- Start -->
		  <br>
		  	<div class="row">
		  		<div class="col-md-4"></div>
		  		<div class="col-md-4">
		  		 <div class="form-group">
			          <label for="edit">Enter the Trainer ID to be Deleted :</label>
			          <input type="text" class="form-control" id="tdelete" placeholder="Teacher ID">
			      </div>
			      <br>
			      <div class="btn-group">
				    <button type="button" class="btn btn-primary btn-lg">Submit</button>
				  </div>
		  		</div>
		  		<div class="col-md-4"></div>
		  	</div>
		  
		  <!-- End -->  
		  
		  </div>
		
		</div>
		


	</div>
	




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
