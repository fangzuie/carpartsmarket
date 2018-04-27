<style media="screen">
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
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">การจัดการโอนเงิน</h1>
          <div class="row">
            <h4>เรียงตาม  <select onchange="location = this.value;">
              <option></option>
              <option value="reportproductsearch.php?search=ไม่ได้รับสินค้า">ไม่ได้รับสินค้า</option>
              <option value="reportproductsearch.php?search=รอจัดส่ง">รอจัดส่ง</option>
              <option value="reportproductsearch.php?search=ส่งสินค้าแล้ว">ส่งสินค้าแล้ว</option>
              <option value="reportproduct.php">ทั้งหมด</option>
            </select></h4>
            <table class="table">
                <thead>
                  <tr>
                    <th>ใบสั่งสินค้าเลขที่</th>
                    <th>วันที่ออกใบสั่งสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ผู้สั่ง</th>
                    <th>สถานะการสินค้า</th>
                  </tr>
                </thead>
                <?php $sql = "SELECT * FROM cp_orderdetail INNER JOIN cp_product ON cp_orderdetail.pd_id = cp_product.pd_id INNER JOIN cp_user ON cp_product.user_id = cp_user.user_id WHERE cp_orderdetail.oddt_status = '".$_GET["search"]."'";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['oddt_id']; ?></td>
                    <td><?php echo $result['oddt_datetime']; ?></td>
                    <td id="divoverflow"><a href="productsee.php?pdid=<?php echo $result['pd_id']; ?>"><?php echo $result['pd_name']; ?></a></td>
                    <td><a href="usersee.php?userid=<?php echo $result['user_id']; ?>"><?php echo $result['user_fullname']; ?> <?php echo $result['user_lastname']; ?></a></td>
                    <?php if($result['oddt_status'] == 'ส่งสินค้าแล้ว') { ?>
                    <td><a href="pic\ems\<?php echo $result['oddt_image']; ?>"><?php echo $result['oddt_status']; ?></a></td>
                    <?php } else { ?>
                      <td><?php echo $result['oddt_status']; ?></td>
                      <?php } ?>
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
