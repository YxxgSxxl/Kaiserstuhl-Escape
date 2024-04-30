<?php
if ($_SESSION['lang'] === 'ENG')
    $title = "Kaiserstuhl - Modify Game";
else
    $title = "Kaiserstuhl - Modifier Jeu";

if (isset($_SESSION['username'])) {
    extract($users);
} else {
    null;
}

var_dump($game);
?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain"
    style="background-image: url('img/ks-bg5-xl.png');">

    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">
            <span class="text-ks-orange">
                <?php if ($_SESSION['lang'] === 'ENG')
                    echo 'MODIFY </span>A<span class="text-ks-orange"> GAME</span>';
                else
                    echo 'MODIFIER </span>UN<span class="text-ks-orange"> JEU</span>';
                ?>
        </h1>

        <div class="flex items-center justify-center mb-32">
            <?php

            require_once 'components/html/formulaire.class.php';

            $form = new Formulaire();

            if ($_SESSION['lang'] === 'ENG') {
                echo $form->debutForm("POST", "index.php?action=modificationJeuConfirm", "multipart/form-data");
                echo $form->inputID("id_game", "ID", $game['id_game'] ? $game['id_game'] : '');
                echo $form->inputText("title", "Title", $game['title'] ? $game['title'] : '');
                echo $form->inputText("longdesc", "Long description", $game['longdesc'] ? $game['longdesc'] : '');
                echo $form->inputText("minidesc", "Short description", $game['minidesc'] ? $game['minidesc'] : '');
                echo $form->inputNumber("price", "Price", $game['price'] ? $game['price'] : '');
                echo $form->inputText("duration", "Playtime (h)", $game['duration'] ? $game['duration'] : '');
                echo $form->inputText("lengths", "Length (km)", $game['lengths'] ? $game['lengths'] : '');
                echo $form->inputDate("dateStart", "Start Date", $game['dateStart'] ? $game['dateStart'] : '');
                echo $form->inputDate("dateEnd", "End date", $game['dateEnd'] ? $game['dateEnd'] : '');
                echo $form->inputSelect("difficulty", "Difficulty", array('Easy' => 'Easy', 'Standard' => 'Standard', 'Hard' => 'Hard'), $game['difficulty'] ? $game['difficulty'] : '');
                echo $form->inputImage("img", "Image");
                echo $form->submit("Modify");
                echo $form->finForm();
            } else {
                echo $form->debutForm("POST", "index.php?action=modificationJeuConfirm", "multipart/form-data");
                echo $form->inputID("id_game", "ID", $game['id_game'] ? $game['id_game'] : '');
                echo $form->inputText("title", "Titre", $game['title'] ? $game['title'] : '');
                echo $form->inputText("longdesc", "Description longue", $game['longdesc'] ? $game['longdesc'] : '');
                echo $form->inputText("minidesc", "Petite description", $game['minidesc'] ? $game['minidesc'] : '');
                echo $form->inputNumber("price", "Prix", $game['price'] ? $game['price'] : '');
                echo $form->inputText("duration", "Durée de jeu (h)", $game['duration'] ? $game['duration'] : '');
                echo $form->inputText("lengths", "Longueur du parcours (km)", $game['lengths'] ? $game['lengths'] : '');
                echo $form->inputSelect("difficulty", "Difficulté", array('Easy' => 'Easy', 'Standard' => 'Standard', 'Hard' => 'Hard'), $game['difficulty'] ? $game['difficulty'] : '');
                echo $form->inputDate("dateStart", "Date de début", $game['dateStart'] ? $game['dateStart'] : '');
                echo $form->inputDate("dateEnd", "Date de fin", $game['dateEnd'] ? $game['dateEnd'] : '');
                echo $form->inputImage("img", "Image");
                echo $form->submit("Modifier");
                echo $form->finForm();
            }
            ?>
        </div>
    </div>
</section>