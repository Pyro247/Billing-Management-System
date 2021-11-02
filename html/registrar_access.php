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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/b-2.0.1/datatables.min.css"/>
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Fontawsome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- BoxIcons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
 <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/registrar_access.css?<?php echo time(); ?>" />
    <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Linear Icons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <?php
      if($_SESSION['role'] == 'Admin'){?>
        <title>Admin</title>
      <?php }else{?>
        <title>Registrar</title>
      <?php }?>
    
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

    <!-- Bacherlor's Program Tuition Fee input -->
    <div class="popUpAdmin_FeesManagement"  style="visibility: hidden; opacity: 0; transition: all 150ms;" id="tuitionFeePopUp">
      <div class="popUpFeesMgmtinner">
      <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(1); popUpAdmin_SchoolFees(2)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Enter Tuition Fee</p>
        <hr class="mt-0 mb-3">
        <form action="" id="newProgramAccessed">
          <p>Lecture Fees&nbsp;<input type="number" name="lectureFee" id="lectureFee" placeholder="Lecture Fees" value="0.00"> </p>
          <p>Laboratory Fees&nbsp;<input type="number" name="labFee" id="labFee" placeholder="Laboratory Fees" value="0.00"></p>
          
          <p>Library Fees&nbsp;<input type="number" name="libraryFee" id="libraryFee" placeholder="Library Fees" value="0.00"></p>
          
          <p>Guidance Fees&nbsp;<input type="number" name="guidanceFee" id="guidanceFee"  placeholder="Guidance Fees" value="0.00"></p>
          <p>Athletic Fees&nbsp;<input type="number" name="athleticFee" id="athleticFee" placeholder="Athletic Fees" value="0.00"></p>
          <p>Computer Fees&nbsp;<input type="number" name="computerFee" id="computerFee" placeholder="Computer Fees" value="0.00"></p>
          <p>Registration Fees&nbsp;<input type="number" name="registrationFee" id="registrationFee" placeholder="Registration Fees" value="0.00"></p>
          <p>Total Fee &nbsp;<input type="number" name="fee" id="newFee" placeholder="Fee" required></p>
          
          <!-- <p style="font-size: 1.2rem; font-weight: bold">Total Assessment Fee:&nbsp;<span class="text-primary"></span> -->
          
          <button type="button" class="d-block mt-2 btn btn-primary" style="margin-left: auto;" id="addNewProgram">Submit</button>
            </form>
      </div>

    </div>

    <!-- Add Bachelor's Program -->
    <div class="popUpAdmin_FeesManagement" style="visibility: hidden; opacity: 0; transition: all 150ms;" >
      <div class="popUpFeesMgmtinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(2)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Bachelor's Program</p>
          <hr class="mt-0 mb-3">
            <form action="" id="newProgram">
            
           
           
            <p>Course ID &nbsp;<input type="text" name="programId" id="newProgramId" placeholder="Course ID" required></p>
            <span id="showMsg"></span>
            
            <p>Program &nbsp;<input type="text" name="program" id="newProg" placeholder="Program" required></p>
            <p>Major &nbsp;<input type="text" name="major" id="newMajor" placeholder="Major" required></p>
            <!-- <p>Duration &nbsp;<input type="text" name="duration" placeholder="Duration"></p> -->
            <p>Duration &nbsp;
                <select name="duration" id="newDuration" required >
                  <option value="1">1 Year</option>
                  <option value="2">2 Years</option>
                  <option value="3">3 Years</option>
                  <option value="4">4 Years</option>
                  <option value="5">5 Years</option>
                </select>
            <!-- <p>Year Level &nbsp;<input type="text" name="yearLevel" placeholder="Year Level"></p> -->
            <p>Year Level &nbsp;
                <select name="yearLevel" id="newYearLevel" required> 
                  <option value="1">1st Year</option>
                  <option value="2">2nd Year</option>
                  <option value="3">3rd Year</option>
                  <option value="4">4th Year</option>
                  <option value="5">5th Year</option>
                </select>
            <!-- <p>Semester &nbsp;<input type="text" name="semester" placeholder="Semester"></p> -->
            <p>Semester &nbsp;
                <select name="semester" id="newSemester" required>
                  <option value="1">1st Semester</option>
                  <option value="2">2nd Semester</option>
                  <option value="3">3rd Semester</option>
                </select>
                <a class="btn btn-primary d-block mx-auto my-3" id="tuitionFeeBtn">Accessed Fees</a>
          

                

                
            </form>
      </div>
    </div>

    <!-- Add Scholarship -->
    <div class="popUpAdmin_FeesManagement" style="visibility: hidden; opacity: 0; transition: all 150ms;" >
      <div class="popUpFeesMgmtinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(3)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Scholarship</p>
          <hr class="mt-0 mb-3">
            <form action="" id="newScholarship">

              <p>Description &nbsp;<br>
                <select  name="scholarDesc" id="scholarDesc" placeholder="Description">
                  <option value=""></option>
                  <option value="Athelete">Athelete</option>
                  <option value="Academic">Academic</option>
                </select> 
                </p>
              <p>Type &nbsp;<br>  
                <select name="scholarType" id="scholarType">
                  <option value="Full">Full</option>
                  <option value="Half">Partial</option>
                </select>
              </p>
              <input type="text" style="visibility: hidden">

                <button type="submit" class="d-block mt-2 btn btn-primary" style="margin-left: auto;" id="addNewScholarship">Submit</button>
            </form>
      </div>
    </div>


    <!-- Add Discount -->
    <div class="popUpAdmin_FeesManagement" style="visibility: hidden; opacity: 0; transition: all 150ms;" >
      <div class="popUpFeesMgmtinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end" onclick="closePopUp(4)"></i>
        <p class="PopUpFeesMgmt_Title mb-0 mt-5">Discount</p>
          <hr class="mt-0 mb-3">
          <form action="" class="popUpAdminBP" id="newDiscount">
            
            <p>Description &nbsp;<input type="text" name="discountDesc" placeholder="Description"></p>
            <p>Percentage &nbsp;<input type="number" name="discountPer" placeholder="0.00%"></p>
              <button type="submit" class="d-block mt-2 btn btn-primary" style="margin-left: auto;" id="addNewDiscount">Submit</button>
          </form>
            
      
      </div>
    </div>

    

    


    <div class="row">
      <div class="col left-tab">
      <img src="../images/logo.png" class="logoLeftTab" alt="">
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
                <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class='bx bxs-dashboard'></i>&nbsp;Dashboard</a>
                <a class="nav-link main__" id="v-pills-manage-users-tab" data-toggle="pill" href="#v-pills-manage-users" role="tab" aria-controls="v-pills-manage-users" aria-selected="false"><i class='bx bxs-user-account'></i>&nbsp;Manage Users</a>
                <a class="nav-link main__" id="v-pills-archives-tab" data-toggle="pill" href="#v-pills-archives" role="tab" aria-controls="v-pills-archives" aria-selected="false"><i class='bx bxs-archive'></i>&nbsp;Archives</a>
                <a class="nav-link main__" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false"><i class='bx bxs-report' ></i>&nbsp;Reports</a>
                <a class="nav-link main__" id="v-pills-fees-tab" data-toggle="pill" href="#v-pills-fees" role="tab" aria-controls="v-pills-fees" aria-selected="false"><i class="fas fa-money-bill-wave"></i>&nbsp;Fees Management</a>
                <a class="nav-link main__" id="v-pills-studFee-tab" data-toggle="pill" href="#v-pills-studFee" role="tab" aria-controls="v-pills-studFee" aria-selected="false"><i class="fas fa-coins"></i>&nbsp;Student Fees</a>
            
            </div>
        </div>
        

        <div class="col-sm right-tab">


        <!-- Dashboard -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
              <p class="title_tab_universal my-3" >Dashboard</p>
