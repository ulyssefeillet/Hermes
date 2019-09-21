<?php include 'header.php'; ?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet">
  <title>Nous contacter</title>
  <!-- Bootstrap core CSS -->
  <!--link rel="stylesheet" href="./css/bootstrap/4.2.1/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="CréerCompte.css" />
  <link rel="stylesheet" href="Commun.css" />

</head>
<body>


  <section class="banner">

    <h1>Contact</h1>

  </section>



  <body class="bg-light">

    <div class="container bloc">

    </br>
  </br>
  <h4 class="mb-3">Envoyer un message</h4>
  <form action="addmessage.php" method="POST">

    <div class="row">

      <div class="form-group col-md-4">
        <label for="address">Nom</label>
        <input type="text" name="nom" class="form-control"  required>

      </div>

      <div class="form-group col-md-4 col-md-offset-1">
        <label for="address">Prénom</label>
        <input type="text" class="form-control" id="address"  required>

      </div>


      <div class="form-group col-md-4">
        <label for="username">Nom d'utilisateur</label>
        <div class="input-group">

          <input type="text" class="form-control" id="username">

        </div>
      </div>


      <div class="form-group col-md-8">
        <label for="email">Adresse email </label>
        <input type="email" class="form-control" id="email">
        <div class="invalid-feedback">
          Veuillez entrer une adresse e-mail valide
        </div>
      </div>


      <div class="form-group col-md-12">

        <label for="_input_text">Message</label>
        <textarea  name="contenu" cols="40" rows="5" class="form-control" required></textarea>
      </div>

      <div class="form-group col-md-4">
        <button class="btn btn-info" type="submit" value="Envoyer">Envoyer</button>
      </div>


    </div>
  </div>
</form>


<?php include 'footer.php'; ?>

</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
