<?php
  include_once '../connection/Config.php';
  $studId = $_GET['studId'];
  if($_GET['schoolYear'] == "All"){
    $schoolYear = '%';
  }else{
    $schoolYear = $_GET['schoolYear'];
  }
  
  $sql ="SELECT pay.transaction_no, pay.amount, CONCAT(pay.payment_method,'-',pay.payment_gateway) 
  AS payment, pay.transaction_date, pay.payment_status, pay.cashier_name,det.csi_academic_year
  FROM tbl_payments as pay
  INNER JOIN tbl_student_school_details AS det
  WHERE pay.stud_id = ? AND det.csi_academic_year LIKE ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('ss', $studId,$schoolYear);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;

?>
<?php 
  if($count > 0){
  while($data = $res->fetch_assoc()){?>
  <tr class="text-center">
      <td><?=$data['transaction_no'];?></td>
      <td><?=$data['amount'];?></td>
      <td><?=$data['payment'];?></td>
      <td><?=$data['transaction_date'];?></td>
      <td><?=$data['cashier_name'];?></td>
      <td class="text-uppercase fw-bold"><?=$data['payment_status'];?></td>
      
  </tr>
  <?php }?>
  <?php }else{?>
  <tr>
      <td><?php echo "No Records"?></td>
  </tr>
<?php }                     
?>