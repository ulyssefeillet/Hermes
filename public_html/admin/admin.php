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



  <link href="css/style.min.css" rel="stylesheet">

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

  <a href="admin.php" class="list-group-item waves-effect active">
    <i class="fa fa-map mr-3"></i>Admin Panel
  </a>

  <a href="profil_admin.php" class="list-group-item waves-effect">
    <i class="fa fa-user mr-3"></i> Mon Profil
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

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false || $_SESSION['Statut'] == 0)
{
  echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";

}
?>

<div class="card-body  ">
  <h4> Administrateurs </h4>
  <ul class="list-group mb-2 mb-sm-0 pt-1">
    <?php $reponse = $bdd->query("SELECT * FROM membre");
    while ($donnees = $reponse->fetch()) {  ?>
      <li class="list-group-item" id="books_list">
        <span><i class="fas fa-user"></i></span>
        &nbsp &nbsp
        <?php echo $donnees['Nom'], " ", $donnees['Prenom'] ?>
        <div class="buttons-panel">
          <form method="POST">
            <?php if ($donnees['Statut'] == 1) {?>
              <button type="submit" name='Pouvoir' value="<?php echo $donnees['NumMembre']?>" class="btn btn-lg btn-primary btn-sm">Retirer pouvoirs</button>
            <?php }
            else if ($donnees['Statut'] == 0) {?>
              <button type="submit" name='Pouvoir' value="<?php echo $donnees['NumMembre']?>" class="btn btn-lg btn-primary btn-sm">Donner pouvoirs</button>
            <?php } ?>
            <button type="submit" name='Supprimer' value="<?php echo $donnees['NumMembre']?>" class="btn btn-lg btn-secondary btn-sm">Supprimer</button>
          </form>
        </div>
      </li>
    <?php } ?>

  </li>
</ul>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['Supprimer'])){
    $query=$bdd->prepare('DELETE FROM membre WHERE NumMembre = :IdSupprimer');
    $query->bindValue(':IdSupprimer', $_POST['Supprimer'], PDO::PARAM_INT);
    $query->execute();
  }
  else if(isset($_POST['Pouvoir'])){
    $membreMisAJour = $bdd->query("SELECT Statut FROM membre WHERE (NumMembre LIKE {$_POST['Pouvoir']})") -> fetch();
    $query=$bdd->prepare('UPDATE membre
      SET Statut = :NewStatut
      WHERE NumMembre = :IdStatut');
      $query->bindValue(':NewStatut', abs($membreMisAJour['Statut'] - 1), PDO::PARAM_INT);
      $query->bindValue(':IdStatut', $_POST['Pouvoir'], PDO::PARAM_INT);
      $query->execute();

    }
    ?>
    <script type="text/javascript">
    window.location = window.location.href;
    </script>
    <?php
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
