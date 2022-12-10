<?php

namespace App\Http\Controllers;

use App\Entidades\Categoria; 
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorCategoria extends Controller
{
    public function nuevo()
    {
        $titulo = "Nueva Categoria";
                return view('categoria.categoria-nuevo', compact('titulo'));
    } 

    public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar Categoria";
            $entidad = new Categoria();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->nombre == "") {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Complete todos los datos";
            } else {
    
                if ($_POST["id"] > 0) {
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
         
                $_POST["id"] = $entidad->idpedido;
                return view('categoria.categoria-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->categoria;
        $categoria = new Categoria();
        $categoria->obtenerPorId($id);

        return view('categoria.categoria-nuevo', compact('msg', 'categoria', 'titulo')) . '?id=' . $categoria->idcategoria;

    }

}
