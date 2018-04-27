<?php
  require_once("include/connect.php");
	ini_set('display_errors', 1);
	error_reporting(~0);

  unlink("pic/product/".$_GET["pdimage"]);

	$strCustomerID = $_GET["pdid"];
	$sql = "DELETE FROM cp_product
			    WHERE pd_id = '".$strCustomerID."' ";

	$query = mysqli_query($con,$sql);

	if(mysqli_affected_rows($con)) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
   window.alert('ลบสินค้าเรียบร้อย')
   window.location.href='manageproduct.php';
   </SCRIPT>");
	}

	mysqli_close($con);
?>
