<?php

session_start();
try{
$db = new PDO("mysql:host=http://tabasco-team.labo-g4.fr:2083/cpsess8027652924/3rdparty/phpMyAdmin/index.php#PMAURL-1:db_structure.php?db=gaubert_tabasco&table=&server=1&target=&token=52bcd1412e53c98f86920e2e2cfafea2;dbname=tabasco;charset=utf8");
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
