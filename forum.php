<?php
require_once('libs/session.php');
require_once('libs/pdo.php');

if (isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['contenu'])) {
    $now = new DateTime();
    $sql = "INSERT INTO message (titre, contenu, date, id_u) VALUE (:titre, :contenu, :date, :id_u)";
    $requete = $connexion->prepare($sql);
    $requete->execute([':titre' => $_POST['titre'], ':contenu' => $_POST['contenu'], ':date' => $now->format('Y-m-d H:i:s'), ':id_u' => $_SESSION['userid']]);
}

// Récupérer les messages
$sql = "SELECT message.*, user.pseudo FROM message join user ON message.id_u = user.id";
$requete = $connexion->prepare($sql);
$requete->execute();
$listMessages = $requete->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Forum';
require_once('includes/head.php');
require_once('includes/header.php');
?>
<main id=forum>
    <h1>Forum</h1>
    <!-- Pour envoyer un message -->
    <!-- Pour afficher tous les messages -->
    <?php
    foreach ($listMessages as $message) {
        echo '<section class="post">';
            echo '<div class="toppost">';
                echo '<div class="pseudo">';
                    echo $message['pseudo'];
                echo '</div>';
                echo '<div class="titremessage">';
                    echo $message['titre']."<br>";
                echo '</div>';
            echo '</div>';
            echo '<hr class="separation">';
            echo '<div class="bottompost">';
                echo '<div class="contenu">';
                    echo $message['contenu']."<br>";
                echo'</div>';
                echo '<div class="date">';
                    echo $message['date'];
                echo '</div>';
            echo '</div>';
        echo '</section>';
        }
    ?>
    <h2>Répondre</h2>
    <?php 
        if (isset($_SESSION['userid'])) {
    ?>
        <form action="forum.php" method="POST">
            <input type="text" name="titre" maxlength="255" class="envoyerTitre" placeholder="Choisissez le titre du sujet" required><br>
            <textarea name="contenu" class="envoyerContenu" placeholder="Laissez votre pensée vous guider..." required></textarea><br>
            <input type="submit" name="submit" value="Envoyer" class="envoyerMessage">
        </form>
    <?php
        } else {
    ?>
        <p class="erreur">Vous devez être connecté pour participer</p>
    <?php
        }
    ?>
</main>
<?php require_once('includes/footer.php'); ?>
