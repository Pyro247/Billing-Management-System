<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
  // PHP Mailer
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require '../phpmailer/src/Exception.php';
  require '../phpmailer/src/PHPMailer.php';
  require '../phpmailer/src/SMTP.php';

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
      $email = $row['email'];
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
      
      $cashier_id = $_POST['cashierId'];
      $cashier_name = $_POST['cashierName'];
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
          // Sending Email to Student that Payment Request is Approve
          // $mail = new PHPMailer(true);
          // $mail->smtpClose();
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
          // $mail->isSMTP();                                           
          // $mail->Host       = 'smtp.gmail.com';                     
          // $mail->SMTPAuth   = true;                                   
          // $mail->Username   = 'phptest1301@gmail.com';                     
          // $mail->Password   = 'fprqtcaljwxcnvie';                               
          // $mail->SMTPSecure = 'ssl';            
          // $mail->Port       = 465;   
          // $mail->isHTML(true);       
          // $mail->setFrom('phptest1301@gmail.com', 'Pyro College');
          // $mail->addAddress($email,  $fullname);                                        
          // $mail->Subject = 'PYRO COLLEGE PAYMENT INVOICE';
          // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
      
          // if($mail->send()){
            
          // }else{
          //     echo 'Something went wrong';
          // }

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
  if(isset($_POST['deny'])){
    $transactionNo = $_POST['transactionNo'];
    $reasonToDeny = $_POST['reasonToDeny'];
    $status = "Denied";
    $slqDenied = "UPDATE `tbl_pending_payments` SET `status`= ?,`reasonToDeny`= ? WHERE transaction_no = ?";
    $stmtDenied = $con->prepare($slqDenied);
    $stmtDenied->bind_param('sss',$status,$reasonToDeny,$transactionNo);
    if($stmtDenied->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Denied Payment';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Deny Payment!';
    }
  
    echo json_encode( $response );
  }
?>

<?php
// <!-- Display Data Tabeles -->
// include_once '../connection/Config.php';
if(isset($_POST['viewPending'])){
  $query = $_POST['query'];
  $sort = $_POST['sort'].' '.'ASC';
  $sql ="SELECT pay.*,fees.csi_year_level
          FROM `tbl_pending_payments` as pay
          INNER JOIN tbl_student_fees as fees ON pay.stud_id = fees.stud_id
          WHERE  pay.status LIKE CONCAT('%',?,'%') OR pay.fullname LIKE CONCAT('%',?,'%') OR pay.stud_id  LIKE CONCAT('%',?)
          ORDER BY ".$sort;
  $stmt = $con->prepare($sql);
  $stmt->bind_param('sss',$query,$query,$query);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;

?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){?>
  <tr class="text-center">
    <td style="font-weight: bold;"><?=$data['transaction_no'];?></td>
    <td><?=$data['stud_id'];?></td>
    <td><?=$data['fullname'];?></td>
    <td><span style="font-size 1.5rem; font-weight: bold;">₱<?=$data['amount'];?></span></td>
    <td><?=$data['transaction_date'];?></td>
    <td><?=$data['email'];?></td>
    <td>
    <button type="button" class="btn btn-primary" id="viewInvoice" data-bs-toggle="modal" data-bs-target="#salesInvoice" data-id="<?=$data['sales_invoice'];?>">
      View
    </button>
    </td>
    <td>
      <a href="#" class="btn btn-success paymentTransaction_actionBtn mb-1 d-block"
        id="approve" 
        data-id="<?=$data['transaction_no'];?>"
        data-name="<?=$data['fullname'];?>"
        >Approve</a>
        <a href="#" class="btn btn-danger paymentTransaction_actionBtn mb-1 d-block"
        id="deny" 
        data-bs-toggle="modal" data-bs-target="#denyModal"
        data-id="<?=$data['transaction_no'];?>"
        data-name="<?=$data['fullname'];?>"
        >Deny</a>
    </td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }}   ?>