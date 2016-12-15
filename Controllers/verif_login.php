<?php
	$login = $_POST['login'];
	$pwd = $_POST['mdp'];

include('../connexionBD.php');

	 	$req = 'select * from user where login =:login and password=:password';
	 	$query=$db->prepare($req);
	 	$query->bindParam(':login', $login);
		$query->bindParam(':password', $pwd);
		$query->execute();
		$result = $query->fetch();
		if($result != null){
	 		$_SESSION['login'] = $result['login'];
	 		$_SESSION['id'] = $result['id'];
	 		header('Location: ../accueil.html');

	 	}
	 	else{
	 		header('Location: ../login.php?err=false');
	 	}

 ?>
