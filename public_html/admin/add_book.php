php<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Espace Admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<?php $bdd = new PDO('mysql:host=localhost;dbname=id9820388_bd_site_hermes;charset=utf8', 'id9820388_admin', '1fxt61sA'); ?>

<body class="grey lighten-3">

  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">
        <a href="#" class="navbar-brand waves-effect"> <strong class="blue-text">Logo</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="admin.php" class="nav-link waves-effect">
                Accueil
              </a>
            </li>

            <li class="nav-item active">
              <a href="catalogue_admin.php" class="nav-link waves-effect">
                Catalogue
              </a>
            </li>

            <li class="nav-item">
              <a href="pdv_admin.php" class="nav-link waves-effect">
                Points de vente
              </a>
            </li>

            <li class="nav-item">
              <a href="auteur_admin.php" class="nav-link waves-effect">
                Auteur
              </a>
            </li>
            <li class="nav-item">
              <a href="categories_admin.php" class="nav-link waves-effect">
                Catégories
              </a>
            </li>
          </ul>

          <!--
          <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item mr-2">
        </li>
      </ul>
    -->

  </div>
</div>
</nav>


<div class="sidebar-fixed position-fixed">

  <!--<a href="#" class ="logo-wrapper waves-effect">
  <img src="" alt="" class="img-fluid">
</a> -->

<div class="list-group list-group-flush">
  <a href="admin.php" class="list-group-item waves-effect active">
    <i class="fa fa-map mr-3"></i>Admin Panel
  </a>

  <a href="profil_admin.php" class="list-group-item waves-effect">
    <i class="fa fa-user mr-3"></i>Mon Profil
  </a>

  <a href="#" class="list-group-item waves-effect">
    <i class="fa fa-cog mr-3"></i>Paramètres
  </a>
</div>
</div>

</header>

