<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

  unlink("pic/ems/".$_GET["oddtimage"]);

	$sql = "UPDATE cp_orderdetail
          SET oddt_status = 'ไม่ได้รับสินค้า'
          WHERE oddt_id = '".$_GET["oddtid"]."'";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้งไม่ได้รับสินค้าเรียบร้อยแล้ว')
          javascript:history.go(-1)
          </SCRIPT>");

?>
