<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\StolpersteineController;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stolpersteine', StolpersteineController::class)->middleware('auth');
Route::get('home', [StolpersteineController::class, 'home']);
Route::get('info', [StolpersteineController::class, 'info']);
Route::get('contact', [StolpersteineController::class, 'contact']);
Route::get('datastolpersteine/{id}', [StolpersteineController::class, 'datastolpersteine']);

Route::resource('image', ImageController::class)->middleware('auth');

Route::post('/',function(){
    $credentials= request()->validate([
        'email' => ['required','email', 'string'],
        'password' => ['required', 'string']
    ]);

    $remember=request()->filled('remember');

    if (Auth::attempt($credentials,$remember)) {
        request()->session()->regenerate();
        return view('welcome');
    }
    
    return back()->withErrors([
        'cred' => 'Correo o contraseña incorrectos'
    ]);

});
Route::post('/logout',function(){
    Auth::logout();

    return view('logoutme');
})->middleware('auth');