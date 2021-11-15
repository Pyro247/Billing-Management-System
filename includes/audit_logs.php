<?php
 
  
 function audit($user_id,$role,$name,$activity){
  include '../connection/Config.php';
  $slqLog = "INSERT INTO `tbl_audit_logs`(`user_id`,`role`,`username`, `activity`) VALUES (?,?,?,?)";
  $stmtLog = $con->prepare($slqLog);
  $stmtLog->bind_param('ssss',$user_id,$role,$name,$activity);
  $stmtLog->execute();
}

?>