<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

  $target_dir = "pic/slip/";
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
  if(move_uploaded_file($_FILES["txtImage"]["tmp_name"],"pic/slip/".$newName))



	$sql = "UPDATE cp_order
          SET order_status = 'รอยืนยันการโอน',
              order_image = '".$newName."'
          WHERE order_id = '".$_GET["orderid"]."'";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('แจ้งโอนเงินเรียบร้อยแล้ว')
          window.location.href='vieworder.php';
          </SCRIPT>");

?>
