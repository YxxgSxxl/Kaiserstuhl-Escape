<?php
$title = "Kaiserstuhl - Contact";
?>

<style>
    /* Ajout de styles CSS pour centrer les détails et augmenter la taille de la flèche et du texte */

    /* Centrer les détails */
    .details-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        /* Ajustez la marge comme nécessaire */
    }

    /* Augmenter la taille de la flèche et du texte */
    summary::-webkit-details-marker {
        width: 20px;
        /* Ajustez la taille de la flèche */
        height: 20px;
        /* Ajustez la taille de la flèche */
        margin-right: 10px;
        /* Espacement entre la flèche et le texte */
    }

    /* Augmenter la taille de la flèche */

    summary {
        font-size: 24px;
        /* Ajustez la taille du texte */
    }

    button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 200px;
        height: 50px;
        border-radius: 50px;
        border: 0;
        outline: 0;
        font-size: 18px;
        background: green;
        color: #fff;
    }

    svg {
        margin: 0 0 0 10px;
    }

    button:hover svg {
        margin: 0 0 0 25px;
        transition: 0.3s;
    }

    button:not(:hover) svg {
        transition: 0.3s;
    }

    button:active {
        transform: scale(0.9, 0.9);
        transition: 200ms;
    }

    button:not(:active) {
        transition: 200ms;
    }
</style>

<section class="flex flex-col min-h-screen bg-cover bg-no-repeat" style="background-image: url('img/ks-bg1.png');">

    <h1 class="text-white font-semibold mt-0 pt-20 text-6xl text-center my-4O">
        <?php
        if ($_SESSION['lang'] === 'ENG')
            echo "CONTACT <span class='text-ks-orange'>US</span>";
        else
            echo "NOUS <span class='text-ks-orange'>CONTACTER</span>";
        ?>
    </h1>

    <!-- Conteneur pour centrer les détails -->
    <div class="details-container flex flex-col gap-4">
        <details class="details-color w-[300px] md:w-[500px] md:text-base lg:text-lg select-none cursor-pointer" open>
            <summary class="details-color text-ks-white text-2xl md:text-4xl p-2">
                <?php
                if ($_SESSION['lang'] === 'ENG')
                    echo "Make a review";
                else
                    echo "Faire un retour";
                ?>
            </summary>
            <div class="px-2 py-1 flex flex-col gap-[20px]  bg-black/30 text-ks-white p-6 rounded-lg w-full ">
                <!-- Contenu des détails -->
                <p class="text-ks-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto sapiente dolor, corporis, est
                    explicabo consequuntur accusamus rem, optio perspiciatis numquam incidunt. Quos cupiditate
                    temporibus,
                    nulla fuga aut ut commodi. Placeat.

                </p>


                <a href="vue/vueRetour.html">
                    <button> En savoir plus
                        <svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </a>

            </div>
        </details>
        <details class="details-color w-[300px] md:w-[500px] md:text-base lg:text-lg select-none cursor-pointer">
            <summary class="details-color text-ks-white text-2xl md:text-4xl p-2">
                <?php
                if ($_SESSION['lang'] === 'ENG')
                    echo "Make a suggestion";
                else
                    echo "Faire une suggestion";
                ?>
            </summary>
            <div
                class="px-2 py-1  px-2 py-1 flex flex-col gap-[20px]  bg-black/30 text-ks-white p-6 rounded-lg w-full ">
                <!-- Contenu des détails -->
                <p class="text-ks-white">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero corrupti non, aut sint repudiandae,
                    iure ut voluptatum porro dicta error et eos. Possimus numquam animi excepturi soluta, consequuntur
                    libero in!
                </p>
                <a href="vue/vueIdee.html">
                    <button> En savoir plus
                        <svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </a>

            </div>
        </details>
        <details class="details-color w-[300px] md:w-[500px] md:text-base lg:text-lg select-none cursor-pointer">
            <summary class="details-color text-ks-white text-2xl md:text-4xl p-2">
                <?php
                if ($_SESSION['lang'] === 'ENG')
                    echo "Job opportunity or internship request";
                else
                    echo "Demande d'emploi ou stage";
                ?>
            </summary>
            <div class="px-2 py-1 px-2 py-1 flex flex-col gap-[20px]  bg-black/30 text-ks-white p-6 rounded-lg w-full ">
                <p class="text-ks-white">
                    Contactez-nous via le formulaire en cliquant sur le bouton
                    via le formulaire ci-dessous. Ce formulaire de contact est
                    seulement pour une demande d'emploi ou du stage, toute autre demande
                    sera rejetée.
                </p>
                <a href="vue/vuePostulez.html">
                <button> En savoir plus
                    <svg viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" height="20" width="20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                            fill-rule="evenodd"></path>
                    </svg>
                </button>
                </a>
                
            </div>
        </details>
    </div>
</section>