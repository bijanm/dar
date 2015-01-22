<?php
@ $db = new mysqli('localhost', 'root', '', 'acd');
if (mysqli_connect_errno())
	{echo 'Error: Could not connect to databse. Please try again later.';
	exit;
	}
?>