<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebContacto extends Controller
{
    public function index()
    {
            $fg= 'all';
            $sucursal = new Sucursal();
            $aSucursales= $sucursal->obtenerTodos();
            return view('web.contacto',compact('fg', 'aSucursales')) ;
    }

    public function enviar(){
        
    }
}
