<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// importar el modelo que vamos a usar
use App\Models\Tag;

class Article extends Model
{

    protected $with = ["tag"]; // aqui regitro el nombre de las funciones que me a regresar
    // crear una funcion con el nombre la variable donde se va a guardar
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
