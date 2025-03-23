<?php

use Illuminate\Support\Facades\Route;

Route::get('/aboutus', function () {
    return view('aboutus.index');
});
