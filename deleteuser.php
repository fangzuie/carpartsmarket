<?php
  require_once("include/connect.php");
	ini_set('display_errors', 1);
	error_reporting(~0);

  $userid = $_GET["userid"];

  $sql = "SELECT * FROM cp_product WHERE user_id = '$userid' ";
  $query = mysqli_query($con,$sql);
  $result1 = mysqli_fetch_assoc($query);

  if(isset($result1)){
  while($result1 = mysqli_fetch_assoc($query)){
  $img = $result1['pd_image1'];
  unlink("pic/product/".$img);
  }
}

	$sql2 = "DELETE FROM cp_product
			     WHERE user_id = '$userid' ";
	mysqli_query($con,$sql2);

  $sql3 = "SELECT * FROM cp_order WHERE user_id = '$userid' ";
  $query3 = mysqli_query($con,$sql3);
  $result3 = mysqli_fetch_assoc($query3);
  $oderid = $result3['order_id'];

  if(isset($result3)){
    $sql4 = "DELETE FROM cp_order
            WHERE user_id = '$userid' ";
            mysqli_query($con,$sql4);
  }
  if(isset($oderid)){
    $sql5 = "DELETE FROM cp_orderdetail
          WHERE order_id = '$oderid' ";
          mysqli_query($con,$sql5);
  }

  $sql6 = "SELECT * FROM cp_user WHERE user_id = '$userid' ";
  $query6 = mysqli_query($con,$sql6);
  $result6 = mysqli_fetch_assoc($query6);
  $imageuser = $result6['user_image'];
  unlink("pic/profile/".$result6["user_image"]);

  $sql7 = "DELETE FROM cp_user
        WHERE user_id = '$userid' ";
        mysqli_query($con,$sql7);

    echo ("<SCRIPT LANGUAGE='JavaScript'>
   window.alert('ลบ User เรียบร้อยแล้ว')
   window.location.href='manageuser.php';
   </SCRIPT>");

	mysqli_close($con);
?>
