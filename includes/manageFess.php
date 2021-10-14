<?php
    include_once '../connection/Config.php';
    header('Content-type: application/json');
    session_start();
    $response = array();
  if(isset($_POST['addNewSy'])){
  $academic_year = $_POST['SYstart'].'-'.$_POST['SYend'];
  $sqlNewSY = " INSERT INTO `tbl_academic_year`(`academic_year`) VALUES (?)";
  $stmtNewSY = $con->prepare($sqlNewSY);
  $stmtNewSY->bind_param('s', $academic_year);
  if($stmtNewSY->execute()){
    $response['status'] = 'success';
    $response['message'] = 'Successfully Added New School Year';
  }else{
    $response['status'] = 'error';
    $response['message'] = 'Failed to Add New School Year!';
  }
    echo json_encode($response);
  }
  if(isset($_POST['addNewProgram'])){
    $programId = $_POST['programId'];
    $program = $_POST['program'];
    $major = $_POST['major'];
    $duration = $_POST['duration'];
    $yearLevel = $_POST['yearLevel'];
    $semester = $_POST['semester'];
    $fee = $_POST['fee'];

    $sqlNewProgram = "INSERT INTO `tbl_course_list`(`program_id`, `course_program`, `course_major`, `course_duration`) VALUES (?,?,?,?)";
    $stmtNewProgram = $con->prepare($sqlNewProgram);
    $stmtNewProgram->bind_param('ssss',$programId,$program,$major,$duration);

    $sqlNewProgram2 = "INSERT INTO `tbl_course_fees`(`program_id`, `semester`, `course_year_level`, `tuition_fee`) VALUES (?,?,?,?)";
    $stmtNewProgram2 = $con->prepare($sqlNewProgram2);
    $stmtNewProgram2->bind_param('ssss',$programId,$semester,$yearLevel,$fee);

    if($stmtNewProgram->execute() && $stmtNewProgram2->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully Added New Program';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Add New Program';
    }
    echo json_encode($response);
  }
  if(isset($_POST['addNewScholarship'])){
    $scholarDesc = $_POST['scholarDesc'];
    $scholarType = $_POST['scholarType'];
    $sqlNewScholar = "INSERT INTO `tbl_scholarship`(`scholar_type`, `scholar_description`) VALUES (?,?)";
    $stmtNewScholar = $con->prepare($sqlNewScholar);
    $stmtNewScholar->bind_param('ss', $scholarType,$scholarDesc);
    if($stmtNewScholar->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully Added New School Year';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Add New School Year!';
    }
    echo json_encode($response);
  }
  if(isset($_POST['addNewDiscount'])){
    $discountDesc = $_POST['discountDesc'];
    $discountPer = $_POST['discountPer'];
    $sqlnewDiscount = "INSERT INTO `tbl_discount`(`discount_type`, `discount_percent`) VALUES (?,?)";
    $stmtNewDiscount = $con->prepare($sqlnewDiscount);
    $stmtNewDiscount->bind_param('ss', $discountDesc,$discountPer);
    if($stmtNewDiscount->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully Added New School Year';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Add New School Year!';
    }
    echo json_encode($response);
  }
  if(isset($_POST['updateProgram'])){
    $programId = $_POST['programId'];
    $program = $_POST['program'];
    $major = $_POST['major'];
    $duration = $_POST['duration'];
    $yearLevel = $_POST['yearLevel'];
    $semester = $_POST['semester'];
    $fee = $_POST['fee'];
    $sqlProgram = "UPDATE `tbl_course_list` SET `course_program`= ?,`course_major`= ?,`course_duration`= ? WHERE program_id = ?";
    $stmtProgram = $con->prepare($sqlProgram);
    $stmtProgram->bind_param('ssss',$program,$major,$duration,$programId);

    $sqlProgram2 = "UPDATE `tbl_course_fees` SET `semester`= ?,`course_year_level`= ?,`tuition_fee`= ? WHERE program_id = ?";
    $stmtProgram2 = $con->prepare($sqlProgram2);
    $stmtProgram2->bind_param('ssss',$semester,$yearLevel,$fee,$programId);
    if($stmtProgram->execute() && $stmtProgram2->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully Update Program';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Update Program';
    }
    echo json_encode($response);
  }
?>
<?php

  if(isset($_POST['showProgram'])){
  $query = $_POST['query'];
  $sql ="SELECT list.program_id,list.course_program,list.course_major,fees.course_year_level,list.course_duration,fees.semester,fees.tuition_fee
        FROM tbl_course_list AS list
        INNER JOIN tbl_course_fees as fees 
        ON list.program_id = fees.program_id
        WHERE list.course_program LIKE ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('s',$query);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;

?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){?>
  <tr id="<?=$data['program_id'];?>">
  <!-- Data-Target Will be used to edit -->
    <td ><?=$data['program_id'];?></td>
    <td data-target="course_program"><?=$data['course_program'];?></td>
    <td data-target="course_major"><?=$data['course_major'];?></td>
    <td data-target="course_year_level"><?=$data['course_year_level'];?></td>
    <td data-target="course_duration"><?=$data['course_duration'];?></td>
    <td  data-target="semester"><?=$data['semester'];?></td>
    <td  data-target="tuition_fee"><?=$data['tuition_fee'];?></td>
    <td>
      <a href="#" class="btn btn-success "id="editProgram" data-id="<?=$data['program_id'];?>">Edit</a>
    </td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php } }?>