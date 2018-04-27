
<!DOCTYPE html>
<html lang="en">
<?php include "include/header.php" ?>
  <body>
    <div class="container">
      <div class="col-md-3"></div>
      <form class="form-signin col-md-5" name="form1" method="post" action="checkloginadmin.php">
        <h2 class="form-signin-heading" align="center">Carparts Market Administration</h2>
        <input name="txtUsername" type="text" id="inputEmail" class="form-control" placeholder="ยูสเซอร์เนม" required autofocus>
        <input name="txtPassword" type="password" id="inputPassword" class="form-control" placeholder="พาสเวิร์ด" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
  </body>
</html>
