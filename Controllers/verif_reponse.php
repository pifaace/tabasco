<?php

session_start();
try{
  //$db = new PDO("mysql:host=localhost;dbname=tabasco;charset=utf8","root","root");
  $db = new PDO("mysql:host=localhost;dbname=gaubert_tabasco;charset=utf8","gaubert_test","testtestg4");


}catch(PDOException  $e ){
echo "Error: ".$e;
}

$reponseUser = $_POST['valU'];

$req = 'INSERT INTO reponse_user(id_reponse, id_essais, id_question) VALUES('. $reponseUser . ', ' . $_SESSION['idEssais'].', ' . $_POST['idQuestion'] . ')';
$query=$db->prepare($req);
$query->execute();


$req = 'select id from reponse_valide WHERE id_question=' . $_POST['idQuestion'] . ' AND valide=1';
$query=$db->prepare($req);
$query->execute();
$repValide = $query->fetch();
$repV = $repValide['id'];



if($reponseUser == $repV){
  echo "Bonne réponse";
}
else{
  echo "Mauvaise réponse";
}

//header('Location: ../accueil.php?r=' . $r . '&q=' . $_POST['idQuestion'] . '&idRep=' . $reponseUser);
?>
