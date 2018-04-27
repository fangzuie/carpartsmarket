<?php include "include/header.php" ?>
  <body>
<?php include "include/navbaradmin.php" ?>
    <div class="container">
      <div class="row">
        <div>
          <h1 class="page-header">จำนวนเงินที่ต้องการเติมเงิน</h1>
          <div class="row">
            <form class="form-horizontal" name="form2" method="post" action="confirmrequestmoney.php">
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">จำนวนเงินที่ต้องการเติม</label>
                <div class="col-sm-2">
                  <input type="number" min="1" name="txtMoney" class="form-control" placeholder="จำนวนเงินที่ต้องการเติม" style="width: 185px; value="1" size="2"" required>
                  <input type="hidden" name="reportid" value="<?php echo $_GET['reportid'];?>">
                  <input type="hidden" name="userid" value="<?php echo $_GET['userid'];?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                  <button type="submit" class="btn btn-primary" value="Save">Submit</button>
                </div>
              </div>
      </div>
        </div>
      </div>
      <?php include "include/footer.php" ?>
    </div>
    </div>
  </body>
</html>
