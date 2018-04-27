<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">การจัดการยูสเซอร์</h1>
          <div class="row">
            <h4>เรียงตาม  <select onchange="location = this.value;">
              <option></option>
              <option value="manageusersearch.php?search=0">Block User</option>
              <option value="manageusersearch.php?search=1">Unblock User</option>
              <option value="manageuser.php">ทั้งหมด</option>
            </select></h4>
            <form class="" action="manageusersearch2.php?" method="post">
            <div class="form-group col-md-2">
              <input name="txtID" id="txtUsername" type="text" placeholder="ค้นหาด้วย ID User" class="form-control">
            </div>
            <button type="submit" class="btn btn-success" value="Login">ค้นหา</button>
            </form>
            <table class="table">
                <thead>
                  <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Username</th>
                  </tr>
                </thead>
                <?php $sql = "select * from cp_user";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['user_id']; ?></td>
                    <td><a href="usersee.php?userid=<?php echo $result['user_id']; ?>"><?php echo $result['user_fullname']; ?> <?php echo $result['user_lastname']; ?></a></td>
                    <td><?php echo $result['user_name']; ?></td>
                      <td><?php if($result['user_status2'] != '0') { ?><a class="btn btn-warning" href="blockuser.php?userid=<?php echo $result['user_id'];?>">Block User</a><?php } else { ?><a class="btn btn-success" href="unblockuser.php?userid=<?php echo $result['user_id'];?>">UnBlock User
                      </a> <?php } ?> <?php /* ?><a class="btn btn-danger" href="deleteuser.php?userid=<?php echo $result['user_id'];?>">ลบ User</a><?php */ ?></td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
      </div>
        </div>
      </div>
      <?php include "include/footer.php" ?>
    </div>
    </div>
  </body>
</html>
