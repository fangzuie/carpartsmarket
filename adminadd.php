<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">การจัดการแอดมิน</h1>
          <div class="row">
            <form class="form-horizontal" name="form2" method="post" action="adminaddsave.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">ชื่อ</label>
                <div class="col-sm-4">
                  <input type="text" name="txtName" class="form-control" id="txtName" placeholder="ชื่อจริง" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                  <input type="text" name="txtUsername" class="form-control" id="txtUsername" placeholder="ชื่อยูสเซอร์เนมเพื่อใช้ในการล็อกอินเข้าสู่ระบบ" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                  <input type="password" name="txtPassword" class="form-control" id="txtPassword" placeholder="พาสเวิร์ดเพื่อใช้ในการล็อกอินเข้าสู่ระบบ" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-4">
                  <input type="password" name="txtConPassword" class="form-control" id="txtConPassword" placeholder="กรุณากรอกพาสเวิร์ดให้ตรงกันทั้งสองช่อง" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" value="Save">Submit</button>
                </div>
              </div>
            </form>
      </div>
        </div>
      </div>
      <?php include "include/footer.php" ?>
    </div>
    </div>
  </body>
</html>
