<?php session_start(); ?>

<html>
    <head>
        <title>Bienvenue sur Nutrix</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="js.js"></script>
    </head>
    <body>
        <header>

        </header>

        <?php include("nav.php"); ?>

        <h1>Bienvenue sur Nutrix!</h1>
        <div class="home">
            <h3>
                Rechercher une nounou proche de chez vous :
            </h3>
            <div class="recherche">
                <form method="post" action="traitement_recherche.php">
                  <input type="text" placeholder="Entrez votre ville ..." name="ville">
                  <div id="date">
				<label for="date">Date : </label><input type="date" name="date" id="date" placeholder="Date" />
                    </div>
                  <input type="submit" value="Rechercher">
                </form>
                <h3>
                Ou rechercher une nounou par langue :
                </h3>
                <form method="post" action="traitement_recherche_langue.php">
                    <input type="text" placeholder="Entrez une langue ..." name="langue">
                    <div id="date">
                <label for="date">Date : </label><input type="date" name="date" id="date" placeholder="Date" />
                    </div>
                    <input type="submit" value="Rechercher">
                </form>
            </div>

        </div>

        <form method='post' action='profil_nounou.php'>
            <input type='hidden' value='19' name='idNounou'>
            <input type="submit" value="Profil nounou">
        </form>
        

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>