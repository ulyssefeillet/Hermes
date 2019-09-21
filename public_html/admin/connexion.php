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

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
        <a href="index.php">
          <img id="logo" src="logo_hermes.png" width="60" height="55" alt="logo"/>
        </a>
        <a class="navbar-brand" href="#">Hermès</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="Menu">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="catalogue.php">Catalogue</a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="Point.php">Points de vente</a>
              </li>

              <!--  <li class="nav-item dropdown"> -->
              <!--  <a class="nav-link dropdown-toggle" href="Point.php" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Points de vente</a> ->>
              <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
              <a class="dropdown-item" href="album.html">Paris</a>
              <a class="dropdown-item" href="incontournables.html">Lyon</a>
            </div> -->
            <!-- </li> -->

            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="a_propos.php">A Propos</a>
            </li>

          </ul>
        </div> </div>


        <div class="Panier">
          <a href=achat.php>
            <img id="logo3" src="panier2.png" width="60" height="55" alt="logo3"/>
          </a>
        </div>

        <form class="form-inline mt-2 mt-md-0 search">
          <input class="form-control mr-sm-2" type="text" placeholder="Rechercher..." aria-label="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>

      </nav>

    </header>





    <section class="banner">
      <h1 class="titre">Connexion</h1>
    </section>

    <?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
    {
      header("location: catalogue.php");
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
                    <a class="btn btn-primary" href="inscription.php" role="button">Créer son compte </a>
                  </div>
                </div>
              </div>
            </div>
          </div><?php
        }
        ?>

      </body>

      <!--FOOTER -->
      <footer>
        <div class="container">

          <div class="row">

            <div class="col-md-3 menu" aria-labelledby="Actualités">
              <h1 id="activities">Réseaux sociaux</h1>
              <ul>
                <li class="mt-3">Retrouvez-nous sur Facebook:
                </li>
                <li class="social-bar mt-2">

                  <a href="https://www.facebook.com/Ithaque-Marquet-401370493541550"
                  target="_blank" aria-label="Notre page Facebook">
                  <img src="69407.png" alt="Notre page Facebook" width="35" height="35">
                </a>

              </li>
            </ul>
          </div>

          <div class="col-md-3 menu" aria-labelledby="Catalogue">
            <h1 id="donations">Catalogue</h1>
            <ul>
              <li><a href="catalogue.php">Livres papiers</a></li>
              <li><a href="catalogue.php">E-Books</a></li>
              <li><a href="catalogue.php">Livres audio</a></li>
            </ul>
          </div>

          <div class="col-md-3 menu" aria-labelledby="Point de vente">
            <h1 id="projects">Points de vente</h1>
            <ul>
              <li><a href="Point.php#Saint-Lazare">Saint-Lazare</a></li>
              <li><a href="Point.php#Forum_des_Halles">Forum des Halles</a></li>
            </ul>
          </div>

          <div class="col-md-3 menu" aria-labelledby="endowment-fund">
            <h1 id="endowment-fund">Contacts</h1>
            <ul>
              <li><a href="contact.php">Nous contacter</a></li>

            </ul>
            <div> <a href="tel:+33-6-95-19-92-62">06 95 19 92 62</a> </div>
          </div>
        </div>
        <nav aria-label="Raccourcis pied de page">
          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="plan.php">Plan du site</a></li>
            <li><a href="mentions_legales.php">Mentions légales</a></li>
            <li>
              <a href="webmaster/login.php"
              title="connexion">Webmaster</a>
            </li>
          </ul>
        </nav>
      </div>
    </footer>

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
