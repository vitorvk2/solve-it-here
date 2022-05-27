<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Repositories\CategorieRepository;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repository = new CategorieRepository($this->categoria);
        $repository->relationships('chat');

        if($request->has('filtro')){
            $repository->filter($request->filtro);
        }

        $data = $repository->getResult();
        return response()->json($data, 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaRequest $request)
    {
        $data = $this->categoria->create($request->all());
        return response()->json($data, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $repository = new CategorieRepository($this->categoria);
        $repository->relationships('chat');

        if($request->has('filtro')){
            $repository->filter($request->filtro);
        }

        $data = $repository->findOrFail($id);
        return response()->json($data, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriaRequest  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriaRequest $request, $id)
    {
        $data = $this->categoria->findOrFail($id);

        $data->fill($request->all());
        $data->save();

        return response($data, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->categoria->findOrFail($id);

        $data->delete();

        return response([
            'message' => 'Removido com sucesso'
        ], 200);

    }
}
