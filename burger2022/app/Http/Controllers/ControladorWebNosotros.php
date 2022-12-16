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

        $postulacion = new Postulacion();
        $postulacion->curriculum = "";
        
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
            $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
            $nombreRandom = date("Ymdhmsi") . ".$extension"; //genera un nombreRandom con año, fecha y hora
            $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        
            if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {;
                move_uploaded_file($archivo_tmp, env('APP_PATH') . "/public/files/$nombreRandom"); //guarda el archivo fisicamente
                $postulacion->curriculum = $nombreRandom;
            }
        }

        $postulacion->nombre = $nombre;
        $postulacion->apellido = "";
        $postulacion->celular = $celular;
        $postulacion->correo = $correo;
        $postulacion->mensaje = $mensaje;
        $postulacion->insertar();
        return redirect('/gracias-postulacion');

        

    }

    public function graciasPostulacion(){

        $pg = 'nosotros';
        return view('web.gracias-postulacion', compact('pg')) ;

    }


}
