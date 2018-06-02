<?php session_start(); ?>

<html>
    <head>
        <title>Bienvenue sur [nom du site]</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="js.js"></script>
    </head>
    <body>
        <header>

        </header>

        <?php include("nav.php"); ?>

        <h1>Bienvenue sur [nom du site]!</h1>
        <div class="home">
            <h3>
                Rechercher une nounou proche de chez vous :
            </h3>
            <div class="recherche">
                <form method="post" action="recherche_traitement.php">
                  <input type="text" placeholder="Entrez votre ville ..." name="recherche">
                  <input type="submit" value="Rechercher">
                </form>
            </div>

        </div>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>