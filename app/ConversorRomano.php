<?php

namespace App;

class ConversorRomano
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    public function converter($numero)
    {
        $resultado = '';
        foreach ($this->symbols as $value => $symbol) {
            while ($numero >= $value) {
                dump($numero);
                dump($value);
                dump($symbol);
            }
        }

        return $resultado;
    }
}