<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");
$req = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=? ");
$req->execute([$_SESSION['Id'], $_SESSION['mdp']]);
$id_user = $req->fetch();
?>

<html lang="fr">
<head>
    <title>Mes reservations</title>
    <link rel="stylesheet" href="try1.css"/>
    <meta charset="UTF-84" />
</head>
<body>

<h1>Mes réservations</h1>
<?php
$req1=$bdd->prepare("Select count(id_reservation) from reservation INNER JOIN utilisateur  on reservation.id_utilisateur = utilisateur.id_utilisateur Where utilisateur.id_utilisateur=(?) ");
$req1->execute([$id_user[0]]);
$nb_resa=$req1->fetch();

$req2=$bdd->prepare("Select * from reservation INNER JOIN utilisateur  on reservation.id_utilisateur = utilisateur.id_utilisateur Where utilisateur.id_utilisateur=(?) ORDER BY date_reservation ASC ");
$req2->execute([$id_user[0]]);
$resa=$req2->fetch();

$req3=$bdd->prepare("Select utilisateur_last_name from utilisateur INNER JOIN adh  on utilisateur.id_utilisateur = adh.id_adh INNER JOIN arbitre on adh.code_adh = arbitre.id_arbitre Where arbitre.num_licence = ? ");

$req4=$bdd->prepare("Select utilisateur_last_name from utilisateur INNER JOIN adh  on utilisateur.id_utilisateur = adh.id_adh INNER JOIN coach on adh.code_adh = coach.id_coach Where coach.num_licence = ? ");


echo 'nombre de reservation: ';
echo $nb_resa[0];
echo '<br/>';


echo "type/user/date/terrain/arbitre/coach/raquette/balle/table/reservation";
echo '<br/>';
for($i=0;$i<$nb_resa[0];$i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($j == 5) {
            $req3->execute([$resa[$j]]);
            $arb_name = $req3->fetch();
            echo $arb_name[0];

        } else if ($j == 6) {
            $req4->execute([$resa[$j]]);
            $coa_name = $req4->fetch();
            echo $coa_name[0];
        } else {
            echo $resa[$j];

        }

        echo '   /   ';
    }
    echo '<br/>';
}
// si on a récupéré un résultat on l'affiche.
?>


<form method="post" action="modif_resa.php">
    <h2>Annuler une reservation</h2>
    <label for="annul"> Entrer le numéro de réservation à supprimer
        <input type="number" name="annul" id="annul">
    </label>
    <input type="submit" value="Supprimer" name="modif_resa.php"/><br /><br />

    <h2>Modifier une reservation</h2>
    <label for="modif"> Entrer le numéro de réservation à modifier
        <input type="number" name="modif" id="modif">
    </label><br /><br />
    <label for="player"></label>
    <select id="player" name="player" >
        <option value="">Nombre de joueur</option>
        <option value="1">2</option>
        <option value="0">4</option>

    </select>
    <br /><br />

    Voulez vous un coach ?<br/>
    <label for="coach">
        <input type="radio" id="coach" name="coa" value="oui" > Oui<br/>
    </label>
    <label for="coach1">
        <input type="radio" id="coach1" name="coa" value="non" > Non<br/>
    </label><br/>

    <input id="prodId" name="prodId" type="hidden" value="xm234jq">



    Voulez vous un arbitre ?<br/>
    <label for="arbitre">
        <input type="radio" id="arbitre" name="arb" value="oui" > Oui<br/>
    </label>
    <label for="coach1">
        <input type="radio" id="arbitre1" name="arb" value="non" > Non<br/>
    </label><br/>

    <label for="date">Selectionner une date :</label>
    <input type="date" id="date" name="date"  /><br /><br/>

    <label for="num_terrain"> Choisir le terrain numéro:</label>
    <input type="number" id="num_terrain" name="num_terrain" min="1" max="10" /><br/><br/>

    <label>
        Choisisser un type de raquette
        <select name="raquette" >
            <option value=""> type de raquette</option>
            <option value="1"> Raquette de Qualité 1 à 2e</option>
            <option value="2">Raquette de Qualité 2 à 3e</option>
            <option value="3">Raquette de Qualité 3 à 5e</option>
            <option value="4">J'utilise mes raquettes</option>
        </select> <br/><br/>
    </label>

    <label>
        Choisisser un type de balle
        <select name="balle" >
            <option value=""> type de balle </option>
            <option value="1"> Débutant à 2e</option>
            <option value="2">Expert à 3e</option>
            <option value="3">J'utilise mes balles</option>
        </select> <br/><br/>
    </label>

    <label>
        Choisisser un type de table
        <select name="table" >
            <option value=""> type de table </option>
            <option value="1"> Débutant à 2e</option>
            <option value="2">Expert à 3e</option>
        </select> <br/><br/>
    </label>

    <label for="duree"> Séléctionner une durée pour la réservation (vous pouvez seulement choisir heure par heure)</label>
    <input type="number" id="duree" name="duree" min="1" max="4" /><br/><br/>

    <input type="submit" value="Modifier" name="modif_resa.php"/>

</form>
<br/><br/>
<form method="post" action="monespace.php">
    <label>
        <input type="submit" name="btn" id="btn" value="RETOUR">
    </label>
</form><br/><br/>

</body>
</html>


