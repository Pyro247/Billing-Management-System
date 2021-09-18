<?php

include_once '../connection/Config.php';

session_start();


if (isset($_POST['agreePolicy'])){
   // Part 1
  
   $userID = $_POST['userID']; 
   $firstname = $_POST['fname']; 
   $midInitial = $_POST['middlename'];
   $lastname = $_POST['lastname'];
   $citizenship = $_POST['citizen'];
   $civilStatus = $_POST['civil'];
   $phoneNumber = $_POST['phone'];
   $sex = $_POST['sex'];
   $birthdate = $_POST['birthdate'];
   $age = $_POST['age'];

  // Part 2
   $prevCollege = $_POST['prevCollege'];
   $prevCollegeName = $_POST['prevCollegeName'];
   $prevCollegeAddress = $_POST['prevCollegeAdd'];
   $prevZipCode = $_POST['prevZipCode'];
   $prevSchoolYr = $_POST['prevSchoolYr'];
   $prevSem = $_POST['prevSem'];
   $prevScholar = $_POST['prevScholar'];
   $prevCourse = $_POST['prevCourse'];
   $prevMajor = $_POST['prevMajor'];
   $prevYear = $_POST['prevYear'];

   $currSchoolYr = $_POST['currSchoolYr'];
   $currSem = $_POST['currSem'];
   $currScholar = $_POST['currScholar'];
   $currCourse = $_POST['currCourse'];
   $currMajor = $_POST['currMajor'];
   $currYear = $_POST['currYear'];
   $currYear = $_POST['currYear'];

  // Part 3
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirm_pass = $_POST['confirm_pass'];

 if (empty($sex)){
  $sex = "N/A";
  
 if(empty($prevCollege)){
  $prevCollege = "N/A";
 }
 }

 $sql_studReg = "INSERT INTO `tbl_student_info`(`stud_id`, `stud_firstname`, `stud_lastname`, `stud_midInitial`, `stud_citizenship`, `stud_civilStatus`, `stud_phoneNo`, `stud_sex`, `stud_birthdate`, `stud_age`, `prev_collegeType`, `prev_collegeName`, `prev_collegeAddress`, `prev_zipCode`, `prev_schoolYear`, `prev_semester`, `prev_scholarship`, `prev_course`, `prev_major`, `prev_year`, `curr_schoolYear`, `curr_semester`, `curr_scholarship`, `curr_course`, `curr_major`, `curr_year`) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
 $stmt_stduReg = $con->prepare($sql_studReg);
 $stmt_stduReg->bind_param('ssssssssssssssssssssssssss', $userID, $firstname, $lastname, $midInitial, $citizenship, $civilStatus, $phoneNumber, $sex, $birthdate, $age, $prevCollege, $prevCollegeName, $prevCollegeAddress, $prevZipCode, $prevSchoolYr, $prevSem, $prevScholar, $prevCourse, $prevMajor, $prevYear, $currScholar, $currSem, $currScholar, $currCourse, $currMajor, $currYear);


if ( $stmt_stduReg->execute()) {
  $fullname = $firstname.' '.$lastname;
  $role = "Student";
  $sql_studAcc = "INSERT INTO `tbl_accounts`(`user_id`, `fullname`, `email`, `password`, `role`) VALUES (?,?,?,?,?)";
  $stmt_studAcc = $con->prepare($sql_studAcc);
  $stmt_studAcc->bind_param('sssss', $userID,$fullname, $email, $password, $role);
  
  if($stmt_studAcc->execute()){
    echo 'Registred Sucess';
  
  }else{
    echo 'Account Db error';
  }
}else{
  echo 'Student Info Error';
}


}else{
  // echo "
  //       <script>
  //       
  //       </script>
  //     ";
}

// ERROR HANDLINHG SWEET ALERT

// NOTIFY THE USER IF HE/SHE IS REGISTERED SUCCESSFULLY


?>