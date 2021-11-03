<?php

        session_start();
        if(!isset($_SESSION['stud_id']) && $_SESSION['role'] != 'Student'){
            header('Location: login.php');
        }else{
            include_once '../connection/Config.php';
            $sqlStud ="SELECT det.*,fees.*
                        FROM tbl_student_school_details AS det 
                        INNER JOIN tbl_student_fees AS fees ON det.stud_id = fees.stud_id
                        WHERE det.stud_id = ?";
            $stmtStud = $con->prepare($sqlStud);
            $stmtStud->bind_param('s', $_SESSION['stud_id']);
            $stmtStud->execute();
            $resStud = $stmtStud->get_result(); 
            $rowStud = $resStud->fetch_assoc();

            $sqlLatestPaidDate ="SELECT  amount, transaction_date
                                FROM tbl_payments WHERE stud_id = ? 
                                ORDER BY transaction_date DESC LIMIT 1";
            $stmtLatestPaidDate = $con->prepare($sqlLatestPaidDate);
            $stmtLatestPaidDate->bind_param('s', $_SESSION['stud_id']);
            $stmtLatestPaidDate->execute();
            $resLatestPaidDate = $stmtLatestPaidDate->get_result(); 
            $rowLatestPaidDate = $resLatestPaidDate->fetch_assoc();
            if($resLatestPaidDate->num_rows > 0){
                $amount = $rowLatestPaidDate['amount'];
                $date = $rowLatestPaidDate['transaction_date'];
            }else{
                $amount = 'N/A';
                $date = 'N/A';
            }

        }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

          
        <!-- Bootstrap -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- Data Tables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.css"/>
    
        <!-- Fontawsome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- BoxIcons -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

        <!-- CSS Local -->
        <!-- <link rel="stylesheet" href="../css/student_access.css"> -->
        <link rel="stylesheet" type="text/css" href="../css/student_access.css?<?php echo time(); ?>" />

         <!-- Sweet Alert 2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <title>Student</title>
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

    


    <div class="row">
        <div class="col left-tab">
        <img src="../images/logo.png" class="logoLeftTab" alt="">
            <div class="upper-left-tab">
              
                <img src="..\images\registrar_img\sample_registrar_pic.png" alt="">
                <p class="reg__name" style="font-size: 1.2rem;"><?= $_SESSION['fullname'];?> <i class="fas fa-caret-down" onclick="profile_link_show()"></i></p>
                        <div class="profile_link" id="profile_link_id">
                            <a href="">My Email</a>
                            <a href="../html/forgotPassword.php">Change Password</a>
                            <a href="../includes/logout.inc.php">Logout</a>
                        </div>
            <p class="reg__name"> <?=$rowStud['csi_program'];?> | <?=$rowStud['csi_major'];?></p>
            
        </div>

        <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class='bx bxs-dashboard'></i>&nbsp;Dashboard</a>
            <a class="nav-link main__" id="v-pills-payment-application-tab" data-toggle="pill" href="#v-pills-payment-application" role="tab" aria-controls="v-pills-payment-application" aria-selected="false"><i class="fas fa-credit-card"></i>&nbsp;Payment Form</a>
            <a class="nav-link main__" id="v-pills-transaction-history-tab" data-toggle="pill" href="#v-pills-transaction-history" role="tab" aria-controls="v-pills-transaction-history" aria-selected="false"><i class='bx bx-history'></i>&nbsp; History</a>
        </div>
      
        </div>
        


    <div class="col-md right-tab">
            <!-- Dashboard -->
            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">
            
                <p class="title_tab_universal my-3">Dashboard</p>

                    <div class="dashBoardBoxContainer mb-4">
                    
                    <div class="dashBoardBox lastPaid">
                            <i class="far fa-clock"></i>
                            <span><?= $date?></span>
                            <h1>₱<?= $amount?></h1>
                            <h3>Last Amount Paid</h3>
                        </div>

                        <div class="dashBoardBox remainingBal">
                            <i class="fas fa-wallet"></i>
                            <h1>₱<?=$rowStud['balance'];?></h1>
                            <h3>Remaining Balance</h3>
                        </div>

                        <div class="dashBoardBox tuition">
                            <i class="fas fa-tags"></i>
                            <h1>₱<?=$rowStud['tuition_fee'];?></h1>
                            <h3>Tuition Fee</h3>
                        </div>
                        
                        <div class="dashBoardBox scholarship">
                            <i class="fas fa-graduation-cap"></i>
                            <span></span>
                            <h1><?=$rowStud['scholar_desc'];?></h1>
                            <h3>Scholarship</h3>
                        </div>
                    </div>



                        <div class="pendingTransactionTbl p-3">
                        
                        <h4 id="pendingnDenied">Pending & Denied Transactions</h4>
                        <h4 id="noTransaction" style="color: var(--greenPrimary)">You have 0 Pending or Denied Transactions!</h4>

                        

                        <table id="pendingTbl" class="table" style="color: var(--white);">
                        <thead class="text-center">
                            <tr>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Reason for Denying</th>
                                    <th scope="col">Person in Charge</th>
                                    <th scope="col">Remarks</th>
                            </tr>
                            
                        </thead>
                                <tbody class="text-center">
                                <?php
                                $sql = "SELECT transaction_no, amount, transaction_date, status, reasonToDeny,cashier_name
                                        FROM tbl_pending_payments WHERE stud_id = ?";
                                $stmt = $con->prepare($sql);
                                $stmt->bind_param('s', $_SESSION['stud_id']);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $count = $res->num_rows;

                                    ?>
                                <?php 
                                if($count > 0){
                                while($data = $res->fetch_assoc()){?>
                                <tr class="text-center">
                                    <td><?=$data['transaction_no'];?></td>
                                    <td><?=$data['amount'];?></td>
                                    <td><?=$data['transaction_date'];?></td>
                                    <?php if($data['status'] == 'Pending'){?>
                                        <td class="text-success text-uppercase fw-bold"><?=$data['status'];?></td>
                                    <?php }else{ ?>
                                        <td class="text-danger text-uppercase fw-bold"><?=$data['status'];?>
                                        </td>
                                    <?php }?>
                                    <td><?=$data['reasonToDeny'];?></td>
                                    <td><?=$data['cashier_name'];?></td>
                                    <?php if($data['status'] == 'Denied'){?>
                                        <td>
                                    <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" 
                                            id="ViewReason" data-bs-toggle="modal" data-bs-target="#reasonModal"
                                            data-id="<?=$data['transaction_no'];?>">
                                            Resubmit
                                            </button>
                                        </td>
                                        
                                    <?php }?>
                                </tr>
                                <?php }?>
                                <?php }else{?>
                                    

                                
                                <?php } 
                                
                                ?> 

                                </tbody> 
                            </table>
                            </div> 
                </div>
            
                <!-- Modal -->
                <div class="modal fade" id="reasonModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen ">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="text-primary m-0">Resubmit Payment Application Form</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="payApp_createPayment mt-2">
                        <h5 class="text-dark fs-1" id="TransactionNo"></h5>
                        <h5 class="text-danger" id="reasonMsg" ></h5>
                        <form  class=" mb-3 p-2" id="payReqFormRe" enctype="multipart/form-data">
                        <div class="payAppFormWrapper">
                            <div class="leftForm text-dark">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="min-width: 110px;" id="basic-addon1" >Student ID</span>
                                    </div>
                                        <input type="text" class="form-control" placeholder="Student ID" readonly name="stud_id" value="<?=$rowStud['stud_id'];?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Full name</span>
                                    </div>
                                        <input type="text" class="form-control" placeholder="Firstname" readonly  name="fullname"
                                        value="<?=$rowStud['fullname'];?>">
                                </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Email</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email" readonly  name="email"
                                        value="<?=$_SESSION['email'];?>">
                                    </div>

                                    <span>Amount:</span>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text d-inline-block">₱</span>
                                        </div>
                                        <input type="number" class="form-control" name="amount" id="requestAmountRe" idplaceholder="0.00">
                                        <span class="input-group-text text-success"><i class="fas fa-credit-card"></i>&nbsp;<strong>Online</strong></span>
                                        
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Date</span>
                                        </div>
                                        <input type="date" class="form-control" name= "date" id="requestDateRe" placeholder="" >
                                    </div>
                                    
                                <div class="col-md">
                                    <div class="form-floating">
                                    <input type="text" class="form-control" id="paymentGateway_IdRe" name="paymentGateway"  placeholder="" style="border:2px solid #56A8CBFF"> 
                                    <label for="floatingInputGrid">Payment Gateway: (e.g. Gcash, Paymaya) <span style="font-weight: bold; color: crimson;">*</span></label>
                                    </div>
                                </div>

                                </div>
                                    <div class="rightForm" id="dispalyReInvoice">
                                        <div class="rightFormInner">
                                        <div class="rightForm_text text-secondary" id="imageTextRe">
                                            <i class="fas fa-file-invoice text-primary" style="font-size: 4rem;"></i>
                                            
                                            <p>Attach Sales Invoice from your chosen local payment gateway.</p>
                                            
                                        </div>
                                        <img style="width:100%;height:100%;border-radius: 20px;display:none" id="previewReInvoice">
                                    </div>
                                    <input id="imageRe" type="file" accept="image/*" name="imageRe" onchange="previewImageRe();"/>
                                    </div>
                                </div>
                            </form> 
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="reSubmitRequest">Resubmit</button>
                    </div>
                    </div>
                </div>
                </div>
            <!-- PAYMENT application -->
            <div class="tab-pane fade" id="v-pills-payment-application" role="tabpanel" aria-labelledby="v-pills-payment-application">
                <p class="title_tab_universal my-3">Payment Application</p>

                    <span class="d-block" style="font-size: 1.4rem">Paying Bills? - It's easy and simple! - <strong>Click the Platforms to see the instructions.</strong></span>
                    <div class="miniDashboard mb-4">
                        <span class="d-block text-center" style="font-size: 1.5rem; font-weight: 500; color: var(--secondary)">You can use:</span>
                        
                        <div class="miniDashboardInner">
                            <div class="paymentPlatform" onclick="paymentGcash()">
                            <img src="../images/student_pics/gcash.png" alt="">
                            <span>Gcash</span>
                            
                            </div>

                            <div class="paymentPlatform" onclick="paymentPayMaya()">
                            <img src="../images/student_pics/paymaya.png" alt="">
                            <span>PayMaya</span>
                            </div>

                            <div class="paymentPlatform" onclick="paymentRemittance()">
                            <img src="../images/student_pics/remittance.png" alt="">
                            <span>Remittance</span>
                            </div>

                            <div class="paymentPlatform" onclick="paymentBankTransfer()">
                            <img src="../images/student_pics/bankTransfer.png" alt="">
                            <span>Bank Transfer</span>
                            </div>

                            <!-- Sweet Alert For clicking the Payment Gateway -->
                            <script type="text/javascript">
                            let oList = document.getElementById('olID');
                            let popUpImageID = document.getElementById('popUpImageID')
                            let parent_container = document.getElementById('parent_ID')
                                function paymentGcash(){
                                    Swal.fire({
                                    title: '<span style="color: #2832c2">GCASH Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Open your Gcash App <br><br>' +
                                        '2. Send payment to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a Screenshot of the Gcash transaction <br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit<br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/gcash.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }

                                function paymentPayMaya(){
                                    Swal.fire({
                                    title: '<span style="color: #151e3d">PAYMAYA Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Open your PayMaya App <br><br>' +
                                        '2. Send payment to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a Screenshot of the PayMaya transaction <br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit <br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/paymaya.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }

                                function paymentRemittance(){
                                    Swal.fire({
                                    title: '<span style="color: #28a745">MONEY REMITTANCE Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Go to your nearest Money Remittance Center (Palawan Express, Cebuana Lhuillier, M Lhuillier or Western Union) <br><br>' +
                                        '2. Send payment to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a snapshot of the remittance receipt<br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit <br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/remittance.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }


                                function paymentBankTransfer(){
                                    Swal.fire({
                                    title: '<span style="color: #56A8CBFF">BANK TRANSFER Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Choose your preferred Banking Platform<br><br>' +
                                        '2. Transfer Funds to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a Screenshot of the Bank Transaction<br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit <br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/bankTransfer.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }
                            </script>
                        </div>
                    </div> 
                    

                    <div class="payApp_createPayment mt-2">
                        <form  class="paymentForm mb-3 p-2" id="payReqForm" enctype="multipart/form-data">
                        <p class="" style="font-size: 1.5rem">Create Payment Application Form</p>
                        <div class="payAppFormWrapper">
                            <div class="leftForm">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="min-width: 110px;" id="basic-addon1" >Student ID</span>
                                    </div>
                                        <input type="text" class="form-control" placeholder="Student ID" readonly name="stud_id" value="<?=$rowStud['stud_id'];?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Full name</span>
                                    </div>
                                        <input type="text" class="form-control" placeholder="Firstname" readonly  name="fullname"
                                        value="<?=$rowStud['fullname'];?>">
                                </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Email</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email" readonly  name="email"
                                        value="<?=$_SESSION['email'];?>">
                                    </div>

                                    <span>Amount:</span>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text d-inline-block">₱</span>
                                        </div>
                                        <input type="number" class="form-control" name="amount" id="requestAmount" placeholder="0.00">
                                        <span class="input-group-text text-success"><i class="fas fa-credit-card"></i>&nbsp;<strong>Online</strong></span>
                                        
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Date</span>
                                        </div>
                                        <input type="date" class="form-control" name= "date" id="requestDate" placeholder="">
                                    </div>
                                    
                                <div class="col-md">
                                    <div class="form-floating">
                                    <input type="text" class="form-control" id="paymentGateway_Id" name="paymentGateway"  placeholder=""> 
                                    <label for="floatingInputGrid" style="color: black">Payment Gateway: (e.g. Gcash, Paymaya) <span style="font-weight: bold; color: crimson;">*</span></label>
                                    </div>
                                </div>

                                </div>
                                    <div class="rightForm" id="dispalyInvoice">
                                        <div class="rightFormInner">
                                        <div class="rightForm_text text-secondary" id="imageText">
                                            <i class="fas fa-file-invoice text-primary" style="font-size: 4rem;"></i>
                                            
                                            <p>Attach Sales Invoice from your chosen local payment gateway.</p>
                                            
                                        </div>
                                        <img style="width:100%;height:100%;border-radius: 20px;display:none" id="preview">
                                    </div>
                                    <input id="image" type="file" accept="image/*" name="image" onchange="previewImage();"/>
                                    </div>
                                </div>
                                <button type="submit" style="width: 150px; height: 50" class="btn btn-success d-block mx-auto mt-5 mb-3" id="submitPayReq">Submit</button>
                            </form> 
                    </div>
            </div>

            



            <!-- Transaction History -->
            <div class="tab-pane fade" id="v-pills-transaction-history" role="tabpanel" aria-labelledby="v-pills-transaction-history-tab">
                <p class="title_tab_universal my-3">Transaction History</p>
                
                <div class="transactionHistoryDiv mb-5">
                    <div class="row mb-3">
                        <div class="col mb-4">
                            <div class="form-floating">
                                <select class="form-select col-2" id="filterByAcademicYear" name="currSchoolY">
                                <option value="All">All</option>
                                <?php 
                                    $sqlYear = "SELECT DISTINCT academic_year FROM tbl_academic_year";
                                    $stmtYear = $con->prepare($sqlYear);
                                    $stmtYear->execute();
                                    $resYear = $stmtYear->get_result();
                                    while($rowYear = $resYear->fetch_assoc()){
                                    ?>
                                    <option value="<?= $rowYear['academic_year'];?>"><?= $rowYear['academic_year'];?></option>
                                <?php }; ?>
                                </select>
                                    <label for="filterByAcademicYear" style="color: black">Select Academic Year</label>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="form-floating">
                                <select class="form-select col-2" id="filterByAcademicYear" name="currSchoolY">
                                <option value="All">All</option>
                                
                                </select>
                                    <label for="filterByAcademicYear" style="color: black">Select Semester</label>
                            </div>
                        </div>


                    </div>

                
                    <table id="transactionHistory" class="table" style="background: none;">
                        <thead class="text-center" style="color: white; border-bottom: 2px solid white">
                            <tr>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Date</th>
                                <th scope="col">Person in Charge</th>
                                <th scope="col">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody id="viewTableTransactionHistory" style="color: var(--white)">
                        <?php

                                $sql ="SELECT transaction_no, amount, CONCAT(payment_method,'-',payment_gateway) 
                                AS payment, transaction_date, payment_status, cashier_name
                                FROM tbl_payments WHERE stud_id = ?";
                                $stmt = $con->prepare($sql);
                                $stmt->bind_param('s', $_SESSION['stud_id']);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $count = $res->num_rows;
                        ?>
                        <?php 
                                if($count > 0){
                                while($data = $res->fetch_assoc()){?>
                                <tr class="text-center">
                                    <td><?=$data['transaction_no'];?></td>
                                    <td><?=$data['amount'];?></td>
                                    <td><?=$data['payment'];?></td>
                                    <td><?=$data['transaction_date'];?></td>
                                    <td><?=$data['cashier_name'];?></td>
                                    <td class="text-success text-uppercase fw-bold"><?=$data['payment_status'];?></td>
                                    
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
                <button class="btn btn-outline-primary mt-3" onclick="exportTableToExcel('transactionHistory', '-Transaction-History-student'+'<?= $_SESSION['fullname'];?>')">Export to Excel</button>
            </div>

            </div>

            
            </div>
            
        </div>
    </div>
</div>

            

        
                
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.0.1/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <script>
            $(document).ready( function () {
                $('#transactionHistory').DataTable({
                    pagingType: 'full_numbers',
                    lengthMenu: [[5, 10, -1], [5, 10, "All"]]
                });
            } );
        </script>

  
        <!-- Payment Application -->

        <script type="text/javascript">
        let image = document.getElementById('image');
            function profile_link_show(){
                let profile_link = document.getElementById('profile_link_id');
                profile_link.classList.toggle('show');
            }
            function previewImage() {
                let file = document.getElementById("image").files;
                if (file.length > 0) {
                    var fileReader = new FileReader();
        
                    fileReader.onload = function (event) {
                        document.getElementById("preview").setAttribute("src", event.target.result);
                        document.getElementById("preview").style.display = "block";
                        document.getElementById("imageText").style.display = "none";
                    };
        
                    fileReader.readAsDataURL(file[0]);
                }
            }function previewImageRe() {
                let file = document.getElementById("imageRe").files;
                if (file.length > 0) {
                    var fileReader = new FileReader();
        
                    fileReader.onload = function (event) {
                        document.getElementById("previewReInvoice").setAttribute("src", event.target.result);
                        document.getElementById("previewReInvoice").style.display = "block";
                        document.getElementById("imageTextRe").style.display = "none";
                    };
        
                    fileReader.readAsDataURL(file[0]);
                }
            }
            // Submit Payment Request AJAX
            $(document).ready(function (e) {
                let amount = document.getElementById('requestAmount');
                let date = document.getElementById('requestDate');
                let paymentGateway = document.getElementById('paymentGateway_Id');
                let image = document.getElementById("image");
                $('#payReqForm').submit(function (e) { 
                    e.preventDefault();
                    let formData = new FormData(this) 
                    formData.append('submitRequest', 'submitRequest');
                    if(amount.value == ''){
                        amount.focus();
                    }else if(date.value == ''){
                        date.focus();
                    }else if(paymentGateway.value == ''){
                        paymentGateway.focus();
                    }else if(image.files.length == 0){
                        Swal.fire(
                            'No Attachment',
                            'Please attach image for as proof',
                            'warning'
                        )
                    }else{
                        $.ajax({
                        type: "POST",
                        url: "../includes/studPaymentRequest.php",
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
                            $('#requestAmount').val('');
                            $('#requestDate').val('');
                            $('#paymentGateway_Id').val('');
                            document.getElementById("preview").style.display = "none";
                            document.getElementById("imageText").style.display = "block";
                            document.getElementById("image").value = null;
                        }
                    });
                    }
                    
                });
            });
        </script>
        <!-- Resubmit payment application -->
        <script>
            $(document).on("click","#ViewReason",function(e) {
                e.preventDefault();
                let transactionNo = $(this).attr("data-id");
                $('#TransactionNo').text(transactionNo);
                $.ajax({
                    type: "POST",
                    url: "../includes/studPaymentRequest.php",
                    data: {
                        'getDataPaymentRequest': 1,
                        'transactionNo': transactionNo
                    },
                    success: function (data) {
                        $('#reasonMsg').text('Reason of denied payment: ' + data.reason);
                        $("#requestAmountRe").val(data.amount);
                        $("#requestDateRe").val(data.transaction_date);
                        $("#paymentGateway_IdRe").val( data.payment_gateway);
                        // $("#imageRe").val('../saleInvoiceImg/' + data.sales_invoice);//Not Possible 
                        
                    }
                });
            });
            $('#reSubmitRequest').click(function (e) { 
                e.preventDefault();
                let formData = new FormData(document.getElementById('payReqFormRe'))
                formData.append('reSubmitRequest', 'reSubmitRequest');
                formData.append('transactionNo',$('#TransactionNo').text())
                $.ajax({
                    type: "POST",
                    url: "../includes/studPaymentRequest.php",
                    data: formData,
                    contentType: false,
                    processData:false,
                    success: function (response) {
                        console.log(response)
                        Swal.fire({
                                icon: response.status,
                                text: response.message,
                                confirmButtonText: 'Ok'
                        }).then(function() {
                            location.reload();
                        });
                            $('#requestAmountRe').val('');
                            $('#requestDateRe').val('');
                            $('#paymentGateway_IdRe').val('');
                            document.getElementById("previewReInvoice").style.display = "none";
                            document.getElementById("imageTextRe").style.display = "block";
                            document.getElementById("imageRe").value = null;
                            
                    }
                    
                });
                
            });
        </script>
        <!-- Transaction Hsitory -->
        <script>
            $(document).ready(function () {
                $('#filterByAcademicYear').change(function (e) { 
                    let selected = $('#filterByAcademicYear').val();
                    $.ajax({
                        type: "GET",
                        url: "../includes/transact-history-student.php",
                        data: {
                            'studId': '<?php echo $_SESSION['stud_id']?>',
                            'schoolYear': selected
                        },
                        dataType: "html",
                        success: function (data) {
                            $('#viewTableTransactionHistory').html(data);
                        }
                    });
                });
                
            });
        </script>
        <script>
            // Export Excel
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
        

    <script>            
              
                // // pagingType: 'full_numbers',
                // lengthMenu: [[5, -1], [5, "All"]],

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
                checkPending();
                function checkPending(){
                const tblCount = $('#pendingTbl').find('td').length
                if (tblCount <= 0 ){
                    document.querySelector('#noTransaction').style.display = "block";
                    document.querySelector('#pendingnDenied').style.display = "none";
                    document.querySelector('#pendingTbl').style.display="none"
                }else{
                    document.querySelector('#noTransaction').style.display = "none";
                    document.querySelector('#pendingnDenied').style.display = "block";
                }
            }
            </script>

             


    </body>
    </html>