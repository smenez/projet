<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!--Police d'écriture Dancing-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Collegiate+One&family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <header>
            <h1>Connexion</h1>
        </header>
        <main>
            <!-- lignes à changer pour être en php -->
            <div id="invisible">
            <form action="traitementConnexion.php" method="POST">
            <input type="email" name="Email" placeholder="Email"><br>
            <input type="password" name="Password" placeholder="password"><br>
            <input type="submit" name="Connexion" placeholder="Se connecter">
            </div>

            <!-- QUESTION THOMAS -->

            <?php

            // on va chercher les données dans la base
            // require_once "PDO.php";
            // $sql = "SELECT * FROM user ORDER BY email_u DESC";
            // $req = $db->query($sql);

            ?>
                <div class="input">
                    <p>EMAIL</p>
                    <input type="email" name="Email"><br>
                </div>
                <div class="input">
                    <p>MOT DE PASSE</p>
                    <input type="password" name="Password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="Checkbox">Se souvenir de moi
                </div>
                <div id=Connexion>
                <input type="submit" name="Connexion" Value="Se connecter" id="button">
                </div>
            </form>
        </main>
    </section>

    <script ></script>
</body>
</html>