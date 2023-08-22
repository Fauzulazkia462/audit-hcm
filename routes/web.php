<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Models\Audit;

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

Route::get('/', 'AuditController@index');
Route::resource('audit', 'AuditController');
Route::get('audit/check/{no_form}', 'AuditController@check')->name('audit.check');
Route::get('/exportpdf', 'AuditController@exportpdf')->name('exportpdf');
Route::get('/exportexcel', 'AuditController@exportexcel')->name('exportexcel');
Route::get('/exportcsv', 'AuditController@exportcsv')->name('exportcsv');
