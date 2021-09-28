<?php
  include_once '../connection/Config.php';
  session_start();
  // Check email is excist in the databse -Done
  // Yes => check email and password -Done
    // Yes => Logined
    // Set Sessions name, Role, and ID(Employee View)
    // No => Increect Password -Done
  // Yes Accoount is not excisting -Done
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlCheckEmail = "SELECT * FROM `tbl_accounts` WHERE email = ?";
    $stmtCheckEmail = $con->prepare($sqlCheckEmail);
    $stmtCheckEmail->bind_param('s', $email);
    $stmtCheckEmail->execute();
    $resCheckEmail = $stmtCheckEmail->get_result();
    if($resCheckEmail->num_rows > 0){

      $sqlLogin = "SELECT * FROM `tbl_accounts` WHERE email = ? AND password = ?";
      $stmtLogin = $con->prepare($sqlLogin);
      $stmtLogin->bind_param('ss', $email, $password);
      $stmtLogin->execute();
      $resLogin = $stmtLogin->get_result();
      $row_login = $resLogin->fetch_assoc();

      if($resLogin->num_rows > 0){
        $_SESSION['status'] = "success";
        $_SESSION['msg'] = "Login success";
        header('Location: ../html/login.php');
      }else{
        $_SESSION['status'] = "info";
        $_SESSION['msg'] = "Incorrect password";
        header('Location: ../html/login.php');
      }

    }else{
      $_SESSION['status'] = "info";
      $_SESSION['msg'] = "Not Registered";
      header('Location: ../html/login.php');
    }
  }
?>
