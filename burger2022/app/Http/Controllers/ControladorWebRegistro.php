<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebRegistro extends Controller
{
    public function index()
    {
            // $pg = 'home';
            return view('web.nuevo-registro') ;
    }
}
