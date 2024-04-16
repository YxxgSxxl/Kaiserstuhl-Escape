<?php
$title = "Kaiserstuhl - " . strtoupper($_SESSION['username']);

extract($users);
?>

<section
    class="flex flex-col min-h-screen pt-8 bg-ks-black bg-[url('img/ks-bg5-sm.png')] lg:bg-[url('img/ks-bg5-lg.png')] xl:bg-[url('img/ks-bg5-xl.png')] bg-contain ">
    <!-- Header inclus dans la section principale -->

    <div class="flex-1 flex flex-col gap-8 text-ks-white">
        <h1 class="flex justify-center text-xl">Customisez votre profil:</h1>

        <div class="items-center flex flex-col gap-4 justify-center">
            <img id="profilePic"
                class="rounded-[50%] w-[200px] border-solid border-4 hover:border-dashed active:animate-ping border-ks-orange cursor-pointer"
                src="<?= $Conf->MEMBERSFOLDER . $_SESSION['username'] ?>/<?= $_SESSION['username'] ?>.png"
                alt="Image de profil de <?= $_SESSION['username'] ?>" onclick="openFileExplorer()">
            <!-- Ajout d'un input file caché -->
            <input id="fileInput" type="file" style="display:none;" accept=".png,.jpg,.jpeg"
                onchange="uploadImage(this)">

            <?= "Name: " . $username . " and Email: " . $email ?>
        </div>

        <form id="imageUploadForm" style="display:none;" action="index.php?action=userUploadImg" method="post"
            enctype="multipart/form-data">
            <input type="file" name="newImage" accept=".png,.jpg,.jpeg">
            <input type="submit" value="Uploader">
        </form>

        <script>
            function openFileExplorer() {
                // Simuler un clic sur le bouton de sélection de fichier
                document.getElementById('fileInput').click();
            }

            function uploadImage(input) {
                // Vérifier si un fichier a été sélectionné
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        // Mettre à jour l'image de profil avec l'image sélectionnée
                        document.getElementById('profilePic').src = e.target.result;
                        // Soumettre le formulaire d'upload d'image
                        document.getElementById('imageUploadForm').submit();
                    };

                    // Lire le fichier en tant que Data URL
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <form action="index.php?action=logout" method="post">
            <button type="submit" class="bg-ks-orange rounded-lg p-2 font-bold lg:text-lg h-10 w-full">Se
                déconnecter</button>
        </form>
    </div>
</section>