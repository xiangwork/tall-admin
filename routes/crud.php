<?php


if (config('crud.enabled')) {
    Route::post('/crud/data', [App\Http\Controllers\CrudController::class, 'data']);
    Route::post('/crud/truncate', [App\Http\Controllers\CrudController::class, 'truncate']);
    Route::resource('/crud', App\Http\Controllers\CrudController::class);
}
