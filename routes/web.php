<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/test', function(){
    // dispatch(function(){
    //     logger("hello");
    // })->delay(5);
    $job = Job::first();
    TranslateJob::dispatch($job);

    return "Done";
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::controller(JobController::class)->group(function() {
    Route::get('/jobs','index')
    ->name('jobs.index');

    Route::get('/jobs/create','create')
    ->name('jobs.create');

    Route::post('/jobs','store')
    ->name('jobs.store')
    ->middleware(['auth']);

    Route::get('/jobs/{job}','show')
    ->name('jobs.show');

    Route::get('/jobs/{job}/edit','edit')
    ->name('jobs.edit')
    ->middleware('auth')
    ->can('edit', 'job');

    Route::patch('/jobs/{job}','update')
    ->name('jobs.update')
    ->middleware('auth')
    ->can('edit', 'job');

    Route::delete('/jobs/{job}', 'destroy')
    ->name('jobs.destroy')
    ->middleware('auth')
    ->can('edit', 'job');

});

// Route::resource('jobs', JobController::class)->middleware('auth');
// ->except(['edit']);

Route::controller(RegisterController::class)->group( function() {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('login.delete');
});


// Route::get('/login', [RegisterController::class, 'create']);