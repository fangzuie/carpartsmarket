<style media="screen">
  .jumbotron{
  background-image: url(pic/carparts.jpg);
  background-position: 0% 25%;
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-blend-mode: overlay;
}
  #divoverflow{
    white-space: nowrap;
    width: 12em;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
<?php include "include/header.php" ?>
  <body>
<?php include "include/navbar.php" ?>
<?php
$perpage = 6;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}

$start = ($page - 1) * $perpage;

$sql = "SELECT * FROM cp_product INNER JOIN cp_user ON cp_product.user_id=cp_user.user_id order by pd_id desc limit {$start} , {$perpage} ";
$query = mysqli_query($con, $sql);
 ?>
<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>ตลาดอะไหล่รถยนต์</h1>
  <p>เชิญเลือกชมสินค้าและกดที่ชื่อสินค้าเพื่อดูรายละเอียดเพิ่มเติม</p>
</div>
<div class="page-header">
  <form class="navbar-form navbar-right" method="get" action="search.php" enctype="multipart/form-data">
    <input type="text" name="txtSearch" class="form-control" placeholder="ค้นหาสินค้า" required>
    <input type="hidden" name="orderby" value="pd_id desc">
  </form>
  <h1>สินค้ามาใหม่</h1>
</div>
<div class="row">
<?php while ($result = mysqli_fetch_assoc($query)) { ?>
  <?php if($result['user_status2'] != 0 && $result['pd_status'] != 0) { ?>
  <div class="col-sm-6 col-md-4">
    <div  class="thumbnail">
      <img style="width: 200px; height: 200px" src="pic/product/<?php echo $result['pd_image1'];?>">
      <div class="caption">
        <h3 id="divoverflow"><a href="productsee.php?pdid=<?php echo $result['pd_id'];?>"><?php echo $result['pd_name'];?></a></h3>
        <h3>ราคา : <?php echo number_format($result['pd_price']);?> บาท</h3>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php } ?>
</div>
<?php
$sql2 = "select * from cp_product ";
$query2 = mysqli_query($con, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>
<ul class="pagination">
<li>
<a href="index.php?page=1" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<?php for($i=1;$i<=$total_page;$i++){ ?>
<li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php } ?>
<li>
<a href="index.php?page=<?php echo $total_page;?>" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
