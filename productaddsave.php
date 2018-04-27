<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

  $target_dir = "pic/product/";
  $target_file = $target_dir . basename($_FILES["txtImage"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ไฟล์ไม่ใช่ไฟล์รูปภาพ กรุณาลองใหม่อีกครั้ง')
    javascript:history.go(-1)
    </SCRIPT>");
    exit;
  }

  if ($_FILES["txtImage"]["size"] > 50000000) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ไฟล์มีขนาดใหญ่เกินไป กรุณาลองใหม่อีกครั้ง')
    javascript:history.go(-1)
    </SCRIPT>");
    exit;
  }

  $newName = date('YmdHis').'.'.$imageFileType;
  if(move_uploaded_file($_FILES["txtImage"]["tmp_name"],"pic/product/".$newName))

	$sql = "INSERT INTO cp_product (pd_name, pd_detail, pd_price, pd_quantity, pdt_id, user_id, pd_timestamp, pd_image1,pd_status)
		VALUES ('".$_POST["txtName"]."','".$_POST["txtDetail"]."','".$_POST["txtPrice"]."'
		,'".$_POST["txtQuantity"]."','".$_POST["txtProducttype"]."','".$_SESSION["user_id"]."',NOW(),'".$newName."','1')";

	$query = mysqli_query($con,$sql);

	if($query) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('เพิ่มสินค้าเรียบร้อยแล้ว')
    window.location.href='index.php';
    </SCRIPT>");
	}

?>
