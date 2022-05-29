<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/',[PaginasController::class,'index']);

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('auth/login');
})->name('/');

Route::get('/proyecto/{id}',[PaginasController::class,'proyecto'])->name('proyecto');
Route::get('/proyectos',[PaginasController::class,'proyectos']);
Route::get('/solicitudes',[PaginasController::class,'solicitudes']);

Route::get('/informacion/{id}',[PaginasController::class,'informacion'])->name('informacion');
Route::get('/documentos/{id}',[PaginasController::class,'documentos']);
Route::get('/proyecto/{id}/tareas',[PaginasController::class,'tareas'])->name('tareas');

Route::get('/usuarios',[PaginasController::class,'usuarios']);
Route::get('/riesgos',[PaginasController::class,'riesgos']);
Route::get('/cambios',[PaginasController::class,'cambios']);
Route::get('/matriz',[PaginasController::class,'matriz']);

Route::get('/adminPanel',[PaginasController::class,'adminPanel']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/solicitud/{ide}',[PaginasController::class,'solicitud']);
//Route::get('/info-solicitud/{id}','PetController@getSolicitud');
Route::post('/crearSolicitud',[PetController::class,'creaSolicitud']);

Route::post('/revisarSolicitud',[PetController::class,'revisaSolicitud']);
Route::post('/reenviarSolicitud',[PetController::class,'reenviaSolicitud']);

Route::get('/getUsuarios',[PetController::class,'getUsuarios']);

Route::post('/modificarProyecto',[PetController::class,'modificaProyecto']);

Route::post('/crearTarea',[PetController::class,'creaTarea']);
Route::post('/cambiarEstadoTarea',[PetController::class,'cambiaEstadoTarea']);
Route::post('/cambiarFaseTarea',[PetController::class,'cambiaFaseTarea']);
Route::post('/crearDocumento',[PetController::class,'creaDocumento']);

Route::get('/documento/{id}',[PaginasController::class,'documento']);
Route::post('/publicarComentario',[PetController::class,'publicarComentario']);
Route::post('/actualizarDocumento',[PetController::class,'actualizarDocumento']);