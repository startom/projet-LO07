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

        <h2 class="titre">Inscription sur [nom du site]</h2><br/>
        
        <div class="cadre">
            <p>
                <label>
                    Quel type de compte souhaitez-vous créer?
                </label><br/><br/>
                <a href="inscription_parent.php" class="bouton2">Compte Parent</a>
                <a href="inscription_nounou.php" class="bouton2">Compte Nounou</a>
            </p>
        </div>

        <footer>

        </footer>
    </body>
</html>