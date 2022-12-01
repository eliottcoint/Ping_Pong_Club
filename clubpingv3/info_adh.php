<?php

session_start()

?>

<html lang="fr">
<head>
    <title>INFORMATIONS ADHERENT</title>
    <link rel="stylesheet" href="inscription.css"/>
    <meta charset="UTF-84" />
</head>

<body >
<div class="banner">
    <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
    <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
    <div class="banner-content">
        <h1 >INFORMATIONS ADHERENT</h1>
    </div>

    <div id="text">


        <h2 >Veuillez entrer toutes les informations demandés ci-dessous.</h2>

        <br /><br />
    </div>
    <div id = text2>
        <form method="post" action="validation_info.php">

            <br/>
            <p>IL NOUS FAUT VOS IDENTIFIANTS POUR POUVOIR VALIDER VOS CHANGEMENTS : </p><br />
            <label for="email"></label>
            <input type="text" id="email" name="email"  placeholder="email@domain.com" required="required"><br/>
            <br/>
            <label for="mdp"></label><br />
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required="required" ><br/>
            <br/><br/><br/>

            <label for="birth_date">VOTRE DATE DE NAISSANCE : </label><br /><br /><br />
            <input type="date" id="birth_date" name="birth_date"  required="required" max="<?= date('Y-m-d'); ?>" min="1921-10-08"><br/>
            <br/><br />

            <label for="avatar">VOTRE PHOTO : </label><br /><br /><br />
            <input type="file" id="avatar" name="avatar"  required="required" ><br/>
            <br/><br />

            <input type="submit" value="VALIDER" name="validation_info.php"/>

        </form>
    </div>

</div>


</body>
</html>
