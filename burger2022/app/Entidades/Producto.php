<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

      protected $table = 'productos';
      public $timestamps = false;
  
      protected $fillable = [
          'idproducto', 
          'nombre', 
          'cantidad', 
          'precio', 
          'imagen',
          'fk_idcategoria',
          'descripcion' 
      ];
  
      protected $hidden = [
  
      ];

      public function insertar()
    {
        $sql = "INSERT INTO $this->table (
         'nombre', 
          'cantidad', 
          'precio', 
          'imagen',
          'fk_idcategoria',
          'descripcion'
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->cantidad,
            $this->precio,
            $this->imagen,
            $this->fk_idcategoria,
            $this->descripcion
        ]);
        return $this->idproducto = DB::getPdo()->lastInsertId();
    }
}