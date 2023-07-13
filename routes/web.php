<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StatsUpController;
use App\Http\Livewire\Menu;
use App\Http\Livewire\Filtro;
use App\Http\Livewire\JsonGen;

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

Route::get('/', Menu::class);
Route::get('/filtro', Filtro::class);
Route::get('/json-gen', JsonGen::class);
Route::get('/5sc', function () {
    return view('5sc');
});
Route::get('/sup', [StatsUpController::class, 'home']);
Route::get('/sup/{path}', [StatsUpController::class, 'recepcionista']);
Route::get('/test/sso/aad', [StatsUpController::class, 'sso']);
