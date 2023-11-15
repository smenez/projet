<?php

require_once "PDO.php";

if (isset($_POST['Connexion'])){
    if(empty($_POST['Email'] || $_POST['Password'])){
        echo "mauvais";
    }else{
    $motDePasse = $_POST['Password'];
    $email = $_POST['Email'];
    }
}

$sql= "SELECT * FROM user WHERE email_u=:email_u";
$requete = $connexion->prepare($sql);
$requete->bindValue(":email_u", $email);
$requete->execute();
$data = $requete->fetch(PDO::FETCH_ASSOC);

if($data){
    if(password_verify($motDePasse, $data['motDePasse_u'])){
        echo "Connexion réussie";
    }else{
        echo "Erreur de mot de passe";
    }
}else{
    echo "l'utilisateur n'existe pas";
}

?>