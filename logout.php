<?php
	session_start();

	require_once("include/connect.php");

	$sql = "UPDATE cp_user SET user_status = '0' WHERE user_id = '".$_SESSION["user_id"]."' ";
	$query = mysqli_query($con,$sql);

	session_destroy();
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('ออกจากระบบเรียบร้อย')
	window.location.href='index.php';
	</SCRIPT>");
?>
