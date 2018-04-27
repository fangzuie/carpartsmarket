<style media="screen">
  .jumbotron{
  background-image: url(pic/product.jpg);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-blend-mode: overlay;
}
</style>
<?php include "include/header.php" ?>
  <body>
<?php include "include/navbar.php" ?>
<?php include "include/connect.php" ?>
<?php
$perpage = 6;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}

$start = ($page - 1) * $perpage;

$sql = "select * from cp_producttype order by pdt_id desc limit {$start} , {$perpage} ";
$query = mysqli_query($con, $sql);
 ?>
<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>ประเภทสินค้า</h1>
  <p>โปรดเลือกประเภทสินค้าที่ต้องการค้นหา หรือค้นหาสินค้าได้ตามต้องการ</p>
</div>
    <div class="row">
        <?php while ($result = mysqli_fetch_assoc($query)) { ?>
        <div class="col-lg-4" align="center">
          <img class="img" src="pic/category/<?php echo $result['pdt_image'];?>" width="140" height="140">
          <h2><a href="productselect.php?pdtid=<?php echo $result['pdt_id'];?>&pdtname=<?php echo $result['pdt_name'];?>&orderby=pd_id desc"><?php echo $result['pdt_name'];?></a></h2>
        </div>
        <?php } ?>
        </div>
        <?php
        $sql2 = "select * from cp_producttype ";
        $query2 = mysqli_query($con, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <?php /* ?>
        <ul class="pagination">
        <li><a href="product.php?page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <?php for($i=1;$i<=$total_page;$i++){ ?>
        <li><a href="product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
        <li>
        <a href="product.php?page=<?php echo $total_page;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
        </ul>
        <php */ ?>
        <?php include "include/footer.php" ?>
  </div>
  </body>
</html>
