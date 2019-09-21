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


      </div>
    </div>
  </div>

  <form class="border border-light p-5" method='post'>

    <p class="h4 mb-4 text-left">Modifier mon login</p>

    <input class="form-control mb-4" id="defaultContactFormName" type="text" name="login" placeholder="Login actuel" required>
    <input class="form-control mb-4" id="defaultContactFormName" type="text" name="new-login" placeholder="Nouveau login" required>
    <input class="form-control mb-4" id="defaultContactFormName" type="text" name="new-login2" placeholder="Confirmer mon nouveau login" required>

  </br>

</br>
<button class="btn btn-info btn-block" type="submit">Enregistrer</button>
</form>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["login"];
  $newLogin = $_POST["new-login"];
  $newLogin2 = $_POST["new-login2"];

  if($login == $infosMembre['Login'] && $newLogin == $newLogin2) {
    $query=$bdd->prepare("UPDATE membre
      SET login = :newlogin
      WHERE NumMembre LIKE {$_SESSION['NumMembre']}");
      $query->bindValue(':newlogin', $newLogin, PDO::PARAM_STR);

      $query->execute();
      echo "<script type='text/javascript'>window.location.href = 'profil_admin.php';</script>";
    }
    else {
      $error = "Login incorrect ou confirmation du login différent du nouveau login";
      echo $error;
    }
  } ?>
</main>






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
