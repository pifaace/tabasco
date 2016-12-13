<?php
	session_start();
	$login = $_POST['login'];
	$pwd = $_POST['mdp'];
try{
	$db = new PDO("mysql:host=http://tabasco-team.labo-g4.fr:2083/cpsess8027652924/3rdparty/phpMyAdmin/index.php#PMAURL-1:db_structure.php?db=gaubert_tabasco&table=&server=1&target=&token=52bcd1412e53c98f86920e2e2cfafea2;dbname=tabasco;charset=utf8");
	}catch(PDOException  $e ){
	echo "Error: ".$e;
}

	 	$req = 'select * from user where login =:login and password=:password';
	 	$query=$db->prepare($req);
	 	$query->bindParam(':login', $login);
		$query->bindParam(':password', $pwd);
		$query->execute();
		$result = $query->fetch();
		if($result != null){
	 		$_SESSION['login'] = $result['login'];
	 		$_SESSION['id'] = $result['id'];
	 		header('Location: ../accueil.php');

	 	}
	 	else{
	 		header('Location: ../login.php?err=false');
	 	}

 ?>
