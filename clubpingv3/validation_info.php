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

$birth_date= $_POST["birth_date"];
$avatar= $_POST["avatar"];
$email=$_POST["email"];
$mdp=$_POST["mdp"];

//Connect to the database and execute the request
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req1 = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
$req1->execute([$email, $mdp]);
$donnees = $req1->fetch();

if($donnees[0] != NULL){
    $req = $bdd->prepare("INSERT INTO adh(id_adh, birth_date , photo_avatar) VALUE (?,?,?);");
    $req->execute([$donnees[0],$birth_date, $avatar]);
    header("Location: arbitre.php");
}else{
    header("Location: info_adh.php");
}

?>

</body>
</html>