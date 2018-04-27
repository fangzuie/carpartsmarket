<style media="screen">
  .jumbotron{
  background-image: url(pic/profile.jpg);
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
  <h1>แก้ไขข้อมูลส่วนตัว</h1>
  <p>กรอกข้อมูลส่วนตัวใหม่และกดปุ่มแก้ไขข้อมูลเพื่อบันทึก</p>
</div>
<?php
   $strCustomerID = null;
   if(isset($_GET["userid"]))
   {
	   $strCustomerID = $_GET["userid"];
   }
  $sql = "SELECT * FROM cp_user WHERE user_id = '".$strCustomerID."' ";
  $query = mysqli_query($con,$sql);
  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
 ?>
 <div class="carousel-inner" role="listbox">
   <div class="item active">
     <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/profile/<?php echo $result['user_image'];?>">
   </div>
 </div>
 <br>
<form class="form-horizontal" name="form2" method="post" action="usereditsave.php?userid=<?php echo $_GET["userid"];?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ชื่อจริง</label>
    <div class="col-sm-4">
      <input type="text" name="txtName" class="form-control" id="txtName" value="<?php echo $result["user_fullname"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">นามสกุล</label>
    <div class="col-sm-4">
      <input type="text" name="txtLastname" class="form-control" id="txtName" value="<?php echo $result["user_lastname"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">พาสเวิร์ด</label>
    <div class="col-sm-4">
      <input type="text" name="txtPassword" class="form-control" id="txtAddress" value="<?php echo $result["user_password"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">อีเมลล์</label>
    <div class="col-sm-4">
      <input type="text" name="txtEmail" class="form-control" id="txtAddress" value="<?php echo $result["user_email"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">เฟสบุ๊ค</label>
    <div class="col-sm-4">
      <input type="text" name="txtFacebook" class="form-control" id="txtAddress" value="<?php echo $result["user_facebook"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">ไลน์</label>
    <div class="col-sm-4">
      <input type="text" name="txtLine" class="form-control" id="txtAddress" value="<?php echo $result["user_line"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
    <div class="col-sm-4">
      <input type="number" name="txtTelephone" class="form-control" id="txtAddress" value="<?php echo $result["user_telephone"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">ที่อยู่</label>
    <div class="col-sm-4">
      <input type="text" name="txtAddress" class="form-control" id="txtAddress" value="<?php echo $result["user_address"];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">เลขที่บัญชี</label>
    <div class="col-sm-4">
      <input type="text" name="txtMoney" class="form-control" id="txtAddress" value="<?php echo $result["user_money"];?>" required>
    </div>
  </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">รูปภาพประจำตัว</label>
      <div class="col-sm-4">
    <input name="txtImage" type="file" value="">
    <input type="hidden" name="txtImageOld" value="<?php echo $result["user_image"];?>">
      </div>
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="btnSubmit" class="btn btn-primary" type="submit" value="แก้ไขข้อมูล">
    </div>
  </div>
</form>
</div>
  </body>
</html>
