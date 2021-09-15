<?php
  include_once '../connection/Config.php';
  class CheckId extends Config {
    private $user_id;

    public function __construct( $user_id ) {
      $this->user_id = $user_id;
      
    }

    public function checkId () {
      $con = $this->connection();
      //Student Registration Table 
      $sql_checkId = "SELECT * FROM tbl_student_registration WHERE stud_id = ?";
      $stmt_checkId = $con->prepare($sql_checkId);
      $stmt_checkId->bind_param('s', $this->user_id);
      $stmt_checkId->execute();
      $result_checkId = $stmt_checkId->get_result();
      $row_checkId = $result_checkId->fetch_assoc();
      $count_checkId = $result_checkId->num_rows;

      if($count_checkId === 1){
        return true;
      } else {
        return false;
      }
       //Empoloyee Registration Table 
      $sql_checkId = "SELECT * FROM tbl_employee_registration WHERE employee_id = ?";
      $stmt_checkId = $con->prepare($sql_checkId);
      $stmt_checkId->bind_param('s', $this->user_id);
      $stmt_checkId->execute();
      $result_checkId = $stmt_checkId->get_result();
      $row_checkId = $result_checkId->fetch_assoc();
      $count_checkId = $result_checkId->num_rows;

      if($count_checkId === 1){
        return true;
      } else {
        return false;
      }
    }
  }
?>