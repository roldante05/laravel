<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebHome extends Controller
{
    public function index()
    {   
            $sucursal = new Sucursal();
            $aSucursales= $sucursal->obtenerTodos();
            $pg = 'home';
            return view('web.inicio', compact('pg', 'aSucursales')) ;
    }
}
