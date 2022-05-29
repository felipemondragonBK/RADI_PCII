<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //use HasFactory;
    protected $table="tareas";

    public function Proyecto(){
        return $this->belongsTo(Proyecto::class,'folioProyecto');
    }

    public function Usuario(){
        return $this->belongsTo(User::class,'idUsuario');
    }

    public function Estado(){
        return $this->belongsTo(catalogoEstado::class,'estadoTarea');
    }

    public function Fase(){
        return $this->belongsTo(catalogoEstado::class,'faseTarea');
    }
}
