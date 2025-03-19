<?php


use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ImportIfixitController;

Artisan::command('import:guides', function () {
    (new ImportIfixitController())->__invoke(request());
})->describe('Importa tutoriales de reparaciones desde iFixit y las traduce en catalán');
