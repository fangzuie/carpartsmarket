<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="indexadmin.php">การจัดการตลาดอะไหล่รถยนต์</a>
    </div>
    <ul class="nav navbar-nav">
        <?php /* <li><a href="manageadmin.php">การจัดการแอดมิน</a></li> */ ?>
        <li><a href="manageuser.php">การจัดการยูสเซอร์</a></li>
        <li><a href="manageproduct.php">การจัดการสินค้า</a></li>
        <li><a href="report.php">รายงาน</a></li>
      </ul>
    <div id="navbar" class="navbar-collapse collapse navbar-right">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["admin_name"];?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?php /* <li><a href="#">โปรไฟล์</a></li> */ ?>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header"></li>
              <li><a href="logoutadmin.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
</nav>
