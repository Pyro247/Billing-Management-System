<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "web-based-billing-management-system-v2";
  
  date_default_timezone_set('Asia/Manila');
      try{
        $con = mysqli_connect( $host, $username, $password, $dbname );
      }catch ( \Exception $e ) {
        die( $e->getMessage() );
      }
      return $con;
?>