<?php
if ($_SESSION['lang'] === 'ENG')
    $title = "Kaiserstuhl - Cart";
else
    $title = "Kaiserstuhl - Panier";


// var_dump($_SESSION['panier']);
// var_dump($items);
// var_dump($users);
// var_dump($panier);
?>

<head>
    <style>

    </style>
</head>
<!-- CSS -->
<style>
    #confetti-canvas {
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        pointer-events: none;
    }
</style>
<canvas id="confetti-canvas"></canvas>

<section class="flex flex-col min-h-screen p-8 bg-no-repeat  items-center bg-ks-black">

    <div class="flex-1 w-[100%] mx-auto">
        <h1 class="text-white font-semibold mt-0 pt-6 text-4xl md:text-6xl text-center mb-12 select-none">
            <?php if ($_SESSION['lang'] === 'ENG')
                echo "PAYMENT";
            else
                echo "PAIEMENT";
            ?>

        </h1>


        <div class="flex justify-center items-center gap-4">
            <p class="text-center text-lime-400 text-2xl font-bold">
                <?php if ($_SESSION['lang'] === 'ENG')
                    echo "The transaction has been completed";
                else
                    echo "La transaction a été effectuer";
                ?>

            </p>


            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#A3E635" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>


    </div>



    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script type="text/javascript">
        const canvas = document.querySelector('#confetti-canvas');
        function onButtonClick() {
            var myConfetti = confetti.create(canvas, {
                resize: true,
                useWorker: true
            });
            myConfetti({
                particleCount: 100,
                spread: 160
            });
        }
        window.addEventListener('load', onButtonClick);
    </script>

</section>