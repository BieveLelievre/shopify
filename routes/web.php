<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Mail\ProduitAjout;
use App\Notifications\ModificationProduit;
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



Route::get('/ajouter-produit', [MainController::class, 'ajouterProduit']);
Route::get('/update-produit/{produit}', [MainController::class, 'updateProduit']);
Route::get('/update-produit2/{id}', [MainController::class, 'upProd']);
Route::get('/supprimer-produit/{id}', [MainController::class, 'delete']);
Route::get('/ajouter-category', [MainController::class, 'ajouterCategory']);
Route::get('/get-produit/{produit}', [MainController::class, 'getProduit']);
Route::get('/commande', [MainController::class, 'commandeProduit']);
Route::get('/test-collection', [MainController::class, 'createCollection']);
Route::get('/test-email', function () {
    return new ProduitAjout;
});

Route::get('/', [MainController::class, 'accueil'])->name('accueil');
Route::middleware(["auth", 'isAdmin'])->prefix('admin')->group(function () {
    Route::resource('produits', ProduitController::class);
    Route::get('produits/{id}/delete', [ProduitController::class, 'delete'])->name('produits.delete');
});

Route::get('produits', [ProduitController::class, 'index']);

Route::get('/test-notification', function () {
    return new ModificationProduit;
});

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
