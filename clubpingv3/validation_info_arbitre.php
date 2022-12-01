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

$blob = $_POST["inf_arbitre"];
$num_licence=$_POST["num_licence"];
$email=$_POST["email"];
$mdp=$_POST["mdp"];

//Connect to the database and execute the request
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req1 = $bdd->prepare("SELECT code_adh FROM adh INNER JOIN utilisateur ON id_adh = (SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?)");
$req1->execute([$email, $mdp]);
$donnees = $req1->fetch();

if($donnees[0] != NULL){
    $req = $bdd->prepare("INSERT INTO arbitre(id_arbitre, num_licence, formation) VALUES (?,?,?);");
    $req->execute([$donnees[0], $num_licence, $blob]);
    header("Location: coach.php");
}else{
    header("Location: info_arbitre.php");
}

?>

</body>
</html>