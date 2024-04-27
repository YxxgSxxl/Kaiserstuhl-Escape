<?php
extract($item);
var_dump($item);

$title = "Kaiserstuhl - " . " $name";

global $Conf;
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div
        class="bg-ks-white/10 w-[100%] md:w-[80%] rounded-lg text-ks-white flex flex-col md:flex-row justify-center mx-auto p-8">
        <div class="w-[80%] md:w-[40%] mx-auto mb-6 flex h-auto justify-center items-center">
            <img src="<?= $Conf->ITEMSFOLDER . $img ?>" alt="" class="border-solid border-4 border-ks-orange">
        </div>

        <div class="flex flex-col gap-1 w-[auto] md:w-[50%]">
            <h1 class="text-xl md:text-2xl lg:text-4xl"><?= $name ?></h1>
            <p class="text-lg lg:text-xl mb-2"><?= $price ?>€</p>
            <p class="mb-2 text-sm"><?= $description ?></p>
            <p class="mb-4">Livraison : <span class="text-ks-orange"><?= $delivery_time ?></span></p>

            <form action="index.php?action=checkout" method="post">
                <div class="flex flex-col gap-3">
                    <label for="quantity">Quantité:</label>
                    <input type="number" name="quantity" id="quantity" min="1" max="99" value="1"
                        class="w-1/4 md:w-auto p-1 md:p-4 md:text-xl border-solid border-2 border-ks-orange bg-ks-black/40 text-ks-white rounded-md">
                    <a href="index.php?action=cart&idProduct=<?= $id_item ?>"
                        class="bg-ks-orange hover:bg-orange-300 rounded-md py-1 md:py-2 hover:bg-ks-white/50 text-center cursor-pointer">
                        Ajouter au panier
                    </a>
                    <input type="submit" name="acheter" value="Acheter"
                        class="text-ks-white bg-ks-green hover:bg-green-500 rounded-md py-1 md:py-2 hover:bg-ks-white/50 cursor-pointer">
                    </input>
                </div>
            </form>
        </div>
    </div>

</section>