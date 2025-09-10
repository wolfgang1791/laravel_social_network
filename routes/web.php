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
/*
Route::get('/', ['as'=>'home',function () {
    return view('home');
    //echo "<a href=".route('contactos').">Contactos</a>"; //nombre de la ruta
}]);
*/

Route::get('test',function(){
    $user = new App\User;
    $user->name = 'Haryy';
    $user->email = 'haryy@potter.com';
    //$user->role_id = 1;
    $user->password = bcrypt('fuckme');
    $user->save();

    return $user;
});
Route::get('roles',function(){
    return \App\Role::with('user')->get();//(paramtro = relacion)
});
Route::get('/', ['as'=>'home','uses'=>'PagesController@home']);
/*
Route::get('/contactame', ['as' => 'contactos',function () { //nombre de la ruta
    return view('contactos');
}]);
*/
//Route::get('/contactame', ['as' => 'contactos','uses'=>'PagesController@contact']);
/*
Route::get('/saludo/{nombre?}',['as'=>'saludo', function ($nombre = 'GINEVRA') { // ? no-require
    //return view('saludo',['nombre'=>$nombre]);
    //return view('saludo')->with(['nombre'=>$nombre]);
    $html = "<h2>Contenido html</h2>";// ingresado por formulario
    $script = "<script>alert('xss-cross site scripting')</script>"; // inyeccion de codigo

    $consolas = [
        'shit',
        'fuck',
        'fucking shit'
    ];

    return view('saludo',compact('nombre','html','script','consolas'));
}])->where('nombre','[A-Za-z]+'); // validacion
*/
Route::get('/saludo/{nombre?}',['as'=>'saludo', 'uses'=>'PagesController@saludo'])->where('nombre','[A-Za-z]+'); // validacion
//Route::post('contacto',['as'=>'contacto','uses'=>'PagesController@mensaje']);


Route::resource('mensajes','MessaggesController');
Route::resource('usuarios','UsersController');
Route::get('login',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);
Route::get('logout',['as'=>'logout','uses'=>'Auth\LoginController@logout']);
Route::post('login','Auth\LoginController@login');

// Route::get('mensajes',['as'=>'messages.index','uses'=>'MessaggesController@index']);
// Route::get('mensajes/create',['as'=>'messages.create','uses'=>'MessaggesController@create']);
// Route::post('mensajes',['as'=>'messages.store','uses'=>'MessaggesController@store']);
// Route::get('mensajes/{id}',['as'=>'messages.show','uses'=>'MessaggesController@show']);
// Route::get('mensajes/{id}/edit',['as'=>'messages.edit','uses'=>'MessaggesController@edit']);
// Route::put('mensajes/{id}',['as'=>'messages.update','uses'=>'MessaggesController@update']);
// Route::delete('mensajes/{id}',['as'=>'messages.destroy','uses'=>'MessaggesController@destroy']);
