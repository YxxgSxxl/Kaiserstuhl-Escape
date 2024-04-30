<?php
$title = "Kaiserstuhl - Ajouter Jeu";

global $Conf;

// var_dump($users);
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
                echo $form->debutForm("POST", "index.php?action=gameAddConfirm", "multipart/form-data");
                echo $form->inputImage("newImage", "Image", TRUE);
                echo $form->inputHidden("MAX_FILE_SIZE", "30000");
                echo $form->inputText("title", "Title");
                echo $form->inputText("longdesc", "Long longue");
                echo $form->inputText("minidesc", "Short description");
                echo $form->inputNumber("price", "Price");
                echo $form->inputText("duration", "Playtime (h)");
                echo $form->inputText("lengths", "Length (km)");
                echo $form->inputSelect("difficulty", "Difficulty", array('Easy' => 'Easy', 'Standard' => 'Standard', 'Hard' => 'Hard'));
                echo $form->inputDate("dateStart", "Start date");
                echo $form->inputDate("dateEnd", "End date");
                echo $form->submit("Modify");
                echo $form->finForm();
            } else {
                echo $form->debutForm("POST", "index.php?action=gameAddConfirm", "multipart/form-data");
                echo $form->inputImage("newImage", "Image", TRUE);
                echo $form->inputHidden("MAX_FILE_SIZE", "30000");
                echo $form->inputText("title", "Titre");
                echo $form->inputText("longdesc", "Description longue");
                echo $form->inputText("minidesc", "Petite description");
                echo $form->inputNumber("price", "Prix");
                echo $form->inputText("duration", "Durée de jeu (h)");
                echo $form->inputText("lengths", "Longueur du parcours (km)");
                echo $form->inputSelect("difficulty", "Difficulté", array('Easy' => 'Easy', 'Standard' => 'Standard', 'Hard' => 'Hard'));
                echo $form->inputDate("dateEnd", "Date de début");
                echo $form->inputDate("dateStart", "Date de fin");
                echo $form->submit("Modifier");
                echo $form->finForm();
            }

            ?>
        </div>
    </div>
</section>