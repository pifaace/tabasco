<?php
	session_start();
	$login = $_POST['login'];
	$pwd = $_POST['mdp'];
try{
	$db = new PDO("mysql:host=https://tabasco-team.labo-g4.fr:2083;dbname=tabasco;charset=utf8","gaubert","841aZYTR2b");
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
