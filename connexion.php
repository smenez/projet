<?php
    require_once('libs/session.php');
    require_once('libs/pdo.php');

    $pseudo = '';
    $email = '';
    $error = false;

    if (isset($_POST['Email']) && !empty($_POST['Email']) && isset($_POST['Password']) && !empty($_POST['Password'])) {
        $email = $_POST['Email'];
        $password = $_POST['Password'];

        $sql= "SELECT * FROM user WHERE email=:email";
        $requete = $connexion->prepare($sql);
        $requete->execute([":email" => $email]);
        $result = $requete->fetch(PDO::FETCH_ASSOC);
 
        if ($result !== false) {
            if (password_verify($password, $result['password'])){
                $_SESSION['userid'] = $result['id'];
                header('location: index.php');
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }
    }

    $pageTitle = 'Accueil';
    require_once('includes/headconnexion.php');
?>
    <section>
        <header>
            <h1>Connexion</h1>
        </header>
        <main>
            <!-- lignes à changer pour être en php -->
            <form action="connexion.php" method="POST">
                <div class="input">
                    <p>EMAIL</p>
                    <input type="email" name="Email" value="<?php echo $email; ?>"><br>
                </div>
                <div class="input">
                    <p>MOT DE PASSE</p>
                    <input type="password" name="Password">
                </div>
                <div id=Connexion>
                    <input type="submit" name="Connexion" Value="Se connecter" id="button">
                </div>
            </form>
        </main>
    </section>