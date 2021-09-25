<?php
  include_once '../connection/Config.php';
  session_start();


  // Update Info and Create Account
  if( isset( $_POST['agreePolicy'] ) ){
    if(isset($_POST['role']) && ($_POST['role'] == 'Cashier' || $_POST['role'] == 'Registrar' ) ){
      $userId = $_POST['userId']; 
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
      $yearNow = date("Y");
      $today = date("F j, Y, g:i a"); 
      $slqRegNo = "SELECT * FROM `tbl_employee_info` ORDER BY reg_no DESC LIMIT 1 ";
      $stmtRegNo = $con->prepare($slqRegNo);
      $stmtRegNo->execute();
      $resRegNo = $stmtRegNo->get_result();
      $rowRegNo = $resRegNo->fetch_assoc();
      $lastRegNo = $rowRegNo['reg_no'];
      if ($rowRegNo['reg_no'] == "") {
        $newRegNo = $yearNow."1";
      }else {
        $newRegNo = substr($lastRegNo, 3);
        $newRegNo = intval($newRegNo);
        $newRegNo = $yearNow.($newRegNo + 1); 
      }
      $sqlEmpReg = "UPDATE `tbl_employee_info` SET `reg_no` = ? ,`firstname`= ? ,`lastname`= ? ,`middlename`= ? ,`citizenship`= ? ,`civil_status`= ? ,`sex`= ? ,`birthdate`= ? ,`age`= ? ,`email`= ? ,`contact_number`= ?, reg_date = ?  WHERE employee_id = ? ";
      $stmtEmpReg = $con->prepare($sqlEmpReg);
      $stmtEmpReg->bind_param('sssssssssssss', $newRegNo ,$firstname, $lastname, $midInitial, $citizenship, $civilStatus, $sex, $birthdate, $age, $email, $phoneNumber, $today, $userId);

      if ( $stmtEmpReg->execute() ){
        // Save Account
        $fullname = $firstname.' '.$lastname;
        $slqAcc = "INSERT INTO `tbl_accounts`(`user_id`, `fullname`, `email`, `password`, `role`) VALUES (?,?,?,?,?)";
        $stmtAcc = $con->prepare($slqAcc);
        $stmtAcc->bind_param('sssss', $userId, $fullname, $email, $password, $role);
        if ( $stmtAcc->execute() ) {
          $_SESSION['status'] = "success";
          $_SESSION['msg'] = "Registered Successfully";
          header('Location: ../html/formEmp_Registration.php');
        }else {
          $_SESSION['status'] = "error";
          $_SESSION['msg'] = "Registration Failed";
          header('Location: ../html/formEmp_Registration.php');
        }
      } else {
        $_SESSION['status'] = "error";
        $_SESSION['msg'] = "Registration Failed";
        header('Location: ../html/formEmp_Registration.php');
      }
    }else {
      $userId = $_POST['userId']; 
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

      $stud_status = $_POST['stud_status'];
      $csi_school_year = $_POST['currSchoolYr'];
      $csi_semester = $_POST['currSem'];
      $csi_scholarship = $_POST['currScholar'];
      $csi_course = $_POST['currCourse'];
      $csi_major = $_POST['currMajor'];
      $csi_year = $_POST['currYear'];

      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_pass = $_POST['confirm_pass'];

      if (empty($sex)){
        $sex = "N/A"; 
      }
      if(empty($stud_status)){
        $stud_status = "N/A";
      }
      $yearNow = date("Y");
      $today = date("F j, Y, g:i a"); 
      $slqRegNo = "SELECT * FROM `tbl_student_info` ORDER BY reg_no DESC LIMIT 1 ";
      $stmtRegNo = $con->prepare($slqRegNo);
      $stmtRegNo->execute();
      $resRegNo = $stmtRegNo->get_result();
      $rowRegNo = $resRegNo->fetch_assoc();
      $lastRegNo = $rowRegNo['reg_no'];
      if ($rowRegNo['reg_no'] == "") {
        $newRegNo = $yearNow."1";
      }else {
        $newRegNo = substr($lastRegNo, 3);
        $newRegNo = intval($newRegNo);
        $newRegNo = $yearNow.($newRegNo + 1); 
      }
      $sqlStudReg = "UPDATE `tbl_student_info` SET `reg_no` = ? ,`firstname`= ? ,`lastname`= ?,`middlename`= ?,`sex`= ?,`birthdate`= ? ,`age`= ?,`citizenship`= ? ,`civil_status`= ?,`contact_number`= ?, `email`= ?, `reg_date` = ?  WHERE stud_id = ?";
      $stmtStduReg = $con->prepare($sqlStudReg);
      $stmtStduReg->bind_param('sssssssssssss', $newRegNo, $firstname, $lastname, $midInitial, $sex, $birthdate, $age, $citizenship, $civilStatus, $phoneNumber, $email, $today,$userId);
      if($stmtStduReg->execute()){
        // Saving School Details
        $slqDetails = "INSERT INTO `tbl_student_school_details`(`stud_id`, `stud_status`, `csi_school_year`, `csi_semester`, `csi_scholarship`, `csi_course`, `csi_major`, `csi_year`) VALUES (?,?,?,?,?,?,?,?)";
        $stmtDetails = $con->prepare($slqDetails);
        $stmtDetails->bind_param('ssssssss', $userId, $stud_status, $csi_school_year, $csi_semester, $csi_scholarship, $csi_course, $csi_major, $csi_year);
        $stmtDetails->execute();
        // Creating Account to the databse
        $fullname = $firstname.' '.$lastname;
        $slqAcc = "INSERT INTO `tbl_accounts`(`user_id`, `fullname`, `email`, `password`, `role`) VALUES (?,?,?,?,?)";
        $stmtAcc = $con->prepare($slqAcc);
        $stmtAcc->bind_param('sssss', $userId, $fullname, $email, $password, $role);
        if ( $stmtAcc->execute() ) {
          $_SESSION['status'] = "success";
          $_SESSION['msg'] = "Registered Successfully";
          header('Location: ../html/formStud_Registration.php');
        }else {
          $_SESSION['status'] = "error";
          $_SESSION['msg'] = "Registration Failed 1";
          header('Location: ../html/formStud_Registration.php');
        }
        
      }else {
        $_SESSION['status'] = "error";
        $_SESSION['msg'] = "Registration Failed 2";
        header('Location: ../html/formStud_Registration.php');
      }
    }
  }

?>