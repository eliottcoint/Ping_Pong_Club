<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
$req->execute([$_SESSION['Id'], $_SESSION['mdp']]);
$id_user = $req->fetch();

$oui_non=$_POST["rang"];

if ($oui_non == "adh"){
    $req = $bdd->prepare("INSERT INTO adh(id_adh) VALUE (?) ;");
    $req->execute([$id_user[0]]);}

$birth_date= $_POST["birth_date"];
$avatar= $_POST["avatar"];
$blob = $_POST["inf_coach"];
$num_licence=$_POST["num"];
$blob1 = $_POST["inf_arbitre"];
$num_licence1=$_POST["num_licence"];
$arb=$_POST["arbitre"];
$coa=$_POST["coach"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$email=$_POST["email"];
$mdp=$_POST["mdp"];
$num_carte = $_POST["cb"];
$code_cvc = $_POST["code_cvc"];
$mois = $_POST["month"];
$annee = $_POST["year"];
$nom_titulaire = $_POST["titulaire"];


if ($birth_date!= NULL){
    $req = $bdd->prepare("UPDATE adh SET birth_date=? WHERE id_adh=$id_user[0]");
    $req->execute([$birth_date]);
}
if ($avatar!= NULL){
    $req = $bdd->prepare("UPDATE adh SET photo_avatar=? WHERE id_adh=?");
    $req->execute([$avatar,$id_user[0]]);
}
if ($arb == "arbitre"){
    $req1 = $bdd->prepare("SELECT code_adh FROM adh INNER JOIN utilisateur ON id_adh = (SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?)");
    $req1->execute([$_SESSION[0], $_SESSION[1]]);
    $donneesarb = $req1->fetch();

    $req = $bdd->prepare("INSERT INTO arbitre(id_arbitre) VALUE (?) ");
    $req->execute([$donneesarb[0]]);
}
if ($coa == "coach"){
    $req1 = $bdd->prepare("SELECT code_adh FROM adh INNER JOIN utilisateur ON id_adh = (SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?)");
    $req1->execute([$_SESSION[0], $_SESSION[1]]);
    $donneescoa = $req1->fetch();

    $req = $bdd->prepare("INSERT INTO coach(id_coach) VALUE (?) ");
    $req->execute([$donneescoa[0]]);
}
if($blob!=NULL){
    $req = $bdd->prepare("UPDATE coach SET formation=? WHERE id_coach=?");
    $req->execute([$blob,$donneescoa[0]]);
}

if($blob1!=NULL){
    $req = $bdd->prepare("UPDATE arbitre SET formation=? WHERE id_arbitre=?");
    $req->execute([$blob1,$donneesarb[0]]);
}

if($num_licence!=NULL){
    $req = $bdd->prepare("UPDATE coach SET num_licence=? WHERE id_coach=?");
    $req->execute([$num_licence[0],$donneescoa[0]]);
}

if($num_licence1!=NULL){
    $req = $bdd->prepare("UPDATE arbitre SET num_licence=? WHERE id_arbitre=?");
    $req->execute([$num_licence1,$donneesarb[0]]);
}

if ($nom!=NULL){
    $req = $bdd->prepare("UPDATE utilisateur SET utilisateur_last_name=? WHERE id_utilisateur=?");
    $req->execute([$nom,$id_user[0]]);
}
if ($prenom!=NULL){
    $req = $bdd->prepare("UPDATE utilisateur SET utilisateur_first_name=? WHERE id_utilisateur=?");
    $req->execute([$prenom,$id_user[0]]);
}
if ($email!=NULL){
    $req = $bdd->prepare("UPDATE utilisateur SET utilisateur_email=? WHERE id_utilisateur=?");
    $req->execute([$email,$id_user[0]]);
}

if ($mdp!=NULL){
    $req = $bdd->prepare("UPDATE utilisateur SET utilisateur_mdp=? WHERE id_utilisateur=?");
    $req->execute([$mdp,$id_user[0]]);
}

?>
<html lang="fr">
<head>
    <title>Mon espace</title>
    <link rel="stylesheet" href="try1.css"/>
    <meta charset="UTF-84" />
</head>
<body>
<h1>Modifications effectuées</h1>
<a href="monespace.php"><h2>Revenir a mon espace</h2></a>
</body>

</html>
