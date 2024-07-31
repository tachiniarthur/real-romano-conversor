<?php

namespace App\Http\Controllers;

use App\ConversorRomano;

class ConversorRomanoController extends Controller
{
    protected $conversorRomano;
    
    public function __construct(
        ConversorRomano $conversorRomano
    ) {
        $this->conversorRomano = $conversorRomano;
    }
    
    public function converter(int $numero)
    {
        if (!is_int($numero) || $numero < 1) {
            throw new \InvalidArgumentException('Número inválido');
        }

        return $this->conversorRomano->converter($numero);
    }
}