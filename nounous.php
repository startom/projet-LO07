<?php session_start(); ?>

<html>
    <head>
        <title>Services</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <?php include("nav.php"); ?>

       <div class="container center">

        <h2> Services</h2>
        <br/>
        <div class="texte">
            <h3>Garde d'enfant ponctuelle</h3><br/>
            <p>
                Nos nounous proposent des gardes ponctuelles d'enfants suivants leurs disponibilités.<br>
                Pour trouver une nounou, il vous suffit d'entrer votre ville dans la barre de recherche,<br>
                les nounous se trouvant proches de chez vous seront alors indiquées avec leurs disponibilités,<br>
                et vous pourrez consulter leurs profils afin d'en séléctionner une.<br/>
                Le salaire des nounous est de 7 € par heure commencée pour un enfant et avec 4 € supplémentaires<br>
                par heure pour chaque enfant supplémentaire.<br/>
                <br/>
            </p>
            <h3>Garde d'enfant régulière</h3>
            <p>
                Il est aussi possible pour nos nounous de vous proposer des services de garde régulière,<br>
                pour assurer par exemple la sortie d'école de vos enfants. Vous pouver configurer ces options<br>
                au moment de rechercher une nounou.<br/>
                Le salaire des nounous est de 10 € par heure commencée pour un enfant et avec 5 € supplémentaires<br>
                par heure pour chaque enfant supplémentaire<br/>
                <br/>
            </p>
            <h3>Garde d'enfant en langue étrangère</h3>
            <p>
                Certaines de nos nounous proposent aussi une garde pour les enfants plus familiers avec une langue<br>
                étrangère. Pour rechercher une garde dans une langue étrangère, séléctionnez "Langues étrangères"<br>
                sous la barre de recherche de la page d'accueil.<br/>
                Le salaire des nounous est de 15 € par heure commencée et par enfant.<br/>
            </p>

        </div>
      </div>

  <?php include("footer.php") ?>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
