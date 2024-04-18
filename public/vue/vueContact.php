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

    summary {
        font-size: 24px;
        /* Ajustez la taille du texte */
    }
</style>

<section class="h-[100vh] lg:h-[100vh] bg-cover bg-no-repeat" style="background-image: url('img/ks-bg1.png');">

    <h1 class="text-white font-semibold mt-0 pt-40 text-4xl lg:text-6xl text-center my-40">NOUS <span
            class="text-ks-orange">CONTACTER</span>
    </h1>

    <!-- Conteneur pour centrer les détails -->
    <div class="details-container">
        <details class="details-color w-[300px]">
            <summary class="details-color text-ks-white text-lg p-2">Faire un retour</summary>
            <div class="px-2 py-1">
                <!-- Contenu des détails -->
            </div>
        </details>
        <details class="details-color w-[300px]">
            <summary class="details-color text-ks-white text-lg p-2">Faire une suggestion</summary>
            <div class="px-2 py-1">
                <!-- Contenu des détails -->
            </div>
        </details>
        <details class="details-color w-[300px]" open>
            <summary class="details-color text-ks-white text-lg p-2">Demande d'emploi ou stage</summary>
            <div class="px-2 py-1">
                <p class="text-ks-white">
                    Contactez-nous via le formulaire en cliquant sur le bouton
                    via le formulaire ci-dessous. Ce formulaire de contact est
                    seulement pour une demande d'emploi ou du stage, toute autre demande
                    sera rejetée.
                </p>
            </div>
        </details>
    </div>
</section>