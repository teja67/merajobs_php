<?php
  date_default_timezone_set('Asia/Kolkata');
  
  $host="localhost";
  $dbname="merabjobs";
  $dbuser="root";
  $dbpassword="";

  try {
      // $conn = new PDO("mysql:host=sql203.infinityfree.com;dbname=if0_35454520_XXX", $dbuser, $dbpassword);
      $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser, $dbpassword);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>
