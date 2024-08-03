<?php

namespace App\Http\Controllers;

use App\ConversorRomano;
use Illuminate\Http\Request;

class ConversorRomanoController extends Controller
{
    protected $conversorRomano;
    
    public function __construct(
        ConversorRomano $conversorRomano
    ) {
        $this->conversorRomano = $conversorRomano;
    }
    
    public function index(Request $request)
    {
        $numero = $request->input('number');
        $valorConvertido = null;

        if ($numero) {
            $valorConvertido = $this->conversorRomano->identificarConversor($numero);
        }

        return view('index', [
            'valorConvertido' => $valorConvertido ?? null,
        ]);
    }   
}