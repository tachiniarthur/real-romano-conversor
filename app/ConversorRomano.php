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
                $resultado .= $symbol;
                $numero -= $value;
            }
        }

        while (true) {
            $original = $resultado;

            if (str_contains($resultado, 'IIII')) {
                $resultado = str_replace('IIII', 'IV', $resultado);
            }
            if (str_contains($resultado, 'XXXX')) {
                $resultado = str_replace('XXXX', 'XL', $resultado);
            }
            if (str_contains($resultado, 'CCCC')) {
                $resultado = str_replace('CCCC', 'CD', $resultado);
            }
            if (str_contains($resultado, 'VIV')) {
                $resultado = str_replace('VIV', 'IX', $resultado);
            }
            if (str_contains($resultado, 'LXL')) {
                $resultado = str_replace('LXL', 'XC', $resultado);
            }
            if (str_contains($resultado, 'DCD')) {
                $resultado = str_replace('DCD', 'CM', $resultado);
            }

            if ($original === $resultado) {
                break;
            }
        }

        return $resultado;
    }
}