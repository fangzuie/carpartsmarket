<style media="screen">
  .jumbotron{
  background-image: url(pic/order.png);
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
  <h1>แจ้งลบสินค้า</h1>
  <p>พิมพ์อธิบายเหตุผลที่ต้องการลบสินค้า</p>
</div>
<div class="page-header">
  <h1>แจ้งลบสินค้า</h1>
</div>
<form class="form-horizontal" name="form2" method="post" action="confirmreportproductdelete.php?pdid=<?php echo $_GET['pdid'];?>">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-1 control-label">รายงาน</label>
    <div class="col-sm-4">
      <textarea type="text" name="txtReport" class="form-control" id="txtAddress" placeholder="เหตุผลในการแจ้งลบสินค้า" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary" value="Save">Submit</button>
    </div>
  </div>
</form>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
