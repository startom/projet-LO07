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

        jaje
        c bon t insri xd
        <?php
        
        $mysqli = new mysqli('localhost', 'utilisateur', 'utilisateur', 'mydb');
				if ($mysqli->connect_errno)
				{
			 		echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
					exit;
				}
                                
                                if(isset($_POST['type']) && $_POST['type']==0)
                                {
                                    $sql='INSERT INTO utilisateur (email,mdp,type) VALUES (\''.$_POST['email'].'\',\''.$_POST['mdp'].'\',\''.'1'.'\')';
                                    $mysqli->query($sql);
                                    $sql='SELECT u.ID FROM utilisateur u WHERE u.email=\''.$_POST['email'].'\'';
                                    if (!$result = $mysqli->query($sql))
                                    {
                                        echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                        exit;
                                    }
                                    $get_info = $result->fetch_row();
                                    $sql='INSERT INTO nounou (nom,prenom,telephone,ville,experience,idU) VALUES (\''.$_POST['nom'].'\',\''.$_POST['prenom'].'\',\''.$_POST['telephone'].'\',\''.$_POST['ville'].'\',\''.$_POST['experience'].'\',\''.$get_info[0].'\')';
                                    $mysqli->query($sql);
                                }
                                else if(isset($_POST['type']) && $_POST['type']==1)
                                {
                                    
                                }
                                
                                $mysqli->close();
                                ?>

        <footer>

        </footer>
    </body>
</html>