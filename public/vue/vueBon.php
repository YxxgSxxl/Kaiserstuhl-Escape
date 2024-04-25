<?php
extract($item);

$title = "Kaiserstuhl - " . " $name";


?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain"
    style="background-image: url('img/ks-bg5-xl.png');">

    <p class="text-white"><?= $name ?></p>
    <p class="text-white"><?= $price ?>€</p>
    <p class="text-white"><?= $delivery_time ?></p>
    <p class="text-white"><?= $description ?></p>

</section>