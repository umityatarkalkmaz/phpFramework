<?php
Route::get('/404', 'notFound@main');
Route::prefix('admin')->group(function (){
    Route::get('/','admin@main');
    Route::get('/:url','admin@url');
});

Route::dispatch();
