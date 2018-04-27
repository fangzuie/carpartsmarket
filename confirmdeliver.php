<style media="screen">
  .jumbotron{
  background-image: url(pic/delivery.png);
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
  <h1>ใบสั่งสินค้า</h1>
  <p>ติดตามสถานะรายการสินค้าได้ที่นี่</p>
</div>
<div class="page-header">
  <h1>รายการสั่งซื้อ</h1>
</div>
<form class="form-horizontal" name="form2" method="post" action="confirmdeliversave.php?oddtid=<?php echo $_GET['oddtid']; ?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">รูปภาพยืนยันการส่งสินค้า</label>
    <div class="col-sm-4">
  <input name="txtImage" type="file"  required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="btnSubmit" class="btn btn-primary" type="submit" value="ยืนยันการส่ง">
    </div>
  </div>
</form>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
