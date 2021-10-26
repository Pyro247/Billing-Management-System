<?php
  include_once '../connection/Config.php';
 
  if(isset($_POST['generateReport'])){
    $total = $_POST['total'];
    $fund = $_POST['fund'];
    $cash = $_POST['cash'];
    $variance = $_POST['variance'];
    $cashier_id = $_POST['cashierId'];
    $cashier_name = $_POST['cashierName'];


    $report = "INSERT INTO tbl_reports (cashier_id, cashier_name, cash_payment, fund_transfer, total_transaction_count, date-time) 
    VALUES(?,?,?,?,?,CURRENT_TIMESTAMP)";
    $stmtReport = $con->prepare($report);
    $stmtReport->bind_param('sssss', $cashier_id, $cashier_name, $cash, $fund,$total);
    $stmtReport->execute();
    $resreport = $stmtReport->get_result(); 


    echo $resreport;
  }
    ?>


