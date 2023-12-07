<?php
require_once ("libs/session.php");
require_once ("libs/pdo.php");

if (isset($_POST['contenu']) && !empty($_POST['contenu'])) {
    $now = new DateTime();
    $sql = "INSERT INTO message (titre, date, id_u, id_m) VALUE (:titre, :date, :id_u, :id_m)";
    $requete = $connexion->prepare($sql);
    $requete->execute([':titre' => $_POST['titre'], ':id_m' => $_POST['Titre']]);
}

$sql = "SELECT titre.*, message.titre FROM titre join message ON titre.id_m=message.id";
$requete = $connexion->prepare($sql);
$requete->execute();
$listmessage = $requete->fetchAll(PDO::FETCH_ASSOC);

$pagetitle = "Page Forum Titre";
require_once ("includes/head.php");
// require_once ("includes/header.php");
?>
<form action="post.php" method="POST">
    <textarea name="contenu" class="envoyerContenu" placeholder="Laissez votre pensée vous guider..." required></textarea><br>
    <input type="submit" value="Envoyer" name="submit" class="envoyerMessage">
</form>
<?php
require_once ("includes/footer.php");