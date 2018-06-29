<?php session_start(); ?>

<html>
    <head>
        <title>Profil</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="js.js"></script>
    </head>
    <body>
        <header>

        </header>

        <?php include("nav.php"); ?>

        <?php
            
            if(isset($_SESSION['email'])){
                $mysqli = new mysqli('localhost', 'utilisateur', 'utilisateur', 'mydb');
                if ($mysqli->connect_errno)
                {
                        echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
                        exit;
                }
            }
            else {
                $mysqli = new mysqli('localhost', 'visiteur', 'visiteur', 'mydb');
                if ($mysqli->connect_errno)
                {
                        echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
                        exit;
                }
            }

            $sql='SELECT * FROM nounou n WHERE n.idNounou =\''.$_POST['idNounou'].'\'';
            if (!$result = $mysqli->query($sql))
            {
                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                exit;
            }
            $get_info_nounou = $result->fetch_row();

            $sql='SELECT * FROM pratiquelangue l WHERE l.idN = \''.$_POST['idNounou'].'\'';
            if (!$result = $mysqli->query($sql))
            {
                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                exit;
            }

            ?>

            <h2>Profil de <?php echo $get_info_nounou[7] . " " . $get_info_nounou[6]; ?></h2>
            <div class='texte_background'>
                    <h4>Age: </h4> <?php echo $get_info_nounou[10]; ?>

                    <h4>Ville: </h4> <?php echo $get_info_nounou[4]; ?>

                    <h4>Experience: </h4> <?php echo $get_info_nounou[5]; ?>

                    <h4>Langues pratiquées: </h4> 
                    <?php
                        $get_info_langue = $result->fetch_row();
                        while(isset($get_info_langue[1])){
                            echo '-'.$get_info_langue[1].'<br/>';
                            $get_info_langue = $result->fetch_row();
                        }
                    ?>
            </div>

            <form method='post' action='visualiser_dispo.php'>
                <input type='hidden' value=<?php echo $_POST['idNounou'] ?> name='idNounou'> 
                <input class='bout_dispo' type='submit' value='Voir les disponibilités'>
            </form>





        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>