<?php
extract($game);
var_dump($game);

$title = "Kaiserstuhl - " . " $title";
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div
        class="bg-ks-white/10 w-[100%] md:w-[80%] rounded-lg text-ks-white flex flex-col md:flex-row justify-center mx-auto p-8">

        <form action="index.php?action=chekout" method="post">
            <div class="flex flex-col gap-3">
                <h1 class="text-3xl md:text-4xl text-center font-semibold"><?= $title ?></h1>
                <img src="<?= $img ?>" alt="<?= $title ?>" class="w-[100%] md:w-[50%] mx-auto rounded-lg">
            </div>
            <div class="flex flex-col gap-3">
                <p class="text-lg md
                :text-xl"><?= $minidesc ?></p>
                <p class="text-lg md
                :text-xl">Durée: <?= $duration ?> heures</p>
                <p class="text-lg md
                :text-xl">Longueur du parcours: <?= $length ?>km</p>
                <input type="hidden" name="id_game" value="<?= $id_game ?>">

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
        </form>
    </div>

</section>