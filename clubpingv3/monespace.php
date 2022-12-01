<?php

session_start()

?>

<html lang="fr">
<head>
    <title>Mon espace</title>
    <link rel="stylesheet" href="inscription.css"/>
    <meta charset="UTF-84" />
</head>

<body >

<div class="banner">
    <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
    <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
    <div class="banner-content">
        <h1 >MON ESPACE PING</h1>
    </div>
    <?php

    $bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

    $req = $bdd->prepare("SELECT utilisateur_first_name, utilisateur_last_name FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
    $req->execute([$_SESSION['Id'], $_SESSION['mdp']]);
    $donnees = $req->fetch();



    $req1 = $bdd->prepare("SELECT id_coach FROM coach INNER JOIN adh ON coach.id_coach = adh.code_adh INNER JOIN utilisateur ON adh.id_adh = utilisateur.id_utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
    $req1->execute([$_SESSION['Id'], $_SESSION['mdp']]);
    $donnees1 = $req1->fetch();

    ?>
    <div id="text">


        <h2 >Veuillez entrer toutes les informations demandés ci-dessous.</h2>

        <br /><br />
    </div>
    <div id = text2>

        <br /><br />
        <a href="mes_infos.php">Modifier mes informations</a><br/><br />
        <a href="reservation.php">Reserver un créneau</a><br/><br />
        <a href="show_adh.php">Liste des adhérents</a><br/><br />
        <a href="terrain_dispo.php">Consulter les terrains disponibles </a><br/><br/>
        <a href="mesreservations.php">Mes reservations</a><br/><br/>
        <br/><br/><br/>
        <?php
        if($_SESSION['admin'] != NULL){
            echo '<a href="show_utilisateurs.php">Liste de tous les utilisateurs</a><br/><br/>';
        }
        if($donnees1 != NULL){
            echo '<a href="championnat.php">Créer un championnat</a><br/>';
        }
        ?>

        <form method="post" action="logout.php">
            <label><br /><br />
                <input type="submit" name="btn" id="btn" value="Déconnexion">
            </label>
        </form>

    </div>
    <div id=text4>
        <?php
        echo 'PRENOM : ';echo $donnees[0];
        echo '<br />' ;
        echo 'NOM : ';echo $donnees[1];
        echo '<br />' ;
        echo 'ID : ';echo $_SESSION['Id'];

        if($_SESSION['admin'] != NULL){
            echo '<br />' ;
            echo 'CODE ADMIN : ';echo $_SESSION['admin'];
        }
        echo '<br />' ;
        ?>
    </div>

</div>


</body>
</html>