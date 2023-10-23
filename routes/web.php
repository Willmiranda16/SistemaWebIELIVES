<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Models\AsignarCurso;
use App\Models\Curso;
use App\Models\Nota;
use App\Models\NotaCapacidad;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

Route::get('/', function () {
    return redirect()->to('login');
});

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/hash/{password}', function ($password) {
    $hashedPassword = Hash::make($password);
    return $hashedPassword;
});

Auth::routes();

Route::middleware('auth')->get('/{any}', function () {
    return view('layouts.appv2');
});

Route::get('/error404', function () {
    return view('Error404');
});
Route::get('/error401', function () {
    return view('Error401');
});
/* Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.rol')
    ->name('admin.index'); */

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cleared!";
});

Route::get('/report/courses/pdf', [ReporteController::class, 'getReportCoursePDF']);
