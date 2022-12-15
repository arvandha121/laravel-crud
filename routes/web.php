<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/mysql', function () {
    // Artisan::call('migrate:rollback', ['--force' => true]);
    // Artisan::call('migrate', ['--force' => true]);
    Artisan::call('migrate --env=production');
    // Artisan::call('db:seed', ['--force' => true]);
    // Artisan::call('db:seed');
});

Route::get('/fresh', function () {
    Artisan::call('migrate:fresh', [
        '--force' => true
     ]);
    Artisan::call('db:seed', [
        '--force' => true
     ]);
});
Route::get('/refresh', function () {
    Artisan::call('migrate:refresh', [
        '--force' => true
     ]);
    Artisan::call('db:seed', [
        '--force' => true
     ]);
});

Route::get('/config-clear', function () {
    Artisan::call('config:clear');
});
Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
});
Route::get('/route-cache', function () {
    Artisan::call('route:cache');
});
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
});

Route::get('/', [PostController::class, 'index']);
Route::get('/list', [PostController::class, 'listview']);

Route::get('/create', function () {
    return view('create');
});

Route::post('/post', [PostController::class, 'store']);
Route::delete('/delete/{id}', [PostController::class, 'destroy']);
Route::get('/edit/{id}', [PostController::class, 'edit']);

Route::delete('/deleteimage/{id}', [PostController::class, 'deleteimage']);
Route::delete('/deletecover/{id}', [PostController::class, 'deletecover']);

Route::put('/update/{id}', [PostController::class, 'update']);
