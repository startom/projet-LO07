<nav>   
    <a class="banniere"><img class="logo" src="./logo.png"></a>
    <a class="bouton" href="home.php">Accueil</a>
	<a class="bouton" href="nounous.php">Nounous</a>
	<a class="bouton" href="services.php">Services</a>
	<div class="marge"></div>
	<?php if(!isset($_SESSION['email'])) { ?>
		<a class="bouton" href="inscription.php">Inscription</a>
                <a class="bouton" href="connexion.php">Connexion</a>
	<?php } else { ?>
		<a class="bouton" href="compte.php">Mon Compte</a>
                <a class="bouton" href="deconnexion.php">Deconnexion</a>
	<?php } ?>
                
</nav>
