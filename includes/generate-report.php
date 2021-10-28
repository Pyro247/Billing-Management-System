<?php
  
  include_once '../connection/Config.php';
    $response = array();
    $total = $_POST['total'];
    $fund = $_POST['fund'];
    $cash = $_POST['cash'];
    $variance = $_POST['variance'];
    $cashier_id = $_POST['cashierID'];
    $cashier_name = $_POST['cashierName'];
   $today =date("Y-m-d");

    $report = "INSERT INTO `tbl_reports`(`cashier_id`, `cashier_name`, `cash_payment`, `fund_transfer`, `variance`, `total_transaction_count`, `date`) VALUES (?,?,?,?,?,?,?)";
    $stmtReport = $con->prepare($report);
    $stmtReport->bind_param('sssssss', $cashier_id, $cashier_name, $cash, $fund,$variance,$total,$today);
    if($stmtReport->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully Generated Report';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Generate Report';
    }
    echo json_encode($response);
  
?>


