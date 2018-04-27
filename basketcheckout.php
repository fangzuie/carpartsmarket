<?php
session_start();

include "include/connect.php";

    $strSQL1 = "SELECT * FROM cp_user WHERE user_id = '".$_SESSION["user_id"]."'";
  	$objQuery1 = mysqli_query($con,$strSQL1);
  	$objResult1 = mysqli_fetch_array($objQuery1);
  	if($objResult1['user_bank'] < $_GET["txtSumTotal"]){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('ยอดเงินคงเหลือไม่เพียงพอ โปรดเลือกวิธีชำระเงินใหม่')
    window.location.href='basket.php';
    </SCRIPT>");
    } else {

    $bank1 = $objResult1['user_bank'];
    $bank2 = $_GET["txtSumTotal"];
    $bank = $bank1 - $bank2;
    $strSQL3 = "
    UPDATE cp_user
    SET user_bank = '$bank'
    WHERE user_id = '".$_SESSION["user_id"]."'
    ";
    mysqli_query($con,$strSQL3);

    $strSQL = "
  	INSERT INTO cp_order (order_date,user_id,order_status)
  	VALUES
  	('".date("Y-m-d H:i:s")."','".$_SESSION["user_id"]."','โอนเงินเรียบร้อย')
    ";
    $objQuery = mysqli_query($con,$strSQL);
    if(!$objQuery)
    {
  	echo $con->error;
  	exit();
    }

    $strOrderID = mysqli_insert_id($con);

    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
    {
  	  if($_SESSION["strProductID"][$i] != "")
  	  {
          $strpdid = $_SESSION["strProductID"][$i];
          $sql = "select * from cp_product where pd_id = $strpdid ";
          $query = mysqli_query($con,$sql);
          $result = ($result = mysqli_fetch_assoc($query));
          $resultpd = $result['pd_quantity'];
          $pdqty = $resultpd - $_SESSION["strQty"][$i];

  			  $strSQL = "
  				INSERT INTO cp_orderdetail (order_id,pd_id,oddt_qty,oddt_status,oddt_datetime)
  				VALUES
  				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."','รอจัดส่ง','".date("Y-m-d H:i:s")."')
  			  ";

          $strSQL2 = "
  				UPDATE cp_product
  				SET pd_quantity = '$pdqty'
          WHERE pd_id = $strpdid
  			  ";

  			  mysqli_query($con,$strSQL);
          mysqli_query($con,$strSQL2);
  	  }
    }

  mysqli_close($con);

  unset($_SESSION["intLine"]);
  unset($_SESSION["strProductID"]);
  unset($_SESSION["strQty"]);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('สั่งซื้อเรียบร้อยแล้ว')
  window.location.href='vieworder.php';
  </SCRIPT>");
  }
