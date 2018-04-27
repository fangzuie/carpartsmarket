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
          <h1 class="page-header">การจัดการสินค้า</h1>
          <div class="row">
            <h4>เรียงตาม  <select onchange="location = this.value;">
              <option></option>
              <option value="manageproductsearch.php?search=1">Acessory</option>
              <option value="manageproductsearch.php?search=2">Mag & Tire</option>
              <option value="manageproductsearch.php?search=3">Oil & Coolant</option>
              <option value="manageproductsearch.php?search=4">Battery</option>
              <option value="manageproductsearch.php?search=5">Shock Absorber</option>
              <option value="manageproductsearch.php?search=6">Light</option>
              <option value="manageproduct.php">ทั้งหมด</option>
            </select></h4>
            <form class="" action="manageproductsearch2.php?" method="post">
            <div class="form-group col-md-2">
              <input name="txtID" id="txtUsername" type="text" placeholder="ค้นหาด้วย ID Product" class="form-control">
            </div>
            <button type="submit" class="btn btn-success" value="Login">ค้นหา</button>
            </form>
            <table class="table">
                <thead>
                  <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>วันที่เพิ่มสินค้า</th>
                    <th></th>
                  </tr>
                </thead>
                <?php $sql = "select * from cp_product";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query  )) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['pd_id']; ?></td>
                    <td id="divoverflow"><a href="productsee.php?pdid=<?php echo $result['pd_id']; ?>"><?php echo $result['pd_name']; ?></a></td>
                    <td><?php echo $result['pd_timestamp']; ?></td>
                      <?php  ?><td><a onclick="return confirm('คุณมั่นใจว่าต้องการลบสินค้านี้ใช่หรือไม่');" class="btn btn-danger" href="productdelete.php?pdid=<?php echo $result['pd_id'];?>&pdimage=<?php echo $result['pd_image1'];?>">ลบสินค้านี้</a></td> <php ?>
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
