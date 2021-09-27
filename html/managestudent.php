<?php
 $conn = mysqli_connect("localhost", "root", "", "web-based-billing-management-system");       
 if($conn === false){
     die("ERROR: Could not connect. " 
         . mysqli_connect_error());
 }
 
  $student_number =$_POST['student_number'];
  $firstname =$_POST['firstname'];
  $lastname =$_POST['lastname'];
  $middlename =$_POST['middlename'];
  $sex =$_POST['sex'];
  $birthdate =$_POST['birthdate'];
  $age =$_POST['age'];
  $address =$_POST['address'];
  $religion =$_POST['religion'];
  $citizenship =$_POST['citizenship'];
  $civil_status =$_POST['civil_status'];
  $college =$_POST['college'];
  $major =$_POST['major'];
  $year_section =$_POST['year_section'];
  $email =$_POST['email'];
  $contact_number =$_POST['contact_number'];
  $form_137 =$_POST['form137'];
  $form_138 =$_POST['form138'];
  $psa_birth_cert =$_POST['psa'];
  $good_moral =$_POST['good_moral'];

if(isset($_POST['add'] , $_POST['form137'] , $_POST['form138'] , $_POST['psa'] , $_POST['good_moral'] )){
  $sql = "INSERT INTO `tbl_student_info`(`student_number`, `firstname`, `lastname`, `middlename`, `sex`,
  `birthdate`, `age`, `address`, `religion`, `citizenship`, `civil_status`, `college`, `major`, `year_section`, `email`, `contact_number`) 
 VALUES ('$student_number','$firstname','$lastname','$middlename','$sex','$birthdate','$age','$address','$religion',
 '$citizenship','$civil_status','$college','$major','$year_section','$email','$contact_number')";
 
 $sql1 = "INSERT INTO `tbl_student_requirements`(`student_number`, `form_137`, `form_138`, `psa_birth_cert`, `good_moral`) 
 VALUES ('$student_number','$form_137','$form_138','$psa_birth_cert','$good_moral')";
 
 
} else if(isset($_POST['update'])){
  $sql = "UPDATE `tbl_student_info` SET `student_number`='$student_number',`firstname`='$firstname',
  `lastname`='$lastname',`middlename`='$middlename',`sex`='$sex',`birthdate`='$birthdate',`age`='$age',`address`='$address',
  `religion`='$religion',`citizenship`='$citizenship',`civil_status`='$civil_status',`college`='$college',`major`='$major',
  `year_section`='$year_section',`email`='$email',`contact_number`='$contact_number' WHERE `student_number` = '$student_number'";

  $sql1 = "UPDATE `tbl_student_requirements` SET `student_number`='$student_number',`form_137`='$form_137',`form_138`='$form_138',
  `psa_birth_cert`='$psa_birth_cert',`good_moral`='$good_moral' WHERE `student_number` = '$student_number'";
    

} else if(isset($_POST['delete'])){
  $sql = "DELETE FROM `tbl_student_info` WHERE `student_number`= '$student_number'";

  $sql1 = "DELETE FROM `tbl_student_info` WHERE `student_number`= '$student_number'";
}


        if(mysqli_query($conn, $sql)){
          header('Location: registrar_access.php'); 
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        if(mysqli_query($conn, $sql1)){
          header('Location: registrar_access.php'); 
        } else{
            echo "ERROR: Hush! Sorry $sql1. "
                . mysqli_error($conn);
        } mysqli_close($conn);

  ?>