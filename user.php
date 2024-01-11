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
    $listMessage = $requete->fetchAll(PDO::FETCH_ASSOC)
?>

    <main id="user">
        <section>
            <h1>Profil de l'utilisateur</h1>
        </section>
        
<?php

if ($user) {
    echo "<p>Bienvenue {$user['nom']} {$user['prenom']} sur votre page utilisateur, vous pouvez ici voir les messages que vous avez envoyés. Vous pouvez les modifier à votre guise.</p>";
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
                <li><input type='submit' value='Modifier le message' class='modifier'></li>
                <li><input type='submit' value='Supprimer le message' class='supprimer'></li>
            </ul>
        </section>
<?php
    }
} else {
    echo "L'utilisateur avec l'ID {$_SESSION['userid']} n'a pas été trouvé.";
}
} else {
    echo "<p class='erreur'>L'ID d'utilisateur n'est pas défini dans la session.</p>";
}
?>
    </main>
</body>