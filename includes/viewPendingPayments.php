<?php
  include_once '../connection/Config.php';

  $sql ="SELECT * FROM `tbl_pending_payments`";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;

?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){?>
  <tr>
    <td><?=$data['transaction_no'];?></td>
    <td><?=$data['stud_id'];?></td>
    <td><?=$data['fullname'];?></td>
    <td><?=$data['amount'];?></td>
    <td></td>
    <td><?=$data['transaction_date'];?></td>
    <td><?=$data['email'];?></td>
    <td>
    <button type="button" class="btn btn-primary" id="viewInvoice" data-bs-toggle="modal" data-bs-target="#salesInvoice" data-id="<?=$data['sales_invoice'];?>">
      View
    </button>
    </td>
    <td>
      <a href="#" class="btn btn-success" id="approve" data-id="<?=$data['transaction_no'];?>">Approve</a>
      <a href="#" class="btn btn-danger">Deny</a>
    </td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php } ?>