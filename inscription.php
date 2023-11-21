<?php
    require_once('libs/session.php');
    require_once('libs/pdo.php');

    $nom = '';
    $prenom = '';
    $pseudo = '';
    $email = '';
    $error = false;

    

    if (isset($_POST['Subscribe'])) {
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $pseudo = $_POST['Pseudo'];
        $email = $_POST['Email'];

        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($pseudo) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false && !empty($_POST['Password']) && !empty($_POST['Password2']) && $_POST['Password2']===$_POST['Password']) {
            $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (nom, prenom, pseudo, email, password) VALUE (:nom, :prenom, :pseudo, :email, :password)";
            $requete = $connexion->prepare($sql);
            // $requete->bindValue(':pseudo_u',$pseudo);
            // $requete->bindValue(':email_u',$email);
            // $requete->bindValue(':motDePasse_u',$password);
            $resultat = $requete->execute([':nom' => $nom, ':prenom' => $prenom, ':pseudo' => $pseudo, ':email' => $email, ':password' => $password]);

            header('Location: connexion.php');
        } else {
            $error = true;
        }
    }

    $pageTitle = 'Inscription';
    require_once('includes/headconnexion.php');
?>
        <section class="inscription">
            <header>
                <h1>Créer un compte</h1>
            </header>
            <main>
                <!-- lignes à changé pour être en php -->
                <form id="Onglet" action="inscription.php" method="POST">
                    <div class="input">
                        <p>NOM</p>
                        <input type="text" name="Nom" value="<?php echo $nom; ?>"><br>
                    </div>
                    <div class="input">
                        <p>PRENOM</p>
                        <input type="text" name="Prenom" value="<?php echo $prenom; ?>"><br>
                    </div>
                    <div class="input">
                        <p>PSEUDO</p>
                        <input type="text" name="Pseudo" value="<?php echo $pseudo; ?>"><br>
                    </div>
                    <div class="input">
                        <p class="asterisk">ADRESSE MAIL</p>
                        <input type="email" name="Email" value="<?php echo $email; ?>"><br>
                    </div>
                    <div class="input">
                        <p class="asterisk">MOT DE PASSE</p>
                        <input type="password" name="Password">
                    </div>
                    <div class="input">
                        <p class="asterisk">CONFIRMER LE MOT DE PASSE</p>
                        <input type="Password" name="Password2">
                    </div>
                    <?php 
                    if ($error == true) {
                        echo '<p class="erreur">';
                        if(!($_POST['Password2']===$_POST['Password'])){
                            echo "Confirmation du mot de passe incorrect";
                        }else{
                            echo 'Veuillez remplir toutes les informations';
                        }
                        echo '</p>';
                    }
                    ?>
                    <input type="submit" value="S'inscrire" name="Subscribe">
                    <a href="connexion.php" class="retourconnexion">J'ai déjà un compte</a>
                </form>
            </main>
        </section>
    </body>
</html>