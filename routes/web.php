<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', function () {
  return view('auth.login');
});
Route::get('/', function () {
  return view('auth.login');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
  Route::get('logout', function () {
            auth()->logout();
            Session()->flush();
            return Redirect::to('/');
    })->name('logout');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('admin/material', 'App\Http\Controllers\MaterialController');
    Route::resource('admin/entradas', 'App\Http\Controllers\EntradaController');
    Route::resource('admin/requisicao', 'App\Http\Controllers\RequisicaoController');

    Route::group(['middleware' => 'role:super-admin'], function() {
      Route::get('home/user', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario.index');
      Route::get('home/user/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('usuario.create');
      Route::get('home/user/edit/{usuario}', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuario.edit');
      Route::get('home/user/destroy/{usuario}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('usuario.destroy');

      Route::post('home/user/store', [App\Http\Controllers\UsuarioController::class, 'store'])->name('usuario.store');
      Route::post('home/user/update/{usuario}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('usuario.update');
  });
});
