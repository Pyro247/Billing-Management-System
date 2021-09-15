<?php
  
  class Config 
  {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "web-based_billing_management_system";

    public function connection()
    {
      try{
        $con = mysqli_connect( $this->host, $this->username, $this->password, $this->dbname );
      }catch ( \Exception $e ) {
        die( $e->getMessage() );
      }
      return $con;
    }

  }

?>