<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet & Gabriel Levshin">
  <title>Catalogue</title>
  <!-- Bootstrap core CSS -->
  <!--link rel="stylesheet" href="./css/bootstrap/4.2.1/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="catalogue.css" />
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

<body>


  <section class="banner">

    <h1>Catalogue</h1>

  </section>


  <!--ALBUM-->

  <main>

    <?php  if (isset($_POST['livre'])) {
      $livre = $_POST['livre'];
    }
    else {
      $livre = "";
    }
    ?>

  </br>
  <div class="recherche">
    <h3>Rechercher</h3>
    <?php
    // define variables and set to empty values
    $categorie = $auteur = $maison = $format = "";
    $recherche = $livre;

    if (isset($_POST['submit'])) {
      $recherche = test_input($_POST["Recherche"]);
      $categorie = test_input($_POST["categorie"]);
      $auteur = test_input($_POST["auteur"]);
      $maison = test_input($_POST["maison"]);
      $format = test_input($_POST["format"]);
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>

    <style>
    .error {color: #FF0000;}
    </style>


    <?php $reponse = $bdd->query("SELECT * FROM categorielivre"); ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Nom :
      <input type="text" name="Recherche" value="<?php echo $recherche;?>">
      <br><br>

      <?php $reponse = $bdd->query("SELECT * FROM categorielivre"); ?>
      <p>
        Catégorie :
        <select name="categorie">
          <option value=""></option>
          <?php while ($donnees = $reponse->fetch()) { ?>
            <option <?php if ($categorie == $donnees['NumCategorie'] ) echo 'selected' ; ?> value="<?php echo $donnees['NumCategorie'] ?>"><?php echo $donnees['NomCategorie'] ?></option>
          <?php } ?>
        </select>
      </p>

      <p>
        <?php $reponse = $bdd->query("SELECT * FROM auteur"); ?>
        Auteur :
        <select name="auteur">
          <option value=""></option>
          <?php while ($donnees = $reponse->fetch()) { ?>
            <option <?php if ($auteur == $donnees['NumAuteur'] ) echo 'selected' ; ?> value="<?php echo $donnees['NumAuteur'] ?>"><?php echo $donnees['NomAuteur'] ?></option>
          <?php } ?>
        </select>
      </p>

      <p>
        <?php $reponse = $bdd->query("SELECT * FROM maisonedition"); ?>
        Maison d'édition :
        <select name="maison">
          <option value=""></option>
          <?php while ($donnees = $reponse->fetch()) { ?>
            <option <?php if ($maison == $donnees['NumMaison'] ) echo 'selected' ; ?> value="<?php echo $donnees['NumMaison'] ?>"><?php echo $donnees['NomMaison'] ?></option>
          <?php } ?>
        </select>
      </p>

      <p>
        <?php $reponse = $bdd->query("SELECT * FROM formatlivre"); ?>
        Format :
        <select name="format">
          <option value=""></option>
          <?php while ($donnees = $reponse->fetch()) { ?>
            <option <?php if ($format == $donnees['NumFormat'] ) echo 'selected' ; ?> value="<?php echo $donnees['NumFormat'] ?>"><?php echo $donnees['NomFormat'] ?></option>
          <?php } ?>
        </select>
      </p>

      <input type="submit" name="submit" value="Submit">
      <br><br>
    </div>
  </form>


  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php
        $reponse = $bdd->query("SELECT * FROM livre
          WHERE ((`NomLivre` LIKE '%".$recherche."%') OR (`DescriptionLivre` LIKE '%".$recherche."%'))
          AND (`NumCategorie` LIKE '%".$categorie."%')
          AND (`NumAuteur` LIKE '%".$auteur."%')
          AND (`NumMaison` LIKE '%".$maison."%')
          AND (`NumFormat` LIKE '%".$format."%')");
          while ($donnees = $reponse->fetch()) {
            if ($donnees['Statut'] == 1) {?>
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                    <title>Livres</title>
                    <rect fill="#55595c" width="100%" height="100%"/>
                    <text fill="#eceeef" dy=".3em" x="50%" y="50%"><?php echo $donnees['NomLivre']?></text>
                  </svg>
                  <div class="card-body">
                    <img class="card-img-top" src="admin/Images_livre/image<?php echo $donnees['IdLivre'] ?>.png" width="270" height="430" alt="Card image cap" data-toggle="tooltip" title="Akame">
                    <p id="txtDescription" class="card-text"><br><?php echo $donnees['DescriptionLivre'] ?></p>
                    <form method="POST" action="Description.php">
                      <br><br>
                      <button type="submit" name="numLivre" value="<?php echo $donnees['IdLivre'] ?>">Lire plus</button>
                      <br><br>
                    </form>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?>
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
</html>
