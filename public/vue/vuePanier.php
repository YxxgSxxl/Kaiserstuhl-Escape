<?php
$title = "Kaiserstuhl - Panier";

var_dump($_SESSION);
// var_dump($items);
// var_dump($users);
?>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat bg-ks-black">

    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-6 text-4xl md:text-6xl text-center mb-12 select-none">
            MON <span class="text-ks-orange"> PANIER</span>
        </h1>

        <div class="flex flex-col gap-4">
            <div
                class="bg-ks-white/10 w-[100%] md:w-[80%] rounded-lg text-ks-white flex flex-col md:flex-row justify-center mx-auto mb-4 p-8">
                <div class="">
                    <img src="" alt="">
                </div>
            </div>

            <a href="index.php?action=flushCart"
                class="flex gap-2 justify-center bg-ks-grey hover:bg-gray-600 text-ks-white p-2 items-center text-center">
                <p class="text-lg font-bold">Effacer panier</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </a>

            <a href="index.php?action=payment"
                class="flex gap-2 justify-center bg-ks-orange hover:bg-orange-300 text-ks-white p-2 items-center text-center">
                <p class="text-lg font-bold">Payer</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="10" cy="20.5" r="1" />
                    <circle cx="18" cy="20.5" r="1" />
                    <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                </svg>
            </a>
        </div>
    </div>

</section>