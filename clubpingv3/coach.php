<html lang="fr">

<head>
    <title>DEVENIR COACH</title>
    <link rel="stylesheet" href="coach.css"/>
    <meta charset="UTF-84" />
</head>





<body>

<div class="banner">
    <img src="img3.jpg" alt="Un ordinateur sur un bureau" class="banner-image">
    <img src="blanc.jpg" alt="Un ordinateur sur un bureau" >
    <div class="banner-content">
        <h1 >Devenir coach au Club PING</h1>
    </div>

    <div id="text">


        <h2 >COACH PING </h2><br/><br/>
        ETES-VOUS UN COACH ?
    </div>
    <br/><br/>
    <div id = text2>
        <form method="post" action="ouinon_coach.php">

            <br/><br/><br/><br/>


            <label for="coach">
                <input type="radio" id="coach" name="coach" required="required" value="coach"> Oui<br/>
                <input type="radio" id="non_coach" name="coach" required="required" value="non_coach"> Non<br/>
            </label>
            <br/>

            <input type="submit" value="VALIDER" name="ouinon_coach.php"/>

        </form>
        <br /><br />
    </div>

</div>
</body>
</html>