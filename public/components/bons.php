<!-- BONS COMPONENT -->
<div class="flex flex-col">
    <a href="index.php?action=goods=&idItem=<?= $id ?>">
        <img class="w-[300px] lg:w-[400px] h-auto max-h-[284px] bg-cover" src="<?= $img ?>"
            alt="Image du bien à vendre">
    </a>
    <div class="flex flex-row justify-between bg-[#2A2A2A] w-full p-2">
        <div class="text-ks-white flex flex-col ">
            <h3 class="text-xl"><?= $name ?></h3>
            <small><span class="text-ks-orange">Temps</span> de livraison : <span
                    class="text-ks-orange"><?= $deltime ?></span></small>
        </div>
        <div class="text-ks-orange text-2xl font-semibold items-center"><?= $price ?>€</div>
    </div>
    <a href="index.php?action=cart&idProduct=<?= $id ?>"
        class="flex gap-2 justify-center bg-ks-orange hover:bg-orange-300 text-ks-white p-2 items-center text-center">
        <p class="text-lg font-bold">Ajouter au panier</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="10" cy="20.5" r="1" />
            <circle cx="18" cy="20.5" r="1" />
            <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
        </svg>
    </a>
    <?php
    if (isset($_SESSION['username'])) {
        if ($member_role == 'Admin') {
            echo '<a href="index.php?action=modification&idItemModif=' . $id . '"
            class="flex gap-2 justify-center bg-ks-white hover:bg-gray-200 text-ks-black p-2 items-center text-center">
            <p class="text-lg font-bold">Modifier</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><g fill="none" fill-rule="evenodd"><path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h5M15 3h6v6M10 14L20.2 3.8"/></g></svg>
        </a>
        <a id="confirmDelete" onclick="confirmDelete()" class="cursor-pointer w-full items-center mx-auto">
            <form class="w-full mb-8" action="index.php?action=modification&goodDelete=' . $id . '" method="post">
                <button class="flex gap-2 justify-center bg-red-500/30 hover:bg-red-800 w-full text-ks-white p-2 items-center text-center text-lg font-bold">Supprimer</button>   
            </form>
        </a>
        <!-- Script de confirmation de suppression du bon -->
        <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete this item?")) {
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