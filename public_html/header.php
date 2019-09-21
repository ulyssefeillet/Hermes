<?php session_start() ?>

<!DOCTYPE html>

<html>
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

        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="a_propos.php">A Propos</a>
        </li>

      </ul>
    </div>

    <?php

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false)
    {
      ?>
      <form class="form-inline mt-2 mt-md-0 mr-2 connexion">
        <a class="btn btn-outline-warning my-2 my-sm-0" href="connexion.php" role="button">Connexion </a>
      </form>
      <form class="form-inline mt-2 mt-md-0 mr-4 connexion">
        <a class="btn btn-outline-warning my-2 my-sm-0" href="Inscription.php" role="button">Inscription </a>
      </form>
      <?php
    }
    else {
      ?>

      <form method="POST" class="form-inline mt-2 mt-md-0 mr-3 connexion" action="">
        <br><br>
        <a href="EspaceClient.php">
          <img id="logo" src="images/logo_client.png" class="mr-2" width="50" height="45" alt="client"/>
        </a>
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="deconnexion" value="deconnexion">Deconnexion</button>
        <br><br>
      </form>

      <!-- Crée une form là pour envoyer vers espaceclient.php -->

      <?php
    }
    ?>

    <?php
    if (isset($_POST['deconnexion'])) {
      $_SESSION = array();
      session_destroy();
      header("location: index.php");
    }
    ?>


    <div class="Panier">
      <a href=achat.php>
        <img id="logo3" src="panier2.png" width="60" height="55" alt="logo3"/>
      </a>
    </div>

    <form class="form-inline mt-2 mt-md-0 search" method="post" action="catalogue.php">
      <input class="form-control mr-sm-2" type="text" name="livre" placeholder="Rechercher..." aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Recherche</button>
    </form>


  </nav>
</header>
