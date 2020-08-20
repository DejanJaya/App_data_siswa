<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']],function(){
		
		Route::get('/siswa', 'SiswaController@index');
		Route::post('/siswa/create', 'SiswaController@create');
		Route::get('/siswa/edit/{siswa}', 'SiswaController@edit');
		Route::post('/siswa/update/{siswa}', 'SiswaController@update');
		Route::get('/siswa/delete/{siswa}', 'SiswaController@delete');
		Route::get('/siswa/profile/{siswa}', 'SiswaController@profile');
		Route::post('/siswa/addnilai/{siswa}', 'SiswaController@addnilai');
		Route::get('/siswa/deletenilai/{siswa}/{idmapel}', 'SiswaController@deletenilai');
		Route::get('/siswa/exportexcel','SiswaController@exportExcel');
		Route::get('/siswa/exportpdf','SiswaController@exportPdf');
		Route::post('/siswa/import','SiswaController@importexcel')->name('siswa.import');
		Route::get('/siswa/analisis', 'SiswaController@analisisData');
		Route::get('/siswa/analisisnilai', 'SiswaController@analisisNilai');
		Route::get('/siswa/analisisnilai1617', 'SiswaController@analisisNilai1617');
		Route::get('/siswa/analisisnilai1718', 'SiswaController@analisisNilai1718');
		Route::get('/siswa/analisisnilai1819', 'SiswaController@analisisNilai1819');
		Route::get('/siswa/datanilai', 'SiswaController@datanilai');
		Route::get('/guru/profile/{id}', 'GuruController@profile');
		Route::post('/nilai/import','NilaiController@importexcel')->name('nilai.import');
		
});

Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){
		Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => ['auth','checkRole:siswa']],function(){
		Route::get('/profilsaya', 'SiswaController@profilsaya');
});

Route::get('getdatasiswa',[
			'uses' => 'SiswaController@getdatasiswa',
			'as' => 'ajax.get.data.siswa',
		]);

Route::get('/{slug}',[
	'uses' => 'SiteController@singlepost',
	'as' => 'site.single.post'
]);