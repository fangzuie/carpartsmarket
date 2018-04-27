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
  <h1>ประกาศขายสินค้า</h1>
  <p>กรอกข้อมูลสินค้าให้ครบถ้วนเพื่อเริ่มประกาศขายสินค้า</p>
</div>
<form class="form-horizontal" name="form2" method="post" action="productaddsave.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ชื่อสินค้า</label>
    <div class="col-sm-4">
      <input type="text" name="txtName" class="form-control" id="txtName" placeholder="ชื่อสินค้าที่ต้องการให้แสดง" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">รายละเอียดสินค้า</label>
    <div class="col-sm-4">
      <textarea type="text" name="txtDetail" class="form-control" id="txtAddress" placeholder="รายละเอียดสินค้าที่ต้องการให้แสดง" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ราคาสินค้า</label>
    <div class="col-sm-4">
      <input type="number" name="txtPrice" class="form-control" id="txtName" placeholder="ราคาสินค้า" min="1" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">จำนวนสินค้า</label>
    <div class="col-sm-4">
      <input type="number" name="txtQuantity" class="form-control" id="txtName" placeholder="จำนวนสินค้า" min="1" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ประเภทสินค้า</label>
    <div class="col-sm-4">
      <select name=txtProducttype class="form-control col-sm-4" id="sel1">
        <?php
        $sql = "SELECT * FROM cp_producttype";
        $query = mysqli_query($con,$sql);
          while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
        {
        ?>
        <option value="<?php echo $result["pdt_id"];?>"><?php echo $result["pdt_name"];?></option>
        <?php
        }
        ?>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">รูปภาพสินสินค้า</label>
      <div class="col-sm-4">
    <input name="txtImage" type="file" required>
      </div>
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input name="btnSubmit" class="btn btn-primary" type="submit" value="เพิ่มสินค้า">
    </div>
  </div>
</form>
</div>
  </body>
</html>
