<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Solicitud;
use App\Models\Proyecto;
use App\Models\TrabajaEn;
use App\Models\Documentos;
use App\Models\Tarea;
use App\Models\User;
use App\Models\Comentario;
use App\Models\Documentos_Backup;

class PetController extends Controller
{
    public function creaSolicitud(Request $r){
        $solicitud = new Solicitud();

        $solicitud->asuntoSolicitud = $r->tituloInput;
        $solicitud->idUsuarioC = $r->clienteInput;
        $solicitud->idUsuarioD = $r->liderInput;
        $solicitud->fechaSolicitud = $r->fechaSolicitudInput;
        $solicitud->idEstado = $r->estadoSolicitudInput;
        $solicitud->documentoDescripcion=' ';

        request()->validate([
            'file'  => 'required|mimes:doc,docx,pdf|max:5242880',
        ]); 

        $solicitud->descripcionSolic = $r->descripcionInput;
        $solicitud->fechaInicio = $r->inicioInput;
        $solicitud->fechaFin = $r->terminoInput;

        $solicitud->retroalimentacion = " ";
        $solicitud->idDocumento = 1;

        $solicitud->save();

        //Guardar el archivo después de haber registrado la solicitud para poder obtener el id y crear la carpeta del proyecto
        if ($r->hasFile('file')) {
            /*$archivo = $r->file('file');
            $fileName = time().'_'.$r->file('file')->getClientOriginalName();
            // $filePath = $r->file('file')->storeAs('pdf', $fileName, 'public');
            // copy($archivo,$filePath);
            $filePath = $r->file('file')->move(storage_path("Documentos/Solicitudes/"). $r->tituloInput ,$r->file('file')->getClientOriginalName());
            $solicitud->documentoDescripcion = $filePath;*/

            $path = $r->file('file')->storeAs(
                'Proyectos/'.$solicitud->id.'/Documentos/Solicitud', $r->file('file')->getClientOriginalName(),'public'
            );

            //$path = $r->file('file')->store('Documentos','public');
            $url = Storage::url($path);

            $solicitud->documentoDescripcion=$url;
        } 

        $solicitud->save();
        
        return redirect('/solicitudes');
    }

    public function creaProyecto($s){
        $p = new Proyecto();

        if(!($p->id == $s->id)){
            $p->id = $s->id;   
        }
        $p->idEstado = $s->idEstado;
        $p->nombre = $s->asuntoSolicitud;
        $p->fechaInicio = $s->fechaInicio;
        $p->fechaFinal = $s->fechaFin;
        $p->descripcion = $s->descripcionSolic;

        $relacion = new TrabajaEn();
        $relacion->idUsuario = $s->UsuarioCliente->id;
        $relacion->folioProyecto = $p->id;
        $relacion->idRolUsuario = 1;

        $relacion2 = new TrabajaEn();
        $relacion2->idUsuario = $s->UsuarioLider->id;
        $relacion2->folioProyecto = $p->id;
        $relacion2->idRolUsuario = 2;
        
        $p->save();
        $relacion->save();
        $relacion2->save();
    }

    public function revisaSolicitud(Request $r){
        $s = Solicitud::find($r->idInput);

        if(isset($r->retroalimentacion))
            $s->retroalimentacion = $r->retroalimentacion;
        $s->idEstado = $r->estado;

        if($s->Estado->nombreEstado = 'Aceptada'){
            $this->creaProyecto($s);
        }

        $s->save();

        return redirect('/home');
    }

    public function reenviaSolicitud(Request $r){
        $solicitud = Solicitud::find($r->idInput);

        $solicitud->asuntoSolicitud = $r->tituloInput;
        $solicitud->idEstado = $r->estado;
        $solicitud->descripcionSolic = $r->descripcionInput;
        $solicitud->fechaInicio = $r->inicioInput;
        $solicitud->fechaFin = $r->terminoInput;

        if ($r->hasFile('file')) {
            request()->validate([
                'file'  => 'required|mimes:doc,docx,pdf|max:5242880',
            ]); 
            Storage::delete($solicitud->documentoDescripcion);
            $path = $r->file('file')->storeAs(
                'Proyectos/'.$r->idInput.'/Documentos/Solicitud', $r->file('file')->getClientOriginalName(),'public'
            );
            $url = Storage::url($path);

            $solicitud->documentoDescripcion=$url;
        } 

        $solicitud->save();

        return redirect('/home');
    }

