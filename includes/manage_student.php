
<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
 
  if(isset($_POST['stud_save'])){
     //  student info table---------------
    $student_number =$_POST['student_number'];
    $stud_firstname =$_POST['stud_firstname'];
    $stud_middlename =$_POST['stud_middlename'];
    $stud_lastname =$_POST['stud_lastname'];

//  student school details table---------------
  $stud_school_year =$_POST['stud_school_year'];
  $stud_semester =$_POST['stud_semester'];
  $stud_year_level =$_POST['stud_year_level'];
  $stud_program =$_POST['stud_program'];
  $stud_major =$_POST['stud_major'];
  $stud_status =$_POST['stud_status'];
  $stud_lrn =$_POST['stud_lrn'];
  $stud_scholarship =$_POST['stud_scholarship'];

 //student fee table---------------------
  $stud_discount =$_POST['stud_discount'];
  $stud_fee =$_POST['stud_fee'];
   //student requirement table---------------------
  if(!isset($_POST['req_form137']) && !isset($_POST['req_form138']) && !isset($_POST['req_psa']) && !isset($_POST['req_good_moral'])){
    $req_form_137 = 'x';
    $req_form_138 = 'x';
    $req_psa_birth_cert = 'x';
    $req_good_moral = 'x';
  }else{
    $req_form_137 =$_POST['req_form137'];
    $req_form_138 =$_POST['req_form138'];
    $req_psa_birth_cert =$_POST['req_psa'];
    $req_good_moral =$_POST['req_good_moral'];
  }
    // Studen Info
    $sqlStudInfo = "INSERT INTO `tbl_student_info`(`stud_id`, `firstname`, `lastname`, `middlename`)
    VALUES (?,?,?,?)";
    $stmtStudInfo = $con->prepare($sqlStudInfo);
    $stmtStudInfo->bind_param('ssss',$student_number,$stud_firstname,$stud_lastname,$stud_middlename);
    // Course Fee
    $fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
    $program_major = $stud_program.'-'.$stud_major;
    $sqlCourseFee = "INSERT INTO `tbl_course_fee`(`stud_id`, `fullname`, `csi_program&major`, `csi_year_level`, `tuition_fee`, `discount`) VALUES (?,?,?,?,?,?)";
    $stmtCourseFee = $con->prepare($sqlCourseFee);
    $stmtCourseFee->bind_param('ssssss',$student_number,$fullname,$program_major,$stud_year_level,$stud_fee,$stud_discount);
    // Student Requirements
    $slqRequirements = "INSERT INTO `tbl_student_requirements`(`stud_id`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) VALUES (?,?,?,?,?)";
    $stmtRequirements = $con->prepare($slqRequirements);
    $stmtRequirements->bind_param('sssss',$student_number,$req_form_137,$req_form_138,$req_psa_birth_cert,$req_good_moral);

  if($stmtStudInfo->execute() && $stmtCourseFee->execute() && $stmtRequirements->execute()){
    $response['status'] = 'success';
    $response['message'] = 'Successfully saved';
  } else{
    $response['status'] = 'error';
    $response['message'] = 'Failed to save!';
  }
  // School Details to be follow
  // $sqlDetials = "INSERT INTO `tbl_student_school_details`(`stud_id`, `LRN`, `stud_status`, `csi_school_year`, `csi_semester`, `csi_scholarship`, `csi_program`, `csi_major`, `csi_year_level`) 
  // VALUES (?,?,?,?,?,?,?,?,?)";
  //   $stmtDetails = $con->prepare($sqlDetials);
  //   $stmtDetails->bind_param('sssssssss',$student_number,$stud_lrn,$stud_status,$stud_school_year,$stud_semester,$stud_scholarship,$stud_program,$stud_major,$stud_year_level);

  echo json_encode($response);
}
if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $data = array();
  $slqEdit = "SELECT * FROM `tbl_student_info` WHERE stud_id = ?";
  $stmtEdit = $con->prepare($slqEdit);
  $stmtEdit->bind_param('s', $id);
  $stmtEdit->execute();
  $res = $stmtEdit->get_result();
  $row = $res->fetch_assoc();
  if($res->num_rows > 0){
    $data['stud_id'] = $row['stud_id'];
    $data['firstname'] = $row['firstname'];
    $data['lastname'] = $row['lastname'];
    $data['middlename'] = $row['middlename'];
  }
  echo json_encode($data);
}
if(isset($_POST['update'])){
  $stud_id = $_POST['stud_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $middlename = $_POST['middlename'];
  $sqlUpdate = "UPDATE `tbl_student_info` SET `firstname`= ? ,`lastname`= ?,`middlename`= ? WHERE stud_id = ?";
  $stmtUpdate = $con->prepare($sqlUpdate);
  $stmtUpdate->bind_param('ssss', $firstname, $lastname, $middlename, $stud_id);
  if($stmtUpdate->execute()){
    $response['status'] = 'success';
    $response['message'] = 'Successfully Updated';
  } else{
    $response['status'] = 'error';
    $response['message'] = 'Failed to update!';
  }
  echo json_encode($response);
}
if(isset($_POST['delete'])){
  
  $id = $_POST['id'];
  // $sqlDel = "DELETE FROM `tbl_student_info` WHERE stud_id = ?";
  $sqlDel = "DELETE s.*, r.* 
              FROM tbl_student_info s 
              LEFT JOIN tbl_student_requirements r 
              ON s.stud_id = r.stud_id 
              WHERE s.stud_id = ?";
  $stmtDel = $con->prepare($sqlDel);
  $stmtDel->bind_param('s', $id );
  if( $stmtDel->execute()){
    $response['status'] = 'success';
    $response['message'] = 'Successfully Added';
  }else{
    $response['status'] = 'error';
    $response['message'] = 'Failed Added';
  }

  echo json_encode($response);
}


  
  
//   $conn = mysqli_connect("localhost", "root", "", "web-based-billing-management-system");       
//   if($conn === false){
//     die("ERROR: Could not connect. " 
//       . mysqli_connect_error());
//   }


// //------------------------------------SAVE BUTTON---------------------------------
//   if(isset($_POST['stud_save'])){
//     $sql = "INSERT INTO `tbl_student_info`(`stud_id`, `firstname`, `lastname`, `middlename`)
//     VALUES ('$student_number','$stud_firstname','$stud_lastname','$stud_middlename')";
//     $sql1 = "INSERT INTO `tbl_student_school_details`(`stud_id`, `LRN`, `stud_status`, `csi_school_year`, `csi_semester`, 
//     `csi_scholarship`, `csi_program`, `csi_major`, `csi_year_level`) 
//     VALUES ('$student_number','$stud_lrn','$stud_status','$stud_school_year','$stud_semester','$stud_scholarship',
//     '$stud_program','$stud_major','$stud_year_level')";
//     $sql2 = "INSERT INTO `tbl_course_fee`(`stud_id`, `fullname`, `csi_program&major`, `csi_year_level`, `tuition_fee`, `discount`) 
//     VALUES ('$student_number','$stud_firstname $stud_middlename $stud_lastname',
//     ' $stud_program - $stud_major','$stud_year_level','$stud_fee','$stud_discount')";
//     $sql3 = "INSERT INTO `tbl_student_requirements`(`stud_id`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) 
//     VALUES ('$student_number','$req_form_137','$req_form_138','$req_psa_birth_cert','$req_good_moral')";

// //------------------------------------UPDATE BUTTON---------------------------------
//   }else if(isset($_POST['stud_update'])){
//     $sql = "UPDATE `tbl_student_info` SET `stud_id`='$student_number',`firstname`='$stud_firstname',`lastname`='$stud_lastname',`middlename`='$stud_middlename' 
//     WHERE `stud_id`= '$student_number'";
//     $sql1 = "UPDATE `tbl_student_school_details` SET `stud_id`='$student_number',`LRN`='$stud_lrn',`stud_status`='$stud_status',
//     `csi_school_year`='$stud_school_year',`csi_semester`='$stud_semester',`csi_scholarship`='$stud_scholarship',`csi_program`='$stud_program',
//     `csi_major`='$stud_major',`csi_year_level`='$stud_year_level' 
//     WHERE `stud_id`= '$student_number'";
//     $sql2 = "UPDATE `tbl_course_fee` SET `stud_id`='$student_number',`fullname`='$stud_firstname $stud_middlename $stud_lastname',
//     `csi_program&major`='$stud_program - $stud_major',`csi_year_level`='$stud_year_level',`tuition_fee`='$stud_fee',`discount`='$stud_discount' 
//     WHERE `stud_id`= '$student_number'";
//     $sql3 = "UPDATE `tbl_student_requirements` SET `stud_id`='$student_number',`form_137`='$req_form_137',`form_138`='$req_form_138',
//     `psa_birth_cert`='$req_psa_birth_cert',`good_moral`='$req_good_moral' WHERE `student_number` = '$student_number'";
      
// //------------------------------------DELETE BUTTON---------------------------------
//   } else if(isset($_POST['stud_delete'])){
//     $sql = "DELETE FROM `tbl_student_info` WHERE `stud_id`= '$student_number'";
//     $sql1 = "DELETE FROM `tbl_student_school_details` WHERE `stud_id`= '$student_number'";
//     $sql2 = "DELETE FROM `tbl_course_fee` WHERE `stud_id`= '$student_number'";
//     $sql3 = "DELETE FROM `tbl_student_requirements` WHERE `stud_id`= '$student_number'";
//   }


//   if(mysqli_query($conn, $sql)){
//     header('Location: ../html/registrar_access.html'); 
//   } else{
//       echo "ERROR: Hush! Sorry $sql. "
//           . mysqli_error($conn);
//   }

//   if(mysqli_query($conn, $sql1)){
//     header('Location: ../html/registrar_access.php'); 
//   } else{
//       echo "ERROR: Hush! Sorry $sql1. "
//           . mysqli_error($conn);
//   }
//   if(mysqli_query($conn, $sql2)){
//     header('Location: ../html/registrar_access.php'); 
//   } else{
//       echo "ERROR: Hush! Sorry $sql2. "
//           . mysqli_error($conn);
//   }
//   if(mysqli_query($conn, $sql3)){
//     header('Location: ../html/registrar_access.php'); 
//   } else{
//       echo "ERROR: Hush! Sorry $sql3. "
//           . mysqli_error($conn);
//   }
//   mysqli_close($conn);











/*
  $student_number =$_POST['student_number'];
  $stud_firstname =$_POST['stud_firstname'];
  $stud_lastname =$_POST['stud_lastname'];
  $stud_middlename =$_POST['stud_middlename'];
  $stud_sex =$_POST['stud_sex'];
  $stud_birthdate =$_POST['stud_birthdate'];
  $stud_age =$_POST['stud_age'];
  $stud_address =$_POST['stud_address'];
  $stud_religion =$_POST['stud_religion'];
  $stud_citizenship =$_POST['stud_citizenship'];
  $stud_civil_status =$_POST['stud_civil_status'];
  $stud_college =$_POST['stud_college'];
  $stud_major =$_POST['stud_major'];
  $stud_year_section =$_POST['stud_year_section'];
  $stud_email =$_POST['stud_email'];
  $stud_contact_number =$_POST['stud_contact_number'];
  $req_form_137 =$_POST['req_form137'];
  $req_form_138 =$_POST['req_form138'];
  $req_psa_birth_cert =$_POST['req_psa'];
  $req_good_moral =$_POST['req_good_moral'];

//----------------------STUDENT'S TAB BUTTON CONDITION----------------------------------------

if(isset($_POST['stud_add'])){
  $sql = "INSERT INTO `tbl_student_info`(`stud_id`, `firstname`, `lastname`, `middlename`, `sex`,
  `birthdate`, `age`, `address`, `citizenship`, `civil_status`, `college`, `major`, `year_section`, `email`, `contact_number`) 
 VALUES ('$student_number','$stud_firstname','$stud_lastname','$stud_middlename','$stud_sex','$stud_birthdate','$stud_age','$stud_address',
 '$stud_citizenship','$stud_civil_status','$stud_college','$stud_major','$stud_year_section','$stud_email','$stud_contact_number')";
 
 $sql1 = "INSERT INTO `tbl_student_requirements`(`stud_id`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) 
 VALUES ('$student_number','$req_form_137','$req_form_138','$req_psa_birth_cert','$req_good_moral')";
 
 
} else if(isset($_POST['stud_update'])){
  $sql = "UPDATE `tbl_student_info` SET `stud_id`='$student_number',`firstname`='$stud_firstname',
  `lastname`='$stud_lastname',`middlename`='$stud_middlename',`sex`='$stud_sex',`birthdate`='$stud_birthdate',`age`='$stud_age',`address`='$stud_address',
  `religion`='$stud_religion',`citizenship`='$stud_citizenship',`civil_status`='$stud_civil_status',`college`='$stud_ollege',`major`='$stud_major',
  `year_section`='$stud_year_section',`email`='$stud_email',`contact_number`='$stud_contact_number' WHERE `student_number` = '$student_number'";

  $sql1 = "UPDATE `tbl_student_requirements` SET `stud_id`='$student_number',`form_137`='$req_form_137',`form_138`='$req_form_138',
  `psa_birth_cert`='$req_psa_birth_cert',`good_moral`='$req_good_moral' WHERE `student_number` = '$student_number'";
    

} else if(isset($_POST['stud_delete'])){
  $sql = "DELETE FROM `tbl_student_info` WHERE `stud_id`= '$student_number'";

  $sql1 = "DELETE FROM `tbl_student_requirements` WHERE `stud_id`= '$student_number'";
}

        if(mysqli_query($conn, $sql)){
          header('Location: ../html/registrar_access.php'); 
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        if(mysqli_query($conn, $sql1)){
          header('Location: ../html/registrar_access.php'); 
        } else{
            echo "ERROR: Hush! Sorry $sql1. "
                . mysqli_error($conn);
        }
        mysqli_close($conn);

  */
  ?>