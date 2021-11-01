<?php
  include_once '../connection/Config.php';
  session_start();
  $response = array();
  $data = array();
   // PHP Mailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';
  if(isset($_GET['getData'])){
    $query = $_GET['getData'];
    $slq = "SELECT * FROM `tbl_student_fees` WHERE stud_id = ?";
    $stmt = $con->prepare( $slq );
    $stmt->bind_param( 's', $query );
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if( $res->num_rows > 0 ) {
      $programID = $row['program_id'];
      $slqProg = "SELECT program_id,CONCAT(course_program,'-',course_major) as Program 
                    FROM tbl_course_list
                    WHERE program_id = ?";
      $stmtProg = $con->prepare( $slqProg );
      $stmtProg->bind_param( 's', $programID );
      $stmtProg->execute();
      $resProg = $stmtProg->get_result();
      $rowProg = $resProg->fetch_assoc();

      $data['program'] = $rowProg['Program'];
      $data['prograId'] = $rowProg['program_id'];
      // Data from tbl student fees
      $data['fullname'] = $row['fullname'];
      $data['stud_id'] = $row['stud_id'];
      $data['tuition'] = number_format($row['tuition_fee'], 2);
      $data['balance'] = number_format($row['balance'], 2);
      $data['studTotalAmountPaid'] = number_format($row['total_amount_paid'], 2);
      $scholar_type = $row['scholar_type'];
      $scholar_desc = $row['scholar_desc'];
      $discount_type = $row['discount_type'];
      $balance = 0;
      // Calculate Scholar Deduction
      if( $scholar_type == 'N/A' ){
        $data['scholarDeduction'] = number_format( 0, 2);
        $data['scholar'] = '';
      }else if( $scholar_type == 'Partial Scholar' ){
        $balance = $row['tuition_fee'] / 2;
        $data['scholarDeduction'] = number_format($balance, 2);
        $data['scholar'] = 'Half Scholar'.'('.$scholar_desc.')';
      }else if ( $scholar_type == 'Full Scholar' ){
        $data['scholarDeduction'] = number_format( $row['tuition_fee'] , 2);
        $data['scholar'] = 'Full Scholar'.'('.$scholar_desc.')';
      }
      // Caslculate Discount Deduction
      if($discount_type == 'N/A'){
        $data['discountDeduction'] = number_format( 0, 2);
        $data['studDiscount'] = '';
      }else{
        $sqlGetDisc = "SELECT * FROM `tbl_discount` WHERE discount_type = ?";
          $stmtGetDisc = $con->prepare($sqlGetDisc);
          $stmtGetDisc->bind_param('s',$discount_type);
          $stmtGetDisc->execute();
          $resGetDisc = $stmtGetDisc->get_result();
          $rowGetDisc  = $resGetDisc->fetch_assoc();
          $data['studDiscount'] = $discount_type;
          $data['discountDeduction'] = ((  $balance * ($rowGetDisc['discount_percent'])/  100));
      }
     

      echo json_encode($data);
    }else{
      echo json_encode($data);
    }
  }
  if(isset($_POST['transact'])){
    $studId = $_POST['studId'];
    $amount = $_POST['amount'];
    $cashier_id = $_POST['cashierId'];
    $cashier_name = $_POST['cashierName'];
    // Genearate Transaction No base on last no on tbl payments of pending payments
    $sqlTransNo = "SELECT transaction_no
                    FROM tbl_payments
                    UNION 
                    SELECT transaction_no 
                    FROM tbl_pending_payments ORDER BY transaction_no DESC  ";
    $stmtTransNo = $con->prepare($sqlTransNo);
    $stmtTransNo->execute();
    $resTransNo = $stmtTransNo->get_result();
    $rowTransNo = $resTransNo->fetch_assoc();
    $lastTransNo = $rowTransNo['transaction_no'];
    
    if ($rowTransNo['transaction_no'] == "") {
      $newTransNo = "FT-001";
    }else{
      $newTransNo = substr($lastTransNo, 3);
      $newTransNo = intval($newTransNo);
      $newTransNo = sprintf("FT%s%03d", "-", ($newTransNo + 1)); 
    }
    // Selecting Student Data base on Stud ID
    $slq = "SELECT fees.program_id,fees.fullname,fees.tuition_fee,fees.scholar_type,fees.balance,fees.total_amount_paid,det.csi_academic_year,det.csi_semester,info.email
            FROM tbl_student_fees as fees 
            INNER JOIN tbl_student_school_details as det ON fees.stud_id = det.stud_id
            INNER JOIN tbl_student_info as info ON fees.stud_id = info.stud_id
            WHERE fees.stud_id = ?";
    $stmt = $con->prepare( $slq );
    $stmt->bind_param( 's', $studId );
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if( $res->num_rows > 0 ) {
      $program_id = $row['program_id'];
      $fullname = $row['fullname'];
      $email = $row['email'];
      $csi_academic_year = $row['csi_academic_year'];
      $csi_semester = $row['csi_semester'];
      $tuition_fee = $row['tuition_fee'];
      $balance = $row['balance'];
      $total_amount_paid = $row['total_amount_paid'];
      $payment_method = 'Cash';
      $payment_gateway = '';
      $sales_invoice = '';
      $scholar_type = $row['scholar_type'];
      $today = date('Y-m-d');
      $payment_status = 'Approved';
      
      if($balance > $amount){
        $balance = $balance - $amount;
      }else if($amount >= $balance){
        $balance = 0;
        $amount = $row['balance'];
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
      $slqApprove = "INSERT INTO `tbl_payments`(`transaction_no`, `program_id`, `stud_id`, `fullname`, `academic_year`, `semester`, `tuition_fee`, `amount`, `payment_method`, `payment_gateway`, `sales_invoice`, `balance`, `transaction_date`, `payment_status`, `remarks`, `cashier_id`, `cashier_name`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmtApprove = $con->prepare($slqApprove);
      $stmtApprove->bind_param('sssssssssssssssss', $newTransNo,$program_id,$studId,$fullname,$csi_academic_year,$csi_semester,$tuition_fee,$amount,$payment_method,$payment_gateway,$sales_invoice,$balance,$today,$payment_status,$remarks,$cashier_id,$cashier_name);

      if($stmtApprove->execute()){
        $total = $total_amount_paid + $amount;
        $slqStudFee = "UPDATE `tbl_student_fees` SET `total_amount_paid`= ?,`balance`= ?,`remarks`= ? WHERE stud_id = ?";
        $stmtStudFee = $con->prepare($slqStudFee);
        $stmtStudFee->bind_param('ssss',$total,$balance,
        $remarks,$studId);
        if($stmtStudFee->execute()){
         // Sending Email to Student that Payment Request is Approve
          $mail = new PHPMailer(true);
          $mail->smtpClose();
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
          $mail->isSMTP();                                           
          $mail->Host       = 'smtp.gmail.com';                     
          $mail->SMTPAuth   = true;                                   
          $mail->Username   = 'phptest1301@gmail.com';                     
          $mail->Password   = 'fprqtcaljwxcnvie';                               
          $mail->SMTPSecure = 'ssl';            
          $mail->Port       = 465;   
          $mail->isHTML(true);       
          $mail->setFrom('phptest1301@gmail.com', 'Pyro College');
          $mail->addAddress($email, $fullname);                                        
          $mail->Subject = 'PYRO COLLEGE PAYMENT Acknowledgement Letter';
          $mail->Body    = 'Thank you for the recent payment that you made on '.'<b>'.$today.'</b>'.' for the amount of '.'<b>₱'.$amount.'</b>'.'. This is a confirmation that amount has been successfully received and deposited in our account.';
          if($mail->send()){
            $response['status'] = 'success';
            $response['message'] = 'Successfully Transacted Payment';
          }
          

         
        }
      }else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to Transact Payment!';
      }
    }
    echo json_encode($response);
  }

