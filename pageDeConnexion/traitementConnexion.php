<?php

require_once "PDO.php";

if (isset($_POST['Connexion'])){
    if(empty($_POST['Email'] || $_POST['Email'])){
        echo "mauvais";
    }else{
    $motDePasse = $_POST['Password'];
    $email = $_POST['Email'];
    }
}  

$email = $_POST['Email'];
$password = $_POST['Password'];
$sql = "SELECT email_u FROM user WHERE email_u=:email";
$requete = $connexion->prepare($sql);
// $requete->bindValue(":email_u", $email);
$resultat = $requete->execute(['email_u'=>$email]);
// fetch permet de récupérer toutes les données liées à l'email
$data = $resultat->fetch(PDO::FETCH_ASSOC);
// pour vérifier les deux mots de passe : password_verify

if($data){
    if(password_verify(":motDePasse_u", $motDePasse)){
        echo "connexion réussie";
    }else{
        echo "connexion échouée";
    }
}