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
                <input id="fileInput" type="file" name="newImage" style="" accept=".png,.jpg,.jpeg">

                <input type="submit">
            </form>
        </div>
    </div>
</section>