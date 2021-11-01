<?php
  
  include_once '../connection/Config.php';
      $response = array();
  if(isset($_POST['genReportAuth'])){
    $empId = $_POST['empId'];
    $password = $_POST['password'];

    $sqlAuth = "SELECT * FROM `tbl_accounts` WHERE user_id = ?";
    $stmtAuth = $con->prepare($sqlAuth);
    $stmtAuth->bind_param('s',$empId);
    $stmtAuth->execute();
    $resAuth = $stmtAuth->get_result();
    $row = $resAuth->fetch_assoc();
    if(password_verify($password, $row['password'])){
      $response['status'] = 'success';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Password Incorrect';
    }
    echo json_encode($response);
  }
  if(isset($_POST['generateReport'])){
      $total = $_POST['total'];
      $fund = $_POST['fund'];
      $cash = $_POST['cash'];
      $cashier_id = $_POST['cashierID'];
      $cashier_name = $_POST['cashierName'];
      $today =date("Y-m-d");
      $report = "INSERT INTO `tbl_reports`(`cashier_id`, `cashier_name`, `cash_payment`, `fund_transfer`, `total_transaction_count`, `date`) VALUES (?,?,?,?,?,?)";
      $stmtReport = $con->prepare($report);
      $stmtReport->bind_param('ssssss', $cashier_id, $cashier_name, $cash, $fund,$total,$today);
      if($stmtReport->execute()){
        $response['status'] = 'success';
        $response['message'] = 'Successfully Generated Report';
      }else{
        $response['status'] = 'error';
        $response['message'] = 'Failed to Generate Report';
      }
      echo json_encode($response);
  }
 

  
  
?>


