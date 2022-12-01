<?php
session_start();
?>
<html lang="fr">
<head>
    <title>Terrain disponible</title>
    <link rel="stylesheet" href="try1.css"/>
    <meta charset="UTF-84" />
</head>
<body>
<h1>Terrain disponible</h1>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req=$bdd->prepare("Select * from terrain Where etat=?");
$req->execute([1]);
$terrain=$req->fetch();

for($i=0;$i<4;$i++) {
    for ($j = 0; $j <4; $j++) {
        echo '   /   ';
        echo $terrain[$j];

    } echo '<br/>';
}
?>

<h1>Trier par date</h1>
<form method="post">
    <label for="date_tri">
        <input type="date" id="date_tri" name="date_tri">
    </label>
</form>

<a href="reservation.php">Reserver un créneau</a><br/>
<a href="monespace.php">Revenir sur mon espace</a><br/>
<form method="post" action="tri_terrain.php">
    <label>
        <input type="submit" name="btn" id="btn" value="TRIER">
    </label>
</form><br/><br/>
</body>
</html>
