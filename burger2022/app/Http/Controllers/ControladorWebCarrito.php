<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidades\Sucursal;
use App\Entidades\Cliente;
use App\Entidades\Carrito;
use App\Entidades\Pedido;
use App\Entidades\Carrito_producto;
use Session;

require app_path() . '/start/constants.php';

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
        if ($idcliente > 0) {
            $carrito = new Carrito();
        
            $sucursal = new Sucursal();
            $aSucursales = $sucursal->obtenerTodos();

            $fg = "all";

            // si tiene carrito,
            if ($carrito->obtenerPorCliente($idcliente) != null) {
                $carrito_producto = new Carrito_producto();
                if ($carrito_producto->obtenerPorCarrito($carrito->idcarrito) != null) {
                    $idcarrito = $carrito->idcarrito;
                    $aCarrito_productos = $carrito_producto->obtenerPorCarrito($idcarrito);
                } else {
                    $aCarrito_productos = array();
                }
            } else {
                //si no tiene carrito asignado//mostrar alerta: "su carrito esta vacio"
                $carrito_producto = new Carrito_producto();
                $aCarrito_productos = $carrito_producto->obtenerPorCliente(Session::get("idcliente"));
                
                $msg["estado"] = "info";
                $msg["mensaje"] = "Su carrito esta vacio, agregue productos desde Takeaway";
                return view("web.carrito", compact('fg', 'carrito', 'carrito_producto', 'aSucursales', 'aCarrito_productos','msg'));
            }


            return view("web.carrito", compact('fg', 'carrito', 'carrito_producto', 'aSucursales', 'aCarrito_productos'));
        }
    }

    public function finalizarPedido(Request $request)
    {
        $pedido = new Pedido();
        $pedido->fecha = Date("Y-m-d H:i:s");
        $medioDePago = $request->input('lstMedioDePago');

        $carrito_producto = new Carrito_producto();
        $aCarritoProductos = $carrito_producto->obtenerPorCliente(Session::get("idcliente"));

        foreach ($aCarritoProductos as $carrito) {
            $pedido->descripcion .= $carrito->producto . " - ";
            $pedido->total = $carrito->cantidad * $carrito->precio;
        }

        $pedido->fk_idsucursal = $request->input('lstSucursal');
        $pedido->fk_idcliente = Session::get("idcliente");

        if($medioDePago == "sucursal"){
            $pedido->fk_idestado = PEDIDO_PENDIENTE;
            $pedido->insertar();

            $carrito_producto->eliminarPorCliente(Session::get("idcliente"));

            $carrito = new Carrito();
            $carrito->eliminarPorCliente(Session::get("idcliente"));
            return redirect("/mi-cuenta");            

        } else {
            $pedido->fk_idestado = PEDIDO_PENDIENTEDEPAGO;
            $pedido->insertar();
            

            $carrito_producto->eliminarPorCliente(Session::get("idcliente"));

            $carrito = new Carrito();
            $carrito->eliminarPorCliente(Session::get("idcliente"));

            return redirect("/mi-cuenta");
            
            $access_token = "";
            SDK::setClientId(config("payment-methods.mercadopago.client"));
            SDK::setClientSecret(config("payment-methods.mercadopago.secret"));
           /* Setting the access token. */
            SDK::setAccessToken($access_token); 

            /* Creating a new item. */
            $item = new Item();
            $item->id = "1234";
            $item->title = "Burger SRL";
            $item->category_id = "products";
            $item->quantity = 1;
            $item->unit_price = $pedido->total;
            $item->currency_id = "ARS";

            $preference = new Preference();
            $preference->items = array($item);

            
           /* Creating a new payer and setting the payer's name, surname, email, date created and
           identification. */
            $payer = new Payer();
            $cliente = new Cliente();
            $cliente->obtenerPorId(Session::get("idcliente"));
            $payer->name = $cliente->nombre;
            $payer->surname = $cliente->apellido;
            $payer->email = $cliente->correo;
            $payer->date_created = date('Y-m-d H:m:s');
            $payer->identification = array(
                "type" => "DNI",
                "number" => $cliente->dni,
            );
            $preference->payer = $payer;

           /* Setting the back urls. */
            $preference->back_urls = [
                "success" => "http://127.0.0.1:8000/mercado-pago/aprobado/" . $cliente->idcliente,
                "pending" => "http://127.0.0.1:8000/mercado-pago/pendiente/" . $cliente->idcliente,
                "failure" => "http://127.0.0.1:8000/mercado-pago/error/" . $cliente->idcliente,
            ];

            $preference->payment_methods = array("installments" => 6);
            $preference->auto_return = "all";
            $preference->notification_url = '';
            /* Saving the preference. */
            $preference->save();

            
        }
 
        

      
    }

}