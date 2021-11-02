<?php
include_once '../connection/Config.php';
$data = array();

if(isset($_GET['computeDaily'])){
    $sqldaily ="SELECT SUM(cash_payment + fund_transfer) AS total_amount_collected,
    SUM(cash_payment) AS total_cash, SUM(fund_transfer) AS total_online,SUM(total_transaction_count) AS total_Count
    FROM tbl_reports WHERE`date` = CURRENT_DATE";
    $stmtdaily = $con->prepare($sqldaily);
    $stmtdaily->execute();
    $resdaily = $stmtdaily->get_result();
    $rowDaily = $resdaily->fetch_assoc();
    $data['total_amount_collected'] = $rowDaily['total_amount_collected'];
    $data['total_cash'] = $rowDaily['total_cash'];
    $data['total_online'] = $rowDaily['total_online'];
    $data['total_Count'] = $rowDaily['total_Count'];
    echo json_encode($data);
}
if(isset($_GET['computeMothly'])){
    $monthly = $_GET['month'];
    $sqlMonthly ="SELECT SUM(cash_payment + fund_transfer) AS total_amount_collected,
    SUM(cash_payment) AS total_cash, SUM(fund_transfer) AS total_online,SUM(total_transaction_count) AS total_Count
    FROM tbl_reports WHERE MONTH(date) = ?";
    $stmtMonthly = $con->prepare($sqlMonthly);
    $stmtMonthly->bind_param('s', $monthly);
    $stmtMonthly->execute();
    $resMonthly = $stmtMonthly->get_result();
    $rowMonthly = $resMonthly->fetch_assoc();
    $data['total_amount_collected'] = $rowMonthly['total_amount_collected'];
    $data['total_cash'] = $rowMonthly['total_cash'];
    $data['total_online'] = $rowMonthly['total_online'];
    $data['total_Count'] = $rowMonthly['total_Count'];
    echo json_encode($data);
}
if(isset($_GET['computeYearly'])){
    $year = $_GET['year'];
    $sqlYear ="SELECT SUM(cash_payment + fund_transfer) AS total_amount_collected,
    SUM(cash_payment) AS total_cash, SUM(fund_transfer) AS total_online,SUM(total_transaction_count) AS total_Count
    FROM tbl_reports WHERE YEAR(date) = ?";
    $stmtYear = $con->prepare($sqlYear);
    $stmtYear->bind_param('s', $year);
    $stmtYear->execute();
    $resYear = $stmtYear->get_result();
    $rowYear = $resYear->fetch_assoc();
    $data['total_amount_collected'] = $rowYear['total_amount_collected'];
    $data['total_cash'] = $rowYear['total_cash'];
    $data['total_online'] = $rowYear['total_online'];
    $data['total_Count'] = $rowYear['total_Count'];
    echo json_encode($data);
}
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