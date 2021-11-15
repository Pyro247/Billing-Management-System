<?php
  include '../includes/audit_logs.php';
  session_start();
  if($_SESSION['role'] == 'Student'){
    audit($_SESSION['stud_id'],$_SESSION['role'], $_SESSION['fullname'],'Logout');
  }else{
    audit($_SESSION['employeeId'],$_SESSION['role'], $_SESSION['fullname'],'Logout');
  }
  session_destroy();
  header('Location: ../html/login.php');
?>