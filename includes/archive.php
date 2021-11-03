<?php
  include_once '../connection/Config.php';


if(isset($_POST['archive_btn'])){
    $condition = $_POST['condition'];
    $date = date("Y-m-d");
    $user_id = $_POST['studId'];

    $sqlArchive = "INSERT INTO tbl_archive (reg_no, user_id, firstname, lastname, middlename, sex, address, email, contact_number, role)
    SELECT s.reg_no, s.stud_id, s.firstname, s.lastname, s.middlename, s.sex, s.address, s.email, s.contact_number, a.role
    FROM tbl_student_info as s
    INNER JOIN tbl_accounts as a
    ON s.stud_id = a.user_id
    WHERE s.stud_id = ?;

    DELETE FROM tbl_student_fees
    WHERE stud_id = ?;

    DELETE FROM tbl_student_info
    WHERE stud_id = ?;

    DELETE FROM tbl_student_requirements
    WHERE stud_id = ?;

    DELETE FROM tbl_student_school_details
    WHERE stud_id = ?;";
    $stmtArchive = $con->prepare($sqlArchive);
    $stmtArchive->bind_param('sss', $user_id,$condition,$date);
    $stmtArchive->execute();
    $resArchive = $stmtArchive->get_result();
  }
  
  ?>