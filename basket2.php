<style media="screen">
  .jumbotron{
  background-image: url(pic/basket.png);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-blend-mode: overlay;
}#divoverflow{
  max-width: 550px;
  white-space: nowrap;
  width: 6em;
  overflow: hidden;
  text-overflow: ellipsis;
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
  <h1>ตะกร้าสินค้า</h1>
  <p>เชิญเลือกชมและคัดสรรสินค้าที่จะสั่งซื้อต่อไป</p>
</div>
<div class="page-header">
  <h1>สินค้าที่เลือก</h1>
</div>
<?php if(isset($_SESSION['intLine'])) { ?>
<table class="table">
    <thead>
      <tr>
        <th>รูปสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>ราคาสินค้า</th>
        <th>ราคารวมสินค้า</th>
        <th>จำนวนสินค้า</th>
      </tr>
    </thead>
    <form action="basketupdate.php" method="post">
      <?php
    $Total = 0;
    $SumTotal = 0;

    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
    {
      if($_SESSION["strProductID"][$i] != "")
      {
      $strSQL = "SELECT * FROM cp_product WHERE pd_id = '".$_SESSION["strProductID"][$i]."' ";
      $objQuery = mysqli_query($con,$strSQL);
      $objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
      $Total = $_SESSION["strQty"][$i] * $objResult["pd_price"];
      $SumTotal = $SumTotal + $Total;
      ?>
    <tbody>
      <tr>
        <td><img src="pic\product\<?php echo $objResult["pd_image1"];?>" width="100" height="100"></img></td>
        <td id="divoverflow"><a href="productsee.php?pdid=<?php echo $objResult["pd_id"];?>"><?php echo $objResult["pd_name"];?></a></td>
        <td><?php echo number_format($objResult["pd_price"]);?> บาท</td>
        <td><?php echo number_format($Total);?> บาท</td>
        <td><input type="number" name="txtQty<?php echo $i;?>" class="form-control" placeholder="จำนวน" style="width: 83px;" value="<?php echo $_SESSION["strQty"][$i];?>" min="1" max="<?php echo $objResult["pd_quantity"];?>"></input></td>
        <td><input type="submit" class="btn btn-primary" value="แก้ไข"></input> <a class="btn btn-danger" href="deletebasket.php?Line=<?=$i;?>">ลบสินค้า</a></td>
      </tr>
    </tbody>
    <?php
	  }
  }
  ?>
</table>
  <?php if($SumTotal != "0.00") { ?>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">วิธีชำระเงิน</label>
      <div class="col-sm-4">
        <select onchange="location = this.value;" name=txtBuytype class="form-control col-sm-4" id="sel1">
          <option value="basket.php">ชำระด้วยการหักเงิน</option>
          <option selected value="basket2.php">ชำระด้วยการโอนเงิน</option>
        </select>
        </div>
      </div><h1 align="right">ราคารวมทั้งหมด <?php echo number_format($SumTotal);?> บาท &nbsp;<a type="submit" class="btn btn-primary" href="basketcheckout2.php" onclick="return confirm('คุณแน่ใจว่าจะสั่งซื้อสินค้าใช่หรือไม่');">สั่งซื้อสินค้า</a> <a class="btn btn-danger" href="deleteallbasket.php?Line=<?=$i;?>">ลบสินค้าทั้งหมด</a></h1>
  <?php } else { ?> <h1>ยังไม่มีสินค้าในตะกร้า</h1> <?php } ?>
  </form>
  <?php } else { ?> <h1>ยังไม่มีสินค้าในตะกร้า</h1> <?php } ?>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
