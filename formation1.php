<?php
session_start();
try{
  //$db = new PDO("mysql:host=localhost;dbname=tabasco;charset=utf8","root","root");
  $db = new PDO("mysql:host=localhost;dbname=gaubert_tabasco;charset=utf8","gaubert_test","testtestg4");


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
   <title>VR - Formation 1</title>


   <!--Import Google Icon Font-->
       <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--Import materialize.css-->
       <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/>

       <!--Let browser know website is optimized for mobile-->
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


       <link rel="stylesheet" href="css/style.css">
 </head>
 <body>



  <div class="divHover" id="div1">Q1</div>
  <div class="divHover" id="div2" >Q2</div>


  <div id="overlay"></div>
  <?php
  $i = 1;
  foreach($questions as $question){


    $req = 'select * from reponse_valide WHERE id_question=' . $question['id'];
    $query=$db->prepare($req);
    $query->execute();
    $reponses = $query->fetchAll();

    $req = 'select * from reponse_valide WHERE id_question=' . $question['id'] . ' AND valide=1';
    $query=$db->prepare($req);
    $query->execute();
    $reponseCorrect = $query->fetch();
    ?>

    <div class="boxQuestion" id="box<?= $question['id']; ?>">
          <div class="boxHeader">
            Q<?= $i; ?> : <?= $question['libelle_question']; ?>
          </div>

            <div class="row">
              <div class="erreur" id="erreur<?= $question['id']; ?>">
                <div id="messageErreur<?= $question['id']; ?>"></div><i class="close material-icons" id="close<?= $question['id']; ?>">close</i>
              </div>
            </div>
          <div class="boxBody">

            <div class="row">
              <form class="col s12" action="" id="formBox<?= $question['id']; ?>">
                <?php foreach($reponses as $reponse){
                  ?>
                  <p><input type="hidden" name="idQuestion" value="<?=$question['id']; ?>"/></p>
                  <p>
                     <input name="group1" type="radio" id="test<?= $reponse['id']; ?>" class="with-gap" value="<?= $reponse['id']; ?>" <?php if(isset($_GET['idRep']) && $_GET['idRep']== $reponse['id']) echo 'checked'; ?>/>
                     <label for="test<?= $reponse['id']; ?>"><?= $reponse[libelle_reponse]; ?></label>
                   </p>
                  <?php
                }
                ?>
                <div class="row explication" id="explication<?= $question['id']; ?>"><br/><span id="bonneRep">Bonne réponse : <?= $reponseCorrect['libelle_reponse']; ?> </span><br/><br/><?= $question['explication']; ?></div>
                 <div class="row align">
                   <div class="input-field col s12">
                     <input  type="submit" class="btn-large" name="envoyer" id="envoyer<?= $question['id']; ?>" value="Valider"/>
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
     <!-- Une ou plusieurs balises HTML pour définir le contenu du document -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript">



      $(document).ready(function() {

        $( "#formBox1" ).submit(function( event ) {
          event.preventDefault();
          var $form = $( this ),
            idQuest = $form.find( "input[name='idQuestion']").val(),
            valUser = $form.find( "input[type='radio'][name='group1']:checked" ).attr('value'),
            url = 'Controllers/verif_reponse.php';
          var posting = $.post( url, { valU: valUser, idQuestion : idQuest } );
          posting.done(function( data ) {
            $( "#messageErreur1" ).text(data);
            if(data === "Bonne réponse"){
              $( "#erreur1" ).addClass('success');
              $( "#erreur1" ).removeClass('error');
            }
            else{
              $( "#erreur1" ).addClass('error');
              $( "#erreur1" ).removeClass('success');
            }
            $( "#erreur1" ).show();
            $("#explication1").show();
            $("#envoyer1").addClass('disabled');
          });

        });


        $( "#formBox2" ).submit(function( event ) {
          event.preventDefault();
          var $form = $( this ),
            idQuest = $form.find( "input[name='idQuestion']").val(),
            valUser = $form.find( "input[type='radio'][name='group1']:checked" ).attr('value'),
            url = 'Controllers/verif_reponse.php';
          var posting = $.post( url, { valU: valUser, idQuestion : idQuest } );
          posting.done(function( data ) {
            $( "#messageErreur2" ).text(data);
            if(data === "Bonne réponse"){
              $( "#erreur2" ).addClass('success');
              $( "#erreur2" ).removeClass('error');
            }
            else{
              $( "#erreur2" ).addClass('error');
              $( "#erreur2" ).removeClass('success');
            }
            $( "#erreur2" ).show();
            $("#explication2").show();
            $("#envoyer2").addClass('disabled');
          });

        });



        $('#div1').click(function(){
            $('#box1').show();
            $('#overlay').show();
        });

        $('#div2').click(function(){
            $('#box2').show();
            $('#overlay').show();
        });

        $('#overlay').click(function(){
            $('#box1').hide();
            $('#box2').hide();
            $('#overlay').hide();
        });

        $('#close1').click(function(){
          $( "#erreur1" ).hide();
        });

        $('#close2').click(function(){
          $( "#erreur2" ).hide();
        });
      });
    </script>


 </body>
 </html>
