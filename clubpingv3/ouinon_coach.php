<html lang="fr">
<head>
    <title>VERIFICATION PING</title>
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

$coa=$_POST["coach"];

if ($coa == "coach"){
    header("location: info_coach.php");
}else{
    header("location: connexion.php");
}


?>

</body>
</html>