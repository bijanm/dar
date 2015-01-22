<?php
	$username = mysql_real_escape_string($_POST['username']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	 
	$checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
	 
	if(mysql_num_rows($checklogin) == 1)
	{
			$row = mysql_fetch_array($checklogin);
			$email = $row['EmailAddress'];
			 
			$_SESSION['Username'] = $username;
			$_SESSION['EmailAddress'] = $email;
			$_SESSION['LoggedIn'] = 1;
			 
			echo "<h1>Success</h1>";
			echo "<p>We are now redirecting you to the member area.</p>";
			echo "<meta http-equiv='refresh' content='=2;index.php' />";
	}
	else
	{
			include_once('../../includes/error.inc');
	}
?>
