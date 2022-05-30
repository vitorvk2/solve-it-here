<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resposta;
use Auth;

class UpvoteController extends Controller
{
    public function upvote($id)
    {
        $data = Resposta::findOrFail($id);

        if($data->user_id !== Auth::user()->id){
            $data->upvote++;
        }

        $data->save();

        return response([
            'message' => 'Registro realizado com sucesso.'
        ], 200);
    }

    public function revoke($id)
    {
        $data = Resposta::findOrFail($id);

        if($data->user_id !== Auth::user()->id){
            $data->upvote--;
        }

        $data->save();

        return response([
            'message' => 'Registro realizado com sucesso.'
        ], 200);
    }
}
