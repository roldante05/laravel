<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use App\Entidades\Pedido;
use App\Entidades\Cliente;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;
use Session;

class ControladorWebIngresar extends Controller
{
    public function index()
    {
            $sucursal = new Sucursal();
            $aSucursales= $sucursal->obtenerTodos();
            $fg = 'all';
            return view('web.login',compact('fg', 'aSucursales') ) ;
    }


    public function ingresar(Request $request){
        $sucursal = new Sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $pg = "login";
        $correo = $request->input('txtCorreo');
        $clave = $request->input('txtClave');

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);



        if($cliente->idcliente > 0 && password_verify($clave, $cliente->clave)){

            $cliente->obtenerPorId($cliente->idcliente);
            Session::put("idcliente", $cliente->idcliente);

            
            $pedido = new Pedido();
            $aPedidos=$pedido->obtenerPorCliente(Session::get("idcliente"));
            return view("web.mi-cuenta", compact('cliente', 'aSucursales', 'aPedidos'));
            
        } else {
            $msg["msg"]= "Correo o clave incorrecto";
            $msg["estado"]= "danger";

            return view("web.mi-cuenta", compact('msg', 'aSucursales', 'pg'));

        }

    }
}
