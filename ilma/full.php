<?php
	include 'connect.inc.php';
	include 'core.inc.php';
	include 'phpqrcode/index.php';
	include "classes/class.phpmailer.php";
	if (isset($_POST['amount'])&&!empty($_POST['amount'])&&isset($_POST['val'])&&!empty($_POST['val'])) {
		$amount = $_POST['amount'];
		$val = $_POST['val'];
		if ($amount > 50000 || $val >24) {
			echo "Values not in range.. Page is not going to redirect....";
			echo "<a href = 'generate.php'>GO BACK</a>";
		}else{
			$id = get_field('id');
			$key = generate_token (16);
			$qr = mysql_real_escape_string(qr($key));
			$valid = generate_token (6);
			$pin = generate_token (4);
			$query = "insert into ilmasecurity values('','$id','$key','$qr','$valid','$pin','$amount','$val')";
			$queryrun = mysql_query($query);
			if ($queryrun) {
				send_mail($valid);
				$_SESSION['valid'] = $valid;
				$_SESSION['pin'] = $pin;
				$_SESSION['qrcode'] = $qr;
				$_SESSION['key'] = $key;
				header("Location:next.php");
			}else{
				echo "Error generating ILMA... You will be redirected to last page";
				echo "<a href = 'generate.php'>GO BACK</a>";	
			}
		}
	}
	function send_mail($valid){
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
		$mail->Body    = "Your OTP password is -  ".$valid;
		$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

		if(!$mail->Send())
		{
		   echo "Message could not be sent. <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}

		echo "Message has been sent";
	}
	function generate_token ($len)
	{
 
		// Array of potential characters, shuffled.
		$chars = array(
			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
		);
		shuffle($chars);
 
		$num_chars = count($chars) - 1;
		$token = '';
 
		// Create random token at the specified length.
		for ($i = 0; $i < $len; $i++)
		{
			$token .= $chars[mt_rand(0, $num_chars)];
		}
 
		return $token;
 
	}
?>