<?php
session_start();
try{
  $db = new PDO("mysql:host=localhost;dbname=gaubert_tabasco;charset=utf8","gaubert_test","testtestg4");
}catch(PDOException  $e ){
echo "Error: ".$e;
}

echo "Cette page n'existe pas encore";
?>
