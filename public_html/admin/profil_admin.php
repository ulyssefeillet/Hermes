<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Profil - Espace Admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">



  <link href="css/style.min.css" rel="stylesheet">
  <link href="css/profil_admin.css" rel="stylesheet">



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
            <li class="nav-item active">
              <a href="admin.php" class="nav-link waves-effect">
                Accueil
              </a>
            </li>

            <li class="nav-item">
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
<h3> Espace Admin </h3>
<div class="list-group list-group-flush">

  <a href="admin.php" class="list-group-item waves-effect">
    <i class="fa fa-map mr-3"></i>Admin Panel
  </a>

  <a href="profil_admin.php" class="list-group-item waves-effect active">
    <i class="fa fa-user mr-3"></i>Mon Profil
  </a>

  <a href="#" class="list-group-item waves-effect">
    <i class="fa fa-cog mr-3"></i>Paramètres
  </a>

</div>

</div>

</header>

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false || $_SESSION['Statut'] == 0)
{
  echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
}
?>

<?php $infosMembre = $bdd->query("SELECT * FROM membre WHERE (NumMembre LIKE {$_SESSION['NumMembre']})") -> fetch(); ?>

<main class="pt-5 max-lg-5">
  <div class="container-fluid mt-5">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="#"> Mon Profil</a>
          <span> / </span>
          <span> Espace Admin </span>
        </h4>

        <form class="d-flex justify-content-cenetr" >
          <input type"search" class="form-control" placeholder="Rechercher...">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">

            <i class="fa fa-search">

            </i>


          </button>

        </form>
      </div>
    </div>
  </div>
</br>


<form class="border border-light p-5" action="modify_admin.php">

  <p class="h4 mb-4 text-left">Coordonnées</p>
</br>


<div class="form-group row">
  <label for="staticName" class="col-sm-2 col-form-label"> Nom </label>
  <div class="col-md-auto">
    <input type="text" readonly class="form-control-plaintext" id="staticName" value="<?php echo $infosMembre['Nom'] ?>">
  </div>
</div>

<div class="form-group row">
  <label for="staticName" class="col-sm-2 col-form-label"> Prénom </label>
  <div class="col-md-auto">
    <input type="text" readonly class="form-control-plaintext" id="staticName" value="<?php echo $infosMembre['Prenom'] ?>">
  </div>
</div>

<div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
  <div class="col-md-auto">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $infosMembre['Mail'] ?>">
  </div>
</div>

<div class="form-group row">
  <label for="staticName" class="col-sm-2 col-form-label"> Numéro de téléphone </label>
  <div class="col-md-auto">
    <input type="text" readonly class="form-control-plaintext" id="staticName" value="<?php echo $infosMembre['Telephone'] ?>">
  </div>
</div>

<button class="btn btn-info btn-md" type="submit">Modifier</button>
</form>

<form class="border border-light p-5">
  <div class="auth">
    <p class="h4 mb-4 text-left">Authentification</p>
  </form>
  <form action="modify_login.php">
    <button class="btn btn-info btn-md" type="submit">Modifier mon login </button>
  </form>
</br>
<form action="modify_password.php">
  <button class="btn btn-info btn-md" type="submit">Modifier mon mot de passe</button>
</br>
</div>



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
