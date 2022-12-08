<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{

      protected $table = 'sucursales';
      public $timestamps = false;
  
      protected $fillable = [
          'idsucursal', 'nombre', 'telefono', 'direccion', 'linkmapa'
      ];
  
      protected $hidden = [
  
      ];

      public function insertar()
    {
        $sql = "INSERT INTO $this->table (
          'nombre', 
          'telefono', 
          'direccion', 
          'linkmapa'
            ) VALUES (?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->telefono,
            $this->direccion,
            $this->linkmapa
        ]);
        return $this->idsucursal = DB::getPdo()->lastInsertId();
    }
}