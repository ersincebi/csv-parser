<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CsvParseController;
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

Route::controller(CsvParseController::class)->group(static function () {
    Route::get('/', 'index');
    Route::post('/csv-upload', 'uploadCsv')->name('csv-upload');
    Route::get('/get-list', 'getList');
});

Route::get('/change-app-locale', static function () {
    if (app()->getLocale() === 'en') {
        app()->setLocale('tr');
    } else {
        app()->setLocale('en');
    }

    return redirect()->back()->with('app-locale', [__('App local settings changed!')]);
});
