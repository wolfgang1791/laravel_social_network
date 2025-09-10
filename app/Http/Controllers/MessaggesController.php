<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Message;
use App\Http\Requests\CreateMessageRequest;

class MessaggesController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['create','store']]);
        $this->middleware('roles:admin,mod');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$messages = DB::table('messages')->get();
        $messages = Message::all();
        return view('index',['messages'=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
    /*    DB::table('messages')->insert([
            'nombre'=>$request->input('nombre'),
            'email'=>$request->input('email'),
            'mensaje'=>$request->input('txa'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);*/

        // $message = new Message;
        // $message->nombre = $request->input('nombre');
        // $message->email = $request->input('email');
        // $message->mensaje = $request->input('txa');
        // $message->save();
        $message = Message::create($request->all());

        if ( auth()->check() ) {
            auth()->user()->messages()->save($message);
        }

        return redirect(route('mensajes.create'))->with('info','hemos recibido tu wea');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();
        $message = Message::findOrFail($id);
        return view('messages.edit',compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMessageRequest $request, $id)
    {
        // DB::table('messages')->where('id',$id)->update([
        //     'nombre'=>$request->input('nombre'),
        //     'email'=>$request->input('email'),
        //     'mensaje'=>$request->input('txa'),
        //     'updated_at'=>Carbon::now(),
        // ]);
        Message::findOrFail($id)->update($request->all());
        return back()->with('info','wea actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('messages')->where('id',$id)->delete();
        Message::findOrFail($id)->delete();
        return redirect()->route('mensajes.index');
    }
}
