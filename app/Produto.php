<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = array('nome', 'codigo', 'desconto', 'val_avista_un', 'val_parcelado_un', 'val_avista_ata', 'val_parcelado_ata', 'descricao', 'caracteristicas', 'como_usar', 'observacoes', 'image', 'categoria_id', 'subcategoria_id');
    public $timestamps = false;

    public function Categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function Subcategoria()
    {
        return $this->belongsTo('App\Subcategoria');
    }
}
