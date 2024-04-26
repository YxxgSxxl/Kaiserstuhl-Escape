<?php
$title = "Kaiserstuhl - Boutique";

if (isset($_SESSION['username'])) {
    extract($users);
} else {
    null;
}

var_dump($_FILES);

global $Conf;

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

        <div class="flex flex-col gap-12 items-center justify-center mb-32">
            <div class="grid grid-cols-1 gap-10 sm:gap-4 sm:grid-cols-2 lg:gap-16">
                <?php
                $listeBons = "";

                foreach ($items as $item) {
                    $id = $item['id_item'];
                    $img = $Conf->ITEMSFOLDER . $item['img'];
                    $name = $item['name'];
                    $price = $item['price'];
                    $deltime = $item['delivery_time'];

                    $listeBons .= include 'components/bons.php';
                }
                ?>
            </div>
            <div>
                <?php
                if (isset($_SESSION['username'])) {
                    if ($member_role == 'Admin') {
                        echo '<form action="index.php?action=goodAdd" method="POST">
                        <button type="submit"
                            class="flex flex-row gap-2 bg-ks-orange hover:bg-orange-300 text-white text-xl font-bold py-2 px-4 rounded">
                            Ajouter un cadeau
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                        </button>
                    </form>';
                    } else {
                        null;
                    }
                } else {
                    null;
                }
                ?>
            </div>
        </div>
    </div>
</section>