<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

	$sql = "INSERT INTO cp_reportdeleteproduct (report_detail, report_date, pd_id, user_id)
		VALUES ('".$_POST["txtReport"]."',NOW(),'".$_GET["pdid"]."','".$_SESSION["user_id"]."')";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้งลบสินค้าเรียบร้อยแล้ว')
          javascript:history.go(-2)
          </SCRIPT>");

?>
