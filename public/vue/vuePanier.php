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
                echo "MY <span class='text-ks-orange'> CART</span>";
            else
                echo "MON <span class='text-ks-orange'> PANIER</span>";
            ?>

        </h1>

        <small class="text-ks-white flex justify-center my-4">
            <?php
            if (!empty($_SESSION['panier'])) {
                if ($_SESSION['lang'] === 'ENG')
                    echo "You have <span class='text-ks-orange px-1'>" . count($_SESSION['panier']) . "</span> different good(s) in your shopping cart";
                else
                    echo "Vous avez <span class='text-ks-orange px-1'>" . count($_SESSION['panier']) . "</span> article(s) différents dans votre panier";
            } else {
                if ($_SESSION['lang'] === 'ENG')
                    echo "You have <span class='text-ks-orange px-1'>0</span> different good(s) in your shopping cart";
                else
                    echo "Vous avez <span class='text-ks-orange px-1'>0</span> articles différents dans votre panier";
            }
            ?>
        </small>

        <div class="flex flex-col gap-4 mb-8 items-center">
            <?php
            $listePanier = "";
            $paniers = array();

            if (!empty($_SESSION['panier'])) {
                foreach ($_SESSION['panier'] as $id => $quantite) {
                    foreach ($items as $item) {
                        if ($item['id_item'] == $id) {
                            $panier = $item;
                            $panier['quantite'] = $quantite;
                            $paniers[] = $panier;
                        }
                    }

                    $listePanier .= include 'components/cartItem.php';
                }
            } else {
                if ($_SESSION['lang'] === 'ENG')
                    echo "<span class='text-ks-white mx-auto'>Your cart is empty</span>";
                else
                    echo "<span class='text-ks-white mx-auto'>Votre panier est vide</span>";
            }
            ?>
        </div>

        <div class="my-12 mx-auto w-[50%] md:w-[80%] lg:w-[60%]">
            <div class="flex justify-between items-center mb-4">
                <p class="text-ks-white"><?php if ($_SESSION['lang'] === 'ENG')
                    echo 'Total (duty free)';
                else
                    echo "Total (HT)";
                ?></p>
                <p class="text-ks-orange font-bold text-2xl">
                    <?php
                    $totalPanier = 0;
                    foreach ($paniers as $panier) {
                        $totalPanier += $panier['price'] * $panier['quantite']['quantité'];
                    }
                    echo $totalPanier;
                    ?>€
                </p>
            </div>
        </div>

        <a href="index.php?action=checkout"
            class="flex gap-2 justify-center mx-auto w-fit bg-ks-green hover:bg-green-500 text-ks-white py-2 px-4 mb-4 rounded-lg items-center text-center">
            <p class="text-lg font-bold"> <?php if ($_SESSION['lang'] === 'ENG')
                echo 'Buy';
            else
                echo "Payer";
            ?></p>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="10" cy="20.5" r="1" />
                <circle cx="18" cy="20.5" r="1" />
                <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
            </svg>
        </a>

        <a href="index.php?action=flushCart"
            class="flex gap-2 p-2 items-center mx-auto text-center justify-start text-lg font-bold w-fit text-white/60 hover:text-white">
            <?php if ($_SESSION['lang'] === 'ENG')
                echo 'I want to flush my cart';
            else
                echo "Je souhaite effacer mon panier";
            ?>
        </a>
    </div>

</section>