<?php

namespace App\Http\Controllers;

use Session;

class ControladorWebSalir extends Controller
{
    public function logout()
    {
        Session::put("idcliente", "");
        return redirect("/");
    }
}