<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutosCollection;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProdutosCollection(Produto::select('id', 'nome', 'quantidade', 'ativo')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Produto::create($request->all())){
            return response()->json([
                'message' => 'Produto cadastrado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Não foi possível cadastrar o produto'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($produto)
    {
        $produto = Produto::with('categoria')->find($produto);
        if($produto){
            return new ProdutoResource($produto);
        }

        return response()->json([
            'message' => 'Problema ao encontrar o produto selecionado'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $produto)
    {
        $produto = Produto::find($produto);
        if($produto){
            $produto->update($request->all());

            return $produto;
        }

        return response()->json([
            'message' => 'Erro ao atualizar informações do produto'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($produto)
    {
        if(Produto::destroy($produto)){
            return response()->json([
                'message' => 'Produto deletado com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar o produto.'
        ], 404);
    }
}
