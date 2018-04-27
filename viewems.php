<?php include "include/header.php" ?>
  <body>
<?php include "include/navbar.php" ?>
<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>แก้ไขข้อมูลสินค้า</h1>
  <p>กรอกข้อมูลสินค้าใหม่และกดปุ่มแก้ไขสินค้าเพื่อบันทึก</p>
</div>
<?php
   $strCustomerID = null;
   if(isset($_GET["oddtid"]))
   {
	   $strCustomerID = $_GET["oddtid"];
   }
  $sql = "SELECT * FROM cp_orderdetail WHERE oddt_id = '".$strCustomerID."' ";
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
 ?>
 <div class="carousel-inner" role="listbox">
   <div class="item active">
     <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/ems/<?php echo $result['oddt_image'];?>">
   </div>
 </div>
 <br>
</div>
  </body>
</html>
