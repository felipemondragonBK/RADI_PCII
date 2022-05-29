<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table="proyectos";

    public function Integrantes(){
        return $this->hasMany(TrabajaEn::class,'folioProyecto','id');
    }

    public function Tareas(){
        return $this->hasMany(Tarea::class,'folioProyecto','id');
    }

    public function Documentos(){
        return $this->hasMany(Documentos::class,'folioProyecto','id');
    }
}
