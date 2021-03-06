<style media="screen">
  .jumbotron{
  background-image: url(pic/profile.jpg);
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
<?php include "include/connect.php" ?>
  <?php
$perpage = 6;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 1;
}

$start = ($page - 1) * $perpage;
$userid = $_GET['userid'];
$sql = "select * from cp_product where user_id = '$userid' order by pd_id desc limit {$start} , {$perpage} ";
$query = mysqli_query($con, $sql);

$sql2 = "select * from cp_user where user_id = $userid ";
$query2 = mysqli_query($con, $sql2);
$result2 = ($result2 = mysqli_fetch_assoc($query2));
  ?>
<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>โปรไฟล์</h1>
  <p>เชิญรับชมสินค้าที่ผู้ขายประกาศขายทั้งหมด</p>
</div>
    <div class="col-xs-4 col-sm-3">
    <img src="pic/profile/<?php echo $result2['user_image'];?>" onerror="this.src='pic/noprofile.png'" class="img-circle" width="250" height="250"></div>

    <h1>ชื่อ : <?php echo $result2['user_fullname'];?> <?php echo $result2['user_lastname'];?></h1>
    <div class="col-xs-4 col-sm-1"><img src="pic/facebook.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>เฟสบุ๊ค : <?php echo $result2['user_facebook'];?></h3><br>
    <div class="col-xs-4 col-sm-1"><img src="pic/line.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>ไลน์ไอดี : <?php echo $result2['user_line'];?></h3><br>
    <div class="col-xs-4 col-sm-1"><img src="pic/tel.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>เบอร์โทรศัพท์ : <?php echo $result2['user_telephone'];?></h3><br>
    <div class="col-xs-4 col-sm-1"><img src="pic/address.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>ที่อยู่ : <?php echo $result2['user_address'];?></h3><br>
    <div class="col-xs-4 col-sm-1"><img src="pic/email.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>อีเมลล์ : <?php echo $result2['user_email'];?></h3><br>
    <div class="col-xs-4 col-sm-1"><img src="pic/money.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>เลขที่บัญชี : <?php echo $result2['user_money'];?></h3><br>
    <div class="col-xs-4 col-sm-1"><img src="pic/like.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>จำนวนสินค้าที่ขายได้ : <?php echo $result2['user_respect'];?></h3><br>
    <div class="page-header">
      <h1>สินค้าที่ประกาศขาย</h1>
    </div>
    <div class="row">
    <?php while ($result = mysqli_fetch_assoc($query)) { ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img style="width: 200px; height: 200px" src="pic/product/<?php echo $result['pd_image1']; ?>">
          <div class="caption">
            <h3 id="divoverflow"><a href="productsee.php?pdid=<?php echo $result['pd_id'];?>"><?php echo $result['pd_name']; ?></a></h3>
            <h3>ราคา : <?php echo number_format($result['pd_price']); ?> บาท</h3>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php
    $sql3 = "select * from cp_product where user_id = '$userid'";
    $query3 = mysqli_query($con, $sql3);
    $total_record = mysqli_num_rows($query3);
    $total_page = ceil($total_record / $perpage);
    ?>
    <ul class="pagination">
    <li>
    <a href="usersee.php?page=1&userid=<?php echo $userid; ?>" aria-label="Previous">
    <span aria-hidden="true">&laquo;</span>
    </a>
    </li>
    <?php for($i=1;$i<=$total_page;$i++){ ?>
    <li><a href="usersee.php?page=<?php echo $i; ?>&userid=<?php echo $userid; ?>"><?php echo $i; ?></a></li>
    <?php } ?>
    <li>
    <a href="usersee.php?page=<?php echo $total_page;?>&userid=<?php echo $userid; ?>" aria-label="Next">
    <span aria-hidden="true">&raquo;</span>
    </a>
    </li>
    </ul>
</div>
  </body>
</html>
