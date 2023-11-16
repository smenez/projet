<?php
    require_once('libs/session.php');
    require_once('libs/pdo.php');

    $pseudo = '';
    $email = '';
    $error = false;

    

    if (isset($_POST['Subscribe'])) {
        $pseudo = $_POST['Pseudo'];
        $email = $_POST['Email'];

        if (!empty($pseudo) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false && !empty($_POST['Password']) && !empty($_POST['Password2']) && $_POST['Password2']===$_POST['Password']) {
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
                    <input type="submit" value="S'inscrire" name="Subscribe">
                    <a href="connexion.php" class="retourconnexion">J'ai déjà un compte</a>
                    <?php 
                    if ($error === true) {
                        if(!($_POST['Password2']===$_POST['Password'])){
                            echo "Confirmation du mot de passe incorrect";
                        }else{
                            echo '<p class="erreur">Veuillez remplir toutes les informations</p>';
                        }
                    }
                    ?>
                </form>
            </main>
        </section>
    </body>
</html>