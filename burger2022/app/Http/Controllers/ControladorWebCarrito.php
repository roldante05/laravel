<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entidades\Sucursal;
use App\Entidades\Cliente;
use App\Entidades\Carrito;
use App\Entidades\Pedido;
use App\Entidades\Carrito_producto;
use Session;

use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;

class ControladorWebCarrito extends Controller
{
    public function index()
    {

      $idcliente = Session::get("idcliente");
 //si hay cliente logueado
 if($idcliente > 0){
      $carrito = new Carrito();
      

      // si tiene carrito,
      if($carrito->obtenerPorCliente($idcliente) != null){
          $carrito_producto = new Carrito_producto();
          if($carrito_producto->obtenerPorCarrito($carrito->idcarrito) != null){
              $idcarrito=$carrito->idcarrito;
              $aCarrito_productos = $carrito_producto->obtenerPorCarrito($idcarrito);
              } else {
                  $aCarrito_productos = array();
              }
      } else {
      //si no tiene carrito asignado//mostrar alerta: "su carrito esta vacio"
          $msg["estado"] = "info";
          $msg["mensaje"]="Su carrito esta vacio, agregue productos desde Takeaway";
      }
   

  $sucursal = new Sucursal();
  $aSucursales = $sucursal->obtenerTodos();

  $fg = "all";
  return view("web.carrito", compact('fg', 'carrito', 'carrito_producto', 'aSucursales', 'aCarrito_productos'));
  }

    }


}