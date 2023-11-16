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

    $pageTitle = 'Accueil';
    require_once('includes/head.php');
    require_once('includes/header.php');
?>
    <main>
        <h1>Forum</h1>
        <?php
            foreach ($listMessages as $message) {
                echo '<p>';
                echo $message['pseudo'];
                echo $message['titre'];
                echo $message['contenu'];
                echo $message['date'];
                echo '</p>';
            }
        ?>
        <?php 
            if (isset($_SESSION['userid'])) {
        ?>
            <form action="forum.php" method="POST">
                <input type="text" name="titre" maxlength="100" required>
                <textarea name="contenu" required></textarea>
                <input type="submit" name="submit" value="Ok">
            </form>
        <?php
            } else {
        ?>
            Vous devez être connecté pour participer
        <?php
            }
        ?>
    </main>
<?php require_once('includes/footer.php'); ?>
