<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");
  $pdid = $_GET['pdid'];

  if($_FILES["txtImage"]["name"] !== "" )
  {

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

  if ($_FILES["txtImage"]["size"] > 5000000) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ไฟล์มีขนาดใหญ่เกินไป กรุณาลองใหม่อีกครั้ง')
    javascript:history.go(-1)
    </SCRIPT>");
    exit;
  }

  $newName = date('YmdHis').'.'.$imageFileType;
  if(move_uploaded_file($_FILES["txtImage"]["tmp_name"],"pic/product/".$newName))
  unlink("pic/product/".$_POST["txtImageOld"]);

	$sql1 = "UPDATE cp_product
          SET pd_name = '".$_POST["txtName"]."',
          pd_detail = '".$_POST["txtDetail"]."',
          pd_quantity = '".$_POST["txtQuantity"]."',
          pdt_id = '".$_POST["txtProducttype"]."',
          pd_image1 = '".$newName."'
          WHERE pd_id = $pdid ";

	mysqli_query($con,$sql1);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('แก้ไขสินค้าเรียบร้อยแล้ว')
  window.location.href='profile.php';
  </SCRIPT>");

}
else {
  $sql2 = "UPDATE cp_product
          SET pd_name = '".$_POST["txtName"]."',
          pd_detail = '".$_POST["txtDetail"]."',
          pd_quantity = '".$_POST["txtQuantity"]."',
          pdt_id = '".$_POST["txtProducttype"]."'
          WHERE pd_id = $pdid ";

  mysqli_query($con,$sql2);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('แก้ไขสินค้าเรียบร้อยแล้ว')
  window.location.href='profile.php';
  </SCRIPT>");

	}

?>
