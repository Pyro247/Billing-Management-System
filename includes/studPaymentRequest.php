<?php
  include_once '../connection/Config.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
  $file =$_FILES['image']['name'];
  $stud_id = $_POST['stud_id'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $amount = $_POST['amount'];
  $transaction_date = $_POST['date'];
  $payment_gateway = $_POST['paymentGateway'];
  $target_dir = '../saleInvoiceImg/';
  $slq ="INSERT INTO `tbl_pending_payments`(`stud_id`, `fullname`, `email`, `amount`, `payment_gateway`, `sales_invoice`, `transaction_date`) VALUES (?,?,?,?,?,?,?)";
  $stmt = $con->prepare($slq);
  $stmt->bind_param('sssssss', $stud_id,$fullname,$email,$amount,$payment_gateway,$file,$transaction_date );
  if($stmt->execute()){
    move_uploaded_file($_FILES['image']['tmp_name'], $target_dir.$file);
    $response['status'] = 'success';
    $response['message'] = 'Successfully Updated';
  }else{
  $response['status'] = 'error';
  $response['message'] = 'Failed to update!';
  
}
echo json_encode($response);
?>