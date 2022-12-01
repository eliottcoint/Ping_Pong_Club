<?php
session_start();

$date=$_POST["date_tri"];
?>
<html lang="fr">
<head>
    <title>Terrain disponible</title>
    <link rel="stylesheet" href="try1.css"/>
    <meta charset="UTF-84" />
</head>
<body>
<h1>Liste des terrains disponible le <?php echo $date; ?> </h1>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req=$bdd->prepare("Select * from terrain Where etat=1 AND date_reservation!=?");
$req->execute([$date]);
$tri=$req->fetch();

for($i=0;$i<4;$i++) {
    for ($j = 0; $j <4; $j++) {
        echo '   /   ';
        echo $tri[$j];

    } echo '<br/>';
}
?>
<form method="post" action="monespace.php">
    <label>
        <input type="submit" name="btn" id="btn" value="RETOUR">
    </label>
</form><br/><br/>
</body>
</html>

