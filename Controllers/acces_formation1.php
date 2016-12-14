<?php


session_start();
$_SESSION['formation'] = 1;

include('../connexionBD.php');

  $req = 'INSERT INTO essais_user(id_user, formation) VALUES(' . $_SESSION['id'] . ', ' . $_SESSION['formation'] . ')';
  $query=$db->prepare($req);
  $query->execute();
  $id = $db->lastInsertId();
  $_SESSION['idEssais'] = $id;

header('Location: ../formation1.php');
?>
