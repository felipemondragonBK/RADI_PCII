<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table="documentos";

    public function VersionAnterior(){
        return $this->hasOne(Documentos_Backup::class,'folioDocumento');
    }

    public function Comentarios(){
        return $this->hasMany(Comentario::class,'idDocumento','id');
    }
}
