<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{

      protected $table = 'postulaciones';
      public $timestamps = false;
  
      protected $fillable = [
          'idpostulacion', 
          'nombre', 
          'apellido', 
          'celular', 
          'correo',
          'curriculum'
      ];
  
      protected $hidden = [
  
      ];

      public function insertar()
    {
        $sql = "INSERT INTO $this->table (
         'nombre', 
          'apellido', 
          'celular', 
          'correo',
          'curriculum'
            ) VALUES (?, ?, ?, ?, ?);";
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