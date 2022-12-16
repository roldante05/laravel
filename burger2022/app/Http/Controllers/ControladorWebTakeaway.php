<?php

namespace App\Http\Controllers;

use App\Entidades\Producto;
use App\Entidades\Categoria;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sucursal;
use Session;

class ControladorWebTakeaway extends Controller
{
    public function index()
    {       
            $fg= 'all';
            $sucursal = new Sucursal();
            $aSucursales= $sucursal->obtenerTodos();
            $producto = new Producto();
            $aProductos = $producto -> obtenerTodos();
            $categoria = new Categoria();
            $aCategorias = $categoria -> obtenerTodos();

            return view('web.takeaway', compact('aCategorias','aProductos','fg','aSucursales') ) ;
    }
}
