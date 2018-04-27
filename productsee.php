<style media="screen">
  .jumbotron{
  background-image: url(pic/carparts.jpg);
  background-position: 0% 25%;
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
  $userid = $_GET['pdid'];
  $sql = "select * from cp_product where pd_id = $userid ";
  $query = mysqli_query($con, $sql);
  $result = ($result = mysqli_fetch_assoc($query));
 ?>

<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>สินค้า</h1>
  <p>กดที่ชื่อของผู้ขายเพื่อดูรายละเอียดเพิ่มเติม<?php if(isset($_SESSION['user_id'])) echo "หรือกดเพิ่มสินค้าเพื่อสั่งซื้อต่อไป";?></p>
</div>
<div class="page-header">
  <h1>สินค้าที่เลือก</h1>
</div>
<div class="row">
    <div class="thumbnail">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/product/<?php echo $result['pd_image1'];?>">
    </div>
     <?php if($result['pd_image2'] != "")
    {?>
    <div align="center" class="item">
      <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image2'];?>">
    </div>
    <?php } ?>
    <?php if($result['pd_image3'] != "")
    {?>
    <div align="center" class="item">
      <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image3'];?>">
    </div>
    <?php } ?><?php if($result['pd_image4'] != "")
    {?>
    <div align="center" class="item">
      <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image4'];?>">
    </div>
    <?php } ?><?php if($result['pd_image5'] != "")
    {?>
    <div align="center" class="item">
      <img class="img-responsive center-block" style="width: 400px; height: 400px" src="pic/<?php echo $result['pd_image5'];?>">
    </div>
    <?php } ?>
  </div>
</div>
<?php
  $userid2 = $result['user_id'];
  $sql2 = "select * from cp_user where user_id = $userid2 ";
  $query2 = mysqli_query($con, $sql2);
  $result2 = ($result2 = mysqli_fetch_assoc($query2));
 ?>
      <div class="caption">
        <h3><?php echo $result['pd_name'];?></h3>
        <h4><?php echo $result['pd_detail'];?></h4>
        <h3>ราคา : <?php echo number_format($result['pd_price']);?> บาท<h3>
        <h4><span class="glyphicon glyphicon-user"></span> ชื่อ <a href="usersee.php?userid=<?php echo $result2['user_id'];?>"><?php echo $result2['user_fullname'];?> <?php echo $result2['user_lastname'];?></a></h4>
        <h4><img src="pic/facebook.png" style="width: 30px; height: 30px"></img> เฟสบุ๊ค : <?php echo $result2['user_facebook'];?></h4>
        <h4><img src="pic/line.png" style="width: 30px; height: 30px"></img> ไลน์ไอดี : <?php echo $result2['user_line'];?></h4>
        <h4><img src="pic/email.png" style="width: 30px; height: 30px"></img> อีเมลล์ : <?php echo $result2['user_email'];?></h4>
        <h4><img src="pic/tel.png" style="width: 30px; height: 30px"></img> เบอร์โทรศัพท์ : <?php echo $result2['user_telephone'];?></h4>
        <h4><img src="pic/address.png" style="width: 30px; height: 30px"></img>่ ที่อยู่ : <?php echo $result2['user_address'];?></h4>
        <h4><img src="pic/like.png" style="width: 30px; height: 30px"></img> ยอดสั่งซื้อสินค้า : <?php echo $result['pd_respect'];?></h4>
        <h4><img src="pic/product.png" style="width: 30px; height: 30px"></img> จำนวนสินค้าคงเหลือ : <?php echo $result['pd_quantity'];?></h4>
        <?php if(isset($_SESSION['user_id']) && ($_SESSION['user_id']) != $result2['user_id']) { ?>
          <?php if($result['pd_quantity'] != 0) { ?>
          <form action="order.php?pdquantity=<?php echo $result['pd_quantity'];?>" method="post">
          <input type="hidden" name="txtProductID" value="<?php echo $result['pd_id'];?>" size="2">
          <input type="number" min="1" max="<?php echo $result['pd_quantity'];?>" name="txtQty" class="form-control" id="txtName" placeholder="จำนวน" style="width: 83px; value="1" size="2"" required>
          <input type="submit" class="btn btn-primary" value="เพิ่มสินค้า"></input>
          <?php } ?>
          <a href="reportproducterror.php?pdid=<?php echo $result['pd_id'];?>" class="btn btn-primary">รายงานสินค้าไม่เหมาะสม</a>
          </form>
        <?php } ?>
        <div class="page-header">
          <h1>คอมเม้นท์สินค้า</h1>
        </div>
        <table class="table">
          <?php
          $pdid = $result['pd_id'];
      		 $sql2 = "SELECT * FROM cp_comment INNER JOIN cp_user ON cp_comment.user_id = cp_user.user_id WHERE cp_comment.pd_id = '$pdid' order by cp_comment.cm_id asc";
      		 $query2 = mysqli_query($con, $sql2); ?>
          <?php while ($result2 = mysqli_fetch_assoc($query2)) { ?>
          <tbody>
            <tr>
              <td><img src="pic\profile\<?php echo $result2["user_image"];?>" width="50" height="50"></img> <a href="usersee.php?userid=<?php echo $result2["user_id"];?>"><?php echo $result2['user_fullname']; ?> <?php echo $result2['user_lastname']; ?></a></td>
              <td><?php echo $result2['cm_date']; ?></td>
              <td><?php echo $result2['cm_detail']; ?></td>
            </tr>
          </tbody>
          <?php } ?>
  </table>
  <?php if(isset($_SESSION['user_id'])) { ?>
  <form class="" action="confirmrcomment.php" method="post">
      <tr><td><textarea name="txtDetail" rows="8" cols="80"></textarea></td></tr><br><br>
      <input type="hidden" name="pdid" value="<?php echo $pdid;?>">
      <input type="hidden" name="userid" value="<?php echo $_SESSION["user_id"];?>">
      <input type="submit" class="btn btn-primary" value="คอมเม้นท์"></input>
  </form>
  <?php } ?>
      </div>
    </div>
</div>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
