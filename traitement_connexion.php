<?php session_start(); ?>

<html>
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>

        </header>

        

        <?php
        
        $mysqli = new mysqli('localhost', 'utilisateur', 'utilisateur', 'mydb');
            if ($mysqli->connect_errno)
            {
                    echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
                    exit;
            }
            
            $sql='SELECT u.ID FROM utilisateur u WHERE u.email=\''.$_POST['email'].'\' and u.mdp=\''.$_POST['mdp'].'\'';
            if (!$result = $mysqli->query($sql))
            {
                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                exit;
            }

            
            if(!$get_info = $result->fetch_row())
            {
                echo "<br/>";
                echo 'Email ou mot de passe incorrect';
                echo "<br/>";
            }
            else
            {
                $_SESSION['email']=$_POST['email'];
                echo '<div class="texte"><br/>Vous êtes maintenant connécté(e)</div>';
            }
                                
                                
        ?>

        <?php include("nav.php"); ?>
        
        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>