<?php

namespace App\Http\Controllers;

use App\Entidades\Pedido; 
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorCliente extends Controller
{
    public function nuevo()
    {
        $titulo = "Nuevo Pedido";
                return view('pedido.pedido-nuevo', compact('titulo'));
    } 

}
