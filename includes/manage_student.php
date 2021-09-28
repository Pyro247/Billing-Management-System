<?php
 $conn = mysqli_connect("localhost", "root", "", "web-based-billing-management-system");       
 if($conn === false){
     die("ERROR: Could not connect. " 
         . mysqli_connect_error());
 }
 
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
  `birthdate`, `age`, `address`, `religion`, `citizenship`, `civil_status`, `college`, `major`, `year_section`, `email`, `contact_number`) 
 VALUES ('$student_number','$stud_firstname','$stud_lastname','$stud_middlename','$stud_sex','$stud_birthdate','$stud_age','$stud_address','$stud_religion',
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

  ?>