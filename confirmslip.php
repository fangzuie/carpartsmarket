<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

	$sql = "UPDATE cp_order
          SET order_status = 'โอนเงินเรียบร้อย'
          WHERE order_id = '".$_GET["orderid"]."'";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้งโอนเงินถูกต้องเรียบร้อยแล้ว')
          window.location.href='reportmoney.php';
          </SCRIPT>");

?>
