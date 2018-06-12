<?php session_start(); ?>

<html>
    <head>
        <title>Enregistrer un enfant</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="js.js"></script>
    </head>
    <body>
        <header>

        </header>

        <?php include("nav.php"); ?>

        <h2>Enregistrer votre enfant</h2>

        <form method="post" action="traitement_enfant.php">
          <input type="text" placeholder="Prenom" name="prenom">
          <input type="number" placeholder="Age" name="age">
          <input type="text" placeholder="Informations complémentaires" name="infos">
          <input type="submit" value="Valider">
        </form>


        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>