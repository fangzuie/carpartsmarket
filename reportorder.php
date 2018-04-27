<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">รายการเติมเงิน</h1>
          <div class="row">
            <h4>เรียงตาม  <select onchange="location = this.value;">
              <option></option>
              <option value="reportorder2.php?search=รอยืนยันการเติมเงิน">รอยืนยันการเติมเงิน</option>
              <option value="reportorder2.php?search=เติมเงินเรียบร้อยแล้ว">เติมเงินเรียบร้อยแล้ว</option>
              <option value="reportorder2.php?search=โอนเงินไม่ถูกต้อง">โอนเงินไม่ถูกต้อง</option>
              <option value="reportorder.php">ทั้งหมด</option>
            </select></h4>
            <table class="table">
                <thead>
                  <tr>
                    <th>ใบรายงานเลขที่</th>
                    <th>จำนวนเงินทีเติม</th>
                    <th>วันที่แจ้งเติมเงิน</th>
                    <th>ผู้เติมเงิน</th>
                    <th>สถานะเติมเงิน</th>
                  </tr>
                </thead>
                <?php $sql = "SELECT * FROM cp_reporttopupmoney INNER JOIN cp_user ON cp_reporttopupmoney.user_id = cp_user.user_id order by report_id desc";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['report_id']; ?></td>
                    <td><a href="pic/topup/<?php echo $result['report_money']; ?>"><?php echo $result['report_money']; ?></a></td>
                    <td><?php echo $result['report_date']; ?></td>
                    <td><a href="usersee.php?userid=<?php echo $result['user_id']; ?>"><?php echo $result['user_fullname']; ?> <?php echo $result['user_lastname']; ?></a></td>
                    <td><?php echo $result['report_status']; ?></td>
                    <?php if($result['report_status'] =='รอยืนยันการเติมเงิน') { ?>
                    <td><a class="btn btn-success" href="reportorder3.php?reportid=<?php echo $result['report_id']; ?>&userid=<?php echo $result['user_id']; ?>">แจ้งการโอนเงินเรียบร้อย</a> <a class="btn btn-danger" href="confirmrequestmoneyerror.php?reportid=<?php echo $result['report_id']; ?>&reportmoney=<?php echo $result['report_money']; ?>" onclick="return confirm('โอนเงินไม่เรียบร้อยใช่หรือไม่');">แจ้งการโอนเงินไม่เรียบร้อย</a></td>
                  <?php } ?>
                </tbody>
                <?php } ?>
              </table>
      </div>
        </div>
      </div>
      <?php include "include/footer.php" ?>
    </div>
    </div>
  </body>
</html>
