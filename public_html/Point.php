<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet">
  <title>Points de vente</title>
  <!-- Bootstrap core CSS -->
  <!--link rel="stylesheet" href="./css/bootstrap/4.2.1/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="Point.css" />
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

    <h1>Points de vente</h1>

  </section>


  <div class="container marketing">
    <?php
    $reponse = $bdd->query("SELECT * FROM pdv");
    while ($donnees = $reponse->fetch()) { ?>
    <div class="container">
      <a name="Saint-Lazare"></a>
      <h2 class="mb-5"><?php echo $donnees['NomPDV'] ?></h2>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td>Adresse:</td>
            <td><?php echo $donnees['Adresse'] ?></td>
          </tr>
          <tr>
            <td>Tel</td>
            <td><?php echo $donnees['Telephone'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  <?php } ?>


    <?php include 'footer.php'; ?>
  </main>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
