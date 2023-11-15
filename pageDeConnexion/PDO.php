<?php
try{
    $connexion  = new PDO("mysql:host=localhost; dbname=projet", "root","root");
}
catch(PDOException $erreur){
    echo $erreur; 
}
?>