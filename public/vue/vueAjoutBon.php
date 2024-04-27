<?php
$title = "Kaiserstuhl - Ajouter bon";

global $Conf;

// var_dump($users);
?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain">

    <!-- Contenu principal qui s'étend pour remplir l'espace disponible, poussant le footer vers le bas -->
    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-20 select-none">
            <span class="text-ks-orange">AJOUTER</span> UN BON
        </h1>

        <div class="flex items-center justify-center mb-32">
            <form id="imageUploadForm" style="" action="index.php?action=goodAddConfirm" method="post"
                enctype="multipart/form-data">
                <input id="fileInput" type="file" name="newImage" style="" accept=".png,.jpg,.jpeg" required>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                <input type="text" name="goodname" placeholder="Nom du bon" required>
                <input type="number" name="price" placeholder="Prix" required>
                <input type="text" name="gooddesc" placeholder="Description" required>
                <select name="delivery_time">
                    <option value="Instantané">Instantané</option>
                    <option value="1 jours">1 jour</option>
                    <option value="2 jours">2 jours</option>
                    <option value="3 jours">3 jours</option>
                    <option value="4 jours">4 jours</option>
                    <option value="5 jours">5 jours</option>
                    <option value="6 jours">6 jours</option>
                    <option value="7 jours">7 jours</option>
                </select>
                <input type="submit" name="submit">
            </form>
        </div>
    </div>
</section>