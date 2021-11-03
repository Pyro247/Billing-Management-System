<?php
  include_once '../connection/Config.php';

  $sql = "SELECT `user_id`, `firstname`, `lastname`, `email`  FROM `tbl_archive`";
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
    <td></td>
    <td></td>
    <td><?=$data['email'];?></td>
    <td></td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }
?>