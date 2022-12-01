<html lang="fr">
<head>
    <title>Adhérents</title>
    <link rel="stylesheet" href="inscription.css"/>
    <meta charset="UTF-84" />
</head>

<body >

<div class="banner">
    <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
    <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
    <div class="banner-content">
        <h1 >LISTE DES ADHERENTS</h1>
    </div>

    <div id="text">


        <h2 >Adhérent PING </h2>

    </div>
    <br/><br/>
    <div id = text2>
        <form method="post" action="search_adh.php">

            <br/>

            ENTREZ LES INFORMATIONS QUE VOUS CONNAISSEZ DE L\'ADHERENT : <br/><br/><br/>
            <label for="nom"></label>
            <input type="text" id="nom" name="nom" placeholder="NOM" value="" ><br/><br/><br/>

            <label for="email"></label>
            <input type="text" id="email" name="email" placeholder="PRENOM" value=""><br/><br/><br/>

            <br/><br/>

            <input type="submit" value="CHERCHER" name="search_adh.php"/><br/><br/>

        </form>

        <form method="post" action="show_adh.php">
            <label>
                <input type="submit" name="btn" id="btn" value="RETOUR">
            </label>
        </form>
        <br /><br />
    </div>
</div>
</body>
</html>