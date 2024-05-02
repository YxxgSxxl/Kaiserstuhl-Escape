<?php
extract($game);
// var_dump($game);

$title = "Kaiserstuhl - " . " $title";

global $Conf;
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div
        class="bg-ks-white/10 w-[100%] md:w-[80%] relative rounded-lg text-ks-white flex flex-col md:flex-row justify-center mx-auto p-8">

        <?php
        if ($_SESSION['lang'] === 'ENG') {
            if ($game['difficulty']) {
                if ($game['difficulty'] === 'Easy') {
                    echo '<p class="absolute top-2 left-2  animate-pulse text-ks-green text-lg md:text-2xl bg-ks-black p-1 rounded-xl">Easy</p>';
                } elseif ($game['difficulty'] === 'Standard') {
                    echo '<p class="absolute top-2 left-2  animate-pulse text-ks-orange text-lg md:text-2xl bg-ks-black p-1 rounded-xl">Standard</p>';
                } elseif ($game['difficulty'] === 'Hard') {
                    echo '<p class="absolute top-2 left-2 animate-pulse text-red-500 text-lg md:text-2xl bg-ks-black p-1 rounded-xl">Hard</p>';
                }
            }
        } else {
            if ($game['difficulty']) {
                if ($game['difficulty'] === 'Easy') {
                    echo '<p class="absolute top-2 left-2  animate-pulse text-ks-green text-lg md:text-2xl bg-ks-black p-1 rounded-xl">Facile</p>';
                } elseif ($game['difficulty'] === 'Standard') {
                    echo '<p class="absolute top-2 left-2  animate-pulse text-ks-orange text-lg md:text-2xl bg-ks-black p-1 rounded-xl">Moyen</p>';
                } elseif ($game['difficulty'] === 'Hard') {
                    echo '<p class="absolute top-2 left-2  animate-pulse text-red-500 text-lg md:text-2xl bg-ks-black p-1 rounded-xl">Difficile</p>';
                }
            }
        }
        ?>

        <form action="index.php?action=reservation&idGameRes=<?= $id_game ?>" method="post">
           
        <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-3">
                <h1 class="text-2xl md:text-4xl mt-4 text-center font-semibold"><?= $title ?></h1>
                <div class="relative">
                    <img src="<?= $Conf->GAMESFOLDER . $img ?>" alt="<?= $title ?>"
                        class="w-[100%] md:w-[50%] mx-auto rounded-lg">
                </div>
            </div>
            <div class="flex flex-col gap-3 rounded p-4  bg-ks-orange items-center justify-center">
                <p class="text-lg md
                :text-xl"><?= $minidesc ?></p>
                <p class="text-lg md
                :text-xl">Durée : <?= $duration ?> heures</p>
                <p class="text-lg md
                :text-xl">Longueur du parcours : <?= $lengths ?>km</p>
                <p class="text-lg md
                :text-xl">Date de début : <?= $dateStart ?></p>
                <p class="text-lg md
                :text-xl">Date de fin : <?= $dateEnd ?></p>
                <p class="text-lg md
                :text-xl">Prix : <?= $price ?> €</p>
                <input type="hidden" name="id_game" value="<?= $id_game ?>">
            </div>
                <button type="submit"
                    class="flex flex-row gap-2 text-ks-white text-lg bg-ks-green w-fit rounded-md mx-auto px-4 py-1 md:py-2 hover:bg-green-500 cursor-pointer">
                    Je réserve
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </button>
                </div>
        </div>
       
        </form>
    

</section>