<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

	$sql = "INSERT INTO cp_comment (cm_detail, cm_date, pd_id, user_id)
		VALUES ('".$_POST["txtDetail"]."',NOW(),'".$_POST["pdid"]."','".$_POST["userid"]."')";

          mysqli_query($con,$sql);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          javascript:history.go(-1)
          </SCRIPT>");

?>
