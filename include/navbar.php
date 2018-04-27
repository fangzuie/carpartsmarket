<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand">ตลาดอะไหล่รถยนต์</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="index.php">หน้าแรก</a></li>
        <li><a href="product.php">ประเภทสินค้า</a></li>
        <?php if(isset($_SESSION['user_id'])){ ?>
        <li><a href="basket.php">ตะกร้าสินค้า</a></li>
        <?php } ?>
      </ul>
      <?php if(!isset($_SESSION['user_id'])){ ?>
      <form class="navbar-form navbar-right" name="form1" method="post" action="checklogin.php">
        <div id="navbar" class="navbar-collapse collapse">
        <div class="form-group">
          <input name="txtUsername" id="txtUsername" type="text" placeholder="ยูสเซอร์เนม" class="form-control" required>
        </div>
        <div class="form-group">
          <input name="txtPassword" id="txtPassword" type="password" placeholder="พาสเวิร์ด" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success" value="Login">เข้าสู่ระบบ</button>
      </form>
      <a href="register.php" class="btn btn-primary" role="button">สมัครสมาชิก</a>
    </div>
    <?php } ?>
  <?php if(isset($_SESSION['user_id'])){ ?>
      <div id="navbar" class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["name"];?> <?php echo $_SESSION["lastname"];?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">โปรไฟล์</a></li>
                <li><a href="productadd.php">เพิ่มสินค้า</a></li>
                <li><a href="vieworder.php">รายการสั่งซื้อสินค้า</a></li>
                <li><a href="viewordersell.php?orderby=oddt_id desc">รายการสินค้าที่ลูกค้าสั่ง</a></li>
                <li><a href="viewtopupmoney.php">ประวัติการเติมเงิน</a></li>
                <li><a href="viewrequestmoney.php">ประวัติการถอนเงิน</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header"></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
    <?php } ?>
  </div>
</nav>
