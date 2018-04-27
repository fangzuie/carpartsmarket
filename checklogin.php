<?php
	session_start();
	require_once("include/connect.php");

	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM cp_user WHERE user_name = '".$strUsername."'
	and user_password = '".$strPassword."'";
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
			$sql = "UPDATE cp_user SET user_status = '1' , user_lastupdate = NOW() WHERE user_id = '".$objResult["user_id"]."' ";
			$query = mysqli_query($con,$sql);

			$_SESSION["user_id"] = $objResult["user_id"];
			$_SESSION["name"] = $objResult["user_fullname"];
			$_SESSION["lastname"] = $objResult["user_lastname"];
			$_SESSION["facebook"] = $objResult["user_facebook"];
			$_SESSION["line"] = $objResult["user_line"];
			$_SESSION["telephone"] = $objResult["user_telephone"];
			$_SESSION["address"] = $objResult["user_address"];
			$_SESSION["image"] = $objResult["user_image"];
			session_write_close();

			echo ("<SCRIPT LANGUAGE='JavaScript'>
	    window.alert('ยินดีต้อนรับเข้าสู่ระบบ')
	    window.location.href='index.php';
	    </SCRIPT>");

	}
	mysqli_close($con);
?>
