<html lang="fr">
<head>
    <title>Users</title>
    <link rel="stylesheet" href="validation.css"/>
    <meta charset="UTF-84" />
</head>

<body >
<div id="text">


    <h2 >LISTE DES ADHERANTS :</h2><br /><br />

    <?php
    $nom=$_POST["nom"];
    $email=$_POST["email"];

    $bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

    $req = $bdd->prepare("SELECT COUNT(id_utilisateur) FROM utilisateur");
    $req->execute();
    $donnees = $req->fetch();

    $req1 = $bdd->prepare("SELECT utilisateur_first_name, utilisateur_last_name, utilisateur_email FROM utilisateur WHERE id_utilisateur=? AND (utilisateur_last_name=? OR utilisateur_email=?)");


    for ($i=1; $i<$donnees[0]+1; $i++ ) {
        $req1->execute([$i, $nom, $email]);
        $donnees1 = $req1->fetch();

        if($donnees1){
            for ($j = 0; $j < 3; $j++) {
                echo $donnees1[$j];
                echo ' / ';
            }
        }
        echo '<br/>';
    }

    ?>


    <br /><br />
    <form method="post" action="validation_search_adh.php">
        <label>
            <input type="submit" name="btn" id="btn" value="RETOUR">
        </label>
    </form>
</div>

<br/>



</body>
</html>