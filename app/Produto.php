<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Produto extends Model
{
    protected $table = 'produto';

    use SoftDeletes;
   
    public $fillable = ['produto','variacao', 'imagem', 'categoria_id']; // declara quais colunas do bd vamos usar/trabalhar
    public function categorias(){ 
        return $this->belongsTo(\App\Categoria::class); // belongsTo - como se fosse 1
    }
}