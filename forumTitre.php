<?php
require_once "libs/session.php";
require_once "libs/pdo.php";

if (isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['contenu'])) {
    $now = new DateTime();
    $sql = "INSERT INTO message (titre, contenu, date, id_u) VALUE (:titre, :contenu, :date, :id_u)";
    $requete = $connexion->prepare($sql);
    $requete->execute([':titre' => $_POST['titre'], ':contenu' => $_POST['contenu'], ':date' => $now->format('Y-m-d H:i:s'), ':id_u' => $_SESSION['userid']]);
}

$sql = "SELECT titre.*, message.titre FROM titre join message ON titre.id_m=message.id";
$requete = $connexion->prepare($sql);
$requete->execute();
$listmessage = $requete->fetchAll(PDO::FETCH_ASSOC);

$pagetitle = "Page Forum Titre";
require_once "includes/head.php";