<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



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




    <title>Cahsier</title>
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
          <p class="reg__name" style="font-size: 1.2rem;">Juan A. Dela Cruz <i class="fas fa-caret-down" onclick="profile_link_show()   "></i></p>
            <div class="profile_link" id="profile_link_id">
              <a href="">My Email</a>
              <a href="../html/forgotPassword.php">Change Password</a>
              <a href="">Logout</a>
            </div>
          <p class="reg__name" id="roleId">Cashier | C-2021003</p>
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
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>

              <div class="col universal_bg_gray_table payments_tab" style="overflow-x: hidden;">

                <div class="payments_tab_left mx-2 my-auto">
                  <img src="../images/registrar_img/sample_student_pic.png" alt="" class="mb-2 d-block mx-auto my-auto" style="width: 180px; height: 180px;">
                  <span class="d-block text-primary text-center" style="font-size: 1.2rem; font-weight: bold;">Justine Dave Delos reyes</span>
                  <span class="d-block text-primary text-center" style="font-size: 1.3rem;">2018300366</span>
                </div>
                <div class="payments_tab_right">
                  <form action="">
                    <div class="col">
                      <label class="sr-only" for="inlineFormInputGroup">Program</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text beforeInput">Program</div>
                            </div>
                          <input type="text" class="form-control w-auto" id="inlineFormInputGroup" placeholder="Program">
                        </div>
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Tuition Fee</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" placeholder="0.00">
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Balance</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" placeholder="0.00">
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Amount</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" placeholder="0.00">
                        <span class="input-group-text text-success" style="font-weight: bold;"><i class="fas fa-coins"></i>&nbsp; Cash</span>
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Change</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" placeholder="0.00">
                        
                      </div>  
                    </div>

                  <div class="col-12 mt-3 mb-2">
                    <button type="button" class="btn btn-success payVoid" id="payBtn">Pay</button>
                  </div>
                </form>
              </div>
            </div>


            <!-- Table -->
            <div class="col universal_bg_gray_table p-3">
              <span class="text-primary" style="font-size: 1.3rem; font-weight: 500;">Justine Dave's All Transaction</span>
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
                  </table>


            </div>
          </div>
          </div>
          
        </div>
            



            <!-- HISTORY -->
            <div class="tab-pane fade history-tab" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
              <p class="title_tab_universal">Transaction History</p>

              <form action="" class="universalForm_one">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>


                
              <div class="col universal_bg_gray_table p-3">
                <p class="text-primary text-center" style="font-size: 1.3rem; font-weight: 500;">Filter:</p>

                <form action="" class="my-1">

                <div class="row">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelectMethod" aria-label="Floating label select example">
                        <option value="" selected>All</option>
                          <option value="">Cash</option>
                          <option value="">Fund Transfer</option>
                        </select>
                        <label for="floatingSelectMethod">Payment Method</label>
                      </div>
                  </div>

                  <div class="col-md">
                    <div class="form-floating">
                      <select class="form-select " id="floatingSelectStatus" aria-label="Floating label select example">
                        <option value="" selected>All</option>
                          <option value="">Approved</option>
                          <option value="">Denied</option>
                          <option value="">Pending</option>
                        </select>
                        <label for="floatingSelectStatus">Payment Status</label>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="lastname" id="lname" placeholder=" ">
                        <label for="floatingInput">Select Date:</label>
                    </div>
                </div>




                </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="col-md mt-1">
                    <button class="btn btn-primary ">Apply</button>
                    <button class="btn btn-primary ">Clear</button>
                  </div>
                </div>
              </div>
              </form>
              </div>

              <div class="col universal_bg_gray_table p-3">
                <div class="table__" style="overflow-x: auto;">
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
                      <tbody>
                        <tr class="text-center">
                          <th scope="row">FT-001</th>
                          <td>2018300366</td>
                          <td>Justine Dave</td>
                          <td>9000</td>
                          <td>Cash</td>
                          <td>Approved</td>
                          <td>08/21/2021</td>

                        </tr>
                      </tbody>
                    </table>
              </div>

              </div>

            </div>


            <!-- Student Fees -->
            <div class="tab-pane fade studFee-tab" id="v-pills-studFee" role="tabpanel" aria-labelledby="v-pills-studFee-tab">
              <p class="title_tab_universal">Student Fee</p>
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
      
      let allData = '%'
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


</script>
</body>
</html>