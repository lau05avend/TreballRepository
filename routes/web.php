<?php

use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\Calendar\Index as CalendarIndex;
use App\Http\Livewire\Cliente\Index;
use App\Http\Livewire\Diseno\Index as DisenoIndex;
use App\Http\Livewire\Empleados\Index as EmpleadosIndex;
use App\Http\Livewire\Materiales\Index as MaterialesIndex;
use App\Http\Livewire\Novedad\Index as NovedadIndex;
use App\Http\Livewire\Planilla\Index as PlanillaIndex;
use App\Http\Livewire\Secciones\Index as SeccionesIndex;
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
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.menu');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/obras', ObraController::class)->names('obra');
    Route::get('/materiales', MaterialesIndex::class)->name('material');
    Route::get('/novedad', NovedadIndex::class)->name('novedad');
    Route::get('/empleados', EmpleadosIndex::class)->name('empleado');
    Route::get('/clientes', Index::class)->name('clientes');
    Route::get('/disenos', DisenoIndex::class)->name('diseno');
    Route::get('/planilla', PlanillaIndex::class)->name('planilla');
    Route::get('/secciones', SeccionesIndex::class)->name('secciones');
    Route::resource('obras.cronograma', EventoController::class)->names('calendar')->parameters(['cronograma' => 'evento']);
    // Route::resource('/calendar', EventoController::class)->names('calendar')->parameters(['calendar' => 'evento']);
    Route::get('/secciones', SeccionesIndex::class)->name('secciones');

    // Rutas Desarrollador
    Route::get('/obrasss/{op?}', [ObraController::class, 'showBread'])->name('obraB');
    Route::get('/calendar/{obra?}', [EventoController::class, 'showCalendarObra'])->name('obraCalendar');
    Route::get('/calendarall/{obra}', [EventoController::class,"allA"]);
    Route::get('/faseall', [EventoController::class,"allF"]);
    Route::post('/dropzone', [DropzoneController::class,"store_dropzone"])->name('dropzone');

    Route::get('/markAsRead', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAsRead');

    Route::get('/visualizar/{archivoplanilla}', [PDFController::class,'viewPlanillaPDF'])->name('viewplanilla');

    Route::get('pdf', [PDFController::class,'pdf'])->name('pdf');

    // Route::resource('/pruebacal/{obra}', CronogramaController::class)->names('pruebacal');

});



