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
        $postulacion = new Postulacion();
        return view('postulacion.postulacion-nuevo', compact('titulo','postulacion'));
    } 


    public function index()
    {
        $titulo = "Listado de postulaciones";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("POSTULANTECONSULTA")) {
                $codigo = "POSTULANTECONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('postulacion.postulacion-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }


    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Postulacion();
        $aPostulacion = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aPostulacion) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/postulacion/".$aPostulacion[$i]->idpostulacion."'class='btn btn-secondary''><i class='fa-solid fa-pen-to-square'></i></a>";
            $row[] = $aPostulacion[$i]->nombre . " " . $aPostulacion[$i]->apellido;
            $row[] = $aPostulacion[$i]->celular;
            $row[] = $aPostulacion[$i]->correo;
            $row[] = "<a href='files/".$aPostulacion[$i]->curriculum."'class='btn btn-secondary''><i class='fa-solid fa-download'></i></a>";
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aPostulacion), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aPostulacion), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar postulacion";
            $entidad = new Postulacion();
            $entidad->cargarDesdeRequest($request);

            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
                $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
                 $nombre = date("Ymdhmsi") . ".$extension";
                 $archivo = $_FILES["archivo"]["tmp_name"];
                 move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre"); //guardaelarchivo
                 $entidad->curriculum = $nombre;
             }
  

            //validaciones
            if ($entidad->nombre == "") {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Complete todos los datos";
            } else {
                if ($_POST["id"] > 0) {
                    $postulacionAux = new Postulacion();
                    $postulacionAux->obtenerPorId($entidad->idpostulacion);


                    if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){
                        //Eliminar imagen anterior
                        @unlink(env('APP_PATH') . "/public/files/$postulacionAux->curriculum");                          
                    } else {
                        $entidad->curriculum = $postulacionAux->curriculum;
                    }

                    //Es actualizacion
                    $entidad->guardar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                } else {
                    //Es nuevo
                    $entidad->insertar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                }

                $_POST["id"] = $entidad->idpostulacion;
                return view('postulacion.postulacion-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->postulacion;
        $postulacion = new Postulacion();
        $postulacion->obtenerPorId($id);

        return view('postulacion.postulacion-nuevo', compact('msg', 'postulacion', 'titulo')) . '?id=' . $postulacion->idpostulacion;

    }

    public function editar($id)
    {
        $titulo = "Modificar postulacion";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("POSTULANTEEDITAR")) {
                $codigo = "POSTULANTEEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $postulacion = new Postulacion();
                $postulacion->obtenerPorId($id);


                return view('postulacion.postulacion-nuevo', compact('postulacion', 'titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }


    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("POSTULANTEBAJA")) {

                $entidad = new Postulacion();
                $entidad->cargarDesdeRequest($request);
                @unlink(env('APP_PATH') . "/public/files/$entidad->imagen");                          
                $entidad->eliminar();

                $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente
            } else {
                $codigo = "POSTULANTEBAJA";
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
        }
    }


}
