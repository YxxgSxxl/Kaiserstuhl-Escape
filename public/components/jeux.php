<!-- BONS COMPONENT -->
<div class="flex flex-col bg-ks-black">
    <a href="index.php?action=games=&idGame=<?= $id ?>">
        <img class="w-[300px] md:w-[400px] h-auto" src="<?= $img ?>" alt="Image du bien à vendre">
    </a>
    <div class="text-ks-white flex flex-col gap-4 w-[300px] md:w-[400px] py-4 px-2">
        <h3 class="text-xl"><?= $titre ?></h3>
        <small class="flex flex-col gap-2 max-h-20 min-h-20 overflow-hidden text-md lg:text-base">
            <div>Temps de jeu : <?= $duration ?>h | longueur : <?= $length ?> km <br></div>
            <?= $minidesc ?>
        </small>
    </div>
    <a href="index.php?action=games=&idGameAdmin=<?= $id ?>"
        class="flex gap-2 justify-center bg-ks-orange hover:bg-orange-300 text-ks-white p-2 items-center text-center">
        <p class="text-lg font-bold">En savoir plus</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
            <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8" />
        </svg>
    </a>
    <?php
    if (isset($_SESSION['username'])) {
        if ($member_role == 'Admin') {
            echo '<a href="index.php?action=payment&idItemModif=' . $id . '"
            class="flex gap-2 justify-center bg-ks-white hover:bg-gray-100 text-ks-black p-2 items-center text-center">
            <p class="text-lg font-bold">Modifier</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><g fill="none" fill-rule="evenodd"><path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h5M15 3h6v6M10 14L20.2 3.8"/></g></svg>
        </a>';
        } else {
            null;
        }
    } else {
        null;
    }
    ?>
</div>
<!-- END BONS COMPONENT -->