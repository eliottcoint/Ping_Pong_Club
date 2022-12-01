<?php session_start();
?>

<html lang="fr">
<head>
    <title>Sauvegarde réservation</title>
    <link rel="stylesheet" href="validation.css"/>
    <meta charset="UTF-84" />
</head>

<body>

<div id="text">

    <h2>Sauvegarde en cours...</h2><br /><br />
    <h2>VEUILLEZ PATIENTER...</h2>

    <br /><br />
</div>

<?php
$coach= $_POST["coa"];
$arbitre = $_POST["arb"];
$date_resa=$_POST["date"];
$num_terrain=$_POST["num_terrain"];
$raquet=$_POST["raquette"];
$balle=$_POST["balle"];
$table=$_POST["table"];
$duree=$_POST["duree"];
$type=$_POST["player"];

//Connect to the database
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
$req->execute([$_SESSION['Id'], $_SESSION['mdp']]);
$id_user = $req->fetch();


$req1=$bdd->query("INSERT into reservation(id_utilisateur) value ('$id_user[0]')");

$req2=$bdd->query("UPDATE reservation INNER JOIN raquette on reservation.id_raquette=raquette.id_raquette SET reservation.id_raquette=3 where id_utilisateur=$id_user[0]");

$req3 = $bdd->prepare("UPDATE reservation SET date_reservation=(?) where id_utilisateur=('$id_user[0]')");
$req3->execute([$date_resa]);

$req4 = $bdd->prepare("Select id_balle from balle where id_balle=?;");
$req4->execute([$balle]);
$id_balle=$req4->fetch();
$req5 = $bdd->prepare("UPDATE reservation SET id_balle = (?) where id_utilisateur=('$id_user[0]')");
$req5->execute([$id_balle[0]]);

if ($_POST['coa'] = "oui"){
    $req6=$bdd->query("Select id_coach from coach order by rand() limit 1");
    $id_coach=$req6->fetch();
    $req7 = $bdd->prepare("UPDATE reservation SET num_licence_coach = ? where id_utilisateur=('$id_user[0]')");
    $req7->execute([$id_coach[0]]);
}else{
    $req8 = $bdd->query("UPDATE reservation SET num_licence_coach = 'NULL' where id_utilisateur=('$id_user[0]')");
}

if ($_POST['arb'] = "oui"){
    $req9=$bdd->query("Select num_licence from arbitre order by rand() limit 1");
    $id_arb=$req9->fetch();
    $req10 = $bdd->prepare("UPDATE reservation SET num_licence_arbitre = ? where id_utilisateur=$id_user[0]");
    $req10->execute([$id_arb[0]]);
}else{
    $req11=$bdd->query("INSERT into reservation(num_licence_coach) value (NULL)");
}

$req12 = $bdd->prepare("Select id_table from table_ping where id_table=?");
$req12->execute([$table]);
$id_table=$req12->fetch();

$req13 = $bdd->prepare("UPDATE reservation SET id_table = (?) where id_utilisateur='$id_user[0]'");
$req13->execute([$id_table[0]]);


$req14 = $bdd->prepare("Select id_terrain from terrain where id_terrain=?");
$req14->execute([$num_terrain]);
$id_terrain=$req14->fetch();

$req15 = $bdd->prepare("UPDATE reservation SET id_terrain = (?) where id_utilisateur='$id_user[0]'");
$req15->execute([$id_terrain[0]]);

$req16 = $bdd->prepare("UPDATE reservation SET type = (?) where id_utilisateur='$id_user[0]'");
$req16->execute([$type]);
header("location:reservation.php");
?>

</body>
</html>