<?php

namespace App\Http\Controllers;

use App\Entidades\Producto; 
use App\Entidades\Categoria; 
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorProducto extends Controller
{
    public function nuevo()
    {
        $titulo = "Nuevo Producto";
        
        $categoria = new Categoria();
        $aCategorias = $categoria->obtenerTodos();
        $producto = new Producto();
        
        return view('producto.producto-nuevo', compact('titulo', 'aCategorias', 'producto'));
    } 

    public function index()
    {
        $titulo = "Listado de productos";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("MENUCONSULTA")) {
                $codigo = "MENUCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('producto.producto-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }


    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Producto();
        $aProductos = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aProductos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/producto/".$aProductos[$i]->idproducto."'class='btn btn-secondary''><i class='fa-solid fa-pen-to-square'></i></a>";
            $row[] = $aProductos[$i]->imagen;
            $row[] = $aProductos[$i]->nombre;
            $row[] = $aProductos[$i]->cantidad;
            $row[] = $aProductos[$i]->precio;
            $row[] = $aProductos[$i]->fk_idcategoria;
            $row[] = $aProductos[$i]->descripcion;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aProductos), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aProductos), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar Producto";
            $entidad = new Producto();
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

                $_POST["id"] = $entidad->idproducto;
                return view('producto.producto-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->producto;
        $producto = new Producto();
        $producto->obtenerPorId($id);

        return view('producto.producto-nuevo', compact('msg', 'producto', 'titulo')) . '?id=' . $producto->idproducto;

    }

    public function editar($id)
    {
        $titulo = "Modificar producto";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("MENUMODIFICACION")) {
                $codigo = "MENUMODIFICACION";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $producto = new Producto();
                $producto->obtenerPorId($id);        
                $categoria = new Categoria();
                $aCategorias = $categoria->obtenerTodos();


                return view('producto.producto-nuevo', compact('producto', 'titulo','aCategorias'));
            }
        } else {
            return redirect('admin/login');
        }
    }

}
