<!-- BONS COMPONENT -->
<div class="flex flex-col">
    <a href="index.php?action=games=&id=<?= $id ?>">
        <img class="w-[300px] h-auto" src="<?= $img ?>" alt="Image du bien à vendre">
    </a>
    <div class="text-ks-white flex flex-col gap-4 w-[300px] py-2">
        <h3 class="text-xl"><? $title ?></h3>
        <small class="flex flex-col gap-2 h-20 overflow-hidden">
            <div>Temps de jeu : <?= $duration ?>h | longueur : <?= $length ?> km <br></div>
            <?= $minidesc ?> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus laborum reiciendis
            voluptates officia ab eos animi saepe, provident minima inventore dolorum voluptatem illum recusandae
            numquam itaque modi optio. Veniam, magnam.
        </small>
    </div>
    <a href="index.php?action=games=&id=<?= $id ?>"
        class="flex gap-2 justify-center bg-ks-orange text-ks-white p-2 items-center text-center rounded-lg">
        <p class="text-lg font-bold">En savoir plus</p>
    </a>
</div>
<!-- END BONS COMPONENT -->