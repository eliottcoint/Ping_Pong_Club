<html lang="fr">
<head>
    <title>VALIDATION ADHERENT</title>
    <link rel="stylesheet" href="validation.css"/>
    <meta charset="UTF-84" />
</head>
<body>

<div id="text">


    <h2>EN ATTENTE DE VERIFICATION...</h2><br /><br />
    <h2>VEUILLEZ PATIENTER...</h2>

    <br /><br />
</div>


<?php

$oui_non=$_POST["rang"];

if ($oui_non == "adh"){
    header("location: info_adh.php");
}else{
    header("location: monespace.php");
}

?>

</body>
</html>