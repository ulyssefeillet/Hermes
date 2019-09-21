<!--FOOTER -->


<footer>
  <div class="container">

    <div class="row">

      <div class="col-md-3 menu" aria-labelledby="Actualités">
        <h1 id="activities">Réseaux sociaux</h1>
        <ul>
          <li class="mt-3">      Retrouvez-nous sur Facebook:
          </li>
          <li class="social-bar mt-2">

            <a href="https://www.facebook.com/Ithaque-Marquet-401370493541550"
            target="_blank" aria-label="Notre page Facebook">
            <img src="69407.png" alt="Notre page Facebook" width="35" height="35">
          </a>

        </li>
      </ul>
    </div>

    <div class="col-md-3 menu" aria-labelledby="Catalogue">
      <h1 id="donations">Catalogue</h1>
      <ul>
        <li><a href="catalogue.php">Livres papiers</a></li>
        <li><a href="catalogue.php">E-Books</a></li>
        <li><a href="catalogue.php">Livres audio</a></li>
      </ul>
    </div>

    <div class="col-md-3 menu" aria-labelledby="Point de vente">
      <h1 id="projects">Points de vente</h1>
      <ul>
        <li><a href="Point.php#Saint-Lazare">Saint-Lazare</a></li>
        <li><a href="Point.php#Forum_des_Halles">Forum des Halles</a></li>
      </ul>
    </div>

    <div class="col-md-3 menu" aria-labelledby="endowment-fund">
      <h1 id="endowment-fund">Contacts</h1>
      <ul>
        <li><a href="contact.php">Nous contacter</a></li>

      </ul>
      <div> <a href="tel:+33-6-95-19-92-62">06 95 19 92 62</a> </div>
    </div>
  </div>
  <nav aria-label="Raccourcis pied de page">
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="plan.php">Plan du site</a></li>
      <li><a href="mentions_legales.php">Mentions légales</a></li>
      <li>
        <?php if (!isset($_SESSION["loggedin"])) {
          echo '<a href="connexion.php"';
        }
        else if ($_SESSION['Statut'] == 0) {
          echo '<a href="index.php"';
        }
        else
        echo '<a href="admin/profil_admin.php"';
        ?>
        title="connexion">Webmaster</a>
      </li>
    </ul>
  </nav>
</div>
</footer>
