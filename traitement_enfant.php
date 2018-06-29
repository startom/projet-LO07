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
        
        $mysqli = new mysqli('localhost', 'utilisateur', 'utilisateur', 'mydb');
            if ($mysqli->connect_errno)
            {
                    echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
                    exit;
            }

            $sql='SELECT u.ID FROM utilisateur u WHERE u.email=\''.$_SESSION['email'].'\'';
            if (!$result = $mysqli->query($sql))
            {
                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                exit;
            }
            $get_info_idU = $result->fetch_row();
            
            $sql='SELECT p.idParent FROM parent p WHERE p.idU=\''.$get_info_idU[0].'\'';
            if (!$result = $mysqli->query($sql))
            {
                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                exit;
            }

            $get_info_idP = $result->fetch_row();

            $sql='SELECT p.nom FROM parent p WHERE p.idU=\''.$get_info_idU[0].'\'';
            if (!$result = $mysqli->query($sql))
            {
                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                exit;
            }

            $get_info_nom = $result->fetch_row();

            $sql = 'INSERT INTO enfants (nom,prenom,age,infos,idParent) VALUES (\''.$get_info_nom[0].'\',\''.$_POST['prenom'].'\',\''.$_POST['age'].'\',\''.$_POST['infos'].'\',\''.$get_info_idP[0].'\')';
            $mysqli->query($sql);

            echo '<div class="texte"><h2>Enregistrement terminé</h2><br/><p>Votre enfant a bien été enregistré</p></div>';

            ?>




        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>