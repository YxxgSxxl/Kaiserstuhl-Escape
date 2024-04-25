<?php
extract($game);
var_dump($game);

$title = "Kaiserstuhl - " . " $title";
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div
        class="bg-ks-white/10 w-[100%] md:w-[80%] rounded-lg text-ks-white flex flex-col md:flex-row justify-center mx-auto p-8">

        <form action="index.php?action=chekout" method="post">
            <div class="flex flex-col gap-3">
                <label for="quantity">Quantité:</label>
                <input type="number" name="quantity" id="quantity" min="1" max="99" value="1"
                    class="w-1/4 md:w-auto p-1 md:p-4 md:text-xl border-solid border-2 border-ks-orange bg-ks-black/40 text-ks-white rounded-md">
                <div class="bg-ks-orange rounded-md py-1 md:py-2 hover:bg-ks-white/50 text-center cursor-pointer">
                    Ajouter au
                    panier</div>
                <input type="submit" value="Acheter"
                    class="text-ks-white bg-ks-green rounded-md py-1 md:py-2 hover:bg-ks-white/50 cursor-pointer">
                </input>
            </div>
        </form>
    </div>

</section>