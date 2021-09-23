<?php
  include_once '../connection/Config.php';
  session_start();


  // Update Info and Create Account
  if( isset( $_POST['agreePolicy'] ) ){
    // Employee Condition
    if(isset($_POST['role']) && ($_POST['role'] == 'Cashier' || $_POST['role'] == 'Registrar' ) ){
      $userID = $_POST['userId']; 
      $role = $_POST['role'];
      $firstname = $_POST['fname']; 
      $midInitial = $_POST['middlename'];
      $lastname = $_POST['lastname'];
      $citizenship = $_POST['citizen'];
      $civilStatus = $_POST['civil'];
      $phoneNumber = $_POST['phone'];
      $sex = $_POST['sex'];
      $birthdate = $_POST['birthdate'];
      $age = $_POST['age'];
    
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_pass = $_POST['confirm_pass'];

      if (empty($sex)){
        $sex = "N/A"; 
      }
      // Generate the reg_no

      $sqlEmpReg = "UPDATE `tbl_employee_info` SET `firstname`= ? ,`lastname`= ? ,`middlename`= ? ,`citizenship`= ? ,`civil_status`= ? ,`sex`= ? ,`birthdate`= ? ,`age`= ? ,`email`= ? ,`contact_number`= ?  WHERE employee_id = ? ";
      $stmtEmpReg = $con->prepare($sqlEmpReg);
      $stmtEmpReg->bind_param('sssssssssss',  $firstname, $lastname, $midInitial, $citizenship, $civilStatus, $sex, $birthdate, $age, $email, $phoneNumber, $userID);

      if ( $stmtEmpReg->execute() ){
        // Save Account
        $_SESSION['status'] = "success";
        $_SESSION['msg'] = "Registered Successfully";
        header('Location: ../html/formEmp_Registration.php');
      } else {
        $_SESSION['status'] = "error";
        $_SESSION['msg'] = "Registration Failed";
        header('Location: ../html/formEmp_Registration.php');
      }

    }
    // if condition student update info,school details, account, requirements
  }

?>