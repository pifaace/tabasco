<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>VR - Login </title>


  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="box">
      <div class="boxHeader">
        Connexion
      </div>
      <?php if(isset($_GET["err"])) : ?>
        <div class="row">
          <div id="messageErreur" >
            Vos identifiants sont incorrects<i class="close material-icons" id="btnClose">close</i>
          </div>
        </div>
      <?php endif; ?>
      <div class="boxBody">

        <div class="row">
          <form class="col s12" method="POST" action="Controllers/verif_login.php">

              <div class="row">
                <div class="input-field col s12">
                  <input  type="text" class="validate" name="login" id="login">
                  <label for="login">Login</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input  type="text" class="validate" name="mdp" id="mdp">
                  <label for="mdp">Mot de passe</label>
                </div>
              </div>
              <div class="row align">
                <div class="input-field col s12">
                  <input  type="submit" class="waves-effect waves-light btn" name="envoyer" id="envoyer" value="Connexion"/>
                </div>
              </div>

          </form>
        </div>
      </div>
</div>
<!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
    <script type="text/javascript">
      document.getElementById("btnClose").addEventListener("click", function(){
        document.getElementById("messageErreur").style.display = "none";
      });
    </script>
</body>
</html>
