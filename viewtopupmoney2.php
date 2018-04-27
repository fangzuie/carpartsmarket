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
  <h1>ประวัติการเติมเงิน</h1>
  <p>ดูประวัติการเติมเงินได้ที่นี่</p>
</div>
<div class="page-header">
  <h1>รายการเติมเงิน</h1>
</div>
<?php
$reportstatus = $_GET["reportstatus"];
  $sql = "select * from cp_reporttopupmoney where user_id = '".$_SESSION["user_id"]."'";
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);
  if(isset($result)) { ?>
    <h4>เรียงตาม  <select onchange="location = this.value;">
      <option></option>
      <option value="viewtopupmoney2.php?reportstatus=รอยืนยันการเติมเงิน">รอยืนยันการเติมเงิน</option>
      <option value="viewtopupmoney2.php?reportstatus=แจ้งโอนเงินไม่ถูกต้อง">แจ้งโอนเงินไม่ถูกต้อง</option>
      <option value="viewtopupmoney2.php?reportstatus=เติมเงินเรียบร้อยแล้ว">เติมเงินเรียบร้อยแล้ว</option>
      <option value="viewtopupmoney.php">ทั้งหมด</option>
    </select></h4>
<table class="table">
    <thead>
      <tr>
        <th>รหัสใบแจ้งเติมเงิน</th>
        <th>วันที่แจ้งเติมเงิน</th>
        <th>สถานะแจ้งเติมเงิน</th>
      </tr>
    </thead>
    <?php $sql2 = "select * from cp_reporttopupmoney where user_id = '".$_SESSION["user_id"]."' And report_status = '$reportstatus' order by report_id desc";
          $query2 = mysqli_query($con, $sql2); ?>
		<?php while ($result = mysqli_fetch_assoc($query2)) { ?>
    <tbody>
      <tr>
        <td><?php echo $result['report_id']; ?></td>
				<td><?php echo $result['report_date']; ?></td>
        <td><?php echo $result['report_status']; ?></td>
        <td><?php if($result['report_status'] == 'แจ้งโอนเงินไม่ถูกต้อง') { ?><a class="btn btn-success" href="topupmoney2.php">ยืนยันการโอนใหม่</a> <?php } ?></td>
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
