<html lang="fr">
<head>
    <title>INFORMATIONS COACH</title>
    <link rel="stylesheet" href="inscription.css"/>
    <meta charset="UTF-84" />
</head>
<body>

<div class="banner">
    <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
    <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
    <div class="banner-content">
        <h1 >INFORMATIONS COACH PING</h1>
    </div>

    <div id="text">


        <h2 >Veuillez entrer toutes les informations demandés ci-dessous.</h2>

        <br /><br />
    </div>
    <div id = text2>
        <form method="post" action="validation_info_coach.php">

            <br/>
            <p>IL NOUS FAUT VOS IDENTIFIANTS POUR POUVOIR VALIDER VOS CHANGEMENTS : </p><br/>
            <label for="email"></label>
            <input type="text" id="email" name="email"  placeholder="email@domain.com" required="required"><br/><br/>
            <br/>
            <label for="mdp"></label>
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" required="required" ><br/>
            <br/><br/><br/><br/>

            <label for="inf_coach">VOTRE FICHIER ATTESTANT QUE VOUS ETES COACH PROFESSIONNEL : </label><br/><br/><br/>
            <input type="file" id="inf_coach" name="inf_coach"  required="required">
            <br/><br/><br/>

            <label for="num">AINSI QUE VOTRE NUMERO DE LICENCE : </label><br/><br/><br/>
            <input type="number" id="num" name="num"  required="required">
            <br/><br/><br/>

            <input type="submit" value="VALIDER" name="validation_info_coach.php"/>

        </form>
    </div>

</div>


</body>
</html>