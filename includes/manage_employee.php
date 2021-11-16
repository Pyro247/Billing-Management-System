<?php
  include_once '../connection/Config.php';
  include '../includes/audit_logs.php';
  header('Content-type: application/json');
  session_start();
  $response = array();
 
  if(isset($_POST['emp_role']) && isset($_POST['emp_id'])){
    $emp_role = $_POST['emp_role'];
    $emp_id = $_POST['emp_id'];
    $emp_firstname = $_POST['emp_firstname'];
    $emp_middlename = $_POST['emp_middlename'];
    $emp_lastname = $_POST['emp_lastname'];
    $empHire = $_POST['empHireDate'];
  }

  if(isset($_POST['newEmp'])){
    $sqlNewEmp = "INSERT INTO `tbl_employee_info`(`reg_no`, `employee_id`, `role`, `firstname`, `lastname`, `middlename`, `sex`, `email`, `address`, `contact_number`, `hireDate`, `joined_date`) VALUES ('',?,?,?,?,?,'','','','',?,'')";  
    $stmtNewEmp = $con->prepare($sqlNewEmp);
    $stmtNewEmp->bind_param('ssssss',$emp_id,$emp_role,$emp_firstname,$emp_lastname,$emp_middlename,$empHire);
    if($stmtNewEmp->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully saved';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to save!';
    }
    $fullname = $emp_firstname .' '.$emp_lastname;
    $act = 'Add new employee '. $emp_id . ' - ' . $fullname;
    audit($_SESSION['employeeId'],$_SESSION['role'],'Admin',$act);
    echo json_encode($response);
  }
  if(isset($_GET['empEdit'])){
    $empId  = $_GET['empEdit'];
    $data = array();
    $slqGetEmp = "SELECT * FROM `tbl_employee_info` WHERE employee_id = ?";
    $stmtGetEmp = $con->prepare($slqGetEmp);
    $stmtGetEmp->bind_param('s',$empId);
    $stmtGetEmp->execute();
    $resGetEmp = $stmtGetEmp->get_result();
    $rowGetEmp = $resGetEmp->fetch_assoc();
    $data['empId'] = $rowGetEmp['employee_id'];
    $data['role'] = $rowGetEmp['role'];
    $data['firstname'] = $rowGetEmp['firstname'];
    $data['lastname'] = $rowGetEmp['lastname'];
    $data['middlename'] = $rowGetEmp['middlename'];
    $data['sex'] = $rowGetEmp['sex'];
    $data['email'] = $rowGetEmp['email'];
    $data['address'] = $rowGetEmp['address'];
    $data['contact_number'] = $rowGetEmp['contact_number'];
    $data['hiredate'] = $rowGetEmp['hireDate'];
    echo json_encode($data);
  }
  if(isset($_POST['updateEmp'])){
    $emp_sex = $_POST['emp_sex'] ?? 'N/A';
    $emp_address = $_POST['emp_address'];
    $emp_email = $_POST['emp_email'];
    $emp_contact_number = $_POST['emp_contact_number'];

    $sqlUpdateEmp = "UPDATE `tbl_employee_info` SET `role`= ?,`firstname`= ? ,`lastname`= ? ,`middlename`= ?,`sex`= ? ,`email`= ? ,`address`= ?,`contact_number`= ?,`hireDate` = ? WHERE employee_id = ? ";  
    $stmtUpdateEmp = $con->prepare($sqlUpdateEmp);
    $stmtUpdateEmp->bind_param('ssssssssss',$emp_role,$emp_firstname,$emp_lastname,$emp_middlename,$emp_sex,$emp_email,$emp_address,$emp_contact_number,$empHire,$emp_id);
    if($stmtUpdateEmp->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully Updated';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Update!';
    }
    $fullname = $emp_firstname .' '.$emp_lastname;
    $act = 'Update employee details of '. $emp_id . ' - ' . $fullname;
    audit($_SESSION['employeeId'],$_SESSION['role'],'Admin',$act);
    echo json_encode($response);
  }
  if(isset($_POST['delEmp'])){
    $sqlDelEmp = "DELETE FROM `tbl_employee_info` WHERE employee_id = ?";  
    $stmtDelEmp = $con->prepare($sqlDelEmp);
    $stmtDelEmp->bind_param('s',$emp_id);
    if($stmtDelEmp->execute()){
      $response['status'] = 'success';
      $response['message'] = 'Successfully Deleted';
    }else{
      $response['status'] = 'error';
      $response['message'] = 'Failed to Delete!';
    }
    echo json_encode($response);
  }
  ?>
  <?php
  // <!-- Display Data Tables -->
  if(isset($_POST['showEmp'])){
    $filterBy = $_POST['filterBy'];
    $sql ="SELECT `employee_id`,`firstname`, `lastname`, `role`,`hireDate` 
            FROM `tbl_employee_info` 
            WHERE role LIKE ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s',$filterBy);
    $stmt->execute();
    $res = $stmt->get_result();
    $count = $res->num_rows;
  
  ?>
  <?php 
  if($count > 0){
  while($data = $res->fetch_assoc()){?>
    <tr class="text-center">
      <td style="font-weight: bold;"><?=$data['employee_id'];?></td>
      <td><?=$data['firstname'];?></td>
      <td><?=$data['lastname'];?></td>
      <td><?=$data['role'];?></td>
      <td><?=$data['hireDate'];?></td>
      <td>
      <button href="#" type="button" class="btn btn-primary"
      id="empEdit"
      data-id="<?=$data['employee_id'];?>"
      >Edit
      </button>
      </td>
    </tr>
  <?php }?>
  <?php }else{?>
    <tr>
      <td><?php echo "No Records"?></td>
    </tr>
  <?php }}   ?>
