<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GembasController;
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
    return view('page.index');
})->name('home');
Route::get('/develop-employee', [EmployeeController::class, 'index'])->name('develop-employee');
Route::get('/account-nfo', [EmployeeController::class, 'accountInfo'])->name('account-nfo');
Route::get('/hsse-leader-detail', [GembasController::class, 'hsseLeaderDetail'])->name('hsse-leader-detail');
Route::get('/vision-and-mission', [GembasController::class, 'visionAndMission'])->name('vision-and-mission');
Route::get('/hsse-leader-led', [GembasController::class, 'hsseLeaderLed'])->name('hsse-leader-led');
Route::get('/processes-are-standard', [GembasController::class, 'processesAreStandard'])->name('processes-are-standard');
Route::get('/employees-are-engaged', [GembasController::class, 'employeesAreEngaged'])->name('employees-are-engaged');
Route::get('/my-gembas', [GembasController::class, 'index'])->name('my-gembas');
Route::get('/leader-at-gemba', [GembasController::class, 'leaderAtGemba'])->name('leader-at-gemba');
Route::get('/how-to-gemba', [GembasController::class, 'howToGemba'])->name('how-to-gemba');