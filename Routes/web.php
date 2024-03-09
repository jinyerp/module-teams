<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::middleware(['web','auth:sanctum', 'verified'])
->prefix('teams')->group(function() {
    Route::get('/', [\Modules\Teams\Http\Controllers\Teams::class, 'index']);
    Route::get('/all', [\Modules\Teams\Http\Controllers\TeamsAll::class, 'index']);

    Route::get('/users/{id}', [
        \Modules\Teams\Http\Controllers\TeamUsers::class,
        'index'
    ]);

});



Route::middleware(['web','auth:sanctum', 'verified'])
->prefix('team')->group(function() {
    Route::get('/projects', [\Modules\Teams\Http\Controllers\Projects::class, 'index']);
    Route::get('/myprojects', [\Modules\Teams\Http\Controllers\MyProjects::class, 'index']);


});
