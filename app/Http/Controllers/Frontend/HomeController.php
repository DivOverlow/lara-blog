<?php

namespace App\Http\Controllers\Frontend;

use App\Model\frontend\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\frontend\category;
use App\Model\frontend\tag;

class HomeController extends Controller
{
    public function index()
    {
//        $posts = post::where('status', 1)->get();
        $posts = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
        return view('frontend.blog', compact('posts'));
//        return view('frontend.blog');
    }

    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('frontend.blog', compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('frontend.blog', compact('posts'));
    }

}
