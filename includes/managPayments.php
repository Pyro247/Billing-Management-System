<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
  
  if( isset( $_POST['approve'] ) ){
    $transactionNo = $_POST['transactionNo'];
    $slq = "SELECT * FROM `tbl_pending_payments` WHERE transaction_no = ?";
    $stmt = $con->prepare( $slq );
    $stmt->bind_param( 's', $transactionNo );
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if( $res->num_rows > 0 ) {
      $amount = $row['amount'];

      $slqApprove = "INSERT INTO `tbl_payments`(`transaction_no.`, `program_id`, `stud_id`, `fullname`, `academic_year`, `semester`, `tuition_fee`, `amount`, `payment_method`, `payment_gateway`, `sales_invoice`, `total_paid`, `balance`, `transaction_date`, `payment_status`, `remarks`, `cashier_id`, `cashier_name`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    }

    echo json_encode( $row );
  }
?>