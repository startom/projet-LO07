<?php 
	session_start();
	$_SESSION = array();
	session_destroy(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
                <script type="text/javascript" src="js.js"></script>
	</head>
	<body>
		<header>
			
		</header>

		<?php include("nav.php"); ?>

                    <h1>
                            Deconnexion
                    </h1>

		
		<section class="texte">
			Vous êtes désormais deconnecté
		</section>

                <div>Redirection vers la page d'acceuil dans <span id="time">3</span> secondes...</div><br/>
            

		<footer>

		</footer>
	</body>
</html>