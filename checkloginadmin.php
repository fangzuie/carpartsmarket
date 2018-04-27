<?php
	session_start();
	require_once("include/connect.php");

	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM cp_admin WHERE admin_username = '".$strUsername."'
	and admin_password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ยูสเซอร์เนมหรือพาสเวิร์ดไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง')
    javascript:history.go(-1)
    </SCRIPT>");
	}
	else
	{
			$_SESSION["admin_id"] = $objResult["admin_id"];
      $_SESSION["admin_name"] = $objResult["admin_name"];
			session_write_close();

			echo ("<SCRIPT LANGUAGE='JavaScript'>
	    window.alert('ยินดีต้อนรับเข้าสู่ระบบ')
	    window.location.href='indexadmin.php';
	    </SCRIPT>");

	}
	mysqli_close($con);
?>
