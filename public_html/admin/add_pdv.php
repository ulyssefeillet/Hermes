<!DOCTYPE html>
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

            <li class="nav-item">
              <a href="catalogue_admin.php" class="nav-link waves-effect">
                Catalogue
              </a>
            </li>

            <li class="nav-item active">
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
          <a href="#"> Points de vente</a>
          <span> / </span>
          <span> Panel Admin </span>
        </h4>


      </div>
    </div>
  </div>

  <!-- <form form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border border-light p-5">

  <p class="h4 mb-4 text-left">Ajouter un point de vente</p>


  <input class="form-control mb-4" id="defaultContactFormName" name="NomPDV" type="text" placeholder="Nom">

  <input class="form-control mb-4" id="inputAddress" name="Adresse" type="text" placeholder="Adresse">

  <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" name="Descriptif" placeholder="Descriptif" rows="3"></textarea>

</br>
</br>
<p class="h6 mb-4 text-left">Rajouter une image</p>
<div class="fileUpload btn btn-primary">
<span>JOINDRE</span>
<input type = "file" name = "image" />
</div>

</br>
</br>
</br>
<button class="btn btn-info btn-block" type="submit">Valider</button>
</form> -->

<form action = "" method = "POST" enctype = "multipart/form-data" class="border border-light p-5">

  <p class="h4 mb-4 text-left">Ajouter un point de vente</p>


  <input class="form-control mb-4" id="defaultContactFormName" name="NomPDV" type="text" placeholder="Nom" required>

  <input class="form-control mb-4" id="inputAddress" name="Adresse" type="text" placeholder="Adresse" required>

  <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" name="Telephone" placeholder="Telephone" rows="1" required></textarea>
</br>

<button class="btn btn-info btn-block" type="submit">Valider</button>



</form>

<?php
// define variables and set to empty values
$NomPDV = $Adresse = $Descriptif = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $NomPDV = $_POST["NomPDV"];
  $Adresse = $_POST["Adresse"];
  $Telephone = $_POST["Telephone"];

  $query=$bdd->prepare('INSERT INTO pdv (NomPDV, Adresse, Telephone)
  VALUES (:Nom, :Adresse, :Telephone)');
  $query->bindValue(':Nom', $NomPDV, PDO::PARAM_STR);
  $query->bindValue(':Adresse', $Adresse, PDO::PARAM_STR);
  $query->bindValue(':Telephone', $Telephone, PDO::PARAM_STR);


  $query->execute();

  echo "<script type='text/javascript'>window.location.href = 'pdv_admin.php';</script>";
}

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
