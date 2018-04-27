<?php

	require_once("include/connect.php");

  if(trim($_POST["txtName"]) == "")
  {
    echo "Please Insert Name!";
    exit();
  }

  if(trim($_POST["txtLastname"]) == "")
  {
    echo "Please Insert Lastname!";
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

  if(trim($_POST["txtEmail"]) == "")
  {
    echo "Please Insert Email!";
    exit();
  }

  if(trim($_POST["txtFacebook"]) == "")
  {
    echo "Please Insert Facebook ID!";
    exit();
  }

  if(trim($_POST["txtLine"]) == "")
  {
    echo "Please Insert Line ID!";
    exit();
  }

  if(trim($_POST["txtTelephone"]) == "")
  {
    echo "Please Insert Telephone Number!";
    exit();
  }

  if(trim($_POST["txtAddress"]) == "")
  {
    echo "Please Insert Telephone Address!";
    exit();
  }
	$target_dir = "pic/profile/";
	$target_file = $target_dir . basename($_FILES["txtImage"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('ไฟล์ไม่ใช่ไฟล์รูปภาพ กรุณาลองใหม่อีกครั้ง')
		javascript:history.go(-1)
		</SCRIPT>");
		exit;
	}

	if ($_FILES["txtImage"]["size"] > 500000) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('ไฟล์มีขนาดใหญ่เกินไป กรุณาลองใหม่อีกครั้ง')
		javascript:history.go(-1)
		</SCRIPT>");
		exit;
	}

	$newName = date('YmdHis').'.'.$imageFileType;
	if(move_uploaded_file($_FILES["txtImage"]["tmp_name"],"pic/profile/".$newName))

	$strSQL = "SELECT * FROM cp_user WHERE user_name = '".trim($_POST['txtUsername'])."' ";
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

		$strSQL = "INSERT INTO cp_user (user_fullname,user_lastname,user_name,user_password,user_email,user_facebook,user_line,user_telephone,user_address,user_image,user_money,user_status2)
    VALUES ('".$_POST["txtName"]."','".$_POST["txtLastname"]."','".$_POST["txtUsername"]."','".$_POST["txtPassword"]."','".$_POST["txtEmail"]."','".$_POST["txtFacebook"]."','".$_POST["txtLine"]."','".$_POST["txtTelephone"]."',
		'".$_POST["txtAddress"]."','".$newName."','".$_POST["txtMoney"]."','1')";
		$objQuery = mysqli_query($con,$strSQL);

		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('สมัครสมาชิคเรียบร้อย กรุณาล๊อกอินเพื่อเข้าสู่ระบบ')
		window.location.href='index.php';
		</SCRIPT>");

	}

	mysqli_close($con);
?>
