<?php
/**
* Class connection to mysql database
*/
class Database {

  /**
  * Connect to mysql database when call
  */
  function constructor(){
  }

  function connect(){

    $servername = "e7qyahb3d90mletd.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    $username   = "bc9hly9mtlwbckp2";
    $password   = "ajwckftizlui1e4z";
    $database   = "e521qxsgy63xrlvo";

    try {

      $this->conn = new PDO("mysql:host=$servername;dbname=$database", "$username", "$password");
      // Local database
      // $this->conn = new PDO('mysql:host=127.0.0.1;dbname=sykes_interview', 'root', 'root');
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $this->conn;

    } catch (Exception $e) {
      echo "No connection. Try again! " . $e;
    }
  }

  function close(){
    $this->conn->close();
  }

}

?>
