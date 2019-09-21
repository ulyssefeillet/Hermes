<?php include 'header.php'; ?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet & Gabriel Levshin">
  <?php $bdd = new PDO('mysql:host=localhost;dbname=id9820388_bd_site_hermes;charset=utf8', 'id9820388_admin', '1fxt61sA'); ?>
  <?php $livre = $_POST['numLivre']; ?>
  <?php $reponse = $bdd->query("SELECT * FROM livre WHERE IdLivre = $livre"); ?>
  <?php $donnees = $reponse->fetch() ?>
  <title><?php echo $donnees['NomLivre'] ?></title>
  <!-- Bootstrap core CSS -->
  <!--link rel="stylesheet" href="./css/bootstrap/4.2.1/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="un_livre.css" />
  <link rel="stylesheet" href="Commun.css" />

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
  <!-- Include SmartCart -->
  <script src="panier/dist/js/jquery.smartCart.min.js" type="text/javascript"></script>
  <!-- Initialize -->
  <script type="text/javascript">
  $(document).ready(function(){
    // Initialize Smart Cart
    $('#smartcart').smartCart({
      submitSettings: {
        submitType: 'paypal' // form, paypal, ajax
      },
      toolbarSettings: {
        checkoutButtonStyle: 'paypal' // default, paypal, image
      }
    });
  });
  </script>

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


<?php $livre = $_POST['numLivre']; ?>
<?php $reponse = $bdd->query("SELECT * FROM livre WHERE IdLivre = $livre"); ?>
<?php $donnees = $reponse->fetch() ?>

<body>


  <section class="banner">

    <h1>  </h1>

  </section>

  <section>

    <div class="container classe">
      <div class="row">
        <div class="col">
          <div class="livre">
            <h2> <?php echo $donnees['NomLivre'] ?>  </h2>

            <img class="couverture" src="admin/Images_livre/image<?php echo $donnees['IdLivre']?>.png" onclick="javascript:viewImage()" alt="<?php echo $donnees['NomLivre'] ?>" class="img-thumbnail"/>

          </div>
          <div class="apercu"> <a title="Cliquez pour voir l'image" href="images/ouvrage.jpg"> Aperçu </a></div>
        </div>

        <div class="col">
          <div class="right">
            <span class="corps">
              <span class="sc-product-item">


                <ul>

                  <li>
                    <div class="prix"> <b> Prix de l'article (pièce):  </b><span class="Prix" data-name="product_price"><?php echo $donnees['Prix'] ?>€ </span> </div>

                  </li>
                  <div class="form-group2">
                    <b> Quantité: </b>          <input class="sc-cart-item-qty" name="product_quantity" min="1" value="1" type="number">
                  </div>
                </br>
                <li>

                  <?php if ($donnees['NumFormat'] == 2) {?>
                    <span class="form-group col-md-10">
                      <a href="admin/Fichiers_livre/fichier<?php echo $donnees['IdLivre']?>.pdf" class="button btn btn-primary" download>
                        Téléchargement </a>
                      </span>
                    <?php }
                    else if ($donnees['NumFormat'] == 3) {?>
                      <span class="form-group col-md-10">
                        <a href="admin/Fichiers_livre/fichier5.mp3" class="button btn btn-primary" download>
                          Téléchargement </a>
                        </span>
                      <?php } ?>
                      <?php $nom=$donnees['NomLivre'] ?>
                      <input name="product_name" value="<?php echo $nom ?>" type="hidden"/>

                      <?php $prix=$donnees['Prix'] ?>
                      <input name="product_price" value="<?php echo $prix ?>" type="hidden"/>


                      <?php $num=$donnees['IdLivre'] ?>
                      <input name="product_id" value="<?php $num ?>" type="hidden" />


                      <span class="form-group col-md-10">
                        <button class="sc-add-to-cart btn btn-success btn-sm pull-right" type="submit">Ajouter au panier</button>
                      </span>

                    </li>
                    <li>

                    </li>

                    <li>
                    </span>
                  </br>
                </br>
                <div class="description">
                  <h3>Description:</h3>
                  <p><?php echo $donnees['DescriptionLivre'] ?></p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </section>
  <aside class="col-md-4">
    <!-- Paypal Submit URL : https://www.paypal.com/cgi-bin/webscr -->
    <!-- Paypal Sandbox Submit URL: https://www.sandbox.paypal.com/cgi-bin/webscr -->

    <!-- Paypal Cart submit form -->
    <form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
      <!-- SmartCart element -->
      <div id="smartcart"></div>

      <!-- Paypal required info, Please update based on your details -->
      <input name="business" value="hermes.edition@gmail.com" type="hidden">
      <input name="currency_code" value="EUR" type="hidden">
      <input name="return" value="https://hermes-edition.000webhostapp.com/catalogue.php" type="hidden">
      <input name="cancel_return" value="https://hermes-edition.000webhostapp.com/" type="hidden">

      <input name="cmd" value="_cart" type="hidden">
      <input name="upload" value="1" type="hidden">
    </form>
  </aside>

</div>

<br></br>

<section>
  <div class="infoSup">
    <p>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Plus d'informations
      </button>

    </p>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        <div class="bloc">
          <form>
            <div class="form-group row">
              <label for="email"><br>Nom :</label>
              <input type="text" readonly class="form-control" value="<?php echo $donnees['NomLivre'] ?>">
            </div>

            <div class="form-group row">
              <label for="email">Année de production :</label>
              <input type="text" readonly class="form-control" value="<?php echo $donnees['DateProd'] ?>">
            </div>

            <?php $maison = $bdd->query("SELECT NomMaison FROM maisonedition WHERE NumMaison LIKE {$donnees['NumMaison']}") -> fetch()?>
            <div class="form-group row">
              <label for="email">Editions :</label>
              <input type="text" readonly class="form-control" value="<?php echo $maison['NomMaison'] ?>">
            </div>

            <div class="form-group row">
              <label for="email">Quantité :</label>
              <input type="text" readonly class="form-control" value="<?php echo $donnees['Quantite'] ?>">
            </div>

            <?php $auteur = $bdd->query("SELECT NomAuteur, PrenomAuteur FROM auteur WHERE NumAuteur LIKE {$donnees['NumAuteur']}") -> fetch()?>
            <div class="form-group row">
              <label for="email">Auteur :</label>
              <input type="text" readonly class="form-control" value="<?php echo $auteur['NomAuteur'], " ", $auteur['PrenomAuteur'] ?>">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<br></br>

<section>
  <div class="blocRecom">
    <h3> Vous aimerez aussi : </h3>
    <?php

    for ($x = 1; $x <= 4; $x++) {
      $numLivres = $bdd->query("SELECT IdLivre, NomLivre FROM livre ORDER BY RAND()") ;
      $livre = $numLivres -> fetch();
      ?>
      <div class="recommandation">
        <a href=description.php> <img class="couvertureRec" src="admin/Images_livre/image<?php echo $livre["IdLivre"] ?>.png" alt="<?php echo $livre["NomLivre"] ?>"/> </a>
        <form method="POST" action="Description.php">
          <br><br>
          <button type="submit" name="numLivre" value="<?php echo $livre['IdLivre'] ?>"><?php echo $livre["NomLivre"] ?></button>
          <br><br>
        </form>
      </div>
      <?php
    }
    ?>
  </div>
</section>

</body>

<?php include 'footer.php'; ?>

</html>
