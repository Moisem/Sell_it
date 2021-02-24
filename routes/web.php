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
use App\Producto;
Route::get('/', function () {
    /*
    $productos=Producto::all();
    foreach($productos as $producto){
        echo $producto->nombre."<br/>";
        echo $producto->precio."<br/>";
        echo $producto->user->name.''.$producto->user->apellidopaterno;
        echo '<h4>Comentarios</h4>';
        foreach($producto->comentario as $comment){
            echo $comment->user->name."<br/>";
            echo $comment->Contenido."<br/>";
        }
        echo "<hr/>";
    }
    die();
    */
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//usuarios
Route::get('/MiPerfil', 'UserController@miperfil')->name('miperfil');
Route::post('/MiPerfil/update', 'UserController@update')->name('user.update');