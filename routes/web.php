<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/login',[LoginController::class,'index'])->name('submit-login');
Route::get('/dashboard',function (){
    return view('dashboard');
})->name('dashboard');
