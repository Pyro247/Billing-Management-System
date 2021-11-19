
<?php
  include_once '../connection/Config.php';
  include '../includes/audit_logs.php';
  session_start();
  $response = array();
  header('Content-type: application/json');
  if(isset($_GET['getAssessedFeee'])){
    $data = array();
    $id = $_GET['id'];
    $sqlGetAssessedFee = "SELECT * FROM `tbl_course_fees` WHERE program_id = ?";
    $stmtGetAssessedFee = $con->prepare($sqlGetAssessedFee);
    $stmtGetAssessedFee->bind_param('s',$id);
    $stmtGetAssessedFee->execute();
    $resGetAssessedFee = $stmtGetAssessedFee->get_result();
    $rowGetAssessedFee = $resGetAssessedFee->fetch_assoc();
    $data['library_Fee'] = $rowGetAssessedFee['library_Fee'];
    $data['guidance_Fee'] = $rowGetAssessedFee['guidance_Fee'];
    $data['athletic_Fee'] = $rowGetAssessedFee['athletic_Fee'];
    $data['computer_Fee'] = $rowGetAssessedFee['computer_Fee'];
    $data['registration_Fee'] = $rowGetAssessedFee['registration_Fee'];
    $data['totalFee'] =  $rowGetAssessedFee['library_Fee'] + $rowGetAssessedFee['guidance_Fee'] +
    $rowGetAssessedFee['athletic_Fee'] + $rowGetAssessedFee['computer_Fee'] + $rowGetAssessedFee['registration_Fee'];
    echo json_encode($data);
  }
  if(isset($_GET['getLecUnit'])){
    $numUnit = $_GET['numUnit'];
    $studProgram = $_GET['studProgram'];
    $studMajor = $_GET['studMajor'];
    $studSemester = $_GET['studSemester'];
    $studYearLevel = $_GET['studYearLevel'];
    $sql = "SELECT fees.lab_Fee,fees.lecture_Fee
            FROM tbl_course_list as list
            INNER JOIN tbl_course_fees as fees ON list.program_id = fees.program_id
            WHERE list.course_program = ? AND list.course_major = ? AND fees.course_year_level =  ? AND fees.semester = ?";
      $stmtCheck = $con->prepare($sql);
      $stmtCheck->bind_param('ssss', $studProgram,$studMajor,$studYearLevel,$studSemester);
      $stmtCheck->execute();
      $resCheck = $stmtCheck->get_result();
      $row = $resCheck->fetch_assoc();
      if($resCheck->num_rows > 0){
        $lectureUnit = $row['lecture_Fee'];
        $total = $lectureUnit * $numUnit;
      }
      echo json_encode($total);
  }
  if(isset($_GET['getLebUnit'])){
    $numUnit = $_GET['numUnit'];
    $studProgram = $_GET['studProgram'];
    $studMajor = $_GET['studMajor'];
    $studSemester = $_GET['studSemester'];
    $studYearLevel = $_GET['studYearLevel'];
    $sql = "SELECT fees.lab_Fee,fees.lecture_Fee
            FROM tbl_course_list as list
            INNER JOIN tbl_course_fees as fees ON list.program_id = fees.program_id
            WHERE list.course_program = ? AND list.course_major = ? AND fees.course_year_level =  ? AND fees.semester = ?";
      $stmtCheck = $con->prepare($sql);
      $stmtCheck->bind_param('ssss', $studProgram,$studMajor,$studYearLevel,$studSemester);
      $stmtCheck->execute();
      $resCheck = $stmtCheck->get_result();
      $row = $resCheck->fetch_assoc();
      if($resCheck->num_rows > 0){
        $labFee = $row['lab_Fee'];
        $total = $labFee * $numUnit;
      }
      echo json_encode($total);
  }
  if(isset($_POST['student_number'])){
      $student_number =$_POST['student_number'];
        $stud_firstname =$_POST['stud_firstname'];
        $stud_middlename =$_POST['stud_middlename'];
        $stud_lastname =$_POST['stud_lastname'];
        $stud_program =$_POST['stud_program'];
        $stud_major =$_POST['stud_major'];
        $stud_scholarship =$_POST['stud_scholarship'];
        $stud_lecUnits =$_POST['stud_lecUnits'];
        $stud_labUnits =$_POST['stud_labUnits'];
        $assessed_fee = $_POST['assessed_fee'];
        $stud_fee =$_POST['stud_feeTotal'];
        $empId = $_POST['empId'];
        $empName = $_POST['empName'];
        
        
         $stud_school_year = $_POST['stud_school_year'] ?? '';
        $stud_semester = $_POST['stud_semester'] ?? '';
        $stud_year_level = $_POST['stud_year_level'] ?? '';
        $stud_year_level = $_POST['stud_year_level'] ?? '';
        $stud_status = $_POST['stud_status'] ?? '';
        $stud_lrn = $_POST['stud_lrn'] ?? '';
        $stud_discount = $_POST['stud_discount'] ?? 0;
       
    //    if(!isset($_POST['req_form137']) ){
    // $req_form_137 = 'x';
    //   }else{
    //     $req_form_137 = $_POST['req_form137'];
    //   }
    //   if(!isset($_POST['req_form138'])){
    //     $req_form_138 = 'x';
    //   }else{
    //     $req_form_138 = $_POST['req_form138'];
    //   }
    //   if(!isset($_POST['req_psa'])){
    //     $req_psa_birth_cert = 'x';
    //   }else{
    //     $req_psa_birth_cert = $_POST['req_psa'];
    //   }
    //   if(!isset($_POST['req_good_moral'])){
    //     $req_good_moral = 'x';
    //   }else{
    //     $req_good_moral = $_POST['req_good_moral'];
    //   }

    
  }


  
  if(isset($_POST['newStud'])){
      
        
    // Getting Program ID 
    $sqlGetProgId = "SELECT * FROM `tbl_course_list` WHERE course_major = ?";
    $stmtGetProgId = $con->prepare($sqlGetProgId);
    $stmtGetProgId->bind_param('s',$stud_major);
    $stmtGetProgId->execute();
    $resGetProgId = $stmtGetProgId->get_result();
    $rowGetProgId = $resGetProgId->fetch_assoc();
    $course_id = $rowGetProgId['program_id'];
    //Inserting Data to Student Info
    $sqlStudInfo = "INSERT INTO `tbl_student_info`(`reg_no`, `stud_id`, `firstname`, `lastname`, `middlename`, `sex`, `address`, `email`, `contact_number`, `joined_date`, `registrar_id`, `registrar_name`) VALUES ('',?,?,?,?,'','','','','',?,?)";
    $stmtStudInfo = $con->prepare($sqlStudInfo);
    $stmtStudInfo->bind_param('ssssss',$student_number,$stud_firstname,$stud_lastname,$stud_middlename,$empId,$empName);
    // Computing Student Fee base on Scholarship and Discount
    // Getting scholar desc
    if($stud_scholarship != 'N/A'){
      $slqGetScholar = "SELECT * FROM `tbl_scholarship` WHERE scholar_description = ?";
      $stmtGetScholar = $con->prepare($slqGetScholar);
      $stmtGetScholar->bind_param('s',$stud_scholarship);
      $stmtGetScholar->execute();
      $resGetScholar = $stmtGetScholar->get_result();
      $rowGetScholar = $resGetScholar->fetch_assoc();
      
      $scholarType = $rowGetScholar['scholar_type'];
      if($scholarType == 'Half'){
        $balance = $stud_fee/2;
        if($stud_discount != 'N/A'){
          $sqlGetDisc = "SELECT * FROM `tbl_discount` WHERE discount_type = ?";
          $stmtGetDisc = $con->prepare($sqlGetDisc);
          $stmtGetDisc->bind_param('s',$stud_discount);
          $stmtGetDisc->execute();
          $resGetDisc = $stmtGetDisc->get_result();
          $rowGetDisc  = $resGetDisc->fetch_assoc();
          $balance = (($balance * (100 - $rowGetDisc['discount_percent'])/  100));
        }
        $remarks = 'Not Fully Paid';
        $studScholarType = 'Partial Scholar';
      }else if($scholarType == 'Full'){
        $balance = 0;
        $remarks = 'Fully Paid';
        $studScholarType = 'Full Scholar';
      }
    }else{
      if($stud_discount != 'N/A'){
        $sqlGetDisc = "SELECT * FROM `tbl_discount` WHERE discount_type = ?";
          $stmtGetDisc = $con->prepare($sqlGetDisc);
          $stmtGetDisc->bind_param('s',$stud_discount);
          $stmtGetDisc->execute();
          $resGetDisc = $stmtGetDisc->get_result();
          $rowGetDisc  = $resGetDisc->fetch_assoc();
          $balance = (($stud_fee * (100 - $rowGetDisc['discount_percent'])/  100));
      }else{
        $balance = $stud_fee;
      }
      $remarks = 'Not Fully Paid';
      $studScholarType = 'N/A';
    }
    
    
    
    $fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
    $program_major = $stud_program.'-'.$stud_major;
    $total_amount_paid = 0;
    $sqlStudFee = "INSERT INTO `tbl_student_fees`(`program_id`, `stud_id`, `fullname`, `csi_year_level`, `scholar_desc`,`scholar_type`, `discount_type`, `tuition_fee`, `total_amount_paid`, `balance`, `remarks`,`lab_units`,`lec_units`,`assessed_fee`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmtStudFee = $con->prepare($sqlStudFee);
    $stmtStudFee->bind_param('ssssssssssssss',$course_id,$student_number,$fullname,$stud_year_level,$stud_scholarship,$studScholarType,$stud_discount,$stud_fee,$total_amount_paid,$balance,$remarks,$stud_labUnits,$stud_lecUnits,$assessed_fee);
    // Student Requirements
    // $slqRequirements = "INSERT INTO `tbl_student_requirements`(`stud_id`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) VALUES (?,?,?,?,?)";
    // $stmtRequirements = $con->prepare($slqRequirements);
    // $stmtRequirements->bind_param('sssss',$student_number,$req_form_137,$req_form_138,$req_psa_birth_cert,$req_good_moral);
    // School Details 
    $sqlDetials = "INSERT INTO `tbl_student_school_details`(`stud_id`, `LRN`, `stud_type`, `csi_academic_year`, `csi_semester`, `csi_program`, `csi_major`, `csi_year_level`) VALUES (?,'','','',?,?,?,?)";
    $stmtDetails = $con->prepare($sqlDetials);
    $stmtDetails->bind_param('sssss',$student_number,$stud_semester,$stud_program,$stud_major,$stud_year_level);
//    && $stmtRequirements->execute()  && $stmtStudFee->execute() &&$stmtDetails->execute()
  if(  $stmtStudInfo->execute() && $stmtStudFee->execute() && $stmtDetails->execute() ) {
    
    
    $act = 'Add new student '. $student_number . ' - ' . $fullname;
    audit($empId,'Registrar',$empName,$act);
    $response['status'] = 'success';
    $response['message'] = 'Successfully saved';
  } else{
    $response['status'] = 'error';
    $response['message'] = 'Student ID Already Exist';
  }
//  
  echo  json_encode($response);
}
if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $data = array();
  $slqEdit = "SELECT s.stud_id,s.firstname,s.lastname,s.middlename,f.program_id,f.csi_year_level,f.lab_units,f.lec_units,f.tuition_fee,f.discount_type,f.scholar_desc,f.total_amount_paid,d.LRN,d.stud_type,d.csi_academic_year,d.csi_semester,d.csi_program,d.csi_major,c.lab_Fee,c.lecture_Fee
              FROM tbl_student_info as s
              RIGHT JOIN tbl_student_fees as f ON s.stud_id = f.stud_id
              RIGHT JOIN tbl_student_school_details as d ON f.stud_id = d.stud_id
              RIGHT JOIN tbl_course_fees as c ON c.program_id = f.program_id
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
    // $data['form_137'] = $row['form_137'];
    // $data['form_138'] = $row['form_138'];
    // $data['psa_birth_cert'] = $row['psa_birth_cert'];
    // $data['good_moral'] = $row['good_moral'];
    $data['program'] = $row['csi_program'];
    $data['major'] = $row['csi_major'];
    $data['year_level'] = $row['csi_year_level'];
    
    $data['tuition_fee'] = $row['tuition_fee'];
    $data['lab_units'] = $row['lab_units'];
    $data['lec_units'] = $row['lec_units'];
    $data['total_amount_paid'] = $row['total_amount_paid'];
    $data['lab_Fee'] = $row['lab_Fee'] * $row['lab_units'];
    $data['lecture_Fee'] = $row['lecture_Fee'] * $row['lec_units'];


    $data['discount'] = $row['discount_type'];
    $data['stud_lrn'] = $row['LRN'];
    $data['stud_type'] = $row['stud_type'];
    $data['csi_school_year'] = $row['csi_academic_year'];
    $data['csi_semester'] = $row['csi_semester'];
    $data['scholar_type'] = $row['scholar_desc'];

    $slqSelectMajor = "SELECT list.course_major, fees.*
    FROM tbl_course_list as list
    INNER JOIN tbl_course_fees as fees
    ON list.program_id = fees.program_id
    WHERE list.course_major = ? 
          AND fees.semester = ? 
          AND fees.course_year_level= ?";
  $stmtSelectMajor = $con->prepare($slqSelectMajor);
  $stmtSelectMajor->bind_param('sss', $row['csi_major'],$row['csi_semester'],$row['csi_year_level']);
  $stmtSelectMajor->execute();
  $resSelectMajor = $stmtSelectMajor->get_result();
  $rowSelectMajor = $resSelectMajor->fetch_assoc();
  $countSelectMajor = $resSelectMajor->num_rows;
  $data['tuitionRaw'] = $rowSelectMajor['tuition_fee'];
  }
  echo json_encode($data);
}
if(isset($_POST['update'])){
  // Getting Program ID 
  $sqlGetProgId = "SELECT * FROM `tbl_course_list` WHERE course_major = ?";
  $stmtGetProgId = $con->prepare($sqlGetProgId);
  $stmtGetProgId->bind_param('s',$stud_major);
  $stmtGetProgId->execute();
  $resGetProgId = $stmtGetProgId->get_result();
  $rowGetProgId = $resGetProgId->fetch_assoc();
  $course_id = $rowGetProgId['program_id'];
 
  $checkAmountPaid = "SELECT total_amount_paid FROM tbl_student_fees WHERE stud_id ='$student_number'";
  $stmtCheckAmountPaid = $con->prepare($checkAmountPaid);
  $stmtCheckAmountPaid->execute();
  $resCheckAmountPaid = $stmtCheckAmountPaid->get_result();
  $rowChecAmountPaid = $resCheckAmountPaid->fetch_assoc();
  $amountPaid = $rowChecAmountPaid['total_amount_paid'];

  if($amountPaid == 0){
      if($stud_scholarship != 'N/A'){
        $slqGetScholar = "SELECT * FROM `tbl_scholarship` WHERE scholar_description = ?";
        $stmtGetScholar = $con->prepare($slqGetScholar);
        $stmtGetScholar->bind_param('s',$stud_scholarship);
        $stmtGetScholar->execute();
        $resGetScholar = $stmtGetScholar->get_result();
        $rowGetScholar = $resGetScholar->fetch_assoc();
        $scholarType = $rowGetScholar['scholar_type'];
        if($scholarType == 'Half'){
          $balance = $stud_fee/2;
          if($stud_discount != 'N/A'){
            $sqlGetDisc = "SELECT * FROM `tbl_discount` WHERE discount_type = ?";
            $stmtGetDisc = $con->prepare($sqlGetDisc);
            $stmtGetDisc->bind_param('s',$stud_discount);
            $stmtGetDisc->execute();
            $resGetDisc = $stmtGetDisc->get_result();
            $rowGetDisc  = $resGetDisc->fetch_assoc();
            $balance = (($balance * (100 - $rowGetDisc['discount_percent'])/  100));
          }
          $remarks = 'Not Fully Paid';
          $studScholarType = 'Partial Scholar';
        }else if($scholarType == 'Full'){
          $balance = 0;
          $remarks = 'Fully Paid';
          $studScholarType = 'Full Scholar';
        }
      }else{
        if($stud_discount != 'N/A'){
          $sqlGetDisc = "SELECT * FROM `tbl_discount` WHERE discount_type = ?";
            $stmtGetDisc = $con->prepare($sqlGetDisc);
            $stmtGetDisc->bind_param('s',$stud_discount);
            $stmtGetDisc->execute();
            $resGetDisc = $stmtGetDisc->get_result();
            $rowGetDisc  = $resGetDisc->fetch_assoc();
            $balance = (($stud_fee * (100 - $rowGetDisc['discount_percent'])/  100));
        }else{
          $balance = $stud_fee;
        }
        
        $remarks = 'Not Fully Paid';
          $studScholarType = 'N/A';
      }

      $fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
      $program_major = $stud_program.'-'.$stud_major;
    $sqlUpdateAll = "UPDATE `tbl_student_info` AS info 
                    INNER JOIN `tbl_student_fees` AS fee ON info.stud_id = fee.stud_id
                    INNER JOIN `tbl_student_school_details` AS det ON info.stud_id = det.stud_id
                      SET 
                      info.firstname = ?,info.lastname = ?,info.middlename = ?,fee.program_id = ?, fee.fullname = ?,fee.csi_year_level = ?,fee.tuition_fee = ?,fee.discount_type = ?,fee.scholar_desc = ?,fee.scholar_type = ?,fee.balance = ?,fee.remarks = ?,
                      det.LRN = ?,det.stud_type = ?,det.csi_academic_year = ?,det.csi_semester = ?,det.csi_program = ?,det.csi_major = ?,det.csi_year_level = ?,fee.lab_units = ?,fee.lec_units = ?,fee.assessed_fee = ?
                      WHERE info.stud_id = ?";
    $stmtUpdateAll = $con->prepare($sqlUpdateAll);
    $stmtUpdateAll->bind_param('sssssssssssssssssssssss', $stud_firstname, $stud_lastname, $stud_middlename,$course_id,$fullname,$stud_year_level,$stud_fee,$stud_discount,$stud_scholarship,$studScholarType,$balance,$remarks,$stud_lrn,$stud_status,$stud_school_year,$stud_semester,$stud_program,$stud_major,$stud_year_level,$stud_labUnits,$stud_lecUnits,$assessed_fee,$student_number);

    if($stmtUpdateAll->execute()) {

      
      $act = 'Update student details of '. $student_number . ' - ' . $fullname;
      audit($empId,'Registrar',$empName,$act);
      $response['status'] = 'success';
      $response['message'] = 'Successfully Updated';
    } else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to update';
      
    }
  }else{
    $fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
    $sqlUpdate = "UPDATE `tbl_student_info` AS info 
            INNER JOIN `tbl_student_fees` AS fee ON info.stud_id = fee.stud_id
            INNER JOIN `tbl_student_school_details` AS det ON info.stud_id = det.stud_id
              SET 
              info.firstname = ?,info.lastname = ?,info.middlename = ?,
              det.LRN = ?,det.stud_type = ?,fee.fullname = ?
              WHERE info.stud_id = ?";
        $stmtUpdate = $con->prepare($sqlUpdate);
        $stmtUpdate->bind_param('sssssss', $stud_firstname, $stud_lastname, $stud_middlename,$stud_lrn,$stud_status,$fullname,$student_number);

        if($stmtUpdate->execute()) {
        $act = 'Update student details of '. $student_number . ' - ' . $fullname;
        audit($empId,'Registrar',$empName,$act);
        $response['status'] = 'success';
        $response['message'] = 'Successfully Updated';
        } else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to update';
        }
        // $response ='hello';
  }

  echo json_encode($response);
}
if(isset($_POST['delete'])){
  $id = $_POST['id'];

  $sqlDel = "DELETE s.*, r.* ,fee.*,d.*
              FROM tbl_student_info AS s 
              LEFT JOIN tbl_student_requirements AS r ON s.stud_id = r.stud_id 
              LEFT JOIN tbl_student_fees AS fee ON s.stud_id = fee.stud_id 
              LEFT JOIN tbl_student_school_details AS d ON s.stud_id = d.stud_id 
              WHERE s.stud_id = ?";
  $stmtDel = $con->prepare($sqlDel);
  $stmtDel->bind_param('s', $id );
  if( $stmtDel->execute()){
    $response['status'] = 'success';
    $response['message'] = 'Successfully Deleted';
  }else{
    $response['status'] = 'error';
    $response['message'] = 'Fail to add';
  }
  echo json_encode($response);
}
?>
<?php
  if(isset($_GET['viewStudData'])){
  $query = $_GET['query'];

  $sql ="SELECT s.stud_id, s.firstname, s.lastname,fees.lec_units,fees.lab_units,fees.assessed_fee,fees.tuition_fee,fees.program_id
        FROM tbl_student_info as s
        LEFT JOIN `tbl_student_fees` as fees ON s.stud_id = fees.stud_id
        WHERE s.stud_id LIKE CONCAT('%',?,'%') OR s.firstname LIKE CONCAT('%',?,'%') 
      ";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('ss',$query,$query);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;

?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){
  $program_id = $data['program_id'];
  $sqlProgId = "SELECT * FROM `tbl_course_fees` WHERE program_id = ?";
  $stmtProgId = $con->prepare($sqlProgId);
  $stmtProgId->bind_param('s',$program_id);
  $stmtProgId->execute();
  $resProgId = $stmtProgId->get_result();
  $rowProgId = $resProgId->fetch_assoc();
  $LecFee = $rowProgId['lecture_Fee'] * $data['lec_units'];
  $labFee = $rowProgId['lab_Fee'] * $data['lab_units'];
  ?>
  <tr>
    <td><?=$data['stud_id'];?></td>
    <td><?=$data['firstname'];?></td>
    <td><?=$data['lastname'];?></td>
    <td><?=$LecFee?></td>
    <td><?=$labFee?></td>
    <td><a href="#" id="viewAssessdFee" data-id="<?=$program_id?>"><?=$data['assessed_fee'];?></a></td>
    <td><?=$data['tuition_fee'];?></td>
    
    <td>
      <a href="#" class="btn btn-success "id="edit" data-id="<?=$data['stud_id'];?>">Edit</a>
    </td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }
}?>
<?php
  if(isset($_GET['viewStudDataFiltered'])){
  $byProgram = $_GET['byProgram'];
  // $byMajor = $_GET['byMajor'];
  $byMajor = $_GET['byMajor'] ?? '%';
  $sql ="SELECT s.stud_id, s.firstname, s.lastname,det.csi_program,det.csi_major
          FROM tbl_student_info as s
          LEFT JOIN tbl_student_school_details as det ON det.stud_id = s.stud_id
          WHERE det.csi_program LIKE CONCAT('%',?,'%') AND det.csi_major LIKE CONCAT('%',?,'%')";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('ss',$byProgram,$byMajor);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;

?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){?>
  <tr>
    <td><?=$data['stud_id'];?></td>
    <td><?=$data['firstname'];?></td>
    <td><?=$data['lastname'];?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
      <a href="#" class="btn btn-success "id="edit" data-id="<?=$data['stud_id'];?>">Edit</a>
    </td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }
}?>