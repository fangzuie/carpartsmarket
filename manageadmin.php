<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">การจัดการแอดมิน</h1>
          <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th>Admin ID</th>
                    <th>Admin Name</th>
                    <th>Admin Username</th>
                  </tr>
                </thead>
                <?php $sql = "select * from cp_admin";
                      $query = mysqli_query($con, $sql); ?>
            		<?php while ($result = mysqli_fetch_assoc($query  )) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $result['admin_id']; ?></td>
                    <td><?php echo $result['admin_name']; ?></td>
                    <td><?php echo $result['admin_username']; ?></td>
                    <?php  if($result['admin_id'] != '1'){ ?>
                    <td><a class="btn btn-primary" href="editadmin.php?adminid=<?php echo $result['admin_id']; ?>">แก้ไขข้อมูล</a> <a class="btn btn-danger" href="deleteadmin.php?adminid=<?php echo $result['admin_id'];?>">ลบ Admin</a></td>
                    <?php } ?>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
              <a class="btn btn-primary" href="adminadd.php">เพิ่ม Admin</a>
      </div>
        </div>
      </div>
      <?php include "include/footer.php" ?>
    </div>
    </div>
  </body>
</html>
