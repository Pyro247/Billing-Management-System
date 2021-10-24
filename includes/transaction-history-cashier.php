<?php
  include_once '../connection/Config.php';
  if(isset($_GET['viewTransactionHistory'])){
  $cashierID = $_GET['cashierID'];
  $sqlHistory ="SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
                FROM `tbl_payments`
                WHERE `transaction_date` = CURRENT_DATE() AND cashier_id = ?";
  $stmtHistory = $con->prepare($sqlHistory);
  $stmtHistory->bind_param('s',$cashierID);
  $stmtHistory->execute();
  $resHistory = $stmtHistory->get_result();
  $countHistory = $resHistory->num_rows;
?>
<?php 
  if($countHistory > 0){
    while($dataHistory = $resHistory->fetch_assoc()){?>
      <tr class="text-center">
          <td><?=$dataHistory['transaction_no'];?></td>
          <td><?=$dataHistory['stud_id'];?></td>
          <td><?=$dataHistory['fullname'];?></td>
          <td><?=$dataHistory['amount'];?></td>
          <td><?=$dataHistory['payment_method'];?></td>
          <td class="text-success text-uppercase fw-bold"><?=$dataHistory['payment_status'];?></td>
          <td><?=$dataHistory['transaction_date'];?></td>
      </tr>
    <?php }?>
  <?php }else{?>
    <tr>
      <td><?php echo "No Records"?></td>
    </tr>
  <?php } 
    }?>
  <?php

  if(isset($_GET['viewTransactionHistoryFilteredBy'])){

  $cashierID = $_GET['cashierID'];
  $filterByPay = $_GET['filterByPay'];
  $filterByDate = $_GET['filterByDate'];
  if($filterByDate == ''){
    $filterByDate =  date('Y-m-d');
  }
  $sqlHistory ="SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
                FROM `tbl_payments`
                WHERE `transaction_date` = ? AND cashier_id = ? AND `payment_method` LIKE ? ";
  $stmtHistory = $con->prepare($sqlHistory);
  $stmtHistory->bind_param('sss',$filterByDate,$cashierID,$filterByPay);
  $stmtHistory->execute();
  $resHistory = $stmtHistory->get_result();
  $countHistory = $resHistory->num_rows;
?>
<?php 
  if($countHistory > 0){
    while($dataHistory = $resHistory->fetch_assoc()){?>
      <tr class="text-center">
          <td><?=$dataHistory['transaction_no'];?></td>
          <td><?=$dataHistory['stud_id'];?></td>
          <td><?=$dataHistory['fullname'];?></td>
          <td><?=$dataHistory['amount'];?></td>
          <td><?=$dataHistory['payment_method'];?></td>
          <td class="text-success text-uppercase fw-bold"><?=$dataHistory['payment_status'];?></td>
          <td><?=$dataHistory['transaction_date'];?></td>
      </tr>
    <?php }?>
  <?php }else{?>
    <tr>
      <td><?php echo "No Records"?></td>
    </tr>
  <?php } 
    }?>