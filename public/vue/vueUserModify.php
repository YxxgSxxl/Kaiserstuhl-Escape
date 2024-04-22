<?php
$title = "Kaiserstuhl - Vos informations";

global $Conf;

// var_dump($users);
?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain">

    <!-- Contenu principal qui s'étend pour remplir l'espace disponible, poussant le footer vers le bas -->
    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-20 select-none">
            <span class="text-ks-orange">MODIFIEZ</span> VOS INFORMATIONS
        </h1>

        <div class="flex items-center justify-center mb-32">
            <?php
            // foreach ($users as $key => $value) {
            //     echo "Clé : " . $key . ", Valeur : " . $value . "<br>";
            // }
            
            require_once 'components/html/formulaire.class.php';

            $form = new Formulaire();

            echo $form->debutForm("POST", "index.php?action=userModifyConfirm", "multipart/form-data");
            echo $form->inputEmail("email", "Email", $users['email'] ? $users['email'] : '');
            echo $form->inputPassword("password", "Mot de passe");
            echo $form->submit("Modifier");
            echo $form->finForm();
            ?>
        </div>
    </div>
</section>