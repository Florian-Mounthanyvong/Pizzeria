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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admins.home');
});
Route::view('/admin','admins.home')->middleware('auth')
    ->middleware('is_admin');

Route::get('/cook', function () {
    return view('cooks.home');
});
Route::view('/cook','cooks.home')->middleware('auth')
    ->middleware('is_cook');

Route::get('/home', function () {
    return view('home');
});
Route::view('/home','home')->middleware('auth');

Route::post('/pizzas/ajout',[\App\Http\Controllers\PizzaController::class,'add']);
Route::get('/pizzas/ajout',[\App\Http\Controllers\PizzaController::class,'addForm']);
Route::post('/pizzas/{id}/suppression',[\App\Http\Controllers\PizzaController::class,'delete'])->name('psuppr');
Route::get('/pizzas/{id}/suppression',[\App\Http\Controllers\PizzaController::class,'deleteForm'])->name('psupprf');

Route::post('/pizzas/{id}/modification',[\App\Http\Controllers\PizzaController::class,'modify'])->name('pedit');
Route::get('/pizzas/{id}/modification',[\App\Http\Controllers\PizzaController::class,'modifyForm'])->name('peditf');


Route::get('/commandes',[\App\Http\Controllers\CommandeController::class,'list']);
Route::post('/commandes/ajout',[\App\Http\Controllers\CommandeController::class,'add']);
Route::get('/commandes/ajout',[\App\Http\Controllers\CommandeController::class,'addForm']);
Route::post('/commandes/{id}/modification',[\App\Http\Controllers\CommandeController::class,'modify'])->name('cedit');
Route::get('/commandes/{id}/modification',[\App\Http\Controllers\CommandeController::class,'modifyForm'])->name('ceditf');


Route::get('/users',[\App\Http\Controllers\UserController::class,'list']);
Route::post('/users/ajout',[\App\Http\Controllers\UserController::class,'add']);
Route::get('/users/ajout',[\App\Http\Controllers\UserController::class,'addForm']);
Route::post('/users/{id}/suppression',[\App\Http\Controllers\UserController::class,'delete'])->name('usuppr');
Route::get('/users/{id}/suppression',[\App\Http\Controllers\UserController::class,'deleteForm'])->name('usupprf');

Route::post('/users/{id}/modification',[\App\Http\Controllers\UserController::class,'modify'])->name('uedit');
Route::get('/users/{id}/modification',[\App\Http\Controllers\UserController::class,'modifyForm'])->name('ueditf');


Route::get('/login', [\App\Http\Controllers\AuthenticatedSessionController::class,'formLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthenticatedSessionController::class,'login']);
Route::get('/logout', [\App\Http\Controllers\AuthenticatedSessionController::class,'logout'])->name('logout');
Route::get('/register', [\App\Http\Controllers\RegisterUserController::class,'formRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\RegisterUserController::class,'register']);

Route::get('/mdp', [\App\Http\Controllers\AuthenticatedSessionController::class,'formMdp'])->name('mdp');
Route::post('/mdp', [\App\Http\Controllers\AuthenticatedSessionController::class,'mdp']);

Route::get('/type', [\App\Http\Controllers\AuthenticatedSessionController::class,'formType'])->name('type');
Route::post('/type', [\App\Http\Controllers\AuthenticatedSessionController::class,'type']);

Route::post('/panier/commande',[\App\Http\Controllers\CommandeController::class,'add']);
Route::get('/panier/commande',[\App\Http\Controllers\CommandeController::class,'addForm']);
Route::get('/menu',[\App\Http\Controllers\PizzaController::class,'list']);
Route::get('/panier',[\App\Http\Controllers\CartController::class,'index'])->name('cart.index');
Route::post('/panier/ajouter',[\App\Http\Controllers\CartController::class,'store'])->name('cart.store');
Route::get('/panier/vider',function(){
    Cart::destroy();
});
Route::delete('/panier/{rowId}',[\App\Http\Controllers\CartController::class,'destroy'])->name('cart.destroy');
Route::get('/arecup',[\App\Http\Controllers\CommandeController::class,'tri']);

Route::get('/date',[\App\Http\Controllers\CommandeController::class,'dateForm']);
Route::post('/date',[\App\Http\Controllers\CommandeController::class,'date']);
