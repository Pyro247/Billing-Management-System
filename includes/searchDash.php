<?php
 include_once '../connection/Config.php';
 if(isset($_POST['search'])){
$search =$_POST['query'];
$sql = "SELECT s.stud_id, s.firstname, s.lastname, s.email, d.LRN, d.stud_type,
i.scholar_type, d.csi_program, d.csi_major, d.csi_year_level
FROM tbl_student_info as s
RIGHT JOIN tbl_student_school_details as d
ON s.stud_id = d.stud_id
RIGHT JOIN tbl_student_fees as i
ON s.stud_id = i.stud_id
WHERE s.firstname LIKE CONCAT('%',?,'%')
OR s.stud_id LIKE CONCAT('%',?,'%')";
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
    <td><?=$data['csi_program'];?></td>
    <td><?=$data['csi_major'];?></td>
    <td><?=$data['csi_year_level'];?></td>
    <td><?=$data['stud_type'];?></td>
    <td><?=$data['scholar_type'];?></td>
    <td><?=$data['LRN'];?></td>
    <td><?=$data['email'];?></td>
  </tr>
<?php 
  }
}else{?>
  <tr>
    <td>0 result's found</td>
  </tr>
<?php }
}?>