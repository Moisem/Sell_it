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
//password
Route::post('user/updatepassword', 'UserController@updatePassword');
//productos
Route::get('/subirproducto', 'ProductoController@create')->name('producto.create');
Route::post('/subirproducto/guardar', 'ProductoController@save')->name('producto.save');
Route::get('/MiPerfil/MisProductos/{id}/editar', 'ProductoController@edit')->name('producto.edit');
Route::patch('/MiPerfil/MisProductos/{id}', 'ProductoController@update')->name('producto.update');
Route::get('/image/{filename}', 'ProductoController@getImage')->name('producto.image');
Route::get('/productos', 'ProductoController@index')->name('productos');
Route::get('/producto/{id}', 'ProductoController@show')->name('producto.show');

//admin
Route::get('/admin', 'AdminController@index')->name('admin');


//admin-usuarios
Route::get('/admin/users', 'AdminController@users')->name('admin.users');
//admin-reportes
    //usuarios
    Route::get('/admin/userProductos/pdf/{id}', 'PDFController@PDFUserproductos')->name('PDF.Userproductos');
    Route::get('/admin/usersMensual/pdf', 'PDFController@PDFUsersmensual')->name('PDF.mensualusers');

//admin-categorias
Route::get('/admin/categorias', 'AdminController@categorias')->name('admin.categorias');
Route::get('/admin/categorias/create', 'CategoriaController@formcreate')->name('categorias.add');
Route::post('/admin/categorias/create/guardar', 'CategoriaController@save')->name('categoria.save');
Route::delete('/admin/categorias/{id}', 'CategoriaController@destroy')->name('categoria.delete');
Route::get('/admin/categorias/edit/{id}', 'CategoriaController@edit')->name('categoria.edit');
Route::patch('/admin/categorias/update', 'CategoriaController@update')->name('categoria.update');
//admin-reportes
    //categorias
    Route::get('/admin/categorias/pdf', 'PDFController@PDFCategorias')->name('PDF.categorias');


//admin-productos
Route::get('/admin/productos', 'AdminController@productos')->name('admin.productos');
Route::delete('admin/productos/{id}', 'ProductoController@destroyadmin')->name('admin.deleteadmin');
Route::get('admin/productos/{id}/editar', 'ProductoController@editadmin')->name('producto.editadmin');
Route::patch('admin/productos/{id}', 'ProductoController@updateadmin')->name('producto.updateadmin');
//admin-reportes
    //productos
    Route::get('/admin/productosMensual/pdf', 'PDFController@PDFProductosmensual')->name('PDF.mensualproductos');
    Route::get('/admin/productosDisponibles', 'PDFController@PDFproductosdisponibles')->name('PDF.productosdisponibles');
    Route::get('/admin/productosvendidos', 'PDFController@PDFproductosvendidos')->name('PDF.productosvendidos');

//welcome
Route::get('/', 'welcomeController@index')->name('welcome');

//membresias
Route::post('/ElegirPlan/{id}/Comprar', 'PaypalController@pagar')->name('guardar');
Route::get('/Comprar/Estatus', 'PaypalController@paypalStatus')->name('status');

Route::get('/QuienesSomos', function(){
    return view('info.info');
})->name('quiensesosmos');;
