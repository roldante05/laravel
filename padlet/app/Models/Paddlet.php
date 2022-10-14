<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paddlet
 *
 * @property $id
 * @property $user
 * @property $comment
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paddlet extends Model
{
    
    static $rules = [
		'user' => 'required',
		'comment' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user','comment'];

    public $timestamps = false;

}
