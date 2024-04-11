<?php
$title = "Kaiserstuhl - Avis";
?>
<section class="h-[100vh] bg-cover bg-no-repeat" style="background-image: url('img/ks-bg4.png');">

    <h1 class="text-ks-white text-2xl mt-10 mb-8 md:mt-16 md:mb-8 text-center">
        FAITES NOUS UN <span class="text-ks-orange">RETOUR...</span>
    </h1>

    <form action="" method="post" class="bg-[#E4DEDA] w-[80%] md:w-[60%] lg:w-[40%] mx-auto p-6 rounded-lg">
        <div class="flex flex-col gap-4">
            <label for="review">Décrivez votre expérience :</label>
            <textarea class="bg-ks-white" name="message" cols="30" rows="10" placeholder="Message ici..."
                autocomplete="off" required></textarea>
            <button type="submit" class="bg-ks-grey/40 rounded-lg p-2 font-bold lg:text-lg h-10">Envoyer</button>
        </div>
    </form>
</section>