<?php
session_start();
try{

  $db = new PDO("mysql:host=localhost;dbname=gaubert_tabasco;charset=utf8","gaubert_test","testtestg4");
}catch(PDOException  $e ){
echo "Error: ".$e;
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>VR - Formations</title>


  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


      <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <a href="formation1.php" class="divHover" id="div1">Formation 1</div>
  <a href="formation2.php" class="divHover" id="div2" >Formation 2</div>
</body>
</html>
