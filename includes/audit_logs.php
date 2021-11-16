<?php
 
  
 function audit($user_id,$role,$name,$activity){
  include '../connection/Config.php';
  $date = date("Y-m-d H:i:s");     
  $slqLog = "INSERT INTO `tbl_audit_logs`(`user_id`,`role`,`username`, `activity`,`date_time`) VALUES (?,?,?,?,?)";
  $stmtLog = $con->prepare($slqLog);
  $stmtLog->bind_param('sssss',$user_id,$role,$name,$activity,$date);
  $stmtLog->execute();
}

?>