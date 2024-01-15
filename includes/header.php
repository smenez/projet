<header> <!--Partie haute-->
    <a href="index.php">    
        <img src="https://www.farthestfrontier.com/wp-content/uploads/sites/2/2020/11/cropped-farthest_frontier_game_logo_800px_white.png" alt="logo">
    </a>
    <div class="header_cache">
        <ul>
            <li><a href="https://store.steampowered.com/app/1044720/Farthest_Frontier/" target="_blank">Steam</a></li>
            <li><a href="https://www.youtube.com/c/crateentertainment" target="_blank">Youtube</a></li>
            <li><a href="https://www.twitch.tv/crateentertainment" target="_blank">Twitch</a></li>
            <li><a href="https://twitter.com/crate_frontier" target="_blank">Twitter</a></li>
            <li><a href="info.php">Infos</a></li>
            <li><a href="forum.php">Forum</a></li>
            <li><a href="announcement.php">Announcement</a></li>
            <li><a href="user.php">Profil</a></li>
        </ul>
    </div>
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
                <section class="cache">
                    <div class="flyout-1">
                        <li class="flyout-1-1"><a href="https://store.steampowered.com/app/1044720/Farthest_Frontier/" target="_blank">Steam</a></li>
                        <li class="flyout-1-1"><a href="https://www.youtube.com/c/crateentertainment" target="_blank">Youtube</a></li>
                        <li class="flyout-1-2"><a href="https://www.twitch.tv/crateentertainment" target="_blank">Twitch</a></li>
                        <li class="flyout-1-2"><a href="https://twitter.com/crate_frontier" target="_blank">Twitter</a></li>
                    </div>
                    <div class="flyout-2">
                        <li class="flyout-2-1"><a href="info.php">Infos</a></li>
                        <li class="flyout-2-1"><a href="forum.php">Forum</a></li>
                        <li class="flyout-2-2"><a href="announcement.php">Announcement</a></li>
                        <li class="flyout-2-2"><a href="user.php">Profil</a></li>
                    </div>
            </section>
        </ul>
    </nav>
    <button><img src="https://cdn-icons-png.flaticon.com/512/10080/10080458.png" alt="Menu déroulant"></button>
</header>
