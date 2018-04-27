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
          <h1 class="page-header">รายงานแจ้งลบสินค้า</h1>
          <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th>รายงานสินค้าเลขที่</th>
                    <th>รายระเอียดการรายงาน</th>
                    <th>สินค้าที่รายงาน</th>
                    <th>ผู้รายงาน</th>
                  </tr>
                </thead>
                <?php $sql = "SELECT * FROM cp_reportdeleteproduct INNER JOIN cp_product ON cp_reportdeleteproduct.pd_id = cp_product.pd_id INNER JOIN cp_user ON cp_reportdeleteproduct.user_id = cp_user.user_id order by report_id desc";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['report_id']; ?></td>
                    <td><?php echo $result['report_detail']; ?></td>
                    <td id="divoverflow"><a href="productsee.php?pdid=<?php echo $result['pd_id']; ?>"><?php echo $result['pd_name']; ?></td>
                    <td><a href="usersee.php?userid=<?php echo $result['user_id']; ?>"><?php echo $result['user_fullname']; ?> <?php echo $result['user_lastname']; ?></td>
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
