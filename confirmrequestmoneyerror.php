<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

  unlink("pic/topup/".$_GET["reportmoney"]);

	$sql = "UPDATE cp_reporttopupmoney
          SET report_status = 'โอนเงินไม่ถูกต้อง'
          WHERE report_id = '".$_GET["reportid"]."'";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้งโอนเงินไม่เรียบร้อย')
          window.location.href='reportorder.php';
          </SCRIPT>");

?>
