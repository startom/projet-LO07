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

        <?php
        
        $mysqli = new mysqli('localhost', 'utilisateur', 'utilisateur', 'mydb');
				if ($mysqli->connect_errno)
				{
			 		echo 'Erreur de connexion : errno: ' . $mysqli->errno . ' error: ' . $mysqli->error;
					exit;
				}
                                
                                if(isset($_POST['type']) && $_POST['type']==0)
                                {
                                    $sql2='SELECT u.ID FROM utilisateur u WHERE u.email=\''.$_POST['email'].'\'';
                                    if (!$result = $mysqli->query($sql2))
                                    {
                                        echo "SELECT error in query " . $sql2 . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                        exit;
                                    }
                                    
                                    if ($get_info = $result->fetch_row())
                                    {
                                        echo "<p>L'adresse email a deja été utilisée</p><br/>";
                                        $result->free();
                                        goto error;
                                    }
                                    
                                    $sql='INSERT INTO utilisateur (email,mdp,type) VALUES (\''.$_POST['email'].'\',\''.$_POST['mdp'].'\',\''.'1'.'\')';
                                    $mysqli->query($sql);
                                    
                                    $result = $mysqli->query($sql2);
                                    
                                    $get_info = $result->fetch_row();
                                    $sql='INSERT INTO nounou (nom,prenom,telephone,ville,experience,idU,age) VALUES (\''.$_POST['nom'].'\',\''.$_POST['prenom'].'\',\''.$_POST['telephone'].'\',\''.$_POST['ville'].'\',\''.$_POST['experience'].'\',\''.$get_info[0].'\',\''.$_POST['age'].'\')';
                                    $mysqli->query($sql);
                                    
                                    $sql='SELECT n.idNounou FROM nounou n WHERE n.idU = \''.$get_info[0].'\'';
                                    $result = $mysqli->query($sql);
                                    $get_info = $result->fetch_row();
                                    
                                    if (isset($_POST['francais']))
                                    {
                                        $sql='INSERT INTO pratiquelangue (idN, langue) VALUES (\''.$get_info[0].'\',\''.'francais'.'\')';
                                        $mysqli->query($sql);
                                    }
                                    if (isset($_POST['anglais']))
                                    {
                                        $sql='INSERT INTO pratiquelangue (idN, langue) VALUES (\''.$get_info[0].'\',\''.'anglais'.'\')';
                                        $mysqli->query($sql);
                                    }
                                    if (isset($_POST['chinois']))
                                    {
                                        $sql='INSERT INTO pratiquelangue (idN, langue) VALUES (\''.$get_info[0].'\',\''.'chinois'.'\')';
                                        $mysqli->query($sql);
                                    }
                                    if (isset($_POST['espagnol']))
                                    {
                                        $sql='INSERT INTO pratiquelangue (idN, langue) VALUES (\''.$get_info[0].'\',\''.'espagnol'.'\')';
                                        $mysqli->query($sql);
                                    }
                                    if (isset($_POST['allemand']))
                                    {
                                        $sql='INSERT INTO pratiquelangue (idN, langue) VALUES (\''.$get_info[0].'\',\''.'allemand'.'\')';
                                        $mysqli->query($sql);
                                    }
                                    if (isset($_POST['arabe']))
                                    {
                                        $sql='INSERT INTO pratiquelangue (idN, langue) VALUES (\''.$get_info[0].'\',\''.'arabe'.'\')';
                                        $mysqli->query($sql);
                                    }
                                    if (isset($_POST['autre_langue']))
                                    {
                                        $sql='INSERT INTO pratiquelangue (idN, langue) VALUES (\''.$get_info[0].'\',\''.$_POST['autre_langue'].'\')';
                                        $mysqli->query($sql);
                                    }
                                    
                                    
                                    $_SESSION['email']=$_POST['email'];
                                    echo '<div class="texte"><h2>Inscription réussie!</h2><br/><p>Votre candidature a bien été prise en compte, un administrateur la traitera dans les plus brefs délais</p></div>';                           
                                }
                                else if(isset($_POST['type']) && $_POST['type']==1)
                                {
                                    $sql2='SELECT u.ID FROM utilisateur u WHERE u.email=\''.$_POST['email'].'\'';
                                    if (!$result = $mysqli->query($sql2))
                                    {
                                        echo "SELECT error in query " . $sql2 . " errno: " . $mysqli->errno . " error: " . $mysqli->error;
                                        exit;
                                    }
                                    
                                    if ($get_info = $result->fetch_row())
                                    {
                                        echo "<p>L'adresse email a deja été utilisée</p><br/>";
                                        $result->free();
                                        goto error;
                                    }
                                    
                                    $sql='INSERT INTO utilisateur (email,mdp,type) VALUES (\''.$_POST['email'].'\',\''.$_POST['mdp'].'\',\''.'0'.'\')';
                                    $mysqli->query($sql);
                                    
                                    $result = $mysqli->query($sql2);
                                    $get_info = $result->fetch_row();
                                    
                                    $sql='INSERT INTO parent (nom,telephone,idU,mdp) VALUES (\''.$_POST['nom'].'\',\''.$_POST['telephone'].'\',\''.$get_info[0].'\',\''.$_POST['mdp'].'\')';
                                    $mysqli->query($sql);
                                    
                                    $_SESSION['email']=$_POST['email'];
                                    echo '<div class="texte"><h2>Inscription réussie!</h2><br/><p>Votre compte a bien été créé, vous pouvez dès à présent enregistrer vos enfants dans l\'onglet "Mon Compte"</p></div>';
                                }
                                
                                error:;
                                
                                $mysqli->close();
                                ?>

        <footer>

        </footer>
    </body>
</html>