<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{


    public function index(){
        $categories = Category::all();
        $posts = Post::all();
        return view('backend.pages.post.index',compact('categories','posts'));
    }
    public function create(){
        return view('backend.pages.post.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'  => 'required|max:60',
            'slug'         => 'unique:posts,slug|max:60',
            'category_id' => 'required'
        ]);
        $post = new Post();
        $post->name = $request->name;
        $post->slug = Str::slug($request->slug);
        $post->description  = $request->description;
        $post->category_id   = $request->category_id;
        $post->user_id       = $request->user_id;
        $post->save();
        return back()->with('msg','Post Created Successfully');
    }

}
