<style media="screen">
  .jumbotron{
  background-image: url(pic/register.jpg);
  background-position: 0% 25%;
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-blend-mode: overlay;
}
</style>
<?php include "include/header.php" ?>
  <body>
<?php include "include/navbar.php" ?>
<div class="container">
<div class="jumbotron">
  <div class="col-lg-3">
  <img src="pic/logo.ico" class="img-rounded">
  </div>
  <h1>สมัครสมาชิก</h1>
  <p>กรุณากรอกข้อมูลให้ครบถ้วน</p>
</div>
<div class="page-header">
  <h1>สมัครสมาชิค</h1>
</div>
<form class="form-horizontal" name="form2" method="post" action="saveregister.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">ชื่อ</label>
    <div class="col-sm-4">
      <input type="text" name="txtName" class="form-control" id="txtName" placeholder="ชื่อจริง" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">นามสกุล</label>
    <div class="col-sm-4">
      <input type="text" name="txtLastname" class="form-control" id="txtLastname" placeholder="นามสกุลจริง" required>
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
    <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
      <input type="email" name="txtEmail" class="form-control" id="txtEmail" placeholder="อีเมลล์ที่สามารถติดต่อได้" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
    <div class="col-sm-4">
      <input type="text" name="txtFacebook" class="form-control" id="txtFacebook" placeholder="เฟสบุ๊กที่สามารถติดต่อได้" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Line</label>
    <div class="col-sm-4">
      <input type="text" name="txtLine" class="form-control" id="txtLine" placeholder="ไลน์ที่สามารถติดต่อได้" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
    <div class="col-sm-4">
      <input type="text" name="txtTelephone" class="form-control" id="txtTelephone" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">เลขที่บัญชี</label>
    <div class="col-sm-4">
      <input type="text" name="txtMoney" class="form-control" id="txtMoney" placeholder="ธนาคาร เลขที่บัญชีที่ต้องการใช้ในการซื้อขาย" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">ที่อยู่</label>
    <div class="col-sm-4">
      <textarea type="text" name="txtAddress" class="form-control" id="txtAddress" placeholder="ที่อยู่ปัจจุบันที่สามารถติดต่อได้" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">รูปภาพโปรไฟล์</label>
    <div class="col-sm-4">
  <input name="txtImage" type="file" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" value="Save">Submit</button>
    </div>
  </div>
</form>
</div>
</body>
