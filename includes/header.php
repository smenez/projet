<header> <!--Partie haute-->
    <a href="index.php">    
        <img src="https://www.farthestfrontier.com/wp-content/uploads/sites/2/2020/11/cropped-farthest_frontier_game_logo_800px_white.png" alt="logo">
    </a>
    <ul>
        <li><a href="https://store.steampowered.com/app/1044720/Farthest_Frontier/" target="_blank">Steam</a></li>
        <li><a href="https://www.youtube.com/c/crateentertainment" target="_blank">Youtube</a></li>
        <li><a href="https://www.twitch.tv/crateentertainment" target="_blank">Twitch</a></li>
        <li><a href="https://twitter.com/crate_frontier" target="_blank">Twitter</a></li>
        <li><a href="info.php">Infos</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="forumTitre.php">Forum</a></li>
        <li><a href="announcement.php">Announcement</a></li>
    </ul>
    <nav class="menuconnexion">
        <ul>
            <?php
                if (isset($_SESSION['userid'])) {
                    echo '<li><button class="interaction"><a href="deconnexion.php">Déconnexion</a></button></li>';
                } else {
                    echo 
                    "<li><button class=\"interaction\"><a href=\"connexion.php\">Connexion</a></button></li>
                    <li><button class=\"interaction\"><a href=\"inscription.php\">S'inscrire</a></button></li>"
                    ;
                }
                ?>
        </ul>
    </nav>
    <button><img src="https://cdn-icons-png.flaticon.com/512/10080/10080458.png" alt="Menu déroulant"></button>
</header>
