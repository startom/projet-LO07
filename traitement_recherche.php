<?php session_start(); ?>

<html>
    <head>
        <title>Recherche</title>
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
            
             $sql='SELECT n.idNounou FROM nounou n WHERE n.ville=\''.$_POST['ville'].'\'';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                //$get_info_idN = $result->fetch_row();
                $idN="( ";
                while($get_info_idN = $result->fetch_row()){
                    if($idN != "( "){
                        $idN.=" OR ";
                    }
                    $idN .="d.idNounou = " . $get_info_idN[0];
                }
                $idN .= " )";
                
                echo $idN;
            
                $days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
                $num_jour=array_search(date("l", strtotime($_POST['date'])),$days)+1;
                //echo $num_jour;
                $num_semaine=date("Y", strtotime($_POST['date']));
                $num_semaine .= "-W";
                $num_semaine.=date("W", strtotime($_POST['date']));
                echo "<br/>";
                
                
                $sql='SELECT * FROM disponibilite d WHERE '.$idN.'';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                $i=0;
                $idDispo=array();
                $idN2=array();
                while($get_info_idDispo = $result->fetch_row()){
                    
                    $annee = intval(substr($get_info_idDispo[3],0,4));
                    $semaine = intval(substr($get_info_idDispo[3],6,2));
                    $semaine = ($semaine + 1) % 53;
                    if(!$semaine){
                        $annee++;
                    }
                    $get_info_idDispo[3] = $annee . "-W" . sprintf("%02d",$semaine);
                    
                    
                    if(strtotime($get_info_idDispo[2]) <= strtotime($_POST['date']) && strtotime($get_info_idDispo[3]) > strtotime($_POST['date'])){
                        $idDispo[$i] = $get_info_idDispo[1];
                        $idN2[$i] = $get_info_idDispo[0];
                        $i++;
                    }

                }
                
                
                $idDispoString = "( j.idDispo = " . implode(" OR j.idDispo = ", $idDispo) . " ) ";
                echo "<br/>";
                
                $sql='SELECT * FROM jour_d j WHERE '.$idDispoString.' AND j.jour='.$num_jour.' ';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                echo $sql;
                $i=0;
                while($get_info_idJour_d = $result->fetch_row()){
                    $idDispoJour[$i] = $get_info_idJour_d[0];
                    $idJour[$i] = $get_info_idJour_d[1];
                    $h_deb[$i] = $get_info_idJour_d[3];
                    $h_fin[$i] = $get_info_idJour_d[4];
                    $idNounou[$i] = $idN2[array_search($idDispoJour[$i],$idDispo)];
                    echo "<br/>";
                    echo $h_deb[$i];
                    echo "<br/>";
                    echo $h_fin[$i];
                    $i++;
                }
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                $sql='SELECT * FROM reservation d WHERE '.$idN.'';
                echo "<br/>";
                echo $sql;
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                $i=0;
                $idResa=array();
                $idNR=array();
                while($get_info_idResa = $result->fetch_row()){
                    
                    $annee = intval(substr($get_info_idResa[4],0,4));
                    $semaine = intval(substr($get_info_idResa[4],6,2));
                    $semaine = ($semaine + 1) % 53;
                    if(!$semaine){
                        $annee++;
                    }
                    $get_info_idResa[4] = $annee . "-W" . sprintf("%02d",$semaine);
                    echo "<br/>";
                    echo $get_info_idResa[4];
                    echo "<br/>";
                    
                    
                    if(strtotime($get_info_idResa[3]) <= strtotime($_POST['date']) && strtotime($get_info_idResa[4]) > strtotime($_POST['date'])){
                        $idResa[$i] = $get_info_idResa[2];
                        echo $idResa[$i];
                        echo "yolo";
                        $idNR[$i] = $get_info_idResa[1];
                        $i++;
                    }

                }
                
                
                $idResaString = "( j.idResa = " . implode(" OR j.idResa = ", $idResa) . " ) ";
                if($idResaString == "( j.idResa =  ) "){
                    $idResaString = "( j.idResa = -1 ) ";
                }
                echo "<br/>";
                
                $sql='SELECT * FROM jour_r j WHERE '.$idResaString.' AND j.jour='.$num_jour.' ';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                echo "<br/>";
                echo $sql;
                $i=0;
                while($get_info_idJour_r = $result->fetch_row()){
                    $idDispoJour_r[$i] = $get_info_idJour_r[0];
                    $idJour_r[$i] = $get_info_idJour_r[1];
                    $h_deb_r[$i] = $get_info_idJour_r[3];
                    $h_fin_r[$i] = $get_info_idJour_r[4];
                    $idNounou_r[$i] = $idNR[array_search($idDispoJour_r[$i],$idResa)];
                    //echo "<br/>";
                    //echo $h_deb_r[$i];
                    //echo "<br/>";
                    //echo $h_fin_r[$i];
                    $i++;
                }
                
                $h_deb_aff=array();
                $h_fin_aff=array();
                $idNounou_aff=array();
                $k=0;
                
                for($i=0; $i<count($idDispoJour_r); $i++){
                    for($j=0; $j<count($idDispoJour); $j++){
                        if($idNounou_r[$i]==$idNounou[$j]){
                            if($h_deb_r[$i] == $h_deb[$j] && $h_fin_r[$i] == $h_fin[$j]);
                            else if($h_deb_r[$i] == $h_deb[$j] && $h_fin_r[$i] < $h_fin[$j]){
                                $h_deb_aff[$k]=$h_fin_r[$i];
                                $h_fin_aff[$k]=$h_fin[$j];
                                $idNounou_aff=$idNounou[$j];
                                echo "<br/>";
                                echo $h_deb_aff[$k];
                                echo "<br/>";
                                echo $h_fin_aff[$k];
                                $k++;
                                
                            }
                            else if($h_deb_r[$i] > $h_deb[$j] && $h_fin_r[$i] == $h_fin[$j]){
                                $h_deb_aff[$k]=$h_deb[$j];
                                $h_fin_aff[$k]=$h_deb_r[$i];
                                $idNounou_aff=$idNounou[$j];
                                echo "<br/>";
                                echo $h_deb_aff[$k];
                                echo "<br/>";
                                echo $h_fin_aff[$k];
                                $k++;
                            }
                            else if($h_deb_r[$i] > $h_deb[$j] && $h_fin_r[$i] < $h_fin[$j]){
                                $h_deb_aff[$k]=$h_deb[$j];
                                $h_fin_aff[$k]=$h_deb_r[$i];
                                $idNounou_aff=$idNounou[$j];
                                echo "<br/>";
                                echo $h_deb_aff[$k];
                                echo "<br/>";
                                echo $h_fin_aff[$k];
                                $k++;
                                
                                $h_deb_aff[$k]=$h_fin_r[$i];
                                $h_fin_aff[$k]=$h_fin[$j];
                                $idNounou_aff=$idNounou[$j];
                                echo "<br/>";
                                echo $h_deb_aff[$k];
                                echo "<br/>";
                                echo $h_fin_aff[$k];
                                $k++;
                            }
                        }
                    }
                }
                
                
            ?>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>