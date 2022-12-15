<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;
use Session;

class ControladorWebGraciasPostulacion extends Controller
{

    public function index(){

        $pg = 'nosotros';
        return view('web.gracias-postulacion', compact('pg')) ;

    }


}
