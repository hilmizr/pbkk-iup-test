<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Takeshi Congo",
        "email" => "takeshi.hongo@gmail.com",
        "image" => "takeshihongo.png"
    ]);
});

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'store'])->name('form.store');


