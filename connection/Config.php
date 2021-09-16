<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "web-based_billing_management_system";

      try{
        $con = mysqli_connect( $host, $username, $password, $dbname );
      }catch ( \Exception $e ) {
        die( $e->getMessage() );
      }
      return $con;
?>