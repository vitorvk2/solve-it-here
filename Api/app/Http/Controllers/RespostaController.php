<?php

namespace App\Http\Controllers;

use App\Models\Resposta;
use App\Http\Requests\StoreRespostaRequest;
use App\Http\Requests\UpdateRespostaRequest;
use Illuminate\Http\Request;
use App\Repositories\RepostaRepository;
use Auth;

class RespostaController extends Controller
{
    public function __construct(Resposta $resposta){
        $this->resposta = $resposta;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repository = new RepostaRepository($this->resposta);
        $repository->relationships('user;chat');

        $data = $repository->getResult();
        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRespostaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRespostaRequest $request)
    {
        $data = $this->resposta->create([
            'resposta'=> $request->get('resposta'), 
            'chat_id' => $request->get('chat_id'),
            'user_id'=> Auth::user()->id
        ]);

        return response($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $repository = new RepostaRepository($this->resposta);
        $repository->relationships('user;chat');

        if($request->has('filtro')){
            $repository->filter($request->filtro);
        }

        if($request->has('coluna')){
            $repository->collumns($request->coluna);
        }

        $data = $repository->findOrFail($id);
        return response($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRespostaRequest  $request
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRespostaRequest $request, $id)
    {
        $data = $this->resposta->findOrFail($id);

        if(!$data->user_id === Auth::user()->id){
            return response([
                'message' => 'Sem permissão.'
            ], 401);
        }

        $data->fill($request->all());
        $data->save();

        return response($data, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->resposta->findOrFail($id);

        if(!$data->user_id === Auth::user()->id){
            return response([
                'message' => 'Sem permissão.'
            ], 401);
        }

        $data->delete();

        return response([
            'message' => 'Removido com sucesso'
        ], 200);
    }
}
