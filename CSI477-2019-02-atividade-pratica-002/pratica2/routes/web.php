<?php

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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Subjects;

Route::group(['middleware' => ['auth']],function(){
    
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin',function(){
        	return view('admin');
        });

        Route::get('/admin/lista', 'AdminController@verProtocolos');
        Route::get('/admin/cria', 'AdminController@criarProtocolos');
        Route::resource('protocolos', 'AdminController', ['except' => ['show']]);
        
    });

    Route::get('/home', function(){
    	return view('home');
    });   

    Route::get('/home/protocolos', 'UsuarioController@meusProtocolos');
    Route::get('/home/registro', 'UsuarioController@registroRequisicao');
    Route::resource('requerir', 'UsuarioController', ['except' => ['show']]); 

});

Route::get('/', function() {
     return view('welcome');
});

Route::get('/protocolos', function(){
    $subjects = Subjects::orderBy('name') -> get();
    return view ('protocolo', compact('subjects'));
});



Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');