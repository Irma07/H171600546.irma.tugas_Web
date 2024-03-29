<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index()
    {
    	$Artikel = \App\Artikel::all();

    	return view('artikel.index',compact('Artikel'));    
    }
    public function show($id)
    {
    	$Artikel = \App\Artikel::find($id);

    	return view('artikel.show',compact('Artikel'));    
    }
    public function create(){

        $KategoriArtikel= \App\KategoriArtikel::pluck ('nama','id');

        return view('artikel.create',compact('KategoriArtikel'));
    }
     public function store(Request $request){
        $input=$request->all();
       Artikel::create($input);
       return redirect(route('artikel.index'));
       
    }
    public function destroy($id){
        $Artikel = Artikel::find($id);

        $Artikel->delete();

        return redirect(route('artikel.index'));
    }
    public function edit($id){
        $Artikel=Artikel::find($id);
        $KategoriArtikel=KategoriArtikel::pluck('nama','id');
        return view('artikel.edit', compact('KategoriArtikel','Artikel'));
    }
    public function update($id, request $request){
        $Artikel=Artikel::find($id);
        $input=$request->all();


        $Artikel->update($input);
        return redirect(route('artikel.index'));
    }
}  