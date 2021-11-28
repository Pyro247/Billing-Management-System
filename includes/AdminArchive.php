<?php
  include_once '../connection/Config.php';

  $sql = "SELECT `user_id`, `firstname`, `lastname`, `role`, `email`,  `condition`, `date` 
          FROM `tbl_archive` WHERE `role` = 'Registrar' OR `role` = 'Cashier'";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;
?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){?>
  <tr>
    <td><?=$data['user_id'];?></td>
    <td><?=$data['firstname'];?></td>
    <td><?=$data['lastname'];?></td>
    <td><?=$data['role'];?></td>
    <td><?=$data['condition'];?></td>
    <td><?=$data['email'];?></td>
    <td><?=$data['date'];?></td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }
  
?>