<?php
  include_once '../connection/Config.php';

  if (isset($_POST['checkID'])) {

      $userId = $_POST['userId'];

       // Check student ID if exist in database 
      $sql_checkStudID = "SELECT * FROM tbl_student_registration WHERE stud_id = ?";
      $stmt_checkStudID = $con->prepare($sql_checkStudID);
      $stmt_checkStudID->bind_param('s', $userId);
      $stmt_checkStudID->execute();
      $result_checkStudID = $stmt_checkStudID->get_result();
      $row_checkStudID = $result_checkStudID->fetch_assoc();
      $count_checkStudID = $result_checkStudID->num_rows;

      if ( $count_checkStudID === 1 ){
        header('Location: ./formRegistration.php');
      } else {
        echo "
              <script>
              Swal.fire({
                title: 'ID not Found!',
                text: 'Please check your ID',
                icon: 'info',
                confirmButtonText: 'OK'
              });
              </script>
        ";
      }

      // Check employee ID if exist in database
      $sql_checkEmpID = "SELECT * FROM tbl_employee_registration WHERE employee_id = ?";
      $stmt_checkEmpID = $con->prepare($sql_checkEmpID);
      $stmt_checkEmpID->bind_param('s', $userId);
      $stmt_checkEmpID->execute();
      $result_checkEmpID = $stmt_checkEmpID->get_result();
      $row_checkEmpID = $result_checkEmpID->fetch_assoc();
      $count_checkEmpID = $result_checkEmpID->num_rows;

      if ( $count_checkEmpID === 1 ){
        header('Location: ./formRegistration.php');
      } else {
        echo "
              <script>
              Swal.fire({
                title: 'ID not Found!',
                text: 'Please check your ID',
                icon: 'info',
                confirmButtonText: 'OK'
              });
              </script>
        ";
      }
  }
      
?>