<style media="screen">
  .jumbotron{
  background-image: url(pic/carparts.jpg);
  background-position: 0% 25%;
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-blend-mode: overlay;
}
</style>
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
   if(isset($_GET["pdid"]))
   {
	   $strCustomerID = $_GET["pdid"];
   }
  $sql = "SELECT * FROM cp_product WHERE pd_id = '".$strCustomerID."' ";
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
 ?>
 <div class="carousel-inner" role="listbox">
   <div class="item active">
     <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/product/<?php echo $result['pd_image1'];?>">
   </div>
   <?php if($result['pd_image2'] != "")
   {?>
   <div align="center" class="item">
     <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image2'];?>">
   </div>
   <?php } ?>
   <?php if($result['pd_image3'] != "")
   {?>
   <div align="center" class="item">
     <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image3'];?>">
   </div>
   <?php } ?><?php if($result['pd_image4'] != "")
   {?>
   <div align="center" class="item">
     <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image4'];?>">
   </div>
   <?php } ?><?php if($result['pd_image5'] != "")
   {?>
   <div align="center" class="item">
     <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image5'];?>">
   </div>
   <?php } ?>
 </div>
 <br>
<form class="form-horizontal" name="form2" method="post" action="producteditsave.php?pdid=<?php echo $_GET["pdid"];?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ชื่อสินค้า</label>
    <div class="col-sm-4">
      <input type="text" name="txtName" class="form-control" id="txtName" value="<?php echo $result["pd_name"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">รายละเอียดสินค้า</label>
    <div class="col-sm-4">
      <input type="text" name="txtDetail" class="form-control" id="txtAddress" value="<?php echo $result["pd_detail"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">จำนวนสินค้า</label>
    <div class="col-sm-4">
      <input type="number" min="0" name="txtQuantity" class="form-control" id="txtName" value="<?php echo $result["pd_quantity"];?>" required>
    </div>
  </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">ประเภทสินค้า</label>
      <div class="col-sm-4">
        <select name=txtProducttype class="form-control col-sm-4" id="sel1">
          <?php
          $pdtid = $result["pdt_id"];
          $SQLite3 = "SELECT * FROM cp_producttype";
          $query3 = mysqli_query($con,$SQLite3);
            while($result3=mysqli_fetch_array($query3,MYSQLI_ASSOC))
          {
          ?>
          <option value="<?php echo $result3["pdt_id"];?>"<?php if($result3["pdt_id"] == $pdtid) { echo "selected"; } ?> > <?php echo $result3["pdt_name"];?></option>
          <?php
          }
          ?>
          </select>
        </div>
      </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">รูปภาพสินสินค้าใหม่</label>
      <div class="col-sm-4">
    <input name="txtImage" type="file" value="">
    <input type="hidden" name="txtImageOld" value="<?php echo $result["pd_image1"];?>">
      </div>
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="btnSubmit" class="btn btn-primary" type="submit" value="แก้ไขสินค้า">
    </div>
  </div>
</form>
</div>
  </body>
</html>
