<?php
$title = "Kaiserstuhl - Jeux";

if (isset($_SESSION['username'])) {
    extract($users);
} else {
    null;
}

global $Conf;

// var_dump($games);
?>
<section class="flex flex-col min-h-screen bg-contain bg-no-repeat bg-ks-black"
    style="background-image: url('img/ks-bg1.png');">
    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">
            VOICI NOS
            <span class="text-ks-orange">JEUX</span>
        </h1>

        <div class="flex flex-col items-center gap-12 justify-center mb-32">
            <div class="grid grid-cols-1 gap-10 sm:gap-4 sm:grid-cols-2 lg:gap-16">
                <?php
                $listeJeux = "";

                foreach ($games as $game) {
                    $id = $game['id_game'];
                    $img = $Conf->GAMESFOLDER . $game['img'];
                    $titre = $game['title'];
                    $minidesc = $game['minidesc'];
                    $duration = $game['duration'];
                    $length = $game['length'];

                    $listeJeux .= include 'components/jeux.php';
                }
                ?>
            </div>
            <?php
            if (isset($_SESSION['username'])) {
                if ($member_role == 'Admin') {
                    echo '<form action="index.php?action=gameAdd" method="POST">
                        <button type="submit"
                            class="flex flex-row gap-2 bg-ks-orange hover:bg-orange-300 text-white text-xl font-bold py-2 px-4 rounded">
                            Ajouter un Jeu
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                        </button>
                    </form>';
                } else {
                    null;
                }
            } else {
                null;
            }
            ?>
        </div>
    </div>
</section>