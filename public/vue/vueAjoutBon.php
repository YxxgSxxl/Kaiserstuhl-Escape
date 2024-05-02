<?php
if ($_SESSION['lang'] === 'ENG')
    $title = "Kaiserstuhl - Add good";
else
    $title = "Kaiserstuhl - Ajouter bon";

global $Conf;
?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain">

    <!-- Contenu principal qui s'étend pour remplir l'espace disponible, poussant le footer vers le bas -->
    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-20 select-none">
            <?php if ($_SESSION['lang'] === 'ENG')
                echo '<span class="text-ks-orange">ADD</span> A GOOD';
            else
                echo '<span class="text-ks-orange">AJOUTER</span> UN BON';
            ?>
        </h1>

        <div class="flex items-center justify-center mb-32">
            <?php
            require_once 'components/html/formulaire.class.php';

            $form = new Formulaire();

            if ($_SESSION['lang'] === 'ENG') {
                echo $form->debutForm("POST", "index.php?action=goodAddConfirm", "multipart/form-data");
                echo $form->inputImage("newImage", "Image", TRUE);
                echo $form->inputHidden("MAX_FILE_SIZE", "30000");
                echo $form->inputText("goodname", "Name", "", "Name of the good");
                echo $form->inputText("gooddesc", "Description", "", "Description of the good");
                echo $form->inputNumber("price", "Price", "", "Prix of the good");
                echo $form->inputSelect("delivery_time", "Delivery time", [
                    "Instant" => "Instant",
                    "1 Day" => "1
                    Day",
                    "2 Days" => "2 Days",
                    "3 Days" => "3 Days",
                    "4 Days" => "4 Days",
                    "5 Days" => "5 Days",
                    "6
                    Days" => "6 Days",
                    "7 Days" => "7 Days"
                ]);
                echo $form->submit("Add");
                echo $form->finForm();
            } else {
                echo $form->debutForm("POST", "index.php?action=goodAddConfirm", "multipart/form-data");
                echo $form->inputImage("newImage", "Image", TRUE);
                echo $form->inputHidden("MAX_FILE_SIZE", "30000");
                echo $form->inputText("goodname", "Nom", "", "Nom du bon");
                echo $form->inputText("gooddesc", "Description", "", "Description du bon");
                echo $form->inputNumber("price", "Prix", "", "Prix du bon");
                echo $form->inputSelect("delivery_time", "Délai de livraison", [
                    "Instant" => "Instant",
                    "1 Day" => "1
                    Day",
                    "2 Days" => "2 Days",
                    "3 Days" => "3 Days",
                    "4 Days" => "4 Days",
                    "5 Days" => "5 Days",
                    "6
                    Days" => "6 Days",
                    "7 Days" => "7 Days"
                ]);
                echo $form->submit("Ajouter");
                echo $form->finForm();
            }

            ?>
        </div>
    </div>
</section>