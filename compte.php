<?php session_start(); ?>

<html>
    <head>
        <title>Mon compte</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="js.js"></script>
        <script type="text/javascript" src="note.js"></script>
    </head>
    <body>
        <header>

        </header>

        <?php include("nav.php"); ?>

        <?php
        
        $mysqli = new mysqli('localhost', 'administrateur', 'administrateur', 'mydb');
                if ($mysqli->connect_errno)
                {
                        echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
                        exit;
                }
        
        if(isset($_POST['etat']))
        {
            if($_POST['etat'] == 1){
                $sql='UPDATE nounou SET statut=1 WHERE idNounou=\''.$_POST['idNounou'].'\'';
                $mysqli->query($sql);
                echo 'Nounou acceptée!<br/>';
            }
            else if ($_POST['etat'] == -1){
                $sql='SELECT n.idU FROM nounou n WHERE idNounou=\''.$_POST['idNounou'].'\'';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                $get_info_idU = $result->fetch_row();
                $sql='DELETE FROM pratiquelangue WHERE idN=\''.$_POST['idNounou'].'\'';
                $mysqli->query($sql);
                $sql='DELETE FROM nounou WHERE idNounou=\''.$_POST['idNounou'].'\'';
                $mysqli->query($sql);
                $sql='DELETE FROM utilisateur WHERE ID=\''.$get_info_idU[0].'\'';
                $mysqli->query($sql);
                echo 'Nounou refusée <br/>';
            }
        }




        if(isset($_POST['note']))
        {
            $nouv_note=($_POST['moy_notes']*$_POST['nb_notes']+$_POST['note'])/($_POST['nb_notes']+1);
            $nouv_nb_notes = $_POST['nb_notes']+1;

            $sql="UPDATE nounou SET note = $nouv_note, nb_notes = $nouv_nb_notes WHERE idNounou = ".$_POST['idNounou_note'].";";
            $mysqli->query($sql);
            echo $sql;
            echo "<br/>";

            $sql="UPDATE reservation SET statut = 1 WHERE idReservation = ".$_POST['idResa'].";";
            $mysqli->query($sql);
            echo $sql;
        }





        
        
        
            
                
                $sql='SELECT u.type FROM utilisateur u WHERE u.email=\''.$_SESSION['email'].'\'';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                $get_info_type = $result->fetch_row();
                
                $sql='SELECT u.ID FROM utilisateur u WHERE u.email=\''.$_SESSION['email'].'\'';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                $get_info_id = $result->fetch_row();








                
                

                //compte parent
                if ($get_info_type[0] == 0)
                {
                    ?>
                    <h2>Parent</h2>
                    <div class="texte">
                        <?php
                        $sql='SELECT p.idParent FROM parent p WHERE p.idU = \''.$get_info_id[0].'\'';
                        if (!$result = $mysqli->query($sql))
                        {
                            echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                            exit;
                        }
                        $get_info_idParent = $result->fetch_row();
                        
                        $sql='SELECT * FROM enfants e WHERE idParent = \''.$get_info_idParent[0].'\'';
                        if (!$result = $mysqli->query($sql))
                        {
                            echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                            exit;
                        }
                        $get_info_enfants = $result->fetch_row();

                        if(!$get_info_enfants){
                            echo "Vous n'avez pas d'enfants enregistrés <br/><br/>";
                        }
                        else{
                            echo "Enfants enregistrés: <br/>";
                            while($get_info_enfants){
                                echo $get_info_enfants[2]."<br/>";
                                $get_info_enfants = $result->fetch_row();
                            }
                        }

                        ?>
                        <form method="post" action="enregistrer_enfant.php">
                            <input class='bout_dispo' type="submit" value="Enregistrer un enfant">
                        </form>

                        <?php
                        echo "<br/>";
                        $sql='SELECT * FROM reservation r WHERE r.idParent =\''.$get_info_idParent[0].'\'';
                        if (!$result = $mysqli->query($sql))
                        {
                            echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                            exit;
                        }



                        while($get_info_reservation = $result->fetch_row()){
                            $annee = intval(substr($get_info_reservation[4],0,4));
                            $semaine = intval(substr($get_info_reservation[4],6,2));
                            $semaine = ($semaine + 1) % 53;
                            if(!$semaine){
                                $annee++;
                            }
                            $get_info_reservation[4] = $annee . "-W" . sprintf("%02d",$semaine);

                            $sql='SELECT * FROM nounou n WHERE n.idNounou =\''.$get_info_reservation[1].'\'';
                            if (!$result2 = $mysqli->query($sql))
                            {
                                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                exit;
                            }
                            $get_info_nounou_resa = $result2->fetch_row();

                                if($get_info_reservation[5]==0 && strtotime($get_info_reservation[4]) <= time() ){
                                    echo "<form method='post' action='#'><h4>Prestation à valider :</h4>";
                                    echo "<div class=texte> ";
                                    echo "Nounou: ".$get_info_nounou_resa[7]." ".$get_info_nounou_resa[6]."<br/>";
                                    echo "Date: ".$get_info_reservation[3];
                                    echo "<div class='horizontal'>";
                                    echo "<img id='img1' src='couleur.png' onclick='clicked(1)' style='width: 50px; height: 50px;'>";
                                    echo "<img id='img2' src='grey.png' onclick='clicked(2)' style='width: 50px; height: 50px;'>";
                                    echo "<img id='img3' src='grey.png' onclick='clicked(3)' style='width: 50px; height: 50px;'>";
                                    echo "<img id='img4' src='grey.png' onclick='clicked(4)' style='width: 50px; height: 50px;'>";
                                    echo "<img id='img5' src='grey.png' onclick='clicked(5)' style='width: 50px; height: 50px;'>";
                                    echo "</div>";
                                    echo "<input type='hidden' value=".$get_info_nounou_resa[11]." name='nb_notes'>";
                                    echo "<input type='hidden' value=".$get_info_nounou_resa[9]." name='moy_notes'>";
                                    echo "<input type='hidden' value=".$get_info_nounou_resa[0]." name='idNounou_note'>";
                                    echo "<input type='hidden' value=".$get_info_reservation[2]." name='idResa'>";
                                    echo "<input class='bout_dispo' type='submit' value='Valider la prestation'>";
                                    echo "<input type='hidden' value='1' name='note' id='note'> </form>";
                                    echo "</div>";

                                    date("c",strtotime("2018-W05-5"));
                            }
                            echo "<br/>";
                        }
                        

                        
                        
                        ?>
                    </div>
                    <?php
                }






                //compte nounou
                else if ($get_info_type[0] == 1)
                {
                    $sql='SELECT n.statut FROM nounou n WHERE n.idU=\''.$get_info_id[0].'\'';
                    if (!$result = $mysqli->query($sql))
                    {
                        echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                        exit;
                    }
                    $get_info_statut = $result->fetch_row();

                    $sql='SELECT n.idNounou FROM nounou n WHERE n.idU=\''.$get_info_id[0].'\'';
                    if (!$result = $mysqli->query($sql))
                    {
                        echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                        exit;
                    }
                    $get_info_idNounou = $result->fetch_row();

                    if($get_info_statut[0] == 1){
                        echo "<h2>Nounou</h2> <div class='texte_background'> <form action = 'form_dispo.php'><input class='bout_dispo' type='submit' value='Enregistrer vos disponibilités'></form><br/>";

                        echo "<form method='post' action = 'visualiser_dispo.php'> <input type='hidden' value=$get_info_idNounou[0] name='idNounou'> <input class='bout_dispo' type='submit' value='Voir vos disponibilités'> </form> </div>";
                    }
                    else {
                        echo "<h2>Nounou</h2><p>Vous devez attendre que votre candidature soit acceptée pour pouvoir renseigner vos disponibilités.</p>";
                    }
                }






                //compte administrateur
                else if ($get_info_type[0] == 2)
                {
                    ?>
                    <h2>Administrateur</h2>
                    <div class="texte_colonnes">
                        <div class="colonne">
                            <h3>Statistiques du site:</h3>
                            <?php
                            $sql='SELECT * FROM nb_candidatures';
                            if (!$result = $mysqli->query($sql))
                            {
                                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                exit;
                            }
                            $get_info = $result->fetch_row();
                            echo 'Nombre de candidatures: '.$get_info[0].'<br/>';
                            
                            $sql='SELECT * FROM nounous_inscrites';
                            if (!$result = $mysqli->query($sql))
                            {
                                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                exit;
                            }
                            $get_info = $result->fetch_row();
                            echo 'Nombre de nounous inscrites: '.$get_info[0].'<br/>';
                            
                            ?>
                            
                        </div>
                        <div class="colonne">
                            <h3>Candidatures à traiter:</h3>
                            <?php
                            $sql='SELECT * FROM nb_candidatures';
                            if (!$result = $mysqli->query($sql))
                            {
                                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                exit;
                            }
                            $get_info = $result->fetch_row();
                            
                            $sql='SELECT * FROM nounou WHERE statut = 0';
                            if (!$result2 = $mysqli->query($sql))
                            {
                                echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                exit;
                            }
                            
                            
                            for ($i = 0; $i < $get_info[0]; $i++){
                                $get_info2 = $result2->fetch_row();
                                
                                $sql='SELECT * FROM pratiquelangue WHERE idN = \''.$get_info2[0].'\'';
                                if (!$result3 = $mysqli->query($sql))
                                {
                                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                    exit;
                                }
                                
                                echo '<div class="statut_nounou"> <h4>'.$get_info2[7].' '.$get_info2[6].'</h4>';
                                echo $get_info2[10].' ans, habite à '.$get_info2[4].'<br/>';
                                echo 'Langues parlées:<br/>';
                                $j = 0;
                                $get_info3 = $result3->fetch_row();
                                while(isset($get_info3[1])){
                                    echo '-'.$get_info3[1].'<br/>';
                                    $get_info3 = $result3->fetch_row();
                                    $j++;
                                }
                                echo 'Experience: '.$get_info2[5].'</div>';
                                $idNounou_temp = $get_info2[0];
                                ?>
                            <div class="form_affectation">
                            <form method="post" action="#">
                                <input type="hidden" name="idNounou" value='<?php echo $idNounou_temp ?>'>
                                <input type="hidden" name="etat" value="1">
                                <input class="bout_accepter" type="submit" value="Accepter">
                            </form>
                            <form method="post" action="#">
                                <input type="hidden" name="idNounou" value='<?php echo $idNounou_temp ?>'>
                                <input type="hidden" name="etat" value="-1">
                                <input class="bout_refuser" type="submit" value="Refuser">
                            </form>
                            </div>
                            <?php
                            }
                            
                            ?>
                            
                        </div>
                    </div>
        
                    <?php
                }
        
        $mysqli->close();        
        ?>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>