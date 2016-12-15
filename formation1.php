<?php

session_start();
include('connexionBD.php');
$_SESSION['nbQuestion'] = 0;
$_SESSION['formation'] = 1;

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



      <script src="js/aframe.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



 </head>
 <body>


 <a-scene>
      <a-assets>
        <video id="video" src="./files/360_0019_Stitch_YHCC.mp4" webkit-playsinline crossOrigin="anonymous" autoplay="true" loop="true" />
        <?php
          foreach($questions as $question){
            echo '<img id="Explication' . $question['id'] . '" src="' . $question['explication'] . '">';
            echo '<img id="Question' . $question['id'] . '" src="' . $question['libelle_question'] . '">';
            $req = 'select * from reponse_valide WHERE id_question=' . $question['id'];
            $query=$db->prepare($req);
            $query->execute();
            $reponses = $query->fetchAll();
            foreach($reponses as $reponse){
              echo '<img id="Reponse' . $question['id'] . '-' . $reponse['id'] . '" src="' . $reponse['libelle_reponse'] . '">';
            }
          }?>
          <img id="MarkQuestion" src="img/MarkQuestion.png">
      </a-assets>

      <a-videosphere src="#video" id="video_fond" webkit-playsinline></a-videosphere>


      <a-entity class="Question-Wrapper">
          <a-image class="Mark" src="#MarkQuestion" opacity="1" position="-1 -1 -12" width="2" height="2" z-index="2999" id="Mark1" rotation="0 0 0"></a-image>
          <a-entity class="Question1">
              <a-image src="#Question1" opacity="0" position="-2 3 -12" width="10" height="2" z-index="3000" id="Question1" class="Question"></a-image>
              <?php
                $req = 'select * from reponse_valide WHERE id_question=1';
                $query=$db->prepare($req);
                $query->execute();
                $reponses = $query->fetchAll();
                $i = 1;
                foreach($reponses as $reponse){
                  if($reponse['valide'] == 1) $var = 'vrai';
                  else $var = 'faux';
                  echo '<a-image src="#Reponse1-' . $reponse['id'] . '" opacity="0" id="' . $reponse['id'] . '" name="1" position="-2 ' . $i . ' -12" width="10" height="0" z-index="3000" class="Reponse1 Reponse1' . $reponse['id'] . ' ' . $var . '"></a-image>';
                  $i= $i-2;
                }

              ?>
              <a-image src="#Explication1" opacity="0" position="-2 <?= $i; ?> -12" width="10" height="0" z-index="3000" class="Explication1" ></a-image>
          </a-entity>
      </a-entity>

      <a-entity class="Question-Wrapper">
         <a-image  class="Mark" src="#MarkQuestion" opacity="1" position="-2 0 13" width="2" height="2" z-index="2999" id="Mark2" rotation="0 220 0"></a-image>
         <a-entity class="Question2">
             <a-image src="#Question2" opacity="0" rotation="0 190 0" position="-2 3 13" width="10" height="0" z-index="3000" id="Question2" class="Question"></a-image>
             <?php
             $req = 'select * from reponse_valide WHERE id_question=2';
               $query=$db->prepare($req);
               $query->execute();
               $reponses = $query->fetchAll();
               $i = 1;
               foreach($reponses as $reponse){
                 if($reponse['valide'] == 1) $var = 'vrai';
                 else $var = 'faux';
                 echo '<a-image src="#Reponse2-' . $reponse['id'] . '" opacity="0" id="' . $reponse['id'] . '" rotation="0 190 0" name="2" position="-2 ' . $i . ' 13" width="10" height="0" z-index="3000" class="Reponse2 Reponse2' . $reponse['id'] . ' ' . $var . '"></a-image>';
                 $i= $i-2;
               }              ?>
               <a-image src="#Explication2" opacity="0" rotation="0 190 0" position="-2 <?= $i; ?> 13" width="10" height="0" z-index="3000" class="Explication2"></a-image>
         </a-entity>
     </a-entity>



     <a-entity class="Question-Wrapper">
        <a-image  class="Mark" src="#MarkQuestion" opacity="1" position="5 3 6" width="2" height="2" z-index="2999" id="Mark3" rotation="0 190 0"></a-image>
        <a-entity class="Question3" position="0 3 0" rotation="0 10 0">
            <a-image src="#Question3" opacity="0" rotation="0 220 0" position="7 3 8" width="10" height="2" z-index="3000" id="Question3" class="Question"></a-image>
            <?php
            $req = 'select * from reponse_valide WHERE id_question=3';
              $query=$db->prepare($req);
              $query->execute();
              $reponses = $query->fetchAll();
              $i = 1;
              foreach($reponses as $reponse){
                if($reponse['valide'] == 1) $var = 'vrai';
                else $var = 'faux';
                echo '<a-image src="#Reponse3-' . $reponse['id'] . '" opacity="0" id="' . $reponse['id'] . '" rotation="0 220 0" name="3" position="7 ' . $i . ' 8" width="10" height="0" z-index="3000" class="Reponse3 ' . $var . '"></a-image>';
                $i= $i-2;
              }              ?>

              <a-image src="#Explication3" opacity="0" rotation="0 220 0" position="7 <?= $i; ?> 8" width="10" height="0" z-index="3000" class="Explication3"$></a-image>

        </a-entity>
    </a-entity>

    <a-entity class="Question-Wrapper">
        <a-image  class="Mark" src="#MarkQuestion" opacity="1" position="6 0 -3" width="2" height="2" z-index="2999" id="Mark4" rotation="0 250 0"></a-image>
        <a-entity class="Question4">
            <a-image src="#Question4" opacity="0" position="6 3 -5" rotation="0 295 0" width="10" height="0" z-index="3000" id="Question4" class="Question"></a-image>
            <?php
              $req = 'select * from reponse_valide WHERE id_question=4';
              $query=$db->prepare($req);
              $query->execute();
              $reponses = $query->fetchAll();
              $i = 1;
              foreach($reponses as $reponse){
                if($reponse['valide'] == 1) $var = 'vrai';
                else $var = 'faux';
                echo '<a-image src="#Reponse4-' . $reponse['id'] . '" opacity="0" id="' . $reponse['id'] . '" name="4" position="6 ' . $i . ' -5" rotation="0 295 0" width="10" height="0" z-index="3000" class="Reponse4 Reponse4' . $reponse['id'] . ' ' . $var . '"></a-image>';
                $i= $i-2;
              }

            ?>
            <a-image src="#Explication4" opacity="0" position="6 <?= $i; ?> -5" rotation="0 295 0" width="10" height="0" z-index="3000" class="Explication4"></a-image>

        </a-entity>
    </a-entity>

   <a-entity class="Question-Wrapper">
       <a-image  class="Mark" src="#MarkQuestion" opacity="1" position="-10 0 6" width="2" height="2" z-index="2999" id="Mark5" rotation="0 80 0"></a-image>
       <a-entity class="Question5">
           <a-image src="#Question5" opacity="0" position="-10 3 4" rotation="0 110 0" width="10" height="0" z-index="3000" id="Question5" class="Question"></a-image>
           <?php
             $req = 'select * from reponse_valide WHERE id_question=5';
             $query=$db->prepare($req);
             $query->execute();
             $reponses = $query->fetchAll();
             $i = 1;
             foreach($reponses as $reponse){
               if($reponse['valide'] == 1) $var = 'vrai';
               else $var = 'faux';
               echo '<a-image src="#Reponse5-' . $reponse['id'] . '" opacity="0" id="' . $reponse['id'] . '" name="5" position="-10 ' . $i . ' 4" rotation="0 110 0" width="10" height="0" z-index="3000" class="Reponse5 Reponse5' . $reponse['id'] . ' ' . $var . '"></a-image>';
               $i= $i-2;
             }

           ?>
           <a-image src="#Explication5" opacity="0" position="-10 <?= $i; ?> 4" rotation="0 110 0" width="10" height="0" z-index="3000" class="Explication5"></a-image>

       </a-entity>
   </a-entity>




      <a-entity camera look-controls>
            <a-cursor id="cursor"
              animation__click="property: scale; startEvents: click; from: 0.1 0.1 0.1; to: 1 1 1; dur: 150" color="black"></a-cursor>
          </a-entity>



 <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
    <script type="text/javascript">

       $(document).ready(function() {




           var imgSrc;
           $('.Reponse1').click(function(e) {
               imgSrc = $(this).attr('src');
               var idRep = $(this).attr('id');
               var idQ = $(this).attr('name');
               url = 'Controllers/verif_reponse.php';
               var posting = $.post( url, { valU: idRep, idQuestion : idQ } );

               url = 'Controllers/nbQuest.php';
               var posting2 = $.post(url);
               posting2.done(function(data){
                   $('#nbQ').text('Question : ' + data + '/5');
               });


               $(".Reponse1").off();
               if ($(this).hasClass('vrai')) {
                   $(this).attr('src', 'img/bonneReponse.png');
                   $(".Reponse1").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication1").attr("opacity","1");
                   $(".Explication1").attr("height", "2");
               } else {
                   $(this).attr('src', 'img/mauvaiseReponse.png');
                    $(".Reponse1").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication1").attr("opacity","1");
                   $(".Explication1").attr("height", "2");
               }
               $('.Question1 #Question1, .Question1 .Reponse1, .Question1 .Explication1').animate({
                   opacity: 0
               }, 3000, function() {
                   $(this).attr('opacity', '0').attr('height', '0')
               });
           });

           $('.Reponse2').click(function(e) {
               imgSrc = $(this).attr('src');
               var idRep = $(this).attr('id');
               var idQ = $(this).attr('name');
               url = 'Controllers/verif_reponse.php';
               var posting = $.post( url, { valU: idRep, idQuestion : idQ } );

               url = 'Controllers/nbQuest.php';
               var posting2 = $.post(url);
               posting2.done(function(data){
                   $('#nbQ').text('Question : ' + data + '/5');
               });


               $(".Reponse2").off();
               if ($(this).hasClass('vrai')) {
                   $(this).attr('src', 'img/bonneReponse.png');
                   $(".Reponse2").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication2").attr("opacity","1");
                   $(".Explication2").attr("height", "2");
               } else {
                   $(this).attr('src', 'img/mauvaiseReponse.png');
                    $(".Reponse2").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication2").attr("opacity","1");
                   $(".Explication2").attr("height", "2");
               }
               $('.Question2 #Question2, .Question2 .Reponse2, .Question2 .Explication2').animate({
                   opacity: 0
               }, 3000, function() {
                   $(this).attr('opacity', '0').attr('height', '0')
               });
           });

           $('.Reponse3').click(function(e) {
               imgSrc = $(this).attr('src');
               var idRep = $(this).attr('id');
               var idQ = $(this).attr('name');
               url = 'Controllers/verif_reponse.php';
               var posting = $.post( url, { valU: idRep, idQuestion : idQ } );

               url = 'Controllers/nbQuest.php';
               var posting2 = $.post(url);
               posting2.done(function(data){
                   $('#nbQ').text('Question : ' + data + '/5');
               });


               $(".Reponse3").off();
               if ($(this).hasClass('vrai')) {
                   $(this).attr('src', 'img/bonneReponse.png');
                   $(".Reponse3").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication3").attr('opacity', '1');
                   $(".Explication3").attr('height', '2');
              } else {
                   $(this).attr('src', 'img/mauvaiseReponse.png');
                    $(".Reponse3").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication3").attr('opacity', '1');
                   $(".Explication3").attr('height', '2');               }
               $('.Question3 #Question3, .Question3 .Reponse3, .Question3 .Explication3').animate({
                   opacity: 0
               }, 3000, function() {
                   $(this).attr('opacity', '0').attr('height', '0')
               });
           });

           $('.Reponse4').click(function(e) {
               imgSrc = $(this).attr('src');
               var idRep = $(this).attr('id');
               var idQ = $(this).attr('name');
               url = 'Controllers/verif_reponse.php';
               var posting = $.post( url, { valU: idRep, idQuestion : idQ } );

               url = 'Controllers/nbQuest.php';
               var posting2 = $.post(url);
               posting2.done(function(data){
                   $('#nbQ').text('Question : ' + data + '/5');
               });


               $(".Reponse4").off();
               if ($(this).hasClass('vrai')) {
                   $(this).attr('src', 'img/bonneReponse.png');
                   $(".Reponse4").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication4").attr('opacity', '1');
                   $(".Explication4").attr('height', '2');
               } else {
                   $(this).attr('src', 'img/mauvaiseReponse.png');
                    $(".Reponse4").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication4").attr('opacity', '1');
                   $(".Explication4").attr('height', '2');
               }
               $('.Question4 #Question4, .Question4 .Reponse4, .Question4 .Explication4').animate({
                   opacity: 0
               }, 3000, function() {
                   $(this).attr('opacity', '0').attr('height', '0')
               });
           });

           $('.Reponse5').click(function(e) {
               imgSrc = $(this).attr('src');
               var idRep = $(this).attr('id');
               var idQ = $(this).attr('name');
               url = 'Controllers/verif_reponse.php';
               var posting = $.post( url, { valU: idRep, idQuestion : idQ } );

               url = 'Controllers/nbQuest.php';
               var posting2 = $.post(url);
               posting2.done(function(data){
                   $('#nbQ').text('Question : ' + data + '/5');
               });


               $(".Reponse5").off();
               if ($(this).hasClass('vrai')) {
                   $(this).attr('src', 'img/bonneReponse.png');
                   $(".Reponse5").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication5").attr('opacity', '1');
                   $(".Explication5").attr('height', '2');


               } else {
                   $(this).attr('src', 'img/mauvaiseReponse.png');
                    $(".Reponse5").attr("opacity","0.6");
                   $(this).attr("opacity","1");
                   $(".Explication5").attr('opacity', '1');
                   $(".Explication5").attr('height', '2');

               }
               $('.Question5 #Question5, .Question5 .Reponse5, .Question5 .Explication5').animate({
                   opacity: 0
               }, 3000, function() {
                   $(this).attr('opacity', '0').attr('height', '0')
               });
           });


           $('#Mark1').click(function() {
               $('.Question1 #Question1, .Question1 .Reponse1').attr('opacity', '1').attr('height', '2');
               $(this).attr('opacity', '0').attr('height', '0');
           });

           $('#Mark2').click(function() {
              $('.Question2 #Question2, .Question2 .Reponse2').attr('opacity', '1').attr('height', '2');
              $(this).attr('opacity', '0').attr('height', '0');
          });

          $('#Mark3').click(function() {
             $('.Question3 #Question3, .Question3 .Reponse3').attr('opacity', '1').attr('height', '2');
             $(this).attr('opacity', '0').attr('height', '0');
           });

           $('#Mark4').click(function() {
              $('.Question4 #Question4, .Question4 .Reponse4').attr('opacity', '1').attr('height', '2');
              $(this).attr('opacity', '0').attr('height', '0');
            });

           $('#Mark5').click(function() {
              $('.Question5 #Question5, .Question5 .Reponse5').attr('opacity', '1').attr('height', '2');
              $(this).attr('opacity', '0').attr('height', '0');
          });



       });


    </script>

</a-scene>
<div id="nbQ">Question : 0/5</div>
 </body>
 </html>