<!-- 
              <form action="" class="universal_search_form">
                <input type="text" name="searchDash" id="searchDash" placeholder="Search">
                <button type="button" class="btn btn-primary" id="searchDash_btn">Search</button>
              </form> -->
              <div class="dashBoardForRegistrar">
                  <div class="studentCountBox" id="oldStud">
                    <i class="lnr lnr-users"></i>
                            <h1>
                              <?php
                                $sql = "SELECT`stud_type` FROM `tbl_student_school_details` WHERE stud_type = 'old'";
                                $statement = $con->prepare($sql);
                                $statement->execute();
                                $result = $statement->get_result();
                                $row = $result->fetch_row();
                                $count = mysqli_num_rows($result);
                                echo $count;
                              ?>
                          </h1>
                        <h3>Old Student</h3>
                  </div>


                  <div class="studentCountBox" id="transferStud">
                    <i class="lnr lnr-user"></i>
                            <h1>
                            <?php
                              $sql = "SELECT`stud_type` FROM `tbl_student_school_details` WHERE stud_type = 'transferee'";
                              $statement = $con->prepare($sql);
                              $statement->execute();
                              $result = $statement->get_result();
                              $row = $result->fetch_row();
                              $count = mysqli_num_rows($result);
                              echo $count;
                            ?> 
                          </h1>
                        <h3>Transferee</h3>
                  </div>

                  <div class="studentCountBox" id="totalStud">
                  <i class="lnr lnr-user"></i>
                  <h1>
                  <?php
                          $sql = "SELECT * FROM tbl_student_info";
                          $statement = $con->prepare($sql);
                          $statement->execute();
                          $result = $statement->get_result();
                          $row = $result->fetch_row();
                          $count = mysqli_num_rows($result);
                          echo $count;
                        ?>
                        </h1>
                        <h3>Total Student</h3>
                  </div>
                
                  
                
                  <div class="dashboardBox">
                  
                 <div class="row mb-5">
                    <p id="studentCountLabelId" style="font-size: 2rem; font-weight: 500;"></p>
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
                    <label for="filterByProgramDash" style="color: black">Choose Program</label>
                  </div>
                </div>
                 
              
              <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="filterByMajorDash" aria-label="Floating label select example">
                      <option value="All" selected>All</option>
                    </select>
                    <label for="filterByMajorDash" style="color: black">Choose Major</label>
                  </div>
              </div>
             
          </div>
             
              

                 
                    <table class="table" style="color: var(--white)" id="dashboardTbl">
                      
                        <thead class="text-center">
                          <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Program</th>
                            <th scope="col">Major</th>
                            <th scope="col">Year Level</th>
                            <th scope="col">Student Status</th>
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

            <!-- For admin -->

            <div class="dashBoardForRegistrar" id="dashboardForAdminId">
              <div class="studentCountBox" id="">
                <i class="lnr lnr-users"></i>
                        <h1>
                          <?php
                          $sql = "SELECT `role`FROM `tbl_employee_info` WHERE `role` = 'Registrar'";
                          $statement = $con->prepare($sql);
                          $statement->execute();
                          $result = $statement->get_result();
                          $row = $result->fetch_row();
                          $count = mysqli_num_rows($result);
                          echo $count;
                        ?>
                      </h1>
                    <h3>Registrar</h3>
              </div>
              <div class="studentCountBox" id="">
                <i class="lnr lnr-users"></i>
                        <h1>
                          <?php
                          $sql = "SELECT `role`FROM `tbl_employee_info` WHERE `role` = 'Cashier'";
                          $statement = $con->prepare($sql);
                          $statement->execute();
                          $result = $statement->get_result();
                          $row = $result->fetch_row();
                          $count = mysqli_num_rows($result);
                          echo $count;
                        ?>
                          
                      </h1>
                    <h3>Cashier</h3>
              </div>
              <div class="studentCountBox" id="">
                <i class="lnr lnr-users"></i>
                        <h1>
                        <?php
                        $sql = "SELECT * FROM tbl_employee_info";
                        $statement = $con->prepare($sql);
                        $statement->execute();
                        $result = $statement->get_result();
                        $row = $result->fetch_row();
                        $count = mysqli_num_rows($result);
                        echo $count;
                      ?>
          
                      </h1>
                    <h3>Total Employee</h3>
              </div>
            


                  <div class="dashboardBox">
                  
                        <table class="table" style="color: var(--white)">
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
                            <tbody id="adminDash">
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











            <!-- MANAGE USERS -->
            <div class="tab-pane fade" id="v-pills-manage-users" role="tabpanel" aria-labelledby="v-pills-manage-users-tab">
              <p class="title_tab_universal my-3">Manage User's Records</p>
              
              <ul class="nav nav-tabs manage-users-tab__secondary" id="myTab" role="tablist" style="border-bottom: none">
                <li class="nav-item">
                  <a class="nav-link active" style="background: none; color: var(--secondary); border-bottom: none; border-color: var(--secondary)" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
                </li>
                

                <!-- For Admin -->
                <li class="nav-item">
                  <a class="nav-link" style="background: none; color: var(--secondary);   border-bottom: none; border-color: var(--secondary)"  id="employees-tab" data-toggle="tab" href="#employees" role="tab" aria-controls="employees" aria-selected="false">Employees</a>
                </li>
                <!-- <li class="nav-item" id="alluser_ForAdmin">
                  <a class="nav-link" id="all-users-tab" data-toggle="tab" href="#all-users" role="tab" aria-controls="all-users" aria-selected="false">All users</a>
                </li> -->

              </ul>

            

            



              <div class="tab-content" id="myTabContent">