?>
<?php
// <!-- Display Data Tabeles -->
// include_once '../connection/Config.php';
if(isset($_GET['viewLastTransac'])){
  $studId = $_GET['studId'];
  $slqLastTransaction ="SELECT  *
                        FROM tbl_payments WHERE stud_id = ? 
                        ORDER BY transaction_no DESC LIMIT 1";
  $stmtLastTransaction = $con->prepare($slqLastTransaction);
  $stmtLastTransaction->bind_param('s', $studId);
  $stmtLastTransaction->execute();
  $resLastTransaction = $stmtLastTransaction->get_result(); 

  $count = $resLastTransaction->num_rows;

?>
<?php 
if($count > 0){
while($data = $resLastTransaction->fetch_assoc()){?>
  <tr class="text-center">
    <td><?=$data['transaction_no'];?></td>
    <td><?=$data['stud_id'];?></td>
    <td><?=$data['fullname'];?></td>
    <td><?=$data['amount'];?></td>
    <td><?=$data['payment_method'];?></td>
    <td class="text-success text-uppercase fw-bold"><?=$data['payment_status'];?></td>
    <td><?=$data['payment_gateway'];?></td>
    <td><?=$data['remarks'];?></td>
    <td><?=$data['transaction_date'];?></td>
    </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }}   ?>