<?php
class formulaire
{
    private $label;
    private $input;

    public function inputText($name, $label = "")
    {
        return "<div class='form_elt'>
        <label>
        <span>" . $label . "</span><input type='text' class='texte' name='" . $name . "' value=''><div style='color: red;'>*</div>
        </label>
        </div>";
    }

    public function submit($name)
    {
        return "<p><a href='index.php?action=enregClient'><button class='valid' name='" . $name . "'>Valider</button></a></p>";
    }
}