<main class="pt-5 max-lg-5">
  <div class="container-fluid mt-5">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="#"> Accueil</a>
          <span> / </span>
          <span> Panel Admin </span>
        </h4>


      </div>
    </div>
  </div>

  <?php
  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false || $_SESSION['Statut'] == 0)
  {
    //header("location: ../index.php");
    echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
  }
  ?>

  <?php if ($_SERVER["REQUEST_METHOD"] != "POST")
  { ?>
    <form action = "" method = "POST" enctype = "multipart/form-data" class="border border-light p-5">
      <p class="h4 mb-4 text-left">Ajouter un livre</p>
      <input class="form-control mb-4" name="Titre" id="defaultContactFormName" type="text" placeholder="Titre">

      <?php $reponse = $bdd->query("SELECT * FROM auteur"); ?>
      <label for="defaultSelect">Auteur</label>
      <select class="browser-default custom-select mb-4" name="Auteur" id="defaultSelect">
        <option value=""></option>
        <?php while ($donnees = $reponse->fetch()) { ?>
          <option value="<?php echo $donnees['NumAuteur'] ?>"><?php echo $donnees['NomAuteur'] ?></option>
        <?php } ?>
      </select>

      <?php $reponse = $bdd->query("SELECT * FROM formatlivre"); ?>
      <label for="defaultSelect">Format</label>
      <select class="browser-default custom-select mb-4" name=Format id="defaultSelect">
        <option value=""></option>
        <?php while ($donnees = $reponse->fetch()) { ?>
          <option value="<?php echo $donnees['NumFormat'] ?>"><?php echo $donnees['NomFormat'] ?></option>
        <?php } ?>
      </select>

      <?php $reponse = $bdd->query("SELECT * FROM categorielivre"); ?>
      <label for="defaultSelect">Catégorie</label>
      <select class="browser-default custom-select mb-4" name="Categorie" id="defaultSelect">
        <option value=""></option>
        <?php while ($donnees = $reponse->fetch()) { ?>
          <option value="<?php echo $donnees['NumCategorie'] ?>"><?php echo $donnees['NomCategorie'] ?></option>
        <?php } ?>
      </select>

      <?php $reponse = $bdd->query("SELECT * FROM maisonedition"); ?>
      <label for="defaultSelect">Maison d'édition</label>
      <select class="browser-default custom-select mb-4" name="Maison" id="defaultSelect">
        <option value=""></option>
        <?php while ($donnees = $reponse->fetch()) { ?>
          <option value="<?php echo $donnees['NumMaison'] ?>"><?php echo $donnees['NomMaison'] ?></option>
        <?php } ?>
      </select>

      <input class="form-control mb-4" name="Quantite" id="defaultContactFormName" type="number" step="any" placeholder="Quantité">
      <input class="form-control mb-4" name="Prix" id="defaultContactFormName" type="number" step="any" placeholder="Prix">
      <label for="defaultSelect">Date de création</label>
      <input class="form-control mb-4" name="Date" id="defaultContactFormName" type="date">

      <label for="defaultSelect">Etat</label>
      <select class="browser-default custom-select mb-4" name="Etat" id="defaultSelect">
        <option value="0">Masqué</option>
        <option value="1">Visible</option>
      </select>

      <textarea class="form-control rounded-0" name="Description" id="exampleFormControlTextarea2" placeholder="Descriptif" rows="3"></textarea>
    </br>
  </br>
  <p class="h6 mb-4 text-left">Rajouter une image</p>
  <div class="fileUpload btn btn-primary">
    <span>JOINDRE</span>
    <input type = "file" class="upload" name = "image" />
  </div>

</br>
</br>
<p class="h6 mb-4 text-left">Rajouter un fichier</p>
<div class="fileUpload btn btn-primary">
  <span>JOINDRE</span>
  <input type="file" class="upload" name="fichier"/>
</div>

</br>
</br>
</br>

<button class="btn btn-info btn-block" type="submit">Valider</button>
</form>
<?php
}
else {

  $NomLivre = $NumAuteur = $NumFormat = $NumCat = $NumCat2 = $NumCat3 = $NumMaison =$Qtt = $Prix = $DescriptionLivre = "";

  $NomLivre = $_POST["Titre"];
  $NumAuteur = $_POST["Auteur"];
  $NumFormat = $_POST["Format"];
  $NumCat = $_POST["Categorie"];
  $NumCat2 = $NumCat;
  $NumCat3 = $NumCat;
  $NumMaison = $_POST["Maison"];
  $Date = $_POST['Date'];
  $Qtt = $_POST["Quantite"];
  $Prix = $_POST["Prix"];
  $DescriptionLivre = $_POST["Description"];
  $Etat = $_POST["Etat"];

  if ($NomLivre != NULL && $NumAuteur != NULL && $NumFormat != NULL && $NumCat != NULL && $NumMaison != NULL && $Date != NULL && $Qtt != NULL && $Prix != NULL && $DescriptionLivre != NULL && $Etat != null)
  {
    $query=$bdd->prepare('INSERT INTO livre (NomLivre, DescriptionLivre, NumFormat,
      NumCategorie, NumCategorie2, NumCategorie3,
      NumAuteur, NumMaison, DateProd, Quantite, Prix, Statut)
      VALUES (:Titre, :Description, :Format, :Categorie, 1, 1, :Auteur, :Maison, :Date, :Quantite, :Prix, :Etat)');
      $query->bindValue(':Titre', $NomLivre, PDO::PARAM_STR);
      $query->bindValue(':Description', $DescriptionLivre, PDO::PARAM_STR);
      $query->bindValue(':Format', $NumFormat, PDO::PARAM_INT);
      $query->bindValue(':Categorie', $NumCat, PDO::PARAM_INT);
      $query->bindValue(':Auteur', $NumAuteur, PDO::PARAM_INT);
      $query->bindValue(':Maison', $NumMaison, PDO::PARAM_INT);
      $query->bindValue(':Date', $Date, PDO::PARAM_STR);
      $query->bindValue(':Quantite', $Qtt, PDO::PARAM_INT);
      $query->bindValue(':Prix', $Prix, PDO::PARAM_INT);
      $query->bindValue(':Etat', $Etat, PDO::PARAM_INT);

      $query->execute();

      $numLivre = $bdd->query("SELECT IdLivre FROM livre WHERE IdLivre = LAST_INSERT_ID()") -> fetch();

      if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $filename = $_FILES["image"]["name"];
        $file_ext = substr($filename, strripos($filename, '.'));


        $extensions= array("jpeg","jpg","png");

        move_uploaded_file($file_tmp,"Images_livre/image".$numLivre['IdLivre'].$file_ext);

      }

      if(isset($_FILES['fichier'])){
        $errors= array();
        $file_name = $_FILES['fichier']['name'];
        $file_size = $_FILES['fichier']['size'];
        $file_tmp = $_FILES['fichier']['tmp_name'];
        $file_type = $_FILES['fichier']['type'];
        $filename = $_FILES["fichier"]["name"];
        $file_ext = substr($filename, strripos($filename, '.'));


        $extensions= array("jpeg","jpg","png");

        move_uploaded_file($file_tmp,"Fichiers_livre/fichier".$numLivre['IdLivre'].$file_ext);

      }
      //header("location: catalogue_admin.php");
      echo "<script type='text/javascript'>window.location.href = 'catalogue_admin.php';</script>";
    }

    else {
      echo "\t", 'Il faut remplir tous les champs pour rajouter un livre. ';
      echo "\t", '<p>Cliquez <a href="./add_book.php">ici</a> pour recommencer</p>';
    }
  }

  ?>

  <?php
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

</main>



<!-- ok
<div style="height: 100vh">
<div class="flex-center flex-column">

<h1 class="text-hide animated fadeIn mb-4"
style="background-image: url('https://mdbootstrap.com/img/logo/mdb-transparent-250px.png'); width: 250px; height: 90px;">
MDBootstrap</h1>
<h5 class="animated fadeIn mb-3">Thank you for using our product. We're glad you're with us.</h5>

<p class="animated fadeIn text-muted">MDB Team</p>
</div>
</div>
>
<!-- /Start-->



<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
