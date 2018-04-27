<?php
  require_once("include/connect.php");
	ini_set('display_errors', 1);
	error_reporting(~0);

	$adminid = $_GET["adminid"];
	$sql = "DELETE FROM cp_admin
			    WHERE admin_id = '".$adminid."' ";

	$query = mysqli_query($con,$sql);

	if(mysqli_affected_rows($con)) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
   window.alert('ลบแอดมินเรียบร้อยแล้ว')
   window.location.href='manageadmin.php';
   </SCRIPT>");
	}

	mysqli_close($con);
?>
