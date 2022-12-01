<?php session_start();
?>
<html lang="fr">
<head>
    <title>Reservation</title>
    <link rel="stylesheet" href="inscription.css"/>
    <meta charset="UTF-84" />
</head>


<body>


<div class="block">


    <div class="banner">



        <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
        <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
        <div class="banner-content">
            <h1 >Reservation en ligne de tables</h1>
        </div>


        <div id="text">

            <h2 >Reserver</h2>

        </div>
        <br/><br/>


        <div id = text2>

            <form method="post" action="save_reservation.php">


                Sélectionner un nombre de joueur
                <label for="player"></label>
                <select id="player" name="player" required="required">
                    <option value="">Nombre de joueur</option>
                    <option value="1">2</option>
                    <option value="0">4</option>

                </select>
                <br /><br />

                Voulez vous un coach ?<br/>
                <label for="coach">
                    <input type="radio" id="coach" name="coa" value="oui" required="required"> Oui<br/>
                </label>
                <label for="coach1">
                    <input type="radio" id="coach1" name="coa" value="non" required="required"> Non<br/>
                </label><br/>

                <input id="prodId" name="prodId" type="hidden" value="xm234jq">



                Voulez vous un arbitre ?<br/>
                <label for="arbitre">
                    <input type="radio" id="arbitre" name="arb" value="oui" required="required"> Oui<br/>
                </label>
                <label for="coach1">
                    <input type="radio" id="arbitre1" name="arb" value="non" required="required"> Non<br/>
                </label><br/>

                <label for="date">Selectionner une date :</label>
                <input type="date" id="date" name="date"  required="required"/><br /><br/>

                <label for="num_terrain"> Choisir le terrain numéro:</label>
                <input type="number" id="num_terrain" name="num_terrain" min="1" max="10" required="required"/><br/><br/>

                <label>
                    Choisisser un type de raquette
                    <select name="raquette" required="required">
                        <option value=""> type de raquette</option>
                        <option value="1"> Raquette de Qualité 1 à 2e</option>
                        <option value="2">Raquette de Qualité 2 à 3e</option>
                        <option value="3">Raquette de Qualité 3 à 5e</option>
                        <option value="4">J'utilise mes raquettes</option>
                    </select> <br/><br/>
                </label>

                <label for="balle">
                    Choisisser un type de balle
                    <select name="balle" id="balle" required="required">
                        <option value=""> type de balle </option>
                        <option value="1"> Débutant à 2e</option>
                        <option value="2">Expert à 3e</option>
                        <option value="3">J'utilise mes balles</option>
                    </select> <br/><br/>
                </label>

                <label>
                    Choisisser un type de table
                    <select name="table" required="required">
                        <option value=""> type de table </option>
                        <option value="1"> Débutant à 2e</option>
                        <option value="2">Expert à 3e</option>
                    </select> <br/><br/>
                </label>

                <label for="duree"> Séléctionner une durée pour la réservation (vous pouvez seulement choisir heure par heure)</label>
                <input type="number" id="duree" name="duree" min="1" max="4" required="required"/><br/><br/>

                <input type="submit" value="Enregistrer et passer au paiement" name="save_reservation.php"/>
            </form>

            <form method="post" action="monespace.php">
                <label>
                    <input type="submit" name="btn" id="btn" value="RETOUR">
                </label>
            </form>
            <br /><br />

        </div>
        <div id="nav">
            <nav class="header-menu">
                <a href="monespace.php">Consulter mes infos</a>
                <a href="logout.php">Se deconnecter</a>
            </nav>

        </div>
    </div>


<?php
?>


</body>
</html>