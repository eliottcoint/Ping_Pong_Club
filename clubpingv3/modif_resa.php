<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$delete=$_POST["annul"];
$coach= $_POST["coa"];
$arbitre = $_POST["arb"];
$date_resa=$_POST["date"];
$num_terrain=$_POST["num_terrain"];
$raquet=$_POST["raquette"];
$balle=$_POST["balle"];
$table=$_POST["table"];
$duree=$_POST["duree"];
$type=$_POST["player"];
$modif=$_POST["modif"];

if ($delete!=NULL){
    $req=$bdd->prepare("DELETE FROM reservation WHERE reservation.id_reservation=(?)");
    $req->execute([$delete[0]]);
    header("location:monespace.php");
}

if ($coach = "oui") {
    $req = $bdd->query("Select num_licence from coach order by rand() limit 1");
    $id_coach = $req->fetch();
    $req = $bdd->prepare("UPDATE reservation SET num_licence_coach=? where id_reservation=?");
    $req->execute([$id_coach[0],$modif[0]]);
}

if ($coach = "non") {
    $req = $bdd->query("UPDATE reservation SET num_licence_coach=NULL where id_reservation=$modif;");
}

if ($arbitre = "oui") {
    $req = $bdd->query("Select num_licence from arbitre order by rand() limit 1");
    $id_arbitre = $req->fetch();
    $req = $bdd->prepare("UPDATE reservation SET num_licence_arbitre=? where id_reservation=?");
    $req->execute([$id_arbitre[0],$modif[0]]);
}

if ($arbitre = "non") {
    $req = $bdd->query("UPDATE reservation SET num_licence_arbitre=NULL where id_reservation=$modif;");
}

if ($date_resa!=NULL){
$req=$bdd-> prepare("UPDATE reservation SET date_reservation=? where id_reservation=?");
$req->execute([$date_resa[0],$modif[0]]);
}

if ($num_terrain!=NULL){
    $req=$bdd->prepare("Select id_terrain from terrain where num_terrain=?");
    $req->execute([$num_terrain[0]]);
    $id_terrain=$req->fetch();

    $req=$bdd-> prepare("UPDATE reservation SET id_terrain=? where id_reservation=?");
$req->execute([$id_terrain[0],$modif[0]]);
}

if($raquet!=NULL){
    $req=$bdd-> prepare("UPDATE reservation SET id_raquette=? where id_reservation=?");
    $req->execute([$raquet[0],$modif[0]]);
}

if($balle!=NULL){
    $req=$bdd-> prepare("UPDATE reservation SET id_balle=? where id_reservation=?");
    $req->execute([$balle[0],$modif[0]]);
}

if($table!=NULL){
    $req=$bdd-> prepare("UPDATE reservation SET id_table=? where id_reservation=?");
    $req->execute([$table[0],$modif[0]]);
}

header("location:mesreservations.php");