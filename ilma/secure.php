<?php
 
	/**
	 * Generate an encryption key for CodeIgniter.
	 * http://codeigniter.com/user_guide/libraries/encryption.html
	 */
 
	// http://www.itnewb.com/v/Generating-Session-IDs-and-Random-Passwords-with-PHP
	function generate_token ($len = 16)
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
<!DOCTYPE html>
 
<html lang="en-us" dir="ltr">
 
<head>
 
	<meta charset="utf-8">
 
	<title>CodeIgniter encryption key generator</title>
	<meta name="description" content="Generates a random, 32 character string to be used by CodeIgniter&#8217;s encryption class.">
 
</head>
 
<body>
 
	<pre><code><?php echo '$config[\'encryption_key\'] = \'' . generate_token(16) . '\';'; ?></code></pre>
 
</body>
 
</html>