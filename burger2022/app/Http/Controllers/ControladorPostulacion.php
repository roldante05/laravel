<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion; 
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorPostulacion extends Controller
{
    public function nuevo()
    {
        $titulo = "Nueva Posutalcion";
                return view('postulacion.postulacion-nuevo', compact('titulo'));
    } 

}
