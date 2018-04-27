<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">การจัดการแอดมิน</h1>
          <div class="row">

            <?php
               $strAdminID = null;
               if(isset($_GET["adminid"]))
               {
            	   $strAdminID = $_GET["adminid"];
               }
              $sql = "SELECT * FROM cp_admin WHERE admin_id = '".$strAdminID."' ";
              $query = mysqli_query($con,$sql);
              $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
             ?>

            <form class="form-horizontal" name="form2" method="post" action="editadminsave.php?adminid=<?php echo $_GET["adminid"];?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">ชื่อ</label>
                <div class="col-sm-4">
                  <input type="text" name="txtName" class="form-control" id="txtName" placeholder="ชื่อจริง" value="<?php echo $result["admin_name"];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                  <input type="text" name="txtUsername" class="form-control" id="txtUsername" placeholder="ชื่อยูสเซอร์เนมเพื่อใช้ในการล็อกอินเข้าสู่ระบบ" value="<?php echo $result["admin_username"];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                  <input type="password" name="txtPassword" class="form-control" id="txtPassword" placeholder="พาสเวิร์ดเพื่อใช้ในการล็อกอินเข้าสู่ระบบ" value="<?php echo $result["admin_password"];?>" required>
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
