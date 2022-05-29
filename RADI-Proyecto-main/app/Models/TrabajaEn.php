<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajaEn extends Model
{
    protected $table="trabaja_ens";

    public function Usuario(){
        return $this->belongsTo(User::class,'idUsuario');
    }

    public function Proyecto(){
        return $this->belongsTo(Proyecto::class,'folioProyecto');
    }

    public function Rol(){
        return $this->belongsTo(catalogoRoles::class,'idRolUsuario');
    }
}
