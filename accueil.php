<?php
session_start();
try{
$db = new PDO("mysql:host=localhost;dbname=tabasco;charset=utf8","root","root");
}catch(PDOException  $e ){
echo "Error: ".$e;
}

  $req = 'select * from question';
  $query=$db->prepare($req);
  $query->execute();
  $questions = $query->fetchAll();

 ?>

 <!doctype html>
 <html lang="fr">
 <head>
   <meta charset="utf-8">
   <title>VR - Questions </title>


   <!--Import Google Icon Font-->
       <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--Import materialize.css-->
       <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/>

       <!--Let browser know website is optimized for mobile-->
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


       <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
<?php
  $i = 1;
  foreach($questions as $question){
    $req = 'select * from reponse_valide WHERE id_question=' . $question['id'];
    $query=$db->prepare($req);
    $query->execute();
    $reponses = $query->fetchAll();

    ?>

    <div class="box">
          <div class="boxHeader">
            Q<?= $i; ?> : <?= $question['libelle_question']; ?>
          </div>
          <div class="boxBody">

            <div class="row">
              <form class="col s12" method="POST" action="">
                <?php foreach($reponses as $reponse){
                  ?>
                  <p>
                     <input name="group1" type="radio" id="test1" class="with-gap"/>
                     <label for="test1"><?= $reponse[libelle_reponse]; ?></label>
                   </p>
                  <?php
                }
                ?>
                 <div class="row align">
                   <div class="input-field col s12">
                     <input  type="submit" class="waves-effect waves-light btn" name="envoyer" id="envoyer" value="Valider"/>
                   </div>
                 </div>
              </form>
            </div>
          </div>
    </div>


    <?php
    $i++;
  }?>

 <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
 </body>
 </html>
