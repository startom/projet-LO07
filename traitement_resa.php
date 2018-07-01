<?php session_start(); ?>

<html>
    <head>
        <title>Reserver</title>
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

        $precedent=$_POST["h0"];
        $tablal=array();
        $tablal[0][0]=0;
        $tablal[0][1]=0;
        $k=1;
        for($i=0;$i<24;$i++){
            if($_POST["h$i"]!=$precedent){
                $tablal[$k]=array();
                $tmp=$i-1;
                $tablal[$k][0] = $_POST["h$i"];
                $tablal[$k][1] = $i;
                $tablal[$k-1][2] = $i;
                $k++;
                $precedent = $_POST["h$i"];
            }
        }
        $tablal[count($tablal)-1][2]=24;

        $days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
        $num_jour=array_search(date("l", strtotime($_POST['date'])),$days)+1;
        //echo $num_jour;
        $num_semaine=date("Y", strtotime($_POST['date']));
        $num_semaine .= "-W";
        $num_semaine.=date("W", strtotime($_POST['date']));

        for($i=0;$i<count($tablal);$i++){
            if($tablal[$i][0]){
                $sql='INSERT INTO reservation (idParent, idNounou, d_deb, d_fin) VALUES (\''.$_POST['idParent'].'\',\''.$tablal[$i][0].'\',\''.$num_semaine.'\',\''.$num_semaine.'\')';
                $mysqli->query($sql);
            }
        }
        $sql = "SELECT r.idReservation FROM reservation r ORDER BY r.idReservation DESC";
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                

        for($i=count($tablal)-1;$i>=0;$i--){
            if($tablal[$i][0]){
                $get_info_idResa = $result->fetch_row();
                $sql='INSERT INTO jour_r (idResa,jour,h_deb,h_fin) VALUES (\''.$get_info_idResa[0].'\',\''.$num_jour.'\',\''.$tablal[$i][1].'\',\''.$tablal[$i][2].'\')';
                $mysqli->query($sql);

                $j=0;
                while(isset($_POST["eh$j"])){
                    if($_POST["e$j"]){
                        $sql='INSERT INTO enfant_resa (idEnfant,idResa) VALUES (\''.$_POST["eh$j"].'\',\''.$get_info_idResa[0].'\')';
                        $mysqli->query($sql);
                    }
                    
                    $j++;
                }

            }
        }

        echo "<h2>Reservation effectuée!</h2>";

        ?>
        

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>