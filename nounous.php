<?php session_start(); ?>

<html>
    <head>
        <title>Bienvenue sur [nom du site]</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body id="body" style="overflow:hidden;">
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
            
            $sql='SELECT * FROM `nounou` ORDER BY `nounou`.`note` DESC';
            $mysqli->query($sql);
            
            if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                
                for ($i = 0; $i <= 2; $i++) {
                    $get_info = $result->fetch_row();
                    $nounou[$i]=$get_info[0];
                    echo 'id nounou'.$i.' = '.$nounou[$i].'<br/>';
                }
                                
        $mysqli->close();                        
        ?>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>