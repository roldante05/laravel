<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;

class ControladorHome extends Controller
{

    public function index(){
      
        if (Usuario::autenticado() == true) {
            $titulo="Inicio";
            return view('sistema.index', compact('titulo'));
            // if (!Patente::autorizarOperacion("MENUCONSULTA")) {
            //     $codigo = "MENUCONSULTA";
            //     $mensaje = "No tiene permisos para la operaci&oacute;n.";
            //     return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            // } else {
            //     return view('sistema.index', compact('titulo'));
            // }
        } else {
            return redirect('admin/login');
        }
    }

}
