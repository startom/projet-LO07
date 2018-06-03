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

        <?php
            $mysqli = new mysqli('localhost', 'utilisateur', 'utilisateur', 'mydb');
                if ($mysqli->connect_errno)
                {
                        echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
                        exit;
                }
                
                $sql='SELECT u.type FROM utilisateur u WHERE u.email=\''.$_SESSION['email'].'\'';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                
                $get_info = $result->fetch_row();
                
                if ($get_info[0] == 0)
                {
                    ?>
                    
        
                    <?php
                }
                else if ($get_info[0] == 1)
                {
                    ?>
                    
        
                    <?php
                }
                else if ($get_info[0] == 2)
                {
                    ?>
                    <h2>Administrateur</h2>
                    <div class="texte_colonnes">
                        <div class="colonne">
                            <h3>Statistiques du site:</h3>
                        </div>
                        <div class="colonne">
                            <h3>Candidatures à traiter:</h3>
                        </div>
                    </div>
        
                    <?php
                }
                
        ?>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>