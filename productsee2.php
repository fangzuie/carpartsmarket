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
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
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

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
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
        <h3>ราคา : <?php echo number_format($result['pd_price']);?><h3>
        <h4><span class="glyphicon glyphicon-user"></span> ชื่อผู้ขาย <a href="usersee.php?userid=<?php echo $result2['user_id'];?>"><?php echo $result2['user_fullname'];?> <?php echo $result2['user_lastname'];?></a></h4>
        <h4><img src="pic/facebook.png" style="width: 30px; height: 30px"></img> <?php echo $result2['user_facebook'];?></h4>
        <h4><img src="pic/line.png" style="width: 30px; height: 30px"></img> <?php echo $result2['user_line'];?></h4>
        <h4><img src="pic/tel.png" style="width: 30px; height: 30px"></img> <?php echo $result2['user_telephone'];?></h4>
        <h4><img src="pic/address.png" style="width: 30px; height: 30px"></img>่ <?php echo $result2['user_address'];?></h4>
        <h4><img src="pic/product.png" style="width: 30px; height: 30px"></img>่ <?php echo $result['pd_quantity'];?></h4>
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
      </div>
    </div>
</div>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
