<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet & Gabriel Levshin">
  <title>Espace Client</title>
  <!-- Bootstrap core CSS -->
  <!--link rel="stylesheet" href="./css/bootstrap/4.2.1/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="EspaceClient.css" />
  <link rel="stylesheet" href="Commun.css" />

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
  }

}
</style>
<!-- Custom styles for this template -->
<link href="./css/album.css" rel="stylesheet">
<link rel="icon" href="favicon.ico" />
</head>

<?php $bdd = new PDO('mysql:host=localhost;dbname=id9820388_bd_site_hermes;charset=utf8', 'id9820388_admin', '1fxt61sA'); ?>
?>

<body>



  <section class="banner">

    <h1> </h1>

  </section>

  <?php $infosMembre = $bdd->query("SELECT * FROM membre WHERE (NumMembre LIKE {$_SESSION['NumMembre']})") -> fetch(); ?>

  <section>

  </br>
  <h1> Bienvenue sur votre espace <?php echo $infosMembre['Prenom'], ' ',  $infosMembre['Nom'] ?> </h1>
  <div  class="corps">
    <h2> Profil : </h2>

    <form class="border border-light p-5" method='post'>
      <div class="form-group row">
        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input class="form-control" name="Nom" value="<?php echo $infosMembre['Nom'] ?>" >
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Prénom</label>
        <div class="col-sm-10">
          <input class="form-control" name="Prenom" value="<?php echo $infosMembre['Prenom'] ?>" >
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
          <input class="form-control" name="Adresse" value="<?php echo $infosMembre['Adresse'] ?>" >
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input class="form-control" name="Mail" value="<?php echo $infosMembre['Mail'] ?>" >
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">N° de Téléphone</label>
        <div class="col-sm-10">
          <input class="form-control" name="Telephone" value="<?php echo $infosMembre['Telephone'] ?>" >
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Mot de passe actuel*</label>
        <div class="col-sm-10">
          <input class="form-control" type="password" name="Mdp" placeholder="**********" required>
        </div>
        <small id="emailHelp" class="form-text text-muted">* Champs Obligatoire</small>
      </div>
      <p><a> <button class="btnSave">Sauvegarder </button> </a></p>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $Nom = $_POST["Nom"];
      $Prenom = $_POST["Prenom"];
      $Mail = $_POST["Mail"];
      $Telephone = $_POST["Telephone"];
      $Adresse = $_POST["Adresse"];
      $Mdp = $_POST["Mdp"];

      if($Mdp == $infosMembre['Mdp']) {
        $query=$bdd->prepare("UPDATE membre
          SET Nom = :Nom,
          Prenom = :Prenom,
          Mail = :Mail,
          Telephone = :Telephone,
          Adresse = :Adresse
          WHERE NumMembre LIKE {$_SESSION['NumMembre']}");
          $query->bindValue(':Nom', $Nom, PDO::PARAM_STR);
          $query->bindValue(':Prenom', $Prenom, PDO::PARAM_STR);
          $query->bindValue(':Mail', $Mail, PDO::PARAM_STR);
          $query->bindValue(':Telephone', $Telephone, PDO::PARAM_STR);
          $query->bindValue(':Adresse', $Adresse, PDO::PARAM_STR);

          $query->execute();

          echo "<script type='text/javascript'>window.location = window.location.href;</script>";
        }
        else {
          $error = "Mot de passe incorrect ou confirmation différent du nouveau mot de passe";
          echo $error;
        }
      } ?>


      <br></br>

      <h2> Vos livres : </h2>

      <div class="tab">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Titre</th>
              <th scope="col">Auteur</th>
              <th scope="col">Genre</th>
              <th scope="col">Année</th>
              <th scope="col">Date d'achat</th>
              <th scope="col">Catégorie</th>
              <th scope="col">Télécharger</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Livre 1</th>
              <td>Auteur 1</td>
              <td>Fantastique</td>
              <td>1965</td>
              <td>09/03/2018</td>
              <td>E-book</td>
              <td><input id="image" type="image" width="40" height="40" alt="Login" src="telechargement.png"></td>
            </tr>
            <tr>
              <th scope="row">Livre 2</th>
              <td>Auteur 2</td>
              <td>Policier</td>
              <td>2000</td>
              <td>28/01/2017</td>
              <td>Livre papier</td>
            </tr>
            <tr>
              <th scope="row">Livre 3</th>
              <td>Auteur 3</td>
              <td>Historique</td>
              <td>1985</td>
              <td>21/05/2015</td>
              <td>Livre audio</td>
              <td><input id="image" type="image" width="40" height="40" alt="Login" src="telechargement.png"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <br></br>


  <?php include 'footer.php'; ?>

</body>
</html>
