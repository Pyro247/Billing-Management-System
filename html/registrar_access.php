<?php
  require_once '../connection/Config.php';
  session_start();
  if($_SESSION['role'] != 'Admin' && $_SESSION['role'] != 'Registrar'){
    session_destroy(); 
    header('Location: ../html/login.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/registrar_access.css?<?php echo time(); ?>" />
    <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <title>Registrar</title>
  </head>
  <body>
<!-- LOADER! -->
<div class="loader-wrapper" id="loader-wrapperID">
  <div class="wrapper">
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="shadow"></div>
      <div class="shadow"></div>
      <div class="shadow"></div>
      <span>Pyro Colleges</span>
  </div>
</div>

<script type="text/javascript">
  window.onload = function(){
    loaderClose()
  }
  
</script>
<!-- LOADER -->
    <div class="nav__bar">
      <div class="nav__bar_two">
      <img src="../images/logo.png" alt="">
          <div class="nav__bar_two_text">
              <span>Pyro Colleges</span>
              <p>Excellence at its finest.</p>
          </div>
      </div>
    </div>

    <!-- PopUp for Archive -->
    <div class="popUpArchive" style="visibility: hidden; opacity: 0; transition: all 150ms;"> 
      <div class="popUpArchiveinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end"></i>
        <p class="text-primary d-block text-center mt-5" >Choose Archive Reason</p>
        
          <form action="">
            <div class="innerFormArchive">
              <input type="radio" class="btn-check" name="options-outlined" id="graduate" autocomplete="off">
              <label class="btn btn-outline-primary mx-1" for="graduate">Graduate</label>

              <input type="radio" class="btn-check" name="options-outlined" id="transfer" autocomplete="off">
              <label class="btn btn-outline-primary mx-1" for="transfer">Transfer</label>

              <input type="radio" class="btn-check" name="options-outlined" id="drop" autocomplete="off">
              <label class="btn btn-outline-primary mx-1" for="drop">Dropped</label>

              <input type="radio" class="btn-check" name="options-outlined" id="discontinued" autocomplete="off">
              <label class="btn btn-outline-primary mx-1" for="discontinued">Discontinued</label>
            </div>
              <button class="btn btn-primary d-block mx-auto mt-5 mb-2 px-5">Archive</button>
          </form>
        </div>
      </div>

    <!-- Add School Year -->
    <div class="popUpAdmin_FeesManagement" style="visibility: hidden; opacity: 0; transition: all 150ms;" >
      <div class="popUpFeesMgmtinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(0)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Add Academic Year</p>
          <hr class="mt-0 mb-3">
            <form action="" class="addAY" id="newSY">
                <input type="text" name="SYstart" placeholder="Academic Year">
                <span class="mx-2">To</span>
                <input type="text" name="SYend" placeholder="Academic Year">
                <button type="submit" class="d-block mt-2 btn btn-primary" style="margin-left: auto;" id="addNewSY" >Submit</button>
            </form>
      </div>
    </div>

    <!-- Add Bachelor's Program -->
    <div class="popUpAdmin_FeesManagement" style="visibility: hidden; opacity: 0; transition: all 150ms;" >
      <div class="popUpFeesMgmtinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(1)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Bachelor's Program</p>
          <hr class="mt-0 mb-3">
            <form action="" id="newProgram">
            
            <p>Course ID &nbsp;<input type="text" name="programId" placeholder="Course ID"></p>
            <p>Program &nbsp;<input type="text" name="program" placeholder="Program"></p>
            <p>Major &nbsp;<input type="text" name="major" placeholder="Major"></p>
            <!-- <p>Duration &nbsp;<input type="text" name="duration" placeholder="Duration"></p> -->
            <p>Duration &nbsp;
                <select name="duration">
                  <option value="1">1 Year</option>
                  <option value="2">2 Years</option>
                  <option value="3">3 Years</option>
                  <option value="4">4 Years</option>
                  <option value="5">5 Years</option>
                </select>
            <!-- <p>Year Level &nbsp;<input type="text" name="yearLevel" placeholder="Year Level"></p> -->
            <p>Year Level &nbsp;
                <select name="yearLevel">
                  <option value="1">1st Year</option>
                  <option value="2">2nd Year</option>
                  <option value="3">3rd Year</option>
                  <option value="4">4th Year</option>
                  <option value="5">5th Year</option>
                </select>
            <!-- <p>Semester &nbsp;<input type="text" name="semester" placeholder="Semester"></p> -->
            <p>Semester &nbsp;
                <select name="semester">
                  <option value="1">1st Semester</option>
                  <option value="2">2nd Semester</option>
                  <optio value="3">3rd Semester</optio>
                </select>
            <p>Fee &nbsp;<input type="text" name="fee" placeholder="Fee"></p>
          

                

                <button type="submit" class="d-block mt-2 btn btn-primary" style="margin-left: auto;" id="addNewProgram">Submit</button>
            </form>
      </div>
    </div>

    <!-- Add Scholarship -->
    <div class="popUpAdmin_FeesManagement" style="visibility: hidden; opacity: 0; transition: all 150ms;" >
      <div class="popUpFeesMgmtinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(2)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Bachelor's Program</p>
          <hr class="mt-0 mb-3">
            <form action="" id="newScholarship">

              <p>Description &nbsp;<input type="text"  name="scholarDesc" placeholder="Description"></p>
              <p>Type &nbsp;
                <select name="scholarType" id="">
                  <option value="Full">Full</option>
                  <option value="Half">Partial</option>
                </select>
              </p>

                <button type="submit" class="d-block mt-2 btn btn-primary" style="margin-left: auto;" id="addNewScholarship">Submit</button>
            </form>
      </div>
    </div>


    <!-- Add Discount -->
    <div class="popUpAdmin_FeesManagement" style="visibility: hidden; opacity: 0; transition: all 150ms;" >
      <div class="popUpFeesMgmtinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(3)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Discount</p>
          <hr class="mt-0 mb-3">
          <form action="" class="popUpAdminBP" id="newDiscount">
            
            <p>Description &nbsp;<input type="text" name="discountDesc" placeholder="Description"></p>
            <p>Percentage &nbsp;<input type="text" name="discountPer" placeholder="0.00%"></p>

              <button type="submit" class="d-block mt-2 btn btn-primary" style="margin-left: auto;" id="addNewDiscount">Submit</button>
          </form>
            
      
      </div>
    </div>

    

    


    <div class="row">
      <div class="col left-tab">
        <div class="upper-left-tab">
            <img src="..\images\registrar_img\sample_registrar_pic.png" alt="">
            <p class="reg__name" style="font-size: 1.2rem;"><?= $_SESSION['fullname'];?><i class="fas fa-caret-down mx-2" onclick="profile_link_show()"></i></p>
            <div class="profile_link" id="profile_link_id">
              <a href="">My Email</a>
              <a href="../html/forgotPassword.php">Change Password</a>
              <a href="../includes/logout.inc.php">Logout</a>
            </div>
          
            <p class="reg__name" id="roleId"><?= $_SESSION['role'];?> | R-<?= $_SESSION['employeeId'];?></p>
            <p class="reg__name" id="reg-date-time"></p>
        </div>

            <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><img src="../images/icons/dashboard.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Dashboard</a>
                <a class="nav-link main__" id="v-pills-manage-users-tab" data-toggle="pill" href="#v-pills-manage-users" role="tab" aria-controls="v-pills-manage-users" aria-selected="false"><img src="../images/icons/manage_users.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Manage Users</a>
                <a class="nav-link main__" id="v-pills-archives-tab" data-toggle="pill" href="#v-pills-archives" role="tab" aria-controls="v-pills-archives" aria-selected="false"><img src="../images/icons/archive.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Archives</a>
                <a class="nav-link main__" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false"><img src="../images/icons/reports.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Reports</a>
                <a class="nav-link main__" id="v-pills-fees-tab" data-toggle="pill" href="#v-pills-fees" role="tab" aria-controls="v-pills-fees" aria-selected="false"><img src="../images/icons/fees_management.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Fees Management</a>
                <a class="nav-link main__" id="v-pills-studFee-tab" data-toggle="pill" href="#v-pills-studFee" role="tab" aria-controls="v-pills-studFee" aria-selected="false"><img src="../images/icons/stud_fee.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Student Fees</a>
            
            </div>
        </div>
        

        <div class="col-sm right-tab">


        <!-- Dashboard -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
              <p class="title_tab_universal" >Dashboard</p>


            

<!-- 
                <form action="" class="universal_search_form">
                  <input type="text" name="searchDash" id="searchDash" placeholder="Search">
                  <button type="button" class="btn btn-primary" id="searchDash_btn">Search</button>
                </form> -->
              <div class="dashBoardForRegistrar">
                <div class="studentCountBoxContainer my-3">

                  <div class="studentCountBox" id="totalStud">
                      <span class="lnr lnr-users"></span>
                    <div class="studentCounter">
                      <h2>
                        <?php
                          $sql = "SELECT * FROM tbl_student_info";
                          $statement = $con->prepare($sql);
                          $statement->execute();
                          $result = $statement->get_result();
                          $row = $result->fetch_row();
                          $count = mysqli_num_rows($result);
                          echo $count;
                        ?>
                      </h2>
                        <h3>
                          Total Students
                        </h3>
                    </div>
                  </div>

                    

                  <div class="studentCountBox" id="oldStud">
                    <span class="lnr lnr-user"></span>
                    <div class="studentCounter">
                      <h2>
                      <?php
                        $sql = "SELECT`stud_type` FROM `tbl_student_school_details` WHERE stud_type = 'old'";
                        $statement = $con->prepare($sql);
                        $statement->execute();
                        $result = $statement->get_result();
                        $row = $result->fetch_row();
                        $count = mysqli_num_rows($result);
                        echo $count;
                      ?>
                        
                      </h2>
                        <h3>
                          Old Students
                        </h3>
                    </div>
                  </div>

                  <div class="studentCountBox" id="transferStud">
                  <span class="lnr lnr-user"></span>
                  <div class="studentCounter">
                      <h2>
                      <?php
                          $sql = "SELECT`stud_type` FROM `tbl_student_school_details` WHERE stud_type = 'transferee'";
                          $statement = $con->prepare($sql);
                          $statement->execute();
                          $result = $statement->get_result();
                          $row = $result->fetch_row();
                          $count = mysqli_num_rows($result);
                          echo $count;
                        ?> 
                      </h2>
                        <h3>
                          Transferees
                        </h3>
                    </div>

                  </div>
                </div>
                  
                <div class="universal_bg_gray_table">
                  
                 <div class="row">
                    <p id="studentCountLabelId" style="font-size: 2rem; font-weight: 500;">Total Students</p>
                  <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="filterByProgramDash"  aria-label="Floating label select example">
                    <option value="All" selected>All</option>
                    <?php 
                        $sqlProgFilterDash = "SELECT DISTINCT course_program FROM `tbl_course_list`";
                        $stmtProgFilterDash = $con->prepare($sqlProgFilterDash);
                        $stmtProgFilterDash->execute();
                        $resProgFilterDash = $stmtProgFilterDash->get_result();
                        while($rowProgFilterDash = $resProgFilterDash->fetch_assoc()){
                        ?>
                          <option value="<?= $rowProgFilterDash['course_program'];?>"><?= $rowProgFilterDash['course_program'];?></option>
                      <?php }; ?>
                    </select>
                    <label for="filterByProgramDash">Choose Program</label>
                  </div>
                </div>
                 
              
              <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="filterByMajorDash" aria-label="Floating label select example">
                      <option value="All" selected>All</option>
                    </select>
                    <label for="filterByMajorDash">Choose Filter</label>
                  </div>
              </div>
              </div> 
              

                  <div class="table__dashboard mt-3" id="table_dashboard_id">
                    <table class="table mydatatable">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Program</th>
                            <th scope="col">Major</th>
                            <th scope="col">Year Level</th>
                            <th scope="col">Status</th>
                            <th scope="col">Scholarship</th>
                            <th scope="col">LRN</th>
                            <th scope="col">Email</th>
                          </tr>
                        </thead>
                        <tbody id="registrarDash">
                            
                        </tbody>
                      </table>
                    </div>

                    
              </div>
            </div>

            <!-- For admin -->
            <div class="dashBoardforAdmin">

            <div class="studentCountBoxContainer">
            <div class="employeeCountBox mb-3 d-block mx-auto" id="">
                      <span class="lnr lnr-users text-center py-1"></span>
                    <div class="employeeCounter">
                      <h2>
                        <?php
                          $sql = "SELECT `role`FROM `tbl_employee_info` WHERE `role` = 'Registrar'";
                          $statement = $con->prepare($sql);
                          $statement->execute();
                          $result = $statement->get_result();
                          $row = $result->fetch_row();
                          $count = mysqli_num_rows($result);
                          echo $count;
                        ?>
                      </h2>
                        <h3>
                          registrar(s)
                        </h3>
                    </div>
                  </div>

                   
            <div class="employeeCountBox mb-3 d-block mx-auto" id="">
              <span class="lnr lnr-users text-center py-1"></span>
            <div class="employeeCounter">
              <h2>
                <?php
                  $sql = "SELECT `role`FROM `tbl_employee_info` WHERE `role` = 'Cashier'";
                  $statement = $con->prepare($sql);
                  $statement->execute();
                  $result = $statement->get_result();
                  $row = $result->fetch_row();
                  $count = mysqli_num_rows($result);
                  echo $count;
                ?>
              </h2>
                <h3>
                  Cashier(s)
                </h3>
            </div>
          </div>

           
          <div class="employeeCountBox mb-3 d-block mx-auto" id="">
            <span class="lnr lnr-users text-center py-1"></span>
          <div class="employeeCounter">
            <h2>
              <?php
                $sql = "SELECT * FROM tbl_employee_info";
                $statement = $con->prepare($sql);
                $statement->execute();
                $result = $statement->get_result();
                $row = $result->fetch_row();
                $count = mysqli_num_rows($result);
                echo $count;
              ?>
            </h2>
              <h3>
                Total Employee(s)
              </h3>
          </div>
        </div>
        </div>


                  
                  <div class="universal_bg_gray_table">
                  
               
                 
   
                     <div class="table__dashboard mt-3" id="table_dashboard_id">
                       <table class="table mydatatable">
                           <thead class="thead-light">
                             <tr>
                               <th scope="col">Employee ID</th>
                               <th scope="col">Employee name</th>
                               <th scope="col">Registration No.</th>
                               <th scope="col">Role</th>
                               <th scope="col">Mobile Number</th>
                               <th scope="col">Email</th>
                             </tr>
                           </thead>
                           <tbody id="registrarDash">
                           <?php

                            $sql ="SELECT reg_no, employee_id, role, CONCAT(firstname,' ',middlename,' ',lastname) AS fullname,  email, contact_number 
                            FROM tbl_employee_info";
                            $stmt = $con->prepare($sql);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            $count = $res->num_rows;

                            ?>
                            <?php 
                            if($count > 0){
                            while($data = $res->fetch_assoc()){?>
                            <tr class="text-center">
                                <td><?=$data['employee_id'];?></td>
                                <td><?=$data['fullname'];?></td>
                                <td><?=$data['reg_no'];?></td>
                                <td><?=$data['role'];?></td>
                                <td><?=$data['contact_number'];?></td>
                                <td><?=$data['email'];?></td>
                                
                            </tr>
                            <?php }?>
                            <?php }else{?>
                            <tr>
                                <td><?php echo "No Records"?></td>
                            </tr>
                            <?php } 
                                                    
                            ?>
                               
                           </tbody>
                         </table>
                       </div>
   
                       
                 </div>
                </div>
          
          </div>











            <!-- MANAGE USERS -->
            <div class="tab-pane fade" id="v-pills-manage-users" role="tabpanel" aria-labelledby="v-pills-manage-users-tab">
              <p class="title_tab_universal">Manage User's Records</p>
              
              <ul class="nav nav-tabs manage-users-tab__secondary" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
                </li>
                

                <!-- For Admin -->
                <li class="nav-item">
                  <a class="nav-link" id="employees-tab" data-toggle="tab" href="#employees" role="tab" aria-controls="employees" aria-selected="false">Employees</a>
                </li>
                <!-- <li class="nav-item" id="alluser_ForAdmin">
                  <a class="nav-link" id="all-users-tab" data-toggle="tab" href="#all-users" role="tab" aria-controls="all-users" aria-selected="false">All users</a>
                </li> -->

              </ul>

            

            



              <div class="tab-content" id="myTabContent">
<!----------------------------------------------- Students Tab ---------------------------------------------------------->
                <div class="tab-pane fade show active mt-2 manage__stud-emp-all-tab" id="student" role="tabpanel" aria-labelledby="student-tab">
                  <p class="role_information text-primary">Student's Information</p>
                        
                  <form action="" method="post" class="universalForm_two" id="studForm">

                      <div class="manage_users_universal_tab_lmr_parent">
                          
                        
                          <div class="manage_users_universal_left_tab">
                          <img src="../images/registrar_img/sample_student_pic.png" class="rounded float-start" alt="...">
                          <button type="button" class="btn btn-primary my-2">Change Image</button>
                          </div>


                          <div class="manage_users_universal_mid_tab px-1">
                            
                            <div class="row g-2 mb-1">
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="number" name="student_number" class="form-control" id="studId" placeholder=" " value="" disabled>
                                <label for="studId">Student ID</label>
                              </div>
                            </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="stud_firstname" class="form-control" id="studFirstname" placeholder=" " value="" disabled>
                                  <label for="studFirstname">First name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="stud_middlename" class="form-control" id="studMiddlename" placeholder=" " value="" disabled>
                                  <label for="studMiddlename">Middle name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="stud_lastname" class="form-control" id="studLastname" placeholder=" " value="" disabled>
                                  <label for="studLastname">Last name</label>
                                </div>
                              </div>
                            </div>

                            <div class="row g-2 mb-1">
                              <div class="col-md mb-1">
                                <div class="form-floating">
                                  <input type="text" name="stud_school_year" class="form-control" id="studSchoolYear" placeholder=" " value="" disabled>
                                  <label for="studSchoolYear">School year</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <select class="form-select" name="stud_semester" id="studSemester" aria-label="Floating label select example" disabled>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                            
                                    
                    
                                  </select>
                                  <label for="studSemester">Semester</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <select class="form-select" name="stud_year_level" id="studYearLevel" aria-label="Floating label select example" disabled>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4" Selected>4th Year</option>
                                    
                    
                                  </select>
                                  <label for="studYearLevel">Year Level</label>
                                </div>
                              </div>

                            </div>
                              <div class="row g-2 mb-1">
                                <div class="col-md">
                                  <div class="form-floating">

                                    <select class="form-select" name="stud_program" id="studProgram" aria-label="Floating label select example" disabled>
                                    <?php 
                                      $sqlProg = "SELECT DISTINCT course_program FROM `tbl_course_list`";
                                      $stmtProg = $con->prepare($sqlProg);
                                      $stmtProg->execute();
                                      $resProg = $stmtProg->get_result();
                                      while($rowProg = $resProg->fetch_assoc()){
                                    ?>
                                      <option value="<?= $rowProg['course_program'];?>"><?= $rowProg['course_program'];?></option>
                                    <?php }; ?>
                                    </select>
                                    <label for="studProgram">Program</label>
                                  </div>
                                </div>
                              
                                

                          
                                <div class="col-md">
                                  <div class="form-floating">
                                    <select class="form-select" name="stud_major" id="studMajor" aria-label="Floating label select example" disabled>


                                  
                                    </select>
                                    <label for="studMajor">Major</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_fee" class="form-control text-primary" style="font-weight: bold;" id="studFee" placeholder=" " value="" disabled >
                                    <label for="studFee">Fee</label>
                                  </div>
                                </div>


                              </div>
                              

                              
                              
                              <div class="row g-2 mb-1"> 
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <select class="form-select" name="stud_scholarship" id="studScholarship" aria-label="Floating label select example" disabled>
                                      <option value="N/A">N/A</option>
                                      <?php 
                                      $slqScholar = "SELECT DISTINCT scholar_description FROM `tbl_scholarship`";
                                      $stmtScholar = $con->prepare($slqScholar);
                                      $stmtScholar->execute();
                                      $resScholar = $stmtScholar->get_result();
                                      while($rowScholar = $resScholar->fetch_assoc()){
                                    ?>
                                      <option value="<?= $rowScholar['scholar_description'];?>"><?= $rowScholar['scholar_description'];?></option>
                                    <?php }; ?>
                                      <!--  -->
                                      </select>
                                      <label for="studScholarship">Scholarship</label>
                                    </div>
                                  </div>

                                  
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <select class="form-select" name="stud_discount" id="studDiscount" aria-label="Floating label select example" disabled>
                                      <option value="N/A">N/A</option>
                                      <?php 
                                      $slqDiscount = "SELECT * FROM `tbl_discount`";
                                      $stmtDiscount = $con->prepare($slqDiscount);
                                      $stmtDiscount->execute();
                                      $resDiscount = $stmtDiscount->get_result();
                                      while($rowDiscount = $resDiscount->fetch_assoc()){
                                    ?>
                                      <option value="<?= $rowDiscount['discount_type'];?>"><?= $rowDiscount['discount_type'];?></option>
                                    <?php }; ?>
                                      </select>
                                      <label for="studDiscount">Discount</label>
                                    </div>
                                  </div>

                                  
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <select class="form-select" name="stud_status" id="studStatus" aria-label="Floating label select example" disabled>
                                      <option value="" selected disabled></option>
                                        <option value="old">Old</option>
                                        <option value="transferee">Transferee</option>
                                        
                                        
                        
                                      </select>
                                      <label for="studStatus">Status</label>
                                    </div>
                                  </div>

                                  
                                  <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_lrn" class="form-control" id="studLrn" placeholder=" " value="" disabled >
                                    <label for="studLrn">LRN</label>
                                  </div>
                                </div>

                                </div> 
                            </div>


                          <div class="manage_users_students_right_tab">
                            <p class="text-center">Submitted Requirements</p>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_form137" value="✓" id="form137" disabled >
                              <label class="form-check-label" for="form137">
                                Form 137
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_form138" value="✓" id="form138" disabled>
                              <label class="form-check-label" for="form138">
                                Form 138
                              </label>
                            </div>

                            
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_psa" value="✓" id="psa" disabled>
                              <label class="form-check-label" for="psa">
                                PSA Birth Certificate
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_good_moral" value="✓" id="goodMoral" disabled>
                              <label class="form-check-label" for="goodMoral">
                                Good Moral
                              </label>
                            </div>
                          </div>
                        </div>
                        
                      
                  
                      <div class="buttons_manage_universal">
                      <button type="button" name="" id="add" class="btn btn-info">Add</button>
                      <!-- <button type="submit" name="stud_update" class="btn btn-warning">Edit</button> -->
                      <button type="button" name="stud_save" id="studSave" class="btn btn-success"disabled >Save </button>
                      <button type="submit" name="stud_delete" id ="stud_delete" class="btn btn-danger" disabled>Delete</button>

                      <a class="btn btn-primary" id="stud_archive">Archive</a>
                      <script type="text/javascript">
                              
                              const popUpArchive = document.querySelector('.popUpArchive')
                              const popUpinner = document.querySelector('.popUpArchiveinner')

                                document.querySelector('#stud_archive').addEventListener("click", function(){
                                popUpArchive.style.visibility = "visible"
                                popUpArchive.style.opacity = "1"
                                popUpinner.classList.toggle('animate__animated')
                                popUpinner.classList.toggle('animate__bounceIn')
                              })

                                document.querySelector('.closeBtnPopUp').addEventListener("click", function(){
                                  popUpArchive.style.visibility = "hidden"
                                  popUpArchive.style.opacity = "0"
                                  popUpinner.classList.toggle('animate__animated')
                                  popUpinner.classList.toggle('animate__bounceIn')
                              })
                            </script>


                      </div>
                    </form> 
                    

                      
                    

                      <hr>
                      <form action="" class="universal_search_form">
                        <input  type="text" name="searchStud" id="searchStud" placeholder="Search">
                        <button type="button" class="btn btn-primary" id="searchStud_btn">Search</button>
                      </form>
                      <div class="manage_student_tab_below mt-4">
                        <p class="role_information text-success">All Student's list and Filtering</p>


                        <div class="row g-2">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select class="form-select" id="filterByProgram" aria-label="Floating label select example">
                            <option value="%">All</option>
                            <?php 
                              $sqlProgFilter = "SELECT DISTINCT course_program FROM `tbl_course_list`";
                              $stmtProgFilter = $con->prepare($sqlProgFilter);
                              $stmtProgFilter->execute();
                              $resProgFilter = $stmtProgFilter->get_result();
                                      while($rowProgFilter = $resProgFilter->fetch_assoc()){
                                    ?>
                                      <option value="<?= $rowProgFilter['course_program'];?>"><?= $rowProgFilter['course_program'];?></option>
                            <?php }; ?>
                            </select>
                            <label for="filterByProgram">Program</label>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select class="form-select" id="filterByMajor" aria-label="Floating label select example">
                              <option value="" selected>All</option>
                              
              
                            </select>
                            <label for="filterByMajor">Major</label>
                          </div>
                        </div>
                      </div>

                      <div class="table__" style="overflow-x: auto;">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <!-- <th scope="col">Payments Status</th> -->
                            <th scope="col">Form 137</th>
                            <th scope="col">Form 138</th>
                            <th scope="col">PSA Birth Certificate</th>
                            <th scope="col">Good Moral</th>
                            <!-- <th scope="col">History</th> -->
                            <th scope="col">Action</th>
                            
                          </tr>

                        </thead>
                        <tbody id="viewStud">
                              
                        </tbody>
                      </table>
                    </div>
                    </div>
                </div>
              




    <!-------------------------------------------- Employees Tab -------------------------------------->
                <div class="tab-pane fade mt-2 manage__stud-emp-all-tab" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                  <p class="role_information text-primary">Employee's Information</p>

                  <form method="post" class="universalForm_two" id="empForm">
                    <div class="manage_users_universal_tab_lmr_parent">
                      <!-- Profile Picture -->
                      <div class="manage_users_universal_left_tab">
                        <img src="../images/registrar_img/sample_employee_pic.png" class="rounded float-start" alt="...">
                        <button type="button" class="btn btn-primary my-2">Change Image</button>
                      </div>
                      <!-- Emoployee Details -->
                      <div class="manage_users_universal_mid_tab px-1">
                        <div class="row g-2 mb-1">
                          <!-- Employee Role -->
                          <div class="col-md">
                            <div class="form-floating">
                              <select class="form-select" name="emp_role" id="empRole" aria-label="Floating label select example" disabled>
                                <option value="N/A">N/A</option>
                                <option value="Registrar">Registrar</option>
                                <option value="Cashier">Cashier</option>
                              </select>
                              <label for="empRole">Role</label>
                            </div>
                          </div>
                          <!-- Employee ID -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" name="emp_id" id="empId" placeholder=" " value="" disabled>
                              <label for="empId">Employee ID</label>
                            </div>
                          </div>
                        </div>

                        <div class="row g-2 mb-1">
                          <!-- Employee Firsname -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_firstname" id="empFirstname" placeholder=" " value="" disabled>
                              <label for="empFirstname">First name</label>
                            </div>
                          </div>
                          <!-- Employee Middlename -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_middlename" id="empMiddlename" placeholder=" " value="" disabled>
                              <label for="empMiddlename">Middle name</label>
                            </div>
                          </div>
                          <!-- Employee Lastname -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_lastname" id="empLastname" placeholder=" " value="" disabled>
                              <label for="empLastname">Last name</label>
                            </div>
                          </div>
                        </div>

                        <div class="row g-2 mb-1">
                          <!-- Employee Gender -->
                          <div class="col-md-3">
                            <div class="form-floating">
                              <select class="form-select" name="emp_sex" id="empSex" aria-label="Floating label select example" disabled>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                
                              </select>
                              <label for="empGender">Sex</label>
                            </div>
                          </div>
<!-- 
                          <div class="col-md-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" name="emp_birthdate" id="floatingInputGrid" placeholder="">
                              <label for="floatingInputGrid">Birthdate</label>
                            </div>
                          </div> -->

                          <!-- <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" name="emp_age" id="floatingInputGrid" placeholder=" " value="">
                              <label for="floatingInputGrid">Age</label>
                            </div>
                          </div> -->
                          <!-- Employee Address -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_address" id="empAddress" placeholder=" " value="" disabled>
                              <label for="empAddress">Address</label>
                            </div>
                          </div>
                        </div>

                        <div class="row g-2 mb-1">
                          <!-- Employee Email Address -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="email" class="form-control" name="emp_email" id="empEmail" placeholder=" " value="" disabled>
                              <label for="empEmail">Email</label>
                            </div>
                          </div>
                          <!-- Employee Contact Nunmber -->
                          <div class="col-md">
                              <div class="form-floating">
                                <input type="number" class="form-control" name="emp_contact_number" id="empContactNo" placeholder=" " value="" disabled>
                                <label for="empContactNo">Contact number</label>
                              </div>
                          </div>
<!-- 
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="emp_citizenship" id="floatingInputGrid" placeholder=" " value="">
                                <label for="floatingInputGrid">Citizenship</label>
                              </div>
                            </div> -->

                            <!-- <div class="col-md">
                              <div class="form-floating">
                                <input type="text" class="form-control" name="emp_civil_status" id="floatingInputGrid" placeholder=" " value="">
                                <label for="floatingInputGrid">Civil Status</label>
                              </div>
                            </div> -->
                        </div>
                      </div>
                    </div> 
                  
                    <div class="buttons_manage_universal">
                      <button type="button" name="" class="btn btn-info" id="empAdd">Add</button>
                      <button type="submit" name="emp_save" class="btn btn-success" id="empSave" disabled>Save</button>
                      <button type="submit" name="emp_delete" class="btn btn-danger" id="empDel" disabled>Delete</button>
                      
                    </div> 
                  </form>
                  <hr>
                  <div class="manage_student_tab_below mt-4">
                    <p class="role_information text-success">All Employee's list and Filtering</p>


                    <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="filterBy" aria-label="Floating label select example">
                          <option value="%" selected>All</option>
                          <option value="Registrar">Registrar</option>
                          <option value="Cashier">Cashier</option>
                          
          
                        </select>
                        <label for="filterBy">Role</label>
                      </div>
                    </div>
                  </div>

                <div class="table__" style="overflow-x: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Hire Date</th>
                        <th scope="col">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody id="viewEmployee">
                      
                    </tbody>
                  </table>
                  </div>

                  </div>


                </div>
                
                <!-- All user's Tab -->
                <!-- <div class="tab-pane fade mt-2 manage__stud-emp-all-tab" id="all-users" role="tabpanel" aria-labelledby="all-users-tab">
                  <p class="role_information text-primary">Choose Account to Filter</p>

                  

                  <div class="row g-2">

                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>None</option>
                          <option value="BSIT_WMA">First name</option>
                          <option value="Registrar">Last name</option>
                         
                          
          
                        </select>
                        <label for="floatingSelect">Sort By</label>
                      </div>
                    </div>


                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>All</option>
                          <option value="BSIT_WMA">Student</option>
                          <option value="Registrar">Registrar</option>
                          <option value="Cashier">Cashier</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                      </div>
                    </div>
                    

                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" "> 
                        <label for="floatingInputGrid">Reg date From</label>
                      </div>
                    </div>
                    
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" ">
                        <label for="floatingInputGrid">Reg date To</label>
                      </div>
                    </div>

                    <div class="row g-2 mb-2">
                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Apply</button>
                      </div>

                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Clear Filter</button>
                      </div>

                    <div class="col-md">  
                      <button type="button" class="btn btn-outline-primary font p-2 float-end">Export Records to Excel</button>
                    </div>
                  </div>

                  <hr>
                  <div class="table__" style="overflow-x: auto;">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">2018300366</th>
                            <td>Justine Dave</td>
                            <td>Student</td>
                            <td>delosreyes366@gmail.com</td>
                            <td><button class="btn btn-outline-primary archiveBtn">Archive</button></td>

                      

                            <td>Enrolled</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">2018300478</th>
                            <td>Michael</td>
                            <td>Isla</td>
                            <td>Student</td>
                            <td>isla478@gmail.com</td>
                            <td>Not Enrolled</td>
                          </tr>
                          <tr>
                            <th scope="row">2018300902</th>
                            <td>Denver</td>
                            <td>Pulido</td>
                            <td>Student</td>
                            <td>pulido902@gmail.com</td>
                            <td>Dropped</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">2018300612</th>
                            <td>Mery Anne</td>
                            <td>Villano</td>
                            <td>Student</td>
                            <td>villano612@gmail.com</td>
                            <td>Graduate</td>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>


                  
                </div> -->




              </div>
              </div>
        
            



<!------------------------ ARCHIVES --------------------------------->

            <div class="tab-pane fade" id="v-pills-archives" role="tabpanel" aria-labelledby="v-pills-archives-tab">
              <p class="title_tab_universal">Archives</p>

              <form action="" class="universal_search_form">
                <input type="text" name="searchArchive" id="searchArchive" placeholder="Search">
                <button type="button" class="btn btn-primary" id="searchArchive_btn">Search</button>
              </form>

              
              <div class="universal_bg_gray_table mt-3">
              <p class="role_information text-primary mt-2">Choose Account to Filter</p>

                  <div class="row g-2">

                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="BSIT_WMA" selected>All</option>
                          <option value="Graduated" selected>Graduate</option>
                          <option value="Dropout">Dropout</option>
                          <option value="Transfer">Transfer</option>
                          <option value="Resign">Resign</option>
                          <option value="Resign">Terminate</option>
                        </select>
                        <label for="floatingSelect">Reason</label>
                      </div>
                    </div>


                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>All</option>
                          <option value="BSIT_WMA">Student</option>
                          <option value="Registrar">Registrar</option>
                          <option value="Cashier">Cashier</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                      </div>
                    </div>
                    

                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" "> 
                        <label for="floatingInputGrid">Date archived From</label>
                      </div>
                    </div>
                    
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" ">
                        <label for="floatingInputGrid">Date archived To</label>
                      </div>
                    </div>

                    <div class="row g-2 mb-2">
                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Apply</button>
                      </div>

                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Clear Filter</button>
                      </div>

                    <div class="col-md">  
                      <button type="button" onclick="exportTableToExcel('archiveTable', 'Archive')" class="btn btn-outline-primary font p-2 float-end">Export Records to Excel</button>
                    </div>
                  </div>

                  <hr>
                  <div class="table__" style="overflow-x: auto;">
                    <table id="archiveTable" class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID number</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            
                          </tr>
                        </thead>
                        <tbody id="registrarArchive">
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>

             <!-- REPORTS -->
             <div class="tab-pane fade reports-tab" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
              <p class="title_tab_universal">Generated Reports</p>

              <div class="col universal_bg_gray_table p-3">
                <span class="text-primary" style="font-size: 1.3rem; font-weight: 500;">View Transactions:</span>
                
                <button class="btn btn-outline-primary float-end mx-1">Annually</button>
                  <button class="btn btn-outline-primary float-end mx-1">Monthly</button>
                  <button class="btn btn-outline-primary float-end mx-1">Daily</button>
                </div>
                
                
              <div class="col universal_bg_gray_table p-3">
                <form action="" class="d-flex justify-content-between">
                <div class="col-md-3">
                  <div class="form-floating">
                    <select class="form-select col-2" id="floatingSelect" aria-label="Floating label select example">
                    <option value="" selected>All</option>
                      <option value="" selected>Cash</option>
                      <option value="">Fund Transfer</option>
                    </select>
                    <label for="floatingSelect">Payment Method</label>

                  </div>
                  <div class="col-md mt-1">
                    <button class="btn btn-primary ">Apply</button>
                    <button class="btn btn-primary ">Clear</button>
                  </div>
                </div>
                
              </form>
              </div>
            </div>


            <!-- Student Fees -->
            <div class="tab-pane fade studFee-tab" id="v-pills-studFee" role="tabpanel" aria-labelledby="v-pills-studFee-tab">
              <p class="title_tab_universal">Student Fees</p>
                <form action="" class="universal_search_form">
                  <input type="text" name="searchDash" id="searchDash" placeholder="Search">
                  <button type="button" class="btn btn-primary" id="searchDash_btn">Search</button>
                </form>

              <div class="col universal_bg_gray_table p-3">
                <div class="col-md-6 my-1">
                  <div class="form-floating">
                    <select class="form-select" id="sortByDashData" aria-label="Floating label select example">
                            <option value="" selected>All</option>
                    </select>
                    <label for="sortByDashData">Filter by Remarks:</label>
                  </div>
                </div>

                <div class="table__ mt-4" style="overflow-x: auto;">
                  <table class="table">
                      <thead class="text-center">
                        <tr>
                          <th scope="col">Student ID</th>
                          <th scope="col">Full name</th>
                          <th scope="col">Program</th>
                          <th scope="col">Major</th>
                          <th scope="col">Year Level</th>
                          <th scope="col">Tuition Fee</th>
                          <th scope="col">Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>



            
            <!-- Fees Management -->
            <div class="tab-pane fade" id="v-pills-fees" role="tabpanel" aria-labelledby="v-pills-fees-tab">
              <p class="title_tab_universal">Manage Fees</p>
              <form action="" class="universal_search_form">
                <input type="text" name="searhProgram" id="searhProgram" placeholder="Search">
                <button type="button" class="btn btn-primary" id="searchProgram-btn">Search</button>
              </form>
              <div class="feesManagement_miniDashboard my-2 p-4 d-flex justify-content-between">
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(0)"><i class="fas fa-plus"></i>&nbsp;Add School Year</button>
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(1)"><i class="fas fa-plus"></i>&nbsp;Add Bachelor's Program</button>
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(2)"><i class="fas fa-plus"></i>&nbsp;Add Scholarship</button>
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(3)"><i class="fas fa-plus"></i>&nbsp;Add Discount</button>
              </div>
              <div class="col universal_bg_gray_table">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Course ID</th>
                      <th scope="col">Program</th>
                      <th scope="col">Major</th>
                      <th scope="col">Year Level</th>
                      <th scope="col">Duration</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Tuition Fee</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="viewAvaibleProgram">

                  </tbody>
                </table>
              </div>
            </div>

            <!-- For POPUPS ADMIN -->
            <script type="text/javascript">
                const parentContainerPopUpForAdmin = document.getElementsByClassName('popUpAdmin_FeesManagement')
                const childContainerPopUpForAdmin = document.getElementsByClassName('popUpFeesMgmtinner')
                const buttonsAdmin = document.getElementsByClassName('feesMgmt_btn')
                const closeBtnPopUp = document.getElementsByClassName('closeBtnPopUp')

                function popUpAdmin_SchoolFees(counter){
                  parentContainerPopUpForAdmin[counter].style.visibility = "visible"
                  parentContainerPopUpForAdmin[counter].style.opacity = "1"
                  childContainerPopUpForAdmin[counter].classList.toggle('animate__animated')
                  childContainerPopUpForAdmin[counter].classList.toggle('animate__bounceIn')
                }

                function closePopUp(index){
                  parentContainerPopUpForAdmin[index].style.visibility = "hidden"
                  parentContainerPopUpForAdmin[index].style.opacity = "0"
                  childContainerPopUpForAdmin[index].classList.toggle('animate__animated')
                  childContainerPopUpForAdmin[index].classList.toggle('animate__bounceIn')
                }
                






            </script>
        

          
          </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <script type="text/javascript">
        // LIVE CLOCK
        let clockElement = document.getElementById('reg-date-time');
    
        function clock() {
            clockElement.textContent = new Date().toLocaleTimeString();
            clockElement.textContent += " - " + new Date().toLocaleDateString();
        }
        setInterval(clock, 1000);   

    
          function profile_link_show(){
            let profile_link = document.getElementById('profile_link_id');
          profile_link.classList.toggle('show');
          }
      </script>
      <!-- Registrar Dashboard -->
      <script>
        const studentCountLabel = document.querySelector('#studentCountLabelId');
          //total student
        $(document).ready(function() {
          sortDisplay('All');
          // Total Student
          $("#totalStud").click(function(e) {
            sortDisplay('All');
            $('#filterByProgramDash').val('All');
            $("#filterByMajorDash").empty();
            $("#filterByMajorDash").append("<option value='"+'%'+"'>"+'All'+"</option>");
            studentCountLabel.style.color = "#56A8CBFF"
            studentCountLabel.textContent = "Total Students"
          });
          // Old Student
          $("#oldStud").click(function(e) {
            let stud_type = 'old'
            sortDisplay(stud_type);
            $('#filterByProgramDash').val('All');
            $("#filterByMajorDash").empty();
            $("#filterByMajorDash").append("<option value='"+'%'+"'>"+'All'+"</option>");
            studentCountLabel.style.color = "#7c55c4"
            studentCountLabel.textContent = "Old Students"
          });
          //Transferee Student
          $("#transferStud").click(function(e) {
            let stud_type = 'transferee'
            $('#filterByProgramDash').val('All');
            $("#filterByMajorDash").empty();
            $("#filterByMajorDash").append("<option value='"+'%'+"'>"+'All'+"</option>");
            studentCountLabel.style.color = "var(--green-color)"
            studentCountLabel.textContent = "Transferees"
            sortDisplay(stud_type);
          });
          // Search Button
          $("#searchDash_btn").click(function(){
            $.ajax({
              type:'POST',
              url:'../includes/dashboard-registrar.php',
              data:{
                "search": 1,
                "query":$("#searchDash").val(),
              },
              success:function(data){
                $("#registrarDash").html(data);
                      
              }
            });
          });
          // Filter By Program
          $('#filterByProgramDash').change(function (e) { 
              let filterByProgram = $('#filterByProgramDash').val();
              let studType = $('#studentCountLabelId').text().split(' ')[0]
              onChangeProgramFilterDash(filterByProgram)
              viewStudetListFilterDash(studType,filterByProgram)
          });
          // Filter By Major
          $('#filterByMajorDash').change(function (e) { 
                  e.preventDefault();
                  let filterByMajor = $('#filterByMajorDash').val();
                  let filterByProgram = $('#filterByProgramDash').val();
                  let studType = $('#studentCountLabelId').text().split(' ')[0]
                  viewStudetListFilterDash(studType,filterByProgram,filterByMajor)
          });
            //-----------OLD/TRANSFER STUDENT------------
            function sortDisplay(stud_type){
              $.ajax({
                type: "POST",
                url: "../includes/dashboard-registrar.php",
                dataType: "html",
                data: {
                  "viewStudDash": 1,
                  "stud_type" : stud_type
                },
                  success: function (data) {
                    $('#registrarDash').html(data);
                  }
              });
            }
            // Student List Filter Program AJAX Request to fill the filter by major options
            function onChangeProgramFilterDash(program){
                  $.ajax({
                    url: '../includes/comboBoxData.php',
                    type: 'post',
                    data: {
                      "programOnChange": 1,
                      "program": program
                    },
                    success:function(response){ 
                      let len = response.length;
                      $("#filterByMajorDash").empty();
                      $("#filterByMajorDash").append("<option value='"+'%'+"'>"+'All'+"</option>");
                      // Looping the Items of Major By Program
                      for( let i = 0; i<len; i++){
                        let major = response[i]['major'];
                        $("#filterByMajorDash").append("<option value='"+major+"'>"+major+"</option>");
                      } 
                    }
                  });
                }
                // Student Filter By Program and Major AJAX REQUEST
                function viewStudetListFilterDash(studType,byProgram,byMajor){
                  $.ajax({
                    type: "GET",
                    url: "../includes/dashboard-registrar.php",
                    data:{
                      "viewStudDataFiltered": 1,
                      'byProgram': byProgram,
                      'byMajor': byMajor,
                      'studType': studType
                    },
                    dataType: "html",
                    success: function (data) {
                      $('#registrarDash').html(data);
                      // console.log(data)
                    }
                  });
                }
        });
      </script>
      <!-- Manage User-Student Registrar Access -->
      <script>
        let partialStudFields = ['studId','studFirstname','studMiddlename','studLastname','studSemester','studYearLevel','studProgram','studMajor','studFee','studScholarship','studDiscount','form137','form138','psa','goodMoral']
        let allStudFields = ['studId','studFirstname','studMiddlename','studLastname','studSemester','studYearLevel','studProgram','studMajor','studFee','studScholarship','studDiscount','form137','form138','psa','goodMoral','studSchoolYear','studStatus','studLrn']
        let status;
        $(document).ready(function () {
          $('#v-pills-manage-users-tab').click(function (e) { 
            e.preventDefault();
            let allStud = '%';
            viewStudetList(allStud);//Show All Data Table
          });
          // ADD
          $('#add').click(function (e) { 
            studFieldsDisbaled(partialStudFields,false);
            $("#studSave").prop('disabled', false);
            $("#add").prop('disabled', true);
            let program = $("#studProgram").val();
            onChangeProgram(program,null);

          });
           // Trigger OnChange Item of Dropdown Program
          $("#studProgram").change(function(){
            let program = $(this).val();
            onChangeProgram(program,null);
          });
          // Trigger OnChange Item of Dropdown Major
          $("#studMajor").change(function(){
            let major = $(this).val();
            let sem = $('#studSemester').val();
            let yearLevel = $('#studYearLevel').val();
            onChangeMajor(major,sem,yearLevel)
          });
          $('#studSemester').change(function (e) { 
            let sem = $(this).val();
            let major = $('#studMajor').val();
            let yearLevel = $('#studYearLevel').val();
            onChangeMajor(major,sem,yearLevel)
            
          });
          $('#studYearLevel').click(function (e) { 
            let yearLevel = $(this).val();
            let major = $('#studMajor').val();
            let sem = $('#studSemester').val();
            onChangeMajor(major,sem,yearLevel)
            
          });
          // Save and Update
          $('#studSave').click(function (e) { 
            e.preventDefault();
            let studSave = document.getElementById('studSave')
            if(studSave.innerText == 'Update'){
              let updateStud = new FormData(document.getElementById('studForm'))
              updateStud.append('update', 'update');
              updateStud.append('empId','<?=$_SESSION['employeeId'];?>')
              updateStud.append('empName','<?=$_SESSION['fullname'];?>')
              studActions(updateStud)
              studFieldsDisbaled(allStudFields,true);
              $('#studSave').text('Save');
              $("#add").prop("disabled", false);
              $("#studSave").prop("disabled", true);
              $("#stud_delete").prop("disabled", true);
            }
            // Save
            if(studSave.innerText == 'Save'){
              if ($("#studId").val() == 0){
                $("#studId").focus()
              }else if ($("#studFirstname").val() == ""){
                $("#studFirstname").focus()
              }else if ($("#studMiddlename").val() == ""){
                $("#studMiddlename").focus()
              }else if ($("#studLastname").val() == ""){
                $("#studLastname").focus()
              }else if ($("#studFee").val() == ""){
                $("#studFee").focus()
              }else{
                // Request To Save Data Via AJAX
                let newStud = new FormData(document.getElementById('studForm'))
                newStud.append('newStud', 'newStud');
                newStud.append('empId','<?=$_SESSION['employeeId'];?>')
                newStud.append('empName','<?=$_SESSION['fullname'];?>')
                studActions(newStud)
                studFieldsDisbaled(partialStudFields,true);
                $("#studSave").prop('disabled', true);
              }
            }
          });
          // Edit Student Data
          $(document).on('click', '#edit', function(){
            let id = $(this).attr("data-id");
            $("#add").prop("disabled", true);
            $.ajax({
              type: "POST",
              url: "../includes/manage_student.php",
              data: {
                "edit": 1,
                "id": id
              },
              dataType: 'JSON',
              success: function (data) {
                console.log(data)
                $("#studId").val(data.stud_id);
                $("#studFirstname").val(data.firstname);
                $("#studLastname").val(data.lastname);
                $("#studMiddlename").val(data.middlename);
                $("#studeYearLevel").val(data.year_level);
                $("#studProgram").val(data.program);
                $("#studDiscount").val(data.discount);
                $("#studSchoolYear").val(data.csi_school_year);
                $("#studSemester").val(data.csi_semester);
                $("#studScholarship").val(data.scholar_type);
                $("#studStatus").val(data.stud_type);
                $("#studLrn").val(data.stud_lrn);
                if(data.form_137 != ''){
                  $("#form137").prop('checked', true);
                }
                if(data.form_138 != ''){
                  $("#form138").prop('checked', true);
                }
                if(data.psa_birth_cert != ''){
                  $("#psa").prop('checked', true);
                }
                if(data.good_moral != ''){
                  $("#goodMoral").prop('checked', true);
                }
          
                let program = data.program
                let selectedValue = data.major
                onChangeProgram(program,selectedValue) //Dropdown Options of Major and selected Option base current major of student
                $("#studFee").val(data.tuition_fee); 
                studFieldsDisbaled(allStudFields,false);
                $("#studSave").text('Update');
                $("#studSave").removeAttr('disabled');
                $("#stud_delete").removeAttr('disabled');
              }
            });
          });
          // Search Button
          $("#searchStud_btn").click(function(){
            let query = $("#searchStud").val()
            viewStudetList(query)
          });
          // Delete AJAX Request
          $('#stud_delete').click(function (e) { 
            e.preventDefault();
            let id = $("#studId").val();
            console.log(id);
            Swal.fire({
              title: 'Are you sure?',
              text: "Student Record will be delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  type: "POST",
                  url: "../includes/manage_student.php",
                  data: {
                    "delete": 1,
                    "id": id
                  },
                  dataType: 'JSON',
                  success: function (response) {
                    Swal.fire({
                      icon: response.status,
                      text: response.message,
                      confirmButtonText: 'Ok'
                    })
                    if(response.status == 'success'){
                      $('#studForm').trigger('reset');
                    }
                    let allStud = '%';
                    viewStudetList(allStud);;
                    studFieldsDisbaled(allStudFields,true);
                    $("#stud_delete").prop("disabled", true);
                    $("#studSave").prop("disabled", true);
                    $("#studSave").text('Save');
                    $("#add").removeAttr('disabled');
                  }
                });
              }
            })
          });
          // Filter By Program
          $('#filterByProgram').change(function (e) { 
            e.preventDefault();
            let byProgram = $(this).val();
            onChangeProgramFilter(byProgram);
            viewStudetListFilter(byProgram)
          });
          // Filter By Major
          $('#filterByMajor').change(function (e) { 
            e.preventDefault();
            let byMajor = $(this).val();
            let byProgram = $("select#filterByProgram option").filter(":selected").val();
            viewStudetListFilter(byProgram,byMajor)
          });
          // AJAX REQUEST FOR SAVE,UPDATE
          function studActions(formdata){
            $.ajax({
            type: "POST",
            url: "../includes/manage_student.php",
            data: formdata,
            contentType: false,
            processData:false,
            dataType: 'JSON',
            success: function (response) {
              console.log(response)
              Swal.fire({
                icon: response.status,
                text: response.message,
                confirmButtonText: 'Ok'
              })
              if(response.status == 'success'){
                $('#studForm').trigger('reset');
                let allStud = '%';
            viewStudetList(allStud)
              }
            }
          })
        }
          // onChange function selection in Program to put appropriate dropdown Options Major
          function onChangeProgram(program,selectedValue){
            $.ajax({
              url: '../includes/comboBoxData.php',
              type: 'post',
              data: {
                "programOnChange": 1,
                "program": program
              },
              success:function(response){ 
                let len = response.length;
                $("#studMajor").empty();
                // Looping the Items of Major By Program
                for( let i = 0; i<len; i++){
                  let major = response[i]['major'];
                  $("#studMajor").append("<option value='"+major+"'>"+major+"</option>");
                }
                // Set item slected of Dropdown Major 
                if(selectedValue != null){
                  $('#studMajor').val(selectedValue);
                }
                // Provind Auto fill fees base on major,sem, and year level
                let major = $('#studMajor').val();
                let sem = $('#studSemester').val();
                let yearLevel = $('#studYearLevel').val();
                onChangeMajor(major,sem,yearLevel)
              }
            });
          }
          // Student List Filter Program AJAX Request to fill the filter by major options
          function onChangeProgramFilter(program){
            $.ajax({
              url: '../includes/comboBoxData.php',
              type: 'post',
              data: {
                "programOnChange": 1,
                "program": program
              },
              success:function(response){ 
                let len = response.length;
                $("#filterByMajor").empty();
                $("#filterByMajor").append("<option value='"+'%'+"'>"+'All'+"</option>");
                // Looping the Items of Major By Program
                for( let i = 0; i<len; i++){
                  let major = response[i]['major'];
                  $("#filterByMajor").append("<option value='"+major+"'>"+major+"</option>");
                } 
              }
            });
          }
          // onChange function Selection Option in Major to provide tuition fee
          function onChangeMajor(major,sem,yearLevel){
            $.ajax({
              type: "POST",
              url: "../includes/comboBoxData.php",
              data: {
                "majorOnChange": 1,
                "major": major,
                "sem":sem,
                "yearLevel": yearLevel
              },
              dataType: 'JSON',
              success: function (response) {
                if(response == null){
                  $("#studFee").val('');
                }else{
                  $("#studFee").val(response);
                }
                
                // console.log(response)
              }
            }); 
          }
          // Dislay Student Info in the table Include search  feature |AJAX REQUEST
          function viewStudetList(query){
            $.ajax({
              type: "GET",
              url: "../includes/manage_student.php",
              data:{
                "viewStudData": 1,
                'query': query,
              },
              dataType: "html",
              success: function (data) {
                $('#viewStud').html(data);
              }
            });
          }
          // Student Filter By Program and Major AJAX REQUEST
          function viewStudetListFilter(byProgram,byMajor){
            $.ajax({
              type: "GET",
              url: "../includes/manage_student.php",
              data:{
                "viewStudDataFiltered": 1,
                'byProgram': byProgram,
                'byMajor': byMajor,
              },
              dataType: "html",
              success: function (data) {
                $('#viewStud').html(data);
              }
            });
          }
          // Enable/Disabled Student Fields
          function studFieldsDisbaled(fields,bol){
            for(let i = 0; i < fields.length; i++) {
              $("#"+fields[i]).prop('disabled', bol);
            }
          }
        });
      </script>
      <script>
        $(document).ready(function () {
          
          $("#searchArchive_btn").click(function(){
            $.ajax({
              type:'POST',
              url:'../includes/searchArchive.php',
              data:{
                "search": 1,
                "query":$("#searchArchive").val(),
              },
              success:function(data){
                $("#registrarArchive").html(data);
                
              }
            });
          });
          
        });
        
      
      </script>
      <script>
          // function display(){
          //     $.ajax({
          //       type: "POST",
          //       url: "../includes/registrarArchive.php",
          //       dataType: "html",
          //       success: function (data) {
          //         $('#registrarArchive').html(data);
          //       }
          //     });
          // }
          function exportTableToExcel(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Specify file name
            filename = filename?filename+'.xls':'excel_data.xls';
            
            // Create download link element
            downloadLink = document.createElement("a");
            
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob){
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
        }
      </script>
      <!-- Script For Manage User-Employee Admin Access -->
      <script>
        let allData = '%'
        let partialfields = ['empRole','empId','empFirstname','empMiddlename','empLastname']
        let allfields = ['empRole','empId','empFirstname','empMiddlename','empLastname','empSex','empAddress','empEmail','empContactNo']
        // Mange User Clicked
        $('#v-pills-manage-users-tab').click(function (e) { 
          e.preventDefault();
          viewEmployee(allData)
        });
        // ADD
        $('#empAdd').click(function (e) { 
          e.preventDefault();
          empFieldsAttr(partialfields,false);
          $("#empAdd").prop("disabled", true);
          $("#empSave").prop("disabled", false);
        });
        // Two way process Save and Save base on button text
        $("#empSave").click(function (e) { 
          e.preventDefault();
          if($('#empSave').text() == 'Update'){
            let updateEmp = $('#empForm').serialize() + '&updateEmp=updateEmp';
            empActions(updateEmp);
            $('#empSave').text('Save');
            empFieldsAttr(allfields,true)
            $("#empAdd").prop("disabled", false);
            $("#empSave").prop("disabled", true);
            $("#empDel").prop("disabled", true);

          }else{
            let newEmp = $('#empForm').serialize() + '&newEmp=newEmp';
            empActions(newEmp);
            empFieldsAttr(partialfields,true)
            $("#empAdd").prop("disabled", false);
            $("#empSave").prop("disabled", true);
          }
        });
        // Edit Button
        $(document).on('click', '#empEdit', function(){
          let id = $(this).attr("data-id");

          empFieldsAttr(allfields,false)
          $('#empSave').text('Update');
          $("#empAdd").prop("disabled", true);
          $("#empSave").prop("disabled", false);
          $("#empDel").prop("disabled", false);
          // AJAX request edit
          $.ajax({    
              type: "GET",
              url: "../includes/manage_employee.php", 
              data:{empEdit:id},
              beforeSend: function () {
                loaderOpen()
              },                             
              success: function(data){   
                $("#empRole").val(data.role);               
                $("input[name='emp_id']").val(data.empId);
                $("input[name='emp_firstname']").val(data.firstname);
                $("input[name='emp_middlename']").val(data.middlename);
                $("input[name='emp_lastname']").val(data.lastname);
                $("#empSex").val(data.sex);
                $("input[name='emp_address']").val(data.address);
                $("input[name='emp_email']").val(data.email);
                $("input[name='emp_contact_number']").val(data.contact_number);
                
              },
              complete: function () { 
                loaderClose() 
              },
          });
        })
        // Delete Employee Data
        $('#empDel').click(function (e) { 
          e.preventDefault();
          let delEmp = $('#empForm').serialize() + '&delEmp=delEmp';
          empActions(delEmp);
          $('#empSave').text('Save');
            empFieldsAttr(allfields,true)
            $("#empAdd").prop("disabled", false);
            $("#empSave").prop("disabled", true);
            $("#empDel").prop("disabled", true);
        });
        // Filter By
        $('#filterBy').change(function (e) { 
          e.preventDefault();
          let filterBy =  $("select#filterBy option").filter(":selected").val();
          viewEmployee(filterBy)
        });
        // Enable/Disabled Employee Fields
        function empFieldsAttr(fields,bol){
          for(let i = 0; i < fields.length; i++) {
            $("#"+fields[i]).prop('disabled', bol);
          }
        }
        // AJAX Request Save,Update,Delete
        function empActions(formData){
          $.ajax({
            type: "POST",
            url: "../includes/manage_employee.php",
            data: formData,
            beforeSend: function () {
              loaderOpen()  
            },
            success: function (response) {
              console.log(response)
              Swal.fire({
                      icon: response.status,
                      text: response.message,
                      confirmButtonText: 'Ok'
              })
              if(response.status == 'success'){
                $('#empForm').trigger('reset');
                viewEmployee(allData)
              }
            },
            complete: function () {  
              loaderClose() 
            },
          });
        }
        // Display Table base on filter set
        function viewEmployee(filterBy){
          $.ajax({
            type: "POST",
            url: "../includes/manage_employee.php",
            data: {
              "showEmp": 1,
              "filterBy":filterBy
            },
            dataType: "html",
            beforeSend: function () {
                loaderOpen()  
            }, 
            success: function (data) {
              $('#viewEmployee').html(data);
            },
            complete: function () { 
                loaderClose() 
            },
          });
        }
      </script>
      <!-- Script For Manage Fees Admin Access -->
      <script>
        $('#v-pills-fees-tab').click(function (e) { 
          e.preventDefault();
          availablePrograms('%');
        });
        $("#searchProgram-btn").click(function (e) { 
          e.preventDefault();
          let query = $('#searhProgram').val()
          availablePrograms(query);
        });
        // New School Year
        $('#addNewSY').click(function (e) { 
          e.preventDefault();
            let newSY = $('#newSY').serialize() + '&addNewSy=addNewSy';
            manageFees(newSY,0);
        });
        // Sumbit and Update New Program
        $('#addNewProgram').click(function (e) { 
          e.preventDefault();
          if($('#addNewProgram').text() === 'Update'){
            let newProgram = $('#newProgram').serialize() + '&updateProgram=updateProgram';
            manageFees(newProgram,1);
            $('#newProgram').trigger('reset');
            $("[name='programId']").prop('readonly', false);
            availablePrograms('%');

          }else{
            let newProgram = $('#newProgram').serialize() + '&addNewProgram=addNewProgram';
            manageFees(newProgram,1);
            $('#newProgram').trigger('reset');
            $('#addNewProgram').text('Submit');
            availablePrograms('%');
          }
        });
        // New Scholarship
        $('#addNewScholarship').click(function (e) { 
          e.preventDefault();
          let newScholarship = $('#newScholarship').serialize() + '&addNewScholarship=addNewScholarship';
          manageFees(newScholarship,2);
        });
        // New Discount
        $('#addNewDiscount').click(function (e) { 
          e.preventDefault();
          let newDiscount = $('#newDiscount').serialize() + '&addNewDiscount=addNewDiscount';
          manageFees(newDiscount,3);
        });
        // Edit Program
        $(document).on('click', '#editProgram', function(){ 
          let id = $(this).attr("data-id");
          let course_program = $('#'+id).children('td[data-target=course_program]').text();
          let course_major = $('#'+id).children('td[data-target=course_major]').text();
          let course_year_level = $('#'+id).children('td[data-target=course_year_level]').text();
          let course_duration = $('#'+id).children('td[data-target=course_duration]').text();
          let semester = $('#'+id).children('td[data-target=semester]').text();
          let tuition_fee = $('#'+id).children('td[data-target=tuition_fee]').text();
          
          popUpAdmin_SchoolFees(1);
          
          $("[name='programId']").val(id);
          $("[name='programId']").prop('readonly', true);
          $("[name='program']").val(course_program);
          $("[name='major']").val(course_major);
          $("[name='yearLevel']").val(course_year_level);
          $("[name='duration']").val(course_duration);
          $("[name='semester']").val(semester);
          $("[name='fee']").val(tuition_fee);

          $('#addNewProgram').text('Update');
        });
        // Function Ajax Request Manage Fess
        function manageFees(newData,close){
          $.ajax({
            type: "POST",
            url: "../includes/manageFess.php",
            data: newData,
            success: function (response) {
              console.log(response)
              Swal.fire({
                      icon: response.status,
                      text: response.message,
                      confirmButtonText: 'Ok'
                    })
              closePopUp(close)
            }
          });
        }
        // Function Displaying the table of Available Programs
        function availablePrograms(query){
          $.ajax({
            type: "POST",
            url: "../includes/manageFess.php",
            data: {
              'showProgram': 1,
              'query': query
            },
            dataType: "html",
            success: function (data) {
              $('#viewAvaibleProgram').html(data);
            }
          });
        }
      </script>
      <script type="text/javascript">
           // Limited access for Registrar

          /*  Registrar:
              -DASHBOARD
              -MANAGE USER (STUDENT)
              -ARCHIVE
              -Student Fee

              Admin:
              -Dashboard
              -Manage Users (Employee)
              -Reports
              -Manage Fees
          */
         
            if (document.getElementById('roleId').innerHTML.includes('Registrar')){
              document.querySelector('#employees-tab').style.display = "none"
              document.getElementById('v-pills-fees-tab').style.display = "none"
              document.getElementById('v-pills-reports-tab').style.display="none"
              document.querySelector('.dashBoardforAdmin').style.display = "none"

            }else{
              document.querySelector('#student-tab').style.display = "none"
              document.querySelector('#student').style.display = "none"
              document.querySelector('#employees-tab').classList.toggle('active')
              document.querySelector('#employees').classList.toggle('active')
              document.querySelector('#employees').classList.toggle('show')
              document.getElementById('v-pills-archives-tab').style.display = "none"
              document.getElementById('v-pills-studFee-tab').style.display = "none"
              document.querySelector('.dashBoardForRegistrar').style.display = "none"
              
            }

            function loaderClose(){
              let loader = document.getElementById('loader-wrapperID')
                  loader.style.opacity = "0"
                  loader.style.visibility = "hidden"
                  loader.style.pointerEvents = "none"
            }
            function loaderOpen(){
              let loader = document.getElementById('loader-wrapperID')
                  loader.style.opacity = "1"
                  loader.style.visibility = "visible"
                  // loader.style.pointerEvents = "none"
            }
      </script>


  </body>
</html>