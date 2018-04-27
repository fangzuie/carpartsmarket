<?php
  require_once("include/connect.php");


  $userid = $_GET['userid'];
  $strSQL = "UPDATE cp_user
  SET user_status2 = '1'
  WHERE user_id = $userid";
  $objQuery = mysqli_query($con,$strSQL);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('ปลด Block User เรียบร้อยแล้ว')
  window.location.href='manageuser.php';
  </SCRIPT>");

  mysqli_close($con);
 ?>
