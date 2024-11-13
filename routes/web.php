<?php

Route::get('/waiting-admin-approve', function (){
    return view('layout.waiting-admin-approval');
})->middleware(['auth',AdminAuthorizedCompleted::class]);
