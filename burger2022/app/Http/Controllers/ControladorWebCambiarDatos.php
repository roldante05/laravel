<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entidades\Sucursal;
use App\Entidades\Cliente;
use Session;

class ControladorWebCambiarDatos extends Controller
{
    public function index()
    {
        $pg = "cambiar-datos";

        $sucursal = new Sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $cliente = new Cliente();
        $cliente->obtenerPorId(Session::get('idcliente'));

        return view("web.cambiar-datos", compact('pg', 'aSucursales', 'cliente'));
    }

}