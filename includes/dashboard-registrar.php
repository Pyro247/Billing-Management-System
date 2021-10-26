
<?php
include_once '../connection/Config.php';
  if(isset($_POST['viewStudDash'])){
    if($_POST['stud_type'] == 'All'){
      $stud_type ='%';
    }else{
      $stud_type = $_POST['stud_type'];
    }

  $sql = "SELECT s.stud_id, s.firstname, s.lastname, s.email, d.LRN, d.stud_type,
        i.scholar_type, d.csi_program, d.csi_major, d.csi_year_level
        FROM tbl_student_info as s
        LEFT JOIN tbl_student_school_details as d ON s.stud_id = d.stud_id
        LEFT JOIN tbl_student_fees as i ON s.stud_id = i.stud_id
        WHERE d.stud_type LIKE ?";
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
}?>
<?php

  if(isset($_POST['search'])){
    $search =$_POST['query'];
    $sql = "SELECT s.stud_id, s.firstname, s.lastname, s.email, d.LRN, d.stud_type,
            i.scholar_type, d.csi_program, d.csi_major, d.csi_year_level
            FROM tbl_student_info as s
            RIGHT JOIN tbl_student_school_details as d ON s.stud_id = d.stud_id
            RIGHT JOIN tbl_student_fees as i ON s.stud_id = i.stud_id
            WHERE s.firstname LIKE CONCAT('%',?,'%') OR s.stud_id LIKE CONCAT('%',?,'%')";
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

<?php
   if(isset($_GET['viewStudDataFiltered'])){
    if($_GET['byProgram'] == 'All'){
      $byProgram = '%';
    }else{
      $byProgram = $_GET['byProgram'];
    }
    $byMajor = $_GET['byMajor'] ?? '%';
    
    if( $_GET['studType'] == 'Total'){
      $studType = '%';
    }else{
      $studType = $_GET['studType'];
    }
  $sql = "SELECT s.stud_id, s.firstname, s.lastname, s.email, d.LRN, d.stud_type,
        i.scholar_type, d.csi_program, d.csi_major, d.csi_year_level
        FROM tbl_student_info as s
        LEFT JOIN tbl_student_school_details as d ON s.stud_id = d.stud_id
        LEFT JOIN tbl_student_fees as i ON s.stud_id = i.stud_id
        WHERE d.csi_program LIKE CONCAT('%',?,'%') AND d.csi_major LIKE CONCAT('%',?,'%') AND d.stud_type  LIKE CONCAT('%',?,'%')";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('sss',$byProgram,$byMajor,$studType);
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
}?>



        