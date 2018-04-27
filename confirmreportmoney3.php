<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

    $sql = "UPDATE cp_reportrequestmoney
            SET report_status = 'โอนเงินไม่เรียบร้อย'
            WHERE report_id = '".$_GET["reportid"]."'";

    mysqli_query($con,$sql);

		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('แจ้งโอนไม่เงินเรียบร้อยแล้ว')
    window.location.href='reportpayment.php';
    </SCRIPT>");
