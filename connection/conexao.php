<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


// Create connection

// $conn = new mysqli($servername, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";


class ConnectionFactory{

  // public function getConnect_seuFielAmigo(){
  //   try{
  //     $pdo = new PDO('mysql:host=localhost;dbname=db_seufielamigo', 'root', '');
  //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   }catch(PDOException $e){
  //     print "Error!:" . $e->getMessage() . "<br/>";
  //     die();
  //   }
  //   return $pdo;
  // }
 

  public function getConnect_seuFielAmigo(){
    try{
      $servername = "us-cdbr-east-06.cleardb.net";
      $database = "heroku_00697f4a8bd282b";
      $username = "bac941f85fad3e";
      $password = "486678ad";

      $pdo = new PDO('mysql:host='.$servername.';dbname='.$database.'', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      print "Error!:" . $e->getMessage() . "<br/>";
      die();
    }
    return $pdo;
  }

}
