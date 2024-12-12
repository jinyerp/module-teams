<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::middleware(['web','auth:sanctum', 'verified'])
->prefix('teams')->group(function() {
    Route::get('/', [\Jiny\Modules\Teams\Http\Controllers\Teams::class, 'index']);
    Route::get('/all', [\Jiny\Modules\Teams\Http\Controllers\TeamsAll::class, 'index']);

    Route::get('/users/{id}', [
        \Jiny\Modules\Teams\Http\Controllers\TeamUsers::class,
        'index'
    ]);

});



Route::middleware(['web','auth:sanctum', 'verified'])
->prefix('team')->group(function() {
    Route::get('/projects', [\Jiny\Modules\Teams\Http\Controllers\Projects::class, 'index']);
    Route::get('/myprojects', [\Jiny\Modules\Teams\Http\Controllers\MyProjects::class, 'index']);


});
