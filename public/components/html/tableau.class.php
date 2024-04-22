<?php
/*******************************************************
Classe permettant de générer des tableaux
*******************************************************/
class tableau
{
    private $data;

    public static function row($data, $tag = 'td')
    {
        $r = '';
        foreach ($data as $value) {
            $r .= "<$tag>$value</$tag>";
        }

        return '<tr>' . $r . '</tr>';
    }

    public static function head($data = [])
    {
        if ($data) {
            return '<table><thead>' . self::row($data, 'th') . '</thead>';
        } else {
            return '<table>';
        }
    }

    public static function body($data)
    {
        $resultat = '';
        foreach ($data as $ligne) {
            $resultat .= self::row($ligne);
        }

        return '<tbody>' . $resultat . '</tbody>';
    }

    public static function foot($data = [])
    {
        if ($data) {
            return '<tfoot>' . self::row($data, 'th') . '</tfoot></table>';
        } else {
            return '</table>';
        }
    }
}