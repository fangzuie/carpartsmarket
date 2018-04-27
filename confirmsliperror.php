<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

  unlink("pic/slip/".$_GET["orderimage"]);

	$sql = "UPDATE cp_order
          SET order_status = 'โอนเงินไม่ถูกต้อง'
          WHERE order_id = '".$_GET["orderid"]."'";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้งโอนเงินไม่เรียบร้อย')
          window.location.href='reportmoney.php';
          </SCRIPT>");

?>
