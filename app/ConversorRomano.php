<?php

namespace App;

class ConversorRomano
{
    protected $symbols = [
        1000 => 'M',
        900 => 'CM', // 1000 - 100
        500 => 'D',
        400 => 'CD', // 500 - 100
        100 => 'C',
        90 => 'XC', // 100 - 10
        50 => 'L',
        40 => 'XL', // 50 - 10
        10 => 'X',
        9 => 'IX', // 10 - 1
        5 => 'V',
        4 => 'IV', // 5 - 1
        1 => 'I',
    ];

    // Lógica antiga
    // public function converter($numero)
    // {
    //     $resultado = '';
    //     foreach ($this->symbols as $value => $symbol) {
    //         while ($numero >= $value) {
    //             $resultado .= $symbol;
    //             $numero -= $value;
    //         }
    //     }

    //     while (true) {
    //         $original = $resultado;

    //         if (str_contains($resultado, 'IIII')) {
    //             $resultado = str_replace('IIII', 'IV', $resultado);
    //         }
    //         if (str_contains($resultado, 'XXXX')) {
    //             $resultado = str_replace('XXXX', 'XL', $resultado);
    //         }
    //         if (str_contains($resultado, 'CCCC')) {
    //             $resultado = str_replace('CCCC', 'CD', $resultado);
    //         }
    //         if (str_contains($resultado, 'VIV')) {
    //             $resultado = str_replace('VIV', 'IX', $resultado);
    //         }
    //         if (str_contains($resultado, 'LXL')) {
    //             $resultado = str_replace('LXL', 'XC', $resultado);
    //         }
    //         if (str_contains($resultado, 'DCD')) {
    //             $resultado = str_replace('DCD', 'CM', $resultado);
    //         }

    //         if ($original === $resultado) {
    //             break;
    //         }
    //     }

    //     return $resultado;
    // }

    public function identificarConversor($numero)
    {
        if (is_numeric($numero) && filter_var($numero, FILTER_VALIDATE_INT) !== false) {
            return $this->converterRealRomano($numero);
        } else {
            return $this->converterRomanoReal($numero);
        }
    }

    public function converterRealRomano($numero)
    {
        $resultado = '';
        foreach ($this->symbols as $value => $symbol) {
            while ($numero >= $value) {
                $resultado .= $symbol;
                $numero -= $value;
            }
        }

        return $resultado;
    }

    public function converterRomanoReal($numero)
    {
        $resultado = 0;
        $numero = strtoupper($numero);
        $numero = str_replace('IV', 'IIII', $numero);
        $numero = str_replace('IX', 'VIIII', $numero);
        $numero = str_replace('XL', 'XXXX', $numero);
        $numero = str_replace('XC', 'LXXXX', $numero);
        $numero = str_replace('CD', 'CCCC', $numero);
        $numero = str_replace('CM', 'DCCCC', $numero);

        foreach ($this->symbols as $value => $symbol) {
            while (str_starts_with($numero, $symbol)) {
                $resultado += $value;
                $numero = substr($numero, strlen($symbol));
            }
        }

        return $resultado;
    }
}