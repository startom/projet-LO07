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
            $mysqli->query($sql);
            
            if (!$result = $mysqli->query($sql))
            {
                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                exit;
            }
            
            if(!$get_info = $result->fetch_row())
            {
                echo 'Email ou mot de passe incorrect';
            }
            else
            {
                $_SESSION['email']=$_POST['email'];
            }
                                
                                
        ?>

        <?php include("nav.php"); ?>
        
        <footer>

        </footer>
    </body>
</html>