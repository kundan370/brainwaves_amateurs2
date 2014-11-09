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
	<br/>
	<br/>
    <div class="page-header">
  	<h1>Generate ILMA Card</h1>
	</div>
	</div>
    <div class="container" style="margin-top: 10px;">
		
		<div class="tab-content">
		  <div class="tab-pane active" id="create">

      <form action="full.php" method="post">
        <div class="form-group">
          <label for="BFID">Account Holder :</label>
          <input type="text" class="form-control" id="BFID" value="<?php echo get_field('cust_name')?>" disabled >
        </div>

         <div class="form-group">
          <label for="BFID">Account No :</label>
          <input type="text" class="form-control" id="BFID" value="<?php echo get_field('bank_acc_no') ?>" disabled >
        </div>
        
        
        <div class="form-group">
          <label for="contact">Amount :</label>
          <input type="text" name="amount" class="form-control" id="contact" placeholder="Enter the amount">
        </div>
        
        
        <br>
      
        
         <div class="form-group">
          <label for="Location">Validity (in Hours) :</label>
          <input type="text" name="val" class="form-control" id="location" placeholder="Enter the validity of your e-card">
        </div>
        
        
        
         <div class="btn-group">
		    <button type="submit" class="btn btn-danger btn-lg">Submit</button>
		  </div>
        <!-- Form End -->
		  
		 </form>
		  
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
