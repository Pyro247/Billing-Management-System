<?php
  include_once '../connection/Config.php';
  $response =array();
if(isset($_POST['archive_btn'])){
    $condition = $_POST['condition'];
    $date = date("Y-m-d");
    $user_id = $_POST['user_id'];

    $selectInfo = "SELECT * FROM `tbl_student_info` WHERE stud_id = ?";
    $stmtInfo = $con->prepare($selectInfo);
    $stmtInfo->bind_param('s', $user_id);
    $stmtInfo->execute();
    $resInfo = $stmtInfo->get_result();
    $rowInfo = $resInfo->fetch_assoc();
    $regNo = $rowInfo['reg_no'];
    $stud_id = $rowInfo['stud_id'];
    $firstname = $rowInfo['firstname'];
    $lastname = $rowInfo['lastname'];
    $middlename = $rowInfo['middlename'];
    $sex = $rowInfo['sex'];
    $address = $rowInfo['address'];
    $email = $rowInfo['email'];
    $contact_number = $rowInfo['contact_number'];


    $sqlArchive = "INSERT INTO `tbl_archive`(`reg_no`, `user_id`, `firstname`, `lastname`, `middlename`, `role`, `email`, `sex`, `address`, `contact_number`, `condition`, `date`) 
    VALUES ('$regNo','$stud_id','$firstname','$lastname','$middlename','Student','$email','$sex','$address','$contact_number','$condition','$date')";
    $stmtArchive = $con->prepare($sqlArchive);
    if($stmtArchive->execute()){

      $sqlDel = "DELETE s.*, r.* ,fee.*,d.*
                  FROM tbl_student_info AS s 
                  LEFT JOIN tbl_student_requirements AS r ON s.stud_id = r.stud_id 
                  LEFT JOIN tbl_student_fees AS fee ON s.stud_id = fee.stud_id 
                  LEFT JOIN tbl_student_school_details AS d ON s.stud_id = d.stud_id 
                  WHERE s.stud_id = ?";
      $stmtDel = $con->prepare($sqlDel);
      $stmtDel->bind_param('s', $user_id );
      $stmtDel->execute();
      $checkAccount = "SELECT * FROM `tbl_accounts` WHERE user_id = '$user_id'";
      $stmtAccount = $con->prepare($checkAccount);
      $stmtAccount->execute();
      $resAccount = $stmtAccount->get_result();
      if($resAccount->num_rows > 0){
        $update = "UPDATE `tbl_accounts` SET `status`= 'Inactive' WHERE  user_id = '$user_id'";
        $stmtUpdate = $con->prepare($update);
        if($stmtUpdate->execute()){
          $response['status'] = 'success';
          $response['message'] = 'Successfully Archived';
        }
      }else{
        $response['status'] = 'success';
        $response['message'] = 'Successfully Archived';
      }
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed Added';
    }
    
    
    echo json_encode($response);
  }
  
  if(isset($_POST['empArchive'])){
    $empId = $_POST['empId'];

    $selectEmpInfo = "SELECT * FROM `tbl_employee_info` WHERE employee_id = ?";
    $stmtEmpInfo = $con->prepare($selectEmpInfo);
    $stmtEmpInfo->bind_param('s', $empId);
    $stmtEmpInfo->execute();
    $resEmpInfo = $stmtEmpInfo->get_result();
    $rowEmpInfo = $resEmpInfo->fetch_assoc();
    $Emp_regNo = $rowEmpInfo['reg_no'];
    $Emp_id = $rowEmpInfo['employee_id'];
    $Emp_role = $rowEmpInfo['role'];
    $Emp_firstname = $rowEmpInfo['firstname'];
    $Emp_lastname = $rowEmpInfo['lastname'];
    $Emp_middlename = $rowEmpInfo['middlename'];
    $Emp_sex = $rowEmpInfo['sex'];
    $Emp_address = $rowEmpInfo['address'];
    $Emp_email = $rowEmpInfo['email'];
    $Empcontact_number = $rowEmpInfo['contact_number'];

    $sqlEmpArchive = "INSERT INTO `tbl_archive`(`reg_no`, `user_id`, `firstname`, `lastname`, `middlename`, `role`, `email`, `sex`, `address`, `contact_number`) 
    VALUES ('$Emp_regNo','$Emp_id','$Emp_firstname','$Emp_lastname','$Emp_middlename','$Emp_role','$Emp_email','$Emp_sex','$Emp_address','$Empcontact_number')";
    $stmtEmpArchive = $con->prepare($sqlEmpArchive);
    if($stmtEmpArchive->execute()){
    
      $sqlEmpDel = "DELETE FROM `tbl_employee_info` WHERE `employee_id` = ?";
    
      $stmtEmpDel = $con->prepare($sqlEmpDel);
      $stmtEmpDel->bind_param('s', $empId );
      $stmtEmpDel->execute();
      $checkEmpAccount = "SELECT * FROM `tbl_accounts` WHERE user_id = '$empId'";
      $stmtEmpAccount = $con->prepare($checkEmpAccount);
      $stmtEmpAccount->execute();
      $resEmpAccount = $stmtEmpAccount->get_result();
      if($resEmpAccount->num_rows > 0){
        $Empupdate = "UPDATE `tbl_accounts` SET `status`= 'Inactive' WHERE  user_id = '$empId'";
        $stmtEmpUpdate = $con->prepare($Empupdate);
        if($stmtEmpUpdate->execute()){
          $response['status'] = 'success';
          $response['message'] = 'Successfully Archived';
        }
      }else{
        $response['status'] = 'success';
        $response['message'] = 'Successfully Archived';
      }
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed Added';
    }
    
    
    echo json_encode($response);
  }
    
  ?>
