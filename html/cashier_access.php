<?php
include_once '../connection/Config.php';
  session_start();
  if($_SESSION['role'] != 'Cashier'){
    session_destroy(); 
    header('Location: ../html/login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Animation -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

  

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.css"/>
    
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- BoxIcons -->
     <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/cashier_access.css?<?php echo time(); ?>" />

     <!-- Sweet Alert 2 -->
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>




    <title>Cashier</title>
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
            <span>Pyro Colleges Inc.</span>
        </div>
        </div>

        <script type="text/javascript">
        window.onload = function(){
          closeLoader()
        }
        function closeLoader(){
          let loader = document.getElementById('loader-wrapperID')
                loader.style.opacity = "0"
                loader.style.visibility = "hidden"
                loader.style.pointerEvents = "none"
          }
          function openLoader(){
          let loader = document.getElementById('loader-wrapperID')
                loader.style.opacity = "1"
                loader.style.visibility = "visible"
               
          }
        </script>
<!-- LOADER -->
 <!-- Modal Banner -->
 <div class="modal fade text-dark" id="bannerForCashier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">

            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">
            <h4>Good day <strong><?= $_SESSION['fullname']?></strong> Please create your report so that you can logout.</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="bannerOk">Ok</button>
          </div>
        </div>
      </div>
    </div>

  <div class="cashDenominationContainer">
    <form action="../includes/generate-report.php" method="post" class="cashDenominationForm">
      <div class="cashDenominationTitle">
        <strong>Generate Report</strong>
        <i class="fas fa-times-circle" id="closeBtnCD"></i>
      </div>
      <div class="cashDenominationBody">
        <!-- <div class="cashInputsContainer">

        <div class="cashInputs">
          <img src="../images/cashDenomination/1000.png" alt="">
          <div class="inputCash">
          <input type="text" name="" id="deno1000" placeholder="???1000">
          <span>=</span>
          <input type="text" name="" id="totalDeno1000" placeholder="" value="00.00">
          </div>
        </div>

        <div class="cashInputs">

          <img src="../images/cashDenomination/500.jpg" alt="">
          <div class="inputCash">
          <input type="text" name="" id="deno500" placeholder="???500">
          <span>=</span>
          <input type="text" name="" id="totalDeno500" placeholder="" value="00.00">
          </div>
        </div> -->

        <!-- <div class="cashInputs">
            <img src="../images/cashDenomination/200.png" alt="">
            <div class="inputCash">
            <input type="text" name="" id="deno200" placeholder="???200">
            <span>=</span>
            <input type="text" name="" id="totalDeno200" placeholder="" value="00.00">
        </div>
          </div> -->
        </div>



          <!-- <div class="cashInputsContainer">
            
          <div class="cashInputs">
            <img src="../images/cashDenomination/100.jpg" alt="">
            <div class="inputCash">
            <input type="text" name="" id="deno100" placeholder="???100">
            <span>=</span>  
            <input type="text" name="" id="totalDeno100" placeholder="" value="00.00">
            </div>
          </div>

          <div class="cashInputs">
            <img src="../images/cashDenomination/50.jpg" alt="">
            <div class="inputCash">
            <input type="text" name="" id="deno50" placeholder="???50">
            <span>=</span>
            <input type="text" name="" id="totalDeno50" placeholder="" value="00.00">
            </div>

          </div>

          <div class="cashInputs">
          
            <img src="../images/cashDenomination/20.jpg" alt="">
           <div class="inputCash">
          
            <input type="text" name="" id="deno20" placeholder="???20">
            <span>=</span>
            <input type="text" name="" id="totalDeno20" placeholder="" value="00.00">
               
           </div>

        
          </div>
          </div> -->


          <!-- <div class="cashInputsContainer coins pb-3" style="border-bottom: 2px solid #0d6efd">
            <div class="cashInputs">
              <img src="../images/cashDenomination/centavo.jpg" alt="">

            <input type="text" name="" id="denoCent" placeholder="Centavo">
              <span>=</span>
              <input type="text" name="" id="totalDenoCent" placeholder="" value="00.00">
            
        
        
          </div>

          <div class="cashInputs">
            
            <img src="../images/cashDenomination/1php.jpg" alt="">
           
            <input type="text" name="" id="deno1" placeholder="???1">
              <span>=</span>
              <input type="text" name="" id="totalDeno1" placeholder="" value="00.00">
            
            
           
             
            
          </div>

          <div class="cashInputs">
         
            <img src="../images/cashDenomination/5php.png" alt="">
           
              <input type="text" name="" id="deno5" placeholder="???5">
              <span>=</span>
              <input type="text" name="" id="totalDeno5" placeholder="" value="00.00">
            

        
          </div>

          <div class="cashInputs">
          
            <img src="../images/cashDenomination/10php.jpg" alt="">
                      
            <input type="text" name="" id="deno10" placeholder="???10">
            <span>=</span>
            <input type="text" name="" id="totalDeno10" placeholder="" value="00.00">
          

        
          </div>

          </div> -->
        
          <div class="cashDenominationFooter my-3">
            <div class="cashDenominationFooterLeft">
              <p>Total Transaction Count: <span id = "total" >
                <?php
                        $cashier_ID = $_SESSION['employeeId'];
                        $sqlTotal = "SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
                        FROM `tbl_payments`
                        WHERE `transaction_date` = CURRENT_DATE() 
                        AND cashier_id = ?";
                        $total = $con->prepare($sqlTotal);
                        $total->bind_param('s',$cashier_ID);
                        $total->execute();
                        $resulttotal = $total->get_result();
                        $rowtotal = $resulttotal->fetch_row();
                        $count = mysqli_num_rows($resulttotal);
                        echo $count;
                  ?>
                      </span></p>
              <p>Total Amount Collected:??? <span id="totalAmountCollected">
                <?php

                    $cashier_ID = $_SESSION['employeeId'];
                    $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                                      WHERE transaction_date = CURRENT_DATE()
                                      AND cashier_id = ?"; 
                    $stmtTotal = $con->prepare($sqlTotalAmount);
                    $stmtTotal->bind_param('s',$cashier_ID);
                    $stmtTotal->execute();
                    $resTotal = $stmtTotal->get_result();
                    $row= $resTotal->fetch_assoc();
                    $total = $row['count'];
                    if($resTotal->num_rows > 0){
                      echo  $total;
                    }else{
                      echo  '0.00';
                    }
                        
                            
                    ?>
                    </span></p>
                    <p>Fund Transfer: ??? <span id = "fund">
                      <?php
                      $cashier_ID = $_SESSION['employeeId'];
                      $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                                        WHERE transaction_date = CURRENT_DATE()
                                        AND cashier_id = ?
                                        AND payment_method = 'Online'"; 
                      $stmtTotal = $con->prepare($sqlTotalAmount);
                      $stmtTotal->bind_param('s',$cashier_ID);
                      $stmtTotal->execute();
                      $resTotal = $stmtTotal->get_result();
                      $row= $resTotal->fetch_assoc();
                      $total = $row['count'];

                      if($resTotal->num_rows > 0){
                        echo  $total;
                      }else{
                        echo  '0.00';
                      }
                              
                      ?></span></p>
                       <p>Cash Payment: ??? <span id = "cash">
                      <?php
                      $cashier_ID = $_SESSION['employeeId'];
                      $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                                        WHERE transaction_date = CURRENT_DATE()
                                        AND cashier_id = ?
                                        AND payment_method = 'Cash'"; 
                      $stmtTotal = $con->prepare($sqlTotalAmount);
                      $stmtTotal->bind_param('s',$cashier_ID);
                      $stmtTotal->execute();
                      $resTotal = $stmtTotal->get_result();
                      $row= $resTotal->fetch_assoc();
                      $total = $row['count'];

                      if($resTotal->num_rows > 0){
                        echo  $total;
                      }else{
                        echo  '0.00';
                      }
                              
                      ?></span></p>
                      <!-- <p>Actual Cash: ??? <span id ="totalCashInput">0.00</span></p> -->
              
              <!-- <p>Variance: <span id = "variance">N/A</span></p> -->
            </div>

            <div class="cashDenominationFooterRight">
              
              <!-- <p>&nbsp;Gcash: <span><?php
                      $cashier_ID = $_SESSION['employeeId'];
                      $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                                        WHERE transaction_date = CURRENT_DATE()
                                        AND cashier_id = ?
                                        AND payment_gateway = 'Gcash'"; 
                      $stmtTotal = $con->prepare($sqlTotalAmount);
                      $stmtTotal->bind_param('s',$cashier_ID);
                      $stmtTotal->execute();
                      $resTotal = $stmtTotal->get_result();
                      $row= $resTotal->fetch_assoc();
                      $total = $row['count'];

                          echo "???". $total;
                              
                      ?></span></p>
              <p>&nbsp;Paymaya: <span><?php
                      $cashier_ID = $_SESSION['employeeId'];
                      $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                                        WHERE transaction_date = CURRENT_DATE()
                                        AND cashier_id = ?
                                        AND payment_gateway = 'Paymaya'"; 
                      $stmtTotal = $con->prepare($sqlTotalAmount);
                      $stmtTotal->bind_param('s',$cashier_ID);
                      $stmtTotal->execute();
                      $resTotal = $stmtTotal->get_result();
                      $row= $resTotal->fetch_assoc();
                      $total = $row['count'];

                          echo "???". $total;
                              
                      ?></span></p>
              <p>&nbsp;Remittance: <span><?php
                      $cashier_ID = $_SESSION['employeeId'];
                      $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                                        WHERE transaction_date = CURRENT_DATE()
                                        AND cashier_id = ?
                                        AND payment_gateway = 'Remittance'"; 
                      $stmtTotal = $con->prepare($sqlTotalAmount);
                      $stmtTotal->bind_param('s',$cashier_ID);
                      $stmtTotal->execute();
                      $resTotal = $stmtTotal->get_result();
                      $row= $resTotal->fetch_assoc();
                      $total = $row['count'];

                          echo "???". $total;
                              
                      ?></span></p>
                      
                      
              <p>&nbsp;Bank Transfer: <span><?php
                      $cashier_ID = $_SESSION['employeeId'];
                      $sqlTotalAmount = "SELECT SUM(amount) AS count FROM tbl_payments
                                        WHERE transaction_date = CURRENT_DATE()
                                        AND cashier_id = ?
                                        AND payment_gateway = 'Bank Transfer'"; 
                      $stmtTotal = $con->prepare($sqlTotalAmount);
                      $stmtTotal->bind_param('s',$cashier_ID);
                      $stmtTotal->execute();
                      $resTotal = $stmtTotal->get_result();
                      $row= $resTotal->fetch_assoc();
                      $total = $row['count'];

                          echo "???". $total;
                              
                      ?></span></p> -->
            </div>
            
          </div>
          <!-- <button type="submit" id="generateReport" class="btn btn-primary d-block">Generate Report</button> -->
      </div>
     
    </form>
  </div>


   


    <div class="row">
      <div class="col left-tab">
      <img src="../images/logo.png" class="logoLeftTab" alt="">
        <div class="upper-left-tab">
        <?php
              $sqlPic ="SELECT *
                        FROM tbl_employee_info
                        WHERE employee_id  = ?";
              $stmtPic = $con->prepare($sqlPic);
              $stmtPic->bind_param('s', $_SESSION['employeeId']);
              $stmtPic->execute();
              $resPic = $stmtPic->get_result(); 
              $rowPic = $resPic->fetch_assoc();
              if($rowPic['profilePic'] == ''){
          ?>
            <img src="..\images\registrar_img\sample_registrar_pic.png" alt="">
          <?php }else{ ?>
            <img src="../profilePics/<?php echo $rowPic['profilePic'];?>" alt="">
          <?php }?>
          <p class="reg__name" style="font-size: 1.2rem;"> <?= $_SESSION['fullname'];?> <i class="fas fa-caret-down" onclick="profile_link_show()   "></i></p>
            <div class="profile_link" id="profile_link_id">
              <a href="">My Email</a>
              <a href="../html/forgotPassword.php">Change Password</a>
              <a href="../includes/logout.inc.php">Logout</a>
            </div>
          <p class="reg__name" id="roleId">Cashier | C-<?= $_SESSION['employeeId'];?></p>
          <p class="reg__name" id="reg-date-time"></p>
        </div>

        <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class='bx bxs-dashboard'></i>&nbsp;Dashboard</a>
            <a class="nav-link main__" id="v-pills-payment-transactions-tab" data-toggle="pill" href="#v-pills-payment-transactions" role="tab" aria-controls="v-pills-payment-transactions" aria-selected="false"><i class="fas fa-money-bill-wave-alt"></i>&nbsp;Payment</a>
            <a  class="nav-link main__" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false"><i class='fas fa-history' srty></i>&nbsp;History</a>
            <a class="nav-link main__" id="v-pills-studFee-tab" data-toggle="pill" href="#v-pills-studFee" role="tab" aria-controls="v-pills-studFee" aria-selected="false"><i class="fas fa-coins"></i>&nbsp;Student Fees</a>
      </div>
      </div>
      


    <div class="col-md right-tab">
          
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Dashboard -->
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">
                      
              <p class="title_tab_universal my-3">Approve Payments</p>

            <!-- Table -->
            
            <div class="dashBoardBox p-3" dissabled>
            <span style="font-size: 1.6rem; font-weight: 500; color: var(--secondary); display: block; margin: 0 0 25px 0">Fund Transfers (Online)</span>  
            
              <table class="table" style="color: var(--white);" id="pendingTable">
                  <thead class="text-center" style="border-bottom: 2px solid white; margin-top: 25px">
                    <tr>
                      <th scope="col">Transaction ID</th>
                      <th scope="col">Student ID</th>
                      <th scope="col">Fullname</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Date</th>
                      <th scope="col">Email</th>
                      <th scope="col">Sales Invoice</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody id ="viewPendingPayments" class="text-center"> 
                    
                  </tbody>
                </table>
        </div>
      </div>
      <!-- Modal View Invoice -->
      <div class="modal fade" id="salesInvoice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Proof of Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img id="invoiceImg" style="width: 100%;" src="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div> 
        <!-- Modal Deny  -->
        <div class="modal fade" id="denyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header text-dark">
                <h5 class="modal-title" id="staticBackdropLabel">Reason to Deny Payment Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="input-group input-group-sm mb-3">
                
                <input type="hidden" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="transactionNo">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Fullname:</span>
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="studFullname">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1">Email:</span>
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="studEmail">
                </div>
              </div>
              <div class="form-floating text-dark">
                <textarea class="form-control " placeholder="Leave a comment here" id="reasonToDeny" style="height: 100px"></textarea>
                <label for="reasonToDeny">Comments</label>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sendDeny">Send Deny</button>
              </div>
            </div>
          </div>
        </div>       


            <!-- PAYMENT TRANSACTIONS -->
            <div class="tab-pane fade" id="v-pills-payment-transactions" role="tabpanel" aria-labelledby="v-pills-payment-transactions">
              <p class="title_tab_universal my-3">Payment Form</p>

              <form action="" class="universalForm_one">
                <input type="text" id="searchBar_TransacHistory" placeholder="Search">
                <button type="button" class="btn btn-primary" id="payTransac_btn">Search</button>
              </form>
                      
              <div class="dashBoardBox d-flex" style="overflow-x: hidden;">
              

                <div class="mx-2 my-auto" style="color: var(--primary)">
                  <img src="../images/registrar_img/sample_student_pic.png" alt="" class="mb-2 d-block mx-auto my-auto" style="width: 180px; height: 180px;">
                  <span class="d-block text-center" style="font-size: 1.1rem; font-weight: bold; color: var(--secondary)" id="studName">Fullname</span>
                  <span class="d-block text-center" style="font-size: 1.1rem; font-weight: bold; color: var(--secondary)" id="studID">Student ID</span>
                  <!-- <span class="d-block text-primary text-center" style="font-size: 1rem; font-weight: bold;" id="payStudProg">Program-Major</span> -->

                  <span class="d-block text-center" style="font-size: 1rem; font-weight: bold; color: var(--secondary)" id="payStudScholar">Scholarship</span>

                  <span class="d-block text-center" style="font-size: 1rem; font-weight: bold; color: var(--secondary)" id="payStudDiscount">Discount</span>
                  
                </div>
                <div class="payments_tab_right">
                  <form action="">
                    <div class="col">
                      <label class="sr-only" for="StudProgram">Program</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text beforeInput">Program ID</div>
                            </div>
                          <input type="text" class="form-control w-auto" id="StudProgram" placeholder="Program" disabled>
                        </div>
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput" >Tuition Fee</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="studTuition" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput" >Scholarship Deduction</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="scholarDeduction" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput" >Discount Deduction</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="discountDeduction" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Total Amount Paid</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="studTotalAmountPaid" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Balance</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="studBalance" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Amount to Pay</span>
                        <span class="input-group-text">???</span>
                        <input type="number" min="0"class="form-control w-auto" id="studAmountToPay" placeholder="0.00" >
                        <span class="input-group-text text-success" style="font-weight: bold;"><i class="fas fa-coins"></i>&nbsp; Cash</span>
                      </div>  
                    </div>
                    

                  <div class="col-12 mt-3 mb-2">
                    <button type="button" class="btn btn-success payVoid"  id="payBtn" disabled>Pay</button>
                  </div>
                </form>
              </div>
                <!-- Pay Modal -->
            
            </div>

            <div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div class="col">
                      <label class="sr-only" for="previewStudId">Student ID</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text beforeInput">Student ID</div>
                            </div>
                          <input type="text" class="form-control w-auto" id="previewStudId" placeholder="Student ID" disabled>
                        </div>
                    </div>
                  <div class="col">
                      <label class="sr-only" for="previewStudName">Fullname</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text beforeInput">Fullname</div>
                            </div>
                          <input type="text" class="form-control w-auto" id="previewStudName" placeholder="Fullname" disabled>
                        </div>
                    </div>
                  <div class="col">
                      <label class="sr-only" for="previewStudProgram">Program</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text beforeInput">Program</div>
                            </div>
                          <input type="text" class="form-control w-auto" id="previewStudProgram" placeholder="Program" disabled>
                        </div>
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput" >Tuition Fee</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="previewStudTuition" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Balance</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="previewStudBalance" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Amount to Pay</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="previewStudAmountToPay" placeholder="0.00" disabled>
                      
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Cash Amount</span>
                        <span class="input-group-text">???</span>
                        <input type="number" class="form-control w-auto" id="cashAmount" placeholder="0.00">
                        <span class="input-group-text text-success" style="font-weight: bold;"><i class="fas fa-coins"></i>&nbsp; Cash</span>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Change</span>
                        <span class="input-group-text">???</span>
                        <input type="text" class="form-control w-auto" id="previewChangeCalculated" placeholder="0.00" disabled>
                        
                      </div>  
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="voidTransaction">Void</button>
                    <button type="button" class="btn btn-primary" id="transactPayment">Transact</button>
                  </div>
                </div>
              </div>
            </div>

          
           
            <!-- Table -->
          <div class="dashBoardBox">
            
          <span style="color: var(--secondary); font-weight: 500; font-size: 1.3rem"  id="studentTagName">Student's Last Transaction</span>
           
            
            <table class="table" style="color: var(--white)">
            <thead class="text-center">
              <tr>
                <th scope="col">Transction No.</th>
                <th scope="col">Student No.</th>
                <th scope="col">Full Name</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Payment Gateway</th>
                <th scope="col">Remarks</th>
                <th scope="col">Date</th>
              </tr>
                <tbody id="viewLastTransaction" class="text-center">
                  
                </tbody>
            </thead>
            </table>
          </div>

              
              <!-- <div class="dashBoardBox">
                <table class="table" style="color: var(--white)">
                    <thead class="text-center" style="color: var(--white)">
                      <tr>
                        <th scope="col">Transaction No.</th>
                        <th scope="col">Student No.</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Payment Gateway</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody id="viewLastTransaction" class="Text-center">

                  </tbody> 
                  </table>
                  </div> -->
          
        </div>
            



            <!-- HISTORY -->
            <div class="tab-pane fade history-tab" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
              <p class="title_tab_universal my-3">Transaction History</p>

              

              <div class="cashierHistoryInfoContainer">
                <div class="historyInfoBox">
                  <i class="fas fa-coins"></i>
                  
                    <div class="historyInfoLbl">
                      <div class="historyInfoLblUp text-center">
                        <h6><strong style="font-size: 1.1rem;  display:block;" id="cashCount">
                      
                      </strong> Transactions</h6>

                      </div>
                      <div class="historyInfoLblDown">
                      <h5>???<strong id="cashTotal">
                   
                      </strong></h5>
                      
                      </div>
                      
                    </div>
                </div>

                <div class="historyInfoBox">
                  <i class="fas fa-credit-card"></i>
                  
                    <div class="historyInfoLbl">
                      <div class="historyInfoLblUp text-center">
                        <h6><strong style="font-size: 1.1rem; display:block;" id="onlineCount">
                      
                      </strong>Transactions</h6>

                      </div>
                      <div class="historyInfoLblDown">
                      <h5>???<strong id="onlineTotal">
                     
                      </strong></h5>
                      </div>
                      
                    </div>
                </div>


                <div class="historyInfoBox">
                  <i class="fas fa-wallet"></i>
                  
                    <div class="historyInfoLbl">
                      <div class="historyInfoLblUp text-center">
                        <h6><strong style="font-size: 1.1rem; display:block;"  id="totalTransactionCount">
                     
                      </strong>Total Transactions</h6>

                      </div>
                      <div class="historyInfoLblDown">
                      <h5>???<strong id="totalTransactionAmount" >
                    
                      </strong></h5>
                      </div>
                      
                    </div>
                </div>


              </div>
<!-- 
              <form action="" class="universalForm_one">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary" >Search</button>
              </form> -->



              <div class="dashBoardBox p-3">
                <p style="font-size: 1.6rem; font-weight: 500; color: var(--primary)">Filter:</p>

                <form action="" class="my-1">
                <div class="row">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="filterByPayMethod" aria-label="Floating label select example">
                        <option value="%" selected>All</option>
                          <option value="Cash">Cash</option>
                          <option value="Online">Fund Transfer</option>
                        </select>
                        <label for="filterByPayMethod" style="color: black">Payment Method</label>
                      </div>
                  </div>


                  <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="filterByDate" id="filterByDate" placeholder=" ">
                        <label for="floatingInput" style="color: black">Select Date:</label>
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="col-md mt-1">
                    <button class="btn btn-primary " id="filterApply">Apply</button>
                    <button class="btn btn-primary " id="filterClear">Clear</button>
                  </div>
                </div>
              </div>
              </form>
              
                  <table class="table" style="color: white">
                      <thead class="text-center">
                        <tr>
                          <th scope="col">Transaction ID</th>
                          <th scope="col">Student ID</th>
                          <th scope="col">Full name</th>
                          <th scope="col">Amount Paid</th>
                          <th scope="col">Payment Method</th>
                          <th scope="col">Payment Gateway</th>
                          <th scope="col">Payment Status</th>
                          <th scope="col">Date</th>
                      
                          
                        </tr>
                      </thead>
                      <tbody id="viewTransactionHistory">
                      </tbody>
                    </table>
                
               

              </div>
              <button class="btn btn-outline-primary my-2" id="genReportBtn">Create Report</button>
              <!-- Modal Password Input -->
              <div class="modal fade" id="genReportAuth" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel" style="color: black">Authentication</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body">
                        <form action="" id="genReportAuthForm">
                          <div class="form-floating">
                            <input type="password" class="form-control" id="genReportPass" placeholder="Enter your password">
                            <label for="genReportPass" style="color: black">Enter Password</label>
                          </div>
                          <div style="height: 70px;">
                              <div class=" h-75 d-flex justify-content-center my-3">
                                <button type="submit" class="btn btn-primary w-50">Submit</button>
                              </div>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
              </div>
              <!-- Modal Generate Report -->
              <div class="modal fade" id="genReportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Generate Report</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="">
                      <div class="col">
                        <label class="sr-only" for="StudProgram">Cashier name:</label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text beforeInput">Cashier name</div>
                              </div>
                            <input type="text" class="form-control w-auto" id="gencashierId" disabled
                            value="<?= $_SESSION['fullname'] ?>">
                          </div>
                      </div>
                      <div class="col">
                        <label class="sr-only" for="StudProgram">Cashier ID:</label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text beforeInput">Cashier ID</div>
                              </div>
                            <input type="text" class="form-control w-auto" id="gencashierName" disabled value="<?= $_SESSION['employeeId'] ?>">
                          </div>
                      </div>
                      <div class="col">
                        <label class="sr-only" for="StudProgram">Total Transaction Count:</label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text beforeInput">Total Transaction Count</div>
                              </div>
                            <input type="text" class="form-control w-auto" id="genTotalTransCount" disabled 
                            value="">
                          </div>
                      </div>
                      <div class="col">
                        <label class="sr-only" for="StudProgram">Total Amount Collected:</label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text beforeInput">Total Amount Collected</div>
                              </div>
                            <input type="text" class="form-control w-auto" id="genTotalAmounCollected" disabled 
                            value="">
                          </div>
                      </div>
                      <div class="col">
                        <label class="sr-only" for="StudProgram">Fund Transfer Collected:</label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text beforeInput">Fund Transfer Collected</div>
                              </div>
                            <input type="number" class="form-control w-auto" id="genFundsColleted" disabled  placeholder="0.00" 
                            value="">
                          </div>
                      </div>
                      <div class="col">
                        <label class="sr-only" for="StudProgram">Cash Amount Collected:</label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text beforeInput">Cash Amount Collected</div>
                              </div>
                            <input type="number" class="form-control w-auto" id="genCashColleted" disabled  placeholder="0.00" 
                            value="">
                          </div>
                      </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="generateReport">Generate</button>
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript">
                  const cashDenominationContainer = document.querySelector('.cashDenominationContainer')
                  const cashDenominationForm = document.querySelector('.cashDenominationForm')
                  const totalTransactionCount =document.getElementById('totalTransactionCount')
              //   document.querySelector("#genReportBtn").addEventListener('click', function(){
              //    if(totalTransactionCount.innerText == '0'){
              //     Swal.fire(
              //       'No Transaction',
              //       '',
              //       'info'
              //     )
              //    }else{
                  
              //    }
                
              // })

              document.querySelector('#closeBtnCD').addEventListener('click', function(){
                closedCashDenomination();
              })
              function closedCashDenomination(){
                cashDenominationContainer.style.visibility = "hidden"
                  cashDenominationContainer.style.opacity = "0"
                  cashDenominationForm.classList.toggle('animate__animated')
                  cashDenominationForm.classList.toggle('animate__bounceIn')
              }
              function openCashDenomination(){
                  cashDenominationContainer.style.visibility = "visible"
                  cashDenominationContainer.style.opacity = "1"
                  cashDenominationForm.classList.toggle('animate__animated')
                  cashDenominationForm.classList.toggle('animate__bounceIn')
              }
              </script>

             
             
            </div>


            <!-- Student Fees -->
            <div class="tab-pane fade studFee-tab" id="v-pills-studFee" role="tabpanel" aria-labelledby="v-pills-studFee-tab">
              <p class="title_tab_universal my-3">Student Fees</p>

            

              <div class="dashBoardBox p-3">
                <div class="row">
                <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="filterByRemarks" aria-label="Floating label select example">
                            <option value="All" selected>All</option>
                            <option value="Fully Paid" >Fully Paid</option>
                            <option value="Not Fully Paid" >Not Fully Paid</option>
                    </select>
                    <label for="filterByRemarks" style="color: black">Filter by Remarks:</label>
                  </div>
                </div>
                <!-- <div class="col-md-4">
                  <div class="form-floating">
                    <select class="form-select" id="" aria-label="Floating label select example">
                            <option value="" selected></option>

                    </select>
                    <label for="filterByRemarks" style="color: black">Select Due Date:</label>
                  </div>
                </div> -->
                <!-- <div class="col-md-2">
                <input type="checkbox" class="btn-check" id="btn-check-2-outlined" autocomplete="off">
                  <label class="btn btn-outline-success pt-3  " for="btn-check-2-outlined" style="height: 100%; width: 100%;">Past Due</label><br>

                </div>
                <div class="col-md-2">
                  <button class="btn btn-outline-primary" style="height: 100%; width: 100%; color: var(--secondary)">Post e-bill</button>
                </div> -->
                </div>


                
                  <table class="table" style="color: white; overflow-x: hidden" >
                      <thead class="text-center">
                        <tr>
                        <th scope="col">Student ID</th>
                          <th scope="col">Full name</th>
                          <th scope="col">Program</th>
                          <th scope="col">Major</th>
                          <th scope="col">Year Level</th>
                          <th scope="col">Tuition Fee</th>
                          <th scope="col">Scholarship Discount</th>
                          <th scope="col">Discount Deduction</th>
                          <th scope="col">Scholar Type</th>
                          <th scope="col">Total Amount Paid</th>
                          <th scope="col">Remaining Balance</th>
                          <th scope="col">Remarks</th>
                        </tr>
                      </thead>
                      <tbody id="viewStudentFeesList">
                            
                            
                      </tbody>
                    
                    </table>
                
              </div>
              
            </div>

          
          


        </div>
      </div>
      </div>
      <!-- JS -->
    <script type="text/javascript">
            function profile_link_show(){
            let profile_link = document.getElementById('profile_link_id');
            profile_link.classList.toggle('show');
            }
            let clockElement = document.getElementById('reg-date-time');
    
        function clock() {
            clockElement.textContent = new Date().toLocaleTimeString();
            clockElement.textContent += " - " + new Date().toLocaleDateString();
        }
        setInterval(clock, 1000);   

          </script>

          
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

     
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    
    <!-- Dashboard Script -->
  <script>
    $(document).ready(function () {
      
      let allData = 'Pending'
      let generalSort = 'transaction_no'
      viewPending(allData,generalSort); //Onload Display Table Data
      // SEARCH
      $('#searchDashBar-btn').click(function (e) { 
        e.preventDefault();
        let searchData = document.getElementById('searchDashBar').value
        viewPending(searchData,generalSort);
      });
      // SORTBY
      $( "#sortByDashData" ).change(function() {
        let sortBy =  $("select#sortByDashData option").filter(":selected").val();//Get Dropdown Selected Value
        viewPending(allData,sortBy);
      });
      // Approve 
      $(document).on('click', '#approve', function(){
        let transactionNo = $(this).attr("data-id"); //Get data- attribute containing Transaction No.
        let name = $(this).attr("data-name");//Get data- attribute containing Name
        Swal.fire({
          title: 'Are you sure?',
          text: "Approving Students Payment for" + name,
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Approve It!'
        }).then((result) => {
          if (result.isConfirmed) { //Approve Clicked
            $.ajax({
              type: "POST",
              url: "../includes/managPayments.php",
              data: {
                "approve": 1,
                "transactionNo": transactionNo,
                'cashierName': '<?=$_SESSION['fullname']?>',
                'cashierId': '<?=$_SESSION['employeeId']?>'
              },
              beforeSend: function() {
                openLoader()
              },
              success: function (response) {
                console.log(response)
                Swal.fire(
                'Approve!',
                'Payment Proccessed Complete',
                'Success'
                )
                viewPending(allData,generalSort);
              },
              complete: function() {
                closeLoader()
              }
            });
          }
        })
      });
      // Deny Button in table Trigger Modal to pop
      $(document).on('click', '#deny', function(){
        let transactionNo = $(this).attr("data-id");
        let name = $(this).attr("data-name");
        let email = $(this).attr("data-email");
        $('#denyModal').modal('show');
        $('#transactionNo').val(transactionNo);
        $('#studEmail').val(email);
        $('#studFullname').val(name);

      });
      // Send Deny madal button
      $('#sendDeny').click(function (e) { 
        e.preventDefault();
        let transactionNo = $('#transactionNo').val();
        let reasonToDeny = $('#reasonToDeny').val();
        let studFullname = $('#studFullname').val();
        let studEmail = $('#studEmail').val();
        if(reasonToDeny == 0){
          Swal.fire(
            'Comment is empty',
            'Please enter your reason why are you denying payment request',
            'info'
          )
        }else{
          $.ajax({
            type: "POST",
            url: "../includes/managPayments.php",
            data: {
              "deny": 1,
              "transactionNo": transactionNo,
              "reasonToDeny": reasonToDeny,
              "studEmail": studEmail,
              "studFullname": studFullname,
              'cashierName': '<?=$_SESSION['fullname']?>',
              'cashierId': '<?=$_SESSION['employeeId']?>'
            },
            beforeSend: function() {
                  openLoader()
            },
            success: function (response) {
              console.log(response)
              Swal.fire(
                  'Denied!',
                  'Payment Denied Complete',
                  'info'
                  )
              $('#denyModal').modal('hide');
              viewPending(allData,generalSort);
            },
              complete: function() {
                  closeLoader()
              },
          });
        }
        
      });
      // Show Invoice Modal
      $(document).on('click', '#viewInvoice', function(){
        let invoiceImg = $(this).attr("data-id");
        let dir = '../saleInvoiceImg/'
        document.getElementById("invoiceImg").src = dir + invoiceImg;
      });
    });
    // View Pending Payments AJAX request include search,sortBy,view all data
    function viewPending(query,sort){
      $.ajax({
        type: "POST",
        url: "../includes/managPayments.php",
        data:{
          "viewPending": 1,
          "query": query,
          "sort": sort
        },
        dataType: "html",
          success: function (data) {
          $('#viewPendingPayments').html(data);
        }
      });
    }
  </script>
    <!-- Payment Transaction -->
    <script>
      $(document).ready(function () {
        // Pay Button
        $('#payBtn').click(function (e) { 
          let amountToPay = $('#studAmountToPay').val();
          let studBalance = $('#studBalance').val();
          e.preventDefault();
          if(parseInt(studBalance) == 0){
            Swal.fire(
              'Balance is Zero',
              'The student is Fully Paid',
              'info'
            )
          
            }else if(amountToPay == ''){
              Swal.fire(
              'Insufficient Amount',
              'Empty amount',
              'warning'
            )
            }else if(parseFloat(amountToPay) > parseFloat(studBalance.replace(/,/g, ""))){
              Swal.fire(
              'Insufficient Amount',
              'Amount to pay is greater than Student Balance',
              'warning'
            )
            }else{
              $("#payModal").modal('show');
              $('#previewStudId').val($('#studID').text());
              $('#previewStudName').val($('#studName').text());
              $('#previewStudProgram').val($('#StudProgram').val());
              $('#previewStudTuition').val($('#studTuition').val());
              $('#previewStudBalance').val($('#studBalance').val());
              $('#previewStudAmountToPay').val($('#studAmountToPay').val());
              $('#previewChangeCalculated').val($('#changeCalculated').val());
            }
          
        });
        // Search Button
        $('#payTransac_btn').click(function (e) { 
          e.preventDefault();
          let query = document.getElementById('searchBar_TransacHistory').value
          if(query == ''){
            Swal.fire(
              'Nothing to search',
              'Empty search bar',
              'warning'
            )
          }else{
            searchData(query)
            viewLastTransaction(query)
          }
        });
        // Calculate Change
        $('#cashAmount').keyup(function (e) { 
          e.preventDefault();
          let cashAmount = $('#cashAmount').val();
          let amountToPay = $('#studAmountToPay').val();
          if(parseInt(cashAmount) > parseInt(amountToPay)){
            $('#previewChangeCalculated').val(parseInt(cashAmount) - parseInt(amountToPay));
          }else if(parseInt(cashAmount) <= parseInt(amountToPay)){
            $('#previewChangeCalculated').val('');
          }
          
        });
        // Transact Payment Button
        $('#transactPayment').click(function (e) { 
          e.preventDefault();
          let cash = $('#cashAmount').val();
          let amoutToPay = $('#previewStudAmountToPay').val();
          if( parseFloat(cash) < parseFloat(amoutToPay)  || cash == 0){
            Swal.fire(
              'Insufficient',
              'Insufficient Cash ',
              'error'
            )
          }else{
             $.ajax({
              type: "POST",
              url: "../includes/payment-transaction-cashier.php",
              data: {
                'transact': 'transact',
                'studId':  $('#studID').text(),
                'amount': $('#previewStudAmountToPay').val(),
                'cashierName': '<?=$_SESSION['fullname']?>',
                'cashierId': '<?=$_SESSION['employeeId']?>'
              },
              beforeSend: function() {
                openLoader()
              },
              dataType: "JSON",
              success: function (response) {
                console.log(response)
                Swal.fire({
                  icon: response.status,
                  text: response.message,
                  confirmButtonText: 'Ok'
                })
                if(response.status == 'success'){
                  $("#payModal").modal('hide');
                  $('#StudProgram').val('');
                  $('#studName').text('Fullname');
                  $('#studID').text('Student ID');
                  $('#payStudScholar').text('Scholarship');
                  $('#payStudDiscount').text('Discount');
                  $('#studentTagName').text('Student last transaction');
                  $('#studTuition').val('');
                  $('#studAmountToPay').val('');
                  $('#cashAmount').val('');
                  $('#studBalance').val('');
                  $('#scholarDeduction').val('');
                  $('#studTotalAmountPaid').val('');
                  $('#discountDeduction').val('');
                  $("#payBtn").prop("disabled", true);
                  viewLastTransaction('')
                }
              },
              complete: function() {
                closeLoader()
              },
            });
          }
           
          
        });
        // Void Transaction Button
        $('#voidTransaction').click(function (e) { 
          e.preventDefault();
          Swal.fire(
            'Voided!',
            'Transaction Void',
            'warning'
          )
          $('#StudProgram').val('');
          $('#studName').text('Fullname');
          $('#studID').text('Student ID');
          $('#payStudScholar').text('Scholarship');
          $('#payStudDiscount').text('Discount');
          $('#studentTagName').text('Student last transaction');
          $('#studTuition').val('');
          $('#studBalance').val('');
          $('#scholarDeduction').val('');
          $('#studTotalAmountPaid').val('');
          $('#discountDeduction').val('');
          $("#payBtn").prop("disabled", true);
          $('#studAmountToPay').val('');
        });
        // Search Student BY ID to fill the fields
        function searchData(getData){
          $.ajax({
            type: "GET",
            url: "../includes/payment-transaction-cashier.php",
            data: {
              'getData': getData
            },
            dataType: "JSON",
            success: function (data) {
              if(data.length ===0){
                Swal.fire(
                  'Not Found',
                  'Student ID not exist',
                  'info'
                )
              }else{
                console.log(data)
                $('#StudProgram').val(data.prograId);
                $('#studName').text(data.fullname);
                $('#studID').text(data.stud_id);
                $('#studTotalAmountPaid').val(data.studTotalAmountPaid);
                $('#payStudScholar').text(data.scholar);
                $('#payStudDiscount').text(data.studDiscount);
                $('#studentTagName').text(data.fullname + ' last transaction');
                $('#studTuition').val(data.tuition);
                $('#scholarDeduction').val(data.scholarDeduction);
                $('#discountDeduction').val(data.discountDeduction);
                $('#studBalance').val(data.balance);
                
                
                $("#payBtn").removeAttr('disabled');
              }
            }
          });
        }
        // AJAX request for search that will display in table
        function viewLastTransaction(studId){
          $.ajax({
            type: "GET",
            url: "../includes/payment-transaction-cashier.php",
            data: {
              'viewLastTransac': 'viewLastTransac',
              'studId':studId
            },
            dataType: "html",
            success: function (data) {
              $('#viewLastTransaction').html(data);
            }
          });
        }
      });
    </script>
    <!-- Transaction History -->
    <script>
      $(document).ready(function () {
        let dtToday = new Date();
        let month = dtToday.getMonth() + 1;
        let day = dtToday.getDate();
        let year = dtToday.getFullYear();
        if(month < 0){
          month = '0' + month.toString();
        }
        if(day < 10){
          day = '0' + day.toString();
        }
        let maxDate = year + '-' + month + '-' + day;
        $('#filterByDate').attr('max', maxDate);
        $('#filterByDate').change(function (e) { 
          e.preventDefault();
          let pickDate = $('#filterByDate').val();
          if(pickDate < maxDate){
            $( "#genReportBtn" ).prop( "disabled", true );
          }else{
            $( "#genReportBtn" ).prop( "disabled", false );
          }
        });
        // Open History Tab
        $('#v-pills-history-tab').click(function (e) { 
          viewTransactionHistory() //Initial Table data base on current date and cashier log in
          transactHistoryAuto()
          if($('#totalTransactionCount').text() == '0'){
            $( "#genReportBtn" ).prop( "disabled", true );
          }else{
            $( "#genReportBtn" ).prop( "disabled", false );
          }
        });
        // Apply Filter Button
        $('#filterApply').click(function (e) { 
          e.preventDefault();
          let selected = $('#filterByPayMethod').val();
          let date = $('#filterByDate').val();
          viewTransactionHistoryFilteredBy(selected,date)
          sumInfoTransaction(date)
        });
        
        // Clear Filter Button
        $('#filterClear').click(function (e) { 
          e.preventDefault();
          $("#filterByPayMethod").val("%").change();
          $("#filterByDate").val("").change();
          $( "#genReportBtn" ).prop( "disabled", false );
          viewTransactionHistory()
          sumInfoTransaction(maxDate)
        });
        function sumInfoTransaction(date){
          $.ajax({
            type: "GET",
            url: "../includes/transaction-history-cashier.php",
            data: {
              'getInfoSumTransaction': 1,
              'filterByDate': date,
              'cashier_ID': '<?= $_SESSION['employeeId']?>'
            },
            dataType: "json",
            success: function (data) {
              console.log(data)
              $('#cashCount').text(data.countCash);
              $('#cashTotal').text(data.cashTotal);
            $('#onlineCount').text(data.onlineCount);
            $('#onlineTotal').text(data.onlineTotal);
            $('#totalTransactionCount').text(data.totalTransactionCount);
            $('#totalTransactionAmount').text(data.totalTransactionAmount);

            // $('#genTotalTransCount').val(data.totalTransactionCount);
            // $('#genTotalAmounCollected').val(data.totalTransactionAmount);
            // $('#genFundsColleted').val(data.onlineTotal);
            // $('#genCashColleted').val(data.cashTotal);
            }
          });
        }
        
        // Ajax Request For Filter By Payment Mentod and Date
        function viewTransactionHistoryFilteredBy(selected,date){
          $.ajax({
            type: "GET",
            url: "../includes/transaction-history-cashier.php",
            data: {
              'viewTransactionHistoryFilteredBy': 1,
              'cashierID': '<?= $_SESSION['employeeId'];?>',
              'filterByPay': selected,
              'filterByDate': date
            },
            dataType: "html",
            success: function (data) {
              $("#viewTransactionHistory").html(data);
              // console.log(data)
            }
          });
        }
        // Ajax Request Of Initial Table Date
        function viewTransactionHistory(){
          $.ajax({
            type: "GET",
            url: "../includes/transaction-history-cashier.php",
            data: {
              'viewTransactionHistory': 1,
              'cashierID': '<?= $_SESSION['employeeId'];?>'
            },
            dataType: "html",
            success: function (data) {
              $("#viewTransactionHistory").html(data);
            }
          });
        }
      });
    </script>
    <!-- Student Fees -->
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
                // console.log(data);
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
    <!-- Cash Denomination -->
    <script>
      $(document).ready(function () {
        // $('#deno1000').keyup(function (e) { 
        //   let input = $('#deno1000').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 1000 * parseInt(input);
        //   $('#totalDeno1000').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno500').keyup(function (e) { 
        //   let input = $('#deno500').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 500 * parseInt(input);
        //   $('#totalDeno500').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno200').keyup(function (e) { 
        //   let input = $('#deno200').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 200 * parseInt(input);
        //   $('#totalDeno200').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno100').keyup(function (e) { 
        //   let input = $('#deno100').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 100 * parseInt(input);
        //   $('#totalDeno100').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno50').keyup(function (e) { 
        //   let input = $('#deno50').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 50 * parseInt(input);
        //   $('#totalDeno50').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno20').keyup(function (e) { 
        //   let input = $('#deno20').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 20 * parseInt(input);
        //   $('#totalDeno20').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#denoCent').keyup(function (e) { 
        //   let input = $('#denoCent').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = .25 * parseInt(input);
        //   $('#totalDenoCent').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno1').keyup(function (e) { 
        //   let input = $('#deno1').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 1 * parseInt(input);
        //   $('#totalDeno1').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno5').keyup(function (e) { 
        //   let input = $('#deno5').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 5 * parseInt(input);
        //   $('#totalDeno5').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
        // $('#deno10').keyup(function (e) { 
        //   let input = $('#deno10').val();
        //   if(input == 0){
        //     input = 0
        //   }
        //   let calc = 10 * parseInt(input);
        //   $('#totalDeno10').val(calc.toFixed(2));
        //   $('#totalCashInput').text(calcTotal());
        //   $('#variance').text(calcVariance());
        // });
      $('#genReportBtn').click(function (e) { 
        e.preventDefault();
        const totalTransactionCount =document.getElementById('totalTransactionCount')
        if(totalTransactionCount.innerText == '0'){
            Swal.fire(
              'No Transaction',
              '',
              'info'
            )
        }else{
            $('#genReportAuth').modal('show');  
        }
      });
      $('#genReportAuthForm').submit(function (e) { 
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "../includes/generate-report.php",
          data: {
            'genReportAuth': 1,
            'empId':  '<?=$_SESSION['employeeId']?>',
            'password': $('#genReportPass').val()
          },
          dataType: "JSON",
          success: function (response) {
            if(response.status == 'error'){
              Swal.fire({
                icon: response.status,
                text: response.message,
                confirmButtonText: 'Ok'
              })
            }else{
              // openCashDenomination();
              
              $('#genReportModal').modal('show');
              $('#genReportAuth').modal('toggle'); 
              $('#genReportPass').val('');
            }
          }
        });
      });
      $('#generateReport').click(function (e) { 
        e.preventDefault();
        let total = $('#genTotalTransCount').val();
        let cash = $('#genCashColleted').val();
        let fund =  $('#genFundsColleted').val();
        let cashierName = '<?=$_SESSION['fullname']?>'
        let cashierID = '<?=$_SESSION['employeeId']?>'
        $.ajax({
          type: "POST",
          url: "../includes/generate-report.php",
          data: {
            'generateReport': 1,
            'cashierName': cashierName,
            'cashierID': cashierID,
            'total': total,
            'cash': cash,
            'fund': fund,
          },
          dataType: "json",
          success: function (response) {
            console.log(response)
            Swal.fire({
              icon: response.status,
              text: response.message,
              confirmButtonText: 'Ok'
            })
            if(response.status == 'success'){
              $('#genReportModal').modal('toggle');
              // location.reload(); 

            } 
          }
          // To updated account will logout after generating report
        });
      });
      });
      function calcTotal(){
        let totalCash = parseFloat($('#totalDeno1000').val()) + 
        parseFloat($('#totalDeno500').val()) +
        parseFloat($('#totalDeno200').val()) +
        parseFloat($('#totalDeno100').val()) +
        parseFloat($('#totalDeno50').val()) +
        parseFloat($('#totalDeno20').val()) +
        parseFloat($('#totalDenoCent').val()) +
        parseFloat($('#totalDeno1').val()) +
        parseFloat($('#totalDeno5').val()) +
        parseFloat($('#totalDeno10').val())
        return totalCash.toFixed(2)
      }
      function calcVariance(){
        let cash = $('#cash').text();
        let cashInputed = $('#totalCashInput').text();
        let variance = (parseFloat(cashInputed) - parseFloat(cash))  
        return variance.toFixed(2)
      }
    </script>
        
       
         <!-- <script>
      $(document).ready(function () {
        <?php
          $today = date("Y-m-d");
          $id = $_SESSION['employeeId'];
            $sqlCheckCashier = "SELECT * FROM tbl_reports WHERE cashier_id = ? AND date = ?";
            $stmtCheckCashier = $con->prepare($sqlCheckCashier);
            $stmtCheckCashier->bind_param('ss',$id,$today);
            $stmtCheckCashier->execute();
            $resCheckCashier = $stmtCheckCashier->get_result();
            $rowCheckCashier = $resCheckCashier->fetch_assoc();
            $countCheckCashier = $resCheckCashier->num_rows;
            if($countCheckCashier > 0){?>
              $('#bannerForCashier').modal('show'); 
           <?php }?>
      });
      $('#bannerOk').click(function (e) { 
        e.preventDefault();
        $("#viewPendingPayments a").prop("disabled", true);
        $( "#payTransac_btn" ).prop( "disabled", true );
        $( "#genReportBtn" ).prop( "disabled", true );
        $('#bannerForCashier').modal('hide');
      });
    </script> -->
    <script>
      function transactHistoryAuto(){
        $.ajax({
          type: "GET",
          url: "../includes/transactAuto.php",
          data: {
            'view': 1,
            'cashier_ID': '<?= $_SESSION['employeeId']?>'
          },
          dataType: "json",
          success: function (data) {
            console.log(data.countCash)
            $('#cashCount').text(data.countCash);
            $('#cashTotal').text(data.cashTotal);
            $('#onlineCount').text(data.onlineCount);
            $('#onlineTotal').text(data.onlineTotal);
            $('#totalTransactionCount').text(data.totalTransactionCount);
            $('#totalTransactionAmount').text(data.totalTransactionAmount);

            $('#genTotalTransCount').val(data.totalTransactionCount);
            $('#genTotalAmounCollected').val(data.totalTransactionAmount);
            $('#genFundsColleted').val(data.onlineTotal);
            $('#genCashColleted').val(data.cashTotal);
          }
        });
      }
      
        
    </script>
  </body>
</html>