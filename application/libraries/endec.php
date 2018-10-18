<?php

class endec
{
    public $reff = array(
        'a' => '!',
        'b' => '@',
        'c' => '#',
        'd' => '$',
        'e' => '%',
        'f' => '^',
        'g' => '&',
        'h' => '*',
        'i' => '(',
        'j' => ')',
        'k' => ')',
        'l' => '_',
        'm' => '+',
        'n' => '{',
        'o' => '}',
        'p' => ':',
        'q' => '"',
        'r' => '|',
        's' => 'Xs',
        't' => '>',
        'u' => '?',
        'v' => '-',
        'w' => '=',
        'x' => '[',
        'y' => ']',
        'z' => ';',
        '1' => "'",
        '2' => ',',
        '3' => '.',
        '4' => '/',
        '5' => '`',
        '6' => '~',
        '7' => 'X',
        '8' => 'Y',
        '9' => 'T',
        '0' => 'E',
        ':' => 'Z',
        ' ' => 'S',
    );

    public function encrypt($text = '')
    {
        return str_replace(array_keys($this->reff), $this->reff, strtolower($text));
    }

    public function decrypt($text = '')
    {
        return str_replace($this->reff, array_keys($this->reff), $text);
    }
}
