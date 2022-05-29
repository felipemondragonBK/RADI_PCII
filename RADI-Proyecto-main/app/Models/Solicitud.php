<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table="solicituds";

    //protected $primaryKey = 'folioSolicitud';
    
    public function UsuarioCliente(){
        return $this->belongsTo(User::class,'idUsuarioC');
    }

    public function UsuarioLider(){
        return $this->belongsTo(User::class,'idUsuarioD');
    }

    public function Estado(){
        return $this->belongsTo(catalogoEstado::class,'idEstado');
    }
}
