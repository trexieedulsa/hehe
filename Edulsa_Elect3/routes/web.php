<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentInfoController;
use App\Http\Controllers\enrolledsubjectsController;
use App\Http\Controllers\gradesController;
use App\Http\Controllers\balancesController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


 Route::get('/students', function () {
     return view('students.index');
 })->middleware(['auth', 'verified'])->name('students');

// 02
Route::get('/students/add', function () {
    return view('students.add');
})->middleware(['auth', 'verified'])->name('add-students');
// 03
Route::post('/students/add', [studentinfocontroller::class, 'store'])
->middleware(['auth', 'verified'])
->name('student-store');
// 04
Route::get('/students', [studentInfoController::class, 'index'])
->middleware(['auth', 'verified'])
->name('students');
// 05
Route::get('/students/{stuno}', [studentInfoController::class, 'show'])
->middleware(['auth', 'verified'])
->name('students-show');
// 06 route to delete record
Route::delete('/students/delete/{stuno}', [studentInfoController::class, 'destroy'])
->middleware(['auth', 'verified'])
->name('students-delete');
// 07 transfer record to edit form
Route::get('/students/edit/{stuno}', [studentInfoController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('students-edit');
// 08 save the updated data
Route::patch('/students/update/{stuno}', [studentInfoController::class, 'update'])
->middleware(['auth', 'verified'])
->name('students-update');

/// enrolled
Route::get('/views/enrolledsubjects', [enrolledsubjectsController::class, 'index'])
->middleware(['auth', 'verified'])
->name('enrolledsubjects');

// 01
Route::get('/enrolledsubjects/add', function () {
    return view('enrolledsubjects.add');
})->middleware(['auth', 'verified'])->name('add-enrolledsubjects');
// 02
Route::post('/enrolledsubjects/add',[enrolledsubjectsController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('enrolledsubjects-store');
//03
Route::get('/enrolledsubjects/{esNo}', [enrolledsubjectsController::class, 'show'])
->middleware(['auth', 'verified'])
->name('enrolledsubjects-show');
//04
Route::get('/enrolledsubjects/edit/{esNo}', [enrolledsubjectsController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('enrolledsubjects-edit');
//05
Route::patch('/enrolledsubjects/update/{esNo}', [enrolledsubjectsController::class, 'update'])
->middleware(['auth', 'verified'])
->name('enrolledsubjects-update');
//06
Route::delete('/enrolledsubjects/delete/{esNo}', [enrolledsubjectsController::class, 'destroy'])
->middleware(['auth', 'verified'])
->name('enrolledsubjects-delete');

///balance
Route::get('/balances', [balancesController::class, 'index'])
->middleware(['auth', 'verified'])
->name('balances');
//01
Route::get('/balances/add', [balancesController::class, 'getstudentInfo'])
->middleware(['auth', 'verified'])
->name('add-balances');
//02
Route::post('/balances/store', [balancesController::class, 'store'])
->middleware(['auth', 'verified'])
->name('balances-store');
//03
Route::get('/balances/{balancesNo}', [balancesController::class, 'show'])
->middleware(['auth', 'verified'])
->name('balances-show');
//04
Route::patch('/balances/update/{balancesNo}', [balancesController::class, 'update'])
->middleware(['auth', 'verified'])
->name('balances-update');
//05
Route::get('/balances/edit/{balancesNo}', [balancesController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('balances-edit');
//06
Route::delete('/balances/delete/{balancesNo}', [balancesController::class, 'destroy'])
->middleware(['auth', 'verified'])
->name('balances-delete');

///grades
Route::get('/grades', [gradesController::class, 'index']) 
->middleware(['auth', 'verified'])
->name('grades');

//01
Route::get('/grades/add', [gradesController::class, 'getsubjectInfo'])
->middleware(['auth', 'verified'])
->name('add-grades');
//02
Route::post('/grades/add', [gradesController::class, 'store'])
->middleware(['auth', 'verified'])
->name('grades-store');
//03
Route::get('/grades/{Grade}', [gradesController::class, 'show']) 
->middleware(['auth', 'verified'])
->name('grades-show');
//04
Route::get('/grades/edit/{Grade}', [gradesController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('grades-edit');
//05
Route::patch('/grades/update/{Grade}', [gradesController::class, 'update'])
->middleware(['auth', 'verified'])
->name('grades-update');
//06
Route::delete('/grades/delete/{Grade}', [gradesController::class, 'destroy'])
->middleware(['auth', 'verified'])
->name('grades-delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
