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
        <section class="cache">
            <h2>Site</h2>
            <hr>
            <div class="flyout">
                    <a href="info.php"><span>I</span>nfos</a>
                    <a href="forum.php"><span>F</span>orum</a>
                    <a href="announcement.php"><span>A</span>nnouncement</a>
                    <a href="user.php"><span>P</span>rofil</a>
            </div>
            <h2>Réseaux</h2>
            <hr>
            <div class="flyout">
                    <a href="https://www.twitch.tv/crateentertainment" target="_blank"><span>T</span>witch</a>
                    <a href="https://twitter.com/crate_frontier" target="_blank"><span>T</span>witter</a>
                    <a href="https://store.steampowered.com/app/1044720/Farthest_Frontier/" target="_blank"><span>S</span>team</a>
                    <a href="https://www.youtube.com/c/crateentertainment" target="_blank"><span>Y</span>outube</a>
            </div>
        </section>
        <div class="connect-button">
            <?php
                if (isset($_SESSION['userid'])) {
                    echo '<button class="interaction"><a href="deconnexion.php">Déconnexion</a></button>';
                } else {
                    echo 
                    "<button class=\"interaction\"><a href=\"connexion.php\">Connexion</a></button>
                    <button class=\"interaction\"><a href=\"inscription.php\">S'inscrire</a></button>"
                    ;
                }
            ?>
        </div>
    </nav>
    <button><img src="https://cdn-icons-png.flaticon.com/512/10080/10080458.png" alt="Menu déroulant"></button>
</header>
