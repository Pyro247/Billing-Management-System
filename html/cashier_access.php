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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

   
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
                let loader = document.getElementById('loader-wrapperID')
                loader.style.opacity = "0"
                loader.style.visibility = "hidden"
                loader.style.pointerEvents = "none"
        }
        </script>
<!-- LOADER -->


  <div class="cashDenominationContainer">
    <form class="cashDenominationForm">
      <div class="cashDenominationTitle">
        <strong>Cash Denomination</strong>
        <i class="fas fa-times-circle" id="closeBtnCD"></i>
      </div>
      <div class="cashDenominationBody">
        <div class="cashInputsContainer">

        <div class="cashInputs">
          <img src="../images/cashDenomination/1000.png" alt="">
          <input type="text" name="" id="deno100" placeholder="₱1000">
        </div>

        <div class="cashInputs">
          <img src="../images/cashDenomination/500.jpg" alt="">
          <input type="text" name="" id="" placeholder="₱500">
        </div>

        <div class="cashInputs">
            <img src="../images/cashDenomination/200.png" alt="">
            <input type="text" name="" id="" placeholder="₱200">
          </div>
        </div>



          <div class="cashInputsContainer">
            
          <div class="cashInputs">
            <img src="../images/cashDenomination/100.jpg" alt="">
            <input type="text" name="" id="" placeholder="₱100">
          </div>

          <div class="cashInputs">
            <img src="../images/cashDenomination/50.jpg" alt="">
            <input type="text" name="" id="" placeholder="₱50">
          </div>

          <div class="cashInputs">
            <img src="../images/cashDenomination/20.jpg" alt="">
            <input type="text" name="" id="" placeholder="₱20">
          </div>
          </div>


          <div class="cashInputsContainer coins pb-3" style="border-bottom: 2px solid #0d6efd">
          <div class="cashInputs">
            <img src="../images/cashDenomination/centavo.jpg" alt="">
            <input type="text" name="" id="" placeholder="Centavo">
          </div>

          <div class="cashInputs">
            <img src="../images/cashDenomination/1php.jpg" alt="">
            <input type="text" name="" id="" placeholder="₱1">
          </div>
          <div class="cashInputs">
            <img src="../images/cashDenomination/5php.png" alt="">
            <input type="text" name="" id="" placeholder="₱5">
          </div>
          <div class="cashInputs">
            <img src="../images/cashDenomination/10php.jpg" alt="">
            <input type="text" name="" id="" placeholder="₱10">
          </div>
          </div>
        
          <div class="cashDenominationFooter my-3">
            <div class="cashDenominationFooterLeft">
              <p>Total Transaction Count: <span>
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
              <p>Total Amount Collected: <span>
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

                        echo "₱". $total;
                            
                    ?>
                    </span></p>
                    <p>Fund Transfer Amount Collected: <span><?php
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

                          echo "₱". $total;
                              
                      ?></span></p>
                      <p>Total Cash: <span><?php

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

                            echo "₱". $total;
                                
                        ?>
                        </span></p>
              
              <p>Variance: <span>N/A</span></p>
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

                          echo "₱". $total;
                              
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

                          echo "₱". $total;
                              
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

                          echo "₱". $total;
                              
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

                          echo "₱". $total;
                              
                      ?></span></p> -->
            </div>
            <button class="btn btn-primary d-block">Generate Report</button>
          </div>
          
      </div>
    </form>
  </div>


        
    <div class="nav__bar">
      <div class="nav__bar_two">
      <img src="../images/logo.png" alt="">
          <div class="nav__bar_two_text">
              <span>Pyro Colleges Inc.</span>
              <p>Excellence at its finest.</p>
          </div>
      </div>
    </div>


    <div class="row">
      <div class="col left-tab">
        <div class="upper-left-tab">
          <img src="..\images\registrar_img\sample_registrar_pic.png" alt="">
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
            <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><img src="../images/icons/dashboard.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Dashboard</a>
            <a class="nav-link main__" id="v-pills-payment-transactions-tab" data-toggle="pill" href="#v-pills-payment-transactions" role="tab" aria-controls="v-pills-payment-transactions" aria-selected="false"><img src="../images/icons/payment_transaction.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Payment Transactions</a>
            <a class="nav-link main__" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false"><img src="../images/icons/history.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;History</a>
            <a class="nav-link main__" id="v-pills-studFee-tab" data-toggle="pill" href="#v-pills-studFee" role="tab" aria-controls="v-pills-studFee" aria-selected="false"><img src="../images/icons/stud_fee.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Student Fees</a>
            
            
      </div>
      </div>
      


    <div class="col-md right-tab">
          
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Dashboard -->
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">
              <p class="title_tab_universal">Approve Payments</p>

              <form action="" class="universalForm_one">
                <input type="text" name="searchDashBar" id="searchDashBar" placeholder="Search">
                <button type="button" class="btn btn-primary" id="searchDashBar-btn">Search</button>
              </form>
              

            <!-- Table -->
            <div class="col universal_bg_gray_table p-3">
            <span class="text-primary" style="font-size: 1.3rem; font-weight: 500;">Fund Transfers (Online)</span>

            <div class="col-md-6 my-1">
              <div class="form-floating">
                <select class="form-select" id="sortByDashData" aria-label="Floating label select example">
                <option value="transaction_no" selected>None</option>
                  <option value="stud_id" selected>Student ID</option>
                  <option value="transaction_no">Transaction ID</option>
                  <option value="transaction_date">Date of Payment</option>
                  <option value="csi_year_level">Year Level</option>
                  
  
                </select>
                <label for="sortByDashData">Sort By:</label>
              </div>
            </div>



            
            <div class="table__" style="overflow-x: auto;">
              <table class="table">
                  <thead class="text-center">
                    <tr>
                      <th scope="col">Transaction ID</th>
                      <th scope="col">Student ID</th>
                      <th scope="col">Fullname</th>
                      <!-- <th scope="col">Last name</th> -->
                      <th scope="col">Amount</th>
                      <!-- <th scope="col">Remaining Balance</th> -->
                      <th scope="col">Date</th>
                      <th scope="col">Email</th>
                      <th scope="col">Sales Invoice</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody id ="viewPendingPayments"> 
                    <!-- <tr class="text-center">
                      <th scope="row">FT-001</th>
                      <td>2018300366</td>
                      <td>Justine Dave</td>
                      <td>Delos reyes</td>
                      <td>9000</td>
                      <td>2500</td>
                      <td>08/21/2021</td>
                      <td>ex@gmail.com</td>
                      <td><button class="btn btn-primary">View</button></td>
                      <td><button class="btn btn-success my-1 paymentTransaction_actionBtn">Approve</button><button class="btn btn-danger paymentTransaction_actionBtn">Deny</button></td>
                      
                      
                    </tr>

                    <tr class="text-center">
                      <th scope="row">FT-002</th>
                      <td>2018300726</td>
                      <td>John</td>
                      <td>Doe</td>
                      <td>7500</td>
                      <td>9000</td>
                      <td>08/26/2021</td>
                      <td>jd@gmail.com</td>
                      <td><button class="btn btn-primary">View</button></td>
                      <td><button class="btn btn-success my-1 paymentTransaction_actionBtn">Approve</button><button class="btn btn-danger paymentTransaction_actionBtn">Deny</button></td>
                    </tr> -->
                  </tbody>
                </table>
          </div>
        
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
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Reason to Deny Payment Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="input-group input-group-sm mb-3">
                
                <input type="hidden" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="transactionNo">
              </div>
              <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="reasonToDeny" style="height: 100px"></textarea>
                <label for="reasonToDeny">Comments</label>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="sendDeny">Send Deny</button>
              </div>
            </div>
          </div>
        </div>       


            <!-- PAYMENT TRANSACTIONS -->
            <div class="tab-pane fade" id="v-pills-payment-transactions" role="tabpanel" aria-labelledby="v-pills-payment-transactions">
              <p class="title_tab_universal">Student's Fees</p>

              <form action="" class="universalForm_one">
                <input type="text" id="searchBar_TransacHistory" placeholder="Search">
                <button type="button" class="btn btn-primary" id="payTransac_btn">Search</button>
              </form>

              <div class="col universal_bg_gray_table payments_tab" style="overflow-x: hidden;">

                <div class="payments_tab_left mx-2 my-auto">
                  <img src="../images/registrar_img/sample_student_pic.png" alt="" class="mb-2 d-block mx-auto my-auto" style="width: 180px; height: 180px;">
                  <span class="d-block text-primary text-center" style="font-size: 1.2rem; font-weight: bold;" id="studName">Fullname</span>
                  <span class="d-block text-primary text-center" style="font-size: 1.3rem;" id="studID">Student ID</span>
                </div>
                <div class="payments_tab_right">
                  <form action="">
                    <div class="col">
                      <label class="sr-only" for="StudProgram">Program</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text beforeInput">Program</div>
                            </div>
                          <input type="text" class="form-control w-auto" id="StudProgram" placeholder="Program" disabled>
                        </div>
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput" >Tuition Fee</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" id="studTuition" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Balance</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" id="studBalance" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Amount</span>
                        <span class="input-group-text">₱</span>
                        <input type="number" min="0"class="form-control w-auto" id="studAmountToPay" placeholder="0.00" >
                        <span class="input-group-text text-success" style="font-weight: bold;"><i class="fas fa-coins"></i>&nbsp; Cash</span>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Change</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" id="changeCalculated" placeholder="0.00">
                        
                      </div>  
                    </div>

                  <div class="col-12 mt-3 mb-2">
                    <button type="button" class="btn btn-success payVoid"  id="payBtn" disabled>Pay</button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Pay Modal -->
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
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" id="previewStudTuition" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Balance</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" id="previewStudBalance" placeholder="0.00" disabled>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Amount</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" id="previewStudAmountToPay" placeholder="0.00" disabled>
                        <span class="input-group-text text-success" style="font-weight: bold;"><i class="fas fa-coins"></i>&nbsp; Cash</span>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Change</span>
                        <span class="input-group-text">₱</span>
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
            <div class="col universal_bg_gray_table p-3">
            <span class="text-primary" style="font-size: 1.3rem; font-weight: 500;" id="studentTagName">Student Last Transaction</span>
              <hr style="margin-top: 5px; height: 2px;" class="text-primary">

              <!-- <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                  <option value="BSIT_WMA" selected>All</option>
                    <option value="Graduated" selected>BSIT</option>
                    <option value="Dropout">BSIT</option>
                    <option value="Transfer">BSIT</option>
                    <option value="Resign">BSIT</option>
                    <option value="Resign">BSIT</option>
    
                  </select>
                  <label for="floatingSelect">Program</label>
                </div>

              </div> -->

              <div class="row">
              <div class="table__" style="overflow-x: auto;">
                <table class="table">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Total Amount Due</th>
                        <th scope="col">Total Amount Paid</th>
                        <th scope="col">Balance Remaining</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Date</th>
                        
                      </tr>
                    </thead>
                    <tbody id="viewLastTransaction">

                </tbody> 
                  </table>


            </div>
          </div>
          </div>
          
        </div>
            



            <!-- HISTORY -->
            <div class="tab-pane fade history-tab" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
              <p class="title_tab_universal">Transaction History</p>

              

              <div class="cashierHistoryInfoContainer">
                <div class="historyInfoBox">
                  <i class="fas fa-coins"></i>
                  
                    <div class="historyInfoLbl">
                      <div class="historyInfoLblUp text-center">
                        <h6><strong style="font-size: 1.1rem;  display:block;">
                      <?php
                        $cashier_ID = $_SESSION['employeeId'];
                        $sql = "SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
                        FROM `tbl_payments`
                        WHERE `transaction_date` = CURRENT_DATE() 
                        AND cashier_id = ?
                        AND payment_method = 'Cash'";
                        $cash = $con->prepare($sql);
                        $cash->bind_param('s',$cashier_ID);
                        $cash->execute();
                        $resultCash = $cash->get_result();
                        $rowCash = $resultCash->fetch_row();
                        $count = mysqli_num_rows($resultCash);
                        echo $count;
                      ?>
                      </strong> Transactions</h6>

                      </div>
                      <div class="historyInfoLblDown">
                      <h5>₱<strong>
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

                                echo $total;
                                    
                            ?>
                      </strong></h5>
                      
                      </div>
                      
                    </div>
                </div>

                <div class="historyInfoBox">
                  <i class="fas fa-credit-card"></i>
                  
                    <div class="historyInfoLbl">
                      <div class="historyInfoLblUp text-center">
                        <h6><strong style="font-size: 1.1rem; display:block;">
                        <?php
                        $cashier_ID = $_SESSION['employeeId'];
                        $sqlOnline = "SELECT `transaction_no`, `stud_id`, `fullname`, `amount`, `payment_method`, `transaction_date`, `payment_status` 
                        FROM `tbl_payments`
                        WHERE `transaction_date` = CURRENT_DATE() 
                        AND cashier_id = ?
                        AND payment_method = 'Online'";
                        $online = $con->prepare($sqlOnline);
                        $online->bind_param('s',$cashier_ID);
                        $online->execute();
                        $resultOnline = $online->get_result();
                        $rowOnline = $resultOnline->fetch_row();
                        $count = mysqli_num_rows($resultOnline);
                        echo $count;
                      ?>
                      </strong>Transactions</h6>

                      </div>
                      <div class="historyInfoLblDown">
                      <h5>₱<strong>
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

                              echo $total;
                                  
                          ?>
                      </strong></h5>
                      </div>
                      
                    </div>
                </div>


                <div class="historyInfoBox">
                  <i class="fas fa-wallet"></i>
                  
                    <div class="historyInfoLbl">
                      <div class="historyInfoLblUp text-center">
                        <h6><strong style="font-size: 1.1rem; display:block;">
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
                      </strong>Total Transactions</h6>

                      </div>
                      <div class="historyInfoLblDown">
                      <h5>₱<strong><?php

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

                          echo $total;
                              
                      ?>
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



              <div class="col universal_bg_gray_table p-3">
                <p class="text-primary text-center" style="font-size: 1.3rem; font-weight: 500;">Filter:</p>

                <form action="" class="my-1">

                <div class="row">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="filterByPayMethod" aria-label="Floating label select example">
                        <option value="%" selected>All</option>
                          <option value="Cash">Cash</option>
                          <option value="Online">Fund Transfer</option>
                        </select>
                        <label for="filterByPayMethod">Payment Method</label>
                      </div>
                  </div>


                  <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="filterByDate" id="filterByDate" placeholder=" ">
                        <label for="floatingInput">Select Date:</label>
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
              
                <div class="table__ mt-4" style="overflow-x: auto;">
                  <table class="table">
                      <thead class="text-center">
                        <tr>
                          <th scope="col">Transaction ID</th>
                          <th scope="col">Student ID</th>
                          <th scope="col">Full name</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Payment Method</th>
                          <th scope="col">Payment Status</th>
                          <th scope="col">Date</th>
                      
                          
                        </tr>
                      </thead>
                      <tbody id="viewTransactionHistory">
                      
                      <!-- <tr class="text-center">
                          <th scope="row">FT-001</th>
                          <td>2018300366</td>
                          <td>Justine Dave</td>
                          <td>9000</td>
                          <td>Cash</td>
                          <td>Approved</td>
                          <td>08/21/2021</td>

                        </tr>--->
                      </tbody>
                    </table>
                </div>
               

              </div>
              <button class="btn btn-outline-primary my-2" id="genReportBtn">Create Report</button>
              <script type="text/javascript">
                  const cashDenominationContainer = document.querySelector('.cashDenominationContainer')
                  const cashDenominationForm = document.querySelector('.cashDenominationForm')
                document.querySelector("#genReportBtn").addEventListener('click', function(){
                 
                  cashDenominationContainer.style.visibility = "visible"
                  cashDenominationContainer.style.opacity = "1"
                  cashDenominationForm.classList.toggle('animate__animated')
                  cashDenominationForm.classList.toggle('animate__bounceIn')
              })

              document.querySelector('#closeBtnCD').addEventListener('click', function(){
                cashDenominationContainer.style.visibility = "hidden"
                  cashDenominationContainer.style.opacity = "0"
                  cashDenominationForm.classList.toggle('animate__animated')
                  cashDenominationForm.classList.toggle('animate__bounceIn')
              })
              </script>

             
             
            </div>


            <!-- Student Fees -->
            <div class="tab-pane fade studFee-tab" id="v-pills-studFee" role="tabpanel" aria-labelledby="v-pills-studFee-tab">
              <p class="title_tab_universal">Student Fees</p>

              <form action="" class="universalForm_one">
                <input type="text"  id="studentFeeSearch" placeholder="Search">
                <button type="button" class="btn btn-primary" id="studentFeeSearch-btn">Search</button>
              </form>

              <div class="col universal_bg_gray_table p-3">
                <div class="col-md-6 my-1">
                  <div class="form-floating">
                    <select class="form-select" id="filterByRemarks" aria-label="Floating label select example">
                            <option value="All" selected>All</option>
                            <option value="Fully Paid" >Fully Paid</option>
                            <option value="Not Fully Paid" >Not Fully Paid</option>
                    </select>
                    <label for="filterByRemarks">Filter by Remarks:</label>
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
                      <tbody id="viewStudentFeesList">
                            
                            
                      </tbody>
                    
                    </table>
                </div>
                
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
              success: function (response) {
                console.log(response)
                Swal.fire(
                'Approve!',
                'Payment Proccessed Complete',
                'Success'
                )
                viewPending(allData,generalSort);
              }
            });
          }
        })
      });
      // Deny Button in table Trigger Modal to pop
      $(document).on('click', '#deny', function(){
        let transactionNo = $(this).attr("data-id");
        let name = $(this).attr("data-name");
        $('#transactionNo').val(transactionNo);

      });
      // Send Deny madal button
      $('#sendDeny').click(function (e) { 
        e.preventDefault();
        let transactionNo = $('#transactionNo').val();
        let reasonToDeny = $('#reasonToDeny').val();
        $.ajax({
          type: "POST",
          url: "../includes/managPayments.php",
          data: {
            "deny": 1,
            "transactionNo": transactionNo,
            "reasonToDeny": reasonToDeny
          },
          success: function (response) {
            console.log(response)
            Swal.fire(
                'Denied!',
                'Payment Denied Complete',
                'info'
                )
            viewPending(allData,generalSort);
          }
        });
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
          e.preventDefault();
          let lettersRegex=/^[a-zA-Z]+$/;
          if($('#studAmountToPay').val() == ''){
            
            Swal.fire(
              'Insufficient Amount',
              'Empty amount',
              'warning'
            )
            }else if(parseInt($('#studAmountToPay').val()) < 0){
            Swal.fire(
              'Insufficient Amount',
              'Negative amount is invalid',
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
        $('#studAmountToPay').keyup(function (e) { 
          e.preventDefault();
          let balance = $('#studBalance').val();
          let amountToPay = $('#studAmountToPay').val();
          if(parseInt(amountToPay) > parseInt(balance)){
            $('#changeCalculated').val(parseInt(amountToPay) - parseInt(balance));
          }else if(parseInt(amountToPay) <= parseInt(balance)){
            $('#changeCalculated').val('');
          }
          
        });
        // Transact Payment Button
        $('#transactPayment').click(function (e) { 
          e.preventDefault();
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
                  $('#studentTagName').text('Student last transaction');
                  $('#studTuition').val('');
                  $('#studAmountToPay').val('');
                  $('#studBalance').val('');
                  $("#payBtn").prop("disabled", true);
                  viewLastTransaction('')
                }
              }
            });
          
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
          $('#studentTagName').text('Student last transaction');
          $('#studTuition').val('');
          $('#studBalance').val('');
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
                $('#StudProgram').val(data.program);
                $('#studName').text(data.fullname);
                $('#studID').text(data.stud_id);
                $('#studentTagName').text(data.fullname + ' last transaction');
                $('#studTuition').val(data.tuition);
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
        // Open History Tab
        $('#v-pills-history-tab').click(function (e) { 
          viewTransactionHistory() //Initial Table data base on current date and cashier log in
        });
        // Apply Filter Button
        $('#filterApply').click(function (e) { 
          e.preventDefault();
          let selected = $('#filterByPayMethod').val();
          let date = $('#filterByDate').val();
          viewTransactionHistoryFilteredBy(selected,date)
        });
        // Clear Filter Button
        $('#filterClear').click(function (e) { 
          e.preventDefault();
          $("#filterByPayMethod").val("%").change();
          $("#filterByDate").val("").change();
          viewTransactionHistory() 
        });
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
        // Search Button
        $('#studentFeeSearch-btn').click(function (e) { 
          let searchTxt = $('#studentFeeSearch').val(); 
          viewStudentFees(searchTxt)
          $('#filterByRemarks').val('All');
        });
      });
      $('#filterByRemarks').change(function (e) { 
        e.preventDefault();
        let filterBy = $('#filterByRemarks').val();
        viewStudentFeesfilterBy(filterBy)
      });
      // Ajax Request viewList of Student Fees
      function viewStudentFees(search){
        $.ajax({
          type: "GET",
          url: "../includes/student-fees-cashier.php",
          data: {
            'viewStudentList': 1,
            'search': search
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
    <!-- Cash Denomination -->
    <script>
      $(document).ready(function () {
        $('#deno100').keypress(function (e) { 
          alert('SAMPLE')
        });
      });
    </script>
</body>
</html>