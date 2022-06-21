<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GembaController;
use App\Http\Controllers\MyGembaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TeamController;
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


Route::group(['middleware' => ['auth']], function() {

	Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::resources(['gemba' => GembaController::class,]);

	Route::post('/leader-reflection', [GembaController::class, 'leaderReflection'])->name('leader-reflection');
	Route::post('/reflect-on-employee', [GembaController::class, 'reflectOnEmployee'])->name('reflect-on-employee');

	Route::resources(['my-gemba' => MyGembaController::class,]);
	Route::resources(['team' => TeamController::class,]);

	Route::get('/account-info', [UserProfileController::class, 'accountInfo'])->name('account-info');
	Route::post('/update-team', [TeamController::class, 'updateTeam'])->name('update-team');
	Route::post('/update-profile', [UserProfileController::class, 'updateProfile'])->name('update-profile');
	Route::get('/my-reflection', [MyGembaController::class, 'myReflection'])->name('my-reflection');
	Route::get('/my-reflection-list/{title}', [MyGembaController::class, 'myReflectionList'])->name('my-reflection-list');
	Route::get('/my-reflection-detail/{gembaUserMetaId}/{title}', [MyGembaController::class, 'myReflectionDetail'])->name('my-reflection-detail');
	Route::get('/app-information', [MyGembaController::class, 'appInformation'])->name('app-information');
});
Route::get('/leader-at-gemba', [GembaController::class, 'leaderAtGemba'])->name('leader-at-gemba');
Route::get('/how-to-gemba', [GembaController::class, 'howToGemba'])->name('how-to-gemba');
Route::post('/user-login', [UserController::class, 'userLogin'])->name('user.login');
Route::post('/signup', [UserController::class, 'signUp'])->name('signup');
Route::get('/verify-email/{token}', [UserController::class, 'verifyEmail'])->name('verify.email');
Auth::routes();

