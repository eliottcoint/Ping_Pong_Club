<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
$req->execute([$_SESSION['Id'], $_SESSION['mdp']]);
$id_user = $req->fetch();


$req = $bdd->prepare("Select * From utilisateur where id_utilisateur=?");
$req->execute([$id_user[0]]);
$info_user=$req->fetch();




?>
<html lang="fr">
<head>
    <title>Mon espace</title>
    <link rel="stylesheet" href="try1.css"/>
    <meta charset="UTF-84" />
</head>
<body>
Nom <?php echo $info_user[2];?><br/>
Prenom<?php echo $info_user[1];?><br/>
Email<?php echo $info_user[3];?><br/>
Mot de passe<?php echo $info_user[4];?><br/>

<form method="post" action="modification_information.php">
    <br/><br/><br/><br/>
    <FONT size="5pt">
        <label>
        VOULEZ ETRE UN
        <select name="rang">
            <option value="adh">ADHERANT</option>
            <option value="non_adh">NON ADHERANT</option>
        </select>
        AU CLUB PING.
        </label>
        <br/><br/>
        <label for="birth_date">VOTRE DATE DE NAISSANCE : </label>
        <input type="date" id="birth_date" name="birth_date"   max="<?= date('Y-m-d'); ?>" min="1921-10-08"><br/>
        <br/>

        <label for="avatar">VOTRE PHOTO : </label>
        <input type="file" id="avatar" name="avatar"   ><br/>
        <br/>


        <label for="coach">Etes vous un coach ? </label><br/>
        <input type="radio" id="coach" name="coach" > Oui<br/>
        <input type="radio" id="coach" name="coach"> Non<br/>
        <br/>
        <label for="inf_coach">SI OUI VOTRE FICHIER ATTESTANT QUE VOUS ETES COACH PROFESSIONNEL : </label>
        <input type="file" id="inf_coach" name="inf_coach"  >
        <br/><br/>

        <label for="num">AINSI QUE VOTRE NUMERO DE LICENCE : </label>
        <input type="number" id="num" name="num"  >
        <br/><br/>


        <label for="arbitre">Etes vous un arbitre ? </label><br/>
        <input type="radio" id="arbitre" name="arbitre" > Oui<br/>
        <input type="radio" id="arbitre" name="arbitre" > Non<br/>
        <br/>
        <label for="inf_arbitre">SI OUI VOTRE FICHIER ATTESTANT QUE VOUS ETES ARBITRE PROFESSIONNEL : </label>
        <input type="file" id="inf_arbitre" name="inf_arbitre"  >
        <br/><br/>

        <label for="num_licence">AINSI QUE VOTRE NUMERO DE LICENCE : </label>
        <input type="number" id="num_licence" name="num_licence"  >
        <br/><br/>

        <label for="nom">NOM : </label>
        <input type="text" id="nom" name="nom"  /><br /><br />

        <label for="prenom">PRENOM : </label>
        <input type="text" id="prenom" name="prenom"  /><br /><br/>

        <label for="email">EMAIL : </label>
        <input type="text" id="email" name="email" placeholder="email@domain.com"  /><br /><br />

        <label for="mdp">MOT DE PASSE : </label>
        <input type="password" id="mdp" name="mdp"   /><br /><br />


</form>
</body>
</html>
/*
<label for="cb">AJOUTER UNE CARTE BANCAIRE POUR POUVOIR RESERVER : </label>
<input type="text" id="cb" name="cb" placeholder="1234 5678 9012 3456" ><br/>

<label for="date">DATE D'EXPIRATION (mm/yy) : </label>
<input type="number" id="date" name="month" min="1" max="12">
<input type="number" id="date" name="year" min="21" max="99"><br/>

<label for="titulaire">TITULAIRE DE LA CARTE : </label>
<input type="text" id="titulaire" name="titulaire"  placeholder="M. DUPONT"><br/>

<label for="code_cvc">CODE SECRET </label>
<input type="number" id="code_cvc" name="code_cvc"  placeholder="123" min="000" max="999" ><br/><br/>
<input type="submit" value="Modifier mes infos" name="modification_information.php"/>
*/