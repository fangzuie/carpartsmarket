<style media="screen">
  .jumbotron{
  background-image: url(pic/product.jpg);
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
<?php include "include/connect.php" ?>
<?php
$perpage = 6;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}

$start = ($page - 1) * $perpage;
$pdtid = $_GET['pdtid'];
$orderby = $_GET['orderby'];
$pdtname = $_GET['pdtname'];

$sql = "select * from cp_product INNER JOIN cp_user ON cp_product.user_id=cp_user.user_id where pdt_id = $pdtid order by $orderby limit {$start} , {$perpage} ";
$query = mysqli_query($con, $sql);
 ?>
<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>ประเภทสินค้าที่เลือก</h1>
  <p>เชิญเลือกชมและกดเลือกสินค้าเพื่อเข้าไปดูรายละเอียดต่อไป</p>
</div>
<div class="page-header">
  <h1><?php echo $pdtname;?>
    <form class="navbar-form navbar-right" method="get" action="productselect2.php" enctype="multipart/form-data">
      <input type="text" name="txtSearch" class="form-control" placeholder="ค้นหาสินค้า" required>
      <input type="hidden" name="pdtname" value="<?php echo $_GET["pdtname"];?>">
      <input type="hidden" name="pdtid" value="<?php echo $_GET["pdtid"];?>">
      <input type="hidden" name="orderby" value="pd_id desc">
    </form>
  </h1>
</div>
<div class="row">
<?php while ($result = mysqli_fetch_assoc($query)) { ?>
  <?php if($result['user_status2'] != 0 && $result['pd_status'] != 0) { ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
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
$sql2 = "select * from cp_product INNER JOIN cp_user ON cp_product.user_id=cp_user.user_id where pdt_id = $pdtid";
$query2 = mysqli_query($con, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);
?>
<ul class="pagination">
<li>
<a href="productselect.php?page=1&orderby=<?php echo $orderby;?>&pdtid=<?php echo $pdtid; ?>&pdtname=<?php echo $pdtname; ?>" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<?php for($i=1;$i<=$total_page;$i++){ ?>
<li><a href="productselect.php?page=<?php echo $i; ?>&orderby=<?php echo $orderby; ?>&pdtid=<?php echo $pdtid; ?>&pdtname=<?php echo $pdtname; ?>"><?php echo $i; ?></a></li>
<?php } ?>
<li>
<a href="productselect.php?page=<?php echo $total_page;?>&orderby=<?php echo $orderby; ?>&pdtid=<?php echo $pdtid; ?>&pdtname=<?php echo $pdtname; ?>" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul>
<h4>เรียงตาม  <select onchange="location = this.value;">
  <option></option>
  <option value="productselect.php?pdtid=<?php echo $_GET["pdtid"];?>&pdtname=<?php echo $_GET["pdtname"];?>&orderby=pd_respect desc">ขายดี</option>
  <option value="productselect.php?pdtid=<?php echo $_GET["pdtid"];?>&pdtname=<?php echo $_GET["pdtname"];?>&orderby=pd_price asc">ราคาต่ำ > สูง</option>
  <option value="productselect.php?pdtid=<?php echo $_GET["pdtid"];?>&pdtname=<?php echo $_GET["pdtname"];?>&orderby=pd_price desc">ราคาสูง > ต่ำ</option>
</select></h4>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
