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
            <?php
            require_once 'components/html/formulaire.class.php';

            $form = new Formulaire();

            echo $form->debutForm("POST", "index.php?action=goodAddConfirm", "multipart/form-data");
            echo $form->inputImage("newImage", "Image", TRUE);
            echo $form->inputHidden("MAX_FILE_SIZE", "30000");
            echo $form->inputText("goodname", "Nom", "", "Nom du bon");
            echo $form->inputText("gooddesc", "Description", "", "Description du bon");
            echo $form->inputNumber("price", "Prix", "", "Prix du bon");
            echo $form->inputSelect("delivery_time", "Délai de livraison", [
                'Instantané' => 'Instantané',
                '1 Jour' => '1
            Jour',
                '2 Jours' => '2 Jours',
                '3 Jours' => '3 Jours',
                '4 Jours' => '4 Jours',
                '5 Jours' => '5 Jours',
                '6
            Jours' => '6 Jours',
                '7 Jours' => '7 Jours'
            ]);
            echo $form->submit("Ajouter");
            echo $form->finForm();
            ?>
        </div>
    </div>
</section>