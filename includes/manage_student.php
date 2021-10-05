
<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
  // Getting POST DATA
  //  student info table
  if(isset($_POST['student_number'])){
    $student_number =$_POST['student_number'];
    $stud_firstname =$_POST['stud_firstname'];
    $stud_middlename =$_POST['stud_middlename'];
    $stud_lastname =$_POST['stud_lastname'];
    $stud_program =$_POST['stud_program'];
    $stud_major =$_POST['stud_major'];
    $stud_scholarship =$_POST['stud_scholarship'];
    $stud_fee =$_POST['stud_fee'];
  }
  //  student school details table
  if(!isset($_POST['stud_school_year'])){
    $stud_school_year = '';
  }else{
    $stud_school_year = $_POST['stud_school_year'];
  }
  if(!isset($_POST['stud_semester'])){
    $stud_semester = '';
  }else{
    $stud_semester = $_POST['stud_semester'];
  }
  if(!isset($_POST['stud_year_level'])){
    $stud_year_level = '';
  }else{
    $stud_year_level = $_POST['stud_year_level'];
  }
  if(!isset($_POST['stud_status'])){
    $stud_status = '';
  }else{
    $stud_status = $_POST['stud_status'];
  }
  if(!isset($_POST['stud_lrn'])){
    $stud_lrn = '';
  }else{
    $stud_lrn = $_POST['stud_lrn'];
  }
  // student fee table
  if(!isset($_POST['stud_discount'])){
    $stud_discount = '0';
  }else{
  $stud_discount =$_POST['stud_discount'];
  }
    //student requirement table
  if(!isset($_POST['req_form137']) ){
    $req_form_137 = 'x';
  }else{
    $req_form_137 =$_POST['req_form137'];
  }
  if(!isset($_POST['req_form138'])){
    $req_form_138 = 'x';
  }else{
    $req_form_138 =$_POST['req_form138'];
  }
  if(!isset($_POST['req_psa'])){
    $req_psa_birth_cert = 'x';
  }else{
    $req_psa_birth_cert =$_POST['req_psa'];
  }
  if(!isset($_POST['req_good_moral'])){
    $req_good_moral = 'x';
  }else{
    $req_good_moral =$_POST['req_good_moral'];
  }

  if(isset($_POST['stud_save'])){
    // Studen Info
    $sqlStudInfo = "INSERT INTO `tbl_student_info`(`stud_id`, `firstname`, `lastname`, `middlename`,`program`,`major`,`year_level`)
    VALUES (?,?,?,?,?,?,?)";
    $stmtStudInfo = $con->prepare($sqlStudInfo);
    $stmtStudInfo->bind_param('sssssss',$student_number,$stud_firstname,$stud_lastname,$stud_middlename,$stud_program,$stud_major,$stud_year_level);
    // Course Fee
    $fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
    $program_major = $stud_program.'-'.$stud_major;
    $sqlCourseFee = "INSERT INTO `tbl_course_fee`(`stud_id`, `fullname`, `csi_program_major`,`csi_year_level`, `tuition_fee`, `discount`) VALUES (?,?,?,?,?,?)";
    $stmtCourseFee = $con->prepare($sqlCourseFee);
    $stmtCourseFee->bind_param('ssssss',$student_number,$fullname,$program_major,$stud_year_level,$stud_fee,$stud_discount);
    // Student Requirements
    $slqRequirements = "INSERT INTO `tbl_student_requirements`(`stud_id`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) VALUES (?,?,?,?,?)";
    $stmtRequirements = $con->prepare($slqRequirements);
    $stmtRequirements->bind_param('sssss',$student_number,$req_form_137,$req_form_138,$req_psa_birth_cert,$req_good_moral);
    // School Details to be follow 
    $sqlDetials = "INSERT INTO `tbl_student_school_details`(`stud_id`, `csi_scholarship`, `csi_program`, `csi_major`, `csi_year_level`) 
    VALUES (?,?,?,?,?)";
      $stmtDetails = $con->prepare($sqlDetials);
      $stmtDetails->bind_param('sssss',$student_number,$stud_scholarship,$stud_program,$stud_major,$stud_year_level);

  if($stmtStudInfo->execute()   ) {
    if($stmtRequirements->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully saved';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to save Requirements! ';
    }
    if( $stmtCourseFee->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully saved';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to save Course Fee! ';
    }
    if(  $stmtDetails->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully saved';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to save Course Fee! ';
    }
    
  } else{
    $response['status'] = 'error';
    $response['message'] = 'Failed to save!';
  }


echo  json_encode($response);
}
if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $data = array();
  $slqEdit = "SELECT s.stud_id,s.firstname,s.lastname,s.middlename,s.program,s.major,s.year_level,r.form_137,r.form_138,r.psa_birth_cert, r.good_moral, c.course_id, c.csi_program_major,c.csi_year_level,c.tuition_fee,c.discount,d.LRN,d.stud_status,d.csi_school_year,d.csi_semester,d.csi_scholarship
              FROM tbl_student_info as s
              RIGHT JOIN tbl_student_requirements as r ON s.stud_id = r.stud_id
              RIGHT JOIN tbl_course_fee as c ON r.stud_id = c.stud_id
              RIGHT JOIN tbl_student_school_details as d ON c.stud_id = d.stud_id
              WHERE s.stud_id = ?";
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
    $data['program'] = $row['program'];
    $data['major'] = $row['major'];
    $data['year_level'] = $row['year_level'];
    $data['form_137'] = $row['form_137'];
    $data['form_138'] = $row['form_138'];
    $data['psa_birth_cert'] = $row['psa_birth_cert'];
    $data['good_moral'] = $row['good_moral'];
    $data['tuition_fee'] = $row['tuition_fee'];
    $data['discount'] = $row['discount'];
    $data['stud_lrn'] = $row['LRN'];
    $data['stud_status'] = $row['stud_status'];
    $data['csi_school_year'] = $row['csi_school_year'];
    $data['csi_semester'] = $row['csi_semester'];
    $data['csi_scholarship'] = $row['csi_scholarship'];
  }
  echo json_encode($data);
}
if(isset($_POST['update'])){

$fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
$program_major = $stud_program.'-'.$stud_major;
$sqlUpdateAll = "UPDATE `tbl_student_info` AS info
                INNER JOIN `tbl_student_requirements` AS req ON info.stud_id = req.stud_id
                INNER JOIN `tbl_course_fee` AS fee ON info.stud_id = fee.stud_id
                INNER JOIN `tbl_student_school_details` AS det ON info.stud_id = det.stud_id
                SET 
                info.firstname = ?,info.lastname = ?,info.middlename = ?,info.program = ?,info.major = ?, info.year_level = ?, 
                req.form_137 = ?,req.form_138 = ?,req.psa_birth_cert = ?,req.good_moral= ?,
                fee.fullname = ?,fee.csi_program_major = ?,fee.csi_year_level = ?,fee.tuition_fee = ?,fee.discount = ?,
                det.LRN = ?,det.stud_status = ?,det.csi_school_year = ?,det.csi_semester = ?,det.csi_scholarship = ?,det.csi_program = ?,det.csi_major = ?,det.csi_year_level = ?
                WHERE info.stud_id = ?";
$stmtUpdateAll = $con->prepare($sqlUpdateAll);
$stmtUpdateAll->bind_param('ssssssssssssssssssssssss', $stud_firstname, $stud_lastname, $stud_middlename,$stud_program,$stud_major,$stud_year_level, $req_form_137,$req_form_138,$req_psa_birth_cert,$req_good_moral,$fullname,$program_major,$stud_year_level,$stud_fee,$stud_discount,$stud_lrn,$stud_status,$stud_school_year,$stud_semester,$stud_scholarship, $stud_program, $stud_major, $stud_year_level,$student_number);

if($stmtUpdateAll->execute()) {
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
<<<<<<< HEAD
  // $sqlDel = "DELETE FROM `tbl_student_info` WHERE stud_id = ?";
  $sqlDel = "DELETE s.*, r.*, c.*, d.*
              FROM tbl_student_info s 
              LEFT JOIN tbl_student_requirements r 
              ON s.stud_id = r.stud_id
              LEFT JOIN tbl_course_fee c 
              ON s.stud_id = c.stud_id
              LEFT JOIN tbl_student_school_details d 
              ON s.stud_id = d.stud_id
=======
  $sqlDel = "DELETE s.*, r.* ,c.*,d.*
              FROM tbl_student_info AS s 
              LEFT JOIN tbl_student_requirements AS r ON s.stud_id = r.stud_id 
              LEFT JOIN tbl_course_fee AS c ON s.stud_id = c.stud_id 
              LEFT JOIN tbl_student_school_details AS d ON s.stud_id = d.stud_id 
>>>>>>> 2170df5a5bfb4307adcc749501899280b8b83af2
              WHERE s.stud_id = ?";
  $stmtDel = $con->prepare($sqlDel);
  $stmtDel->bind_param('s', $id );
  if( $stmtDel->execute()){
    $response['status'] = 'success';
    $response['message'] = 'Successfully Deleted';
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