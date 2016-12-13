<?php


session_start();
$_SESSION['formation'] = 1;
try{
  //$db = new PDO("mysql:host=localhost;dbname=tabasco;charset=utf8","root","root");
  $db = new PDO("mysql:host=localhost;dbname=gaubert_tabasco;charset=utf8","gaubert_test","testtestg4");


}catch(PDOException  $e ){
echo "Error: ".$e;
}

  $req = 'INSERT INTO essais_user(id_user, formation) VALUES(' . $_SESSION['id'] . ', ' . $_SESSION['formation'] . ')';
  $query=$db->prepare($req);
  $query->execute();
  $id = $db->lastInsertId();
  $_SESSION['idEssais'] = $id;

header('Location: ../formation1.php');
?>
