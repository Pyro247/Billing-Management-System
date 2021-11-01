<?php
include_once '../connection/Config.php';

    if(isset($_GET['Daily'])){
          $sqldaily ="SELECT `cashier_id`, `cashier_name`, `cash_payment`, `fund_transfer`,(cash_payment + fund_transfer) as total_transaction_amount, `total_transaction_count`, `date` 
          FROM `tbl_reports` WHERE`date` = CURRENT_DATE";
          $stmtdaily = $con->prepare($sqldaily);
          $stmtdaily->execute();
          $resdaily = $stmtdaily->get_result();
          $countdaily = $resdaily->num_rows;
          ?>
          <?php 
          if($countdaily > 0){
          while($data = $resdaily->fetch_assoc()){?>
          <tr class="text-center">
              <td><?=$data['cashier_id'];?></td>
              <td><?=$data['cashier_name'];?></td>
              <td><?=$data['total_transaction_amount'];?></td>
              <td><?=$data['cash_payment'];?></td>
              <td><?=$data['fund_transfer'];?></td>
              <td><?=$data['total_transaction_count'];?></td>
              <td><?=$data['date'];?></td> 
          </tr>
          <?php }?>
          <?php }else{?>
          <tr>
              <td><?php echo "No Records"?></td>
          </tr>
          <?php } 
    }                  
?>

<?php

    if(isset($_GET['Monthly'])){
        $monthly = $_GET['monthSelect'];
          $sqlmonthly ="SELECT `cashier_id`, `cashier_name`, `cash_payment`, `fund_transfer`,(cash_payment + fund_transfer) as total_transaction_amount, `total_transaction_count`, `date` 
          FROM `tbl_reports` WHERE MONTH(`date`) = ?";
          $stmtmonthly = $con->prepare($sqlmonthly);
          $stmtmonthly->bind_param('s', $monthly);
          $stmtmonthly->execute();
          $resmonthly = $stmtmonthly->get_result();
          $countmonthly = $resmonthly->num_rows;

          ?>
          <?php 
          if($countmonthly > 0){
          while($data = $resmonthly->fetch_assoc()){?>
          <tr class="text-center">
              <td><?=$data['cashier_id'];?></td>
              <td><?=$data['cashier_name'];?></td>
              <td><?=$data['total_transaction_amount'];?></td>
              <td><?=$data['cash_payment'];?></td>
              <td><?=$data['fund_transfer'];?></td>
              <td><?=$data['total_transaction_count'];?></td>
              <td><?=$data['date'];?></td>
          </tr>
          <?php }?>
          <?php }else{?>
          <tr>
              <td><?php echo "No Records"?></td>
          </tr>
          <?php } 
    }                  
?>

<?php

    if(isset($_GET['Annually'])){
        $annually = $_GET['yearSelect'];
          $sqlannually ="SELECT `cashier_id`, `cashier_name`, `cash_payment`, `fund_transfer`,(cash_payment + fund_transfer) as total_transaction_amount, `total_transaction_count`, `date` 
          FROM `tbl_reports` WHERE YEAR(`date`) = ?";
          $stmtannually = $con->prepare($sqlannually);
          $stmtannually->bind_param('s', $annually);
          $stmtannually->execute();
          $resannually = $stmtannually->get_result();
          $countannually = $resannually->num_rows;

          ?>
          <?php 
          if($countannually > 0){
          while($data = $resannually->fetch_assoc()){?>
          <tr class="text-center">
              <td><?=$data['cashier_id'];?></td>
              <td><?=$data['cashier_name'];?></td>
              <td><?=$data['total_transaction_amount'];?></td>
              <td><?=$data['cash_payment'];?></td>
              <td><?=$data['fund_transfer'];?></td>
              <td><?=$data['total_transaction_count'];?></td>
              <td><?=$data['date'];?></td>
              
          </tr>
          <?php }?>
          <?php }else{?>
          <tr>
              <td><?php echo "No Records"?></td>
          </tr>
          <?php } 
    }                  
?>