<?php
if ($_SESSION['lang'] === 'ENG')
    $title = "Kaiserstuhl - Booking";
else
    $title = "Kaiserstuhl - Réservation";

extract($game);
var_dump($game);
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div class="flex-1 w-[100%] mx-auto">
        <h1 class="text-white font-semibold mt-0 pt-6 text-4xl md:text-6xl text-center mb-12 select-none">
            <?php if ($_SESSION['lang'] === 'ENG')
                echo "I WANNA <span class='text-ks-orange'> BOOK</span>";
            else
                echo "JE <span class='text-ks-orange'> RÉSERVE</span>";
            ?>
        </h1>

        <div class="">
            <div class="flex flex-col md:flex-row gap-0 md:gap-12 justify-center mx-auto p-8">
                <div class="flex flex-col gap-3 mb-20">
                    <h2 class="text-xl md:text-2xl text-ks-white text-center font-semibold"><?= $title ?></h2>
                    <img src="<?= $Conf->GAMESFOLDER . $img ?>" alt="<?= $title ?>"
                        class="w-[100%] md:w-[80%] mx-auto rounded-lg">
                    <p class="text-center text-lg text-ks-white">
                        <?php if ($_SESSION['lang'] === 'ENG')
                            echo "For the <span class='text-ks-orange'>" . format_date($dateStart) . "</span>, Ends <span class='text-ks-orange'>" . format_date($dateEnd) . "</span>";
                        else
                            echo "Pour le <span class='text-ks-orange'>" . format_date($dateStart) . "</span>, fini le <span class='text-ks-orange'>" . format_date($dateEnd) . "</span>";
                        ?>
                    </p>
                </div>

                <div class="flex flex-col gap-4 items-center justify-center mb-32">
                    <?php
                    require_once 'components/html/formulaire.class.php';

                    $form = new Formulaire();

                    echo $form->debutForm("POST", "index.php?action=reserver&idGameResConfirm=$id_game", "multipart/form-data");
                    echo $form->inputNumber("people", "Nombre de personnes", 1);
                    echo $form->inputDate("dates", "Date de réservation");
                    echo $form->inputSelect("time", "Créneau horraire", [
                        "9h - 11h" => "9h - 11h",
                        "11h - 13h" => "11h - 13h",
                        "14h - 16h" => "14h - 16h"
                    ]);
                    echo $form->submit("Réserver");
                    echo $form->finForm();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>