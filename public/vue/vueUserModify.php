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
            require_once 'components/html/formulaire.class.php';

            $form = new Formulaire();

            echo $form->debutForm("POST", "index.php?action=userModifyConfirm", "multipart/form-data");
            echo $form->inputEmail("email", "Email", $users['email'] ? $users['email'] : '');
            echo $form->inputPassword("password", "Mot de passe");
            echo $form->inputText("firstname", "Prénom", $users['firstname'] ? $users['firstname'] : '');
            echo $form->inputText("lastname", "Nom", $users['lastname'] ? $users['lastname'] : '');
            echo $form->inputText("street", "Adresse", $users['street'] ? $users['street'] : '');
            echo $form->inputText("zip_code", "Code postal", $users['zip_code'] ? $users['zip_code'] : '');
            echo $form->inputText("city", "Ville", $users['city'] ? $users['city'] : '');
            echo $form->inputText("country", "Pays", $users['country'] ? $users['country'] : '');
            echo $form->inputText("phonenum", "téléphone", $users['phonenum'] ? $users['phonenum'] : '');
            echo $form->submit("Modifier");
            echo $form->finForm();
            ?>
        </div>
    </div>
</section>