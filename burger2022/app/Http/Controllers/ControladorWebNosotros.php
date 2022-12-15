<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;
use Session;

class ControladorWebNosotros extends Controller
{
    public function index()
    {
            $pg = 'nosotros';
            return view('web.nosotros', compact('pg')) ;
    }

    public function enviar(Request $request){


        $nombre = $request->input('txtNombre');
        $celular = $request->input('txtTelefono');
        $correo = $request->input('txtCorreo');
        $mensaje = $request->input('txtMensaje');
        $curriculum = $request->input('archivo');

        $postulacion = new Postulacion();
        $postulacion->nombre = $nombre;
        $postulacion->celular = $celular;
        $postulacion->correo = $correo;
        $postulacion->mensaje = $mensaje;
        $postulacion->curriculum = $curriculum;
    }


}
