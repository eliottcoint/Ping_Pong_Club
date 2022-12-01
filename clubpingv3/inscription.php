<html lang="fr">
<head>
    <title>INSCRIPTION PING</title>
    <link rel="stylesheet" href="inscription.css"/>
    <meta charset="UTF-84" />
</head>
<body >



<div class="banner">
        <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
    <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
        <div class="banner-content">
            <h1 >Bienvenue au centre d'inscription du Club PING</h1>
        </div>

            <div id="text">


            <h2 >Veuillez entrer toutes les informations demandés ci-dessous.</h2>

            <br /><br />
            </div>
               <div id = text2>
                <form method="post" action="validation_inscription.php">
                    <label for="nom"></label>
                    <input type="text" id="nom" name="nom" placeholder="NOM" required="required" /><br /><br />

                    <label for="prenom"></label>
                    <input type="text" id="prenom" name="prenom" placeholder="PRENOM" required="required" /><br /><br/>

                    <label for="email"></label>
                    <input type="text" id="email" name="email" placeholder="email@domain.com" required="required" /><br /><br />

                    <label for="mdp"></label>
                    <input type="password" id="mdp" name="mdp" placeholder="Mote de passe" required="required" /><br /><br /><br />

                    <label for="cb">AJOUTER UNE CARTE BANCAIRE POUR POUVOIR RESERVER : </label><br /><br />
                    <input type="text" id="cb" name="cb" placeholder="1234 5678 9012 3456" required="required"><br/><br />

                    <label for="date"></label>
                    <input type="number" id="date" name="month" required="required" placeholder="mm" min="1" max="12">
                    <input type="number" id="date" name="year" required="required" placeholder="yy" min="21" max="99"><br/><br />

                    <label for="titulaire">TITULAIRE DE LA CARTE : </label><br /><br />
                    <input type="text" id="titulaire" name="titulaire" required="required" placeholder="M. DUPONT"><br/><br />

                    <label for="code_cvc">CODE SECRET :</label><br /><br />
                    <input type="number" id="code_cvc" name="code_cvc" required="required" placeholder="123" min="000" max="999" ><br/><br/>

                    <input type="submit" value="S'INSCRIRE" name="validation_inscription.php" required="required" />
                </form>
               </div>

</div>


</body>
</html>