<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Categoria extends Model
{
    protected $table = 'categorias';

    use SoftDeletes;
    public $fillable = ['id','nome'];
    public $timestamps=false; // isso desativa a procura pelos campos de timestamp 
    public function produtos()
    {
        return $this->hasMany(\App\Produto::class); // hasmany - muitos
        
    }
}


