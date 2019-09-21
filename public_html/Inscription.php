
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet">
  <title>Catalogue</title>
  <!-- Bootstrap core CSS -->
  <!--link rel="stylesheet" href="./css/bootstrap/4.2.1/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Inscription.css" />
  <link rel="stylesheet" href="Commun.css" />

</head>

<?php $bdd = new PDO('mysql:host=localhost;dbname=id9820388_bd_site_hermes;charset=utf8', 'id9820388_admin', '1fxt61sA'); ?>

<body>



  <section class="banner">

    <h1>Création de compte</h1>

  </section>



  <body class="bg-light">

    <div class="container bloc">
      <div class="row">

        <div class="col-md-8 order-md-1">

        </br>

        <?php

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
        {
          header("location: index.php");
        }

        if (empty($_POST['pseudo'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
        {
          echo '<h1>Inscription 1/2</h1>';
          echo '<form method="post" action="Inscription.php" enctype="multipart/form-data">
          <fieldset><legend>Identifiants</legend>
          <label for="pseudo">* Pseudo : </label>  <input name="pseudo" type="text" id="pseudo" /> (le pseudo doit contenir entre 3 et 15 caractères)<br />
          <label for="password">* Mot de Passe : </label> <input type="password" name="password" id="password" /><br />
          <label for="confirm">* Confirmer le mot de passe : </label> <input type="password" name="confirm" id="confirm" />
          </fieldset>
          <fieldset><legend>Contacts</legend>
          <label for="email">* Votre adresse Mail :</label> <input type="text" name="email" id="email" /><br />
          <label for="telephone">Votre numéro de téléphone :</label> <input type="text" name="telephone" id="telephone" /><br />
          </fieldset>
          <fieldset><legend>Informations personnelles</legend>
          <label for="Nom">Votre nom :</label> <input type="text" name="nom" id="nom" /><br />
          <label for="Prenom">Votre prénom :</label> <input type="text" name="prenom" id="prenom" /><br />
          <label for="Adresse">Votre adresse :</label> <input type="text" name="adresse" id="adresse" /><br />
          <label for="Ville">Votre ville :</label> <input type="text" name="ville" id="ville" /><br />
          <label for="Code Postal">Le code postal de votre ville :</label> <input type="text" name="codePostal" id="codePostal" /><br />
          <label for="Pays">Votre pays :</label> <input type="text" name="pays" id="pays" /><br />
          </fieldset>


          <p>Les champs précédés d\'un * sont obligatoires</p>
          <p><input type="submit" value="S\'inscrire" /></p></form>
          </div>
          </body>
          </html>';
        } //Fin de la partie formulaire
        else //On est dans le cas traitement
        {
          $pseudo_erreur1 = NULL;
          $pseudo_erreur2 = NULL;
          $mdp_erreur = NULL;
          $email_erreur1 = NULL;
          $email_erreur2 = NULL;

          //On récupère les variables
          $i = 0;
          $temps = time();
          $pseudo = $_POST['pseudo'];
          $email = $_POST['email'];
          $pass = $_POST['password'];
          $confirm = $_POST['confirm'];
          $telephone = $_POST['telephone'];
          $nom = $_POST['nom'];
          $prenom = $_POST['prenom'];
          $adresse = $_POST['adresse'];
          $ville = $_POST['ville'];
          $codePostal = $_POST['codePostal'];
          $telephone = $_POST['telephone'];
          $pays = $_POST['pays'];


          //Vérification du pseudo

          $query=$bdd->prepare('SELECT COUNT(*) AS nbr FROM membre WHERE Login =:pseudo');
          $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
          $query->execute();
          $pseudo_free=($query->fetchColumn()==0)?1:0;
          $query->CloseCursor();
          if(!$pseudo_free)
          {
            $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
            $i++;
          }
          if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
          {
            $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
            $i++;
          }

          //Vérification du mdp
          if ($pass != $confirm || empty($confirm) || empty($pass))
          {
            $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
            $i++;
          }

          //Vérification de l'adresse email

          //Il faut que l'adresse email n'ait jamais été utilisée
          $query=$bdd->prepare('SELECT COUNT(*) AS nbr FROM membre WHERE Mail =:mail');
          $query->bindValue(':mail',$email, PDO::PARAM_STR);
          $query->execute();
          $mail_free=($query->fetchColumn()==0)?1:0;
          $query->CloseCursor();

          if(!$mail_free)
          {
            $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
            $i++;
          }
          //On vérifie la forme maintenant
          if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
          {
            $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
            $i++;
          }

          ?>

          <?php
          if ($i==0)
          {
            echo'<h1>Inscription terminée</h1>';
            echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit sur le forum</p>
            <p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d accueil</p>';

            //La ligne suivante sera commentée plus bas
            $nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):'';

            $query=$bdd->prepare('INSERT INTO membre (Login, Mdp, Mail, Nom, Prenom, Adresse, Ville, Pays, CodePostal, Telephone)
            VALUES (:pseudo, :pass, :email, :nom, :prenom, :adresse, :ville, :pays, :codePostal, :telephone)');
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->bindValue(':pass', $pass, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
            $query->bindValue(':ville', $ville, PDO::PARAM_STR);
            $query->bindValue(':pays', $pays, PDO::PARAM_STR);
            $query->bindValue(':codePostal', $codePostal, PDO::PARAM_STR);
            $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
            $query->execute();

            //Et on définit les variables de sessions

            $query->CloseCursor();
          }
          else
          {
            echo'<h1>Inscription interrompue</h1>';
            echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
            echo'<p>'.$i.' erreur(s)</p>';
            echo'<p>'.$pseudo_erreur1.'</p>';
            echo'<p>'.$pseudo_erreur2.'</p>';
            echo'<p>'.$mdp_erreur.'</p>';
            echo'<p>'.$email_erreur1.'</p>';
            echo'<p>'.$email_erreur2.'</p>';

            echo'<p>Cliquez <a href="./Inscription.php">ici</a> pour recommencer</p>';
          }
        }
        ?>





      </form>
    </div>
  </div>
</div>




<?php include 'footer.php'; ?>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
