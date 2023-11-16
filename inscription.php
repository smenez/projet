<?php
    require_once('libs/session.php');
    require_once('libs/pdo.php');

    $pseudo = '';
    $email = '';
    $error = false;

    if (isset($_POST['Subscribe'])) {
        $pseudo = $_POST['Pseudo'];
        $email = $_POST['Email'];

        if (!empty($pseudo) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false && !empty($_POST['Password'])) {
            $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO user (pseudo, email, password) VALUE (:pseudo, :email, :password)";
            $requete = $connexion->prepare($sql);
            // $requete->bindValue(':pseudo_u',$pseudo);
            // $requete->bindValue(':email_u',$email);
            // $requete->bindValue(':motDePasse_u',$password);
            $resultat = $requete->execute([':pseudo' => $pseudo, ':email' => $email, ':password' => $password]);

            header('Location: connexion.php');
        } else {
            $error = true;
        }
    }

    $pageTitle = 'Accueil';
    require_once('includes/head.php');
?>
    <main>
        <form action="inscription.php" method="POST">
            <input type="text" name="Pseudo" placeholder="Pseudo" value="<?php echo $pseudo; ?>"><br>
            <input type="email" name="Email" placeholder="Email" value="<?php echo $email; ?>"><br>
            <input type="password" name="Password" placeholder="Mot de passe"><br>
            <input type="submit" name="Subscribe" placeholder="S'inscrire">
            <?php 
                if ($error === true) {
                    echo '<p class="erreur">Veuillez remplir toutes les informations</p>';
                }
            ?>
        </form>
    </main>
<?php require_once('includes/footer.php'); ?>