<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return "assalamualikum, selamat belajar laravel petik jombang ankatan III";
});


Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) 
{
    return 'nama pegawai : '.$nama.'<br/>Depertemen : '.$divisi;
});

Route::get('/kabar', function () {
    return view('kondisi');
});

Route::get('/santri',[SantriController::class, 'datasantri'] 


);