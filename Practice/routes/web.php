<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Exports\ExportData;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('welcome');
});

Route::get('/loginform',[ViewController::class,'recaptcha']);

Route::get('/index',[ViewController::class,'index']);

Route::get('/export',[ViewController::class,'exportbtn']);

Route::get('/image-upload',[ViewController::class,'file_upload']);

Route::get('/export-users', function () {
    return Excel::download(new ExportData, 'users.xlsx');
});