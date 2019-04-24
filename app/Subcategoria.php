<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $fillable = array('nome', 'categoria_id');
    public $timestamps = false;

    public function Categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
   
}
