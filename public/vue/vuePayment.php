<?php
if ($_SESSION['lang'] === 'ENG')
    $title = "Kaiserstuhl - Cart";
else
    $title = "Kaiserstuhl - Panier";


// var_dump($_SESSION['panier']);
// var_dump($items);
// var_dump($users);
// var_dump($panier);
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div class="flex-1 w-[100%] mx-auto">
        <h1 class="text-white font-semibold mt-0 pt-6 text-4xl md:text-6xl text-center mb-12 select-none">
            <?php if ($_SESSION['lang'] === 'ENG')
                echo "PAYMENT";
            else
                echo "PAIEMENT";
            ?>

        </h1>

</section>