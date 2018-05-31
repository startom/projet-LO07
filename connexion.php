<?php session_start(); ?>

<html>
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>

        </header>

        <?php include("nav.php"); ?>

        <h2 class="titre">Bienvenue!</h2><br/>
        <form class="signin" method="post" action="traitement_connexion.php">
            <div>
                <legend>Renseignez vos identifiants</legend>
                <p>
                <input id="lemail" type="email" name="email" placeholder="Adresse email" required="true">
                </p>
                
                <p>
                <input id="lmdp" type="password" name="mdp" placeholder="Mot de passe" required="true">
                </p>
                
                <p>
                    <input type="submit" value="Envoyer"/>
                    <input type="reset" value="Effacer"/>
                </p>
            </div>
        </form>

        <footer>

        </footer>
    </body>
</html>