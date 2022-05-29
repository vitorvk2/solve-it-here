<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Repositories\ChatRepository;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    public function __construct(Chat $chat){
        $this->chat = $chat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repository = new ChatRepository($this->chat);
        $repository->relationships('user;categoria;respostas');

        if($request->has('filtro')){
            $repository->filter($request->filtro);
        }

        $data = $repository->getResult();
        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request)
    {
        $data = $this->chat->create([
            'titulo'=> $request->get('titulo'), 
            'descricao' => $request->get('descricao'),
            'categoria_id' => $request->get('categoria_id'),
            'user_id'=> Auth::user()->id
        ]);

        return response($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $repository = new ChatRepository($this->chat);
        $repository->relationships('user;categoria;respostas');

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
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, $id)
    {
        $data = $this->chat->findOrFail($id);

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
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->chat->findOrFail($id);
        
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
