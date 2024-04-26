<?php
$title = "Kaiserstuhl - Boutique";

if (isset($_SESSION['username'])) {
    extract($users);
} else {
    null;
}

// var_dump($items);
?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain"
    style="background-image: url('img/ks-bg5-xl.png');">

    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">
            <span class="text-ks-orange">MODIFIER </span>UN<span class="text-ks-orange"> CADEAU</span>
        </h1>

        <div class="flex flex-col gap-12 items-center justify-center mb-32">
            <div class="grid grid-cols-1 gap-10 sm:gap-4 sm:grid-cols-2 lg:gap-16">
            </div>
        </div>
    </div>
</section>