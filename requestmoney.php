<style media="screen">
  .jumbotron{
  background-image: url(pic/order.png);
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-blend-mode: overlay;
}
</style>
<?php include "include/header.php" ?>
  <body>
<?php include "include/navbar.php" ?>
<?php include "include/connect.php"?>
<?php  $userid = $_GET['userid'];
$sql2 = "select * from cp_user where user_id = $userid ";
$query2 = mysqli_query($con, $sql2);
$result2 = ($result2 = mysqli_fetch_assoc($query2));
?>
<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>ถอนเงิน</h1>
  <p>กรุณาใส่จำนวนเงินที่ต้องการถอน</p>
</div>
<div class="page-header">
  <h1>ถอนเงิน</h1>
</div>
<?php if($result2['user_bank'] != 0) { ?>
<form class="form-horizontal" name="form2" method="post" action="confirmreportmoney4.php">
  <div class="col-xs-4 col-sm-1"><img src="pic/bank.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></div><h3>จำนวนเงินคงเหลือ : <?php echo $result2['user_bank'];?> บาท</h3><br>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-1 control-label">จำนวนเงิน</label>
    <div class="col-sm-2">
      <input type="number" min="1" max="<?php echo $result2['user_bank'];?>" name="txtMoney" class="form-control" id="txtMoney" placeholder="จำนวนเงินที่ต้องการถอน" style="width: 185px; value="1" size="2"" required>
      <input type="hidden" name="userid" value="<?php echo $result2['user_id'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary" value="Save">Submit</button>
    </div>
  </div>
<?php } else { ?>
  <h3>คุณมีเงินไม่พอถอนเงิน</h3>
<?php } ?>
</form>
<?php include "include/footer.php" ?>
</div>
  </body>
</html>
