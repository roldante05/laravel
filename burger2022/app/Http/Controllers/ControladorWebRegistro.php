<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Patente;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
use App\Entidades\Cliente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebRegistro extends Controller
{
    public function index()
    {
        $sucursal = new Sucursal();
        $aSucursales= $sucursal->obtenerTodos();
        $fg = 'all';
            return view('web.nuevo-registro', compact('fg', 'aSucursales')) ;
    }

    public function enviar(Request $request){
        
        $fg = 'all';

        $nombre = $request->input('txtNombre');
        $apellido = $request->input('txtApellido');
        $correo = $request->input('txtCorreo');
        $dni = $request->input('txtDni');
        $celular = $request->input('txtCelular');
        $clave = $request->input('txtClave');

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);

        if($correo == $cliente->correo){
            $msg["mgs"] = "Este correo ya se encuentra registrado";
            $msg["estado"] = "danger";

            $sucursal = new Sucursal();
            $aSucursales = $sucursal->obtenerTodos();
            return view("web.nuevo-registro", compact('msg','fg', 'aSucursales', 'pg'));
        } else {
            $msg["msg"] = "Se ha registrado correctamente";
            $msg["estado"] = "success";

            $cliente = new Cliente();
            $cliente->nombre = $nombre;
            $cliente->apellido = $apellido;
            $cliente->correo = $correo;
            $cliente->dni = $dni;
            $cliente->celular = $celular;
            $cliente->clave = password_hash($clave, PASSWORD_DEFAULT);
            $cliente->insertar();

            $sucursal = new Sucursal();
            $aSucursales = $sucursal->obtenerTodos();

            return view("web.login", compact('msg','aSucursales', 'fg'));
        }


    }

}

