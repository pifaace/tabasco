<?php
	$login = $_POST['login'];
	$pwd = $_POST['mdp'];
try{
	$db = new PDO("mysql:host=localhost;dbname=gaubert_tabasco;charset=utf8","gaubert_test","testtestg4");
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
