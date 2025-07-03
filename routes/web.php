<?php

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/usuario')->group(function(){

    Route::post('/criar',function(Request $dados){


        return $dados;


    });

    Route::post('/logar',function(Request $dados){


        return $dados;

    });


});


Route::view('/', 'inicio');
Route::view('/login', 'login');

Route::view('/home', 'inicio');
Route::view('/sobre', 'sobre');
Route::view('/perfil', 'perfil');
Route::view('/reciclagem', 'reciclagem');
Route::view('/editar', 'editarPerfil');
Route::view('/correio', 'correio');
Route::view('/historico', 'historico');

Route::get('/sair', function () {
    require base_path('controller/logout.php');
});

Route::post('/responder', function () {
    require base_path('controller/responderController.php');
});

Route::post('/materialController', function () {
    require base_path('controller/materialController.php');
});

Route::prefix('empresa')->group(function () {
    Route::view('/dashboard', 'empresa.dashboard');
    Route::view('/envios', 'empresa.envios');
    Route::view('/estatisticas', 'empresa.estatisticas');
    Route::view('/usuarios', 'empresa.usuarios');
});


Route::view('/admin', 'admin.dashboard');
