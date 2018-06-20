<nav class="blue">
  <div class="nav-wrapper">
    <a href="home.php" class="brand-logo center">WeNounou</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if(!isset($_SESSION['email'])) { ?>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>
      <?php } else { ?>
        <li><a href="compte.php">Mon Compte</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    <?php } ?>
    </ul>

    <ul id="nav-mobile" class="left hide-on-med-and-down">
      <li><a href="nounous.php">Nounous</a></li>
      <li><a href="services.php">Services</a></li>
  </div>

</nav>
