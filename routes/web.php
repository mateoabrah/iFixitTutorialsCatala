<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportIfixitController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\IfixitController;
use App\Services\IfixitService;

// Ruta raíz
Route::get('/', function () {
    return view('welcome');
});

// Ruta para importar tutoriales de iFixit (si es necesario)
Route::get('/import-ifixit', ImportIfixitController::class);

// Ruta para obtener tutoriales usando el servicio Ifixit
Route::get('/ifixit', function (IfixitService $ifixit) {
    $tutorials = $ifixit->getTutorials();
    return response()->json($tutorials);
});

// Rutas de Ifixit - Asegúrate de que esto sea lo que necesitas
Route::get('/ifixit', [IfixitController::class, 'index']);
Route::get('/ifixit/{wikiName}', [IfixitController::class, 'show']);

// Rutas de Guías
Route::get('/import-tutorials', [GuideController::class, 'importTutorials'])->name('importTutorials');
Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/search', [GuideController::class, 'search'])->name('guides.search');
Route::get('/guide/{id}', [GuideController::class, 'show']);







// <?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ImportIfixitController;
// use App\Http\Controllers\GuideController;

// Route::get('/', [GuideController::class, 'index']);

// Route::get('/import-ifixit', ImportIfixitController::class);






// Ruta para ver una guía específica (debe coincidir con el controlador y la vista)
// Route::get('/guides/{id}', [GuideController::class, 'show'])->name('guides.show');