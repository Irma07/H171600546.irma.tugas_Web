<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\KategoriGaleri;

class GaleriController extends Controller
{
    public function index()
    {
    	$Galeri = \App\Galeri::all();

    	return view('galeri.index',compact('Galeri'));    
    }
    public function show($id)
    {
    	$Galeri = \App\Galeri::find($id);

    	return view('galeri.show',compact('Galeri'));    
    }
    public function create(){

        $KategoriGaleri= \App\KategoriGaleri::pluck ('nama','id');

        return view('galeri.create',compact('KategoriGaleri'));
    }
    public function store(Request $request){
        $input=$request->all();
       Galeri::create($input);
       return redirect(route('galeri.index'));
       
    }
     public function destroy($id){
        $Galeri = Galeri::find($id);

        $Galeri->delete();

        return redicert(route('galeri.index'));
    }
    public function edit($id){
        $Galeri=Galeri::find($id);
        $KategoriGaleri=KategoriGaleri::pluck(
            'nama','id');
        return view('galeri.edit', compact('KategoriGaleri','Galeri'));
    }
    public function update($id, Request $request){
        $Galeri=Galeri::find($id);
        $input=$request->all();


        $Galeri->update($input);

        return redirect(route('galeri.index'));
    }
    
}  