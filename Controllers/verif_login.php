<?php
	session_start();
	$login = $_POST['login'];
	$pwd = $_POST['mdp'];
try{
	$db = new PDO("mysql:host=localhost;dbname=tabasco;charset=utf8","root","root");
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
	 		$_SESSION['login'] = true;
	 		$_SESSION['id'] = 1;
	 		header('Location: ../accueil.php');

	 	}
	 	else{
	 		header('Location: ../login.php?err=false');
	 	}

 ?>
