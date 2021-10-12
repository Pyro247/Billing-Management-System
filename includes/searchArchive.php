<?php
 include_once '../connection/Config.php';
 if(isset($_POST['search'])){
$search =$_POST['query'];
$sql = "SELECT `stud_id`, `firstname`, `lastname`, `role`, `email`, `status` 
FROM `tbl_archive`
WHERE firstname LIKE CONCAT('%',?,'%')
OR stud_id LIKE CONCAT('%',?,'%')";
$stmt = $con->prepare($sql);
$stmt->bind_param('ss', $search, $search);
$stmt->execute();
$result = $stmt->get_result();
?>
<?php 
  if($result->num_rows > 0){
  while($data = $result->fetch_assoc()){ ?>
  <tr>
  <td><?=$data['stud_id'];?></td>
    <td><?=$data['firstname'];?></td>
    <td><?=$data['lastname'];?></td>
    <td><?=$data['role'];?></td>
    <td><?=$data['email'];?></td>
    <td><?=$data['status'];?></td>
  </tr>
<?php 
  }
}else{?>
  <tr>
    <td>0 result's found</td>
  </tr>
<?php }
}?>