<?php
$title = "Kaiserstuhl - Boutique";
$header = include "./components/header_notlogged.html";
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

        <div class="flex-1">

        </div>

        <!-- Footer à la fin de la section principale -->
        <footer class="bg-cover text-ks-white">
            <!-- Contenu du footer ici -->
        </footer>
    </section>
</body>

</html>