<html lang="fr">
<head>
    <title>VERIFICATION PING</title>
    <link rel="stylesheet" href="validation.css"/>
    <meta charset="UTF-84" />
</head>
<body>

<div id="text">


    <h2>EN ATTENTE DE VERIFICATION...</h2><br /><br />
    <h2>VEUILLEZ PATIENTER...</h2>

    <br /><br />
</div>

<?php

$Id = $_POST["Id"];
$mdp = $_POST["mdp"];
//echo $mdp;
$admin = $_POST["admin"];

$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
$req->execute([$Id, $mdp]);
$donnees = $req->fetch();

if($donnees != NULL){

    $req1 = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_admin=?");
    $req1->execute([$admin]);
    $donnees1 = $req1->fetch();

    ini_set('session.use_only_cookies', "1");
    ini_set("url_rewriter.tags", "");
    session_start();
    $_SESSION['Id'] = $Id;
    $_SESSION['mdp'] = $mdp;

    if($donnees1 != NULL) {
        $_SESSION['admin'] = $admin;
        //echo $_SESSION['admin'];
    }else{
        $_SESSION['admin'] = NULL;
    }

    $_SESSION['ConnectOK'] = true; // Statut de connexion à "Ok"

    header("Location: monespace.php");
}else{
    header("Location: connexion.php");
}


?>

</body>
</html>