<!----------------------------------------------- Students Tab ---------------------------------------------------------->
                <div class="tab-pane fade show active mt-2" id="student" role="tabpanel" aria-labelledby="student-tab">
                  <p class="role_information">Student's Information</p>
                        
                  <form action="" method="post" class="universalForm_two" id="studForm">

                      <div class="manage_users_universal_tab_lmr_parent">
                          
                        
                          <div class="manage_users_universal_left_tab">
                          <img src="../images/registrar_img/sample_student_pic.png" class="rounded float-start" alt="...">
                          <button type="button" class="btn btn-primary my-2">Change Image</button>
                          </div>


                          <div class="manage_users_universal_mid_tab px-1">
                            
                            <!-- StudentID -->
                            <div class="row g-2 mb-1">
                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="number" name="student_number" class="form-control" id="studId" placeholder=" " value="" disabled>
                                  <label for="studId" class="labelForTextBox">Student ID</label>
                                </div>
                              </div>
                            </div>


                            <!-- Full name -->
                            <div class="row g-2 mb-1">
                              
                              <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_firstname" class="form-control" id="studFirstname" placeholder=" " value="" disabled>
                                    <label for="studFirstname" class="labelForTextBox">First name</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_middlename" class="form-control" id="studMiddlename" placeholder=" " value="" disabled>
                                    <label for="studMiddlename" class="labelForTextBox">Middle name</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_lastname" class="form-control" id="studLastname" placeholder=" " value="" disabled>
                                    <label for="studLastname" class="labelForTextBox">Last name</label>
                                  </div>
                                </div>
                            </div>
                            <br>

                            
                          

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
                                    <label for="studProgram" class="labelForTextBox">Program</label>
                                  </div>
                                </div>
                              
                              
                                <div class="col-md">
                                  <div class="form-floating">
                                    <select class="form-select" name="stud_major" id="studMajor" aria-label="Floating label select example" disabled>
                                    </select>
                                    <label for="studMajor" class="labelForTextBox">Major</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_lrn" class="form-control" id="studLrn" placeholder=" " value="" disabled >
                                    <label for="studLrn" class="labelForTextBox">LRN</label>
                                  </div>
                                </div>
                              </div>

                              <div class="row g-2 mb-1">

                              <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_fee" class="form-control text-primary" style="font-weight: bold;" id="stud_lecUnits" placeholder=" " value="" disabled >
                                    <label for="studFee" class="labelForTextBox">Lecture Units</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_fee" class="form-control text-primary" style="font-weight: bold;" id="stud_labUnits" placeholder=" " value="" disabled >
                                    <label for="studFee" class="labelForTextBox">Laboratory Units</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_fee" class="form-control text-primary" style="font-weight: bold;" id="studFee" placeholder=" " value="" disabled >
                                    <label for="studFee" class="labelForTextBox">Fee</label>
                                  </div>
                                </div>
                              </div>
                              <br>

                              <div class="row g-2 mb-1">
                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="stud_school_year" class="form-control" id="studSchoolYear" placeholder=" " value="" disabled>
                                  
                                  <label for="studSchoolYear" class="labelForTextBox">School year</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <select class="form-select" name="stud_semester" id="studSemester" aria-label="Floating label select example" disabled>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                            
                                    
                    
                                  </select>
                                  <label for="studSemester" class="labelForTextBox">Semester</label>
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
                                  <label for="studYearLevel" class="labelForTextBox">Year Level</label>
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
                                      <label for="studScholarship" class="labelForTextBox">Scholarship</label>
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
                                      <label for="studDiscount" class="labelForTextBox">Discount</label>
                                    </div>
                                  </div>

                                  
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <select class="form-select" name="stud_status" id="studStatus" aria-label="Floating label select example" disabled>
                                      <option value="" selected disabled></option>
                                        <option value="old">Old</option>
                                        <option value="transferee">Transferee</option>
                                        
                                        
                        
                                      </select>
                                      <label for="studStatus" class="labelForTextBox">Student Status</label>
                                    </div>
                                  </div>


                                </div> 
                            </div>

                            


                          <div class="manage_users_students_right_tab">
                            <p class="text-center">Submitted Requirements</p>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_form137" value="✓" id="form137" disabled >
                              <label class="form-check-label" style="color: var(--white)" for="form137" >
                                Form 137
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_form138" value="✓" id="form138" disabled>
                              <label class="form-check-label" style="color: var(--white)" for="form138">
                                Form 138
                              </label>
                            </div>

                            
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_psa" value="✓" id="psa" disabled>
                              <label class="form-check-label" style="color: var(--white)" for="psa">
                                PSA Birth Certificate
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_good_moral" value="✓" id="goodMoral" disabled>
                              <label class="form-check-label" style="color: var(--white)" for="goodMoral">
                                Good Moral
                              </label>
                            </div>
                          </div>
                        </div>
                        
                      
                  
                      <div class="buttons_manage_universal">
                      <button type="button" name="" id="add" class="btn btn-info">Add</button>
                      <!-- <button type="submit" name="stud_update" class="btn btn-warning">Edit</button> -->
                      <button type="button" name="stud_save" id="studSave" class="btn btn-success"disabled >Save </button>
                      <!-- <button type="submit" name="stud_delete" id ="stud_delete" class="btn btn-danger" disabled>Delete</button> -->

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
                              
                      <div class="manage_student_tab_below mt-4">
                        <p class="role_information">All Student's list and Filtering</p>


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
                            <label for="filterByProgram" style="color: #000">Program</label>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select class="form-select" id="filterByMajor" aria-label="Floating label select example">
                              <option value="" selected>All</option>
                              
              
                            </select>
                            <label for="filterByMajor" style="color: black">Major</label>
                          </div>
                        </div>
                      </div>

                      
                      <table class="table" style="color: var(--white)">
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
              




    <!-------------------------------------------- Employees Tab -------------------------------------->
                <div class="tab-pane fade mt-2 manage__stud-emp-all-tab" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                  <p class="role_information" style="color: var(--secondary)">Employee's Information</p>

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
                              <label for="empRole" class="labelForTextBox">Role</label>
                            </div>
                          </div>
                          <!-- Employee ID -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" name="emp_id" id="empId" placeholder=" " value="" disabled>
                              <label for="empId" class="labelForTextBox">Employee ID</label>
                            </div>
                          </div>
                        </div>

                        <div class="row g-2 mb-1">
                          <!-- Employee Firsname -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_firstname" id="empFirstname" placeholder=" " value="" disabled>
                              <label for="empFirstname" class="labelForTextBox">First name</label>
                            </div>
                          </div>
                          <!-- Employee Middlename -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_middlename" id="empMiddlename" placeholder=" " value="" disabled>
                              <label for="empMiddlename" class="labelForTextBox">Middle name</label>
                            </div>
                          </div>
                          <!-- Employee Lastname -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_lastname" id="empLastname" placeholder=" " value="" disabled>
                              <label for="empLastname" class="labelForTextBox">Last name</label>
                            </div>
                          </div>
                        </div>

                        <div class="row g-2 mb-1">
                          <!-- Employee Gender -->
                          <div class="col-md-3">
                            <div class="form-floating">
                              <select class="form-select" name="emp_sex" id="empSex" aria-label="Floating label select example" disabled>
                                <option value="male">Male</option>
                                <option value="female" class="labelForTextBox">Female</option>
                                
                              </select>
                              <label for="empGender" class="labelForTextBox">Sex</label>
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
                              <label for="empAddress" class="labelForTextBox">Address</label>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="date" class="form-control" name="empHireDate" id="empHireDate" placeholder=" " value="" disabled>
                              <label for="empHireDate" class="labelForTextBox">Hire Date</label>
                            </div>
                          </div>
                        </div>

                        <div class="row g-2 mb-1">
                          <!-- Employee Email Address -->
                          <div class="col-md">
                            <div class="form-floating">
                              <input type="email" class="form-control" name="emp_email" id="empEmail" placeholder=" " value="" disabled>
                              <label for="empEmail" class="labelForTextBox">Email</label>
                            </div>
                          </div>
                          <!-- Employee Contact Nunmber -->
                          <div class="col-md">
                              <div class="form-floating">
                                <input type="number" class="form-control" name="emp_contact_number" id="empContactNo" placeholder=" " value="" disabled>
                                <label for="empContactNo" class="labelForTextBox">Contact number</label>
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
                      <button type="submit" name="empArchive" class="btn btn-primary" id="empArchive" disabled>Archive</button>
                      
                    </div> 
                  </form>
                  <hr>
                  <div class="manage_student_tab_below mt-4">
                    <p class="role_information" style="color: var(--secondary)">All Employee's list and Filtering</p>


                    <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="filterBy" aria-label="Floating label select example">
                          <option value="%" selected>All</option>
                          <option value="Registrar">Registrar</option>
                          <option value="Cashier">Cashier</option>
                          
          
                        </select>
                        <label for="filterBy" style="color: black">Role</label>
                      </div>
                    </div>
                  </div>

                                        
                  <table class="table" id="employeeTbl" style="color: var(--white)">
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
              <p class="title_tab_universal my-3">Archives</p>


              
              
            
              <div class="dashboardBox">
                <p class="role_information mt-2" style="color: var(--secondary)">Choose Account to Filter</p>
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
                        <label for="floatingSelect" style="color: black">Condition</label>
                      </div>
                    </div>


                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="" selected>All</option>
                          <option value="old">Old</option>
                          <option value="transferee">Transferee</option>
                        </select>
                        <label for="floatingSelect" style="color: black">Student Status</label>
                      </div>
                    </div>
                    

                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" "> 
                        <label for="floatingInputGrid" style="color: black">Date archived From</label>
                      </div>
                    </div>
                    
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" ">
                        <label for="floatingInputGrid" style="color: black">Date archived To</label>
                      </div>
                    </div>

                    <div class="row g-2 mb-2">
                      <div class="col-md-2">  
                        <button type="button" class="btn btn-primary font p-2 s_c__">Apply</button>
                      </div>

                      <div class="col-md-2">  
                        <button type="button" class="btn btn-primary font p-2 s_c__">Clear Filter</button>
                      </div>

                    <div class="col-md">  
                      <button type="button" onclick="exportTableToExcel('archiveTable', 'ArchiveData')" class="btn btn-primary font p-2 float-end">Export Records to Excel</button>
                    </div>
                  </div>

                  <hr>
                  
                    <table id="archiveTable" class="table" style="color: var(--white)">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID number</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Student Status</th>
                            <th scope="col">Account Status</th>
                            <th scope="col">Email</th>
                            <th scope="col">Condition</th>
                            
                          </tr>
                        </thead>
                        <tbody id="registrarArchive">
                        
                        </tbody>
                      </table>
                    
                  </div>
                </div>
            </div>

             <!-- REPORTS -->
             <div class="tab-pane fade reports-tab" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
              <p class="title_tab_universal my-3">Generated Reports</p>
              
                <span class="text-primary" style="font-size: 1.3rem; font-weight: 500; line-height: 50px;">View Transactions:</span>
                
                 <button id="Daily" class="btn btn-outline-primary">Daily</button>

                 <select id="Monthly" name="Monthly" class="btn btn-outline-primary ml-1">
                      <option hidden>Monthly</option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                
                    <!--<btn class="btn btn-outline-primary dropdown-toggle mx-1" href="#" role="button" id="Monthly" data-bs-toggle="dropdown" aria-expanded="false">
                      Monthly 
                    </btn>
                    <ul class="dropdown-menu" aria-labelledby="Monthly">
                      <li><a class="dropdown-item" href="#">January</a></li>
                      <li><a class="dropdown-item" href="#">February</a></li>
                      <li><a class="dropdown-item" href="#">March</a></li>
                      <li><a class="dropdown-item" href="#">April</a></li>
                      <li><a class="dropdown-item" href="#">May</a></li>
                      <li><a class="dropdown-item" href="#">June</a></li>
                      <li><a class="dropdown-item" href="#">July</a></li>
                      <li><a class="dropdown-item" href="#">August</a></li>
                      <li><a class="dropdown-item" href="#">September</a></li>
                      <li><a class="dropdown-item" href="#">October</a></li>
                      <li><a class="dropdown-item" href="#">November</a></li>
                      <li><a class="dropdown-item" href="#">December</a></li>
                    </ul>-->
                    
                    <!-- <btn class="btn btn-outline-primary dropdown-toggle mx-1" href="#" role="button" id="Monthly" data-bs-toggle="dropdown" aria-expanded="false">
                      Annually 
                    </btn>
                    <ul class="dropdown-menu" aria-labelledby="Annually">
                    <li><a class="dropdown-item" href="#">2020-2021</a></li>
                    </ul> -->
                    <select id="Annually" name="Annually" class="btn btn-outline-primary ml-1">
                      <option hidden>Annually</option>
                    <?php 
                                $sqlYear = "SELECT DISTINCT academic_year FROM tbl_academic_year";
                                $stmtYear = $con->prepare($sqlYear);
                                $stmtYear->execute();
                                $resYear = $stmtYear->get_result();
                                while($rowYear = $resYear->fetch_assoc()){
                                  $acadYear = substr($rowYear['academic_year'], 0, 4);
                                ?>
                                <option value="<?= $acadYear ?>"><?= $acadYear?></option>
                            <?php }; ?>
                    </select>
                <button type="button" onclick="exportTableToExcel('reportsTable', 'Reports')" class="btn btn-outline-primary mx-5">Export To Excel</button>
                
             
            
               

                
              <!-- charts! -->
              <div class="dashboardBox">

              
              <div class="chartsContainer mt-3">
              <canvas id="myChart"></canvas>
                <div class="rightChart">
                  <h3 class="text-center totalamountChart">
                    </h3>
                      <h5 class="text-center mb-5">Total Amount Collected</h6>
                      <div class="cash_online">
                        <span class="cashText">
                        </span>
                        <span class="onlineText">
                        </span>
                      </div>
                    </div>
              </div>
            </div>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: [],
      datasets: [{
          data: [],
          backgroundColor: [
              'rgba(214, 40, 78, 0.2)',
              'rgba(54, 162, 235, 0.2)'
              
          ],
          borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)'
              
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
          legend: {
            display: false,
          },
          title:{
            display: true,
            color: '#3bb9a0',
            text: 'Transactions Made',
            font: {
              size: 24,
              family: 'Poppins',
              weight: 'normal'
            }
          }
        }
        
      }
    });
