<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

// $servername = "localhost";
// $database = "db_seufielamigo";
// $username = "root";
// $password = "";
// Create connection

// $conn = new mysqli($servername, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";


class ConnectionFactory{

  public function getConnect_seuFielAmigo(){
    try{
      $pdo = new PDO('mysql:host=localhost;dbname=db_seufielamigo', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      print "Error!:" . $e->getMessage() . "<br/>";
      die();
    }
    return $pdo;
  }

  // public function getConnect_seuFielAmigo(){
  //   try{
  //     $pdo = new PDO('mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_00697f4a8bd282b', 'bac941f85fad3e', '486678ad');
  //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   }catch(PDOException $e){
  //     print "Error!:" . $e->getMessage() . "<br/>";
  //     die();
  //   }
  //   return $pdo;
  // }

}
