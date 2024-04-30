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
        echo "<form method='" . $method . "' action='" . $action . "' enctype='" . $enctype . "' class='flex flex-col gap-form-gap bg-transparent md:bg-black/30 text-ks-white p-6 rounded-lg w-full backdrop-blur-xl sm:w-[28rem]'>";
    }

    public function finForm()
    {
        echo "</form>";
    }

    public function inputText($name, $label = "", $value = "", $placeholder = "")
    {
        return "<div class='ks-label'>
        <label class='lg:text-lg font-normal'>$label:</label>
        <input class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light' type='text' class='texte' name='" . $name . "' value='" . $value . "' placeholder=''" . $placeholder . "''>
        </div>";
    }

    public function inputEmail($name, $label = "", $value = "", $placeholder = "")
    {
        return "<div class='ks-label'>
        <label class='lg:text-lg font-normal'>$label:</label>
        <input class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light' type='email' class='texte' name='" . $name . "' value='" . $value . "' placeholder=''" . $placeholder . "''>
        </div>";
    }

    public function inputPassword($name, $label = "", $value = "", $placeholder = "")
    {
        return "<div class='ks-label'>
        <label class='lg:text-lg font-normal'>$label:</label>
        <input class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light' type='password' class='texte' name='" . $name . "' value='" . $value . "' placeholder=''" . $placeholder . "''>
        </div>";
    }

    public function inputNumber($name, $label = "", $value = "", $placeholder = "")
    {
        return "<div class='ks-label'>
        <label class='lg:text-lg font-normal'>$label:</label>
        <input class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light' type='number' class='texte' name='" . $name . "' value='" . intval($value) . "' placeholder=''" . $placeholder . "''>
        </div>";
    }

    public function inputDate($name, $label = "", $value = "", $placeholder = "")
    {
        return "<div class='ks-label'>
        <label class='lg:text-lg font-normal'>$label:</label>
        <input class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light' type='date' class='texte' name='" . $name . "' value='" . $value . "' placeholder=''" . $placeholder . "''>
        </div>";
    }

    public function inputSelect($name, $label = "", $options = [], $selected = "")
    {
        $selectOptions = "";
        foreach ($options as $value => $text) {
            $selectedAttr = ($value == $selected) ? "selected" : "";
            $selectOptions .= "<option class='text-black' value='" . $value . "' " . $selectedAttr . ">" . $text . "</option>";
        }

        return "<style>
        .select-text {
            color: black;
        }
        </style>
        <div class='ks-label text-white'>
            <label class='lg:text-lg font-normal text-white'>$label:</label>
            <select class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light text-white select-text' name='" . $name . "'>
                " . $selectOptions . "
            </select>
        </div>";
    }
    public function inputImage($name, $label = "", $required = false)
    {
        $requiredAttribute = $required ? "required" : ""; // On ajoute l'attribut required si on le veut, sinon rien

        return "<div class='ks-label text-white'>
            <label class='lg:text-lg font-normal text-white'>$label:</label>
            <input class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light text-white' type='file' name='" . $name . "' accept='.png,.jpg,.jpeg' $requiredAttribute>
            </div>";
    }

    public function inputHidden($name, $value)
    {
        return "<input type='hidden' name='" . $name . "' value='" . $value . "'>";
    }

    public function inputID($name, $label = "", $value = "", $placeholder = "")
    {
        return "<div class='ks-label' title='You cant edit an ID'>
        <label class='lg:text-lg font-normal'>$label:</label>
        <input readonly class='h-10 px-4 py-1 rounded-lg md:w-[400px] font-light bg-gray-400/20 text-ks-white' type='text' class='texte' name='" . $name . "' value='" . $value . "' placeholder=''" . $placeholder . "''>
        </div>";
    }

    public function submit($value)
    {
        return "<button type='submit' name='submit' class='bg-ks-orange rounded-lg p-2 font-bold lg:text-lg h-10'>" . $value . "</button>";
    }
}