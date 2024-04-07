<?php
$title = "Kaiserstuhl - Connection";
?>

<section class="h-[100vh] bg-cover bg-no-repeat flex flex-col justify-center items-center p-4"
    style="background-image: url('img/ks-bg2.jpg');">

    <a href="index.php" class="absolute left-5 top-5"><svg xmlns="http://www.w3.org/2000/svg" width="71" height="71"
            viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M19 12H6M12 5l-7 7 7 7" />
        </svg></a>
    <form action="" method="post"
        class="flex flex-col gap-form-gap bg-black/30 text-ks-white p-6 rounded-lg w-full backdrop-blur-xl sm:w-[28rem]">
        <h1 class="text-ks-white text-4xl text-center mb-4">Connexion</h1>
        <div class="ks-label">
            <label class="lg:text-lg font-normal" for="text">Adresse <span class="text-ks-orange">mail</span> ou
                <span class="text-ks-orange">pseudo</span> :</label>
            <input type="text" name="email" placeholder="Entrez vos infortmations ici..."
                class="h-10 px-4 py-1 rounded-lg md:w-[400px] font-light">
        </div>
        <div class="ks-label">
            <label class="lg:text-lg font-normal" for="mdp">Mot de <span class="text-ks-orange">passe</span>
                :</label>
            <input type="password" name="mdp" placeholder="Entrez votre mot de passe ici..."
                class="h-10 px-4 py-1 rounded-lg md:w-[400px] font-light">
        </div>
        <a href=""><small class="text-ks-orange font-thin underline lg:text-sm">Mot de passe oublié ?</small></a>
        <button type="submit" class="bg-ks-orange rounded-lg p-2 font-bold lg:text-lg h-10">Se connecter</button>
        <hr class="hr-text" data-content="ou bien">

        <!-- Bouton de connexion avec les RS -->
        <?php require 'components/socials.html'; ?>

        <p class="text-white/60 text-center text-sm">Pas encore client ? <a href="index.php?action=register"
                class="underline hover:text-white/80">S'inscrire</a></p>
</section>