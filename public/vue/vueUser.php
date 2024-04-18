<?php
$title = "Kaiserstuhl - " . strtoupper($_SESSION['username']);

extract($users);

// var_dump($users);
?>

<section
    class="flex flex-col min-h-screen pt-8 bg-ks-black bg-[url('img/ks-bg5-sm.png')] lg:bg-[url('img/ks-bg5-lg.png')] xl:bg-[url('img/ks-bg5-xl.png')] bg-contain ">

    <div class="flex-1 flex flex-col gap-8 text-ks-white">
        <h1 class="flex justify-center text-xl">Customisez votre profil:</h1>

        <div class="items-center flex flex-col gap-4 justify-center">
            <img id="profilePic"
                class="rounded-[50%] w-[200px] h-[200px] text-center items-center bg-cover border-solid border-4 hover:border-dashed active:animate-ping border-ks-orange cursor-pointer"
                src="<?= $Conf->MEMBERSFOLDER . $_SESSION['username'] ?>/<?= $avatar ?>"
                alt="Image de profil de <?= $_SESSION['username'] ?>" onclick="openFileExplorer()">

            <?= "Name: " . $username . " and Email: " . $email ?>
            <?php echo (count(glob("upload/members/test/*")) === 0) ? "FALSE" : "TRUE"; ?>
        </div>

        <form id="imageUploadForm" style="display:none;" action="index.php?action=user" method="post"
            enctype="multipart/form-data">
            <!-- Ajout d'un input file caché -->
            <input id="fileInput" type="file" name="newImage" style="display:none;" accept=".png,.jpg,.jpeg">
            <input class="hidden" id="fileSubmit" type="submit" value="Uploader" style="dislay:none;">
        </form>

        <script>
            document.querySelector("#fileInput").addEventListener("change", uploadImage)

            function openFileExplorer() {
                // Simuler un clic sur le bouton de sélection de fichier
                document.getElementById('fileInput').click();
            }

            function uploadImage(event) {
                const input = event.target;
                // Vérifier si un fichier a été sélectionné
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        // Soumettre le formulaire d'upload d'image
                        // setInterval(() => {
                        document.getElementById('fileSubmit').click();
                        // }, 1000);
                    };

                    // Lire le fichier en tant que Data URL
                    reader.readAsDataURL(input.files[0]);
                    console.log(reader.readAsDataURL(input.files[0]));
                }
            }
        </script>

        <?php
        if ($member_role == 'Admin') {
            echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un administrateur</p>";
        } elseif ($member_role == 'Candidate') {
            echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un Candidat</p>";
        } else {
            echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un Membre</p>";
        }

        if (isset($message)) {
            echo $message;
        } else {
            echo "";
        }
        ?>

        <form action="index.php?action=logout" method="post">
            <button type="submit" class="bg-ks-orange rounded-lg p-2 font-bold lg:text-lg h-10 w-full">Se
                déconnecter</button>
        </form>
    </div>
</section>