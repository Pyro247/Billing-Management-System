<?php
 include_once '../connection/Config.php';
 $data = array();
 if(isset($_GET['view'])){

  $cashier_ID = $_GET['cashier_ID'];
  $sql = "SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
  FROM `tbl_payments`
  WHERE `transaction_date` = CURRENT_DATE() 
  AND cashier_id = ?
  AND payment_method = 'Cash'";
  $cash = $con->prepare($sql);
  $cash->bind_param('s',$cashier_ID);
  $cash->execute();
  $resultCash = $cash->get_result();
  $rowCash = $resultCash->fetch_row();
  $countCash = mysqli_num_rows($resultCash);
  $data['countCash'] = $countCash;

  $sqlCashTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                    WHERE transaction_date = CURRENT_DATE()
                    AND cashier_id = ?
                    AND payment_method = 'Cash'"; 
  $stmtCashTotal = $con->prepare($sqlCashTotalAmount);
  $stmtCashTotal->bind_param('s',$cashier_ID);
  $stmtCashTotal->execute();
  $resCashTotal = $stmtCashTotal->get_result();
  $rowCashTotal= $resCashTotal->fetch_assoc();
  $cashTotal = $rowCashTotal['count'];
  $data['cashTotal'] = $cashTotal;



  $sqlOnline = "SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
  FROM `tbl_payments`
  WHERE `transaction_date` = CURRENT_DATE() 
  AND cashier_id = ?
  AND payment_method = 'Online'";
  $online = $con->prepare($sqlOnline);
  $online->bind_param('s',$cashier_ID);
  $online->execute();
  $resultOnline = $online->get_result();
  $rowOnline = $resultOnline->fetch_row();
  $countOnline = mysqli_num_rows($resultOnline);
  $data['onlineCount'] = $countOnline;

  $onlineTotal = "SELECT SUM(amount) AS count FROM tbl_payments
                    WHERE transaction_date = CURRENT_DATE()
                    AND cashier_id = ?
                    AND payment_method = 'Online'"; 
  $onlineTotal = $con->prepare($onlineTotal);
  $onlineTotal->bind_param('s',$cashier_ID);
  $onlineTotal->execute();
  $resOnlineTotal = $onlineTotal->get_result();
  $rowOnlineTotal= $resOnlineTotal->fetch_assoc();
  $onlineTotal = $rowOnlineTotal['count'];
  $data['onlineTotal'] = $onlineTotal;
          

  $sqlTotalTransaction = "SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
  FROM `tbl_payments`
  WHERE `transaction_date` = CURRENT_DATE() 
  AND cashier_id = ?";
  $totalTransaction = $con->prepare($sqlTotalTransaction);
  $totalTransaction->bind_param('s',$cashier_ID);
  $totalTransaction->execute();
  $resTotalTransaction = $totalTransaction->get_result();
  $rowtotal = $resTotalTransaction->fetch_row();
  $countTotalTransaction = mysqli_num_rows($resTotalTransaction);
  $data['totalTransactionCount'] = $countTotalTransaction;


  $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                    WHERE transaction_date = CURRENT_DATE()
                    AND cashier_id = ?"; 
  $stmtTotalAmount = $con->prepare($sqlTotalAmount);
  $stmtTotalAmount->bind_param('s',$cashier_ID);
  $stmtTotalAmount->execute();
  $resTotalAmount = $stmtTotalAmount->get_result();
  $rowTotalAmount= $resTotalAmount->fetch_assoc();
  $totalAmountPeso = $rowTotalAmount['count'];
  $data['totalTransactionAmount'] = $totalAmountPeso;

  
  echo json_encode($data);
}
?>