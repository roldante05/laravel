<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use App\Entidades\Pedido;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Session;

class ControladorWebMercadoPago extends Controller
{
    public function aprobado($idCliente)
    {   
      $pedido = new Pedido();
      $pedido->aprobar($idCliente);
      return redirect('/mi-cuenta');
    }

    public function pendiente($idCliente)
    {   

      $pedido = new Pedido();
      $pedido->pendiente($idCliente);
      return redirect('/mi-cuenta');
    }

    public function error($idCliente)
    {   
      $pedido = new Pedido();
      $pedido->error($idCliente);
      return redirect('/mi-cuenta');
    }
}
