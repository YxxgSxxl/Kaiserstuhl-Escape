<?php
$title = "Kaiserstuhl - Erreur";
$erreur = '<div class="erreur">Erreur : ' . $erreur . '</div>';
?>

<section class="h-[100vh] bg-ks-black bg-cover bg-no-repeat">

    <h1 class=" text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center my-20 mb-12 select-none">
        <span class="text-red-500"><?php echo $erreur ?></span>
    </h1>

    <small class="flex justify-center mx-auto py-1 px-4 bg-ks-orange w-fit rounded-lg text-lg">
        <a href="index.php" class="text-ks-white hover:underline">
            Retourner à l'accueil
        </a>
    </small>
</section>