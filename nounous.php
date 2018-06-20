<?php session_start(); ?>

<html>
    <head>
        <title>Bienvenue sur [nom du site]</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

  <?php include("footer.php"); ?>
             <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
