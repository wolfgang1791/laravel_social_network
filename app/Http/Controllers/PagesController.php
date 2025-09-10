<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    /*protected $request;*/

    public function __construct(){
        $this->middleware('example',['only'=>['']]); // except || only
    }

    public function home()
    {
        // return response("Don't do it",300)
        //        ->header('xtoken','secret')
        //        ->header('ginny','buenaza')
        //        ->cookie('x-cookie','cookie');
        return view('home');
    }

    public function saludo($nombre = 'GINEVRA')
    {
        // $html = "<h2>Contenido html</h2>";// ingresado por formulario
        // $script = "<script>alert('xss-cross site scripting')</script>"; // inyeccion de codigo

        $consolas = ['shit','fuck','fucking shit'];

        return view('saludo',compact('nombre','consolas'));
    }
/*
    public function mensaje(CreateMessageRequest $request) //Request $request
    {
         $data = $request->all();

         return redirect()// back()
                ->route('contactos') //->route('alias');
                ->with('info','se envio pxto');
    }

    public function contact()
    {
        return view('contactos');
    }
*/
}
