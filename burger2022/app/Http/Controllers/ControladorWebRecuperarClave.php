<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebRecuperarClave extends Controller
{
    public function index()
    {
            $sucursal = new Sucursal();
            $aSucursales= $sucursal->obtenerTodos();
            $fg = 'all';
            return view('web.recuperar-clave',compact('fg','aSucursales')) ;
    }
}
