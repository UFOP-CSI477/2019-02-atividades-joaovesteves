<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjects;
use App\Requests;
class UsuarioController extends Controller
{
    public function meusProtocolos(){
    	$requests = Subjects::join('requests','requests.subject_id','=','subjects.id')
            ->where('user_id',auth()->user()->id)
            ->orderBy('date')->get();
            
        $subjects = Subjects::orderBy('name')->get();
    	//return view('meusProtocolos');
        
        return view('meusProtocolos',compact('requests'),compact('subjects'));
    }

    public function registroRequisicao(){
    	
        $subjects = Subjects::orderBy('name')->get();
        return view('registroProtocolos',compact('subjects'));
    }

    public function store(){
        $request = new Requests;
        $request -> subject_id = request('protocolo');
        $request -> date = request('date');
        $request -> description = request('descricao');
        $request -> user_id = auth() -> user() -> id;
        $request -> save(); 
        return redirect('/home');
    }

    public function destroy($id){
        $requestObj = Requests::findOrFail($id);
        $requestObj->delete();
        return redirect('/home');
    }

    public function update(Request $request, $id){
        $newRequest = Requests::findOrFail($id);
        $newRequest->subject_id = $request->protocolo;
        $newRequest->date = $request->date;
        $newRequest->description = $request->descricao;
        $newRequest->save();
        return redirect('/home');
    }
}