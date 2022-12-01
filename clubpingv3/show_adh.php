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


        <h2 >COMMENT VOULEZ-VOUS TRIER LES ADHERENTS ?</h2>

        <br /><br />
    </div>
    <div id = text2>
        <form method="post" action="search_users.php">

            <br/>

            <br/>
            <label for="sort_users">
                <input type="radio" id="sort_users2" name="sort_users" required="required" value="sort_users2"> Par leur nom<br/><br/><br/>
                <input type="radio" id="sort_users3" name="sort_users" required="required" value="sort_users3"> Faire une recherche (nom/email)<br/><br/><br/>
            </label>
            <br/>

            <input type="submit" value="TRIER" name="search_users.php"/>

        </form>

        <form method="post" action="monespace.php">
            <label>
                <input type="submit" name="btn" id="btn" value="RETOUR">
            </label>
        </form>
    </div>

</div>




</body>
</html>