<?php
global $Conf;
?>
<!-- CART ITEM COMPONENT -->
<div>
    <div
        class="bg-ks-white/10 w-[60%] md:w-[90%] lg:w-[80%] xl:w-[70%] rounded-lg text-ks-white flex flex-col md:flex-row mx-auto mb-2 py-4 px-9 relative">
        <a href="index.php?action=cart=&deleteCartItem=<?= $id ?>" class="absolute top-4 right-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                stroke="#787878" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </a>

        <div class="flex flex-col md:flex-row gap-6 md:gap-12 text-sm md:items-center">
            <a class="border-solid border-2 border-ks-orange rounded-lg min-w-[20%] min-h-[20%]"
                href="index.php?action=goods=&idItem=<?= $id ?>">
                <img src="<?= $Conf->ITEMSFOLDER . $panier['img'] ?>" alt="<?= $panier['goodname'] ?>"
                    class="object-cover rounded-lg">
            </a>
            <div class="text-md w-fit">
                <label class="text-base text-ks-orange">Nom:</label>
                <p><?= $panier['goodname'] ?></p>
            </div>
            <div class="text-md w-fit">
                <label class="text-base text-ks-orange">Prix:</label>
                <p><?= $panier['price'] ?> €</p>
            </div>
            <div class="text-md w-fit">
                <label class="text-base text-ks-orange">Livraison:</label>
                <p><?= $panier['delivery_time'] ?></p>
            </div>
            <div class="text-md w-fit">
                <label class="text-base text-ks-orange">Quantité:</label>
                <p><?= $panier['quantite']['quantité'] ?></p>
            </div>
        </div>
    </div>
</div>
<!-- END CART ITEM COMPONENT -->