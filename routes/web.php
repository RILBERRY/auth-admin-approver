<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => config('admin-approver.routes.middleware'),
    'prefix' => config('admin-approver.routes.prefix')
], function () {
    Route::get('/waiting-admin-approve', function () {
        return view('admin-approver::waiting-admin-approval');
    })->name('admin.approval.waiting');
});
