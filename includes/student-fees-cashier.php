
  <?php
    include_once '../connection/Config.php';

    if(isset($_GET['viewStudentList'])){
      $studFees ="SELECT sf.*, ssd.csi_year_level, sf.remarks, ssd.csi_program, ssd.csi_major,sf.remarks
      FROM tbl_student_fees AS sf
      LEFT JOIN tbl_student_school_details AS ssd
      ON sf.stud_id = ssd.stud_id
    ";
      $stmtstudFees = $con->prepare($studFees);
      $stmtstudFees->execute();
      $resstudFees = $stmtstudFees->get_result();
      $countstudFees = $resstudFees->num_rows;
    ?>
    <?php 
      if($countstudFees > 0){
        while($datastudFees = $resstudFees->fetch_assoc()){
          $scholar_type = $datastudFees['scholar_type'];
          $discount_type = $datastudFees['discount_type'];
          // Calculate Scholar Deduction
          if( $scholar_type == 'N/A' ){
           $scholarDeduction = number_format( 0, 2);
           $data['scholar'] = '';
           $balance = $datastudFees['tuition_fee'];
         }else if( $scholar_type == 'Partial Scholar' ){
           $balance = $datastudFees['tuition_fee'] / 2;
           $scholarDeduction = number_format($balance, 2);
           // $data['scholar'] = 'Half Scholar'.'('.$scholar_desc.')';
         }else if ( $scholar_type == 'Full Scholar' ){
           $scholarDeduction = number_format( $row['tuition_fee'] , 2);
           // $data['scholar'] = 'Full Scholar'.'('.$scholar_desc.')';
           $balance = 0;
         }
         if($discount_type == 'N/A'){
          $discountDeduction = number_format( 0, 2);
        }else{
          $sqlGetDisc = "SELECT * FROM `tbl_discount` WHERE discount_type = ?";
            $stmtGetDisc = $con->prepare($sqlGetDisc);
            $stmtGetDisc->bind_param('s',$discount_type);
            $stmtGetDisc->execute();
            $resGetDisc = $stmtGetDisc->get_result();
            $rowGetDisc  = $resGetDisc->fetch_assoc();
            $discountDeduction = ((  $balance * ($rowGetDisc['discount_percent'])/  100));
        }  
        ?>
          <tr class="text-center">
          <td><?=$datastudFees['stud_id'];?></td>
              <td><?=$datastudFees['fullname'];?></td>
              <td><?=$datastudFees['csi_program'];?></td>
              <td><?=$datastudFees['csi_major'];?></td>
              <td><?=$datastudFees['csi_year_level'];?></td>
              <td><?=$datastudFees['tuition_fee'];?></td>
              <td><?=$scholarDeduction?></td>
              <td><?=$discountDeduction?></td>
              <td><?=$datastudFees['scholar_type'];?></td>
              <td><?=$datastudFees['balance'];?></td>
              <td><?=$datastudFees['remarks'];?></td>
          </tr>
        <?php }?>
      <?php }else{?>
        <tr>
          <td><?php echo "No Records"?></td>
        </tr>
      <?php } 
        }
    
  ?>
 <?php
    if(isset($_GET['viewStudentListfilterBy'])){
      
      if($_GET['filterBy'] == 'All'){
        $filterBy = '%';
      }else{
        $filterBy = $_GET['filterBy'];
      }
      $studFees ="SELECT sf.*, ssd.csi_year_level, sf.remarks, ssd.csi_program, ssd.csi_major,sf.remarks
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
        while($datastudFees = $resstudFees->fetch_assoc()){
          $scholar_type = $datastudFees['scholar_type'];
          $discount_type = $datastudFees['discount_type'];
          // Calculate Scholar Deduction
          if( $scholar_type == 'N/A' ){
           $scholarDeduction = number_format( 0, 2);
           $data['scholar'] = '';
         }else if( $scholar_type == 'Partial Scholar' ){
           $balance = $datastudFees['tuition_fee'] / 2;
           $scholarDeduction = number_format($balance, 2);
           // $data['scholar'] = 'Half Scholar'.'('.$scholar_desc.')';
         }else if ( $scholar_type == 'Full Scholar' ){
           $scholarDeduction = number_format( $row['tuition_fee'] , 2);
           // $data['scholar'] = 'Full Scholar'.'('.$scholar_desc.')';
         }
         if($discount_type == 'N/A'){
          $discountDeduction = number_format( 0, 2);
        }else{
          $sqlGetDisc = "SELECT * FROM `tbl_discount` WHERE discount_type = ?";
            $stmtGetDisc = $con->prepare($sqlGetDisc);
            $stmtGetDisc->bind_param('s',$discount_type);
            $stmtGetDisc->execute();
            $resGetDisc = $stmtGetDisc->get_result();
            $rowGetDisc  = $resGetDisc->fetch_assoc();
            $discountDeduction = ((  $balance * ($rowGetDisc['discount_percent'])/  100));
        }  
        ?>
          <tr class="text-center">
          <td><?=$datastudFees['stud_id'];?></td>
              <td><?=$datastudFees['fullname'];?></td>
              <td><?=$datastudFees['csi_program'];?></td>
              <td><?=$datastudFees['csi_major'];?></td>
              <td><?=$datastudFees['csi_year_level'];?></td>
              <td><?=$datastudFees['tuition_fee'];?></td>
              <td><?=$scholarDeduction?></td>
              <td><?=$discountDeduction?></td>
              <td><?=$datastudFees['scholar_type'];?></td>
              <td><?=$datastudFees['balance'];?></td>
              <td><?=$datastudFees['remarks'];?></td>
          </tr>
        <?php }?>
      <?php }else{?>
        <tr>
          <td><?php echo "No Records"?></td>
        </tr>
      <?php } 
        }
        ?>