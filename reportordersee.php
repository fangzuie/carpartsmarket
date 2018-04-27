<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">รายการสั่งซื้อสินค้า</h1>
          <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th>ลำดับรายการสั่งสินค้า</th>
                    <th>ผู้สั่ง</th>
                    <th>สถานะการส่ง</th>
                  </tr>
                </thead>
                <?php $sql = "SELECT * FROM cp_orderdetail INNER JOIN cp_product ON cp_product.pd_id = cp_orderdetail.pd_id WHERE order_id = '".$_GET["orderid"]."' ";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['oddt_id']; ?></td>
                    <td><?php echo $result['pd_name']; ?></td>
                    <td><?php echo $result['oddt_status']; ?></td>
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
