<?php
  include_once '../connection/Config.php';
  session_start();
  if(isset($_POST['checkID'])){
  $userId = $_POST['userId'];
   // Check id's if already have an account
   $sqlAcc = "SELECT * FROM `tbl_accounts` WHERE user_id = ?";
    $stmtAcc = $con->prepare($sqlAcc);
    $stmtAcc->bind_param('s', $userId);
    $stmtAcc->execute();
    $resultAcc = $stmtAcc->get_result();
    $rowAcc= $resultAcc->fetch_assoc();
    if( $resultAcc->num_rows > 0 ) {
      $_SESSION['status'] = "info";
      $_SESSION['msg'] = "This ID is already registered";
      header('Location: ../html/idValidation.php');
    } else {
     // Check id's in employee info
     $sqlCheckId = "SELECT * FROM `tbl_employee_info` WHERE employee_id = ?";
      $smtCheckId = $con->prepare( $sqlCheckId );
      $smtCheckId->bind_param('s', $userId);
      $smtCheckId->execute();
      $resCheckId = $smtCheckId->get_result();
      $rowCheckId = $resCheckId->fetch_assoc();

      if( $resCheckId->num_rows > 0 ) {
        $_SESSION['userId'] = $rowCheckId['employee_id'];
        $_SESSION['fname'] = $rowCheckId['firstname'];
        $_SESSION['lname'] = $rowCheckId['lastname'];
        $_SESSION['midname'] = $rowCheckId['middlename'];
        $_SESSION['role'] = $rowCheckId['role'];
        header('Location: ../html/formEmp_Registration.php');
      } else {
        // Check Student ID
        $sql_checkStudID = "SELECT * FROM `tbl_student_info` WHERE stud_id = ?";
        $stmt_checkStudID = $con->prepare($sql_checkStudID);
        $stmt_checkStudID->bind_param('s', $userId);
        $stmt_checkStudID->execute();
        $result_checkStudID = $stmt_checkStudID->get_result();
        $row_checkStudID = $result_checkStudID->fetch_assoc();
      
      if( $result_checkStudID->num_rows > 0 ) {
        $_SESSION['userId'] = $row_checkStudID['stud_id'];
        $_SESSION['fname'] = $row_checkStudID['firstname'];
        $_SESSION['lname'] = $row_checkStudID['lastname'];
        $_SESSION['midname'] = $row_checkStudID['middlename'];
        $_SESSION['role'] = "Student";
        header('Location: ../html/formStud_Registration.php');
      }else {
        $_SESSION['status'] = "error";
        $_SESSION['msg'] = "ID Not Found";
        header('Location: ../html/idValidation.php');
      }
      }
    }
  }
?>