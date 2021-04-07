<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
  return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::resource('tratamiento','App\Http\Controllers\TratamientoController');

Route::resource('profesionales','App\Http\Controllers\ProfesionalesController');

Route::resource('paciente','App\Http\Controllers\PacienteController');

Route::resource('especialidades','App\Http\Controllers\EspecialidadesController');

Route::resource('obrasocial','App\Http\Controllers\ObrasocialController');

Route::resource('tdiahora','App\Http\Controllers\tdiahoraController');

Route::resource('diainactivo','App\Http\Controllers\diainactivoController');

Route::resource('feriado','App\Http\Controllers\feriadoController');

Route::resource('turno','App\Http\Controllers\turnoController');

Route::resource('iturno','App\Http\Controllers\IturnoController');

Route::resource('turnosdeldia','App\Http\Controllers\turnodeldiaController');

Route::resource('gcalendario','App\Http\Controllers\gcalendarioController');

Route::post("calendario", 'App\Http\Controllers\CalendaController@eliminaroprocesarcalenda');

Route::resource('profesionales_tratamiento','App\Http\Controllers\Profesionales_tratamientoController');

Route::resource('historiaclinica','App\Http\Controllers\historiaclinicaController');

Route::resource('ihistoriaclinica','App\Http\Controllers\ihistoriaclinicaController');

Route::get('generate-pdf', 'App\Http\Controllers\PdfGenerateController@pdfview')->name('generate-pdf');

Route::resource('Exports','App\Http\Controllers\ExcelController');

Route::get("exportar",'App\Http\Controllers\ExcelController@export')->name("exportar");

Route::resource('buscarturno','App\Http\Controllers\buscarturnoController');

Route::resource('turnopaciente','App\Http\Controllers\turnopacienteController');



