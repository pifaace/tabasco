<?php

session_start();
try{
$db = new PDO("mysql:host=https://tabasco-team.labo-g4.fr:2083;dbname=tabasco;charset=utf8","gaubert","841aZYTR2b");
}catch(PDOException  $e ){
echo "Error: ".$e;
}


$req = 'select id from reponse_valide WHERE id_question=' . $_POST['idQuestion'] . ' AND valide=1';
$query=$db->prepare($req);
$query->execute();
$repValide = $query->fetch();
$repV = $repValide['id'];

$reponseUser = $_POST['valU'];

if($reponseUser == $repV){
  echo "Bonne réponse";
}
else{
  echo "Mauvaise réponse";
}

//header('Location: ../accueil.php?r=' . $r . '&q=' . $_POST['idQuestion'] . '&idRep=' . $reponseUser);
?>
