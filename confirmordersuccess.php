<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

	$sql = "UPDATE cp_orderdetail
          SET oddt_status = 'ได้รับสินค้า',
          oddt_status2 = '1'
          WHERE oddt_id = '".$_GET["oddtid"]."'";

  $sql2 = "UPDATE cp_product
          SET pd_respect = pd_respect + 1
          WHERE pd_id = '".$_GET["pdid"]."'";

  $sql3 = "UPDATE cp_user
          SET user_respect = user_respect + 1,
              user_bank = user_bank + '".$_GET["pdprice"]."'
          WHERE user_id = '".$_GET["userid"]."'";

          mysqli_query($con,$sql);
          mysqli_query($con,$sql2);
          mysqli_query($con,$sql3);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้ง่ได้รับสินค้าเรียบร้อยแล้ว')
          javascript:history.go(-1)
          </SCRIPT>");

?>
