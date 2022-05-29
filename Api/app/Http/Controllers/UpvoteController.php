<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resposta;
use App\Models\Upvote;
use Auth;

class UpvoteController extends Controller
{
    public function action($id)
    {
        //Essa lógica não funciona, refatorar.
        $data = Resposta::findOrFail($id);

        if(is_null($data->upvote_id)){
            $upvote_id = Upvote::create([
                'upvote'=> 1, 
                'resposta_id' => $id,
                'user_id'=> Auth::user()->id
            ])->id;

            $data->upvote_id = $upvote_id;
            $data->save();
            return response($data, 200);
        }

        $dataUp = Upvote::findOrFail($data->upvote_id);

        if($dataUp->user_id !== Auth::user()->id){
            $dataUp->upvote = $dataUp->upvote + 1;
            $dataUp->user_id = Auth::user()->id;
        } else {
            $dataUp->upvote = $dataUp->upvote - 1;
            $dataUp->user_id = null;
        }

        $dataUp->save();
        return response($dataUp, 200);
    }
}
