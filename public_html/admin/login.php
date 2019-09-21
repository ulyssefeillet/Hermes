<?php session_start ();
include("config.php");
//echo md5(trim($_POST['password']));


//if(!$_SESSION['admin']) {


if(isset($_POST['submit'])){

  if($password==md5(trim($_POST['password']))){

    if($login==md5(trim($_POST['name']))){

      //$info="Connexion réussie";
      $_SESSION['admin']=$_POST['name'];
      echo "<html> <head> <meta http-equiv='Refresh' content='2; URL=/site_hermes/admin/admin.php'> </head></html>";

    } else {
      //$info="Les données saisies sont incorrectes";

    }




  } else {

    //$info="Les données saisies sont incorrectes";
  }

}





//} else {
// $info="Vous êtes déjà connecté!";
//echo "<html> <head> <meta http-equiv='Refresh' content='2; URL=/site_hermes/accueil.html'> </head></html>";



//}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Webmaster</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="login.css" rel="stylesheet">

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




  <link href="css/style.min.css" rel="stylesheet">




</head>



<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <!-- <h4> <?php echo $info; ?> </h4> -->
      </div>

      <!-- Login Form -->
      <form role="form" method="post" action="">
        <input type="text" class="fadeIn second" name="name" placeholder="Login ou e-mail">
        <input type="password" class="fadeIn third" name="password" placeholder="Mot de passe">
        <input type="submit" name="submit" class="fadeIn fourth" value="Se connecter">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Mot de passe oublié?</a>
      </div>

    </div>
  </div>

</body>
</html>
