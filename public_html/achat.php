<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ulysse Feillet">
  <title>Mon panier</title>
  <!-- Bootstrap core CSS -->
  <!--link rel="stylesheet" href="./css/bootstrap/4.2.1/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="achat.css" />
  <link rel="stylesheet" href="Commun.css" />


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

</head>
<body>




  <body class="bg-light">

    <aside class="col-md-4">
      <!-- Paypal Submit URL : https://www.paypal.com/cgi-bin/webscr -->
      <!-- Paypal Sandbox Submit URL: https://www.sandbox.paypal.com/cgi-bin/webscr -->

      <!-- Paypal Cart submit form -->
      <form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
        <!-- SmartCart element -->
        <div id="smartcart"></div>

        <!-- Paypal required info, Please update based on your details -->
        <input name="business" value="dipumedayil@gmail.com" type="hidden">
        <input name="currency_code" value="USD" type="hidden">
        <input name="return" value="http://www.yourdomain.com/yoursuccessurl" type="hidden">
        <input name="cancel_return" value="http://www.yourdomain.com/yourcancelurl" type="hidden">

        <input name="cmd" value="_cart" type="hidden">
        <input name="upload" value="1" type="hidden">
      </form>
    </aside>

    <div class="container">

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Votre panier</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Nom du produit</h6>
                <small class="text-muted"> <a href="un_livre.php">Voir l'article</a> </small>
              </div>
              <span class="text-muted">20,99 €</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Frais de transport</h6>
              </div>
              <span class="text-muted">2,99 €</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">- 0 €</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (EUR)</span>
              <strong>23,98 €</strong>
            </li>
          </ul>

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Adresse de facturation</h4>
          <form action="" method="POST">
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="lastName">Nom</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Veuillez saisir votre nom
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">Prénom</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Veuillez saisir votre prénom
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Nom d'utilisateur</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">#</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="mon_login" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Nom d'utilisateur obligatoire
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optionnel)</span></label>
              <input type="email" class="form-control" id="email" placeholder="email@example.com">
              <div class="invalid-feedback">
                Veuillez entrez une adresse e-mail correcte
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Adresse 1</label>
              <input type="text" class="form-control" id="address"  required>
              <div class="invalid-feedback">
                Veuillez entrez votre adresse
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Adresse 2 <span class="text-muted">(Optionnel)</span></label>
              <input type="text" class="form-control" id="address2" >
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Pays</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choisir...</option>
                  <option>France</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Département</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choisir...</option>
                  <option>01 - Ain - Bourg-en-bresse</option><option>02 - Aisne - Laon</option><option>03 - Allier - Moulins</option><option>05 - Hautes-alpes - Gap</option><option>06 - Alpes-maritimes - Nice</option><option>07 - Ardèche - Privas</option><option>  08 - Ardennes - Charleville-mézières</option><option>09 - Ariège - Foix</option><option>10 - Aube - Troyes</option><option>11 - Aude - Carcassonne</option><option>12 - Aveyron - Rodez</option><option>13 - Bouches-du-Rhône - Marseille</option><option>14 - Calvados - Caen</option><option>15 - Cantal - Aurillac</option><option>16 - Charente - Angoulême</option><option>17 - Charente-maritime - La rochelle</option><option>18 - Cher - Bourges</option><option>19 - Corrèze - Tulle</option><option>2A - Corse-du-sud - Ajaccio</option><option>2B - Haute-Corse - Bastia</option><option>21 - Côte-d'Or - Dijon</option><option>22 - Côtes-d'Armor - Saint-brieuc</option><option>23 - Creuse - Guéret</option><option>24 - Dordogne - Périgueux</option><option>25 - Doubs - Besançon</option><option>26 - Drôme - Valence</option><option>27 - Eure - Évreux</option><option>28 - Eure-et-loir - Chartres</option><option>29 - Finistère - Quimper</option><option>30 - Gard - Nîmes</option><option>31 - Haute-garonne - Toulouse</option><option>32 - Gers - Auch</option><option>33 - Gironde - Bordeaux</option><option>34 - Hérault - Montpellier</option><option>35 - Ille-et-vilaine - Rennes</option><option>36 - Indre - Châteauroux</option><option>37 - Indre-et-loire - Tours</option><option>38 - Isère - Grenoble</option><option>39 - Jura - Lons-le-saunier</option><option>40 - Landes - Mont-de-marsan</option><option>41 - Loir-et-cher - Blois</option><option>42 - Loire - Saint-étienne</option><option>43 - Haute-loire - Le puy-en-velay</option><option>44 - Loire-atlantique - Nantes</option><option>45 - Loiret - Orléans</option><option>46 - Lot - Cahors</option><option>47 - Lot-et-garonne - Agen</option><option>48 - Lozère - Mende</option><option>49 - Maine-et-loire - Angers</option><option>50 - Manche - Saint-lô</option><option>51 - Marne - Châlons-en-champagne</option><option>52 - Haute-marne - Chaumont</option><option>53 - Mayenne - Laval</option><option>54 - Meurthe-et-moselle - Nancy</option><option>55 - Meuse - Bar-le-duc</option><option>56 - Morbihan - Vannes</option><option>57 - Moselle - Metz</option><option>58 - Nièvre - Nevers</option><option>59 - Nord - Lille</option><option>60 - Oise - Beauvais</option><option>61 - Orne - Alençon</option><option>62 - Pas-de-calais - Arras</option><option>63 - Puy-de-dôme - Clermont-ferrand</option><option>64 - Pyrénées-atlantiques - Pau</option><option>65 - Hautes-Pyrénées - Tarbes</option><option>66 - Pyrénées-orientales - Perpignan</option><option>67 - Bas-rhin - Strasbourg</option><option>68 - Haut-rhin - Colmar</option><option>69 - Rhône - Lyon</option><option>70 - Haute-saône - Vesoul</option><option>71 - Saône-et-loire - Mâcon</option><option>72 - Sarthe - Le mans</option><option>73 - Savoie - Chambéry</option><option>74 - Haute-savoie - Annecy</option><option>75 - Paris - Paris</option><option>76 - Seine-maritime - Rouen</option><option>77 - Seine-et-marne - Melun</option><option>78 - Yvelines - Versailles</option><option>79 - Deux-sèvres - Niort</option><option>80 - Somme - Amiens</option><option>81 - Tarn - Albi</option><option>82 - Tarn-et-Garonne - Montauban</option><option>83 - Var - Toulon</option><option>84 - Vaucluse - Avignon</option><option>85 - Vendée - La roche-sur-yon</option><option>86 - Vienne - Poitiers</option><option>87 - Haute-vienne - Limoges</option><option>88 - Vosges - Épinal</option><option>89 - Yonne - Auxerre</option><option>90 - Territoire de belfort - Belfort</option><option>91 - Essonne - Évry</option><option>92 - Hauts-de-seine - Nanterre</option><option>93 - Seine-Saint-Denis - Bobigny</option><option>94 - Val-de-marne - Créteil</option><option>95 - Val-d'Oise - Cergy Pontoise</option>
                </select>

              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Code postal</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>

              </div>
            </div>


            <hr class="mb-4">

            <h4 class="mb-3">Moyen de paiement</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Carte de crédit</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Lydia</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nom sur la carte</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Nom complet</small>
                <div class="invalid-feedback">
                  Champ obligatoire
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Numéro carte de crédit</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Champ obligatoire
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Date d'expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Champ obligatoire
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Champ obligatoire
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Valider le paiement</button>
          </form>
        </div>
      </div>
    </div>


  </body>

  <?php include 'footer.php'; ?>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
