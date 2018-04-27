<?php
date_default_timezone_set('Asia/Bangkok');
$con = mysqli_connect("localhost","root","","carparts");
mysqli_set_charset($con, "utf8");
if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}
?>
