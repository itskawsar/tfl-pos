<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    dd(\App\Models\User::first()->name);
    return view('welcome');
});

Route::get('/tenants/create/', function() {
    $tenant1 = App\Models\Tenant::create(['id' => 'pos1']);
    $tenant1->domains()->create(['domain' => 'pos1.tfl']);

    $tenant2 = App\Models\Tenant::create(['id' => 'shop1']);
    $tenant2->domains()->create(['domain' => 'shop1.pos']);
});