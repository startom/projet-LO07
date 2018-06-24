<?php session_start(); ?>

<html>
    <head>
        <title>zegzerf</title>
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
                $get_info_id = $result->fetch_row();
            $sql='SELECT n.idNounou FROM nounou n WHERE n.idU=\''.$get_info_id[0].'\'';
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                $get_info_idN = $result->fetch_row();
                if(isset($_POST['date2'])){
                    
                    $sql='INSERT INTO disponibilite (idNounou, d_deb,d_fin) VALUES (\''.$get_info_idN[0].'\',\''.$_POST['date1'].'\',\''.$_POST['date2'].'\')';
                    $mysqli->query($sql);
                }
                else{
                    $sql='INSERT INTO disponibilite (idNounou, d_deb,d_fin) VALUES (\''.$get_info_idN[0].'\',\''.$_POST['date1'].'\',\''.$_POST['date1'].'\')';
                    $mysqli->query($sql);
                }
                
                $sql = "SELECT d.idDispo FROM disponibilite d ORDER BY d.idDispo DESC";
                if (!$result = $mysqli->query($sql))
                {
                    echo "SELECT error in query " . $sql . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                    exit;
                }
                $get_info_idDispo = $result->fetch_row();
                
                
            
            $plages = intdiv(1440,$_POST['intervalle']);
            echo $plages;
            $h_deb = -1;
            
            for($i=1; $i<=7; $i++){
                for($j=1; $j<=$plages; $j++){
                    if($_POST[$i.'-'.$j] && $h_deb<0){
                        $h_deb=$j-1;
                    }
                    else if($_POST[$i.'-'.$j]==0 && $h_deb>=0){
                        $h_fin = $j-1;
                        $sql='INSERT INTO jour_d (idDispo, jour, h_deb, h_fin) VALUES (\''.$get_info_idDispo[0].'\',\''.$i.'\',\''.$h_deb.'\',\''.$h_fin.'\')';
                        $mysqli->query($sql);
                        $h_deb=-1;
                    }
                }
                if($h_deb>=0){
                    $h_fin=$j-1;
                    $sql='INSERT INTO jour_d (idDispo, jour, h_deb, h_fin) VALUES (\''.$get_info_idDispo[0].'\',\''.$i.'\',\''.$h_deb.'\',\''.$h_fin.'\')';
                    $mysqli->query($sql);
                    $h_deb=-1;
                }
            }
            
            
            ?>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </body>
</html>