<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

	$sql = "UPDATE cp_reporttopupmoney
          SET report_status = 'เติมเงินเรียบร้อยแล้ว'
          WHERE report_id = '".$_POST["reportid"]."'";

  $sql3 = "UPDATE cp_user
          SET user_bank = user_bank + '".$_POST["txtMoney"]."'
          WHERE user_id = '".$_POST["userid"]."'";

          mysqli_query($con,$sql);
          mysqli_query($con,$sql3);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('เติมเงินเรียบร้อยแล้ว')
          window.location.href='reportorder.php';
          </SCRIPT>");

?>
