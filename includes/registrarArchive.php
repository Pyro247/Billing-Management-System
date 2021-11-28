<?php
  include_once '../connection/Config.php';

  $sql = "SELECT `user_id`, `firstname`, `lastname`, `year_level`, `program_major`, `stud_status`, `email`, `condition`, `date` 
          FROM `tbl_archive` WHERE `role` = 'Student'";
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
    <td><?=$data['year_level'];?></td>
    <td><?=$data['program_major'];?></td>
    <td><?=$data['stud_status'];?></td>
    <td><?=$data['email'];?></td>
    <td><?=$data['condition'];?></td>
    <td><?=$data['date'];?></td>
  </tr>
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }
  
?>