<?php
  session_start();
	ini_set('display_errors', 1);
	error_reporting(~0);

	$con = mysqli_connect("localhost","root","","carparts");
  mysqli_set_charset($con, "utf8");

  $strSQL = "SELECT * FROM cp_reportrequestmoney WHERE user_id = '".$_POST["userid"]."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
    $sql = "INSERT INTO cp_reportrequestmoney (report_money, report_date, user_id, report_status)
    VALUES ('".$_POST["txtMoney"]."',NOW(),'".$_SESSION["user_id"]."','รอยืนยันโอนเงิน')";

    $sql3 = "UPDATE cp_user
            SET user_bank = user_bank - '".$_POST["txtMoney"]."'
            WHERE user_id = '".$_POST["userid"]."'";

    mysqli_query($con,$sql);
    mysqli_query($con,$sql3);

		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ขอถอนเงินเรียบร้อยแล้ว')
    window.location.href='viewrequestmoney.php';
    </SCRIPT>");
	}
	else
	{
    $sql2 = "UPDATE cp_reportrequestmoney
            SET report_money = report_money + '".$_POST["txtMoney"]."'
            WHERE user_id = '".$_POST["userid"]."'";

  $sql4 = "UPDATE cp_user
          SET user_bank = user_bank - '".$_POST["txtMoney"]."'
          WHERE user_id = '".$_POST["userid"]."'";

          mysqli_query($con,$sql2);
          mysqli_query($con,$sql4);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('ขอถอนเงินเรียบร้อยแล้ว')
          window.location.href='viewrequestmoney.php';
          </SCRIPT>");
}
?>
