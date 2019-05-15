<?php

namespace App\Http\Controllers\Frontend;

use App\Model\frontend\like;
use App\Model\frontend\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(post $post)
    {
        return view('frontend.post', compact('post'));
    }

    public function getAllPosts()
    {
        return post::with('likes')->where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function saveLike(request $request)
    {
        $likecheck = like::where(['user_id'=>Auth::id(), 'post_id'=>$request->id])->first();
        if ($likecheck) {
            like::where(['user_id'=>Auth::id(), 'post_id'=>$request->id])->delete();
            return 'deleted';
        } else {
            $like = new like;
            $like->user_id = Auth::id();
            $like->post_id = $request->id;
            $like->save();
        }
    }
}
