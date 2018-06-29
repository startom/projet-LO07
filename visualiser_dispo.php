<?php session_start(); ?>

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

        <?php
            echo $_POST['idNounou'];
        ?>

        



        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>