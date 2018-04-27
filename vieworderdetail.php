<style media="screen">
  .jumbotron{
  background-image: url(pic/order.png);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-blend-mode: overlay;
}
#divoverflow{
  max-width: 250px;
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
  <h1>รายการสินค้า</h1>
  <p>รายการสินค้าที่สั่ง</p>
</div>
<div class="page-header">
  <h1>รายการสั่งซื้อ</h1>
</div>
<table class="table">
    <thead>
      <tr>
        <th>รูปสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>ราคาสินค้า</th>
        <th>จำนวนสินค้า</th>
        <th>ราคารวมสินค้า</th>
        <th>สถานะสินค้า</th>
      </tr>
    </thead>
		<?php
     $SumTotal = 0;
		 $sql = "SELECT * FROM cp_orderdetail INNER JOIN cp_product ON cp_orderdetail.pd_id = cp_product.pd_id WHERE cp_orderdetail.order_id = '".$_GET["orderid"]."'";
		 $query = mysqli_query($con, $sql); ?>
		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
    <tbody>
      <tr>
        <td><img src="pic\product\<?php echo $result["pd_image1"];?>" width="100" height="100"></img></td>
				<td id="divoverflow"><a href="productsee.php?pdid=<?php echo $result["pd_id"];?>"><?php echo $result["pd_name"];?></a></td>
        <td><?php echo $result['pd_price']; ?> บาท</td>
        <td><?php echo $result['oddt_qty']; ?></td>
        <?php $SumTotal = $SumTotal + $result['oddt_qty'] * $result['pd_price']; ?>
        <?php $price = $result['oddt_qty'] * $result['pd_price'];?>
        <td><?php echo $price; ?>  บาท</td>
        <td><?php if($result['oddt_status'] == "รอจัดส่ง") { echo $result['oddt_status']; } else { ?><a href="pic\ems\<?php echo $result["oddt_image"];?>"><?php echo $result["oddt_status"];?></a> &nbsp
        <?php if($result['oddt_status'] != "ไม่ได้รับสินค้า" && $result['oddt_status'] != "ได้รับสินค้า") { ?> <a class="btn btn-danger" href="confirmordererror.php?oddtid=<?php echo $result["oddt_id"];?>&oddtimage=<?php echo $result["oddt_image"];?>">แจ้งไม่ได้รับสินค้า</a>
        <a class="btn btn-success" href="confirmordersuccess.php?oddtid=<?php echo $result["oddt_id"];?>&pdid=<?php echo $result["pd_id"];?>&userid=<?php echo $result["user_id"];?>&pdprice=<?php echo $result['pd_price'];?>">แจ้งได้รับสินค้า</a> <?php } ?>
        <?php } ?></td>
      </tr>
    </tbody>
		<?php } ?>
</table>
<h1 align="right">ราคารวมทั้งหมด <?php echo number_format($SumTotal);?> บาท</h1>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
