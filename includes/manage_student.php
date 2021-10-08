
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
    $empId = $_POST['empId'];
    $empName = $_POST['empName'];
    
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
    $req_form_137 = '';
  }else{
    $req_form_137 = date("m.d.y");
  }
  if(!isset($_POST['req_form138'])){
    $req_form_138 = '';
  }else{
    $req_form_138 = date("m.d.y");
  }
  if(!isset($_POST['req_psa'])){
    $req_psa_birth_cert = '';
  }else{
    $req_psa_birth_cert = date("m.d.y");
  }
  if(!isset($_POST['req_good_moral'])){
    $req_good_moral = '';
  }else{
    $req_good_moral = date("m.d.y");
  }

  if(isset($_POST['stud_save'])){
    // Studen Info
    $sqlStudInfo = "INSERT INTO `tbl_student_info`(`stud_id`, `firstname`, `lastname`, `middlename`,`registrar_id`, `registrar_name`) VALUES (?,?,?,?,?,?)";
    $stmtStudInfo = $con->prepare($sqlStudInfo);
    $stmtStudInfo->bind_param('ssssss',$student_number,$stud_firstname,$stud_lastname,$stud_middlename,$empId,$empName);
    // Student Fee
    // Temprary Variable it will update if dorpdown box a values like course id,discount
    $course_id = 0;
    $total_amount_paid = 0;
    $balance = $stud_fee;
    $Remarks = '';
    $fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
    $program_major = $stud_program.'-'.$stud_major;
    $sqlStudFee = "INSERT INTO `tbl_student_fees`(`program_id`, `stud_id`, `fullname`, `csi_year_level`, `scholar_type`, `discount_percent`, `tuition_fee`, `total_amount_paid`, `balance`, `remarks`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmtStudFee = $con->prepare($sqlStudFee);
    $stmtStudFee->bind_param('ssssssssss',$course_id,$student_number,$fullname,$stud_year_level,$stud_scholarship,$stud_discount,$stud_fee,$total_amount_paid,$balance,$Remarks);
    // Student Requirements
    $slqRequirements = "INSERT INTO `tbl_student_requirements`(`stud_id`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) VALUES (?,?,?,?,?)";
    $stmtRequirements = $con->prepare($slqRequirements);
    $stmtRequirements->bind_param('sssss',$student_number,$req_form_137,$req_form_138,$req_psa_birth_cert,$req_good_moral);
    // School Details 
    $sqlDetials = "INSERT INTO `tbl_student_school_details`(`stud_id`, `csi_program`, `csi_major`, `csi_year_level`) VALUES (?,?,?,?)";
      $stmtDetails = $con->prepare($sqlDetials);
      $stmtDetails->bind_param('ssss',$student_number,$stud_program,$stud_major,$stud_year_level);
      // It will be available after scholar has desc 
      // $sqlScholar = "INSERT INTO `tbl_student_scholarship`(`stud_id`, `scholar_description`, `scholar_type`) VALUES (?,?,?)";
      // $stmtScholar = $con->prepare($sqlScholar);
      // $stmtScholar->bind_param('sss',$student_number,$scholarDisc,$stud_scholarship);
      
  if($stmtStudInfo->execute() && $stmtRequirements->execute()  && $stmtStudFee->execute() &&$stmtDetails->execute()) {
    $response['status'] = 'success';
    $response['message'] = 'Successfully saved';
  } else{
    $response['status'] = 'error';
    $response['message'] = 'Failed to save!';
  }


echo  json_encode($response);
}
if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $data = array();
  $slqEdit = "SELECT s.stud_id,s.firstname,s.lastname,s.middlename,r.form_137,r.form_138,r.psa_birth_cert, r.good_moral, f.program_id,f.csi_year_level,f.tuition_fee,f.discount_percent,f.scholar_type,d.LRN,d.stud_type,d.csi_academic_year,d.csi_semester,d.csi_program,d.csi_major
              FROM tbl_student_info as s
              RIGHT JOIN tbl_student_requirements as r ON s.stud_id = r.stud_id
              RIGHT JOIN tbl_student_fees as f ON r.stud_id = f.stud_id
              RIGHT JOIN tbl_student_school_details as d ON f.stud_id = d.stud_id
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
    $data['form_137'] = $row['form_137'];
    $data['form_138'] = $row['form_138'];
    $data['psa_birth_cert'] = $row['psa_birth_cert'];
    $data['good_moral'] = $row['good_moral'];
    $data['program'] = $row['csi_program'];
    $data['major'] = $row['csi_major'];
    $data['year_level'] = $row['csi_year_level'];
    
    $data['tuition_fee'] = $row['tuition_fee'];
    $data['discount'] = $row['discount_percent'];
    $data['stud_lrn'] = $row['LRN'];
    $data['stud_type'] = $row['stud_type'];
    $data['csi_school_year'] = $row['csi_academic_year'];
    $data['csi_semester'] = $row['csi_semester'];
    $data['scholar_type'] = $row['scholar_type'];
  }
  echo json_encode($data);
}
if(isset($_POST['update'])){
  $fullname = $stud_firstname.' '.$stud_middlename.' '.$stud_lastname;
  $program_major = $stud_program.'-'.$stud_major;
$sqlUpdateAll = "UPDATE `tbl_student_info` AS info 
                INNER JOIN `tbl_student_requirements` AS req ON info.stud_id = req.stud_id
                INNER JOIN `tbl_student_fees` AS fee ON info.stud_id = fee.stud_id
                INNER JOIN `tbl_student_school_details` AS det ON info.stud_id = det.stud_id
                  SET 
                  info.firstname = ?,info.lastname = ?,info.middlename = ?,
                  req.form_137 = ?,req.form_138 = ?,req.psa_birth_cert = ?,req.good_moral= ?,
                  fee.fullname = ?,fee.csi_year_level = ?,fee.tuition_fee = ?,fee.discount_percent = ?,fee.scholar_type = ?,
                  det.LRN = ?,det.stud_type = ?,det.csi_academic_year = ?,det.csi_semester = ?,det.csi_program = ?,det.csi_major = ?,det.csi_year_level = ?
                  WHERE info.stud_id = ?";
$stmtUpdateAll = $con->prepare($sqlUpdateAll);
$stmtUpdateAll->bind_param('ssssssssssssssssssss', $stud_firstname, $stud_lastname, $stud_middlename,$req_form_137,$req_form_138,$req_psa_birth_cert,$req_good_moral,$fullname,$stud_year_level,$stud_fee,$stud_discount,$stud_scholarship,$stud_lrn,$stud_status,$stud_school_year,$stud_semester,$stud_program,$stud_major,$stud_year_level,$student_number);

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
    $response['message'] = 'Failed Added';
  }
  echo json_encode($response);
}
?>