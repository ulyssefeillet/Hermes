<?php include 'header.php'; ?>

<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet">
  <meta name="viewport" content="user-scalable=no width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Se connecter</title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link rel="stylesheet" href="connexion.css">
  <link rel="stylesheet" href="Commun.css" />

  <?php $bdd = new PDO('mysql:host=localhost;dbname=id9820388_bd_site_hermes;charset=utf8', 'id9820388_admin', '1fxt61sA'); ?>

</head>

<body class="text-center">

  <div id="fb-root"></div>

  <main>







    <section class="banner">
      <h1 class="titre">Connexion</h1>
    </section>


    <?php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
    {
      header("location: index.php");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $message='';
      if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
      {
        $message = '<p>une erreur s\'est produite pendant votre identification.
        Vous devez remplir tous les champs</p>
        <p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
      }
      else //On check le mot de passe
      {
        $query=$bdd->prepare('SELECT NumMembre, Login, Mdp, Statut
          FROM membre WHERE Login = :pseudo');
          $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
          $query->execute();
          $data=$query->fetch();
          if ($data['Mdp'] == $_POST['password']) // Acces OK !
          {
            $_SESSION['loggedin'] = true;
            $_SESSION['NumMembre'] = $data['NumMembre'];
            $_SESSION['Statut'] = $data['Statut'];
            $message = '<p>Bienvenue '.$data['Login'].',
            vous êtes maintenant connecté!</p>
            <p>Cliquez <a href="./index.php">ici</a>
            pour revenir à la page d accueil</p>';
          }
          else // Acces pas OK !
          {
            $message = '<p>Une erreur s\'est produite
            pendant votre identification.<br /> Le mot de passe ou le pseudo
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a>
            pour revenir à la page précédente
            <br /><br />Cliquez <a href="./index.php">ici</a>
            pour revenir à la page d accueil</p>';
          }
          $query->CloseCursor();
        }
        echo $message.'</div></body></html>';
      }

      else
      {
        ?>
        <div id="contenu">
          <div class="container">
            <div class="row">
              <div class="col-xs-6 col-md-offset-3">
                <form method="post" action="connexion.php">
                  <div class="form-group">
                    <label for="_input_email">Pseudo</label>
                    <input  type="text" name="pseudo" autofocus="true" id="_input_email" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="_input_password">Mot de passe</label>
                    <input  type="password" name="password" id="_input_password" class="form-control">
                  </div>

                  <div class="form-group clearfix">
                    <input  type="submit" value="Connexion" class="btn btn-primary">
                    <a href="/auth/forgottenPassword" class="btn btn-link">Mot de passe oublié ?</a>
                  </div>

                  <input  type="hidden" name="_csrf_token" value="459ad77541b22bc06892b669ef4fe0bfa7c660b7" id="_input__csrf_token" class="form-control">
                </form>
              </div>

              <div class="col-xs-6 col-md-offset-3 ">
                <form action="/auth/login" method="post">
                  <div class="form-group Compte">
                    <label for="_input_email">Pas de compte ?</label>
                  </div>
                  <div class="form-group clearfix compte ">
                    <a class="btn btn-primary" href="Inscription.php" role="button">Créer son compte </a>
                  </div>
                </div>
              </div>
            </div>
          </div><?php
        }
        ?>

      </body>

      <?php include 'footer.php'; ?>

    </main>

    <script src="/js/jquery.min.js"></script>

    <script src="/js/drawer.js"></script>

    <script src="/js/cookieinfo.min.js" id="cookieinfo" data-bg="#353535" data-fg="#FFF"
    data-close-text="J'ai compris !"
    data-expires="Sun, 24 May 2020 13:44:11 +0200"
    data-linkmsg="En savoir plus"
    data-moreinfo="/mentions-legales"
    data-message="En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies pour améliorer votre expérience utilisateur, mesurer l'audience et optimiser les fonctionnalités des réseaux sociaux.">
    </script>





    </html>
