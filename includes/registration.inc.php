<?php
  include_once '../connection/Config.php';
  session_start();

  // Check if email is already taken
  if(isset($_POST['checking_email'])){
    $email = $_POST['email'];
    $sql = "SELECT * FROM `tbl_accounts` WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();
    if($res->num_rows > 0){
      echo "Email is already taken";
    }else{

    }
  }
  // Update Info and Create Account
  if( isset( $_POST['agreePolicy'] ) ){
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'Student'  ){
      $userId = $_POST['userId']; 
      $role = $_POST['role'];
      $firstname = $_POST['fname']; 
      $midInitial = $_POST['middlename'];
      $lastname = $_POST['lastname'];
      $address = $_POST['address'];
      $phoneNumber = $_POST['contact'];
      $sex = $_POST['sex'];
  
      $stud_status = $_POST['stud_status'];
      $csi_school_year = $_POST['currSchoolYr'];
      $csi_semester = $_POST['currSem'];
      $csi_program = $_POST['currCourse'];
      $csi_major = $_POST['currMajor'];
      $csi_year = $_POST['currYear'];
      $LRN = $_POST['LRN'];

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
      $sqlStudReg = "UPDATE `tbl_student_info` SET `reg_no` = ? ,`firstname`= ? ,`lastname`= ?,`middlename`= ?,`sex`= ?,`contact_number`= ?,`address` = ?,email = ? , `joined_date` = ?  WHERE stud_id = ?";
      $stmtStduReg = $con->prepare($sqlStudReg);
      $stmtStduReg->bind_param('ssssssssss', $newRegNo, $firstname, $lastname, $midInitial, $sex, $phoneNumber, $address,$email,$today,$userId);
      if($stmtStduReg->execute()){
        // Saving School Details
        $slqDetails = "UPDATE `tbl_student_school_details` SET `LRN` = ?,`stud_type` = ?,`csi_academic_year`= ? ,`csi_semester` = ?,`csi_program` = ? ,`csi_major` = ?,`csi_year_level` = ? WHERE stud_id = ?"; 
        $stmtDetails = $con->prepare($slqDetails);
        $stmtDetails->bind_param('ssssssss',$LRN,$stud_status, $csi_school_year, $csi_semester, $csi_program, $csi_major, $csi_year,$userId);
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
    if(isset($_POST['role']) && ($_POST['role'] == 'Cashier' || $_POST['role'] == 'Registrar' ) ){
      $userId = $_POST['userId']; 
      $role = $_POST['role'];
      $firstname = $_POST['fname']; 
      $midInitial = $_POST['middlename'];
      $lastname = $_POST['lastname'];
      $address = $_POST['address'];
      $phoneNumber = $_POST['phone'];
      $sex = $_POST['sex'];
    
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
      $sqlEmpReg = "UPDATE `tbl_employee_info` SET `reg_no` = ? ,`firstname`= ? ,`lastname`= ? ,`middlename`= ?,`sex`= ?,`email`= ? ,`contact_number`= ?, `address`= ?,joined_date = ?  WHERE employee_id = ? ";
      $stmtEmpReg = $con->prepare($sqlEmpReg);
      $stmtEmpReg->bind_param('ssssssssss', $newRegNo ,$firstname, $lastname, $midInitial, $sex, $email, $phoneNumber,$address, $today, $userId);

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
          $_SESSION['msg'] = "Registration Failed ";
          header('Location: ../html/formEmp_Registration.php');
        }
      } else {
        $_SESSION['status'] = "error";
        $_SESSION['msg'] = "Registration Failed";
        header('Location: ../html/formEmp_Registration.php');
      }
    } 
    
  }

?>