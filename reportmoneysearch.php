<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">การจัดการโอนเงิน</h1>
          <div class="row">
            <h4>เรียงตาม  <select onchange="location = this.value;">
              <option></option>
              <option value="reportmoneysearch.php?search=โอนเงินเรียบร้อย">โอนเงินเรียบร้อย</option>
              <option value="reportmoneysearch.php?search=รอยืนยันการโอน">รอยืนยันการโอนเงิน</option>
              <option value="reportmoneysearch.php?search=ยังไม่โอนเงิน">ยังไม่โอนเงิน</option>
              <option value="reportmoneysearch.php?search=โอนเงินไม่ถูกต้อง">โอนเงินไม่ถูกต้อง</option>
              <option value="reportmoneysearch.php?search=ยกเลิกคำสั่งซื้อ">ยกเลิกคำสั่งซื้อ</option>
              <option value="reportmoney.php">ทั้งหมด</option>
            </select></h4>
            <table class="table">
                <thead>
                  <tr>
                    <th>ใบสั่งสินค้าเลขที่</th>
                    <th>วันที่ออกใบสั่งสินค้า</th>
                    <th>ผู้สั่ง</th>
                    <th>สถานะการโอนเงิน</th>
                  </tr>
                </thead>
                <?php $sql = "SELECT * FROM cp_order INNER JOIN cp_user ON cp_order.user_id = cp_user.user_id WHERE cp_order.order_status = '".$_GET["search"]."' order by order_id desc";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
                <tbody>
                  <tr>
                    <td><a href="vieworderdetail.php?orderid=<?php echo $result['order_id'];?>"><?php echo $result['order_id'];?></a></td>
                    <td><?php echo $result['order_date']; ?></td>
                    <td><a href="usersee.php?userid=<?php echo $result['user_id']; ?>"><?php echo $result['user_fullname']; ?> <?php echo $result['user_lastname']; ?></a></td>
                    <?php if($result['order_status'] == 'รอยืนยันการโอน') { ?>
                    <td><a href="pic\slip\<?php echo $result['order_image']; ?>"><?php echo $result['order_status']; ?></a></td>
                    <?php } else { ?>
                      <td><?php echo $result['order_status']; ?></td>
                      <?php } ?>
                    <td><a class="btn btn-success" href="confirmslip.php?orderid=<?php echo $result['order_id']; ?>" onclick="return confirm('โอนเงินแล้วเรียบร้อยใช่หรือไม่');">ยืนยันสถานะการโอนเงิน</a> <a class="btn btn-danger" href="confirmsliperror.php?orderid=<?php echo $result['order_id']; ?>" onclick="return confirm('โอนเงินไม่เรียบร้อยใช่หรือไม่');">แจ้งการโอนเงินไม่ถูกต้อง</a></td>
                  </tr>
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
