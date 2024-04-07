<?php
$title = "Kaiserstuhl - Boutique";
?>

<section
    class="min-h-[100vh] bg-ks-black bg-[url('img/ks-bg5-sm.png')] lg:bg-[url('img/ks-bg5-lg.png')] xl:bg-[url('img/ks-bg5-xl.png')] bg-contain relative lg:bg-cover bg-no-repeat flex-1 pb-40">
    <section class="h-[60vh] md:h-[100vh] bg-cover bg-no-repeat flex-1"
        style="background-image: url('img/ks-bg1.png');">

        <?php include "./components/header_notlogged.html"; ?>


        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">CHOISISSEZ
            <span class="text-ks-orange">UN </span>DE NOS <span class="text-ks-orange">CADEAUX</span> A <span
                class="text-ks-orange">OFFRIR</span>
        </h1>

        <div class="flex items-center justify-center h-screen">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-16">
                <!-- Premier enfant -->
                <div class="flex flex-col items-center justify-start mb-5">
                    <img class="max-w-[100%] w-[80%]" src="./img/ks-bons1.png.png" alt="bons">
                    <div class="bg-ks-grey flex items-center justify-between w-[80%] p-5">
                        <div class="text-ks-white ">
                            <h3 class="text-xl">Bon de réduction</h3>
                            <p class="text-sm font-light"><span class="text-ks-orange ">Temps</span> de livraison :
                                <span class="text-ks-orange">Instantané</span>
                            </p>
                        </div>
                        <h3 class="text-ks-orange">100€</h3>
                    </div>
                    <div class="w-[80%]">
                        <button class="w-full bg-ks-orange text-ks-white p-3">Ajouter au panier</button>
                    </div>
                </div>

                <!-- Deuxième enfant -->
                <div class="flex flex-col items-center justify-start mb-5">
                    <img class="max-w-[100%] w-[80%]" src="./img/ks-bons1.png.png" alt="bons">
                    <div class="bg-ks-grey flex items-center w-[80%] justify-between p-5">
                        <div class="text-ks-white">
                            <h3 class="text-xl">Bon de réduction</h3>
                            <p class="text-sm font-light"><span class="text-ks-orange ">Temps</span> de livraison :
                                <span class="text-ks-orange">Instantané</span>
                            </p>
                        </div>
                        <h3 class="text-ks-orange">100€</h3>
                    </div>
                    <div class="w-[80%]">
                        <button class="w-full bg-ks-orange text-ks-white p-3">Ajouter au panier</button>
                    </div>
                </div>

                <!-- Troisième enfant -->
                <div class="flex flex-col items-center justify-start mb-5">
                    <img class="max-w-[100%] w-[80%]" src="./img/ks-bons1.png.png" alt="bons">
                    <div class="bg-ks-grey flex items-center w-[80%] justify-between p-5">
                        <div class="text-ks-white">
                            <h3 class="text-xl">Bon de réduction</h3>
                            <p class="text-sm font-light"><span class="text-ks-orange ">Temps</span> de livraison :
                                <span class="text-ks-orange">Instantané</span>
                            </p>
                        </div>
                        <h3 class="text-ks-orange">100€</h3>
                    </div>
                    <div class="w-[80%]">
                        <button class="w-full bg-ks-orange text-ks-white p-3">Ajouter au panier</button>
                    </div>
                </div>

                <!-- Quatrième enfant -->
                <div class="flex flex-col items-center justify-start mb-5">
                    <img class="max-w-[100%] w-[80%]" src="./img/ks-bons1.png.png" alt="bons">
                    <div class="bg-ks-grey flex items-center w-[80%] justify-between p-5">
                        <div class="text-ks-white">
                            <h3 class="text-xl">Bon de réduction</h3>
                            <p class="text-sm font-light"><span class="text-ks-orange ">Temps</span> de livraison :
                                <span class="text-ks-orange">Instantané</span>
                            </p>
                        </div>
                        <h3 class="text-ks-orange">100€</h3>
                    </div>
                    <div class="w-[80%]">
                        <button class="w-full bg-ks-orange text-ks-white p-3">Ajouter au panier</button>
                    </div>
                </div>
                <!-- Ajoutez plus d'enfants au besoin -->
            </div>
        </div>
    </section>