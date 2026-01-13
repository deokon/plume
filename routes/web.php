<?php

use Illuminate\Support\Facades\Route;

Route::get('/docs/{component}', function ($component) {
    if (view()->exists("plume::docs.{$component}")) {
        return view("plume::docs.{$component}");
    }
    abort(404);
})->name('plume.docs');

Route::get('/gallery', function () {
    return redirect()->route('plume.docs', ['component' => 'alert']);
});
