<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebIngresar extends Controller
{
    public function index()
    {
            $sucursal = new Sucursal();
            $aSucursales= $sucursal->obtenerTodos();
            $fg = 'all';
            return view('web.login',compact('fg', 'aSucursales') ) ;
    }


    public function ingresar(){
        
    }
}
