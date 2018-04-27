<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

	$sql = "UPDATE cp_order
          SET order_status = 'ยกเลิกคำสั่งซื้อ'
          WHERE order_id = '".$_GET["orderid"]."'";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้งยกเลิกคำสั่งซื้อ')
          window.location.href='vieworder.php';
          </SCRIPT>");

?>
