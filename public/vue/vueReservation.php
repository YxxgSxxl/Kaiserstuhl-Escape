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
            <div class="flex flex-col md:flex-row justify-center mx-auto p-8">
                <form action="index.php?action=reservationSubmit&idRes=<?= $id_game ?>" method="post">
                    <div class="flex flex-col gap-3">
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

                    <?php
                    require_once 'components/html/formulaire.class.php';

                    $form = new Formulaire();

                    echo $form->debutForm("post", "index.php?action=reserver&idGameResConfirm=$id_game", "multipart/form-data");
                    echo $form->inputText();
                    echo $form->inputDate();
                    echo $form->inputNumber();

                    ?>
                </form>
            </div>
        </div>
    </div>
</section>