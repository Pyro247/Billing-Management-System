<?php
  include_once '../connection/Config.php';
  include '../includes/audit_logs.php';
  
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

      $sqlLogin = "SELECT * FROM `tbl_accounts` WHERE email = ?";
      $stmtLogin = $con->prepare($sqlLogin);
      $stmtLogin->bind_param('s', $email);
      $stmtLogin->execute();
      $resLogin = $stmtLogin->get_result();
      $rowLogin = $resLogin->fetch_assoc();

      if(password_verify($password,$rowLogin['password'])){
        if($rowLogin['role'] == 'Registrar' ){
          if($rowLogin['status'] == 'Inactive' ){
            $_SESSION['status'] = "info";
            $_SESSION['msg'] = "Account is inactive";
            header('Location: ../html/login.php');
          }else{
            audit($rowLogin['user_id'],$rowLogin['role'],$rowLogin['fullname'],'Login');
            header('Location: ../html/registrar_access.php');
            $_SESSION['fullname'] = $rowLogin['fullname'];
            $_SESSION['employeeId'] = $rowLogin['user_id'];
            $_SESSION['role'] = $rowLogin['role'];
          }

        }else if ( $rowLogin['role'] == 'Cashier') {
          if($rowLogin['status'] == 'Inactive' ){
            $_SESSION['status'] = "info";
            $_SESSION['msg'] = "Account is inactive";
            header('Location: ../html/login.php');
          }else{
            audit($rowLogin['user_id'],$rowLogin['role'],$rowLogin['fullname'],'Login');
            header('Location: ../html/cashier_access.php');
            $_SESSION['fullname'] = $rowLogin['fullname'];
            $_SESSION['employeeId'] = $rowLogin['user_id'];
            $_SESSION['role'] = $rowLogin['role'];
          }
        }else if ( $rowLogin['role'] == 'Admin' ){
          if($rowLogin['status'] == 'Inactive' ){
            $_SESSION['status'] = "info";
            $_SESSION['msg'] = "Account is inactive";
            header('Location: ../html/login.php');
          }else{
            audit($rowLogin['user_id'],$rowLogin['role'],$rowLogin['role'],'Login');
            header('Location: ../html/registrar_access.php');
            $_SESSION['fullname'] = $rowLogin['fullname'];
            $_SESSION['employeeId'] = $rowLogin['user_id'];
            $_SESSION['role'] = $rowLogin['role'];
          
          }
          

        }else if( $rowLogin['role'] == 'Student' ){
          if($rowLogin['status'] == 'Inactive' ){
            $_SESSION['status'] = "info";
            $_SESSION['msg'] = "Account is inactive";
            header('Location: ../html/login.php');
          }else{
            audit($rowLogin['user_id'],$rowLogin['role'],$rowLogin['fullname'],'Login');
            $_SESSION['fullname'] = $rowLogin['fullname'];
            $_SESSION['stud_id'] = $rowLogin['user_id'];
            $_SESSION['email'] = $rowLogin['email'];

            $_SESSION['role'] = 'Student';
            header('Location: ../html/student_access.php');
          }
        }
      
      }else{
        $_SESSION['status'] = "info";
        $_SESSION['msg'] = "Incorrect Credentials";
        header('Location: ../html/login.php');
      }

    }else{
      $_SESSION['status'] = "info";
      $_SESSION['msg'] = "Not Registered";
      header('Location: ../html/login.php');
    }
  }
?>
