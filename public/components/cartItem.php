<?php
global $Conf;
?>
<!-- CART ITEM COMPONENT -->
<div>
    <div
        class="bg-ks-white/10 w-[100%] md:w-[80%] rounded-lg text-ks-white flex flex-col md:flex-row mx-auto mb-2 py-4 px-9">
        <div class="flex flex-col md:flex-row gap-6 md:gap-12 text-sm md:items-center">
            <a class="border-solid border-2 border-ks-orange rounded-lg"
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