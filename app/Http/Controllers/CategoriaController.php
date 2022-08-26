<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaResource;
use App\Http\Resources\CategoriasCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Categoria::create($request->all())){
            return response()->json([
                'message' => 'Categoria criada com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar categoria'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoria)
    {
        $categoria = Categoria::with('produtos')->find($categoria);

        if($categoria){
            return new CategoriaResource($categoria);
        }

        return response()->json([
            'message' => 'Erro ao pesquisar categoria'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria)
    {
        $categoria = Categoria::find($categoria);
        if($categoria){
            $categoria->update($request->all());

            return $categoria;
        }

        return response()->json([
            'message' => 'Erro ao atualizar a categoria.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria)
    {
        if(Categoria::destroy($categoria)){
            return response()->json([
                'message' => 'Categoria deletada com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar a categoria.'
        ], 404);
    }
}
