<?php
$title = "Kaiserstuhl - Boutique";
$header = include "./components/header_notlogged.html";

$listeBons = "";

foreach ($items as $item) {
    $name = $item['name'];
    $price = $item['price'];
    $deltime = $item['delivery_time'];
    // $listeBons .= include 'components/bons.php';
}

// var_dump($items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-slate-400">
    <section
        class="flex flex-col min-h-screen bg-ks-black bg-[url('img/ks-bg5-sm.png')] lg:bg-[url('img/ks-bg5-lg.png')] xl:bg-[url('img/ks-bg5-xl.png')] bg-contain ">
        <!-- Header inclus dans la section principale -->
        <?php $header ?>

        <!-- Contenu principal qui s'étend pour remplir l'espace disponible, poussant le footer vers le bas -->
        <div class="flex-1">
            <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">
                CHOISISSEZ
                <span class="text-ks-orange">UN </span>DE NOS <span class="text-ks-orange">CADEAUX</span> À <span
                    class="text-ks-orange">OFFRIR</span>
            </h1>

            <div class="flex items-center justify-center mb-32">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-16">
                    <?php include 'components/bons.php'; ?>
                </div>
            </div>
        </div>

        <!-- Footer à la fin de la section principale -->
        <footer class="bg-cover text-ks-white">
            <!-- Contenu du footer ici -->
        </footer>
    </section>
</body>

</html>