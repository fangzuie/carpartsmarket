<?php
  require_once("include/connect.php");


  $pdid = $_GET['pdid'];
  $strSQL = "UPDATE cp_product
  SET pd_status = '0'
  WHERE pd_id = $pdid";
  $objQuery = mysqli_query($con,$strSQL);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('ปิดสินค้าเรียบร้อยแล้ว')
  window.location.href='profile.php';
  </SCRIPT>");

  mysqli_close($con);
 ?>
