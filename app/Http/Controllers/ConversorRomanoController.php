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
        dd('caiu', $numero);
    }
}