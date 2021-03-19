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
    //modificar usuario
Route::post('/MiPerfil/update', 'UserController@update')->name('user.update');
Route::get('/MiPerfil/editar', 'UserController@modificarperfil')->name('modificarperfil');
Route::get('/MiPerfil/MisProductos', 'ProductoController@misproductos')->name('misproductos');
Route::get('/MiPerfil/image/{filename}', 'UserController@getImage')->name('user.image');
Route::get('/MiPerfil/{id}', 'UserController@perfil')->name('miperfil');
Route::delete('MiPerfil/MisProductos/{id}', 'ProductoController@destroy')->name('user.delete');
//productos
Route::get('/subirproducto', 'ProductoController@create')->name('producto.create');
Route::post('/subirproducto/guardar', 'ProductoController@save')->name('producto.save');
Route::get('/MiPerfil/MisProductos/{id}/editar', 'ProductoController@edit')->name('producto.edit');
Route::patch('/MiPerfil/MisProductos/{id}', 'ProductoController@update')->name('producto.update');
Route::get('/image/{filename}', 'ProductoController@getImage')->name('producto.image');
Route::get('/productos', 'ProductoController@index')->name('productos');
Route::get('/producto/{id}', 'ProductoController@show')->name('producto.show');

//welcome
Route::get('/', 'welcomeController@index')->name('welcome');