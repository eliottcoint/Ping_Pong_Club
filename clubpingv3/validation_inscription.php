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

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];
$num_carte = $_POST["cb"];
$code_cvc = $_POST["code_cvc"];
$mois = $_POST["month"];
$annee = $_POST["year"];
$nom_titulaire = $_POST["titulaire"];

//Connect to the database and execute the request
$bdd = new PDO("mysql:host=localhost;dbname=club_ping;charset=utf8", "root", "");

$req = $bdd->prepare("SELECT id_utilisateur FROM utilisateur WHERE utilisateur_email=? AND utilisateur_mdp=?");
$req->execute([$email, $mdp]);
$donnees = $req->fetch();

if($donnees[0] == NULL){

    $req1 = $bdd->prepare("SELECT id_cb FROM carte_bancaire WHERE num_carte=? AND code_cvc=? AND mois=? AND annee=? AND nom_titulaire=?");
    $req1->execute([$num_carte, $code_cvc, $mois, $annee, $nom_titulaire]);
    $donnees1 = $req1->fetch();

    if($donnees1[0] == NULL){
        $req2 = $bdd->prepare("INSERT INTO carte_bancaire(num_carte  , code_cvc, mois , annee, nom_titulaire) VALUES (?,?,?,?,?);");
        $req2->execute([$num_carte, $code_cvc, $mois, $annee, $nom_titulaire]);

        $req3 = $bdd->prepare("SELECT id_cb FROM carte_bancaire WHERE num_carte=? AND code_cvc=?");
        $req3->execute([$num_carte, $code_cvc]);
        $donnees2 = $req3->fetch();

        $req4 = $bdd->prepare("INSERT INTO utilisateur(utilisateur_first_name   , utilisateur_last_name, utilisateur_email , utilisateur_mdp, id_cb) VALUES (?,?,?,?,?);");
        $req4->execute([$nom, $prenom, $email, $mdp, $donnees2[0]]);
    }else{
        $req2 = $bdd->prepare("INSERT INTO utilisateur(utilisateur_first_name   , utilisateur_last_name, utilisateur_email , utilisateur_mdp, id_cb) VALUES (?,?,?,?,?);");
        $req2->execute([$nom, $prenom, $email, $mdp, $donnees1[0]]);
    }

    header("location: adh.php");
}else{
    header("Location: connexion.php");
}

?>

</body>
</html>