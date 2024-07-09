<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VoteController;

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
})->name('home');

Route::get('/student-login', function () {
    return view('student-welcome');
})->name('student');

Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

Route::post('/student-login', [StudentController::class, 'login'])->name('students.login');

Route::middleware('auth:admin,student')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::middleware('auth:admin')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(ElectionController::class)->group(function () {
        Route::get('/election', 'index')->name('election.index');
        Route::post('/election', 'store')->name('election.store');
        Route::delete('/election/{election}', 'destroy')->name('election.destroy');
    });

    Route::controller(InstitutionController::class)->group(function () {
        Route::get('/institution', 'index')->name('institution.index');
        Route::post('/institution', 'store')->name('institution.store');
        Route::delete('/institution/{institution}', 'destroy')->name('institution.destroy');
    });

    Route::controller(CandidateController::class)->group(function () {
        Route::get('/candidate', 'index')->name('candidate.index');
        Route::post('/candidate', 'store')->name('candidate.store');
        Route::delete('/candidate/{candidate}', 'destroy')->name('candidate.destroy');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::get('/voter', 'index')->name('voter.index');
        Route::post('/voter', 'store')->name('voter.store');
        Route::delete('/voter/{voter}', 'destroy')->name('voter.destroy');
    });

    Route::controller(VoteController::class)->group(function () {
        Route::get('/votes', 'index')->name('vote.index');
        Route::post('/votes', 'show')->name('vote.show');
    });
});

Route::middleware('auth:student')->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::get('/cast-vote', 'dashboard')->name('voter.vote');
        Route::post('/cast-vote', 'create');
        Route::get('/submit-vote/{election_id}/{candidate_id}', 'castVote')->name('voter.cast-vote');
    });
});



