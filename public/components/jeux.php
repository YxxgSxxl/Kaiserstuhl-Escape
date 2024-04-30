<!-- BONS COMPONENT -->
<div class="flex flex-col bg-ks-black">
    <a class="relative" href="index.php?action=games=&idGame=<?= $id ?>">
        <?php
        if ($_SESSION['lang'] === 'ENG') {
            if ($game['difficulty']) {
                if ($game['difficulty'] === 'Easy') {
                    echo '<p class="absolute top-2 right-2  animate-pulse text-ks-green text-2xl bg-ks-black p-1 rounded-xl">Easy</p>';
                } elseif ($game['difficulty'] === 'Standard') {
                    echo '<p class="absolute top-2 right-2  animate-pulse text-ks-orange text-2xl bg-ks-black p-1 rounded-xl">Standard</p>';
                } elseif ($game['difficulty'] === 'Hard') {
                    echo '<p class="absolute top-2 right-2 animate-pulse text-red-500 text-2xl bg-ks-black p-1 rounded-xl">Hard</p>';
                }
            }
        } else {
            if ($game['difficulty']) {
                if ($game['difficulty'] === 'Easy') {
                    echo '<p class="absolute top-2 right-2  animate-pulse text-ks-green text-2xl bg-ks-black p-1 rounded-xl">Facile</p>';
                } elseif ($game['difficulty'] === 'Standard') {
                    echo '<p class="absolute top-2 right-2  animate-pulse text-ks-orange text-2xl bg-ks-black p-1 rounded-xl">Moyen</p>';
                } elseif ($game['difficulty'] === 'Hard') {
                    echo '<p class="absolute top-2 right-2  animate-pulse text-red-500 text-2xl bg-ks-black p-1 rounded-xl">Difficile</p>';
                }
            }
        }
        ?>
        <img class="w-[300px] md:w-[400px] h-auto" src="<?= $img ?>" alt="Image du bien à vendre">
    </a>
    <div class="text-ks-white flex flex-col gap-4 w-[300px] md:w-[400px] py-4 px-2">
        <h3 class="text-xl"><?= $titre ?></h3>
        <small class="flex flex-col gap-2 max-h-20 min-h-20 overflow-hidden text-md lg:text-base">
            <div>
                <?php
                if ($_SESSION['lang'] === 'ENG') {
                    echo '<p><span class="text-ks-orange">Start date:</span> ' . format_date($game['dateStart']) . ' <span class="text-ks-orange">End date:</span> ' . format_date($game['dateEnd']) . '</p><br>';
                } else {
                    echo '<p><span class="text-ks-orange">Date début:</span> ' . format_date($game['dateStart']) . ' <span class="text-ks-orange">Date fin:</span> ' . format_date($game['dateEnd']) . '</p><br>';
                }

                if ($_SESSION['lang'] === 'ENG')
                    echo 'Duration: ';
                else
                    echo 'Temps de jeu: ';
                ?><?= $duration ?>h | <?php
                  if ($_SESSION['lang'] === 'ENG')
                      echo 'Length: ';
                  else
                      echo 'Longueur ';
                  ?><?= $length ?> km <br>
            </div>
            <?= $minidesc ?>
        </small>
    </div>
    <!-- <a href="index.php?action=games=&idGameAdmin= $id " -->
    <a href="index.php?action=games=&idGame=<?= $id ?>"
        class="flex gap-2 justify-center bg-ks-orange hover:bg-orange-300 text-ks-white p-2 items-center text-center">
        <p class="text-lg font-bold">
            <?php
            if ($_SESSION['lang'] === 'ENG')
                echo 'Learn more';
            else
                echo 'En savoir plus';
            ?>
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
            <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8" />
        </svg>
    </a>
    <?php
    if (isset($_SESSION['username'])) {
        if ($member_role == 'Admin') {
            if ($_SESSION['lang'] === 'ENG')
                echo '<a href="index.php?action=modification&idGameModif=' . $id . '"
                class="flex gap-2 justify-center bg-ks-white hover:bg-gray-100 text-ks-black p-2 items-center text-center">
                <p class="text-lg font-bold">Modify</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><g fill="none" fill-rule="evenodd"><path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h5M15 3h6v6M10 14L20.2 3.8"/></g></svg>
            </a>
            <a id="confirmDelete" onclick="confirmDelete()" class="cursor-pointer w-full items-center mx-auto">
            <form class="w-full mb-8" action="index.php?action=modification&gameDelete=' . $id . '" method="post">
                <button class="flex gap-2 justify-center bg-red-500/30 hover:bg-red-800 w-full text-ks-white p-2 items-center text-center text-lg font-bold">Supprimer
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>   
            </form>
        </a>
    <!-- Script de confirmation de suppression du bon -->
    <script>
    function confirmDelete() {
        if (confirm("Do you really want to delete this game?")) {
        document.getElementById("deleteForm").submit();
        } else {
            event.preventDefault();
        }
    }
    </script>';
            else
                echo '<a href="index.php?action=modification&idGameModif=' . $id . '"
            class="flex gap-2 justify-center bg-ks-white hover:bg-gray-100 text-ks-black p-2 items-center text-center">
            <p class="text-lg font-bold">Modifier</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><g fill="none" fill-rule="evenodd"><path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h5M15 3h6v6M10 14L20.2 3.8"/></g></svg>
        </a>
        <a id="confirmDelete" onclick="confirmDelete()" class="cursor-pointer w-full items-center mx-auto">
        <form class="w-full mb-8" action="index.php?action=modification&gameDelete=' . $id . '" method="post">
            <button class="flex gap-2 justify-center bg-red-500/30 hover:bg-red-800 w-full text-ks-white p-2 items-center text-center text-lg font-bold">Supprimer
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>   
        </form>
    </a>
    <!-- Script de confirmation de suppression du bon -->
    <script>
    function confirmDelete() {
        if (confirm("Voulez-vous vraiment supprimer ce jeu ?")) {
        document.getElementById("deleteForm").submit();
        } else {
            event.preventDefault();
        }
    }
    </script>';

        } else {
            null;
        }
    } else {
        null;
    }
    ?>
</div>
<!-- END BONS COMPONENT -->