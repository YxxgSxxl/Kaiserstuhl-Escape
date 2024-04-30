<?php
if ($_SESSION['lang'] === 'ENG')
    $title = "Kaiserstuhl - Modify Voucher";
else
    $title = "Kaiserstuhl - Modifier Bon";

if (isset($_SESSION['username'])) {
    extract($users);
} else {
    null;
}
?>

<section
    class="flex flex-col min-h-screen bg-no-repeat bg-ks-black bg-[url('img/ks-bg5.png')] lg:bg-[url('img/ks-bg5.png')] xl:bg-[url('img/ks-bg5.png')] bg-contain"
    style="background-image: url('img/ks-bg5-xl.png');">

    <div class="flex-1">
        <h1 class="text-white font-semibold mt-0 pt-20 text-4xl md:text-6xl text-center mb-32 select-none">
            <span class="text-ks-orange">
                <?php if ($_SESSION['lang'] === 'ENG')
                    echo 'MODIFY </span>A<span class="text-ks-orange"> GOOD</span>';
                else
                    echo 'MODIFIER </span>UN<span class="text-ks-orange"> CADEAU</span>';
                ?>
        </h1>

        <div class="flex items-center justify-center mb-32">
            <?php

            require_once 'components/html/formulaire.class.php';

            $form = new Formulaire();

            if ($_SESSION['lang'] === 'ENG') {
                echo $form->debutForm("POST", "index.php?action=modificationConfirm", "multipart/form-data");
                echo $form->inputID("id_item", "ID", $item['id_item'] ? $item['id_item'] : '');
                echo $form->inputText("goodname", "Name", $item['goodname'] ? $item['goodname'] : '');
                echo $form->inputText("gooddesc", "Description", $item['gooddesc'] ? $item['gooddesc'] : '');
                echo $form->inputNumber("price", "Price", $item['price'] ? $item['price'] : '');
                echo $form->inputSelect("delivery_time", "Delivery time", ['Instantané' => 'Instantané', '1 Jour' => '1 Jour', '2 Jours' => '2 Jours', '3 Jours' => '3 Jours', '4 Jours' => '4 Jours', '5 Jours' => '5 Jours', '6 Jours' => '6 Jours', '7 Jours' => '7 Jours'], $item['delivery_time'] ? $item['delivery_time'] : '');
                echo $form->inputImage("img", "Image");
                echo $form->submit("Modify");
                echo $form->finForm();
            } else {
                echo $form->debutForm("POST", "index.php?action=modificationConfirm", "multipart/form-data");
                echo $form->inputID("id_item", "ID", $item['id_item'] ? $item['id_item'] : '');
                echo $form->inputText("goodname", "Nom", $item['goodname'] ? $item['goodname'] : '');
                echo $form->inputText("gooddesc", "Description", $item['gooddesc'] ? $item['gooddesc'] : '');
                echo $form->inputNumber("price", "Prix", $item['price'] ? $item['price'] : '');
                echo $form->inputSelect("delivery_time", "Délai de livraison", ['Instantané' => 'Instantané', '1 Jour' => '1 Jour', '2 Jours' => '2 Jours', '3 Jours' => '3 Jours', '4 Jours' => '4 Jours', '5 Jours' => '5 Jours', '6 Jours' => '6 Jours', '7 Jours' => '7 Jours'], $item['delivery_time'] ? $item['delivery_time'] : '');
                echo $form->inputImage("img", "Image");
                echo $form->submit("Modifier");
                echo $form->finForm();
            }
            ?>
        </div>
    </div>
</section>