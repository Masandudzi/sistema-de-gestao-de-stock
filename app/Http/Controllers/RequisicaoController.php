<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Requisicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisicoes = Requisicao::where('user_id', Auth::user()->id)->get();
        return view('requisicao.index', compact('requisicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiais = Material::all();
        return view('requisicao.create', compact('materiais'));
    }

    public function search(Request $request){

       if($request->ajax()) {

           $data = Material::where('nome', 'LIKE', $request->country.'%')->get();
           $output = '';

           if (count($data)>0) {

               $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
               foreach ($data as $row){

                   $output .= '<li class="list-group-item">'.$row->nome.'</li>';
               }
               $output .= '</ul>';
           }
           else {

               $output .= '<li class="list-group-item">'.'No results'.'</li>';
           }
           return $output;
       }
   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function show(Requisicao $requisicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisicao $requisicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisicao $requisicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisicao $requisicao)
    {
        //
    }
}
