<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//use Auth;
use App\Models\User;
use App\Models\Solicitud;
use App\Models\Proyecto;
use App\Models\TrabajaEn;
use App\Models\Documentos;

class PaginasController extends Controller
{
    //
    public function index(){
        if(Auth::guest()){
            return redirect()->route('/');
        }
        return view('vistas-principal/inicio');
    }

    public function proyecto($id){
        if(Auth::guest()){
            return redirect()->route('/');
        }
        return view('vistas-proyecto/proyecto',compact('id'));
    }


    public function proyectos(){
        //$proyectos = Proyecto::all();
        $user = Auth::user();

        $relaciones = $user->Relaciones;
        return view('vistas-principal.proyectos',compact('relaciones'));
    }

    public function solicitudes(){
        $usuarios = User::all();
        $user = Auth::user();

        $solicitudes=Solicitud::where('idUsuarioC',$user->id)
            ->orWhere('idUsuarioD',$user->id)
            ->get();

        return view('vistas-principal.solicitudes',compact('usuarios','solicitudes'));
    }

    public function informacion($id){
        $proyecto = Proyecto::find($id);

        $lider = TrabajaEn::where('folioProyecto', $id)->where('idRolUsuario',2)->get();

        return view('vistas-proyecto/informacionP',compact('proyecto','lider'));
    }

    public function documentos($id){
        $proyecto = Proyecto::find($id);
        return view('vistas-proyecto/documentosP',compact('proyecto'));
    }

    public function documento($id){
        $documento = Documentos::find($id);
        return view('vistas-proyecto/vistas-documentos/plantillaD',compact('documento'));
    }

    public function tareas($id){
        $proyecto = Proyecto::find($id);
        //$tareas
        return view('vistas-proyecto/tareasP',compact('proyecto'));
    }


    public function usuarios(){
        $users = User::all();
        return view('vistas-principal/vistas-admin/lista_usuarios',compact('users'));
    }
    public function riesgos(){
        return view('vistas-proyecto/vistas-documentos/riesgosD');
    }
    public function cambios(){
        return view('vistas-proyecto/vistas-documentos/cambiosD');
    }
    public function matriz(){
        return view('vistas-proyecto/vistas-documentos/comunicacionesD');
    }
    
    public function adminPanel(){
        return view('vistas-principal/admin');
    }

    public function solicitud($ide){
        $solicitud=Solicitud::find($ide);

        return view('vistas-principal.revisionSolicitud',compact('solicitud'));
    }
}
