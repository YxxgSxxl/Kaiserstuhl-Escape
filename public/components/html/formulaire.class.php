<?php
/*******************************************************
Classe permettant de générer des formulaires
*******************************************************/
class formulaire
{
    private $label;
    private $input;

    public function debutForm($method, $action, $enctype)
    {
        echo "<form method='" . $method . "' action='" . $action . "' enctype='" . $enctype . "' class='flex flex-col gap-form-gap bg-black/30 text-ks-white p-6 rounded-lg w-full backdrop-blur-xl sm:w-[28rem]'>";
    }

    public function finForm()
    {
        echo "</form>";
    }

    public function inputText($name, $label = "")
    {
        return "<div class='ks-label'>
        <label class='lg:text-lg font-normal'>$label</label>
        <input type='text' class='texte' name='" . $name . "' value='' placeholder='Entrez vos infortmations ici...'
        class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light'>
        </div>";
    }

    // public function inputPassword($name, $label = "")
    // {
    //     return "<div class='ks-label'>
    //     <label class='lg:text-lg font-normal'>
    //     <span>" . $label . "</span><input type='password' class='texte' name='" . $name . "' value=''><div style='color: red;'>*</div>
    //     </label>
    //     </div>";
    // }

    // public function inputEmail($name, $label = "")
    // {
    //     return "<div class='ks-label'>
    //     <label class='lg:text-lg font-normal'>
    //     <span>" . $label . "</span><input type='email' class='texte' name='" . $name . "' value=''><div style='color: red;'>*</div>
    //     </label>
    //     </div>";
    // }

    // public function inputTel($name, $label = "")
    // {
    //     return "<div class='ks-label'>
    //     <label class='lg:text-lg font-normal'>
    //     <span>" . $label . "</span><input type='tel' class='texte' name='" . $name . "' value=''><div style='color: red;'>*</div>
    //     </label>
    //     </div>";
    // }

    // public function inputDate($name, $label = "")
    // {
    //     return "<div class='ks-label'>
    //     <label class='lg:text-lg font-normal'>
    //     <span>" . $label . "</span><input type='date' class='texte' name='" . $name . "' value=''><div style='color: red;'>*</div>
    //     </label>
    //     </div>";
    // }

    // public function inputNumber($name, $label = "")
    // {
    //     return "<div class='ks-label'>
    //     <label class='lg:text-lg font-normal'>
    //     <span>" . $label . "</span><input type='number' class='texte' name='" . $name . "' value=''><div style='color: red;'>*</div>
    //     </label>
    //     </div>";
    // }

    public function inputHidden($name, $value)
    {
        return "<input type='hidden' name='" . $name . "' value='" . $value . "'>";
    }

    public function submit($name, $value)
    {
        return "<button type='submit' class='bg-ks-orange rounded-lg p-2 font-bold lg:text-lg h-10'>" . $value . "</button>";
    }
}