<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FavorieController;
use App\Http\Controllers\MedicinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialtyController;
use App\Models\Medicin;
use App\Models\Patient;
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


// Route::get('/admin', function () {
//     return view('admin',["specilty" => Specialty::all()]);
// });

Route::get('/admin', [SpecialtyController::class, "index"]);


Route::get('/', [PatientController::class, "index"]);
Route::get('/specialty/{specialty}', [SpecialtyController::class, "show"])->name("specialty");


Route::get('/favorie/{doctor}', [FavorieController::class, "addToFavorie"])->name("favorie");

Route::get('/profilDoctor', [DoctorController::class, "index"]);

Route::get('/profilDoctor', [DoctorController::class, "index"]);

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

Route::post('/addMedicins', [MedicinController::class, "store"]);
Route::delete('/deleteMedicin/{medicin}', [MedicinController::class, "destroy"])->name('deleteMedicin');

require __DIR__ . '/auth.php';
