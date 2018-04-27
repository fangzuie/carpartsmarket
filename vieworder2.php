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
  <h1>ใบสั่งสินค้า</h1>
  <p>ติดตามสถานะรายการสินค้าได้ที่นี่</p>
</div>
<div class="page-header">
  <h1>รายการสั่งซื้อ</h1>
</div>
<?php
  $sql = "select * from cp_order where user_id = '".$_SESSION["user_id"]."'";
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);
  if(isset($result)) { ?>
    <h4>เรียงตาม  <select onchange="location = this.value;">
      <option></option>
      <option value="vieworder2.php?search=โอนเงินเรียบร้อย">โอนเงินเรียบร้อย</option>
      <option value="vieworder2.php?search=รอยืนยันการโอน">รอยืนยันการโอน</option>
      <option value="vieworder2.php?search=ยังไม่โอนเงิน">ยังไม่โอนเงิน</option>
      <option value="vieworder2.php?search=โอนเงินไม่ถูกต้อง">โอนเงินไม่ถูกต้อง</option>
      <option value="vieworder2.php?search=ยกเลิกคำสั่งซื้อ">ยกเลิกคำสั่งซื้อ</option>
      <option value="vieworder.php">ทั้งหมด</option>
    </select></h4>
<table class="table">
    <thead>
      <tr>
        <th>รหัสใบสั่งซื้อ</th>
        <th>วันที่สั่งซื้อ</th>
        <th>สถานะการโอนเงิน</th>
      </tr>
    </thead>
    <?php $sql2 = "select * from cp_order where user_id = '".$_SESSION["user_id"]."' and order_status = '".$_GET["search"]."' order by order_id desc";
          $query2 = mysqli_query($con, $sql2); ?>
		<?php while ($result = mysqli_fetch_assoc($query2)) { ?>
    <tbody>
      <tr>
        <td><?php echo $result['order_id']; ?></td>
				<td><?php echo $result['order_date']; ?></td>
        <td><?php echo $result['order_status']; ?></td>
        <td><a class="btn btn-primary" href="vieworderdetail.php?orderid=<?php echo $result['order_id']; ?>">ดูรายการสั่งซื้อ</a>
            <?php if($result['order_status'] != "รอยืนยันการโอน" && $result['order_status'] != "ยกเลิกคำสั่งซื้อ" && $result['order_status'] != "โอนเงินเรียบร้อย") { ?><a class="btn btn-success" href="confirmpayorder.php?orderid=<?php echo $result['order_id']; ?>">ยืนยันการโอน</a><?php } ?>
            <?php /* ?><a class="btn btn-danger" href="cancelorder.php?orderid=<?php echo $result['order_id']; ?>&orderimage=<?php echo $result['order_image']; ?>">ยกเลิกคำสั่งซื้อ</a></td> <?php */ ?>
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
