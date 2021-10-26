
  <?php
    include_once '../connection/Config.php';
    if(isset($_GET['viewStudentList'])){
      $search = $_GET['search'] ?? '%';
      $studFees ="SELECT sf.stud_id, sf.fullname, sf.tuition_fee, ssd.csi_year_level, sf.remarks, ssd.csi_program, ssd.csi_major
      FROM tbl_student_fees AS sf
      LEFT JOIN tbl_student_school_details AS ssd
      ON sf.stud_id = ssd.stud_id
      WHERE sf.stud_id LIKE CONCAT('%',?) OR sf.fullname LIKE CONCAT('%',?,'%')";
      $stmtstudFees = $con->prepare($studFees);
      $stmtstudFees->bind_param('ss',$search,$search);
      $stmtstudFees->execute();
      $resstudFees = $stmtstudFees->get_result();
      $countstudFees = $resstudFees->num_rows;
    ?>
    <?php 
      if($countstudFees > 0){
        while($datastudFees = $resstudFees->fetch_assoc()){?>
          <tr class="text-center">
              <td><?=$datastudFees['stud_id'];?></td>
              <td><?=$datastudFees['fullname'];?></td>
              <td><?=$datastudFees['csi_program'];?></td>
              <td><?=$datastudFees['csi_major'];?></td>
              <td><?=$datastudFees['csi_year_level'];?></td>
              <td><?=$datastudFees['tuition_fee'];?></td>
              <td><?=$datastudFees['remarks'];?></td>
          </tr>
        <?php }?>
      <?php }else{?>
        <tr>
          <td><?php echo "No Records"?></td>
        </tr>
      <?php } 
        }?>
 <?php
    include_once '../connection/Config.php';
    if(isset($_GET['viewStudentListfilterBy'])){
      
      if($_GET['filterBy'] == 'All'){
        $filterBy = '%';
      }else{
        $filterBy = $_GET['filterBy'];
      }
      $studFees ="SELECT sf.stud_id, sf.fullname, sf.tuition_fee, ssd.csi_year_level, sf.remarks, ssd.csi_program, ssd.csi_major,sf.remarks
      FROM tbl_student_fees AS sf
      LEFT JOIN tbl_student_school_details AS ssd
      ON sf.stud_id = ssd.stud_id
      WHERE sf.remarks LIKE ? ";
      $stmtstudFees = $con->prepare($studFees);
      $stmtstudFees->bind_param('s',$filterBy);
      $stmtstudFees->execute();
      $resstudFees = $stmtstudFees->get_result();
      $countstudFees = $resstudFees->num_rows;
    ?>
    <?php 
      if($countstudFees > 0){
        while($datastudFees = $resstudFees->fetch_assoc()){?>
          <tr class="text-center">
              <td><?=$datastudFees['stud_id'];?></td>
              <td><?=$datastudFees['fullname'];?></td>
              <td><?=$datastudFees['csi_program'];?></td>
              <td><?=$datastudFees['csi_major'];?></td>
              <td><?=$datastudFees['csi_year_level'];?></td>
              <td><?=$datastudFees['tuition_fee'];?></td>
              <td><?=$datastudFees['remarks'];?></td>
          </tr>
        <?php }?>
      <?php }else{?>
        <tr>
          <td><?php echo "No Records"?></td>
        </tr>
      <?php } 
        }?>