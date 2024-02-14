<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialtyController;
use App\Models\Specialty;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
// Route::get('/admin', function () {
//     return view('admin',["specilty" => Specialty::all()]);
// });

Route::get('/admin', [SpecialtyController::class, "index"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/AddSpeciality', [SpecialtyController::class, "store"]);
Route::delete('/deleteSpecialty/{specialty}', [SpecialtyController::class, "destroy"])->name("deleteSpecialty");
Route::patch('updateSpecialty/{specialty}', [SpecialtyController::class, "update"])->name("updateSpecialty");

require __DIR__ . '/auth.php';
