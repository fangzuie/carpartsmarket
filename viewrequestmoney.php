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
  <h1>ประวัติการถอนเงิน</h1>
  <p>ดูประวัติการถอนเงินได้ที่นี่</p>
</div>
<div class="page-header">
  <h1>รายการถอนเงิน</h1>
</div>
<?php
  $sql = "select * from cp_reportrequestmoney where user_id = '".$_SESSION["user_id"]."'";
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);
  if(isset($result)) { ?>
    <h4>เรียงตาม  <select onchange="location = this.value;">
      <option></option>
      <option value="viewrequestmoney2.php?reportstatus=รอยืนยันโอนเงิน">รอยืนยันโอนเงิน</option>
      <option value="viewrequestmoney2.php?reportstatus=แจ้งโอนเงินไม่ถูกต้อง">แจ้งโอนเงินไม่ถูกต้อง</option>
      <option value="viewrequestmoney2.php?reportstatus=โอนเงินเรียบร้อยแล้ว">โอนเงินเรียบร้อยแล้ว</option>
      <option value="viewrequestmoney.php">ทั้งหมด</option>
    </select></h4>
<table class="table">
    <thead>
      <tr>
        <th>รหัสใบแจ้งถอนเงิน</th>
        <th>วันที่แจ้งถอนเงิน</th>
        <th>จำนวนเงินที่ถอน</th>
        <th>สถานะแจ้งถอนเงิน</th>
      </tr>
    </thead>
    <?php $sql2 = "select * from cp_reportrequestmoney where user_id = '".$_SESSION["user_id"]."' order by report_id desc";
          $query2 = mysqli_query($con, $sql2); ?>
		<?php while ($result = mysqli_fetch_assoc($query2)) { ?>
    <tbody>
      <tr>
        <td><?php echo $result['report_id']; ?></td>
				<td><?php echo $result['report_date']; ?></td>
        <td><?php echo $result['report_money']; ?> บาท</td>
        <td><?php echo $result['report_status']; ?></td>
        <td><?php if($result['report_status'] == 'โอนเงินเรียบร้อยแล้ว') { ?><a class="btn btn-danger" href="confirmreportmoney3.php?reportid=<?php echo $result['report_id']; ?>"onclick="return confirm('โอนเงินไม่เรียบร้อยใช่หรือไม่');">แจ้งโอนเงินไม่เรียบร้อย</a> <?php } ?></td>
      </tr>
    </tbody>
    <?php } ?>
    <?php } else { ?>
      <h1>ยังไม่มีรายการถอนเงิน</h1>
  <?php } ?>
</table>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
