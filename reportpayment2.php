<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">รายการขอถอนเงิน</h1>
          <div class="row">
            <h4>เรียงตาม  <select onchange="location = this.value;">
              <option></option>
              <option value="reportpayment2.php?search=รอยืนยันโอนเงิน">รอยืนยันโอนเงิน</option>
              <option value="reportpayment2.php?search=โอนเงินไม่เรียบร้อย">โอนเงินไม่เรียบร้อย</option>
              <option value="reportpayment2.php?search=โอนเงินเรียบร้อยแล้ว">โอนเงินเรียบร้อยแล้ว</option>
              <option value="reportpayment.php">ทั้งหมด</option>
            </select></h4>
            <table class="table">
                <thead>
                  <tr>
                    <th>ใบรายงานเลขที่</th>
                    <th>จำนวนเงินที่ต้องการถอน</th>
                    <th>วันที่แจ้งถอนเงิน</th>
                    <th>ผู้ขอถอนเงิน</th>
                    <th>สถานะถอนเงิน</th>
                  </tr>
                </thead>
                <?php
                $search = $_GET['search'];
                 $sql = "SELECT * FROM cp_reportrequestmoney INNER JOIN cp_user ON cp_reportrequestmoney.user_id = cp_user.user_id WHERE cp_reportrequestmoney.report_status = '$search' order by report_id desc";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['report_id']; ?></td>
                    <td><?php echo $result['report_money']; ?></td>
                    <td><?php echo $result['report_date']; ?></td>
                    <td><a href="usersee.php?userid=<?php echo $result['user_id']; ?>"><?php echo $result['user_fullname']; ?> <?php echo $result['user_lastname']; ?></a></td>
                    <td><?php echo $result['report_status']; ?></td>
                    <?php if($result['report_status'] =='รอยืนยันโอนเงิน') { ?>
                    <td><a class="btn btn-success" href="confirmreportmoney2.php?reportid=<?php echo $result['report_id']; ?>" onclick="return confirm('โอนเงินเรียบร้อยใช่หรือไม่');">แจ้งการโอนเงินเรียบร้อย</a></td>
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
