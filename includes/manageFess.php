<?php
    include_once '../connection/Config.php';
    header('Content-type: application/json');
    session_start();
    
    $data = array();
    $response = array();
  if(isset($_GET['getProgramData'])){
    $id = $_GET['id'];
    $sqlGetProgData = " SELECT * FROM `tbl_course_fees` WHERE program_id = ?";
    $stmtGetProgData = $con->prepare($sqlGetProgData);
    $stmtGetProgData->bind_param('s', $id);
    $stmtGetProgData->execute();
    $resGetProgData = $stmtGetProgData->get_result();
    $rowGetProgData = $resGetProgData->fetch_assoc();

    $data['lecture_Fee'] = $rowGetProgData['lecture_Fee'];
    $data['lab_Fee'] = $rowGetProgData['lab_Fee'];
    $data['library_Fee'] = $rowGetProgData['library_Fee'];
    $data['guidance_Fee'] = $rowGetProgData['guidance_Fee'];
    $data['athletic_Fee'] = $rowGetProgData['athletic_Fee'];
    $data['computer_Fee'] = $rowGetProgData['computer_Fee'];
    $data['registration_Fee'] = $rowGetProgData['registration_Fee'];
    echo json_encode($data);
  }
  if(isset($_GET['checkProgID'])){
    $progId = $_GET['progId'];
    $program = $_GET['program'];
    $major = $_GET['major'];
    $year = $_GET['year'];
    $sem = $_GET['sem'];
    $sqlCheckProgId = " SELECT * FROM `tbl_course_list` WHERE program_id = ?";
    $stmtCheckProgId = $con->prepare($sqlCheckProgId);
    $stmtCheckProgId->bind_param('s', $progId);
    $stmtCheckProgId->execute();
    $resCheckProgId = $stmtCheckProgId->get_result();
    if($resCheckProgId->num_rows > 0){
      $response['status'] = 'error';
      $response['message'] = 'Program ID Already Exist';
    }else{
      
      // echo json_encode($response);
    }
    $sqlCheck = "SELECT list.course_program,list.course_major,fees.course_year_level,fees.semester
                  FROM tbl_course_list as list
                  INNER JOIN tbl_course_fees as fees ON list.program_id = fees.program_id
                  WHERE list.course_program = '$program' AND list.course_major = '$major' AND fees.course_year_level = '$year' AND fees.semester = '$sem'";
      $stmtCheck = $con->prepare($sqlCheck);
      // $stmtCheck->bind_param('ssss', $program,$major,$year,$sem);
      $stmtCheck->execute();
      $resCheck = $stmtCheck->get_result();
      if($resCheck->num_rows > 0){
        $response['status'] = 'error';
        $response['message'] = 'Program Program,Major,Year Level,and Semester';
      }else{
        // $response['message'] = '';
      }
    echo json_encode($response);
  }
  if(isset($_GET['checkProgToSem'])){
    
    
  }  
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

    $lectureFee = $_POST['lectureFee'];
    $labFee = $_POST['labFee'];
    $libraryFee = $_POST['libraryFee'];
    $guidanceFee = $_POST['guidanceFee'];
    $athleticFee = $_POST['athleticFee'];
    $computerFee = $_POST['computerFee'];
    $registrationFee = $_POST['registrationFee'];

    $fee = $_POST['fee'];

    $sqlNewProgram = "INSERT INTO `tbl_course_list`(`program_id`, `course_program`, `course_major`, `course_duration`) VALUES (?,?,?,?)";
    $stmtNewProgram = $con->prepare($sqlNewProgram);
    $stmtNewProgram->bind_param('ssss',$programId,$program,$major,$duration);

    $sqlNewProgram2 = "INSERT INTO `tbl_course_fees`(`program_id`, `semester`, `course_year_level`, `lecture_Fee`, `lab_Fee`, `library_Fee`, `guidance_Fee`, `athletic_Fee`, `computer_Fee`, `registration_Fee`, `tuition_fee`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmtNewProgram2 = $con->prepare($sqlNewProgram2);
    $stmtNewProgram2->bind_param('sssssssssss',$programId,$semester,$yearLevel,$lectureFee,$labFee,$libraryFee,$guidanceFee,$athleticFee,$computerFee,$registrationFee,$fee);
  

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

    $sqlCheckDesc = "SELECT * FROM `tbl_scholarship`  WHERE scholar_description = ? ";
    $stmtCheckDesc = $con->prepare($sqlCheckDesc);
    $stmtCheckDesc->bind_param('s', $scholarDesc);
    $stmtCheckDesc->execute();
    $resCheckDesc = $stmtCheckDesc->get_result();
    $row = $resCheckDesc->fetch_assoc();

    if($resCheckDesc->num_rows > 0){
      $response['status'] = 'error';
      $response['message'] = 'This Scholarship is already exist';
      $response['scholarType'] = $row['scholar_type'];
      echo json_encode($response);
    }else{
      $sqlNewScholar = "INSERT INTO `tbl_scholarship`(`scholar_type`, `scholar_description`) VALUES (?,?)";
      $stmtNewScholar = $con->prepare($sqlNewScholar);
      $stmtNewScholar->bind_param('ss', $scholarType,$scholarDesc);
      if($stmtNewScholar->execute()){
        $response['status'] = 'success';
        $response['message'] = 'Successfully Added New Scholarship';
      }else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to Add New Scholarship!';
      }
      echo json_encode($response);
    }
  }
  if(isset($_POST['addNewDiscount'])){
    $discountDesc = $_POST['discountDesc'];
    $discountPer = $_POST['discountPer'];
    $sqlCheckDesc = "SELECT * FROM `tbl_discount` WHERE  discount_type LIKE ? ";
    $stmtCheckDesc = $con->prepare($sqlCheckDesc);
    $stmtCheckDesc->bind_param('s', $discountDesc);
    $stmtCheckDesc->execute();
    $resCheckDesc = $stmtCheckDesc->get_result();
    $rowCheckDesc = $resCheckDesc->fetch_assoc();
    if($resCheckDesc->num_rows > 0){

      $response['status'] = 'error';
      $response['message'] = 'This Discount is already exist';
      $response['percent'] = $rowCheckDesc['discount_percent'];
      echo json_encode($response);
    }else{
      $sqlnewDiscount = "INSERT INTO `tbl_discount`(`discount_type`, `discount_percent`) VALUES (?,?)";
      $stmtNewDiscount = $con->prepare($sqlnewDiscount);
      $stmtNewDiscount->bind_param('ss', $discountDesc,$discountPer);
      if($stmtNewDiscount->execute()){
        $response['status'] = 'success';
        $response['message'] = 'Successfully Added New Discount';
      }else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to Add New Discount!';
      }
      echo json_encode($response);
    } 
  }
  if(isset($_POST['udpateScholarship'])){
    $scholarDesc = $_POST['scholarDesc'];
    $scholarType = $_POST['scholarType'];

    $slqUpdateScholar = "UPDATE `tbl_scholarship` SET `scholar_type`= ? 
                        WHERE scholar_description = ?";
    $stmtUpdateScholar = $con->prepare($slqUpdateScholar);
    $stmtUpdateScholar->bind_param('ss',$scholarType ,$scholarDesc);
    if($stmtUpdateScholar->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Scholarship updated Successfully';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Scholarship udpate failed';
    }
    echo json_encode($response);
  }
  if(isset($_POST['updateDiscount'])){
    $discountDesc = $_POST['discountDesc'];
    $discountPer = $_POST['discountPer'];

    $slqUpdate = "UPDATE `tbl_discount` SET `discount_percent`= ? WHERE discount_type = ?";
    $stmtUpdate = $con->prepare($slqUpdate);
    $stmtUpdate->bind_param('ss',$discountPer ,$discountDesc);
    if($stmtUpdate->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Discount updated Successfully';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Discount udpate failed';
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

    $lectureFee = $_POST['lectureFee'];
    $labFee = $_POST['labFee'];
    $libraryFee = $_POST['libraryFee'];
    $guidanceFee = $_POST['guidanceFee'];
    $athleticFee = $_POST['athleticFee'];
    $computerFee = $_POST['computerFee'];
    $registrationFee = $_POST['registrationFee'];

    $fee = $_POST['fee'];
    $sqlProgram = "UPDATE `tbl_course_list` SET `course_program`= ?,`course_major`= ?,`course_duration`= ? WHERE program_id = ?";
    $stmtProgram = $con->prepare($sqlProgram);
    $stmtProgram->bind_param('ssss',$program,$major,$duration,$programId);

    $sqlProgram2 = "UPDATE `tbl_course_fees` SET `semester`= ?,`course_year_level`= ?,`lecture_Fee`= ?,`lab_Fee`= ? ,`library_Fee`= ? ,`guidance_Fee`= ? ,`athletic_Fee`= ? ,`computer_Fee`= ?,`registration_Fee`= ? ,`tuition_fee`= ? WHERE  program_id = ?";
    $stmtProgram2 = $con->prepare($sqlProgram2);
    $stmtProgram2->bind_param('sssssssssss',$semester,$yearLevel,$lectureFee,$labFee,$libraryFee,$guidanceFee,$athleticFee,$computerFee,$registrationFee,$fee,$programId);
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
  $sql ="SELECT list.program_id,list.course_program,list.course_major,fees.course_year_level,list.course_duration,fees.semester,fees.lecture_Fee,fees.lab_Fee,fees.tuition_fee
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
    <td data-target="lab_Fee"><?=$data['lab_Fee'];?></td>
    <td data-target="lecture_Fee"><?=$data['lecture_Fee'];?></td>
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