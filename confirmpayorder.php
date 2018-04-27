<style media="screen">
  .jumbotron{
  background-image: url(pic/promtpay.jpg);
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
  <h1>ยืนยันโอนเงิน</h1>
  <p>อัพโหลดใบสลิปโอนเงินเพื่อยืนยันการโอนเงิน</p>
</div>
<div class="page-header">
  <h1>ยืนยันโอนเงิน</h1>
</div>
<form class="form-horizontal" name="form2" method="post" action="confirmpayordersave.php?orderid=<?php echo $_GET['orderid']; ?>" enctype="multipart/form-data">
  <div class="form-group">
    <h3>สามารถโอนเงินผ่าน Promtpay มาได้ที่เลขที่บัญชี 936-2-01999-8 ฟรี ไม่เสียค่าธรรมเนียม</h3>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">รูปภาพยืนยันการโอนเงิน</label>
    <div class="col-sm-4">
  <input name="txtImage" type="file"  required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="btnSubmit" class="btn btn-primary" type="submit" value="ยืนยันการโอน">
    </div>
  </div>
</form>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
