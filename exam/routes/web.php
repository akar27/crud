<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\ProfileController;
use App\Models\Materiel;
use App\Models\Tache;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/home', [Home::class, 'index'])->name('dashboard');
    Route::get('/tach/{id}', [Home::class, 'view'])->name('tach');
    Route::delete('/deletepro/{id}', [Home::class, 'destroy'])->name('deletepro');
    Route::post('/storepro', [Home::class, 'store'])->name('storepro');
    Route::post('/storetach', [Home::class, 'storetach'])->name('storetach');
    Route::get('/addpro', [Home::class, 'create'])->name('createpro');

    Route::get('/addtach/{id}', [Home::class, 'createtach'])->name('createtach');
    
    Route::delete('/delettach/{id}', [Tache::class, 'destroy'])->name('deltach');
    Route::get('/editach', [Home::class, 'editach'])->name('editach');
    Route::patch('/editach/{id}', [Home::class, 'stortach'])->name('stortach');
    
    Route::get('/materiel/{id}', [MaterielController::class, 'show'])->name('matshow');
    Route::delete('/deletemateriel/{id}', [MaterielController::class, 'destroy'])->name('deletemat');
    Route::get('/addmat/{id}', [MaterielController::class, 'create'])->name('addmat');
    Route::post('/stormat', [MaterielController::class, 'store'])->name('storemat');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
