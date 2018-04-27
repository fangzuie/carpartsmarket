<?php
$intRejectTime =  15;
  $sql = "UPDATE cp_user SET user_status = '0' WHERE 1 AND DATE_ADD(user_lastupdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
  $query = mysqli_query($con,$sql);


 ?>
