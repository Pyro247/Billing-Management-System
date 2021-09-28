<?php
 $conn = mysqli_connect("localhost", "root", "", "web-based-billing-management-system");       
 if($conn === false){
     die("ERROR: Could not connect. " 
         . mysqli_connect_error());
 }
 
  $emp_id =$_POST['emp_id'];
  $emp_role =$_POST['emp_role'];
  $emp_firstname =$_POST['emp_firstname'];
  $emp_lastname =$_POST['emp_lastname'];
  $emp_middlename =$_POST['emp_middlename'];
  $emp_sex =$_POST['emp_sex'];
  $emp_birthdate =$_POST['emp_birthdate'];
  $emp_age =$_POST['emp_age'];
  $emp_address =$_POST['emp_address'];
  $emp_citizenship =$_POST['emp_citizenship'];
  $emp_civil_status =$_POST['emp_civil_status'];
  $emp_email =$_POST['emp_email'];
  $emp_contact_number =$_POST['emp_contact_number'];

//------------------EMPLOYEE'S TAB BUTTON CONDITION----------------------------------------

  if(isset($_POST['emp_add'])){
    $sql = "INSERT INTO `tbl_employee_info`(`employee_id`, `role`, `firstname`, `middlename`, `lastname`, `citizenship`, `civil_status`, `sex`, 
    `birthdate`, `age`, `address`, `email`, `contact_number`) 
    VALUES ('$emp_id','$emp_role','$emp_firstname','$emp_lastname','$emp_middlename','$emp_sex','$emp_birthdate','$emp_age','$emp_address',
    '$emp_citizenship','$emp_civil_status','$emp_email','$emp_contact_number')";
  
  }else if(isset($_POST['emp_update'])){
    $sql = "UPDATE `tbl_employee_info` SET `employee_id`='$emp_id',`role`='$emp_role',`firstname`='$emp_firstname',
    `middlename`='$emp_middlename',`lastname`='$emp_lastname',`citizenship`='$emp_citizenship',`civil_status`='$emp_civil_status',`sex`='$emp_sex',
    `birthdate`='$emp_birthdate',`age`='$emp_age',`address`='$emp_address',`email`='$emp_email',`contact_number`='$emp_contact_number' 
    WHERE `emp_id` = '$emp_id'";

  }else if(isset($_POST['emp_delete'])){
    $sql = "DELETE FROM `tbl_employee_info` WHERE `employee_id` = '$emp_id'";
  }

        if(mysqli_query($conn, $sql)){
          header('Location: ../html/registrar_access.php'); 
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
        mysqli_close($conn);

  ?>