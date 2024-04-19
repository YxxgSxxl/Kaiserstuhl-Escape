<?php
$title = "Kaiserstuhl - Boutique";

if (isset($_SESSION['username'])) {
    extract($users);
} else {
    null;
}

// var_dump($users);
?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain"
    style="background-image: url('img/ks-bg5-xl.png');">

    <!-- Contenu principal qui s'étend pour remplir l'espace disponible, poussant le footer vers le bas -->
    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">
            CHOISISSEZ
            <span class="text-ks-orange">UN </span>DE NOS <span class="text-ks-orange">CADEAUX</span> À <span
                class="text-ks-orange">OFFRIR</span>
        </h1>

        <div class="flex items-center justify-center mb-32">
            <div class="grid grid-cols-1 gap-10 sm:gap-4 sm:grid-cols-2 lg:gap-16">
                <?php
                $listeBons = "";

                foreach ($items as $item) {
                    $id = $item['id_item'];
                    $img = $item['img'];
                    $name = $item['name'];
                    $price = $item['price'];
                    $deltime = $item['delivery_time'];

                    $listeBons .= include 'components/bons.php';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer à la fin de la section principale -->
    <footer class="bg-cover text-ks-white">
        <!-- Contenu du footer ici -->
    </footer>
</section>