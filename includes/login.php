<?php
  include_once '../connection/Config.php';

  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_login = "SELECT * FROM `tbl_accounts` WHERE email = ? AND password = ?";
    $stmt_login = $con->prepare($sql_login);
    $stmt_login->bind_param('ss', $email, $password);
    $stmt_login->execute();
    $result_login = $stmt_login->get_result();
    $row_login = $result_login->fetch_assoc();
    $count_login = $result_login->num_rows;

    if($count_login == 1){
      // Temporary notify it will modify when registrar,cashier, student page is finish
      echo "
            <script>
            Swal.fire({
              title: 'Login Successfully',
              text: 'This ID is already registered',
              icon: 'info',
              confirmButtonText: 'OK'
            });
            </script>
          ";
    }else{
      echo "
            <script>
            Swal.fire({
              title: 'Login failed',
              text: 'This ID is already registered',
              icon: 'info',
              confirmButtonText: 'OK'
            });
            </script>
          ";
    }
  

  }

?>
