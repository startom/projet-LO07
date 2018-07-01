<?php session_start(); ?>

<html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>

        </header>

        <?php include("nav.php"); ?>

        <h2 class="titre">Inscription parent</h2><br/>
        <form class="formulaire" method="post" action="traitement_inscription.php">
            <div>
                <p>
                <label for="lnom">Nom </label>
                <input id="lnom" type="text" name="nom" placeholder="Votre nom" required="true">
                </p>
                
                <p>
                <label for="lemail">Adresse email </label>
                <input id="lemail" type="email" name="email" placeholder="Votre adresse email" required="true">
                </p>
                
                <p>
                <label for="ltelephone">Téléphone </label>
                <input id="ltelephone" type="number" name="telephone" placeholder="Votre numéro de téléphone" required="true">
                </p>
                
                <p>
                <label for="lmdp">Mot de passe </label>
                <input id="lmdp" type="password" name="mdp" placeholder="Votre mot de passe" required="true">
                </p>
                
                <input type='hidden' value='1' name='type'>
                
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