<?php
$title = "Kaiserstuhl - " . strtoupper($_SESSION['username']);

extract($users);
?>

<section
    class="flex flex-col min-h-screen pt-8 bg-ks-black bg-[url('img/ks-bg5-sm.png')] lg:bg-[url('img/ks-bg5-lg.png')] xl:bg-[url('img/ks-bg5-xl.png')] bg-contain ">

    <div class="flex-1 flex flex-col gap-8 text-ks-white">
        <h1 class="text-center text-2xl">LE PROFIL DE <span class="text-ks-orange"><?= strtoupper($username) ?></span>
        </h1>

        <div class="flex flex-col justify-center md:flex-row md:gap-4">
            <div class="items-center flex flex-col gap-4 justify-center mb-4">
                <img id="profilePic"
                    class="rounded-[50%] w-[200px] md:w-[300px} h-[200px] md:h-[300px} text-center items-center bg-cover border-solid border-4 hover:border-dashed active:animate-ping border-ks-orange cursor-pointer"
                    src="<?= $Conf->MEMBERSFOLDER . $_SESSION['username'] ?>/<?= $avatar ?>"
                    alt="Image de profil de <?= $_SESSION['username'] ?>" onclick="openFileExplorer()">


                <form id="imageUploadForm" style="display:none;" action="index.php?action=user" method="post"
                    enctype="multipart/form-data">
                    <!-- Ajout d'un input file caché -->
                    <input id="fileInput" type="file" name="newImage" style="display:none;" accept=".png,.jpg,.jpeg">
                    <input class="hidden" id="fileSubmit" type="submit" value="Uploader" style="dislay:none;">
                </form>

                <!-- Script du formulaire d'upload d'image -->
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
                    echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un <span class='text-red-500'>administrateur</span></p>";
                } elseif ($member_role == 'Candidate') {
                    echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un <span class='text-ks-white'>Candidat</span></p>";
                } else {
                    echo "<p class='text-ks-orange text-center animate-pulse'>Vous êtes un Membre</p>";
                }
                ?>

                <?php
                if (isset($message)) {
                    echo $message;
                } else {
                    echo "";

                }
                ?>
            </div>

            <div
                class="bg-ks-white/0 md:bg-transparent text-ks-white flex flex-col gap-4 items-start mx-auto md:mx-0 justify-between rounded-lg p-4 w-[80%] md:w-[30%] md:items-center">
                <p class='text-lg underline underline-offset-2'>Email:</p><?= $email ?></p>

                <?php
                if ($lastname && $firstname) {
                    echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p><p>$lastname $firstname</p>";
                } elseif ($lastname) {
                    echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p><p>$lastname</p>";
                } elseif ($firstname) {
                    echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p><p>$firstname</p>";
                } else {
                    echo "<p class='text-lg text-center underline underline-offset-2'>nom/prénom:</p><p>/</p>";
                }
                ?>

                <p class='text-lg underline underline-offset-2'>Age:</p>
                <?php
                if ($age) {
                    echo "<p class='text-center'>$age ans</p>";
                } else {
                    echo "/";
                }
                ?>
                </p>

                <form class="w-fit items-center mx-auto mb-0" action="index.php?action=userModify" method="post">
                    <button type="submit"
                        class="bg-orange-500 rounded-lg p-2 px-6 font-bold text-sm lg:text-lg h-10 w-full">Modifier
                        mes informations</button>
                </form>

                <form class="w-fit items-center mx-auto mb-0" action="index.php?action=logout" method="post">
                    <button type="submit" class="bg-ks-orange rounded-lg p-2 px-6 font-bold lg:text-lg h-10 w-full">Se
                        déconnecter</button>
                </form>
            </div>

        </div>

        <hr class="w-[80%] mx-auto">

        <div class="text-center">
            <h2 class="text-lg">Réservations en cours:</h2>
        </div>

        <hr class="w-[80%] mx-auto">

        <a id="confirm" class="cursor-pointer w-fit items-center mx-auto">
            <form class="w-full mb-8" action="index.php?action=userDelete" method="post">
                <button type="submit" class="bg-red-500 rounded-lg p-2 px-6 font-bold text-sm lg:text-lg h-10 w-full">Je
                    souhaite
                    supprimer mon compte</button>
            </form>
        </a>

        <!-- Script de confirmation de suppression de compte -->
        <script>
            document.getElementById('confirm').addEventListener('click', function () {
                if (confirm('Do you really want to delete your user?')) {
                    document.getElementById('confirm').submit();
                } else {
                    event.preventDefault();
                }
            });
        </script>
    </div>
</section>