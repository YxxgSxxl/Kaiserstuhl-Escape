<?php
$title = "Kaiserstuhl - Jeux";

var_dump($games);
?>
<section class="h-[100vh] bg-cover bg-no-repeat" style="background-image: url('img/ks-bg1.png');">
    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">
            CHOISISSEZ
            <span class="text-ks-orange">UN </span>DE NOS <span class="text-ks-orange">CADEAUX</span> À <span
                class="text-ks-orange">OFFRIR</span>
        </h1>

        <div class="flex items-center justify-center mb-32">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-16">
                <?php
                $listeJeux = "";

                foreach ($games as $game) {
                    $id = $game['id_game'];
                    $img = $game['img'];
                    $title = $game['title'];
                    $minidesc = $game['minidesc'];
                    $duration = $game['duration'];
                    $length = $game['length'];

                    $listeJeux .= include 'components/jeux.php';
                }
                ?>
            </div>
        </div>
    </div>
</section>