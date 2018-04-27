<style media="screen">
  .jumbotron{
  background-image: url(pic/order.png);
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
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">การจัดการการส่งสินค้า</h1>
          <div class="row">
                <form class="" action="reportproductdetail2.php" method="post">
                <h4>เรียงตาม
                <input type="date" name="datestart" value="<?php echo $_POST['datestart']; ?>"> ถึง <input type="date" name="dateend" value="<?php echo $_POST['dateend']; ?>"> <button type="submit" class="btn btn-success" value="Login">ค้นหา</button> </h4>
                </form>
                <?php
                $datestart = $_POST['datestart'];
                $dateend = $_POST['dateend'];
                 ?>

                <?php $sql = "SELECT * FROM cp_orderdetail
                INNER JOIN cp_order
                ON cp_orderdetail.order_id = cp_order.order_id
                INNER JOIN cp_user
                ON cp_order.user_id = cp_user.user_id
                INNER JOIN cp_product
                ON cp_orderdetail.pd_id = cp_product.pd_id
                WHERE cp_orderdetail.oddt_datetime BETWEEN '$datestart 00:00:00' AND '$dateend 23:59:59' ORDER BY cp_orderdetail.pd_id ASC";
                $query = mysqli_query($con, $sql);
                $pdid = '';
                while ($result = mysqli_fetch_assoc($query)) {?>
            <table class="table">
              <?php if ($pdid != $result['pd_id']) { ?>
              <?php $pdid = $result['pd_id'];   ?>
                  <tr>
                    <th>รหัสสินค้า : <?php echo $result['pd_id']; ?></th>
                    <th>ชื่อสินค้า : <?php echo $result['pd_name']; ?></th>
                  </tr>
                  <?php } ?>
                  <tr>
                  <td>รหัสผู้ซื้อ : <?php echo $result['user_id']; ?></td>
                  <td>ชื่อผู้ซื้อ : <?php echo $result['user_fullname']; ?> <?php echo $result['user_lastname']; ?></td>
                  <?php $sumprice = $result['oddt_qty'] * $result['pd_price']; ?>
                <?php /* ?><td>1</td>
                <td>2</td>  <?php */ ?>
                <td>จำนวนรวมทั้งหมด <?php echo $result['oddt_qty'] ?></td>
                <td>ราคารวมทั้งหมด <?php echo $sumprice ?> บาท</td>
                </tr>
              </table>
            <?php } ?>
      </div>
        </div>
      </div>
      <?php include "include/footer.php" ?>
    </div>
    </div>
  </body>
</html>
