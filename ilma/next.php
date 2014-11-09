<?php
	include 'connect.inc.php';
	include 'core.inc.php';
	include "classes/class.phpmailer.php";
	$v = $_SESSION['valid'];
	$q = $_SESSION['qrcode'];
	$p = $_SESSION['pin'];
	if (isset($_POST['validate'])) {
		echo $v;
		echo $q;
		echo $p;
		if (isset($_POST['otp'])&&!empty($_POST['otp'])) {
			echo "ok!";
			$o=$_POST['otp'];
			echo $o." ".$v;
			if ($o==$v) {
				send_pin($p);
				send_code($q);
				header("Location:finale.php");
			}
		}
	}
	function send_code($q){
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
		$mail->AddAttachment("C:/xampp/htdocs/ilma/phpqrcode/temp/test2ef934663acae3cd18627ea50efc8673.png");
		$mail->Subject = "ILMA QR CODE";
		$mail->Body    = "Your ILMA code is finally done. Your link to QR Code - C:/xampp/htdocs/ilma/phpqrcode/temp/".html_entity_decode(stripslashes($q));
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
	}
	function send_pin($p){
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

		$mail->Subject = "ILMA Service OTP";
		$mail->Body    = "Your ILMA code is finally done. Your Pin is - ".$p." Kindly Note the pin and delete this mail. For Security Reasons.";
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
	}
?>
<script type="text/javascript">
	setInterval(function(){getTime()},1000);
	time=180;
	function getTime()
	{
		time--;
		document.getElementById("timeout").innerHTML=time;
	}
</script>
<span>You will be automatically redirected to the main page if the time expires... <div id="timeout"></div>secs left</span><br/>
Enter the OTP password sent in your mail...
<form action="next.php" method="POST">
	OTP : <input type="text" name="otp" placeholder="Enter "><br/>
	<input type="submit" value="validate" name="validate">
</form>
<script>
	function Redirect()
	{
	    window.location="account.php";
	}
	setTimeout('Redirect()', 180000);
</script>