<?php
require_once("libs/session.php");
require_once("libs/pdo.php");

if (isset($_SESSION['userid'])) {
    $sql = "SELECT * FROM user WHERE id = :userid";
    $requete = $connexion->prepare($sql);
    $requete->bindParam(':userid', $_SESSION['userid'], PDO::PARAM_INT);
    $requete->execute();

    $user = $requete->fetch(PDO::FETCH_ASSOC);

    $pagetitle = "Page utilisateur";
    require_once("includes/head.php");
    require_once("includes/header.php");

    $sql2 = "SELECT message.*, user.pseudo FROM message join user ON message.id_u = user.id WHERE user.id = :userid";
    $requete = $connexion->prepare($sql2);
    $requete->bindParam(':userid', $_SESSION['userid'], PDO::PARAM_INT);
    $requete->execute();
    $listMessage = $requete->fetchAll(PDO::FETCH_ASSOC);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Supprimer un message de la base de donnée
        if (isset($_POST['supprimer_message'])) {
            $messageId = $_POST['message_id'];
            
            $sql3 = "DELETE FROM message WHERE id = :message_id AND id_u = :userid";
            $requeteDelete = $connexion->prepare($sql3);
            $requeteDelete->bindParam(':message_id', $messageId, PDO::PARAM_INT);
            $requeteDelete->bindParam(':userid', $_SESSION['userid'], PDO::PARAM_INT);
            $requeteDelete->execute();
        }
        
        // Modifier un message de la base de donnée
        if (isset($_POST['nouveau_contenu'])) {
            $messageId = $_POST['message_id'];
            $nouveauContenu = $_POST['nouveau_contenu'];
    
            $sqlUpdate = "UPDATE message SET contenu = :contenu WHERE id = :message_id AND id_u = :userid";
            $requeteUpdate = $connexion->prepare($sqlUpdate);
            $requeteUpdate->bindParam(':contenu', $nouveauContenu, PDO::PARAM_STR);
            $requeteUpdate->bindParam(':message_id', $messageId, PDO::PARAM_INT);
            $requeteUpdate->bindParam(':userid', $_SESSION['userid'], PDO::PARAM_INT);
            $requeteUpdate->execute();
        }
    }    
?>
    <main id="user">
        <section>
            <h1>Profil de l'utilisateur</h1>
        </section>
<?php
if ($user) {
    echo "<p>Bienvenue <span>{$user['nom']} {$user['prenom']}</span> sur votre page utilisateur, vous pouvez ici voir les messages que vous avez envoyés. <br> Vous pouvez les modifier à votre guise.</p>";
    foreach ($listMessage as $message) {
?>   
        <section class="post">
            <div class="toppost">
                <div class="pseudo">
<?php
                    echo $message['pseudo'];
?>   
                </div>
                <div class="titremessage">
<?php
                    echo $message['titre']."<br>";
?>   
                </div>
            </div>
            <hr class="separation">
            <div class="bottompost">
                <div class="contenu">
<?php
                    echo $message['contenu']."<br>";
?>   
                </div>
                <div class="date">
<?php
                    echo $message['date'];
?>   
                </div>
            </div>
        </section>
        <section class="message_bouton">
            <ul>
                <li><button class="modifier" data-message-id="<?php echo $message['id']; ?>">Modifier le message</button></li>
                <li><button class="supprimer" data-message-id="<?php echo $message['id']; ?>">Supprimer le message</button></li>
            </ul>
        </section>
        <section class="pop_up_del">
            <div class="alert-content">
                <span class="close-btn">&times;</span>
                <p>Voulez vous vraiment supprimer le message?</p>
                <form action="user.php" method="POST">
                <input type="hidden" name="message_id" id="message_id_del" value="">
                <input type="submit" name="supprimer_message" class="supprimer_message" value="Supprimer">
                </form>
            </div>
        </section>
        <section class="pop_up_modify">
            <div class="alert-content">
                <span class="close-btn-modify">&times;</span>
                <p>Entrez un nouveau contenu</p>
                <form action="user.php" method="POST">
                    <input type="hidden" name="message_id" id="message_id_modify" value="">
                    <input type="text" name="nouveau_contenu" id="contenu"><br>
                    <input type="submit" class="modifier_message" value="Modifier">
                </form>
            </div>
        </section>
<?php
}}}
?>
    </main>
</body>