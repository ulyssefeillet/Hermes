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

<?php $bdd = new PDO('mysql:host=localhost;dbname=id9820388_id9820388_bd_site_hermes_hermes;charset=utf8', 'id9820388_admin', '1fxt61sA'); ?>

<body>




  <main role="main">

    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade carousel" data-ride="carousel">
      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view img1">
            <img class="d-block w-100" src="images/img2.png"
            alt="First slide">
            <div class="mask rgba-black-light"></div>
          </div>
          <div class="carousel-caption">
          </div>
        </div>
        <div class="carousel-item">
          <!--Mask color-->
          <div class="view">
            <img class="d-block w-100" src="images/img3.2.png"
            alt="Second slide">
            <div class="mask rgba-black-strong"></div>
          </div>
        </div>
        <div class="carousel-item">
          <!--Mask color-->
          <div class="view">
            <img class="d-block w-100" src="images/img4.2.png"
            alt="Third slide">
            <div class="mask rgba-black-slight"></div>
          </div>
        </div>
      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    <div class="container marketing">

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette un">
        <div class="col-md-7">
          <strong class="d-inline-block mb-2 text-primary">Nouveauté</strong>
          <h2 class="featurette-heading">Vertige du cosmos <span class="text-muted"></h2><br>
            <p class="lead">« (…) dès qu’on se plonge dans le texte (…) on se trouve emporté aussitôt par le talent du conteur, la luminosité du pédagogue, l’honnêteté du sage. »</p>
          </div>
          <div class="col-md-3 img">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/316x500/auto" src="images/iage3.png"  alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->



      <div class="container">

        <div class="row mb-2">
          <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-300">
              <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">Recommandation</strong>
                <h3 class="mb-0">
                  <a class="text-dark" href="#">De la démocratie en Amérique</a>
                </h3>
                <div class="mb-1 text-muted">Alexis de Tocqueville</div>
                <p class="card-text mb-auto">Du voyage en Amérique qu’il effectue au début des années 1830, Tocqueville tire ce qui deviendra, dans la riche littérature politique du XIXe siècle, l’une des œuvres …</p>

              </div>
              <img class="card-img-right flex-auto d-none d-md-block" src="images/iage2.png" alt="Card image cap">
            </div>
          </div>
          <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-300">
              <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-success">Recommandation</strong>
                <h3 class="mb-0">
                  <a class="text-dark" href="un_livre.php">L'offensive des colorants allemands en France</a>
                </h3>
                <div class="mb-1 text-muted">Eglantine Cussac</div>
                <p class="card-text mb-auto">« Il n’en reste pas moins que, de nos jours, les plus importantes usines en France qui produisent elles-mêmes des colorants et qui livrent aux consommateurs, sont uniquement des ramifications allemandes – entreprises néanmoins d’une taille lilliputienne en comparaison des usines allemandes  » ... </p>

              </div>
              <img class="card-img-right flex-auto d-none d-md-block mt-3" src="images/ouvrage.jpg" width="240" height="auto" alt="Card image cap">
            </div>
          </div>
        </div>
      </div>

    </body>

    <hr class="featurette-divider">


    <?php include 'footer.php'; ?>
  </main>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../../../../assets/js/vendor/popper.min.js"></script>
  <script src="../../../../dist/js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="../../../../assets/js/vendor/holder.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->

  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/vendor/holder.min.js"></script>
  <script>
  Holder.addTheme('thumb', {
    bg: '#55595c',
    fg: '#eceeef',
    text: 'Thumbnail'
  });
  </script>

  </html>
