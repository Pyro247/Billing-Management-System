<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
  if(isset($_POST['submitRequest'])){
    $file =$_FILES['image']['name'];
    $stud_id = $_POST['stud_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $transaction_date = $_POST['date'];
    $payment_gateway = $_POST['paymentGateway'];
    $target_dir = '../saleInvoiceImg/';
    $status = 'Pending';
    
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

  
    $slq ="INSERT INTO `tbl_pending_payments`(`transaction_no`,`stud_id`, `fullname`, `email`, `amount`, `payment_gateway`, `sales_invoice`, `transaction_date`, `status`) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $con->prepare($slq);
    $stmt->bind_param('sssssssss',$newTransNo ,$stud_id,$fullname,$email,$amount,$payment_gateway,$file,$transaction_date,$status);
    if($stmt->execute()){
      move_uploaded_file($_FILES['image']['tmp_name'], $target_dir.$file);
      $response['status'] = 'success';
      $response['message'] = 'Successfully Send Payment Request';
    }else{
    $response['status'] = 'error';
    $response['message'] = 'Failed to Send Payment Request!';
    }
    echo json_encode($response);
  }
  
  if(isset($_POST['getDataPaymentRequest'])){
    $transactionNo =$_POST['transactionNo'];
    $data = array();
    $slq ="SELECT * FROM tbl_pending_payments WHERE transaction_no = ?";
    $stmt = $con->prepare($slq);
    $stmt->bind_param('s',$transactionNo);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if($res->num_rows > 0 ){
      $data['reason'] = $row['reasonToDeny'];
      $data['amount'] = $row['amount'];
      $data['transaction_date'] = $row['transaction_date'];
      $data['payment_gateway'] = $row['payment_gateway'];
      $data['sales_invoice'] = $row['sales_invoice'];
    }
    
    echo json_encode($data);
  }
  if(isset($_POST['reSubmitRequest'])){
    $transactionNo = $_POST['transactionNo'];
    $file =$_FILES['imageRe']['name'];
    $stud_id = $_POST['stud_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $transaction_date = $_POST['date'];
    $payment_gateway = $_POST['paymentGateway'];
    $target_dir = '../saleInvoiceImg/';
    $status = 'Pending';  
    $reasonToDeny = '';
    $slq ="UPDATE `tbl_pending_payments` SET `amount`= ? ,`payment_gateway`= ? ,`sales_invoice`= ?,`transaction_date`= ?,`status`= ?,`reasonToDeny`= ? WHERE transaction_no = ?";
    $stmt = $con->prepare($slq);
    $stmt->bind_param('sssssss',$amount ,$payment_gateway,$file,$transaction_date,$status,$reasonToDeny,$transactionNo);
    if($stmt->execute()){
      move_uploaded_file($_FILES['imageRe']['tmp_name'], $target_dir.$file);
      $response['status'] = 'success';
      $response['message'] = 'Successfully Re-Send Payment Request';
    }else{
    $response['status'] = 'error';
    $response['message'] = 'Failed to Re-Send Payment Request!';
    }
    echo json_encode($response);
  }
?>