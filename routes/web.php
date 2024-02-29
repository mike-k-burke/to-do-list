<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/', function () {
        return redirect()->route('tasks.index');
    })->name('home');

    Route::name('tasks.')->prefix('tasks')->group(function () {
        Route::post('complete/{task}', [TaskController::class, 'markCompleted'])->name('complete');
    });
    Route::resource('tasks', TaskController::class)->only(['index', 'store', 'destroy']);
});

require __DIR__.'/auth.php';
