<html lang ="fr">

<head>
    <title>CONNEXION PING</title>
    <link rel="stylesheet" href="connexion.css"/>
    <meta charset="UTF-84" />
</head>
<body >
<div class="banner">
    <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
    <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
    <div class="banner-content">
        <h1>Bienvenue au centre de connexion du Club PING</h1><br/>
    </div>

    <div id="text">


        <h2 >CONNEXION</h2>


    </div>
    <div id = text2>
        <form method="post" action="validation_connexion.php">

            <h2> VEUILLEZ ENTRER VOTRE IDENTIFIANT : </h2><br/>
            <label for="Id"></label>
            <input type="text" id="Id" name="Id" placeholder="email@domain.com" required="required" /><br /><br />

            <h2> VEUILLEZ ENTRER VOTRE MOT DE PASSE : </h2><br/>
            <label for="mdp"></label>
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required="required" />
            <br /><br />

            <h2> VOUS ETES ADMINISATRATEUR, VEUILLEZ ENTRER VOTRE CODE : </h2>
            <label for="admin"> CODE ADMINISATRATEUR : </label>
            <input type="password" id="admin" name="admin" value="<?php echo NULL; ?>"/>


            <br /><br /><br />
            <input type="submit" value="Connexion" />
            <br /><br /><br />


        </form>
        <h3 align="CENTER"> VOUS N'AVEZ PAS DE COMPTE ? INSCRIVEZ-VOUS !</h3>
        <h4 ALIGN="CENTER">
            <a href="inscription.php">Inscription</a>
        </h4>
    </div>

</div>




<h3 align="CENTER"> VOUS N'AVEZ PAS DE COMPTE ? INSCRIVEZ-VOUS !</h3>
<h4 ALIGN="CENTER">
    <a href="inscription.php">Inscription</a>
</h4>
</body>

</html>