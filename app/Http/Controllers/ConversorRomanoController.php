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
        if (!is_int($numero) || $numero < 1 || $numero > 3999) {
            throw new \InvalidArgumentException('Número inválido');
        }
        
        $valorConvertido = $this->conversorRomano->converter($numero);

        return response()->json(['numero romano' => $valorConvertido]);
    }
}