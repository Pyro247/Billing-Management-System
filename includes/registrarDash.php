<?php
  include_once '../connection/Config.php';
  if(isset($_POST['stud_type'])){
  $stud_type = $_POST['stud_type'];
  $sql = "SELECT s.stud_id, s.firstname, s.lastname, s.email, d.LRN, d.stud_type,
         i.scholar_type, d.csi_program, d.csi_major, d.csi_year_level
         FROM tbl_student_info as s
         LEFT JOIN tbl_student_school_details as d
         ON s.stud_id = d.stud_id
         LEFT JOIN tbl_student_fees as i
         ON s.stud_id = i.stud_id
         WHERE d.stud_type = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('s', $stud_type );
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;
?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){?>
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
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php } 
}else{
$sql = "SELECT s.stud_id, s.firstname, s.lastname, s.email, d.LRN, d.stud_type,
         i.scholar_type, d.csi_program, d.csi_major, d.csi_year_level
         FROM tbl_student_info as s
         LEFT JOIN tbl_student_school_details as d
         ON s.stud_id = d.stud_id
         LEFT JOIN tbl_student_fees as i
         ON s.stud_id = i.stud_id";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;
?>
<?php 
if($count > 0){
while($data = $res->fetch_assoc()){?>
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
<?php }?>
<?php }else{?>
  <tr>
    <td><?php echo "No Records"?></td>
  </tr>
<?php }
}
?>





        