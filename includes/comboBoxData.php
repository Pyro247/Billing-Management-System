<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $data = array();

  if(isset( $_POST['programOnChange'])){
    $program = $_POST['program'];
    $sqlSelectProg = "SELECT * FROM `tbl_course_list` WHERE course_program = ? ";
    $stmtSelectProg = $con->prepare($sqlSelectProg);
    $stmtSelectProg->bind_param('s', $program);
    $stmtSelectProg->execute();
    $resSelectPorg = $stmtSelectProg->get_result();
    $countSelectProg = $resSelectPorg->num_rows;
    if($countSelectProg > 0){
      while( $rowSelectProg = $resSelectPorg->fetch_assoc() ){
        $major = $rowSelectProg['course_major'];
  
        $data[] = array("major" => $major);
      }
    }
    echo json_encode($data);
  }
  if(isset( $_POST['majorOnChange'])){
    $major = $_POST['major'];
    $sem = $_POST['sem'];
    $yearLevel = $_POST['yearLevel'];

    $slqSelectMajor = "SELECT list.course_major, fees.*
                        FROM tbl_course_list as list
                        INNER JOIN tbl_course_fees as fees
                        ON list.program_id = fees.program_id
                        WHERE list.course_major = ? 
                              AND fees.semester = ? 
                              AND fees.course_year_level= ?";
    $stmtSelectMajor = $con->prepare($slqSelectMajor);
    $stmtSelectMajor->bind_param('sss', $major,$sem,$yearLevel);
    $stmtSelectMajor->execute();
    $resSelectMajor = $stmtSelectMajor->get_result();
    $rowSelectMajor = $resSelectMajor->fetch_assoc();
    $countSelectMajor = $resSelectMajor->num_rows;
    if($countSelectMajor > 0){
      $tution = $rowSelectMajor['tuition_fee'];
    }else{
      $tution = '';
    }
    echo json_encode($tution);
  }
?>
