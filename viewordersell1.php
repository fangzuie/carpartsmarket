<style media="screen">
  .jumbotron{
  background-image: url(pic/delivery.png);
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
  <h1>ใบสั่งสินค้า</h1>
  <p>ติดตามสถานะรายการสินค้าได้ที่นี่</p>
</div>
<div class="page-header">
  <h1>รายการสั่งซื้อ</h1>
</div>
<?php
$userid = $_SESSION["user_id"];
$orderby = $_GET["orderby"];
$oddtstatus = $_GET["oddtstatus"];
  $sql2 = "select * from cp_orderdetail INNER JOIN cp_product ON cp_orderdetail.pd_id = cp_product.pd_id INNER JOIN cp_order ON cp_orderdetail.order_id = cp_order.order_id INNER JOIN cp_user ON cp_order.user_id = cp_user.user_id WHERE cp_product.user_id = '".$_SESSION["user_id"]."'";
  $query2 = mysqli_query($con, $sql2);
  $result2 = mysqli_fetch_assoc($query2);
  if(isset($result2)) { ?>
    <h4>เรียงตาม  <select onchange="location = this.value;">
      <option></option>
      <option value="viewordersell1.php?orderby=oddt_id desc&oddtstatus=รอจัดส่ง">รอจัดส่ง</option>
      <option value="viewordersell1.php?orderby=oddt_id desc&oddtstatus=ัดส่งแล้ว">จัดส่งแล้ว</option>
      <option value="viewordersell1.php?orderby=oddt_id desc&oddtstatus=ได้รับสินค้า">ได้รับสินค้า</option>
      <option value="viewordersell1.php?orderby=oddt_id desc&oddtstatus=ไม่ได้รับสินค้า">ไม่ได้รับสินค้า</option>
      <option value="viewordersell.php?orderby=oddt_id desc">ทั้งหมด</option>
    </select></h4>
    <form action="viewordersell2.php" method="GET">
    <div class="form-group col-md-2">
      <input name="txtUsername" id="txtUsername" type="text" placeholder="ค้นหาตามชื่อผู้ซื้อ" class="form-control" required>
      <input name="orderby" type="hidden" value="oddt_id desc" class="form-control">
    </div>
    <button type="submit" class="btn btn-success" value="Login">ค้นหา</button>
    </form>
<table class="table">
    <thead>
      <tr>
        <th>ชื่อลูกค้าที่สั่ง</th>
        <th>ชื่อสินค้าที่สั่ง</th>
        <th>จำนวนที่สั่ง</th>
        <th>วันที่สั่งซื้อ</th>
        <th>สถานะการโอนเงิน</th>
        <th>สถานะส่งสินค้า</th>
      </tr>
    </thead>
      <?php $sql = "select * from cp_orderdetail INNER JOIN cp_product ON cp_orderdetail.pd_id = cp_product.pd_id INNER JOIN cp_order ON cp_orderdetail.order_id = cp_order.order_id INNER JOIN cp_user ON cp_order.user_id = cp_user.user_id
                    WHERE cp_product.user_id = '".$_SESSION["user_id"]."' AND oddt_status = '$oddtstatus' order by '$orderby'";
          $query = mysqli_query($con, $sql); ?>
    <?php while ($result = mysqli_fetch_assoc($query)) {?>
    <tbody>
      <tr>
        <td><a href="usersee.php?userid=<?php echo $result["user_id"];?>"><?php echo $result["user_fullname"];?> <?php echo $result["user_lastname"];?></td>
        <td id="divoverflow"><a href="productsee.php?pdid=<?php echo $result["pd_id"];?>"><?php echo $result["pd_name"];?></td>
        <td><?php echo $result['oddt_qty']; ?></td>
        <td><?php echo $result['order_date']; ?></td>
        <td><?php echo $result['order_status']; ?></td>
        <td><?php echo $result['oddt_status']; ?></td>
        <?php if($result['order_status'] == "โอนเงินเรียบร้อย" && $result['oddt_status'] == "รอจัดส่ง") { ?><td><a class="btn btn-success" href="confirmdeliver.php?oddtid=<?php echo $result['oddt_id']; ?>">ยืนยันการส่งสินค้า</a></td><?php } ?>
      </tr>
    </tbody>
    <?php } ?>
    <?php } else { ?>
      <h1>ยังไม่มีรายการสั่งซื้อสินค้า</h1>
  <?php } ?>
</table>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
