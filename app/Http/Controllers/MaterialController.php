<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Entrada;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialRequest;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiais = Material::all();
        return view('material.index', compact('materiais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiais = Material::all();

        $fornecedores = Entrada::distinct()->get(['fornecedor']);
        return view('material.create', compact('materiais', 'fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterialRequest $request)
    {
      if(is_numeric($request->nome)){
        $material = Material::findOrFail($request->nome);
        $quantidade = $material->qtd_disponivel + $request->qtd_recebida;
        $material->update(array('qtd_disponivel' => $quantidade));
      }else{
        $material = Material::create([
          'nome' => $request->nome,
          'qtd_disponivel' => $request->qtd_recebida,
        ]);

      }
      $entrada = Entrada::create([
          'codigo' => $request->codigo,
          'num_requisicao' => $request->num_requisicao,
          'ordem_compra' => $request->ordem_compra,
          'fornecedor' => $request->fornecedor,
          'qtd_solicitada' => $request->qtd_solicitada,
          'qtd_recebida' => $request->qtd_recebida,
          'custo' => $request->custo,
          'comentario' => $request->comentario,
          'user_id' => Auth::user()->id,
          'material_id' => $material->id,
      ]);
      return redirect(route('material.create'))->with('success', 'Material registado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
