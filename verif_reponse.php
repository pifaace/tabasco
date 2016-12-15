<?php

session_start();

include('../connexionBD.php');

$reponseUser = $_POST['valU'];

$req = 'INSERT INTO reponse_user(id_reponse, id_essais, id_question) VALUES('. $reponseUser . ', ' . $_SESSION['idEssais'].', ' . $_POST['idQuestion'] . ')';
$query=$db->prepare($req);
$query->execute();

?>
