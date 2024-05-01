<?php
$title = "Kaiserstuhl Outdoor";
$message = "";

if (!empty($succes)) {
    echo $succes;
}
?>

<style>
    summary {
        padding: 10px;
        border-radius: 5px;
    }

    details[open] summary {
        border-radius: 5px 5px 0 0;
    }

    details {
        border-radius: 5px;
        margin-bottom: 10px;
        color: black;
    }

    /* extra styles */
    article {
        padding: 20px;
    }

    article>*:first-child {
        margin: 0;
    }

    article>*+* {
        margin: 0.75em 0 0 0;
    }

    details code {
        font-size: 1.1em;
    }

    details a {
        color: #010b13;
    }
</style>

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

        <section class="min-h-screen bg-ks-black px-[15%] pb-10">
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-70 h-auto mx-auto" src="img/team/Betina.jpg" alt="Betina">
                    <h3 class="text-white mt-4 font-semi-bold">Betina</h3>
                    <p class="text-white font-normal">Princesse de l'énigme</p>
                    <p class="text-white font-light">Développement</p>
                    <p class="text-white font-extralight">Service</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Eva.jpg" alt="Eva">
                    <h3 class="text-white mt-4 font-semi-bold">Eva</h3>
                    <p class="text-white font-normal">L'annonciatrice</p>
                    <p class="text-white font-light">Chef du marketing</p>
                    <p class="text-white font-extralight">Direction des ventes</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Helden_KE-1.jpg"
                        alt="Silvia">
                    <h3 class="text-white mt-4 font-semi-bold">Silvia</h3>
                    <p class="text-white font-normal">Aventurier du matériel</p>
                    <p class="text-white font-light">Spécialistes en matériaux</p>
                    <p class="text-white font-extralight">Production</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Lena.jpg" alt="Lena">
                    <h3 class="text-white mt-4 font-semi-bold">Lena</h3>
                    <p class="text-white  font-normal">Docteur en produits</p>
                    <p class="text-white font-light">Produit - Design</p>
                    <p class="text-white font-extralight">Traitement des textiles</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Melina.jpg" alt="Melina">
                    <h3 class="text-white mt-4 font-semi-bold">Melina</h3>
                    <p class="text-white  font-normal">Chef de gang</p>
                    <p class="text-white font-light">Resp. Manifestation</p>
                    <p class="text-white font-extralight">Développement</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Nik.jpg" alt="Nik">
                    <h3 class="text-white mt-4 font-semi-bold">Nik</h3>
                    <p class="text-white  font-normal">La farce </p>
                    <p class="text-white font-light">Direction de la production</p>
                    <p class="text-white font-extralight">Développement</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Sarah.jpg" alt="Sarah">
                    <h3 class="text-white mt-4 font-semi-bold">Sarah</h3>
                    <p class="text-white  font-normal">La fée du design</p>
                    <p class="text-white font-light">Conception web</p>
                    <p class="text-white font-extralight">Médias sociaux</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Sasha.jpg" alt="Sasha">
                    <h3 class="text-white mt-4 font-semi-bold">Sasha</h3>
                    <p class="text-white  font-normal">Princesse du design</p>
                    <p class="text-white font-light">Conception graphique</p>
                    <p class="text-white font-extralight">Spécialiste de l'impression</p>
                </div>
                <div class="flex flex-col items-center">
                    <img class="filter grayscale w-full sm:w-60 h-auto mx-auto" src="img/team/Thilo_Yummy.jpg"
                        alt="Thilo">
                    <h3 class="text-white mt-4 font-semi-bold">Thilo</h3>
                    <p class="text-white font-normal">Le tireur de ficelle</p>
                    <p class="text-white font-light">Fille à tout faire</p>
                    <p class="text-white font-extralight">„Geht nicht, gibts nicht.“</p>
                </div>

            </div>

            <section class="min-h-screen flex flex-col gap-[40px] bg-ks-black px-[15%] pb-10">

                <h2 id="FAQ" class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center my-4O">
                    <?php
                    if ($_SESSION['lang'] === 'ENG')
                        echo "FAQ";
                    else
                        echo "FAQ";
                    ?>
                </h2>
                <details class="bg-ks-orange text-center cursor-pointer">
                    <summary class="font-bold">Qu'est-ce qu'un escape game ?</summary>
                    <article>
                        <p>Un escape game est un jeu d'évasion grandeur nature où les participants sont enfermés dans
                            une
                            pièce et doivent résoudre des énigmes pour trouver des indices et s'échapper dans un temps
                            imparti.</p>
                    </article>
                </details>

                <details class="bg-ks-orange text-center cursor-pointer">
                    <summary class="font-bold">Combien de temps dure un escape game ?</summary>
                    <article>
                        <p>La durée typique d'un escape game est d'environ 60 minutes, bien que cela puisse varier selon
                            les
                            établissements.</p>
                    </article>
                </details>

                <details class="bg-ks-orange text-center cursor-pointer cursor-pointer">
                    <summary class="font-bold">De combien de personnes a-t-on besoin pour jouer à un escape game ?
                    </summary>
                    <article>
                        <p>Le nombre de participants varie selon les salles, mais la plupart des escape games sont
                            conçus
                            pour des groupes de 2 à 6 personnes. Certaines salles peuvent accueillir des groupes plus
                            importants en les divisant en équipes.
                    </article>
                </details>

                <details class="bg-ks-orange text-center cursor-pointer">
                    <summary class="font-bold">Combien de temps dure un escape game ?</summary>
                    <article>
                        <p>La durée typique d'un escape game est d'environ 60 minutes, bien que cela puisse varier selon
                            les
                            établissements.</p>
                    </article>
                </details>

                <details class="bg-ks-orange text-center cursor-pointer">
                    <summary class="font-bold">Quel est l'âge recommandé pour jouer à un escape game ?</summary>
                    <article>
                        <p>La plupart des escape games sont adaptés aux adultes et aux adolescents, mais certains
                            établissements proposent également des versions pour les enfants, généralement à partir de 8
                            ans. Les enfants plus jeunes peuvent trouver les énigmes trop complexes.</p>
                    </article>
                </details>

                <details class="bg-ks-orange text-center cursor-pointer">
                    <summary class="font-bold">Peut-on jouer à un escape game si l'on est claustrophobe ?</summary>
                    <article>
                        <p>Les escape games sont conçus pour être des expériences divertissantes et sûres, mais si vous
                            êtes
                            claustrophobe, vous pouvez être mal à l'aise dans une pièce fermée. Il est recommandé de
                            contacter l'établissement pour discuter de vos préoccupations spécifiques.</p>
                    </article>
                </details>
            </section>
    </main>
</body>