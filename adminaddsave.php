<?php

	require_once("include/connect.php");

  if(trim($_POST["txtName"]) == "")
  {
    echo "Please Insert Name!";
    exit();
  }

	if(trim($_POST["txtUsername"]) == "")
	{
		echo "Please Insert Username!";
		exit();
	}

	if(trim($_POST["txtPassword"]) == "")
	{
		echo "Please Insert Password!";
		exit();
	}

	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password ทั้ง 2 ช่องไม่ตรงกัน กรุณาใส่ Password ใหม่อีกครั้ง')
    javascript:history.go(-1)
    </SCRIPT>");
		exit();
	}

	$strSQL = "SELECT * FROM cp_admin WHERE admin_username = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('มีผู้ใช้ยูสเซอร์เนมนี้แล้ว กรุณาลองตั้งยูสเซอร์เนมใหม')
    javascript:history.go(-1)
    </SCRIPT>");
	}
	else
	{

		$strSQL = "INSERT INTO cp_admin (admin_name,admin_username,admin_password)
    VALUES ('".$_POST["txtName"]."','".$_POST["txtUsername"]."','".$_POST["txtPassword"]."')";
		$objQuery = mysqli_query($con,$strSQL);

		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('สมัครสมาชิคเรียบร้อย')
		window.location.href='manageadmin.php';
		</SCRIPT>");

	}

	mysqli_close($con);
?>
