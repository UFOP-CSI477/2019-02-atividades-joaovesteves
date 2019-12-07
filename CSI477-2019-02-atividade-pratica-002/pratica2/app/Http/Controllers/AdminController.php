<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjects;
use App\Requests;
class AdminController extends Controller
{
    public function verProtocolos(){
    	$subjects = Subjects::orderBy('name')->get();
    	//return view('meusProtocolos');
        
        return view('listaProtocolos',compact('subjects'));
    }

    public function criarProtocolos(){
    	
        $subjects = Subjects::orderBy('name')->get();
        return view('criarProtocolos',compact('subjects'));
    }

    public function store(Request $request){
        $subject = new Subjects;
        $subject->name = $request->newProtocolo;
        $subject->price = $request->preco;
        $subject->save();
        return redirect('/admin');
    }

    public function destroy($id){
        if(Requests::where('subject_id', $id) -> exists()){
            $subject = Subjects::findOrFail($id);
            $subject->delete();
        }
        $subjects = Subjects::findOrFail($id);
        $subjects->delete();

        return redirect('/admin');
    }

    public function update(Request $request, $id){
        $newRequest = Subjects::findOrFail($id);
        $newRequest->price = $request->preco;
        $newRequest->name = $request->newProtocolo;
        $newRequest->save();
        return redirect('/admin');
    }
}