<?php
$title = "Kaiserstuhl Outdoor";
$message = "";

if (!empty($succes)) {
    echo $succes;
}
?>

<body class="overflow-x-hidden bg-ks-black">

    <main class="relative bg-ks-black">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center my-4O">
            <?php
            if ($_SESSION['lang'] === 'ENG')
                echo "OUR <span class='text-ks-orange'>TEAM</span>";
            else
                echo "NOTRE <span class='text-ks-orange'>EQUIPE</span>";
            ?>
        </h1>

        <section class="h-[60vh] md:h-[80vh] md:flex justify-between items-center bg-ks-black px-[15%] pb-10">

        </section>
    </main>
</body>