    public function getUsuarios(){
        $usuarios = User::all();

        return $usuarios;
    }

    public function modificaProyecto(Request $r){
        $proyecto = Proyecto::find($r->idProyecto);

        $proyecto->nombre = $r->tituloInput;
        $proyecto->fechaInicio = $r->fechainicioInput;
        $proyecto->fechaFinal = $r->fechafinalInput;
        $proyecto->descripcion = $r->descripcionInput;

        $proyecto->save();

        if(!is_null($r->miembroInput)){
            foreach ($r->miembroInput as $miembro) {
                $relacion = new TrabajaEn();

                $relacion->idUsuario = $miembro;
                $relacion->folioProyecto = $r->idProyecto;
                $relacion->idRolUsuario = 3;

                $relacion->save();
            }
        }

        return redirect()->route('proyecto', [$r->idProyecto]);

    }

    function creaTarea(Request $r){
        $t = new Tarea();
        $t->titulo = $r->tituloInput;
        $t->idUsuario = $r->encargadoInput;
        $t->folioProyecto = $r->proyectoInput;
        $t->estadoTarea = 8; //La tarea comienza en estado de Por hacer, que sería el indice 8
        $t->faseTarea = $r->etapaInput;
        $t->fechaInicio = $r->inicioInput;
        $t->fechaFinal = $r->terminoInput;
        $t->descripcion = $r->descripcionInput;
        $t->save();

        return redirect()->route('proyecto', [$r->proyectoInput]);
        //return redirect()->route('tareas', [$r->proyectoInput]);
        //$proyecto = Proyecto::find($r->proyectoInput);
        //return view('vistas-proyecto/tareasP',compact('proyecto'));
    }

    function cambiaEstadoTarea(Request $r){
        $t = Tarea::find($r->id);

        $t->estadoTarea = $r->estado;

        $t->save();
    }

    function cambiaFaseTarea(Request $r){
        $t = Tarea::find($r->id);
        $t->faseTarea = $r->fase;
        $t->save();
    }

    function creaDocumento(Request $r){
        $d = new Documentos();
        $d->etiqueta = $r->tituloInput;
        $d->nombre = $r->file('file')->getClientOriginalName();

        $d->folioProyecto = $r->id;

        if ($r->hasFile('file')) {
            request()->validate([
                'file'  => 'required|mimes:doc,docx,pdf|max:5242880',
            ]); 

            $path = $r->file('file')->storeAs(
                'Proyectos/'.$r->id.'/'.'Documentos/'.$r->tituloInput, $r->file('file')->getClientOriginalName(),'public'
            );
            $url = Storage::url($path);

            $d->ruta=$url;
        }

        $d->save();
        $proyecto = Proyecto::find($r->id);
        return view('vistas-proyecto/documentosP',compact('proyecto'));
    }

    function publicarComentario(Request $r){
        $c = new Comentario();
        $c->idUsuario = $r->idUsuario;
        $c->idDocumento = $r->idDocumento;
        $c->contenido = $r->comentario;

        $c->save();

        $documento = Documentos::find($r->idDocumento);
        return redirect()->route('proyecto', [$documento->folioProyecto]);
    }

    function actualizarDocumento(Request $r){
        $d = Documentos::find($r->idDocumento);

        if($d->VersionAnterior){
            $v = $d->VersionAnterior;
            Storage::disk('public')->delete($v->ruta);
            $v->ruta = $d->ruta;

            $v->save();
        }else{
            $v = new Documentos_Backup();
            $v->ruta = $d->ruta;
            $v->folioDocumento = $d->id;

            $v->save();
        }

        if ($r->hasFile('file')) {
            request()->validate([
                'file'  => 'required|mimes:doc,docx,pdf|max:5242880',
            ]); 

            $path = $r->file('file')->storeAs(
                'Proyectos/'.$d->folioProyecto.'/'.'Documentos/'.$d->etiqueta, $r->file('file')->getClientOriginalName(),'public'
            );
            $url = Storage::url($path);

            $d->ruta = $url;

            $d->nombre = $r->file('file')->getClientOriginalName();
        }

        $d->save();

        //$documento = Documentos::find($r->idDocumento);
        return redirect()->route('proyecto', [$d->folioProyecto]);
    }
}
