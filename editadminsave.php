<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");
  $adminid = $_GET['adminid'];

  $sql = "UPDATE cp_admin
          SET admin_id = '$adminid',
          admin_name = '".$_POST["txtName"]."',
          admin_username = '".$_POST["txtUsername"]."',
          admin_password = '".$_POST["txtPassword"]."'
          WHERE admin_id = '$adminid' ";

	mysqli_query($con,$sql);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('แก้ไขข้อมูลเรียบร้อย')
  window.location.href='manageadmin.php';
  </SCRIPT>");

?>
