<!-- BONS COMPONENT -->
<div class="flex flex-col">
    <img class="w-[300px] h-auto" src="img/ks-bons1.png.png" alt="Image du bien à vendre">
    <div class="flex flex-raw justify-between bg-[#2A2A2A] w-full p-2">
        <div class="text-ks-white flex flex-col ">
            <h3 class="text-xl"><?= $name ?></h3>
            <small><span class="text-ks-orange">Temps</span> de livraison : <span
                    class="text-ks-orange"><?= $deltime ?></span></small>
        </div>
        <div class="text-ks-orange text-2xl font-semibold items-center"><?= $price ?>€</div>
    </div>
    <a href="index.php?action=payment"
        class="flex gap-2 justify-center bg-ks-orange text-ks-white p-2 items-center text-center">
        <p class="text-lg font-bold">Ajouter au panier</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#f2f2f2"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="10" cy="20.5" r="1" />
            <circle cx="18" cy="20.5" r="1" />
            <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
        </svg>
    </a>
</div>
<!-- END BONS COMPONENT -->