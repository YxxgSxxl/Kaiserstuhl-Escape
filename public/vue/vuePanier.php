<?php
$title = "Kaiserstuhl - Panier";

var_dump($_SESSION);
// var_dump($items);
// var_dump($users);
// var_dump($panier);
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div class="flex-1 w-[100%] mx-auto">
        <h1 class="text-white font-semibold mt-0 pt-6 text-4xl md:text-6xl text-center mb-12 select-none">
            MON <span class="text-ks-orange"> PANIER</span>
        </h1>

        <small class="text-ks-white flex justify-center my-4">
            <?php
            if (!empty($_SESSION['panier'])) {
                echo "Vous avez <span class='text-ks-orange px-1'>" . count($_SESSION['panier']) . "</span> article(s) différents dans votre panier";
            } else {
                echo "Vous avez <span class='text-ks-orange px-1'>0</span> articles différents dans votre panier";
            }
            ?>
        </small>

        <div class="flex flex-col gap-4 mb-8">
            <?php
            $listePanier = "";
            $paniers = array();

            if (!empty($_SESSION['panier'])) {
                foreach ($_SESSION['panier'] as $panier) {

                    $listePanier .= include 'components/cartItem.php';
                }
            } else {
                echo "<span class='text-ks-white mx-auto'>Votre panier est vide</span>";
            }
            ?>
        </div>

        <a href="index.php?action=payment"
            class="flex gap-2 justify-center mx-auto w-fit bg-ks-green hover:bg-green-500 text-ks-white py-2 px-4 mb-4 rounded-lg items-center text-center">
            <p class="text-lg font-bold">Payer</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="10" cy="20.5" r="1" />
                <circle cx="18" cy="20.5" r="1" />
                <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
            </svg>
        </a>

        <a href="index.php?action=flushCart"
            class="flex gap-2 p-2 items-center mx-auto text-center justify-start text-lg font-bold w-fit text-white/60 hover:text-white">
            Je souhaite effacer mon panier
        </a>
    </div>

</section>