<?php
 include_once '../connection/Config.php';
 if(isset($_POST['search'])){
$search =$_POST['query'];
$sql = "SELECT s.stud_id, s.firstname, s.lastname,r.form_137,r.form_138,r.psa_birth_cert,r.good_moral
        FROM tbl_student_info as s
        RIGHT JOIN tbl_student_requirements as r
        ON s.stud_id = r.stud_id
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
    <td></td>
    <td><?=$data['form_137'];?></td>
    <td><?=$data['form_138'];?></td>
    <td><?=$data['psa_birth_cert'];?></td>
    <td><?=$data['good_moral'];?></td>
    <td></td>
    <td>
      <a href="#" class="btn btn-success "id="edit" data-id="<?=$data['stud_id'];?>">Edit</a>
    </td>
  </tr>
<?php 
  }
}else{?>
  <tr>
    <td>0 result's found</td>
  </tr>
<?php }
}?>