<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = array('nome', 'val_avista', 'val_parcelado', 'num_parcela', 'descricao', 'image', 'categoria_id', 'subcategoria_id');
    public $timestamps = false;

    public function Categoria()
    {
        return $this->belongsTo('App\categoria');
    }

    public function Subcategoria()
    {
        return $this->belongsTo('App\subcategoria');
    }
}
