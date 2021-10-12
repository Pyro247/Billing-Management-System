<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
  
  if( isset( $_POST['approve'] ) ){
    $transactionNo = $_POST['transactionNo'];
    $slq = "SELECT pay.*,fees.program_id,fees.tuition_fee,fees.scholar_type,fees.balance,fees.total_amount_paid,det.csi_academic_year,det.csi_semester
            FROM tbl_pending_payments as pay
            INNER JOIN tbl_student_fees as fees ON pay.stud_id = fees.stud_id
            INNER JOIN tbl_student_school_details as det ON pay.stud_id = det.stud_id
            WHERE transaction_no = ?";
    $stmt = $con->prepare( $slq );
    $stmt->bind_param( 's', $transactionNo );
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if( $res->num_rows > 0 ) {
      $transaction_no = $row['transaction_no'];
      $stud_id = $row['stud_id'];
      $fullname = $row['fullname'];
      $csi_academic_year = $row['csi_academic_year'];
      $csi_semester = $row['csi_semester'];
      $amount = $row['amount'];
      $balance = $row['balance'];
      $total_amount_paid = $row['total_amount_paid'];
      $payment_gateway = $row['payment_gateway'];
      $sales_invoice = $row['sales_invoice'];
      $transaction_date = $row['transaction_date'];
      $program_id = $row['program_id'];
      $tuition_fee = $row['tuition_fee'];
      $scholar_type = $row['scholar_type'];
      $payment_status = 'Approved';
      // Computing Balance
      $payment_method = 'Online';
      if($balance > $amount){
        $balance = $balance - $amount;
      }else{
        $balance = 0;
        // For sukli
      }
      // remarks condition
      if($balance == 0){
        $remarks = 'Fully Paid';
        
      }else{
        $remarks = 'Not Fully Paid';
      }
      if($scholar_type == 'Full'){
        $remarks = 'Full Scholar';
      }
      // Temporary
      $cashier_id = 11;
      $cashier_name = 'Unknown';
      $slqApprove = "INSERT INTO `tbl_payments`(`transaction_no`, `program_id`, `stud_id`, `fullname`, `academic_year`, `semester`, `tuition_fee`, `amount`, `payment_method`, `payment_gateway`, `sales_invoice`, `balance`, `transaction_date`, `payment_status`, `remarks`, `cashier_id`, `cashier_name`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmtApprove = $con->prepare($slqApprove);
      $stmtApprove->bind_param('sssssssssssssssss', $transaction_no,$program_id,$stud_id,$fullname,$csi_academic_year,$csi_semester,$tuition_fee,$amount,$payment_method,$payment_gateway,$sales_invoice,$balance,$transaction_date,$payment_status,$remarks,$cashier_id,$cashier_name);
      
      if($stmtApprove->execute()){
        $total = $total_amount_paid + $amount;
        $slqStudFee = "UPDATE `tbl_student_fees` SET `total_amount_paid`= ?,`balance`= ?,`remarks`= ? WHERE stud_id = ?";
        $stmtStudFee = $con->prepare($slqStudFee);
        $stmtStudFee->bind_param('ssss',$total,$balance,
        $remarks,$stud_id);
        if($stmtStudFee->execute()){

          $sqlPendingPay = "DELETE FROM `tbl_pending_payments` WHERE `transaction_no`= ?";
          $stmtPendingPay = $con->prepare($sqlPendingPay);
          $stmtPendingPay->bind_param('s',$transaction_no);
          $stmtPendingPay->execute();

          $response['status'] = 'success';
          $response['message'] = 'Successfully Approved Payment';
        }
      }else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to Approved Payment!';
      }
    }

    echo json_encode( $response );
  }
  // if( isset( $_POST['approve'] ) ){}

?>