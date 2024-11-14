<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => config('admin-approver.routes.middleware'),
    'prefix' => config('admin-approver.routes.prefix')
], function () {
    Route::get('/waiting-admin-approve', function () {
        return view(config('admin-approver.views.waiting'));
    })->name('admin.approval.waiting');

    Route::get('/roles', function () {
        $roles = Role::paginate();
        return view('pages.roles-view', compact('roles'));
    })->name('roles-view');
});

