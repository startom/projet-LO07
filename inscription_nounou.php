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

        <h2 class="titre">Inscription nounou sur [nom du site]</h2><br/>
        <form class="signup_nounou" method="post" action="traitement_inscription.php">
            <div>
                <fieldset>
                    <legend> Identifiants </legend>
                <p>
                <input id="lnom" type="text" name="nom" placeholder="Nom" required="true">
                </p>
                
                <p>
                <input id="lprenom" type="text" name="prenom" placeholder="Prenom" required="true">
                </p>
                
                <p>
                <input id="lemail" type="email" name="email" placeholder="Adresse email" required="true">
                </p>
                
                <p>
                <input id="lage" type="number" name="age" placeholder="Age" required="true">
                </p>
                
                <p>
                <input id="ltelephone" type="text" name="telephone" placeholder="Téléphone" required="true">
                </p>
                
                <p>
                <input id="lmdp" type="password" name="mdp" placeholder="Mot de passe" required="true">
                </p>
                
                
                </fieldset>
                <fieldset>
                    <legend>Informations complémentaires</legend>
                    <p>
                        <input id="lville" type="text" name="ville" placeholder="Ville" required="true">
                        
                    </p>
                    <p class="langues">
                        <label>Langues parlées</label><br>
                        <input type="checkbox" name="francais" checked="checked"/>Français<br />
                        <input type="checkbox" name="anglais"/>Anglais<br />
                        <input type="checkbox" name="chinois"/>Chinois<br />
                        <input type="checkbox" name="espagnol"/>Espagnol<br />
                        <input type="checkbox" name="allemand"/>Allemand<br />
                        <input type="checkbox" name="arabe"/>Arabe<br />
                        <input id="autre_langue" type="text" name="autrelangue" placeholder="Autre langue parlée">
                    </p>
                    
                    <p>
                        <textarea name="experience" id="experience" rows="3" cols="35" placeholder="Experience personelle (255 caractères max)"></textarea>
                    </p>
                    
                    <input type='hidden' value='0' name='type'>
                    
                    <p>
                    <input type="submit" value="Envoyer"/>
                    <input type="reset" value="Effacer"/>
                    </p>
                    
                    
                </fieldset>
            </div>
        </form>

        <footer>

        </footer>
    </body>
</html>