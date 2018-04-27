<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");
  $pdid = $_GET['userid'];

  if($_FILES["txtImage"]["name"] !== "" )
  {

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

  if ($_FILES["txtImage"]["size"] > 50000000) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ไฟล์มีขนาดใหญ่เกินไป กรุณาลองใหม่อีกครั้ง')
    javascript:history.go(-1)
    </SCRIPT>");
    exit;
  }

  $newName = date('YmdHis').'.'.$imageFileType;
  if(move_uploaded_file($_FILES["txtImage"]["tmp_name"],"pic/profile/".$newName))
  unlink("pic/profile/".$_POST["txtImageOld"]);

	$sql1 = "UPDATE cp_user
          SET user_fullname = '".$_POST["txtName"]."',
          user_lastname = '".$_POST["txtLastname"]."',
          user_password = '".$_POST["txtPassword"]."',
          user_email = '".$_POST["txtEmail"]."',
          user_facebook = '".$_POST["txtFacebook"]."',
          user_line = '".$_POST["txtLine"]."',
          user_telephone = '".$_POST["txtTelephone"]."',
          user_address = '".$_POST["txtAddress"]."',
          user_money = '".$_POST["txtMoney"]."',
          user_image = '".$newName."'
          WHERE user_id = $pdid ";

	mysqli_query($con,$sql1);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('แก้ไขข้อมูลเรียบร้อย')
  window.location.href='profile.php';
  </SCRIPT>");

}
else {
  $sql2 = "UPDATE cp_user
          SET user_fullname = '".$_POST["txtName"]."',
          user_lastname = '".$_POST["txtLastname"]."',
          user_password = '".$_POST["txtPassword"]."',
          user_email = '".$_POST["txtEmail"]."',
          user_facebook = '".$_POST["txtFacebook"]."',
          user_line = '".$_POST["txtLine"]."',
          user_telephone = '".$_POST["txtTelephone"]."',
          user_address = '".$_POST["txtAddress"]."',
          user_money = '".$_POST["txtMoney"]."',
          user_image = '".$_POST["txtImageOld"]."'
          WHERE user_id = $pdid ";

	mysqli_query($con,$sql2);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('แก้ไขข้อมูลเรียบร้อย')
  window.location.href='profile.php';
  </SCRIPT>");

	}

?>
