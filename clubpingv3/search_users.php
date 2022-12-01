<html lang="fr">
<head>
    <title>Users</title>
    <link rel="stylesheet" href="validation.css"/>
    <meta charset="UTF-84" />
</head>

<body >
<div id="text">


    <h2 >LISTE DES UTILISATEURS :</h2><br /><br />


    <?php

    $bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

    $sort=$_POST["sort_users"];

    $req = $bdd->prepare("SELECT COUNT(id_utilisateur) FROM utilisateur");
    $req->execute();
    $donnees = $req->fetch();

    $req1 = $bdd->prepare("SELECT id_utilisateur, utilisateur_first_name, utilisateur_last_name, utilisateur_email, utilisateur_admin FROM utilisateur WHERE id_utilisateur=?");

    $req2 = $bdd->prepare("SELECT COUNT(reservation.id_reservation) FROM reservation INNER JOIN joueur ON reservation.id_reservation = joueur.id_reservation INNER JOIN utilisateur ON joueur.id_utilisateur = utilisateur.id_utilisateur WHERE utilisateur.id_utilisateur=?");

    $req3 = $bdd->prepare("SELECT utilisateur.id_utilisateur, utilisateur_first_name, utilisateur_last_name, utilisateur_email, utilisateur_admin FROM utilisateur WHERE id_utilisateur=? ORDER BY (SELECT COUNT(reservation.id_reservation) FROM reservation INNER JOIN joueur ON reservation.id_reservation = joueur.id_reservation INNER JOIN utilisateur ON joueur.id_utilisateur = utilisateur.id_utilisateur WHERE utilisateur.id_utilisateur=?)");

    $req4 = $bdd->prepare("SELECT utilisateur_first_name, utilisateur_last_name, utilisateur_email FROM utilisateur INNER JOIN adh ON utilisateur.id_utilisateur = adh.id_adh  WHERE adh.id_adh IS NOT NULL AND id_utilisateur=? ORDER BY utilisateur_last_name");

    for ($i=1; $i<$donnees[0]+1; $i++ ) {

        if ($sort == "sort_users"){

            $req1->execute([$i]);
            $donnees1 = $req1->fetch();

            for ($j = 0; $j < 5; $j++) {
                echo $donnees1[$j];
                echo ' / ';
            }
            $req2->execute([$i]);
            $donnees2 = $req2->fetch();
            echo 'Nb reservations : ';
            echo $donnees2[0];
            echo '<br/>';

        }else if ($sort == "sort_users1"){

            $req3->execute([$i, $i]);
            $donnees3 = $req3->fetch();

            for ($j = 0; $j < 5; $j++) {
                echo $donnees3[$j];
                echo ' / ';
            }
            $req2->execute([$i]);
            $donnees2 = $req2->fetch();
            echo 'Nb reservation : ';
            echo $donnees2[0];
            echo '<br/>';

        }else if ($sort == "sort_users2") {

            $req4->execute([$i]);
            $donnees4 = $req4->fetch();

            for ($j = 0; $j < 3; $j++) {
                echo $donnees4[$j];
                echo ' / ';
            }
            echo '<br/>';
        }else{
            header("location: validation_search_adh.php");
        }
    }

    ?>

    <br/><br/>

    <form method="post" action="monespace.php">
        <label>
            <input type="submit" name="btn" id="btn" value="RETOUR">
        </label>
    </form><br/><br/>
</div>

<br/>




</body>
</html>