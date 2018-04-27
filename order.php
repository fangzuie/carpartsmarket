<?php
ob_start();
session_start();

$pdquantity = $_GET['pdquantity'];

if(!isset($_SESSION["intLine"]))
{
	if(isset($_POST["txtProductID"]))
	{
		 $_SESSION["intLine"] = 0;
		 $_SESSION["strProductID"][0] = $_POST["txtProductID"];
		 $_SESSION["strQty"][0] = $_POST["txtQty"];

     echo ("<SCRIPT LANGUAGE='JavaScript'>
     window.alert('เพิ่มสินค้าเรียบร้อยแล้ว')
     window.location.href='basket.php';
     </SCRIPT>");
	}
}
else
{

	$key = array_search($_POST["txtProductID"], $_SESSION["strProductID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + $_POST["txtQty"];
		 if($_SESSION["strQty"][$key] > $pdquantity)
		 {
			 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] - $_POST["txtQty"];
			 echo ("<SCRIPT LANGUAGE='JavaScript'>
		   window.alert('คุณเพิ่มสินค้าเกินที่มีใน Stock')
		   window.location.href='basket.php';
		   </SCRIPT>");
		 }
	}

	else
	{

		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_POST["txtProductID"];
		 $_SESSION["strQty"][$intNewLine] = $_POST["txtQty"];
	}

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.alert('เพิ่มสินค้าเรียบร้อยแล้ว')
  window.location.href='basket.php';
  </SCRIPT>");

}
?>
