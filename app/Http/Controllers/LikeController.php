<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeHandler(Request $request){
        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'ispositive' => 'required'
        ]);

        $currentLikeStatus = $this->getCurrentLikeStatus($request);

        if(!$currentLikeStatus->first()){
            $this->store($request);
            return redirect('/post/'. $request->input('post_id'));
        }elseif ($currentLikeStatus->get('is_positive') == 0){
            $this->update($request);
            return redirect('/post/'. $request->input('post_id'));
        }
    }

    private function store($request){
        return Like::create([
            'is_positive' => $request->input('ispositive'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
        ]);
    }

    private function update($request){
        return Like::where('post_id', '=', $request->input('post_id'))
            ->where('user_id', '=', $request->input('user_id'))
            ->update([
                'is_positive' => $request->input('ispositive')
            ]);
    }

    public function clearLike(Request $request){
        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required'
        ]);

        Like::where('post_id', '=', $request->input('post_id'))
            ->where('user_id', '=', $request->input('user_id'))
            ->delete();

        return redirect('/post/'. $request->input('post_id'));
    }

    private function getCurrentLikeStatus($request)
    {
        return Like::where('post_id', '=', $request->input('post_id'))
            ->where('user_id', '=', $request->input('user_id'))
            ->get();
    }

}
