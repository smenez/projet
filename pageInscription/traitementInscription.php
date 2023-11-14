<?php

require_once "PDO.php";

if (isset($_POST['Inscription'])){
    if (empty($_POST['Pseudo'])){
        echo "mauvais";
    }elseif(empty($_POST['Email'] && filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL))){
        echo "mauvais";
    }elseif(empty($_POST['Password']))
        echo "mauvais";
    }else{
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $pseudo = $_POST['Pseudo'];
}

$sql = "INSERT INTO user (pseudo_u, email_u, motDePasse_u) VALUE (:pseudo_u, :email_u, :motDePasse_u)";
$requete = $connexion->prepare($sql);
$pseudo = $_POST['Pseudo'];
$email = $_POST['Email'];
$password = $_POST['Password'];
// $requete->bindValue(':pseudo_u',$pseudo);
// $requete->bindValue(':email_u',$email);
// $requete->bindValue(':motDePasse_u',$password);
$resultat = $requete->execute([':pseudo_u'=>$pseudo, ':email_u'=>$email, ':motDePasse_u'=>$password]);