</script>

    <div class="dashboardBox">
    <table id="reportsTable" class="table" style="color: var(--white)">
      <thead class="thead-light">
        <tr>
          <th>Cashier Id</th>
          <th>Cashier Name</th>
          <th>Total Collected Amount</th>
          <th>Total Cash Payment</th>
          <th>Total Fund Transfer</th>
          
          
          <th>Total Transaction Made</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody id = "adminReports">
      
      </tbody>
    </table>
    </div>
      
  </div>

           


            <!-- Student Fees -->
            <div class="tab-pane fade studFee-tab" id="v-pills-studFee" role="tabpanel" aria-labelledby="v-pills-studFee-tab">
              <p class="title_tab_universal my-3">Student Fees</p>
                

              <div class="dashboardBox">

             
                <div class="col-md-6 my-1">
                  <div class="form-floating">
                    <select class="form-select" id="filterByRemarks" aria-label="Floating label select example">
                            <option value="All" selected>All</option>
                            <option value="Fully Paid" >Fully Paid</option>
                            <option value="Not Fully Paid" >Not Fully Paid</option>
                    </select>
                    <label for="sortByDashData" style="color: black">Filter by Remarks:</label>
                  </div>
                </div>

               
                  <table class="table" style="color: var(--white)">
                      <thead class="text-center">
                        <tr>
                          <th scope="col">Student ID</th>
                          <th scope="col">Full name</th>
                          <th scope="col">Program</th>
                          <th scope="col">Major</th>
                          <th scope="col">Year Level</th>
                          <th scope="col">Tuition Fee</th>
                          <th scope="col">Scholarship Deduction</th>  
                          <th scope="col">Discount Deduction</th>
                          <th scope="col">Scholar Type</th>
                          <th scope="col">Remaining Balance</th>
                          <th scope="col">Remarks</th>
                        </tr>
                      </thead>
                      <tbody id="viewStudentFeesList">
                      </tbody>
                    </table>
                    </div>
              
            </div>



            
            <!-- Fees Management -->
            <div class="tab-pane fade" id="v-pills-fees" role="tabpanel" aria-labelledby="v-pills-fees-tab">
              <p class="title_tab_universal my-3">Manage Fees</p>
              <form action="" class="universal_search_form">
                <input type="text" name="searhProgram" id="searhProgram" placeholder="Search">
                <button type="button" class="btn btn-primary" id="searchProgram-btn">Search</button>
              </form>
              <div class="dashboardBox mt-4 p-4 d-flex justify-content-between">
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(0)"><i class="fas fa-plus"></i>&nbsp;Add Academic Year</button>
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(2)"><i class="fas fa-plus"></i>&nbsp;Add Bachelor's Program</button>
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(3)" id="addScholarship"><i class="fas fa-plus" ></i>&nbsp;Add Scholarship</button>
                  <button class="btn btn-success feesMgmt_btn" onclick="popUpAdmin_SchoolFees(4)"><i class="fas fa-plus"></i>&nbsp;Add Discount</button>
              </div>

              <div class="col dashboardBox">
                <table class="table" style="color: var(--white)">
                  <thead>
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

                 
                  document.querySelector('#tuitionFeeBtn').addEventListener('click', function(){
                    
                    
                    
                  })
                
                  

                  



            </script>
        

          
          </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/b-2.0.1/datatables.min.js"></script>
      <!-- <script>
          $(document).ready( function () {
          $('#dashboardTbl').DataTable();
          } );
      </script> -->
     
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
          
          // Total Student
          $("#totalStud").click(function(e) {
            sortDisplay('All');
            $('#filterByProgramDash').val('All');
            $("#filterByMajorDash").empty();
            $("#filterByMajorDash").append("<option value='"+'%'+"'>"+'All'+"</option>");
            studentCountLabel.style.color = "#56A8CBFF"
            studentCountLabel.textContent = "Total Students"
            sortDisplay('All');
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
            studentCountLabel.style.color = "var(--orange)"
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
      <!-- Archives Tab Script -->
      <script>
        $(document).ready(function () {
          $('#v-pills-archives-tab').click(function (e) { 
            viewArchiveDataTable()
            
          });
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
          function viewArchiveDataTable(){
              $.ajax({
                type: "POST",
                url: "../includes/registrarArchive.php",
                dataType: "html",
                success: function (data) {
                  $('#registrarArchive').html(data);
                }
              });
          }
          
        });
      </script>
       <!-- Student Fees Tab-->
    <script>
      $(document).ready(function () {
        // Initial Data Table
        $('#v-pills-studFee-tab').click(function (e) { 
          viewStudentFees()
          
        });
        $('#filterByRemarks').change(function (e) { 
          e.preventDefault();
          let filterBy = $('#filterByRemarks').val();
          viewStudentFeesfilterBy(filterBy)
        });
      });
      // Ajax Request viewList of Student Fees
      function viewStudentFees(){
        $.ajax({
          type: "GET",
          url: "../includes/student-fees-cashier.php",
          data: {
            'viewStudentList': 1,
          },
          dataType: "html",
          success: function (data) {
            $('#viewStudentFeesList').html(data);
          }
        });
      }
       // Ajax Request viewList of Student Fees Filter By Remarks
       function viewStudentFeesfilterBy(filterBy){
        $.ajax({
          type: "GET",
          url: "../includes/student-fees-cashier.php",
          data: {
            'viewStudentListfilterBy': 1,
            'filterBy': filterBy
          },
          dataType: "html",
          success: function (data) {
            $('#viewStudentFeesList').html(data);
            // console.log(data)
          }
        });
      }
    </script>
      <!-- Script For Manage User-Employee Admin Access -->
      <script>
        let allData = '%'
        let partialfields = ['empRole','empId','empFirstname','empMiddlename','empLastname','empHireDate']
        let allfields = ['empRole','empId','empFirstname','empMiddlename','empLastname','empSex','empAddress','empEmail','empContactNo','empHireDate']
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
            if($('#empRole').val() == 'N/A'){
              $('#empRole').focus()
            }else if($('#empId').val() == 0){
              $('#empId').focus()
            }else if($('#empFirstname').val() == ''){
              $('#empFirstname').focus()
            }else if($('#empMiddlename').val() == ''){
              $('#empMiddlename').focus()
            }else if($('#empLastname').val() == ''){
              $('#empLastname').focus()
            }else if($('#empHireDate').val() == ''){
              $('#empHireDate').focus()
            }else{
              let newEmp = $('#empForm').serialize() + '&newEmp=newEmp';
              empActions(newEmp);
              empFieldsAttr(partialfields,true)
              $("#empAdd").prop("disabled", false);
              $("#empSave").prop("disabled", true);
            }
            
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
                $("#empHireDate").val(data.hiredate);
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
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
        $(document).ready(function () {
          $('#tuitionFeeBtn').click(function (e) { 
            e.preventDefault();
            if($('#tuitionFeeBtn').text() == 'Accessed Fees'){
              checkProgramID()
            }else{
              closePopUp(2); 
              popUpAdmin_SchoolFees(1);
            }
            
          });
          $("#lectureFee").keyup(function (e) {
            $("#newFee").val( calcTotalFee());
          });
          $("#labFee").keyup(function (e) { 
            $("#newFee").val( calcTotalFee());
          });
          $("#libraryFee").keyup(function (e) { 
            $("#newFee").val( calcTotalFee());
          });
          $("#guidanceFee").keyup(function (e) { 
            $("#newFee").val( calcTotalFee());
          });
          $("#athleticFee").keyup(function (e) { 
            $("#newFee").val( calcTotalFee());
          });
          $("#computerFee").keyup(function (e) { 
            $("#newFee").val( calcTotalFee());
          });
          $("#registrationFee").keyup(function (e) { 
            $("#newFee").val( calcTotalFee());
          });
          
        });
        function calcTotalFee(){
          let total = parseFloat($('#lectureFee').val() ? $('#lectureFee').val() : 0) +
                      parseFloat($('#labFee').val() ? $('#labFee').val() : 0) + 
                      parseFloat($('#libraryFee').val() ? $('#libraryFee').val() : 0) + 
                      parseFloat($('#guidanceFee').val() ? $('#guidanceFee').val() : 0) + 
                      parseFloat($('#athleticFee').val() ? $('#athleticFee').val() : 0) + 
                      parseFloat($('#computerFee').val() ? $('#computerFee').val() : 0) + 
                      parseFloat($('#registrationFee').val() ? $('#registrationFee').val() : 0) 
        return total.toFixed(2)
        }
        function checkProgramID(){
          $.ajax({
            type: "GET",
            url: "../includes/manageFess.php",
            data: {
              'checkProgID': 1,
              'progId': $('#newProgramId').val()
            },
            dataType: "json",
            success: function (response) {
              // console.log(response)
              // $('#showMsg').text(response.msg);
              if(response.status == 'error'){
                Swal.fire({
                  icon: response.status,
                  text: response.message,
                  confirmButtonText: 'Ok'
                })
              }
             
              if(response.status != 'error'){
                let validator = $( "#newProgram" ).validate();
                if( validator.form()){
                      closePopUp(2); 
                      popUpAdmin_SchoolFees(1);
              }
              }
              
            }
          });
        }
        // Sumbit and Update New Program
        $('#addNewProgram').click(function (e) { 
          e.preventDefault();
          if($('#addNewProgram').text() === 'Update'){
            let formData = new FormData($("#newProgram")[0]);
            let formDataPrecios = new FormData($("#newProgramAccessed")[0]);
            for (var pair of formDataPrecios.entries()) {
                formData.append(pair[0], pair[1]);
            }
            formData.append('updateProgram', 'updateProgram');
            $.ajax({
            type: "POST",
            url: "../includes/manageFess.php",
            data: formData,
            contentType: false,
            processData:false,
            success: function (response) {
              console.log(response)
              Swal.fire({
                icon: response.status,
                text: response.message,
                confirmButtonText: 'Ok'
              })
              if(response.status == 'success'){
                closePopUp(1)
                $('#newProgram').trigger('reset');
                $('#newProgramAccessed').trigger('reset');
                $('#tuitionFeeBtn').text('Accessed Fees');
                $('#addNewProgram').text('Submit');
                  $("[name='programId']").prop('readonly', false);
                availablePrograms('%');
              }
              
            }
          });

          }else{
            
            let formData = new FormData($("#newProgram")[0]);
            let formDataPrecios = new FormData($("#newProgramAccessed")[0]);
            for (var pair of formDataPrecios.entries()) {
                formData.append(pair[0], pair[1]);
            }
            formData.append('addNewProgram', 'addNewProgram');
            $.ajax({
            type: "POST",
            url: "../includes/manageFess.php",
            data: formData,
            contentType: false,
            processData:false,
            success: function (response) {
              console.log(response)
              Swal.fire({
                icon: response.status,
                text: response.message,
                confirmButtonText: 'Ok'
              })
              if(response.status == 'success'){
                closePopUp(1)
                $('#newProgram').trigger('reset');
                $('#newProgramAccessed').trigger('reset');
                availablePrograms('%');
              }
              
            }
          });
              
              // $('#addNewProgram').text('Submit');
              
          }
        });
        // New Scholarship
        $('#addNewScholarship').click(function (e) { 
          e.preventDefault();
          if($('#addNewScholarship').text() == 'Submit'){
            let newScholarship = $('#newScholarship').serialize() + '&addNewScholarship=addNewScholarship';
            if($('#scholarDesc').val() == ''){
              Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Scholarship Description is empty',
                width: '400px'
              })
            }else if($('#scholarType').val() == ''){
              Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Scholarship Type is empty',
                width: '400px'
              })
            }else{
              $.ajax({
                type: "POST",
                url: "../includes/manageFess.php",
                data: newScholarship,
                success: function (response) {
                  console.log(response)
                  
                  if(response.status == 'success'){
                    Swal.fire({
                          icon: response.status,
                          text: response.message,
                          confirmButtonText: 'Ok'
                        })
                        closePopUp(3)
                  }else{
                    closePopUp(3)
                    Swal.fire({
                      title: 'Already Exist',
                      text: 'Do you want to update it?',
                      icon: response.status,
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $('#addNewScholarship').text('Update');
                        $('#scholarType').val(response.scholarType);
                        $( "input[name='scholarDesc']" ).prop( "disabled", true );
                        popUpAdmin_SchoolFees(3)
                      }
                    })
                  }
                }
            }); 
            }
          }else{
            $.ajax({
              type: "POST",
              url: "../includes/manageFess.php",
              data: {
                'udpateScholarship': 1,
                'scholarDesc': $('#scholarDesc').val(),
                'scholarType': $("#scholarType").find(":selected").val()
              },
              dataType: "json",
              success: function (response) {
                Swal.fire({
                  icon: response.status,
                  text: response.message,
                  confirmButtonText: 'Ok'
                })
                if(response.status == 'success'){
                    $("#scholarDesc").val('').change()
                    $( "input[name='scholarDesc']" ).prop( "disabled", false );
                    $('#addNewScholarship').text('Submit');
                    closePopUp(3)
                }
              }
            });
          }
          
        });
        // New Discount
        $('#addNewDiscount').click(function (e) { 
          e.preventDefault();
          let newDiscount = $('#newDiscount').serialize() + '&addNewDiscount=addNewDiscount';
          if($('#addNewDiscount').text() == 'Submit'){
            if($("[name='discountDesc']").val() == ''){
              Swal.fire({
                  icon: 'info',
                  title: 'Oops...',
                  text: 'Discount Description is empty',
                  width: '400px'
                })
            }else if ($("[name='discountPer']").val() == 0){
              Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Discount Percentage is empty',
                width: '400px'
              })
            }else{
              $.ajax({
                  type: "POST",
                  url: "../includes/manageFess.php",
                  data: newDiscount,
                  success: function (response) {
                    console.log(response)

                    if(response.status == 'success'){
                      Swal.fire({
                            icon: response.status,
                            text: response.message,
                            confirmButtonText: 'Ok'
                          })
                          $("input[name='discountDesc']").val('')
                          $("input[name='discountPer']").val('')
                          closePopUp(4)
                    }else{
                      closePopUp(4)
                      Swal.fire({
                        title: 'Already Exist',
                        text: 'Do you want to update it?',
                        icon: response.status,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          $('#addNewDiscount').text('Update');
                          $( "input[name='discountDesc']" ).prop( "disabled", true );
                          $("input[name='discountPer']").val(response.percent);
                          popUpAdmin_SchoolFees(4)
                        }
                      })
                    }
                  }
              });
            }
          }else{
            $.ajax({
              type: "POST",
              url: "../includes/manageFess.php",
              data: {
                'updateDiscount': 1,
                'discountDesc': $("input[name='discountDesc']").val(),
                'discountPer': $("input[name='discountPer']").val()
              },
              dataType: "json",
              success: function (response) {
                Swal.fire({
                  icon: response.status,
                  text: response.message,
                  confirmButtonText: 'Ok'
                })
                if(response.status == 'success'){
                  $("input[name='discountDesc']").val('')
                  $("input[name='discountPer']").val('')
                  $( "input[name='discountDesc']" ).prop( "disabled", false );
                  $('#addNewDiscount').text('Submit');
                  closePopUp(4)
                }
              }
            });
          }
        });
        // Edit Program
        $(document).on('click', '#editProgram', function(){ 
          let id = $(this).attr("data-id");
          $('#tuitionFeeBtn').text('View Accessed Fees');
          let course_program = $('#'+id).children('td[data-target=course_program]').text();
          let course_major = $('#'+id).children('td[data-target=course_major]').text();
          let course_year_level = $('#'+id).children('td[data-target=course_year_level]').text();
          let course_duration = $('#'+id).children('td[data-target=course_duration]').text();
          let semester = $('#'+id).children('td[data-target=semester]').text();
          let tuition_fee = $('#'+id).children('td[data-target=tuition_fee]').text();
          $.ajax({
            type: "GET",
            url: "../includes/manageFess.php",
            data: {
              'getProgramData': 1,
              'id': id
            },
            dataType: "JSON",
            success: function (data) {
              // console.log(response)
              $('#lectureFee').val(data.lecture_Fee);
              $('#labFee').val(data.lab_Fee);
              $('#libraryFee').val(data.library_Fee);
              $('#guidanceFee').val(data.guidance_Fee);
              $('#athleticFee').val(data.athletic_Fee);
              $('#computerFee').val(data.computer_Fee);
              $('#registrationFee').val(data.registration_Fee);
            }
          });
          popUpAdmin_SchoolFees(2);
          
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
              if(response.status == 'success'){
                closePopUp(close)
              }
              
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
              document.querySelector('#dashboardForAdminId').style.display = "none"

            }else{
              document.querySelector('#student-tab').style.display = "none"
              document.querySelector('#student').style.display = "none"
              document.querySelector('#employees-tab').classList.toggle('active')
              document.querySelector('#employees').classList.toggle('active')
              document.querySelector('#employees').classList.toggle('show')
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
            $(document).ajaxStart(function() {
              loaderOpen();
            });

            $(document).ajaxStop(function() {
              loaderClose();
            });
      </script>
             
             
          <script type="text/javascript">
          $(document).ready(function(){

              $("#Daily").click(function(){
                let today =  new Date().toLocaleDateString()
                daily()
                $.ajax({
                  type: "GET",
                  url: "../includes/admin_reports.php",
                  data: {
                    'computeDaily': 1
                  },
                  dataType: "JSON",
                  success: function (data) {
                    // console.log(data)
                    $('.totalamountChart').text(data.total_amount_collected);
                    $('.cashText').text(data.total_cash);
                    $('.onlineText').text(data.total_online);
                    let count = data.total_Count;
                    myChart.data.labels = ['Today'];
                    myChart.data.datasets[0].data = [parseInt(count)];
                    myChart.update();
                  }
                });
              });

              $('#Monthly').on('change',function(){
                var  months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                  let optionVal = $(Monthly).val();
                  monthlyTable(optionVal)
                    $.ajax({
                      type: "GET",
                      url: "../includes/admin_reports.php",
                      data: {
                        'computeMothly': 1,
                        'month': optionVal
                      },
                      dataType: "JSON",
                      success: function (data) {
                        // console.log(data)
                        $('.totalamountChart').text(data.total_amount_collected);
                        $('.cashText').text(data.total_cash);
                        $('.onlineText').text(data.total_online);
                        let count = data.total_Count;
                        myChart.data.labels = [months[optionVal-1]];
                        myChart.data.datasets[0].data = [parseInt(count)];
                        myChart.update();
                      }
                  });
                });
            
                $('#Annually').on('change',function(){
                    let optionValyear = $(Annually).val();
                    yearlyTable(optionValyear)
                    $.ajax({
                      type: "GET",
                      url: "../includes/admin_reports.php",
                      data: {
                        'computeYearly': 1,
                        'year': optionValyear
                      },
                      dataType: "JSON",
                      success: function (data) {
                        console.log(data)
                        $('.totalamountChart').text(data.total_amount_collected);
                        $('.cashText').text(data.total_cash);
                        $('.onlineText').text(data.total_online);
                        let count = data.total_Count;
                        myChart.data.labels = ['Year: '+ optionValyear];
                        myChart.data.datasets[0].data = [parseInt(count)];
                        myChart.update();
                      }
                  });
                });

                // Functio Reports
                function daily(){
                  $.ajax({
                  type: "GET",
                  url: "../includes/admin_reports.php",
                  dataType: "html",
                  data: {
                      "Daily" : 1
                  },
                  success: function(data){
                    $("#adminReports").html(data);
                  }});
              }
              function monthlyTable(month){
                  $.ajax({
                        type: "GET",
                        url: "../includes/admin_reports.php",
                        dataType: "html",
                        data: {
                          "Monthly" : 1,
                          "monthSelect": month
                        },
                          success: function (data) {
                            $('#adminReports').html(data);
                          }
                      });
                }
                function yearlyTable(year){
                  $.ajax({
                        type: "GET",
                        url: "../includes/admin_reports.php",
                        dataType: "html",
                        data: {
                          "Annually" : 1,
                          "yearSelect": year
                        },
                          success: function (data) {
                            $('#adminReports').html(data);
                          }
                      });
                }
            });

               
  


    // pagingType: 'full_numbers',
    // initComplete: function() {
    //     this.api().columns().every( function () {
    //         var column = this;
    //         var select = $('<select><option value=""></option></select>')
    //         .appendTo( $(column.footer()).empty() )
    //         .on( 'change', function() {
    //             var val = $.fn.dataTable.util.escapeRegex(
    //                 $(this).val()
    //             );
    //             column
    //             .search( val ? '^'+val+'$' : '', true, false )
    //             .draw();
    //         });
    //         column.data().unique().sort().each( function ( d, j ) {
    //             select.append('<option value="'+d+'">'+d+'</option>')
    //         });
    //     });
    // }
      
  
          </script>
          <script>
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
 <script type="text/javascript">
        $(document).ready(function(){
          $("#totalStud").click();
        });
      </script>




    <script>
      $('#studScholarship').on('change', function(){
       document.querySelector('#stud_lecUnits').value = ""
       document.querySelector('#stud_labUnits').value = ""
       document.querySelector('#stud_Fee').value = ""
      })
    </script>

  </body>
</html>